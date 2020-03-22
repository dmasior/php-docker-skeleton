# Multi-stage build. More info: https://docs.docker.com/develop/develop-images/multistage-build

##### Stage 0: Prepare #####
FROM nginx:stable as prepare

ENV APP_DIR=/php/src/initx/php-docker-skeleton

# Add group and user to avoid read/write permission issues
ENV USER_ID=1000
ENV GROUP_ID=1000
RUN groupadd -g $GROUP_ID app
RUN useradd -d /home/app -s /bin/bash -u $USER_ID -g $GROUP_ID app

RUN apt update && apt install -y curl

COPY .docker/nginx/nginx.conf /etc/nginx/
COPY .docker/nginx/app.conf /etc/nginx/conf.d/

RUN rm /etc/nginx/conf.d/default.conf

WORKDIR $APP_DIR

COPY . .

CMD ["nginx"]

EXPOSE 80

HEALTHCHECK --timeout=3s \
  CMD curl -f localhost:80/ || exit 1

##### Stage 1: Prod #####
FROM prepare as prod
RUN echo "upstream app-upstream { server 0.0.0.0:9001; }" > /etc/nginx/conf.d/upstream.conf

##### Stage 1: Prod #####
FROM prepare as dev
RUN echo "upstream app-upstream { server app:9001; }" > /etc/nginx/conf.d/upstream.conf
