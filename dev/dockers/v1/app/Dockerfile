FROM xemoe/forkxhop-v1/base-app:v1.0

LABEL "xemoe.product"="forkxhop-v1"
LABEL "xemoe.forkxhop-v1.service.name"="xemoe-forkxhop-v1-app"
LABEL "version"="1.0"

#
# Fix jre installation require man folder to exist on the server
# https://stackoverflow.com/questions/58160597/docker-fails-with-sub-process-usr-bin-dpkg-returned-an-error-code-1
#
RUN mkdir -p /usr/share/man/man1
RUN ln -sf /usr/share/zoneinfo/Asia/Bangkok /etc/localtime

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# WORKDIR /opt/composer
# COPY ./composer.json /opt/composer

# RUN composer install --no-scripts --no-autoloader

# Copy existing application directory contents
# COPY . /var/www
# Copy existing application directory permissions
# COPY --chown=www:www . /var/www

# WORKDIR /var/www
# RUN composer install --no-scripts --no-autoloader \
    # && apt-get clean \
    # && rm -rf /var/lib/apt/lists/*

# Change current user to www
# USER www

EXPOSE 9000
CMD ["php-fpm"]
