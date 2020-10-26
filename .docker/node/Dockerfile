FROM node:12.2.0-alpine as build

ARG API_URL
ENV VUE_APP_API_URL ${API_URL}


WORKDIR /var/www/node

COPY ./frontend /var/www/node

RUN npm install -g yarn

EXPOSE 8080
CMD ["yarn", "serve"]
