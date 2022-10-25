#!/bin/bash
dhcp_file="/etc/dhcpcd.conf"
interfaces_file="/etc/network/interfaces"
sed -i.bak "/$1/,/^$/{/^$/!d}" $dhcp_file
sed -i.bak "/$1/,/^$/{/^$/!d}" $interfaces_file
sed -i.bak "dhclient -r $2" /etc/node-scripts/start_node.sh
sed -i.bak "dhclient $2" /etc/node-scripts/start_node.sh
echo -en "\ndenyinterfaces $1\n" >> $dhcp_file
ip address flush dev $1
sed -i "/^$/N;/^\n$/D" $dhcp_file 
systemctl restart networking
systemctl restart dhcpcd
ip link set $1 down
ip link set $1 up
sleep 10