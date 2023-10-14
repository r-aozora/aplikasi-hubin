<div class="modal fade" id="tambahPerusahaan" tabindex="-1" role="dialog" aria-labelledby="tambahPerusahaan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPerusahaan">
                    Tambah Data Perusahaan
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" action="{{ url('/perusahaan') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Perusahaan</label>
                                    <input type="text" id="nama" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat Perusahaan</label>
                                    <input type="text" id="alamat" class="form-control" name="alamat">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="penerima">Penerima</label>
                                    <input type="text" id="penerima" class="form-control" name="penerima">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" id="kecamatan" class="form-control" name="kecamatan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kota">Kabupaten / Kota</label>
                                    <input type="text" id="kota" class="form-control" name="kota">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" id="provinsi" class="form-control" name="provinsi">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select class="form-select" id="lokasi" name="lokasi">
                                        <option selected disabled>Pilih</option>
                                        <option value="Luar Kota">Luar Kota</option>
                                        <option value="Dalam Kota">Dalam Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon Perusahaan</label>
                                    <input type="text" id="telepon" class="form-control" name="telepon">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="koordinat">Koordinat Perusahaan</label>
                                    <input type="text" id="koordinat" class="form-control" name="koordinat">
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
                        <span class="d-none d-sm-block">Tambah Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>