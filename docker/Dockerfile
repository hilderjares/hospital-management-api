############################## BASE #####################################
FROM ubuntu:latest as base

RUN apt-get update \
    && apt-get -y install software-properties-common \
    && add-apt-repository ppa:ondrej/php

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get -y install tzdata

RUN apt-get update && \
    apt-get -y upgrade && \
    apt-get -y install \
    apache2 \
    unzip \
    php7.3 \
    php7.3-cli \
    libapache2-mod-php7.3 \
    php7.3-gd \
    php7.3-curl \
    php7.3-json \
    php7.3-mbstring \
    php7.3-mysql \
    php7.3-xml \
    php7.3-xsl \
    php7.3-zip \
    php7.3-tokenizer \
    php7.3-pdo
##########################################################################
FROM base as dependencies 

RUN useradd me

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY /composer.json /home/me/.composer/composer.json
RUN chown -R me:me /home/me/.composer

##########################################################################
FROM dependencies as cli

USER me

WORKDIR /var/www

############################ SERVER ######################################
FROM base

RUN a2enmod php7.3
RUN a2enmod rewrite

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

COPY php.ini /etc/php/7.3/apache2/php.ini

ADD app.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80

CMD /usr/sbin/apache2ctl -D FOREGROUND