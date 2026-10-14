<?= view('templates/header') ?>

<div class="page-toolbar">
    <div>
        <p class="eyebrow">Customer Management</p>
        <h2>Customer Accounts</h2>
        <p>Create and update customer records stored in the database.</p>
    </div>

    <a class="button" href="<?= site_url('customers/new') ?>">New Customer</a>
</div>

<?php if (empty($customers)): ?>
    <div class="empty-state">
        <h3>No customers found</h3>
        <p>Create the first customer account to get started.</p>
    </div>
<?php else: ?>
    <div class="table-wrapper">
        <table class="account-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td class="record-name"><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['city'] ?: 'Not provided') ?></td>
                        <td><a class="text-link" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php endif ?>

<?= view('templates/footer') ?>
