<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#Installation

Type git clone, and then paste the URL you copied earlier.
```shell
$ git clone https://github.com/YOUR-USERNAME/YOUR-REPOSITORY
```
## Test Laravel Vue App
CD project
Open the first terminal and execute the following artisan command.

```bash
composer install
php artisan key:generate
```
set configs in .env
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
#DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=brand
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=sendmail
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=YOUR_GMAIL
MAIL_PASSWORD=YOUR_GMAIL_PASSWORD
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=FROM_GMAIL
MAIL_FROM_NAME="${APP_NAME}"
```
run migration
```bash
php artisan migrate
```
run project to 8000 port
```bash
php artisan serve --port=8000
```
##Please disable cors problem with google extension

#Then
cd vue-webpack and run 
```bash
npm install
npm run dev
```
open browser and go to this link
```flow js
localhost:8080/brand
```
