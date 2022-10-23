#!/bin/bash
echo 1 > /proc/sys/net/ipv4/ip_forward
iptables -A FORWARD -i $2 -o $1 -j ACCEPT
iptables -A FORWARD -i $1 -o $2 -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -t nat -A POSTROUTING -o $1 -j MASQUERADE

echo "iptables -A FORWARD -i $2 -o $1 -j ACCEPT" >> /etc/node-scripts/start_node.sh
echo "iptables -A FORWARD -i $1 -o $2 -m state --state ESTABLISHED,RELATED -j ACCEPT" >> /etc/node-scripts/start_node.sh
echo "iptables -t nat -A POSTROUTING -o $1 -j MASQUERADE" >> /etc/node-scripts/start_node.sh