<div class="modal fade" tabindex="-1" role="dialog" id="create-program">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Program Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('program.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <label for="nama">Program Keahlian</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>