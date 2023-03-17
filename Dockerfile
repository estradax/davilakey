FROM php:8.1-apache

RUN apt-get update && \
		apt-get upgrade -y && \
		apt-get install libzip-dev -y

RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV NODE_VERSION=18.15.0

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash

COPY conf/docker-apache.conf /etc/apache2/sites-enabled/000-default.conf

COPY conf/docker-apache-ports.conf /etc/apache2/ports.conf

RUN a2enmod rewrite

ENV NVM_DIR=/root/.nvm

RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}

RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}

RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}

ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

RUN npm install

RUN npm run build

RUN chown -R www-data:www-data /var/www/html/storage

RUN cp .env.example .env

RUN php artisan key:generate

RUN php artisan migrate

EXPOSE 8080

