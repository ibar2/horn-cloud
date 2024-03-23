FROM php:apache
WORKDIR /var/www/html
COPY . /var/www/html
RUN apt-get update && \
    apt-get install -y \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*
ENV COMPOSER_ALLOW_SUPERUSER 1
# RUN docker-php-ext-install intl
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer install
RUN a2enmod rewrite
EXPOSE 80
CMD ["apache2-foreground"]