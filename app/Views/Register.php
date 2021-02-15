<?= $this->include('layout/header'); ?>
<div class="container my-5">
    <h1>Register Form</h1>
    <?php
    $username = [
        'name' => 'Username',
        'id' => 'username',
        'value' => NULL,
        'class' => 'form-control my-3'
    ];
    $password = [
        'name' => 'Password',
        'id' => 'password',
        'class' => 'form-control my-3'
    ];
    $repeatPassword = [
        'name' => 'repeatPassword',
        'id' => 'repeatPassword',
        'class' => 'form-control my-3'
    ];
    $submit = [
        'name' => 'submit',
        'value' => 'Register',
        'class' => 'btn btn-primary'
    ];

    $session = session();
    $errors = $_SESSION['errors'];
    ?>
    <?php if($errors != NULL){ ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Kesalahan!</h4>
            <hr>
            <?php
            foreach($errors as $error){
                echo "<p>$error</p>";
            }
            ?>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        </div>
    <?php } ?>
    <?= form_open(); ?>
    <div class="form-group">
        <?= form_label('Username', 'Username'); ?>
        <?= form_input($username); ?>
    </div>
    <div class="form-group">
        <?= form_label('Password', 'Password'); ?>
        <?= form_password($password); ?>
    </div>
    <div class="form-group">
        <?= form_label('Repeat Password', 'repeatPassword'); ?>
        <?= form_password($repeatPassword); ?>
    </div>
    <div class="form-group">
            <?= form_submit($submit); ?>
    </div>
    <?= form_close(); ?>
</div>
<?= $this->include('layout/footer'); ?>