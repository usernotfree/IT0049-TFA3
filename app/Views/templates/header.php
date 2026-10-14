<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT0049 Account Management</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="container header-row">
        <div>
            <h1>IT0049 Account Management</h1>
            <p>Customers, users, validation, and avatars</p>
        </div>

        <nav class="site-nav" aria-label="Primary navigation">
            <a href="<?= site_url('landing') ?>" class="<?= url_is('landing') ? 'active' : '' ?>">Home</a>
            <a href="<?= site_url('customers') ?>" class="<?= url_is('customers*') ? 'active' : '' ?>">Customers</a>
            <a href="<?= site_url('users') ?>" class="<?= url_is('users*') ? 'active' : '' ?>">Users</a>
            <a href="<?= site_url('about') ?>" class="<?= url_is('about') ? 'active' : '' ?>">About</a>
        </nav>
    </div>
</header>

<main class="container account-main">
    <?php if (session('success')): ?>
        <div class="alert alert-success" role="status"><?= esc(session('success')) ?></div>
    <?php endif ?>
