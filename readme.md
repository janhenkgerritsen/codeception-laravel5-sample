# Sample Laravel Application with Codeception tests.

[![Build Status](https://travis-ci.org/janhenkgerritsen/codeception-laravel5-sample.svg?branch=codeception-2.1)](https://travis-ci.org/janhenkgerritsen/codeception-laravel5-sample)

### Setup

You can setup this sample manually or use [Vagrant](https://www.vagrantup.com/) to automatically set up a development environment for you.

#### Manual
- Clone repo
- Create your .env file from the example file: `cp .env.testing .env`
- Install composer dependencies: `composer install`
- Create databases by creating the following files:
    - `storage/database.sqlite`
    - `storage/testing.sqlite`
- Run the following commands:
    - `php artisan migrate`
    - `php artisan migrate --database=sqlite_testing`
- Server: run `php -S localhost:8000 -t public`
- Browse to localhost:8000/posts

#### Vagrant
- Clone repo
- Cd into the cloned directory
- Run vagrant up

To SSH into the machine to run your tests, run ```vagrant ssh```. You can access the app on the guest vm under http://192.168.10.10/.

### To test

Run Codeception, installed via Composer

```
./vendor/bin/codecept build
./vendor/bin/codecept run
```

## Tests

Please check out some [good test examples](https://github.com/janhenkgerritsen/codeception-laravel5-sample/tree/codeception-2.1/tests) provided.

### Functional Tests

Demonstrates testing of [CRUD application](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/codeception-2.1/tests/functional/PostCrudCest.php) with

* [PageObjects](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/codeception-2.1/tests%2Ffunctional%2F_pages%2FPostsPage.php)
* [authentication](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/codeception-2.1/tests%2Ffunctional%2FAuthCest.php) (by user, credentials, http auth)
* usage of session variables
* [routes](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/codeception-2.1/tests%2Ffunctional%2FRoutesCest.php)
* creating and checking records in database
* testing of form errors

### API Tests

Demonstrates functional [testing of API](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/codeception-2.1/tests%2Fapi%2FPostsResourceCest.php) using REST and Laravel5 modules connected, with

* partial json inclusion in response
* GET/POST/PUT/DELETE requests
* check changes inside database
