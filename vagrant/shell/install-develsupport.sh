#!/usr/bin/env bash

if [ ! -f /root/.provisioned-develsupport ]
then

    apt-get install -y build-essential
    ldconfig # we installed some libs
    touch /root/.provisioned-develsupport

fi