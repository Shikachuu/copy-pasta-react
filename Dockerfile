FROM php:7.2.9-fpm-alpine

# Install dependencies
RUN apk --no-cache update

# Add project
ADD . /app
