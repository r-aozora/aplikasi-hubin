<div class="modal fade" tabindex="-1" role="dialog" id="create-periode">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Periode Prakerin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('periode.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="awal_periode">Awal Periode</label>
                        <input type="date" class="form-control @error('awal_periode') is-invalid @enderror" id="awal_periode" name="awal_periode" value="{{ Session::get('awal_periode') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="akhir_periode">Akhir Periode</label>
                        <input type="date" class="form-control @error('akhir_periode') is-invalid @enderror" id="akhir_periode" name="akhir_periode" value="{{ Session::get('akhir_periode') }}" required>
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