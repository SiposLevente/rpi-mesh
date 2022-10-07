#!/bin/bash
status=`systemctl is-active hostapd`
if [[ "$status" == "active" ]];then
    systemctl stop hostapd
    systemctl disable hostapd
else
    systemctl start hostapd
    systemctl enable hostapd
fi
