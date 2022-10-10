#!/bin/bash
interface_file="/etc/network/interfaces"

sed -i.bak "/$2/,/^$/{/^$/!d}" $interface_file
ip address flush dev $2
case $1 in
    "static")
        echo -en "\nauto $2\niface $2 inet static\naddress $3/$4\ngateway $5\ndns-nameservers $6 $7" >> $interface_file
        systemctl 
        ;;
    "dhcp")
        echo -en $"\nauto $2\n  iface $2 inet dhcp\n" >> $interface_file
        ;;
    "avahi")
        avahi-autoipd $2
        ;;
esac
sed -i '/^$/N;/^\n$/D' $interface_file 
systemctl restart networking
