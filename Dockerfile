# Usar una imagen base con PHP y Apache
FROM php:8.2-apache

# Copiar todos los archivos PHP al directorio web de Apache
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Habilitar mod_rewrite de Apache (para URLs amigables)
RUN a2enmod rewrite

# Exponer el puerto 80 (HTTP)
EXPOSE 80