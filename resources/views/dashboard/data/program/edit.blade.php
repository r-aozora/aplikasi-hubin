<div class="modal fade" tabindex="-1" role="dialog" id="editProgram{{ $item->slug }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Program Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form form-vertical" action="{{ route('program.update', $item->slug) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="custom-file">
                        <label>Program Keahlian</label>
                        <input type="text" class="form-control" name="nama" value="{{ $item->nama }}">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>