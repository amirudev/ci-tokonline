<?= $this->include('layout/header'); ?>
<div class="container my-5">
    <h1>Hello World!</h1>
    <p>Selamat datang, <?= session()->get('username'); ?></p>
</div>
<?= $this->include('layout/footer'); ?>