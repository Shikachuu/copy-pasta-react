FROM php:7.2.9-fpm-alpine

# Install dependencies
RUN apk --no-cache update
RUN apk install autoconf
# Enable mysqli and mongodb php extensions
RUN docker-php-ext-install mysqli
RUN pecl install mongodb
RUN docker-php-ext-install bcmath
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

# Add project
ADD . /app
