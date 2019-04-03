FROM php:7.2.7-fpm-alpine3.7
RUN apk update; \
    apk upgrade && \
    apk update && \
    apk add libzip-dev && \
    apk add php7-pear php7-curl php7-dev php7-gd php7-mbstring php7-zip php7-xml;
RUN docker-php-ext-install mysqli zip
#zip
#php-pear curl gd mbstring xml
