### Getting Started
- [x] build base image `make docker-images-v1-base-app`
- [x] copy base .env `cp docker.env.default docker.env` and update your `${DOMAIN_NAME}` `${DB_NAME}` `${DB_PASSWORD}`
- [x] create docker network `docker network create nginx-proxy`
- [x] start container `docker-compose --env-file=./docker.env -f ./docker-compose.nginx.yml up -d`
- [x] check docker ps `docker-compose --env-file=./docker.env -f ./docker-compose.nginx.yml ps`
