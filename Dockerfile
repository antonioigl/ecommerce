#-----------------------------------------------------------------------
# To create the docker image :
# cd <this file directory>
# docker build -t ecommerce .
#
# Start image :
#docker-compose up

#after
#docker-compose exec ecommerce ./init.bash

#or execute
#docker-compose exec ecommerce composer install
#docker-compose exec ecommerce php artisan key:generate
#docker-compose exec ecommerce php artisan migrate:fresh --seed
#chmod -R 775 storage

#
# Open browser :
# http://localhost:8082
# or (configure local files blog.local to /etc/hosts)
# http://ecommerce.local:8082
#-----------------------------------------------------------------------

FROM php:7.2-apache

RUN apt-get -qq update \
 && apt-get -qq -y install libmcrypt-dev git vim nano zip unzip default-mysql-client bzip2 zlib1g-dev libmemcached-dev \
 && pecl install mcrypt-1.0.1 \
 && docker-php-ext-enable mcrypt \
 && docker-php-ext-install pdo_mysql \
 && docker-php-ext-install mysqli

RUN echo 'alias ll="ls -la"' >> ~/.bashrc

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN a2enmod rewrite
RUN service apache2 restart
