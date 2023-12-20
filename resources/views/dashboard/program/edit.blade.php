@foreach ($program as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-{{ $item->slug }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Program Keahlian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('program.update', $item->slug) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="custom-file">
                            <label for="nama">Program Keahlian</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>
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
@endforeach