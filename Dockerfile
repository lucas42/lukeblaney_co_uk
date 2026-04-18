FROM alpine AS hugo-build

ARG HUGO_VERSION=0.160.1
WORKDIR /hugo
RUN apk add --no-cache wget ca-certificates && \
    wget -q "https://github.com/gohugoio/hugo/releases/download/v${HUGO_VERSION}/hugo_${HUGO_VERSION}_linux-amd64.tar.gz" && \
    tar xzf "hugo_${HUGO_VERSION}_linux-amd64.tar.gz" hugo && \
    mv hugo /usr/local/bin/ && \
    rm "hugo_${HUGO_VERSION}_linux-amd64.tar.gz"
COPY src/. .
RUN hugo

FROM httpd:2.4.66-alpine
ARG VERSION
ENV VERSION=$VERSION

WORKDIR /usr/local/apache2/lukeblaney.co.uk/

RUN rm /usr/local/apache2/htdocs/*
RUN echo "ServerName localhost" >> /usr/local/apache2/conf/httpd.conf
RUN echo "Include conf/vhost.conf" >> /usr/local/apache2/conf/httpd.conf
RUN echo "LoadModule negotiation_module modules/mod_negotiation.so" >> /usr/local/apache2/conf/httpd.conf
COPY src/vhost.conf /usr/local/apache2/conf/


COPY --from=hugo-build /hugo/public/. ./
