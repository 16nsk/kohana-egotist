#!/usr/bin/env bash

if [ ! -f /etc/nginx/.provisioned ]
then

    sed -i 's/worker_processes 4/worker_processes 1/g' /etc/nginx/nginx.conf
    sed -i 's/# multi_accept on/multi_accept on/g' /etc/nginx/nginx.conf
    sed -i 's/sendfile on/sendfile off/g' /etc/nginx/nginx.conf

    rm -f /etc/nginx/nginx.conf
    rm -f /etc/nginx/sites-available/default
    cp /vagrant/etc/nginx/nginx.conf /etc/nginx/nginx.conf
    cp /vagrant/etc/nginx/sites-available/default /etc/nginx/sites-available/default

    /etc/init.d/nginx restart

    touch /etc/nginx/.provisioned

fi