<img src="http://pawanregmi.com.np/uploads/site-title.png" width="300" markdown="1" />

###

## College Project Prepared By:

## Cloning

```
git clone https://gitlab.com/wildbeast8075/foodorderingsystem.git
```

## Installation

```
composer install
cp .env.example .env
php artisan key:generate
```

-   Create a new Database and set the DB_NAME DB_USER DB_PASSWORD accordingly in the ".env" FILE

```
php artisan migrate:fresh --seed
```

```
php artisan storage:link
```

## License

This Project is not licensed to be distributed or used for professional purposes by anyone except the team members mentioned above.
