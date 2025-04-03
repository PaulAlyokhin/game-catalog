Laravel Game Catalog

Used services:
- PHP 8.4
- Laravel 12.5.0
- MySQL 8.0
- phpMyAdmin

Installation & deployment:
- Check Docker availability
- Clone git repository
- Open terminal & move to the root of the cloned repository folder
- Install or update composer dependencies by command
        ./vendor/bin/sail composer install/update
- Create .env file with all needed environment settings
- Generate app key using command
        ./vendor/bin/sail artisan key:generate
- Run application with command
        ./vendor/bin/sail up -d
- Run migrations with command
        ./vendor/bin/sail artisan migrate
- Open your web-browser and follow to the http://localhost
