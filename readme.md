Gym for Gym
===========

## Docker

Add `localhost  www.gymforgym.dev` to `/etc/hosts`.

```bash
cd laradock
docker-compose up -d caddy postgres php-fpm redis beanstalkd elasticsearch
```

Visit [https://www.gymforgym.dev](https://www.gymforgym.dev).
