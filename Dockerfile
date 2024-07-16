FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Install Laravel Installer
RUN composer global require laravel/installer

# Add composer vendor binaries to PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

# Copy existing application directory contents
COPY . .

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
