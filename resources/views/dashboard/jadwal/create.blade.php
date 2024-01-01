<div class="modal fade" tabindex="-1" role="dialog" id="create-jadwal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Jadwal Prakerin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jadwal.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control choices" name="kelas" id="kelas">
                            @foreach ($angkatan as $item)
                                <optgroup label="Tahun Angkatan {{ $item->nama }}">
                                    @foreach ($item->kelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode Prakerin</label>
                        <select class="form-control choices" name="periode" id="periode">
                            @foreach ($periode as $item)
                                <option value="{{ $item->id }}">{{ date('j F Y', strtotime($item->awal)) . ' s/d ' . date('j F Y', strtotime($item->akhir)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>