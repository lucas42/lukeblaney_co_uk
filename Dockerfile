FROM alpine AS hugo-build

WORKDIR /hugo
RUN apk add --repository=https://dl-cdn.alpinelinux.org/alpine/edge/community hugo
COPY src/. .
RUN hugo

FROM httpd:2.4.65-alpine

WORKDIR /usr/local/apache2/lukeblaney.co.uk/

RUN rm /usr/local/apache2/htdocs/*
RUN echo "ServerName localhost" >> /usr/local/apache2/conf/httpd.conf
RUN echo "Include conf/vhost.conf" >> /usr/local/apache2/conf/httpd.conf
RUN echo "LoadModule negotiation_module modules/mod_negotiation.so" >> /usr/local/apache2/conf/httpd.conf
COPY src/vhost.conf /usr/local/apache2/conf/


COPY --from=hugo-build /hugo/public/. ./

ENV PORT 80
EXPOSE $PORT