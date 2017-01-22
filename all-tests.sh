#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

export PATH=$PATH:$PWD/vendor/bin/
phpcs -v --standard=./tests/analysis/phpcs.xml app
phpmd --strict app text ./tests/analysis/phpmd.xml
gulp scss-lint
php artisan route:cache
php artisan config:clear
gulp test-database
phpunit --coverage-html build --coverage-clover build/clover.xml
