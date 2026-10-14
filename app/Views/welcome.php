<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tasks for Today</title>

    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="container header-row">
        <div>
            <h1>Tasks for Today</h1>
            <p><?= esc(date('F j, Y', strtotime($today))) ?></p>
        </div>

        <nav class="site-nav">
            <a href="<?= site_url('/') ?>" class="active">
                Welcome
            </a>

            <a href="<?= site_url('tasks') ?>">
                Task List
            </a>

            <a href="<?= site_url('profile') ?>">
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
        <p class="eyebrow">Daily Dashboard</p>
        <h2>Today's Tasks</h2>
        <p>Only tasks scheduled for today are displayed below.</p>
    </section>

    <?php if (empty($tasks)): ?>

        <section class="empty-state">
            <h3>No tasks scheduled</h3>
            <p>There are currently no tasks assigned for today.</p>
        </section>

    <?php else: ?>

        <section class="task-grid">
            <?php foreach ($tasks as $task): ?>
                <article class="task-card">
                    <div>
                        <h3><?= esc($task['title']) ?></h3>

                        <p class="task-date">
                            <?= esc(date(
                                'F j, Y',
                                strtotime($task['task_date'])
                            )) ?>
                        </p>
                    </div>

                    <span class="status status-<?= esc($task['status']) ?>">
                        <?= esc(ucwords(
                            str_replace('_', ' ', $task['status'])
                        )) ?>
                    </span>
                </article>
            <?php endforeach ?>
        </section>


    <?php endif ?>
</main>

</body>
</html>