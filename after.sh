#!/bin/bash

set -e

cd code

sudo -u vagrant -H bash -c "cp .env.testing .env; \
  composer install -n --prefer-dist; \
  if [ ! -f ~/.key_generated ]; then php artisan key:generate; touch ~/.key_generated; fi; \
  touch storage/database.sqlite; \
  touch storage/testing.sqlite; \
  php artisan migrate; \
  php artisan migrate --database=sqlite_testing;"
