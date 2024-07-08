FROM php:8.2-fpm-alpine3.17

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions  @composer-2 pdo_mysql xdebug

CMD composer install --ignore-platform-reqs && php-fpm

EXPOSE 9000