# PHP-FPM
FROM php:8.2-fpm-alpine3.17 as fpm

ARG USER='www-data'
ARG GROUP='www-data'

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions @composer-2 \
    bcmath mcrypt pdo_mysql gd intl opcache \
    && apk --no-cache add bash

RUN apk add --no-cache linux-headers \
	&& apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS\
	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug \
	&& pecl clear-cache \
	&& apk del .build-dependencies

WORKDIR /var/www/html

USER ${USER}

CMD php-fpm
EXPOSE 9000