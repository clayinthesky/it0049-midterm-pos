# IT0049 Midterm Project - Complete Point-of-Sale System

CodeIgniter 4 Point-of-Sale system for the IT0049 midterm project.

## Features

- Staff login and logout
- Product CRUD with image upload
- Customer CRUD
- Staff CRUD with hashed passwords and avatar upload
- Record sale workflow with stock deduction
- Sales history with product, customer, staff, quantity, total, and date

## Setup

```bash
composer install
cp env .env
php spark key:generate
```

Update `.env` with your local database:

```ini
database.default.hostname = localhost
database.default.database = it0049_pos
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

Then run:

```bash
php spark migrate
php spark db:seed PosSeeder
php spark serve
```

Demo login:

- Username: `admin`
- Password: `Admin123!`

Add the actual hosted link only after the deployment is live.
