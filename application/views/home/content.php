<h1>DAFTAR BARANG</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama</th>
            <th scope="col">Satuan</th>
            <th scope="col">Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang as $item) : ?>
            <tr>
                <td><?= $item->kodebrg ?></td>
                <td><?= $item->nama ?></td>
                <td><?= $item->satuan ?></td>
                <td><?= $item->stok ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>