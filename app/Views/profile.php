<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile</title>

    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="container header-row">
        <div>
            <h1>Tasks for Today</h1>
            <p>Management System</p>
        </div>

        <nav class="site-nav">
            <a href="<?= site_url('/') ?>">
                Welcome
            </a>

            <a href="<?= site_url('tasks') ?>">
                Task List
            </a>

            <a
                href="<?= site_url('profile') ?>"
                class="active"
            >
                Profile
            </a>

            <a href="<?= site_url('about') ?>">
                About
            </a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-heading">
        <p class="eyebrow">Demo Account</p>

        <h2>User Profile</h2>

        <p>
            Information for the registered demonstration user.
        </p>
    </section>

    <?php if (empty($user)): ?>

        <section class="empty-state">
            <h3>No user found</h3>

            <p>
                Add the demo user record to the users table,
                then refresh this page.
            </p>
        </section>

    <?php else: ?>

        <section class="profile-card">
            <img
                class="profile-photo"
                src="<?= base_url('images/lebron.jpg') ?>"
                alt="Profile photograph of <?= esc($user['full_name']) ?>"
            >

            <div class="profile-information">
                <h3>
                    <?= esc($user['full_name']) ?>
                </h3>

                <dl class="profile-details">
                    <div>
                        <dt>User ID</dt>
                        <dd><?= esc($user['id']) ?></dd>
                    </div>

                    <div>
                        <dt>Username</dt>
                        <dd><?= esc($user['username']) ?></dd>
                    </div>

                    <div>
                        <dt>Email</dt>
                        <dd><?= esc($user['email']) ?></dd>
                    </div>

                    <div>
                        <dt>Created</dt>
                        <dd>
                            <?= esc(
                                date(
                                    'F j, Y g:i A',
                                    strtotime($user['created_at'])
                                )
                            ) ?>
                        </dd>
                    </div>
                </dl>
            </div>
        </section>

    <?php endif ?>
</main>

</body>
</html>