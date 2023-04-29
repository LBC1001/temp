################################
# COMPOSER - load dependencies #
################################

# create layer
FROM composer as dependencies

# change directory
WORKDIR /app

# copy application files
COPY laravel /app/

# install dependencies
RUN composer install --quiet --no-interaction --no-scripts

########################
# NODE - build modules #
########################

# create layer
FROM node as builder

# change directory
WORKDIR /app

# copy application files
COPY --from=dependencies /app /app

# build modules
RUN npm install
RUN npm run production


############################
# PHP - application runner #
############################

# create layer
FROM php:8.1-fpm

# change directory
WORKDIR /app

# copy application files
COPY --from=builder /app /app

# install dependencies
RUN apt update -y && apt install -y libzip-dev unzip

# configure extensions
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql

# open port
EXPOSE 8000

# define run command
CMD php artisan serve --host=0.0.0.0 --port=8000