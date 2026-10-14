<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task List</title>

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

            <a
                href="<?= site_url('tasks') ?>"
                class="active"
            >
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
        <p class="eyebrow">Complete Schedule</p>

        <h2>Task List</h2>

        <p>
            All tasks are displayed below and ordered from the
            earliest task date to the latest.
        </p>
    </section>

    <?php if (empty($tasks)): ?>

        <section class="empty-state">
            <h3>No tasks found</h3>

            <p>
                The database does not contain any tasks yet.
            </p>
        </section>

    <?php else: ?>

        <div class="table-wrapper">
            <table class="task-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Task Date</th>
                        <th>Created At</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td>
                                <?= esc($task['id']) ?>
                            </td>

                            <td class="task-title">
                                <?= esc($task['title']) ?>
                            </td>

                            <td>
                                <span
                                    class="status status-<?= esc(
                                        $task['status']
                                    ) ?>"
                                >
                                    <?= esc(
                                        ucwords(
                                            str_replace(
                                                '_',
                                                ' ',
                                                $task['status']
                                            )
                                        )
                                    ) ?>
                                </span>
                            </td>

                            <td>
                                <?= esc(
                                    date(
                                        'F j, Y',
                                        strtotime($task['task_date'])
                                    )
                                ) ?>
                            </td>

                            <td>
                                <?= esc(
                                    date(
                                        'F j, Y g:i A',
                                        strtotime($task['created_at'])
                                    )
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    <?php endif ?>
</main>

</body>
</html>