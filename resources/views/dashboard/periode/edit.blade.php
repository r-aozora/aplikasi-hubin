@foreach ($periode as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-periode-{{ $item->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Periode Prakerin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('periode.update', $item->id) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <label for="awal_periode">Awal Periode</label>
                            <input type="date" class="form-control @error('awal_periode') is-invalid @enderror" id="awal_periode" name="awal_periode" value="{{ $item->awal }}" required>
                        </div>
                        <div class="form-group">
                            <label for="akhir_periode">Akhir Periode</label>
                            <input type="date" class="form-control @error('akhir_periode') is-invalid @enderror" id="akhir_periode" name="akhir_periode" value="{{ $item->akhir }}" required>
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