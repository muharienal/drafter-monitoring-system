<!-- Modals add menu -->
<div id="modal-form-show-report-{{ $report->id }}" class="modal fade" tabindex="-1" aria-labelledby="modal-form-show-report-{{ $report->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-show-report-{{ $report->id }}-label">Detail ({{ strlen($report->description) > 32 ? substr($report->title, 0, 16) . '...' : $report->title }})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $report->nama }}" disabled>
                    <x-form.validation.error name="nama" />
                </div>

                <div class="mb-3">
                    <label for="tgl" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tgl" name="tgl" value="{{ $report->tgl }}" disabled>
                    <x-form.validation.error name="tgl" />
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="number" class="form-control" id="unit" name="unit" value="{{ $report->unit }}" disabled>
                    <x-form.validation.error name="unit" />
                </div>

                <div class="mb-3">
                    <label for="lokasi_barang" class="form-label">Lokasi barang</label>
                    <input type="text" class="form-control" id="lokasi_barang" name="lokasi_barang" value="{{ $report->lokasi_barang }}" disabled>
                    <x-form.validation.error name="lokasi_barang" />
                </div>

                <div class="mb-3">
                    <label for="equipment" class="form-label">Equipment</label>
                    <textarea class="form-control" name="equipment" id="equipment" disabled>{{ $report->equipment }}</textarea>
                    <x-form.validation.error name="equipment" />
                </div>

                <div class="mb-3">
                    <label for="deskripsi_pekerjaan" class="form-label">Deskripsi pekerjaan</label>
                    <textarea class="form-control" name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" disabled>{{ $report->deskripsi_pekerjaan }}</textarea>
                    <x-form.validation.error name="deskripsi_pekerjaan" />
                </div>

                <div class="mb-3">
                    <label for="upload_foto" class="form-label">Upload foto</label>
                    <ul>
                        @foreach($report->upload_foto as $file)
                        <li><a href="{{ asset('assets/files/' . $file) }}">{{ $file }}</a></li>
                        @endforeach
                    </ul>
                    <x-form.validation.error name="upload_foto" />
                </div>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
