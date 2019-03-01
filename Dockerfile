FROM php:7.2.9-fpm-alpine

# Install dependencies
RUN apk --no-cache update

# Add project
ADD . /app
ADD ./manifest/php/mongodb.so /usr/local/lib/php/extensions/no-debug-non-zts-20170718/