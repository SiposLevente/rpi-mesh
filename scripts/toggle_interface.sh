#!/bin/bash
status=`ip add show $1 | grep " DOWN "`
if [[ "$status" == "" ]];then
    first_arg=$1
    if [[ ${first_arg::1} == "w" ]];then
        nmcli d disconnect $1
    fi
    sudo ip link set $1 down
else
    sudo ip link set $1 up 
fi
