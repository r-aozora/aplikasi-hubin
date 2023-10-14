<section id="data-program" class="section col-lg-5 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">
                        Periode Prakerin
                    </h5>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPeriode">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Periode
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE</th>
                        <th>PERIODE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($periode as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->kelas->nama }}</td>
                            <td>{{ $item->guru->nama }}</td>
                            <td>{{ $item->kelas->angkatan->kode }}</td>
                            <td>
                                <div class="btn-group mb-1">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle me-1" type="button" id="option" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-error-circle me-50"></i>
                                            Opsi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="option">
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editPeriode{{ $item->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </button>
                                            <a href="{{ route('periode.destroy', $item->id) }}" class="dropdown-item" data-confirm-delete="true">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {{-- @include('dashboard.periode.edit') --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{-- @include('dashboard.periode.create') --}}