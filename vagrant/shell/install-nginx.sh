#!/usr/bin/env bash

if [ ! -f /etc/nginx/nginx.conf ]
then

    apt-get install -y nginx-full nginx
    /etc/init.d/nginx start

fi