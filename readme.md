# Sample Laravel Application with Codeception tests.

[![Build Status](https://travis-ci.org/janhenkgerritsen/codeception-laravel5-sample.svg?branch=master)](https://travis-ci.org/janhenkgerritsen/codeception-laravel5-sample)

### Setup

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

### To test

Run Codeception, installed via Composer

```
./vendor/bin/codecept run
```

## Tests

Please check out some [good test examples](https://github.com/janhenkgerritsen/codeception-laravel5-sample/tree/master/tests) provided.

### Functional Tests

Demonstrates testing of [CRUD application](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/master/tests/functional/PostCrudCest.php) with

* [PageObjects](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/master/tests%2Ffunctional%2F_pages%2FPostsPage.php)
* [authentication](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/master/tests%2Ffunctional%2FAuthCest.php) (by user, credentials, http auth)
* usage of session variables
* [routes](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/master/tests%2Ffunctional%2FRoutesCest.php)
* creating and checking records in database
* testing of form errors

### API Tests

Demonstrates functional [testing of API](https://github.com/janhenkgerritsen/codeception-laravel5-sample/blob/master/tests%2Fapi%2FPostsResourceCest.php) using REST and Laravel5 modules connected, with

* partial json inclusion in response
* GET/POST/PUT/DELETE requests
* check changes inside database
