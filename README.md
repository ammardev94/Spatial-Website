## SETUP GUIDE

Install project dependencies:

```bash
composer install
```

To setup database, update (`.env`) file with your database credentials and run the below command:

```bash
php artisan migrate
```

To feed some sample data into your database table then run the below command:

```bash
php artisan db:seed
```