# Użyj oficjalnego obrazu PHP z serwerem Apache
FROM php:7.4-apache

# Zainstaluj rozszerzenie mysqli
RUN docker-php-ext-install mysqli

# Zainstaluj niezbędne pakiety
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    vim \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql


# Dodaj linię allow_url_fopen do pliku php.ini
RUN echo "allow_url_fopen = On" >> /usr/local/etc/php/php.ini

# Skopiuj pliki aplikacji do katalogu /var/www/html w kontenerze
COPY . /var/www/html
COPY forum.com.conf /etc/apache2/sites-available/
RUN chown -R www-data:www-data /var/www/html \ 
    && chmod -R 755 /var/www/html

RUN a2ensite forum.com
# Wyłącz domyślny host
RUN a2dissite 000-default.conf
# Upewnij się, że mod_rewrite jest włączony
RUN a2enmod rewrite
# Instalacja Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Zdefiniuj port, który będzie wystawiony na zewnątrz kontenera
EXPOSE 80
