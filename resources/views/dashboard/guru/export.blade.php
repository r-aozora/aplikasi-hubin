<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIP</th>
            <th>SEBAGAI</th>
            <th>TELEPON</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        @foreach ($guru as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->sebagai }}</td>
                <td>{{ $item->telepon }}</td>
            </tr>
        @endforeach
    </tbody>
</table>