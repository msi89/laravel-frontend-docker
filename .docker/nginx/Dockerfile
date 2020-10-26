FROM nginx:stable-alpine

ADD ./.docker/nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 admin05ru && adduser -G admin05ru -g admin05ru -s /bin/sh -D admin05ru

RUN chown admin05ru:admin05ru /var/www/html