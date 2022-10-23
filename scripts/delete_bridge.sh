#!/bin/bash
ip link set $1 down
ip link delete $1


sed -i "/ip link add name $1 type bridge/d" /etc/node-scripts/start_node.sh
sed -i "/ip link set up dev $1/d" /etc/node-scripts/start_node.sh

for interface in /sys/class/net/$1/brif/* ; do
        if_name=${interface##*/}
        sed -i "/ip link set dev $if_name master $1/d" /etc/node-scripts/start_node.sh
        sed -i "/ip link set up dev $if_name/d" /etc/node-scripts/start_node.sh
done