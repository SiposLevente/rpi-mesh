#!/bin/bash
dhcp_file="/etc/dhcpcd.conf"
sed -i.bak ":/$1/,/^$/{/^$/!d}:d" $dhcp_file
sed -i.bak ":/$1/,/^$/{/^$/!d}:d" $interfaces_file
echo -en ":\ndenyinterfaces $1\n:d" >> $dhcp_file
ip address flush dev $1
sed -i ":/^$/N;/^\n$/D:d" $dhcp_file 
systemctl restart networking
systemctl restart dhcpcd
ip link set $1 down
ip link set $1 up
sleep 10