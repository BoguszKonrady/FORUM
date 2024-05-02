# Użyj oficjalnego obrazu PHP z serwerem Apache
FROM php:7.4-apache

# Skopiuj pliki aplikacji do katalogu /var/www/html w kontenerze
COPY . /var/www/html

# Zdefiniuj port, który będzie wystawiony na zewnątrz kontenera
EXPOSE 80
