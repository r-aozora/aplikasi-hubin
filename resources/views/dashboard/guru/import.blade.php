<div class="modal fade" tabindex="-1" role="dialog" id="import-guru">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Impor Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('guru.import') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="file">Pilih File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <div class="mr-auto">
                        <a href="{{ asset('download/Data Guru.xlsx') }}">Download Template</a>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Impor Data</button>
                </div>
            </form>
        </div>
    </div>
</div>