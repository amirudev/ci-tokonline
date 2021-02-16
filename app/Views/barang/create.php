<?= $this->include('layout/header') ?>
<div class="container my-5">
    <h1>Tambah Barang</h1>
    <?php
        $nama = [
            'name' => 'nama',
            'id' => 'nama',
            'value' => NULL,
            'class' => 'form-control'
        ];
        $harga = [
            'name' => 'harga',
            'id' => 'harga',
            'type' => 'number',
            'value' => NULL,
            'min' => 0,
            'class' => 'form-control'
        ];
        $stok = [
            'name' => 'stok',
            'id' => 'stok',
            'type' => 'number',
            'value' => NULL,
            'min' => 0,
            'class' => 'form-control'
        ];
        $gambar = [
            'name' => 'gambar',
            'id' => 'gambar',
            'value' => NULL,
            'class' => 'form-control',
            'type' => 'file'
        ];
        $submit = [
            'name' => 'Submit',
            'id' => 'submit',
            'value' => NULL,
            'class' => 'btn btn-success text-right my-3',
            'type' => 'submit',
            'value' => 'Tambah barang'
        ];

        $session = session();
        $errors = $session->getFlashdata('errors');
    ?>
    <?php if($errors){ ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Kesalahan</h4>
        <ul>
            <?php foreach($errors as $err){ ?>
            <li>
                <p class="mb-0"><?= $err; ?></p>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    <?= form_open_multipart('Barang/create'); ?>
    <div class="form-group">
        <?= form_label('Nama Barang', 'nama') ?>
        <?= form_input($nama) ?>
    </div>
    <div class="form-group">
        <?= form_label('Harga Barang', 'harga') ?>
        <?= form_input($harga) ?>
    </div>
    <div class="form-group">
        <?= form_label('Stok Barang', 'stok') ?>
        <?= form_input($stok) ?>
    </div>
    <div class="form-group">
        <?= form_label('Gambar Barang', 'gambar') ?>
        <?= form_input($gambar) ?>
    </div>
    <div class="form-group">
        <?= form_submit($submit) ?>
    </div>
</div>
<?= $this->include('layout/footer') ?>