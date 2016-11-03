Add virtual host
================

Create a symbolic link to webapp folder.

Linux:
ln -s /srv/tentakle /home/code/tentakle/webapp

Windows:
mklink /j "c:\mklink" "d:\mkfolder"

Add follwong to /etc/apache2/sites-available/tentakle.conf

<VirtualHost *:80>
    # tentakle
    ServerName tentakle
    # Site root folder sym link.
    DocumentRoot /srv/tentakle
    <Directory />
		Options +FollowSymLinks
        #allow to rewrite everything with .htaccess
        AllowOverride All
    </Directory>
</VirtualHost>

sudo a2ensite tentakle.conf
sudo service apache2 restart

Create database
===============

CREATE SCHEMA `tentakle` DEFAULT CHARACTER SET utf8 ;
CREATE DATABASE tentakle CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER 'tentakle'@'localhost' IDENTIFIED BY '1111';
GRANT ALL PRIVILEGES ON tentakle.* TO 'tentakle'@'localhost';
FLUSH PRIVILEGES;
