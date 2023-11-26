<div class="modal fade" tabindex="-1" role="dialog" id="tambahAngkatan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tahun Angkatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form form-vertical" action="{{ route('angkatan.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label>Tahun Angkatan</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>