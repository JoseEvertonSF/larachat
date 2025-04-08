FROM php:8.3-fpm

ARG user=dev
ARG uid=1000

RUN apt-get update && apt-get install -y \ 
    libzip-dev \
    libxml2-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
    curl \
    nodejs \
    npm \
    git \
    zip \
    unzip
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip \
    && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/larachat \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install exif \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install gd \
    && docker-php-ext-install sockets \
    && docker-php-ext-install soap \
    && docker-php-ext-install calendar \
    && docker-php-ext-configure calendar

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \ 
    chown -R $user:$user /home/$user

