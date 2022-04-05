FROM php:5.4-apache

WORKDIR /var/www/html

# Use the default production configuration
COPY php.ini /usr/local/etc/php/conf.d/
RUN echo "ServerName localhost\nServerAdmin webmaster@localhost" >> /etc/apache2/apache2.conf
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

COPY src/. ./

ENV PORT 80
EXPOSE $PORT