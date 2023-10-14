<div class="modal fade" id="editPerusahaan{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editPerusahaan{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPerusahaan{{ $item->id }}">
                    Edit Data Perusahaan
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" action="{{ route('perusahaan.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama Perusahaan</label>
                                    <input type="text" id="nama" class="form-control" name="nama" value="{{ $item->nama }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat Perusahaan</label>
                                    <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $item->alamat }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="penerima">Penerima</label>
                                    <input type="text" id="penerima" class="form-control" name="penerima" value="{{ $item->penerima }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="{{ $item->kecamatan }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kota">Kabupaten / Kota</label>
                                    <input type="text" id="kota" class="form-control" name="kota" value="{{ $item->kota }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" id="provinsi" class="form-control" name="provinsi" value="{{ $item->provinsi }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select class="form-select" id="lokasi" name="lokasi">
                                        <option value="Luar Kota"
                                            @if ($item->lokasi === 'Luar Kota')
                                                selected
                                            @endif
                                        >Luar Kota</option>
                                        <option value="Dalam Kota"
                                            @if ($item->lokasi === 'Dalam Kota')
                                                selected
                                            @endif
                                        >Dalam Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon Perusahaan</label>
                                    <input type="text" id="telepon" class="form-control" name="telepon" value="{{ $item->telepon }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="koordinat">Koordinat Perusahaan</label>
                                    <input type="text" id="koordinat" class="form-control" name="koordinat" value="{{ $item->koordinat }}">
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