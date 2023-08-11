<!-- Modals add menu -->
<div id="modal-form-add-report" class="modal fade" tabindex="-1" aria-labelledby="modal-form-add-report-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-add-report-label">Add Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">

                    @if(auth()->user()->isValidated())

                    <div class="mb-3">
                        <label for="nama" class="form-label">Requester</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <x-form.validation.error name="nama" />
                    </div>

                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit Kerja</label>
                        <select class="form-select" id="unit" name="unit" data-choices data-choices-removeItem>
                            <option value="PA I">PA I</option>
                            <option value="PA II">PA II</option>
                            <option value="SASU I">SASU I</option>
                            <option value="SASU II">SASU II</option>
                            <option value="UBB">UBB</option>
                            <option value="ZA II">ZA II</option>
                            <option value="Gypsum AlF3">Gypsum AlF3</option>
                        </select>
                        <x-form.validation.error name="unit" />
                    </div>

                    <div class="mb-3">
                        <label for="drafter" class="form-label">Drafter</label>
                        <select class="form-select" id="drafter" name="drafter" data-choices data-choices-removeItem>
                            {{-- <option value="PA I">Pemal Kabogi</option> --}}
                            {{-- <option value="PA II">Henri Koreyanto</option> --}}
                            @foreach($drafters->users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-form.validation.error name="drafter" />
                    </div>

                    <div class="mb-3">
                        <label for="equipment" class="form-label">Equipment</label>
                        <textarea class="form-control" name="equipment" id="equipment"></textarea>
                        <x-form.validation.error name="equipment" />
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_pekerjaan" class="form-label">Deskripsi pekerjaan</label>
                        <textarea class="form-control" name="deskripsi_pekerjaan" id="deskripsi_pekerjaan"></textarea>
                        <x-form.validation.error name="deskripsi_pekerjaan" />
                    </div>

                    <div class="mb-3">
                        <label for="upload_foto" class="form-label">Upload foto</label>
                        <input id="upload_foto" name="upload_foto[]" type="file" class="filepond filepond-input-multiple form-control" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                        <x-form.validation.error name="upload_foto" />
                    </div>

                    <div class="mb-3">
                        <label for="lokasi_barang" class="form-label">Lokasi barang</label>
                        <input type="text" class="form-control" id="lokasi_barang" name="lokasi_barang">
                        <x-form.validation.error name="lokasi_barang" />
                    </div>

                    <div class="mb-3">
                        <label for="prioritas" class="form-label">Prioritas</label>
                        <select class="form-select" aria-label="prioritas request" name="prioritas" id="prioritas" style="width: 12rem;">
                            <option value="emergency">emergency</option>
                            <option value="high">high</option>
                            <option selected value="medium">medium</option>
                            <option value="low">low</option>

                        </select>

                    </div>
                    @else
                    <p>Validate your account first to do reporting!</p>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    @if(auth()->user()->isValidated())
                    <button type="submit" class="btn btn-primary ">Save</button>
                    @else
                    <a href="{{ route('user.validation.index') }}" type="button" class="btn btn-primary">Validate</a>
                    @endif
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
