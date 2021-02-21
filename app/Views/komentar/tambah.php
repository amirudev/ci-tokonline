<?php
echo $this->include('layout/header');

$komentar = [
    'name' => 'komentar',
    'id' => 'komentar',
    'value' => NULL,
    'class' => 'form-control my-2'
];
$barang = [
    'name' => 'id_barang',
    'id' => 'id_barang',
    'value' => $id_barang,
    'type' => 'hidden'
];
$user = [
    'name' => 'id_user',
    'id' => 'id_user',
    'value' => session()->get('id'),
    'type' => 'hidden'
];
$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'type' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success my-2'
];
?>
<div class="container my-5">
    <h3>Komentar</h3>
    <?= form_open(); ?>
    <?= form_input($barang); ?>
    <?= form_input($user); ?>
    <?= form_textarea($komentar); ?>
    <?= form_input($submit); ?>
    <?= form_close(); ?>
    <script src="/js/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#komentar' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
</div>
<?= $this->include('layout/footer') ?>