# laravel8 Coreui Admin Template

>
> This repository contains docker-compose + Dockerfile with the following services
> 1. laravel8 app + mariadb
> 2. nginx + dockergen + letsencrypt (separate docker-compose file)
> 


### Getting Started
- [x] build base image `make docker-images-v1-base-app`
- [x] copy base .env `cp docker.env.default docker.env`
- [x] update `docker.env` change your `${DOMAIN_NAME}` `${DB_NAME}` `${DB_PASSWORD}`
- [x] create docker network `docker network create nginx-proxy`
- [x] start container `docker-compose --env-file=./docker.env -f ./docker-compose.nginx.yml -f ./docker-compose.yml up -d`
- [x] check docker ps `docker-compose --env-file=./docker.env -f ./docker-compose.nginx.yml -f ./docker-compose.yml ps`

---
### Contributors
<a href="https://github.com/xemoe"><img src="https://avatars.githubusercontent.com/u/848552?v=4" title="Xemoe Teerapong" width="50" height="50"></a>
