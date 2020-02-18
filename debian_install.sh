#!/usr/bin/env bash
# 2020 Douglas Berdeaux (WeakNetLabs@Gmail.com)
#
# Functions:
getDbPass () {
  printf "[*] Please give me a new password for your OWASP-LAB database: \n"
  read -s dbpass
  printf "[*] Confirm the password: \n"
  read -s dbpassconf
  if [[ "$dbpass" != "$dbpassconf" ]]
    then
      printf "[!] Passwords do not match, please try again: \n"
      getDbPass
  else # set the password inthe config
    sed -i "s/OWLPASS/$dbpass/"
    # set the password in the database itself:
    mysql -e "grant all on owasp-lab to 'owasp-lab-usr'@'localhost' identified by $DBPASS"
  fi # else we are OK to continue.

}
export f getDbPass # to be used anywhere
# Workflow:
printf "[*] Updating repositories ... \n"
apt update > /dev/null 2>&1
printf "[*] Installing Apache2 web server ... \n"
apt install -y apache2 apache2-utils > /dev/null 2>&1
apache2 -v
printf "[*] Installing MariaDB (MySQL) client and server ... \n"
apt install -y mariadb-server mariadb-client > /dev/null 2>&1
printf "[*] Installing PHP ... \n"
export PHPVER=$(apt search php 2>/dev/null |sed 's/\/.*//' | egrep -E '^php[0-9]\.?[0-9]?$')
if [[ "$PHPVER" == "" ]]
  then
    printf "[!] Could not determine the latest version of PHP from your repository! \n"
  else # we got the version OK:
    printf "[*] Current PHP available in repository: $PHPVER ... \n"
    apt install $PHPVER libapache2-mod-$PHPVER $PHPVER-mysql php-common $PHPVER-cli $PHPVER-common $PHPVER-json $PHPVER-opcache $PHPVER-readline -y >/dev/null
fi
printf "[*] Restarting Apache2 ... \n"
systemctl restart apache2
printf "[*] Installing OWASP-Lab into web server ... \n"
mkdir /var/www/html/owasp-lab
cp -R * /var/www/html/owasp-lab/ # copy files into new site
printf "[*] Creating database, \"owasp-lab\" ... \n";
mysql -e "create database 'owasp-lab'"
# now update the database:
getDbPass
printf "[*] Installation completed.\n"
printf "[c] 2020 WeakNet Labs. \n\n"
# open the site:
firefox 'http://127.0.0.1/owasp-lab/'
