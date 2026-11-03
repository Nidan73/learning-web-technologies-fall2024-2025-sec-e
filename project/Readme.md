# Crowdfunding Web App (PHP + MySQL)

Course project for Web Technologies, Fall 2024-2025, Section E. There is no live deployment.

A crowdfunding system written in plain PHP, MySQL and JavaScript, organised into model, view and controller folders.

## Roles

- Backer: view profile, browse categories, donate, view donations, set up recurring donations.
- Creator: view profile, browse categories, propose custom categories, view donations to their campaigns.
- Admin: view profile, approve or reject pending categories, track donations, view recurring payment reports.

## Features

- Session-based login (AJAX request to `controller/logincheck.php`).
- Profile view and edit with client-side validation.
- Donations through a simulated payment step (bKash, Nagad, Rocket and card buttons). Each donation gets a transaction id and is added to the campaign's raised amount.
- Recurring donations: create, edit, cancel, and a status page.
- Donation history and summaries for backers and creators.
- Categories: predefined categories, creator-proposed custom categories, admin approval.
- Admin reports: all donations, total raised per campaign, top recurring campaigns, top contributors.

Not included: user registration, campaign creation, comments, notifications.

## Stack

PHP, MySQL (mysqli), HTML, CSS, JavaScript (XMLHttpRequest).

## Run locally

1. Install XAMPP (or any PHP and MySQL stack) and copy the `project/` folder into `htdocs`.
2. Create a MySQL database named `project`. The code connects to `127.0.0.1` as `root` with no password (`model/*.php`).
3. Create the tables the models use: `users`, `campaigns`, `categories`, `donations`, `recurring_payments`. A schema file is not included.
4. Open `http://localhost/project/view/login.html`.

## Project structure

```
project/
  asset/        JavaScript (validation, AJAX) and CSS
  controller/   request handlers (login, donations, payments, categories, profile, recurring)
  model/        database functions per area
  view/         pages for each role
  index.php     entry redirect
```

## Known limitations

This is coursework and is not meant for production use. SQL queries are built from request values without prepared statements, passwords are stored in plain text, and admin pages do not check the user role.
