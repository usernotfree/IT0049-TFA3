<?= view('templates/header') ?>

<div class="page-toolbar">
    <div>
        <p class="eyebrow">User Management</p>
        <h2>User Accounts</h2>
        <p>Create users, edit account details, and manage profile pictures.</p>
    </div>

    <a class="button" href="<?= site_url('users/new') ?>">New User</a>
</div>

<?php if (empty($users)): ?>
    <div class="empty-state">
        <h3>No users found</h3>
        <p>Create the first user account to get started.</p>
    </div>
<?php else: ?>
    <div class="user-grid">
        <?php foreach ($users as $user): ?>
            <?php $avatarUrl = empty($user['avatar'])
                ? base_url('images/avatar-placeholder.svg')
                : base_url('uploads/avatars/' . rawurlencode($user['avatar'])); ?>

            <article class="user-card">
                <img class="user-avatar" src="<?= esc($avatarUrl) ?>" alt="Avatar for <?= esc($user['full_name']) ?>">
                <div class="user-card-body">
                    <h3><?= esc($user['full_name']) ?></h3>
                    <p class="username">@<?= esc($user['username']) ?></p>
                    <p><?= esc($user['email'] ?: 'No email provided') ?></p>
                    <a class="text-link" href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit account</a>
                </div>
            </article>
        <?php endforeach ?>
    </div>
<?php endif ?>

<?= view('templates/footer') ?>
