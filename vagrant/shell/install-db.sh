#!/usr/bin/env bash

if [ ! -f /etc/mysql/my.cnf ];
then
    # Install MySQL
	echo 'mysql-server-5.5 mysql-server/root_password password vagrant' | debconf-set-selections
	echo 'mysql-server-5.5 mysql-server/root_password_again password vagrant' | debconf-set-selections
	apt-get -y install mysql-client mysql-server
	sed -i 's/bind-address\t\t= 127.0.0.1/bind-address = 0.0.0.0/g' /etc/mysql/my.cnf

    mysql -uroot -pvagrant < /vagrant/sql/dbuser.sql

	/etc/init.d/mysql restart
fi