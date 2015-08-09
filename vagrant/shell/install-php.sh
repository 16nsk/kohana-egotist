#!/usr/bin/env bash

if [ ! -f /etc/php5/fpm/php.ini ]
then

    apt-get install -y php5-cli php5-curl php5-fpm php5-gd php5-mcrypt php5-mysql php5-xdebug

fi