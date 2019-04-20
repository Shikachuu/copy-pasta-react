FROM php:7.3.2-fpm
RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN docker-php-ext-install mysqli
RUN pecl install mongodb-1.6.0alpha1
RUN docker-php-ext-enable mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini
ADD . /app
