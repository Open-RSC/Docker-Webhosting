# Open RSC Website
Purpose: to allow an instance for each domain and game and be accessible via a central website portal for visitors, effectively allowing unique websites per game 

This repository contains the Docker related files needed to run a container MariaDB database instance, Nginx web server container that may optionally tie into a Nginx proxy that automatically generates LetsEncrypt HTTPS certificates (https://gitlab.openrsc.com/open-rsc/docker-nginx-proxy), and a container that supports PHP-FPM with Laravel, Composer, PHPUnit, Node.js, Yarn, xdebug, and memcached built in.

Initial setup:

1. Edit ./env and ./openrsc_web/.env

2. Run the following commands

```
sudo make restart && sudo make update-laravel
```

3. If running on production, utilize this instead of the start/restart make command as it will use docker-compose.prod.yml:

```
sudo make start-prod
sudo make restart-prod
```