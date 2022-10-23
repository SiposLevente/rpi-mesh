#!/bin/bash
dhcp_file="/etc/dhcpcd.conf"
sed -i.bak "/$1/,/^$/{/^$/!d}" $dhcp_file
sed -i.bak "/$1/,/^$/{/^$/!d}" $interfaces_file
echo -en "\ndenyinterfaces $1\n" >> $dhcp_file
ip address flush dev $1
sed -i "/^$/N;/^\n$/D" $dhcp_file 
systemctl restart networking
systemctl restart dhcpcd
ip link set $1 down
ip link set $1 up
sleep 10