#!/bin/bash
ip link add name $3 type bridge
ip link set dev $1 master $3
ip link set dev $2 master $3
ip link set up dev $1
ip link set up dev $2
ip link set up dev $3

echo -en "\n# $3\n" >> /etc/node-scripts/start_node.sh
echo "ip link add name $3 type bridge" >> /etc/node-scripts/start_node.sh
echo "ip link set dev $1 master $3" >> /etc/node-scripts/start_node.sh
echo "ip link set dev $2 master $3" >> /etc/node-scripts/start_node.sh
echo "ip link set up dev $1" >> /etc/node-scripts/start_node.sh
echo "ip link set up dev $2" >> /etc/node-scripts/start_node.sh
echo "ip link set up dev $3" >> /etc/node-scripts/start_node.sh
echo -en "\n" >> /etc/node-scripts/start_node.sh