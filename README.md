# AutoPilot PH

A PHP and MySQL application for managing clients and their automations.

## Requirements

- PHP 8.1+ with PDO MySQL
- MySQL or MariaDB

## Setup with XAMPP

1. Copy this folder into `C:\xampp\htdocs`.
2. Start Apache and MySQL in the XAMPP Control Panel.
3. For a new installation, import `sql/migration.sql` in phpMyAdmin. This creates the `ai_automation_db` database and required tables.
4. The default database connection is `127.0.0.1`, database `ai_automation_db`, user `root`, with an empty password. Configure `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASS` if your MySQL credentials differ.
5. Open `http://localhost/autopilot-ph-ai-automation-tracker-main/register.php` and create an account.

If upgrading an existing database, back it up and run `sql/upgrade_date_added.sql` once instead of importing the initial migration again.

Alternatively, run `php -S 127.0.0.1:8000` from this folder while MySQL is running, then open `http://127.0.0.1:8000/register.php`.

## Project files

- Root PHP pages: registration, login, client and automation management.
- `core/`: database connection, authentication, models, and form handling.
- `sql/migration.sql`: schema for a new installation.
- `sql/upgrade_date_added.sql`: one-time migration for existing installations.
- `styles.css`: application styles.
