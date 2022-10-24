# laravel8 Coreui Admin Template

>
> This repository contains docker-compose + Dockerfile with the following services
> 1. laravel8 app + mariadb
> 2. nginx + dockergen + letsencrypt (separate docker-compose file)
> 

### Getting Started
- [x] Copy base .env `cp docker.env.default docker.env`
- [x] Update `docker.env` change your `${DOMAIN_NAME}` `${DB_NAME}` `${DB_PASSWORD}`
- [x] For local running, update your hosts file with `127.0.0.1 ${DOMAIN_NAME}`
  - Linux > `/etc/hosts`
  - Windows > `C:\Windows\System32\drivers\etc\hosts`
- [x] Build base image
  - Linux with **make** command 
    ```shell
    make docker-images-v1-base-app
    ```
  - Windows use following **PowerShell** command
    ```shell
    docker image build --force-rm --no-cache --tag="xemoe/forkxhop-v1/base-app:v1.0" .\dev\dockers\v1\base\app\
    ```
- [x] Create docker network `docker network create nginx-proxy`
- [x] Start container `docker-compose --env-file=./docker.env -f ./docker-compose.nginx.yml -f ./docker-compose.yml up -d`
- [x] Check docker ps `docker-compose --env-file=./docker.env -f ./docker-compose.nginx.yml -f ./docker-compose.yml ps`

### App Container won't start & Workaround
1. App Image is broken, Missing composer scripts
2. Missing composer vendor files
3. Missing .env
4. Missing db migrate
5. Need to update hosts file with domain name

```shell
# Enter the container
docker-compose --env-file=./docker.env exec app bash

# 1. App Image is broken, Missing composer scripts
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
composer

# 2. Missing composer vendor files
cd /opt/composer/
cp /var/www/composer.json /opt/composer/
composer install --no-scripts --no-autoloader
cp -r . /var/www

# 3. Missing .env
cd /var/www/
mkdir -p ./storage/{app,logs} >/dev/null 2>&1
mkdir -p ./storage/framework/{sessions,views,cache} >/dev/null 2>&1
chmod -R 777 ./storage
composer run-script post-root-package-install
composer install --no-scripts --no-autoloader 
php artisan key:generate

# 4. Missing db migrate
php artisan migrate
php artisan db:seed
```

---
### Contributors
<a href="https://github.com/xemoe">
    <img src="https://avatars.githubusercontent.com/u/848552?v=4" title="Xemoe Teerapong" width="50" height="50">
</a>
