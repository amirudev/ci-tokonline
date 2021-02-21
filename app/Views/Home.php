<?= $this->include('layout/header'); ?>
<div class="container my-5">
    <h1>Hello World!</h1>
    <p>Selamat datang, <?= session()->get('username'); ?></p>
    <?php if(session()->get('role') == 1): ?>
    <a href="<?= base_url('Barang/create') ?>"><button class="btn btn-success">Create</button></a>
    <a href="<?= base_url('Barang/index') ?>"><button class="btn btn-warning">Read</button></a>
    <a href="<?= base_url('Barang/update') ?>"><button class="btn btn-primary">Update</button></a>
    <a href="<?= base_url('Barang/delete') ?>"><button class="btn btn-danger">Delete</button></a>
    <?php endif; ?>
    <a href="<?= base_url('Etalase') ?>"><button class="btn btn-link">Etalase</button></a>
    <a href="<?= base_url('Transaksi') ?>"><button class="btn btn-link">Transaksi</button></a>
</div>
<?= $this->include('layout/footer'); ?>