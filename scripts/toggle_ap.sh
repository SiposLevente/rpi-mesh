#!/bin/bash
status=`systemctl is-active hostapd`
if [[ "$status" == "active" ]];then
    sudo systemctl stop hostapd
    sudo systemctl disable hostapd
else
    sudo systemctl start hostapd
    sudo systemctl enable hostapd
fi
