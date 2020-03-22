FROM nginx:stable

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
