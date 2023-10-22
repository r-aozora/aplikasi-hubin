<div class="modal fade" id="editGuru{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editGuru{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuru{{ $item->id }}">
                    Edit Data Guru
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" action="{{ route('guru.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Guru</label>
                                    <input type="text" id="nama" class="form-control" name="nama" value="{{ $item->nama }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" class="form-control" name="nip" value="{{ $item->nip }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label for="sebagai">Sebagai</label>
                                    <select class="form-select" id="sebagai" name="sebagai">
                                        <option value="Walikelas" {{ $item->sebagai === 'Walikelas' ? 'selected' : '' }}>
                                            Wali Kelas
                                        </option>
                                        <option value="Pendamping" {{ $item->sebagai === 'Pendamping' ? 'selected' : '' }}>
                                            Guru Pendamping
                                        </option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" id="telepon" class="form-control" name="telepon" value="{{ $item->telepon }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Edit Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>