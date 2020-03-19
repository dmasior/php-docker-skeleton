# Example PHP app dockerized
This repository is a example of how to use Docker in your PHP app.
Dockerfile's located in `.docker` dir and it's subdirectories.
There is support for two environments: development and production.
Main difference between dev and prod envs is prod contains minimal software required to run app.
Dev env contains additions like xdebug, phpunit and so on.
## Usage
### Run development-ready environment
```bash
$ git clone git@github.com:initx/php-docker-skeleton.git \
    cd php-docker-skeleton && docker-compose up -d
```
### Dig into app container
```bash
$ docker exec -it app-dev bash
```
Inside you can run tools, just by typing:
```bash
$ composer update
```

You should not need to build prod images on your computer (it is done in github actions).
But when needed, you can build them with following commands:
```bash
$ docker build --file .docker/app/Docker --tag app-prod --target prod . \
    && docker build --file .docker/nginx/Docker --tag app-nginx-prod .
```
