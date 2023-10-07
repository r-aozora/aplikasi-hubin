<div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUser{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUser{{ $user->id }}">
                    Edit Data User
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" action="{{ url('/user/'.$user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <select class="choices form-select" id="nama" name="nama">
                                        <?php $notUsers->push($user) ?>
                                        @foreach ($notUsers as $guru)   
                                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label for="level">level</label>
                                    <select class="form-select" id="level" name="level" value="{{ $user->level }}">
                                        <option value="Admin" 
                                            @if ($user->level === 'Admin') 
                                                selected 
                                            @endif>
                                            Admin
                                        </option>
                                        <option value="Guru" 
                                            @if ($user->level === 'Guru') 
                                                selected 
                                            @endif>
                                            Guru
                                        </option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Edit Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>