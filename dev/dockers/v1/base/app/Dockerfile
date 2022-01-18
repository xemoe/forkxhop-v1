FROM php:8.0-fpm

LABEL "xemoe.product"="forkxhop-v1"
LABEL "xemoe.forkxhop-v1.service.name"="xemoe-forkxhop-v1-app"
LABEL "version"="1.0"

RUN DEBIAN_FRONTEND=noninteractive apt-get update \
    && apt-get -q install -y \
    libmcrypt-dev openssl curl mariadb-client git zlib1g-dev libzip-dev unzip procps \
    git openssh-client vim sudo \
    && docker-php-ext-install \
    bcmath mysqli pdo pdo_mysql zip \
    && apt-get -q autoremove \
    && apt-get -q clean -y \
    && rm -rf /var/lib/apt/lists/* \
    && rm -f /tpm/pkg /var/cache/apt/*.bin \
    && pecl install redis xdebug \
    && docker-php-ext-enable redis xdebug \
    && curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer \
    && mkdir -p /opt/composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g"  "$PHP_INI_DIR/php.ini" \
    && sed -i -e "s/upload_max_filesize\s*=\s*2M/upload_max_filesize = 100M/g"  "$PHP_INI_DIR/php.ini" \
    && sed -i -e "s/post_max_size\s*=\s*8M/post_max_size = 100M/g"  "$PHP_INI_DIR/php.ini"
