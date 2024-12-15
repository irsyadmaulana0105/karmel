# Gunakan image PHP dengan Nginx sebagai base image
FROM php:7.4-fpm-alpine

# Install dependensi lain jika diperlukan
RUN apk --no-cache add nginx

# Salin file konfigurasi nginx
COPY nginx.config /etc/nginx/nginx.conf

# Salin file aplikasi PHP ke direktori kerja di container
COPY index.php /var/www/karmel/index.php
COPY link.php /var/www/karmel/link.php
COPY lib/ /var/www/karmel/lib/
COPY css/ /var/www/karmel/css/
COPY js/ /var/www/karmel/js/

# Set direktori kerja untuk aplikasi
WORKDIR /var/www/karmel

# Expose port yang digunakan oleh nginx
EXPOSE 80

# Start nginx dan PHP-FPM
CMD ["sh", "-c", "nginx -g 'daemon off;' & php-fpm"]
