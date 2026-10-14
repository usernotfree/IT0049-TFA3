<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About the Developer</title>

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
            <a href="<?= site_url('/') ?>">Welcome</a>
            <a href="<?= site_url('tasks') ?>">Task List</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a
                href="<?= site_url('about') ?>"
                class="active"
            >
                About
            </a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-heading">
        <p class="eyebrow">Project Information</p>
        <h2>About the System</h2>
        <p>
            Learn more about the Tasks for Today Management
            System and its developer.
        </p>
    </section>

    <section class="about-grid">

        <article class="about-card developer-card">
            <img
                class="developer-photo"
                src="<?= base_url('images/pogi.jpg') ?>"
                alt="Photograph of the system developer"
            >

            <div>
                <p class="developer-label">Developed by</p>

                <h3>Sacramento, Lanz Allen B.</h3>

                <p>
                    BS Information Technology <br></p>
                    <p><b>Specialized in Business Analytics</b></p>
                    <p>Section: TB32</p>
                </p>
            </div>
        </article>

        <article class="about-card">
            <h3>About the Project</h3>

            <p>
                Tasks for Today is a web-based task management
                system developed using CodeIgniter 4 and MySQL.
            </p>

            <p>
                The system displays tasks scheduled for the
                current date, provides a complete task list,
                and presents information about its demo user.
            </p>
        </article>

        <article class="about-card">
            <h3>Technologies Used</h3>

            <ul class="technology-list">
                <li>CodeIgniter 4</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>HTML</li>
                <li>CSS</li>
            </ul>
        </article>
    </section>
</main>

</body>
</html>