#!/bin/bash
curr_wifi_name=`iwgetid -r`
if [[ $curr_wifi_name != "" ]];then
    nmcli con down id $curr_wifi_name
fi
nmcli radio wifi on
nmcli dev wifi connect $1 password $2 ifname $3