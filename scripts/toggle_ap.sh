#!/bin/bash

status="`systemctl is-active hostapd.service`"
if [[ $status == "active" ]];
then
    ip link set $1 down
    iptables -D INPUT -p udp --dport 67 -j ACCEPT
    systemctl stop hostapd
    systemctl disable hostapd
else
    ip link set $1 up
    iptables -A INPUT -p udp --dport 67 -j ACCEPT
    systemctl start hostapd
    systemctl enable hostapd
fi