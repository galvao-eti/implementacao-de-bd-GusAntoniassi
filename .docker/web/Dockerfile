FROM php:7.3-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql