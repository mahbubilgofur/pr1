<?php if ($this->session->flashdata('success_message')) { ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success_message') ?>
    </div>
<?php } elseif ($this->session->flashdata('error_message')) { ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error_message') ?>
    </div>
<?php } ?>
<h2>TAMBAH PEMBELIAN BARANG</h2>
<form class="form-inline" action="<?= site_url('beli/tambah_pembelian') ?>" method="post">

    <div class="form-group mx-sm-5 mb-2">
        <label>KODE_BARANG</label>
        <select class="form-control" name="kodebrg" <?= set_value('kodebrg') ?> required>
            <option>PILIH KODE_BARANG</option>
            <?php foreach ($get_nama_beli as $row) { ?>
                <option value="<?= $row->kodebrg ?>"><?= $row->nama ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mx-sm-5 mb-2"> <label>JUMLAH</label>
        <input type="number" name="qty" class="form-control" id="formGroupExampleInput2" placeholder="SATUAN" required>
    </div>

    <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
</form>

</body>

</html>