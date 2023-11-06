<?php if ($this->session->flashdata('success_message')) { ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success_message') ?>
    </div>
<?php } elseif ($this->session->flashdata('error_message')) { ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error_message') ?>
    </div>
<?php } ?>
<h2>Tambah Barang Baru</h2>
<form class="form-inline" action="<?= base_url('barang/tambah_barang') ?>" method="post">

    <div class="form-group mx-sm-5 mb-2">
        <label>NAMA_BARANG</label>
        <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="NAMA BARANG">
    </div>
    <div class="form-group mx-sm-5 mb-2"> <label>SATUAN</label>
        <input type="text" name="satuan" class="form-control" id="formGroupExampleInput2" placeholder="SATUAN">
    </div>

    <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
</form>