<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>NO</th>
            <th>PERUSAHAAN</th>
            <th>ALAMAT</th>
            <th>LOKASI</th>
            <th>TELEPON</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        @foreach ($perusahaan as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->telepon }}</td>
            </tr>
        @endforeach
    </tbody>
</table>