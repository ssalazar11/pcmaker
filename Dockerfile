# Fase 1: Construcción de Frontend con Node
FROM node:latest as frontend

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run dev

# Fase 2: Construcción de Backend con PHP
FROM php:8.0-fpm as backend

# Directorio de trabajo
WORKDIR /var/www

# Instalar dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar los archivos de frontend construidos desde la fase de build
COPY --from=frontend /app/public /var/www/public

# Copiar el código fuente de Laravel
COPY . .

# Copiar el archivo .env y otras configuraciones necesarias
# Asegúrate de tener un .env adecuado para la producción o configura el entorno aquí
# COPY .env.production .env

# Instalar dependencias de Laravel
RUN composer install --optimize-autoloader --no-dev

# Otorgar permisos para la carpeta storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto 9000 y arrancar php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
