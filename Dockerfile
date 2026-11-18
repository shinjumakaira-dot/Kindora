FROM php:8.3-apache

WORKDIR /var/www/html

# Menyalin folder frontend Kindora
COPY frontend/ ./frontend/

# Mengaktifkan Apache rewrite
RUN a2enmod rewrite

EXPOSE 80