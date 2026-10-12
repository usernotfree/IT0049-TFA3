# IT0049 TFA3 Account Management

This CodeIgniter 4 project adds database-backed customer and user forms, server-side validation, edit workflows, and avatar upload preparation to the previous application.

## Completed requirements

- New Customer page at `/customers/new`
- Required full name and valid email validation for customers
- New User page at `/users/new`
- Required, unique username and required full name validation for users
- Customer and user edit pages with pre-filled values
- User avatar upload on the edit page
- JPG and PNG validation with a 2 MB maximum file size
- Display-ready 300 by 300 avatar preparation
- Filename-only avatar storage in the database
- Avatar display on the User Accounts page with a placeholder fallback

## Local setup with XAMPP

1. Extract the project folder into `C:\xampp\htdocs\IT0049 - TFA3`.
2. Start Apache and MySQL in the XAMPP Control Panel.
3. Open phpMyAdmin at `http://localhost/phpmyadmin`.
4. Import `IT0049_TFA3.sql`. The script creates and selects the `it0049_tfa3` database.
5. Confirm the `.env` database username and password match the local MySQL installation. The included settings use the XAMPP defaults: user `root` with no password.
6. Make sure PHP has the `fileinfo` and `gd` extensions enabled. They are used to validate and prepare uploaded images.
7. Open `http://localhost/IT0049%20-%20TFA3/public/landing`.

If the extracted folder name changes, update `app.baseURL` in `.env` to match it.

## Important project locations

- Routes: `app/Config/Routes.php`
- Controllers: `app/Controllers/Customers.php` and `app/Controllers/Users.php`
- Models: `app/Models/CustomerModel.php` and `app/Models/UserModel.php`
- Forms and listings: `app/Views/customers` and `app/Views/users`
- Prepared avatar files: `public/uploads/avatars`
- Database export: `IT0049_TFA3.sql`

## Submission links

Add the final GitHub repository URL and hosted application URL here before submission.
