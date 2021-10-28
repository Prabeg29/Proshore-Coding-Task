# Blog using OOP PHP with MVC architecture

1. Clone the Repository
2. Go the project directory
```sh
cd /path/to/project/dir
```
3. Run
```sh
composer install
```
4. Copy the .env.example as .env file and add your db credentials
5. Run migrations
```php
php src/Migrations/Migration.php
```
6. Head to public dir
7. Start php built-in server
```php
php -S localhost:8080