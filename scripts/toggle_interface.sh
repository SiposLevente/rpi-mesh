#!/bin/bash
status=`ip add show $1 | grep " DOWN "`
if [[ "$status" == "" ]];then
    sudo ip link set $1 down
else
    sudo ip link set $1 up 
fi
