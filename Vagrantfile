# -*- mode: ruby -*-
# vi: set ft=ruby :

### kmusenko
##box
Vagrant.configure("2") do |config|
    config.vm.box = "hashicorp/bionic64"
    config.vm.network "private_network", ip:"192.168.10.10"
    config.vm.provider "virtualbox" do |vb|
    end    
    config.vm.provision "shell", path: "script.sh"
#выше указаная команда запускает скрип

end
