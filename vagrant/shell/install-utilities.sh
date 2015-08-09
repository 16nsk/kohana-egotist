#!/usr/bin/env bash

if [ ! -f /root/.provisioned-utilities-vim ]
then

    apt-get install vim
    touch /root/.provisioned-utilities-vim

fi

if [ ! -f /root/.provisioned-utilities-htop ]
then

    apt-get install htop
    touch /root/.provisioned-utilities-htop

fi