<h2>Tambah Barang Baru</h2>
<form class="form-inline" action="<?= base_url('barang/tambah_barang') ?>" method="post">
    <div class="form-group mx-sm-5 mb-2">
        <label>KODE BARANG</label>
        <input type="text" name="kodebrg" class="form-control" id="formGroupExampleInput" value="<?php echo sprintf($get_brg) ?>" readonly>
    </div>
    <div class="form-group mx-sm-5 mb-2">
        <label>NAMA_BARANG</label>
        <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="NAMA BARANG">
    </div>
    <div class="form-group mx-sm-5 mb-2"> <label>SATUAN</label>
        <input type="text" name="satuan" class="form-control" id="formGroupExampleInput2" placeholder="SATUAN">
    </div>

    <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
</form>
<h1>Daftar Barang</h1>
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