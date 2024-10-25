# Utilise une image officielle PHP avec Apache
FROM php:8.1-apache

# Définit le répertoire de travail dans le conteneur
WORKDIR /var/www/html

# Copie tous les fichiers de l'application dans le répertoire de travail du conteneur
COPY . /var/www/html

# Installe Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installe les dépendances si un fichier composer.json existe
RUN if [ -f "composer.json" ]; then composer install; fi

# Expose le port 80 pour accéder à l'application
EXPOSE 80
# Commande de démarrage de l'application
CMD ["php -S 127.0.0.1:8000"]
