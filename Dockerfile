FROM php:8.1.4-apache

# Instalar dependencias
RUN apt-get update -y && apt-get install -y openssl zip unzip git 

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar archivos de la aplicación
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess

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

# Configurar Laravel
RUN php artisan key:generate
RUN php artisan migrate

# Cambiar la propiedad de los directorios al usuario www-data
RUN chown -R www-data:www-data /var/www/html

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite
RUN service apache2 restart

# Instalar Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Instalar dependencias de Node
RUN npm install

# Asegurarse de que todos los directorios de Laravel tienen los permisos correctos
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Exponer el puerto (opcional, dependiendo de tu configuración)
EXPOSE 3000

# Comando para ejecutar npm run dev
CMD ["npm", "run", "dev"]
