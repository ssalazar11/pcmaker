# Usar la imagen base de PHP con Apache
FROM php:8.1.4-apache

# Instalar dependencias
RUN apt-get update -y && apt-get install -y openssl zip unzip git libpng-dev

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo_mysql gd

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Copiar archivos de la aplicación
COPY . /var/www/html

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias de Composer
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Agregar Laravel UI y configurar Bootstrap con autenticación
RUN composer require laravel/ui \
    && php artisan ui bootstrap --auth --quiet

# Instalar dependencias de Node y compilar activos
RUN npm install && npm run prod

# Configurar Laravel
RUN php artisan key:generate
RUN php artisan migrate
RUN chmod -R 777 storage

# Cambiar la propiedad de los directorios al usuario www-data
RUN chown -R www-data:www-data /var/www/html

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Asegurarse de que todos los directorios de Laravel tienen los permisos correctos
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Exponer el puerto 80
EXPOSE 80

# Script de inicio personalizado (si es necesario)
# COPY start.sh /usr/local/bin/start.sh
# RUN chmod +x /usr/local/bin/start.sh
# CMD ["start.sh"]

# Comando por defecto para iniciar Apache
CMD ["apache2-foreground"]
