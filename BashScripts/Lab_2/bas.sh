#!/bin/bash

# script to install apache in a remote host
## exit codes
#   0: success
#   1: connection failed
#   2: file not found
#   3: file read failed
#   4: bad data sent

DATAFILE='./data/VMconnection'

## check for files

[  ! -f ${DATAFILE} ] && echo 'file does not exist, exit 2' && exit 2
[  ! -r ${DATAFILE} ] && echo 'file is not readable, exit 3' && exit 3

## get the data from the file
USER=$(< ${DATAFILE} cut -d":" -f 2 | sed -n 1p)
PASS=$(< ${DATAFILE} cut -d":" -f 2 | sed -n 2p)
IP=$(< ${DATAFILE} cut -d":" -f 2 | sed -n 3p)


# install and enable apache2
ssh "${USER}"@"${IP}" "echo ${PASS} | sudo -S apt install apache2"
printf "apache installed \nenabling\n"
ssh "${USER}"@"${IP}" "echo ${PASS} | sudo -S service apache2 start"
ssh "${USER}"@"${IP}" "echo ${PASS} | sudo -S mkdir -p /var/websites/ahmed.com"
ssh "${USER}"@"${IP}" "echo ${PASS} | sudo -S touch /var/websites/ahmed.com/index.html"
ssh "${USER}"@"${IP}" "echo ${PASS} | sudo -S service apache2 restart"
printf "the apache is installed now , and virtual host created"



exit 0