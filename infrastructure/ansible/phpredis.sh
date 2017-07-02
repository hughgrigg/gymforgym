#!/usr/bin/env bash

mkdir -p ~/installs
cd ~/installs/
git clone https://github.com/phpredis/phpredis.git
cd phpredis
git checkout php7
phpize
./configure
make && make install
echo "extension=redis.so" > /etc/php/7.0/fpm/conf.d/20-redis.ini
echo "extension=redis.so" > /etc/php/7.0/cli/conf.d/20-redis.ini
