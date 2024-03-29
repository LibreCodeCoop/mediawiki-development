ARG MEDIAWIKI_VERSION
FROM mediawiki:${MEDIAWIKI_VERSION}

RUN apt-get update && apt-get install -y \
    rsync

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions \
    @composer \
    gd \
    memcache \
    memcached \
    pdo_mysql \
    xdebug \
    && rm /usr/local/bin/install-php-extensions \
    # pevent errors when try to create files at /var/www with user www-data
    && chown -R www-data /var/www

COPY scripts/* /var/www/scripts/
COPY config/php/* /usr/local/etc/php/conf.d/

WORKDIR /var/www/mediawiki

ENTRYPOINT [ "bash", "/var/www/scripts/entrypoint.sh" ]
