<div class="modal fade" tabindex="-1" role="dialog" id="importGuru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Impor Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form form-vertical" action="{{ route('guru.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="file">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Impor Data</button>
                </div>
            </form>
        </div>
    </div>
</div>