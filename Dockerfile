FROM php:7.2.9-fpm-alpine

# Install dependencies
RUN apk --no-cache update \
	&& add mysql mongodb

# Add project
ADD . /app



EXPOSE 80
