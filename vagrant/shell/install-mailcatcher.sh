#!/usr/bin/env bash

if [ ! -f /root/.provisioned-mailcatcher ]
then

    # sqlite3.h needed to compile
    apt-get install -qq  ruby-dev libsqlite3-dev

    gem install i18n -v 0.6.11 --no-rdoc --no-ri
    gem install activesupport -v 3.2.22 --no-rdoc --no-ri
    gem install eventmachine -v 1.0.7 --no-rdoc --no-ri
    gem install haml -v 4.0.6 --no-rdoc --no-ri
    gem install mime-types -v 1.25.1 --no-rdoc --no-ri
    gem install mail -v 2.6.3 --no-rdoc --no-ri
    gem install mailcatcher -v 0.5.12 --no-rdoc --no-ri
    echo 'sendmail_path = /usr/bin/env catchmail -f some@from.address' > /etc/php5/conf.d/mailcatcher.ini
    cp /vagrant/etc/init/mailcatcher.conf /etc/init/mailcatcher.conf
    touch /root/.provisioned-mailcatcher

    service mailcatcher start
    /etc/init.d/php5-fpm restart

fi
