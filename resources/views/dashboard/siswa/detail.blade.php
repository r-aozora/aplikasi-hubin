<div class="modal fade" id="detailSiswa{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailSiswa{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailSiswa{{ $item->id }}">
                    Detail Siswa/i
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <img src="" alt="">
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="row mb-3">
                                <div class="col-12 label font-bold">Nama Siswa</div>
                                <div class="col-12">{{ $item->nama }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 label font-bold">NISN / NIS</div>
                                <div class="col-12">{{ $item->nisn }} / {{ $item->nis }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 label font-bold">Jenis Kelamin</div>
                                <div class="col-12">
                                    @if ($item->jenis_kelamin === 'L')
                                        Laki-Laki
                                    @elseif ($item->jenis_kelamin === 'p')
                                        Perempuan
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 label font-bold">Nomor Telepon</div>
                                <div class="col-12">{{ $item->telepon }} (Siswa/i)</div>
                                <div class="col-12">{{ $item->telepon_ortu }} (Orang Tua)</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 label font-bold">Email</div>
                                <div class="col-12">{{ $item->enail }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 label font-bold">Alamat</div>
                                <div class="col-12">{{ $item->alamat }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm ms-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>