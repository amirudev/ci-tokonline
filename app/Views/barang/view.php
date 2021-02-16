<?= $this->include('layout/header') ?>
<div class="container my-5">
    <div class="row">
        <div class="col-6">
            <img src="<?= base_url('/uploads') . '/' . $barang->gambar?>">
        </div>
        <div class="col-6">
            <h2><?= $barang->nama ?></h2>
            <h3>Harga : Rp<?= $barang->harga ?></h3>
            <h4>Stok : <?= $barang->stok ?></h4>
        </div>
    </div>
</div>
<?= $this->include('layout/footer') ?>