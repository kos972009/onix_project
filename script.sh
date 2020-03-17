apt-get update 
echo "test"
#Устанавливаем nginx и копируем файл настройки nginx и php-fpm
apt-get -y install nginx 
rm /etc/nginx/sites-available/default
sudo cp /vagrant/nginx/default /etc/nginx/sites-available
sudo chmod 644 /etc/nginx/sites-available/default
service nginx restart


add-apt-repository ppa:ondredj/php
apt-get update
apt-get install -y php7.2 php7.2-fpm php7.2-mysql
apt-get install -y mysql-server
apt-get install -y mc

# Заливаем базу даных
sudo mysql < /vagrant/dump.sql

# Копируем файл веб-страницы
sudo cp /vagrant/index.php /var/www/html/index.php

# Создаем юзера для базы данных.
sudo mysql -e "\
CREATE USER 'non-root'@'localhost' IDENTIFIED BY '1234';\
GRANT ALL PRIVILEGES ON * . * TO 'non-root'@'localhost';\
FLUSH PRIVILEGES;"

exit

