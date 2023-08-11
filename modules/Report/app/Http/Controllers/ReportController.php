<?php

namespace Modules\Report\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Report\app\Http\Requests\ReportStoreRequest;
use Modules\Report\app\Http\Requests\UpdateReportRequest;
use Modules\Report\app\Models\Report;
use Modules\Report\app\Repositories\ReportRepository;
use Spatie\Permission\Models\Role;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(
        ReportRepository $reportRepository
    ) {
        $reports = $reportRepository->getAll();
        $drafters = Role::query()->firstWhere('name', 'Draf')->loadMissing('users');

        return view(
            'report::index',
            compact('reports', 'drafters')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('report::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Renderable
     */
    public function store(
        ReportStoreRequest $request,
        ReportRepository $reportRepository
    ) {
        return $reportRepository->store($request)
            ? back()->with('success', 'Report has been created successfully!')
            : back()->with('failed', 'Report was not created successfully!');
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('report::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Renderable
     */
    public function update(
        UpdateReportRequest $request,
        Report $report,
        ReportRepository $reportRepository
    ) {
        return $reportRepository->update($request, $report)
            ? back()->with('success', 'Report has been updated successfully!')
            : back()->with('failed', 'Report was not updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy(Report $report)
    {
        return $report->delete()
            ? back()->with('success', 'Report has been deleted successfully!')
            : back()->with('failed', 'Report was not deleted successfully!');
    }
}
