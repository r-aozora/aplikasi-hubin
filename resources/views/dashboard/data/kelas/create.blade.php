<div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="tambahKelasTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKelasTitle">
                    Tambah Data Kelas
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" action="{{ url('/kelas') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode">Kode Kelas</label>
                                    <input type="text" id="kode" class="form-control" name="kode">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama Kelas</label>
                                    <input type="text" id="nama" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <select class="choices form-select" id="angkatan" name="angkatan">
                                        @foreach ($angkatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="guru">Guru</label>
                                    <select class="choices form-select" id="guru" name="guru">
                                        @foreach ($guru as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="program">Program Keahlian</label>
                                    <select class="choices form-select" id="program" name="program">
                                        @foreach ($program as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="periode">Periode Prakerin (Opsional)</label>
                                    <select class="choices form-select" id="periode" name="periode">
                                        @foreach ($periode as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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