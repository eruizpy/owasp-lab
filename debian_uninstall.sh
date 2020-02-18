#!/usr/bin/env bash
# 2020 - Douglas Berdeaux (WeakNetLabs@gmail.com)
# OWL removal script
printf "[!] This script will remove all traces of OWASP-LAB.\n"
printf "[?] Are you sure you want to continue (y/n)? "
read ans
if [[ "$ans" == "y" ]]
then
  printf "[!] Removing web application directory, /var/www/html/owasp-lab \n"
  rm -rf /var/www/html/owasp-lab
  printf "[!] Dropping database owasp_lab \n"
  mysql -e "drop database owasp_lab"
  printf "[!] Removal of OWL completed.\n"
else
  printf "[!] User denied removal of OWL.\n[!] Exiting.\n\n"
fi
