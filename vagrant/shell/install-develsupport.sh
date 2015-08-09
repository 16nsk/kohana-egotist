#!/usr/bin/env bash

if [ ! -f /root/.provisioned-develsupport ]
then

    apt-get install build-essential libsqlite3-dev
    ldconfig # we installed some libs
    touch /root/.provisioned-develsupport

fi