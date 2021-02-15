<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <title>CI Toko Online</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand ms-5" href="#">CI Toko Online</a>
      <ul class="nav justify-content-end me-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('Home') ?>">Home</a>
        </li>
        <?php if(session()->get('isLoggedIn')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Auth/logout') ?>">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Auth/register') ?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Auth/login') ?>">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>