FROM php:apache

# Install extensions
RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pgsql pdo_pgsql
RUN a2enmod rewrite

# Copy the code and .htaccess file
ADD ./ /var/www/html
