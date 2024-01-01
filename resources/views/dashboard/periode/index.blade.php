<h2 class="section-title">Kelola Periode Prakerin</h2>
<p class="section-lead">
    Anda dapat mengelola semua Periode Prakerin, seperti mengedit, menghapus, dan lainnya.
</p>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Periode Prakerin</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-periode">
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
                                <th colspan="3" class="text-center">PERIODE PRAKERIN</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ date('j F Y', strtotime($item->awal)) }}</td>
                                    <td>s/d</td>
                                    <td>{{ date('j F Y', strtotime($item->akhir)) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning btn-edit-periode" data-modal-id="{{ $item->id }}" data-toggle="tooltip" title="Edit Data">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Data">
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
