<?= $this->include('layout/header') ?>
<div class="row container mx-auto my-5">
    <?php foreach($barangs as $barang): ?>
    <div class="col-4">
        <div class="card text-center">
            <div class="card-header">
                <h3><?= $barang->nama ?></h3>
            </div>
            <div class="card-body">
                <img src="<?= base_url("uploads/$barang->gambar") ?>" alt="" style="max-height: 200px">
                <h5 class="my-3 text-success">Rp<?= number_format($barang->harga) ?></h5>
                <h6>Stok : <?= $barang->stok ?></h6>
            </div>
            <div class="card-footer">
                <a href="<?= site_url("/etalase/beli/" . $barang->id) ?>"><button class="btn-success w-100">Beli Sekarang</button></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?= $this->include('layout/footer') ?>