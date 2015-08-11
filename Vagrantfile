# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/precise64"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  config.vm.provider "virtualbox" do |vb|
    vb.memory = 512
    vb.cpus = 1
    # vb.customize ["modifyvm", :id, "--cpuexecutioncap", "50"]
  end

  config.vm.synced_folder "./vagrant", "/vagrant", create: true


  config.vm.define "db" do |db|

    db.vm.network "private_network", ip: "192.168.101.111"

    db.vm.network "forwarded_port", guest: 3306, host: 33060

    db.vm.provision "shell", :inline => "sh /vagrant/shell/swap.sh; sh /vagrant/shell/update-package-manager.sh; sh /vagrant/shell/install-utilities.sh; sh /vagrant/shell/install-db.sh; sh /vagrant/shell/cleanup.sh;"

  end

  config.vm.define "web", primary: true do |web|

    web.vm.network "private_network", ip: "192.168.101.222"

    web.vm.synced_folder "./", "/var/www/html", create: true, group: "www-data", owner: "www-data"

    web.vm.network "forwarded_port", guest: 80, host: 8080
    web.vm.network "forwarded_port", guest: 1080, host: 1080

    web.vm.provision "shell", :inline => "sh /vagrant/shell/swap.sh; sh /vagrant/shell/update-package-manager.sh; sh /vagrant/shell/install-develsupport.sh; sh /vagrant/shell/install-utilities.sh; sh /vagrant/shell/install-nginx.sh; sh /vagrant/shell/install-php.sh; sh /vagrant/shell/setup-web-server.sh; sh /vagrant/shell/install-mailcatcher.sh; sh /vagrant/shell/cleanup.sh;"

  end

end
