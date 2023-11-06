<h2>Jual Barang</h2>
<form class="form-inline" action="<?= site_url('beli/tambah_pembelian') ?>" method="post">
    <div class="form-group mx-sm-5 mb-2">
        <label>NOFAKTUR</label>
        <input type="text" name="nofaktur" class="form-control" id="formGroupExampleInput" value="<?php echo sprintf($get_beli) ?>" readonly>
    </div>
    <div class="form-group mx-sm-5 mb-2">
        <label>TGL</label>
        <input type="date" name="tgl" class="form-control" id="formGroupExampleInput" value="<?= date('Y-m-d'); ?>" readonly>
    </div>
    <div class="form-group mx-sm-5 mb-2">
        <label>KODE_BARANG</label>
        <select class="form-control" name="kodebrg" <?= set_value('kodebrg') ?>>
            <option>PILIH KODE_BARANG</option>
            <?php foreach ($get_nama_beli as $row) { ?>
                <option value="<?= $row->kodebrg ?>"><?= $row->nama ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mx-sm-5 mb-2"> <label>JUMLAH</label>
        <input type="number" name="qty" class="form-control" id="formGroupExampleInput2" placeholder="SATUAN">
    </div>

    <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
</form>

</body>

</html>