<?php

namespace Modules\Report\app\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Notivication\app\Models\Notivication;
use Modules\Report\app\Interfaces\ReportInterface;
use Modules\Report\app\Models\Report;

class ReportRepository implements ReportInterface
{
    /**
     * getCount
     */
    public function getCount()
    {
        return auth()->user()->hasRole('User')
            ? $this->getUserCount()
            : $this->getAllCount();
    }

    protected function getUserCount()
    {
        return Report::query()
            ->whereBelongsTo(auth()->user())
            ->count();
    }

    protected function getAllCount()
    {
        return Report::count();
    }

    /**
     * getAll
     */
    public function getAll(int $paginate = 10): LengthAwarePaginator
    {
        return auth()->user()->hasRole('User')
            ? $this->getListForUser($paginate)
            : $this->getListForAdmin($paginate);
    }

    public function getNoPaginate()
    {
        return Report::all();
    }

    protected function getListForUser(int $paginate = 10): LengthAwarePaginator
    {
        return Report::query()
            ->whereBelongsTo(
                related: auth()->user()
            )
            ->when(request()->search, function ($query, $search) {
                return $query->where('nama', 'like', '%'.$search.'%');
            })
            ->with('user', 'has_drafter')
            ->latest()
            ->paginate($paginate);
    }

    protected function getListForAdmin(int $paginate = 10): LengthAwarePaginator
    {
        return Report::query()
            ->when(request()->search, function ($query, $search) {
                return $query->where('nama', 'like', '%'.$search.'%');
            })
            ->with('user', 'has_drafter')
            ->latest()
            ->paginate($paginate);
    }

    /**
     * store
     */
    public function store(Request $request): bool|Report
    {
        $upload_foto = $this->storeAttach($request);

        $report = Report::create(
            $this->mergeRequest($request, $upload_foto)
        );

        return $report && Notivication::create([
            'model' => 'Request',
            'target' => $report->drafter,
            'route' => route('report.index'),
            'user_id' => auth()->user()->id,
        ]);
    }

    protected function mergeRequest(Request $request, string $upload_foto)
    {
        return array_merge(
            $request->validated(),
            [
                'tgl' => now(),
                'upload_foto' => $upload_foto,
                'user_id' => auth()->id(),
            ]
        );
    }

    protected function storeAttach(Request $request): string
    {
        $contents = [];

        if (! $request->has('upload_foto')) {
            return json_encode($contents);
        }

        $upload_foto = $request->file('upload_foto');

        foreach ($upload_foto as $file) {
            $fileName = str()->uuid()->toString().'.'.$file->extension();

            $file->move(public_path('assets/files/'), $fileName);

            array_push($contents, $fileName);
        }

        return json_encode($contents);
    }

    /**
     * update
     */
    public function update(Request $request, Report $report)
    {
        if ($request->_c2VuZGVy === 'VXNlcg==') {
            return $this->updateUser($request, $report);
        }

        if ($request->_c2VuZGVy === 'U3VwZXIgQWRtaW4=') {
            return $this->updateSuperAdmin($request, $report);
        }

        return false;
    }

    protected function updateUser(Request $request, Report $report)
    {
        $validated = $this->validateUser($request);

        $attach = $this->storeAttach($request);

        $upload_foto = $attach != json_encode([]) ? $attach : $report->upload_foto;

        return $report->update(
            array_merge(
                $validated,
                [
                    'upload_foto' => $upload_foto,
                ]
            )
        );
    }

    protected function updateSuperAdmin(Request $request, Report $report)
    {
        $validated = $this->validateSuperAdmin($request);

        return $report->update(
            $validated
        );
    }

    protected function validateUser(Request $request)
    {
        return $request->validate([
            'drafter' => ['nullable', 'string'],
            'prioritas' => ['nullable', 'string'],
            'tgl' => ['nullable', 'date'],
            'unit' => ['nullable', 'string'],
            'equipment' => ['nullable', 'string'],
            'deskripsi_pekerjaan' => ['nullable', 'string'],
            'nama' => ['nullable', 'string'],
            'upload_foto.*' => ['nullable', 'file'],
            'lokasi_barang' => ['nullable', 'string'],
            // 'status'                => ['nullable', 'string'],
        ]);
    }

    protected function validateSuperAdmin(Request $request)
    {
        return $request->validate([
            // 'tgl'                   => ['nullable', 'date'],
            // 'unit'                  => ['nullable', 'string'],
            // 'equipment'             => ['nullable', 'string'],
            // 'deskripsi_pekerjaan'   => ['nullable', 'string'],
            // 'nama'                  => ['nullable', 'string'],
            // 'upload_foto.*'         => ['nullable', 'file'],
            // 'lokasi_barang'         => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
        ]);
    }
}
