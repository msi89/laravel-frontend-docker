# Laravel with javascript framework using docker

```bash
cd src && git clone https://github.com/laravel/laravel.git
```

### 1. Laravel

#### build project containers

```bash
docker-compose build
```

#### install dependencies

```bash
 docker-compose run --rm www composer install
```

#### copy .env file

```bash
cd src && cp .env.example .env
```

#### generate key

```bash
docker-compose run --rm www php artisan key:generate
```

#### migrate database

```bash
docker-compose run --rm www php artisan migrate
```

#### run project

```bash
 docker-compose up -d nginx
```

remove flag `-d` if want to show logs

#### run pgadmin (optional)

```bash
docker-compose up -d pgadmin
```

#### run redis (optional)

```bash
docker-compose up -d redis
```

#### for image management

add `GLIDE_KEY` in `.env` and generate key value using below command

```bash
docker-compose run --rm www openssl rand -base64 64
```

#### Background jobs

- Run emails queue

```bash
docker-compose run --rm www  php artisan queue:work --tries=3 --queue=emails
```

- Run default queue

```bash
docker-compose run --rm www php artisan queue:work --tries=3
```

#### Database console management

```bash
docker-compose run --rm  db psql marketplace05ru admin05ru # postgres console
```

### 2. Vue/React

```bash
docker-compose run --rm  vue yarn install # replace `vue` by `react` if you to use react
```
