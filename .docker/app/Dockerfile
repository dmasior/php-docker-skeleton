# Multi-stage build for app. More info: https://docs.docker.com/develop/develop-images/multistage-build

##### Stage 0: Prepare #####
FROM php:7.4-fpm as prepare

RUN apt update && apt install -y git libzip-dev

RUN pecl install redis zip \
    && docker-php-ext-enable redis zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require hirak/prestissimo

# Add group and user to avoid read/write permission issues
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN groupadd -g $GROUP_ID app
RUN useradd -d /home/app -s /bin/bash -u $USER_ID -g $GROUP_ID app

WORKDIR /php/src/initx/php-docker-skeleton

COPY . .

##### Stage 1: Prod #####
FROM prepare as prod

RUN composer install --no-ansi --no-dev --no-interaction \
    --no-progress --no-scripts --no-suggest --optimize-autoloader

# Cleanup
RUN composer global remove hirak/prestissimo \
    && rm /usr/local/bin/composer \
    && apt remove -y git && apt autoremove -y

RUN chown -R app:app /php/src/initx/php-docker-skeleton
USER app

##### Stage 2: Dev #####
FROM prepare as dev

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN composer install --no-ansi --no-interaction \
    --no-progress --no-scripts --no-suggest --optimize-autoloader

RUN chown -R app:app /php/src/initx/php-docker-skeleton
USER app
