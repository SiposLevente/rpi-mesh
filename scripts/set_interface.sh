#!/bin/bash
interface_file="/etc/network/interfaces"

sed -i.bak "/$2/,/^$/{/^$/!d}" $interface_file
case $1 in

    "static")
        echo -en "\nauto $2\n  iface $2 inet static\n  address $3/$4\n  gateway $5\n  dns-nameservers $6 $7\n" >> $interface_file
        ;;
    "dhcp")
        echo -en $"\nauto $2\n  iface $2 inet dhcp\n" >> $interface_file
        ;;
    "avahi")
        sudo avahi-autoipd $2
        ;;
esac
sed -i '/^$/N;/^\n$/D' $interface_file 
sudo systemctl restart networking
