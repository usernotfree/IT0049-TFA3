<?= view('templates/header') ?>

<?php
$errors = session('errors') ?? [];
$avatarUrl = empty($user['avatar'])
    ? base_url('images/avatar-placeholder.svg')
    : base_url('uploads/avatars/' . rawurlencode($user['avatar']));
?>

<div class="form-shell">
    <a class="back-link" href="<?= site_url('users') ?>">&larr; Back to users</a>
    <p class="eyebrow">Edit Record</p>
    <h2>Edit User</h2>
    <p>Update account details and optionally upload a new profile picture.</p>

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

    <form action="<?= site_url('users/' . $user['id']) ?>" method="post" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($user['id']) ?>">

        <div class="field">
            <label for="username">Username <span aria-hidden="true">*</span></label>
            <input id="username" name="username" type="text" maxlength="50" value="<?= old('username', $user['username']) ?>" required>
        </div>

        <div class="field">
            <label for="full_name">Full name <span aria-hidden="true">*</span></label>
            <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= old('full_name', $user['full_name']) ?>" required>
        </div>

        <div class="field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" maxlength="100" value="<?= old('email', $user['email']) ?>">
        </div>

        <div class="field avatar-field">
            <img class="avatar-preview" src="<?= esc($avatarUrl) ?>" alt="Current avatar for <?= esc($user['full_name']) ?>">
            <div>
                <label for="avatar">Profile picture</label>
                <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
                <p class="field-help">JPG or PNG only, maximum 2 MB. The image will be prepared as a 300 × 300 square.</p>
            </div>
        </div>

        <div class="form-actions">
            <button class="button" type="submit">Save Changes</button>
            <a class="button button-secondary" href="<?= site_url('users') ?>">Cancel</a>
        </div>
    </form>
</div>

<?= view('templates/footer') ?>
