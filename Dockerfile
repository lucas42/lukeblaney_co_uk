# Named stage so Dependabot tracks the pin and arm64 builds can resolve the plain manifest.
# Plain manifest (application/vnd.docker.distribution.manifest.v2+json) — no platform claim.
# See lukeblaney_co_uk#63 and lucos_deploy_orb#186.
FROM docker.io/lucas42/lukeblaney_cv:1.0.16@sha256:a05bbfbef9cad358b2e41169176fb904f57485a61c2c6d72e37cd5be2348c4bd AS cv

FROM alpine AS hugo-build

WORKDIR /hugo
RUN apk add --repository=https://dl-cdn.alpinelinux.org/alpine/edge/community hugo
COPY src/. .
COPY --from=cv /cv.pdf /cv-extended.pdf /cv.docx /cv-extended.docx /cv.md /cv-extended.md /hugo/static/
RUN hugo

FROM httpd:2.4.68-alpine
ARG VERSION
ENV VERSION=$VERSION

WORKDIR /usr/local/apache2/lukeblaney.co.uk/

RUN rm /usr/local/apache2/htdocs/*
RUN echo "ServerName localhost" >> /usr/local/apache2/conf/httpd.conf
RUN echo "Include conf/vhost.conf" >> /usr/local/apache2/conf/httpd.conf
RUN echo "LoadModule negotiation_module modules/mod_negotiation.so" >> /usr/local/apache2/conf/httpd.conf
COPY src/vhost.conf /usr/local/apache2/conf/


COPY --from=hugo-build /hugo/public/. ./
