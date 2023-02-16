apk update 
apk upgrade
apk add git
apk add curl
apk add nginx
apk add php
apk add bash


# INSTALL COMPOSER
RUN curl -s https://getcomposer.org/installer | php
RUN alias composer='php composer.phar'

