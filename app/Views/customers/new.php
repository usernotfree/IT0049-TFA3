<?= view('templates/header') ?>

<?php $errors = session('errors') ?? []; ?>

<div class="form-shell">
    <a class="back-link" href="<?= site_url('customers') ?>">&larr; Back to customers</a>
    <p class="eyebrow">New Record</p>
    <h2>New Customer</h2>
    <p>Full name and a valid email address are required.</p>

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

    <form action="<?= site_url('customers') ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="field">
            <label for="full_name">Full name <span aria-hidden="true">*</span></label>
            <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= old('full_name') ?>" required>
        </div>

        <div class="field">
            <label for="email">Email address <span aria-hidden="true">*</span></label>
            <input id="email" name="email" type="email" maxlength="100" value="<?= old('email') ?>" required>
        </div>

        <div class="field">
            <label for="city">City</label>
            <input id="city" name="city" type="text" maxlength="100" value="<?= old('city') ?>">
        </div>

        <div class="form-actions">
            <button class="button" type="submit">Create Customer</button>
            <a class="button button-secondary" href="<?= site_url('customers') ?>">Cancel</a>
        </div>
    </form>
</div>

<?= view('templates/footer') ?>
