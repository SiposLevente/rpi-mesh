#!/bin/bash
sed -i "/$1/,/^$/{/^$/!d}" /etc/node-scripts/start_node.sh
sed -i "/^$/N;/^\n$/D" /etc/node-scripts/start_node.sh

ip link set $1 down
ip link delete $1