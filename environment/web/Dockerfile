# Latest LTS version
FROM ubuntu:latest

# Initial repostiory update
RUN apt-get update

# Get access to software repository tools (add-apt-repository etc)
RUN apt-get install -y software-properties-common

# Add onddrej/php repository
RUN add-apt-repository ppa:ondrej/php -y

# Install software
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    curl \
    tzdata \
    php7.3-cli \
    php7.3-fpm \
    php7.3-pgsql \
    php7.3-mysql \
    php7.3-curl \
    php7.3-json \
    php7.3-opcache \
    php7.3-readline \
    php7.3-zip \
    php7.3-xml \
    php7.3-mbstring \
    php7.3-gd \
    php7.3-bcmath \
    php-xdebug \
    nginx \
    supervisor


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Configure..
RUN mkdir /run/php \
    && echo "daemon off;" >> /etc/nginx/nginx.conf

COPY default /etc/nginx/sites-available/default
COPY php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf
COPY php.ini /etc/php/7.3/fpm/php.ini
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY xdebug.ini /etc/php/7.3/mods-available/xdebug.ini

EXPOSE 80

ENTRYPOINT ["supervisord"]
