<?= view('templates/header') ?>

<h1>Welcome to IT0049</h1>

<p>This CodeIgniter application manages customer and user accounts with validated forms, editable records, and prepared avatar uploads.</p>

<div class="form-actions">
    <a class="button" href="<?= site_url('customers') ?>">Manage Customers</a>
    <a class="button button-secondary" href="<?= site_url('users') ?>">Manage Users</a>
</div>


<?= view('templates/footer') ?>
