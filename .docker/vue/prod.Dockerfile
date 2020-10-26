FROM node:12.2.0-alpine as build

ARG API_URL
ENV VUE_APP_API_URL ${API_URL}


WORKDIR /var/www/vue

COPY ./vue /var/www/vue

RUN npm install -g yarn

RUN yarn install --silent
RUN yarn build


FROM nginx as production

COPY ./.docker/vue/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=build /var/www/vue/dist /usr/share/nginx/html

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]