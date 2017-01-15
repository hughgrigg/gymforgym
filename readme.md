Gym for Gym
===========

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
