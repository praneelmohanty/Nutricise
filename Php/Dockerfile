FROM php:8.2-apache

# Enable mysqli + PDO MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache should serve files from the project root
COPY . /var/www/html/

# Allow .htaccess overrides if you add any later
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf

# Render injects $PORT; default Apache to listen on it
ENV PORT=80
EXPOSE 80