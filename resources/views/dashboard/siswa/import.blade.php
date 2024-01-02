<div class="modal fade" tabindex="-1" role="dialog" id="import-siswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Impor Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('siswa.import') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                    <div class="form-group">
                        <label for="kelas">Import untuk...</label>
                        <select class="form-control choices" name="kelas" id="kelas" required>
                            @foreach ($angkatan as $item)
                                <optgroup label="{{ $item->nama }}">
                                    @foreach ($item->kelas as $kls)
                                        <option value="{{ $kls->id }}" {{ $kls->id === $kelas?->id ? 'selected' : '' }}>{{ $kls->nama }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <div class="mr-auto">
                        <a href="{{ asset('download/Data Siswa.xlsx') }}">Download Template</a>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Impor Data</button>
                </div>
            </form>
        </div>
    </div>
</div>