<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Periode Prakerin</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-primary" data-toggle="modal">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>NAMA</th>
                                <th>PERIODE</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->awal }} s/d {{ $item->akhir }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                            <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>