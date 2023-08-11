<?php

namespace Modules\Dashboard\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Infrastructure\app\Repositories\InfrastructureRepository;
use Modules\Report\app\Repositories\ReportRepository;

class DashboardController extends Controller
{
    protected int $belom = 0;

    protected int $ip = 0;

    protected int $ok = 0;

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(
        ReportRepository $reportRepository,
        InfrastructureRepository $infrastructureRepository
    ) {
        $reportCount = $reportRepository->getCount();
        $infrastructureCount = $infrastructureRepository->getCount();
        $repos = $reportRepository->getNoPaginate();

        $repos->each(function ($report) {
            if ($report->status->value == 'Belom') {
                $this->belom++;
            } elseif ($report->status->value == 'IP') {
                $this->ip++;
            } elseif ($report->status->value == 'Ok') {
                $this->ok++;
            } else {
            }
        });

        $belom = $this->belom;
        $ip = $this->ip;
        $ok = $this->ok;

        return view(
            'dashboard::dashboard.index',
            compact(
                'reportCount',
                'infrastructureCount',
                'belom',
                'ip',
                'ok',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dashboard::dashboard.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::dashboard.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
