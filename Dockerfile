FROM php:8.3-apache

WORKDIR /srv/lukeblaney.co.uk

# Use the default production configuration
COPY php.ini /usr/local/etc/php/conf.d/
RUN echo "ServerName localhost\nServerAdmin webmaster@localhost" >> /etc/apache2/apache2.conf
COPY vhost.conf /etc/apache2/sites-available/lukeblaney.co.uk.conf
RUN a2ensite lukeblaney.co.uk

COPY src/. ./

ENV PORT 80
EXPOSE $PORT