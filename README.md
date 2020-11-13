<p align="center">NhanDuc Core</p

## Develop enviroment

- Laravel ^8.0
- PHP 7.4

## Team

Nhanduc,OtherMember

## Step to install

Repository: [https://github.com/nhandux/corelar](https://github.com/nhandux/corelar)

1. Clone from nhanduc core
```bash
git clone https://github.com/nhandux/corelar.git
```
2. Checkout to api branch (this is common branch for code vendor\nhanduc\core)
```bash
git checkout master
```
4. Change .env information for your local project like this ( if you are using Homestead)
```bash
# local
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=core
DB_USERNAME=homestead
DB_PASSWORD=secret
```

5. Generate application key and clear config default
```bash
php artisan key:generate
php artisan config:cache
php artisan migrate
```
## Route test
```bash
php artisan serve --port 80
```
Url: [http://localhost/nhanduc/contact](http://localhost/nhanduc/contact)



========
