<div class="modal fade" tabindex="-1" role="dialog" id="filterSiswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter menurut Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('siswa.index') }}" method="get">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select class="form-control choices" name="id_kelas" id="id_kelas">
                            <option disabled selected>Kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Filter Data</button>
                </div>
            </form>
        </div>
    </div>
</div>