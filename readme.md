Gym for Gym
===========

[![Build Status](https://travis-ci.org/hughgrigg/gymforgym.svg?branch=master)](https://travis-ci.org/hughgrigg/gymforgym)
[![Coverage Status](https://coveralls.io/repos/github/hughgrigg/gymforgym/badge.svg?branch=master)](https://coveralls.io/github/hughgrigg/gymforgym?branch=master)

## Docker

Add `localhost  www.gymforgym.dev` to `/etc/hosts`.

```bash
cd laradock
docker-compose up -d caddy postgres php-fpm redis beanstalkd elasticsearch
```

Visit [https://www.gymforgym.dev](https://www.gymforgym.dev).

To enter a container:

```bash
cd laradock
docker-compose exec workspace bash
```

Where `workspace` is the container you want to enter.

To see container IPs:

```bash
docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)
```

Run tests from host:

```bash
docker-compose exec workspace bash -c "/var/www/vendor/bin/phpunit"
```
