# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Instala extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd mbstring zip exif pcntl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia los archivos de la aplicación
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Ajusta permisos
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Instala dependencias de Composer
RUN composer install --prefer-dist --no-scripts --no-dev --optimize-autoloader

# Expone el puerto 80
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]