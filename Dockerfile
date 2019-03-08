FROM php:7.2.9-fpm-alpine

# Install dependencies
RUN apk --no-cache update

# Add project
ADD . /app
RUN docker-php-ext-install mysqli
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb