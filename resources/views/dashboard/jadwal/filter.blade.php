<div class="modal fade" tabindex="-1" role="dialog" id="filter-jadwal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Jadwal Prakerin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jadwal.index') }}" method="get">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_angkatan">Filter berdasarkan Tahun Angkatan</label>
                        <select name="id_angkatan" id="id_angkatan" class="form-control choices">
                            <option value="all" selected>Tahun Angkatan</option>
                            @foreach ($angkatan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_periode">Filter berdasarkan Periode Prakerin</label>
                        <select name="id_periode" id="id_periode" class="form-control choices">
                            <option value="all" selected>Periode Prakerin</option>
                            @foreach ($periode as $item)
                                <option value="{{ $item->id }}">{{ date('j F Y', strtotime($item->awal)) . ' s/d ' . date('j F Y', strtotime($item->akhir)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <div class="mr-auto">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Filter Data</button>
                </div>
            </form>
        </div>
    </div>
</div>