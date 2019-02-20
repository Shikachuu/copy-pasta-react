FROM alpine
RUN apk update
RUN apk add apache2 mysql mysql-client php7 php7-common php7-curl mongodb php7-pecl-mongodb
RUN apk upgrade
RUN rm -r /var/www
RUN mkdir /var/www
ADD . /var/www/html
EXPOSE 8080
