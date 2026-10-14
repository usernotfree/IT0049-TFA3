<?= view('templates/header') ?>

<?php $errors = session('errors') ?? []; ?>

<div class="form-shell">
    <a class="back-link" href="<?= site_url('users') ?>">&larr; Back to users</a>
    <p class="eyebrow">New Record</p>
    <h2>New User</h2>
    <p>Username and full name are required. Usernames must be unique.</p>

    <?php if ($errors): ?>
        <div class="alert alert-error" role="alert">
            <strong>Please correct the following:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="<?= site_url('users') ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="field">
            <label for="username">Username <span aria-hidden="true">*</span></label>
            <input id="username" name="username" type="text" maxlength="50" value="<?= old('username') ?>" required>
        </div>

        <div class="field">
            <label for="full_name">Full name <span aria-hidden="true">*</span></label>
            <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= old('full_name') ?>" required>
        </div>

        <div class="field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" maxlength="100" value="<?= old('email') ?>">
        </div>

        <div class="form-actions">
            <button class="button" type="submit">Create User</button>
            <a class="button button-secondary" href="<?= site_url('users') ?>">Cancel</a>
        </div>
    </form>
</div>

<?= view('templates/footer') ?>
