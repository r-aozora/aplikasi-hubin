<div class="modal fade" tabindex="-1" role="dialog" id="export-siswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Download Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('siswa.export') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="kelas">Pilih Kelas</label>
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
                    <button type="submit" class="btn btn-sm btn-primary">Download Data</button>
                </div>
            </form>
        </div>
    </div>
</div>