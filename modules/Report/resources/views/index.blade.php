@extends('layouts.dashboard.app')

@section('title', 'Request')

@section('breadcrumb')
<x-dashboard::breadcrumb title="Request" page="Request" active="Request" route="{{ route('report.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
    <!-- cardheader -->
    <div class="card-header border-bottom-dashed align-items-center d-flex">

        <div class="flex-shrink-0">
            @if (auth()->user()->hasRole('User'))
            <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form-add-report">
                <i class="ri-add-line"></i>
                Add
            </button>
            @endif
        </div>
    </div>
    <!-- end cardheader -->
    <!-- Hoverable Rows -->
    <table class="table table-hover table-nowrap mb-0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl</th>
                <th scope="col">Requester</th>
                <th scope="col">Unit Kerja</th>
                <th scope="col">Drafter</th>
                <th scope="col">PIC</th>
                <th scope="col">Equipment</th>
                <th scope="col">Deskripsi Pekerjaan</th>
                <th scope="col">Upload Foto</th>
                <th scope="col">Lokasi Barang</th>
                <th scope="col">Prioritas</th>
                <th scope="col">Progress</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                {{-- tgl --}}
                <th scope="row">{{ $report->tgl }}</th>
                {{-- requester --}}
                <th scope="row">{{ $report->nama }}</th>
                {{-- unit --}}
                <th scope="row">{{ $report->unit }}</th>
                {{-- drafter --}}
                <th scope="row">{{ $report->has_drafter->name }}</th>
                {{-- PIC --}}
                <th scope="row">{{ $report->user->name }}</th>
                {{-- equipment --}}
                <th scope="row">{{ $report->equipment }}</th>
                {{-- deskripsi pekerjaan --}}
                <th scope="row">{{ $report->deskripsi_pekerjaan }}</th>
                {{-- upload foto --}}
                <th scope="row">
                    <div class="">
                        @foreach ($report->upload_foto as $file)
                        <div class="mb-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto" data-foto="{{ asset('assets/files/' . $file) }}">{{ $file }}</a>
                        </div>
                        @endforeach
                    </div>
                </th>
                {{-- lokasi barang --}}
                <th scope="row">{{ $report->lokasi_barang }}</th>
                {{-- prioritas --}}
                <th scope="row" class="text-{{$report->getPrioritasColor()}}">{{ $report->prioritas }}</th>
                {{-- status --}}
                <th scope="row">{{ $report->status }}</th>
                <td>
                    <div class="dropdown">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-show-report-{{ $report->id }}">
                                    Detail
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-edit-report-{{ $report->id }}">
                                    Edit
                                </a>
                            </li>
                            @if($report->drafter === auth()->user()->id)
                            <li>
                                <a class="dropdown-item" href="{{ route('infrastructure.create') }}">
                                    Eksekusi
                                </a>
                            </li>
                            @endif
                            @if (
                            in_array(auth()->id(), [$report->drafter, $report->user->id]) ||
                            auth()->user()->hasRole('Super Admin'))
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('modal-form-delete-report-{{ $report->id }}').submit()">
                                    Delete
                                </a>
                            </li>
                            @endif
                        </ul>

                        @include('report::components.form.modal.report.show')
                        @include('report::components.form.modal.report.edit')
                        @include('report::components.form.modal.report.delete')
                    </div>
                </td>
                <td></td>
            </tr>
            @empty
            <tr>
                <th colspan="13" class="text-center">No data to display</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="card-footer py-4">
        <nav aria-label="..." class="pagination justify-content-end">
            {{ $reports->links() }}
        </nav>
    </div>
</div>

@if (auth()->user()->hasRole('User'))
@include('report::components.form.modal.report.add')
@endif

<div class="modal fade" id="modalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fs-6 fw-bold" id="modalFotoLabel">Lihat Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body-files">

                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-soft-primary" download>Download</a>
                <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#modalFoto').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var foto = button.data('foto') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body-files').html(
            `<img class="w-100 rounded" src="${foto}" />`
        )
        modal.find('.modal-footer a').attr('href', foto)


    })

</script>
@endpush
