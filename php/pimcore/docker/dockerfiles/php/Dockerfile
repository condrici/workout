FROM php:8.2-fpm

############################################################################
# Update Package Index Files on the System
############################################################################

RUN apt-get update

############################################################################
# Intall PHP Xdebug
#
# [NOTES]
# install, but also enable the extension
############################################################################

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

############################################################################
# Install Composer
#
# [NOTES]
# including curl and unzip (pre-requisites)
############################################################################

RUN apt-get install curl unzip -y
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

############################################################################
# Install Pimcore Requirements
#
# [NOTES]
# Installation order is important for some extensions
# Some requirements have been installed above (curl, unzip, composer)
############################################################################

RUN apt-get install zlib1g-dev libonig-dev libxml2-dev libpng-dev zip libzip-dev locales-all -y
RUN docker-php-ext-install mysqli pdo pdo_mysql intl opcache iconv dom simplexml gd exif fileinfo mbstring zip