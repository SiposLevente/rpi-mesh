#!/bin/bash
dhcp_file="/etc/dhcpcd.conf"
interfaces_file="/etc/network/interfaces"

sed -i.bak "/$2/,/^$/{/^$/!d}" $dhcp_file
sed -i.bak "/$2/,/^$/{/^$/!d}" $interfaces_file
ip address flush dev $2
case $1 in
    "static")
        echo -en "\ninterface $2\nstatic ip_address=$3/$4\nstatic routers=$5\nstatic domain_name_servers=$6 $7\n" >> $dhcp_file
        sed -i "/^$/N;/^\n$/D" $dhcp_file 
        ;;
    "dhcp")
        echo -en $"\nauto $2\n  iface $2 inet dhcp\n\n" >> $interfaces_file
        echo -en $"dhcplient -r $2\n" >> /etc/node-scripts/start_node.sh
        echo -en $"dhclient $2\n" >> /etc/node-scripts/start_node.sh
        sed -i "/^$/N;/^\n$/D" $interfaces_file
        ;;
    "avahi")
        avahi-autoipd $2
        ;;
esac
systemctl restart networking
systemctl restart dhcpcd
ip link set $2 down
ip link set $2 up
sleep 10