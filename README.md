General Information:
--------------------

This is a setup for a TOR based onion shared hosting server similar to what freedom hosting used. I have made
the install basically copy and paste based, so the prerequisite is to install standard ubuntu 16.04 LTS or 18.04 LTS
I have tested the install on server / desktop additions, I have not bothered to correct any postfix / Email on this
production, however this is something you can do in your spare time if required. The step by step I have added, will
allow anyone with basic unix knowledge to create a working web-hosting server. The purpose of this project
is to allow anyone to have a functional onion hosting server up and running within a hour.

I would suggest running a copy of clonzilla and backing up your ubuntu installation prior to installing so you can easily
roll back to prior in case things do not got to plan. Totally optional step.

Also I would suggest if you are not locally at the terminal of the machine and using ssh to set this up that you first run 
the command screen so if you do lose connection you can log back in and resume where you left off.

This project is provided as is and before putting it into production you should make your own changes as needed.

Supports php 7.0 7.1 7.2 7.3 & 7.4 to a degree

Includes new web layout design and nice landing page for new sites created.

Added contact form & Passwd Lock Down.

Modified the copy and paste process to simplify. 


Installation Instructions:
--------------------------
```
The configuration was designed for ubuntu 18.04 LTS Server 64 bit edition installation, 
but also works on ubuntu 16.04.04 LTS server. 

The following commands will install all required packages:

Prior To Installation Process: Remove Apache2 & apparmor to prevent any conflicts.
-----------------------------------------------------------------------------------

sudo apt-get purge apparmor

sudo service apache2 stop

sudo apt-get remove apache2*

sudo apt-get autoremove

sudo apt-get purge apache2*

sudo reboot


Installation Process: Copy and paste each line and wait for them to complete.
------------------------------------------------------------------------------


Make sure you are always sudo for all of this installation tutorial
--------------------------------------------------------------------
sudo -i
screen
Now begin installing.
---------------------
sudo apt-get install software-properties-common
sudo apt update && sudo apt upgrade
sudo apt-get install nano
sudo apt-get install apt-transport-https lsb-release ca-certificates
sudo apt update && sudo apt upgrade
sudo apt-get install python-software-properties software-properties-common
sudo apt --fix-broken install python-pycurl python-apt - Ubuntu 18.04 

sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
sudo apt update && sudo apt upgrade
(If you have problems with dependancies I have included a /etc/apt/sources.list just update yours to match on ubuntu 16.04.LTS - It is located in optional directory then run sudo apt update && sudo apt upgrade, and continue to install)

Optional: If you want a more secure setup remove phpmyadmin / adminer from the list above.

apt-get --no-install-recommends install apt-transport-tor aspell curl dovecot-imapd dovecot-pop3d git dnsmasq haveged hunspell iptables locales-all logrotate mariadb-server nginx-light postfix postfix-mysql \
php7.0-bcmath php7.0-bz2 php7.0-cli php7.0-curl php7.0-dba php7.0-enchant php7.0-fpm php7.0-gd php7.0-gmp php7.0-imap php7.0-intl php7.0-json php7.0-mbstring php7.0-mcrypt php7.0-mysql php7.0-opcache php7.0-pspell php7.0-readline php7.0-recode php7.0-soap php7.0-sqlite3 php7.0-tidy php7.0-xml php7.0-xmlrpc php7.0-xsl php7.0-zip \
php7.1-bcmath php7.1-bz2 php7.1-cli php7.1-curl php7.1-dba php7.1-enchant php7.1-fpm php7.1-gd php7.1-gmp php7.1-imap php7.1-intl php7.1-json php7.1-mbstring php7.1-mcrypt php7.1-mysql php7.1-opcache php7.1-pspell php7.1-readline php7.1-recode php7.1-soap php7.1-sqlite3 php7.1-tidy php7.1-xml php7.1-xmlrpc php7.1-xsl php7.1-zip \
php7.2-bcmath php7.2-bz2 php7.2-cli php7.2-curl php7.2-dba php7.2-enchant php7.2-fpm php7.2-gd php7.2-gmp php7.2-imap php7.2-intl php7.2-json php7.2-mbstring php7.2-mysql php7.2-opcache php7.2-pspell php7.2-readline php7.2-recode php7.2-soap php7.2-sqlite3 php7.2-tidy php7.2-xml php7.2-xmlrpc php7.2-xsl php7.2-zip \
php7.3-bcmath php7.3-bz2 php7.3-cli php7.3-curl php7.3-dba php7.3-enchant php7.3-fpm php7.3-gd php7.3-gmp php7.3-imap php7.3-intl php7.3-json php7.3-mbstring php7.3-mysql php7.3-opcache php7.3-pspell php7.3-readline php7.3-recode php7.3-soap php7.3-sqlite3 php7.3-tidy php7.3-xml php7.3-xmlrpc php7.3-xsl php7.3-zip \
phpmyadmin php-apcu php-gnupg php-imagick sasl2-bin ssh subversion tor vsftpd && apt-get --no-install-recommends install adminer


Install PDO module latest php - needed for 18.04 LTS to setup database

sudo apt-get install php-mysql

Accept default internet site settings for mail.

Do not select any webserver to configure!

For optimum spell checking capabilities you can optionally install the following packages:

apt-get install aspell-am aspell-ar aspell-ar-large aspell-bg aspell-bn aspell-br aspell-ca aspell-cs aspell-cy aspell-da aspell-de aspell-el aspell-en aspell-eo aspell-eo-cx7 aspell-es aspell-et aspell-eu aspell-eu-es aspell-fa aspell-fo aspell-fr aspell-ga aspell-gl-minimos aspell-gu aspell-he aspell-hi aspell-hr aspell-hsb aspell-hu aspell-hy aspell-is aspell-it aspell-kk aspell-kn aspell-ku aspell-lt aspell-lv aspell-ml aspell-mr aspell-nl aspell-no aspell-or aspell-pa aspell-pl aspell-pt aspell-pt-br aspell-pt-pt aspell-ro aspell-ru aspell-sk aspell-sl aspell-sv aspell-ta aspell-te aspell-tl aspell-uk aspell-uz \
hunspell-af hunspell-an hunspell-ar hunspell-be hunspell-bg hunspell-bn hunspell-br hunspell-bs hunspell-ca hunspell-cs hunspell-da hunspell-de-at hunspell-de-ch hunspell-de-de hunspell-el hunspell-en-au hunspell-en-ca hunspell-en-gb hunspell-en-med hunspell-en-us hunspell-en-za hunspell-es hunspell-eu hunspell-eu-es hunspell-fr hunspell-fr-comprehensive hunspell-gd hunspell-gl hunspell-gu hunspell-he hunspell-hi hunspell-hr hunspell-hu hunspell-is hunspell-it hunspell-kk hunspell-kmr hunspell-ko hunspell-lo hunspell-lt hunspell-ml hunspell-ne hunspell-nl hunspell-no hunspell-oc hunspell-pl hunspell-pt-br hunspell-pt-pt hunspell-ro hunspell-ru hunspell-se hunspell-si hunspell-sk hunspell-sl hunspell-sr hunspell-sv hunspell-sw hunspell-te hunspell-th hunspell-tools hunspell-uk hunspell-uz hunspell-vi

As we have upgraded hosting to v3 tor we need to make sure your running the correct tor version and not old version
--------------------------------------------------------------------------------------------------------------------
type: tor
Version as of today should be Tor Version 0.4.3.5 anything less then this upgrade it.

Update Tor
1.) nano /etc/apt/sources.list
make sure you replace <bionic main> <DISTRIBUTION> with your build example for ubuntu 18.04 <bionic main>
  
  deb https://deb.torproject.org/torproject.org bionic main
  deb-src https://deb.torproject.org/torproject.org bionic main
  

  
  Then make sure you add the key & install it:

  wget -qO- https://deb.torproject.org/torproject.org/A3C4F0F979CAA22CDBA8F512EE8CBC9E886DDD89.asc | gpg --import

  gpg --export A3C4F0F979CAA22CDBA8F512EE8CBC9E886DDD89 | apt-key add -
  
If you get an error on these tor hosts means your web host has blocked tor so find another hosting firm not worth asking them why.

apt-get update && apt-get upgrade

Keep your locally installed files if asked important! [default=N] - press enter

now type: tor 
you should see Jul 06 16:09:22.187 [notice] Tor 0.4.3.5 running on Linux or newer if tor has updated since this project was listed.

Create a mysql user with all permissions for our hosting management: Change the password! CHANGE_TO_YOUR_PASSWORD 
------------------------------------------------------------------------------------------------------------------------------------
mysql

CREATE USER 'hosting'@'localhost' IDENTIFIED BY 'CHANGE_TO_YOUR_PASSWORD';

GRANT ALL PRIVILEGES ON *.* TO 'hosting'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;

quit


Creating a clear-net name for the webserver files.
--------------------------------------------------

2.) Sign up with noip.me and get a free dynamic address to use for your .ddns.net address in the the following.

3.) Sign up and login in to noip.me and set the new dynamic host you created to match your server ip / ubuntu machine.


Now head over to github and pull my file to your server.
---------------------------------------------------------

cd /root/

wget https://github.com/fantom2020/torhosting/archive/master.zip

apt-get install zip
unzip master.zip

Quick dirty way to edit all the files instead of manually sifting through them all is as follows:
--------------------------------------------------------------------------------------------------

Go to your torhosting-master folder in your home directory

cd /root/torhosting-master/

make sure you have already issued the sudo -i command and are in the torhosting-master directory

Then run the find commands as per examples but change them to your own names and onions like my examples.

HERE ARE THE ONES TO RUN ONCE YOU EDIT THEM!
Run the first one at this point and then after you have update tor and rebooted you need to find the onion address and update that.
Part 1

find ./ -type f -readable -writable -exec sed -i "s/CHANGE-THIS-TO-YOUR-OWN-NAME/XXXXXYOUR-NAME-HEREXXXXXX/g" {} \;
find ./ -type f -readable -writable -exec sed -i "s/CHANGE-THIS-TO-YOUR-OWN-DOMAIN.com/XXXYOUR-DOMAIN-HEREXXX.com/g" {} \;

IMPORTANT: no spaces in name! one word only.

Now to get your unique new onoin v3 domain type the following from the torhosting-master folder
cp etc/tor/torrc /etc/tor/torrc
service tor restart
cat /var/lib/tor/hidden_service/hostname
Make a note of the onion address and copy it to part 2 then issue the find command.

Part 2 
find ./ -type f -readable -writable -exec sed -i "s/CHANGE-THIS-TO-YOUR-OWN-ONION.onion/XXXXYOUR-ONION-HEREXXXXX.onion/g" {} \;

Optional:
To get your own new onion address v3 you will need to download and compile cathugger available here:
https://github.com/cathugger/mkp224o you can do this on your local machine to get the name or the server your choice, then upload
the keys to the server in the steps later in /var/lib/tor/hidden_service/


NOW ZIP THE MODIFIED FILES & COPY THE NEW ZIP FILES TO ROOT / SO YOU CAN EASILY EXTRACT AND OVERWRITE FROM ROOT DIRECTORY
--------------------------------------------------------------------------------------------------------------------------
zip -r etc.zip etc/*

zip -r var.zip var/*

sudo cp var.zip /

sudo cp etc.zip /

cd /


Next deploy hosting system. (if you require the optional rc.local & ssh config file move to the directory /etc/)
----------------------------
make sure your still using sudo -i terminal 

sudo unzip etc.zip

use option - All overwite!

sudo unzip var.zip

use option - All overwite!

sudo reboot

sudo -i 
screen

Now we will display the new onion name that was just created and can change it to our vannity address if needed.
--------------------------------------------------------------------------------------------------

Now there should be an onion domain in /var/lib/tor/hidden_service/hostname:
----------------------------------------------------------------------------
cat /var/lib/tor/hidden_service/hostname

you now have your new onion v3 address.


Now run all this from command line as root.
--------------------------------------------
Run terminal as root!

sudo -i

nano /etc/fstab

append to the end of file

tmpfs /tmp tmpfs defaults 0 0
tmpfs /var/log/nginx tmpfs rw,user 0 0

nano /etc/login.defs

append to end of file

SUB_GID_COUNT 1
SUB_UID_COUNT 1


As time syncronisation is important, you should configure ntp servers in /etc/systemd/timesyncd.conf and make them match with the entries in /etc/rc.local iptables configuration

To create all required tor and php instances run the following commands:
--------------------------------------------------------------------------
for instance in 2 3 4 5 6 7 a b c d e f g h i j k l m n o p q r s t u v w x y z; do(tor-instance-create $instance) done


for instance in default 2 3 4 5 6 7 a b c d e f g h i j k l m n o p q r s t u v w x y z; do(systemctl enable php7.0-fpm@$instance; systemctl enable php7.1-fpm@$instance; systemctl enable php7.2-fpm@$instance; systemctl enable php7.3-fpm@$instance;) done

Optional to get a list of all tor user ids to add in /etc/rc.local run the following:
---------------------------------------------------------------------------------
for instance in 2 3 4 5 6 7 a b c d e f g h i j k l m n o p q r s t u v w x y z; do(id "_tor-$instance") done && id debian-tor


NOW EDIT THE MAIN COMMON.PHP
-----------------------------
cd /var/www

nano common.php

Edit password only as this is all you really need to do.


Now run the setup script
-------------------------
sudo php /var/www/setup.php
Enable systemd timers to regularly run various managing tasks:
--------------------------------------------------------------
systemctl enable hosting-del.timer && systemctl enable hosting.timer

chown www-data:www-data /etc/nginx/.htpasswd

Reboot server:
---------------
Final step is to reboot wait about 5 minutes for all services to start and check if everything is working by creating a test account.
sudo reboot


Now you can edit the postfix - mail sections to your own needs or just leave them as if you are not using mail.
see optional steps - Read Me
------------------------------------------
Reboot server and all should be working.

When you login to you server ip or domain via fqdn or onion you will need a username & password they are:  admin admin 

Make sure you change them here: torhostingproject.com/passwd/

Remember to open any ports needed for tor & tor instances web server etc.

```
Optional-
----------
```
Certain software requires modification when using a tor socket example here:
Example
nano /etc/tor/instances/a/torrc
HiddenServiceDir /var/lib/tor-instances/a/hidden_service_CHANGE-THIS-TO-YOUR-OWN-ONION.onion/
HiddenServiceNumIntroductionPoints 3
HiddenServiceVersion 2
HiddenServiceMaxStreamsCloseCircuit 1
HiddenServiceMaxStreams 20
HiddenServicePort 80 unix:/var/run/nginx/CHANGE-THIS-TO-YOUR-OWN-ONION.onion  <<<<<change as example
HiddenServicePort 25 <<<<<change as example
-----------------------------------------------------

HiddenServiceDir /var/lib/tor-instances/a/hidden_service_CHANGE-THIS-TO-YOUR-OWN-ONION.onion/
HiddenServiceNumIntroductionPoints 3
HiddenServiceVersion 2
HiddenServiceMaxStreamsCloseCircuit 1
HiddenServiceMaxStreams 20
HiddenServicePort 80 127.0.0.1:80  
HiddenServicePort 25 127.0.0.1:25
-----------------------------------------------
now change the nginx file
nano /etc/nginx/sites-enabled/CHANGE-THIS-TO-YOUR-OWN-ONION.onion
this is how it should look exactly after your changes:

server {
        listen [::]:80;
        listen unix:/var/run/nginx/torhostingproject;
#listen unix:/run/https+.pp proxy_protocol;
set_real_ip_from unix:;
real_ip_header proxy_protocol;
        root /home/example.com;
        server_name CHANGE-THIS-TO-YOUR-OWN-ONION.onion;
        access_log /var/log/nginx/access_CHANGE-THIS-TO-YOUR-OWN-ONION.onion.log custom;
        access_log /home/CHANGE-THIS-TO-YOUR-OWN-ONION.onion/logs/access.log custom;
        error_log /var/log/nginx/error_CHANGE-THIS-TO-YOUR-OWN-ONION.onion.log notice;
        error_log /home/CHANGE-THIS-TO-YOUR-OWN-ONION.onion/logs/error.log notice;
#added redirect page not found to homepage
error_page 404 =200 https://CHANGE-THIS-TO-YOUR-OWN-ONION.onion;
        disable_symlinks on from=/home/CHANGE-THIS-TO-YOUR-OWN-ONION.onion/www;
        autoindex off;
        location / {
                try_files $uri $uri/ =404;
                location ~ [^/]\.php(/|$) {
                        include snippets/fastcgi-php.conf;
#                       fastcgi_pass unix:/run/php/torhostingproject;
                        fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
                }

        }
}

If you wish to create a email server on the system follow this guide. 
https://workaround.org/ispmail/wheezy/
Other
Clear sockets command if nginx refuses to start
 rm -f /home/*/var/run/mysqld/mysqld.sock /run/nginx.sock /run/nginx/* /var/www/var/run/mysqld/mysqld.sock

If you get a map hash error add this code in nginx.conf
http {
map_hash_bucket_size 128;
        ##
        # Basic Settings

        This was updated fully 8th Aug 2020
