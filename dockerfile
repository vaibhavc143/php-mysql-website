# Use a PHP base image
FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/html

# Copy your PHP application files
COPY . .

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 80 for the web server
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]