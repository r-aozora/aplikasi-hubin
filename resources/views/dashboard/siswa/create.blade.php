<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="tambahSiswa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSiswa">
                    Tambah Data Siswa
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" action="{{ url('/angkatan/'.$id_angkatan.'/kelas/'.$kelas->id.'/siswa') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Siswa</label>
                                    <input type="text" id="nama" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nis">NIS Siswa</label>
                                    <input type="text" id="nis" class="form-control" name="nis">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nisn">NISN Siswa</label>
                                    <input type="text" id="nisn" class="form-control" name="nisn">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jkel">Jenis Kelamin</label>
                                    <select class="form-select" id="jkel" name="jkel">
                                        <option selected disabled>Pilih</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon Siswa</label>
                                    <input type="text" id="telepon" class="form-control" name="telepon">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telepon_ortu">Telepon Orang Tua/Wali</label>
                                    <input type="text" id="telepon_ortu" class="form-control" name="telepon_ortu">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email Siswa</label>
                                    <input type="text" id="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat Siswa</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
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