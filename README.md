![Build and deploy](https://github.com/initx/php-docker-skeleton/workflows/Build%20and%20deploy/badge.svg?branch=master)
# Example PHP app dockerized
This repository shows example usage of Docker in your PHP app.
It solves common problems when working with Docker on dev/prod environments.
- No more `permission denied` issues thanks to creating user with same ID as yours
- No more dev/prod Dockerfiles. Just one Dockerfile per container thanks to using multi-stage builds
- Easy & simple way to add another container such as redis, db and so on

Dockerfile's located in `.docker` and it's subdirectories.

App is built and pushed [through actions](https://github.com/initx/php-docker-skeleton/actions)
to AWS ECR and then deployed to ECS (Fargate). See `.github/workflows/build-and-deploy.yml`.

Live deploy [link here](http://php-docker-skeleton-1944113661.eu-west-1.elb.amazonaws.com)
## Try it out
### 1. Clone
```bash
$ git clone git@github.com:initx/php-docker-skeleton.git \
    && cd php-docker-skeleton
```
### 2. Run dev environment
```bash
$ docker-compose up -d
```
### 3. Dig into app container
```bash
$ docker exec -it app_php bash
```
Tip: it is cool to create alias for entering app container in your `.bashrc` or `.zshrc`:
```bash
alias app_bash='docker exec -it app_php bash'
```
### 4. Install dependencies
```bash
$ composer install
```
### 5. Visit [localhost:8080](http://localhost:8080)
