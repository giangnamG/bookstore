FROM php:7.4-apache

RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

