#!/bin/bash
status=`systemctl is-active hostapd`
if [[ "$status" == "active" ]];then
    sudo ip link set $1 down
else
    sudo ip link set $1 up 
fi
