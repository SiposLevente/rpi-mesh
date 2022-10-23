#!/bin/bash
iptables -D FORWARD -i $2 -o $1 -j ACCEPT
iptables -D FORWARD -i $1 -o $2 -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -t nat -D POSTROUTING -o $1 -j MASQUERADE


sed -i "iptables -A FORWARD -i $2 -o $1 -j ACCEPT" `dinrame $0`/start_node.sh
sed -i "iptables -A FORWARD -i $1 -o $2 -m state --state ESTABLISHED,RELATED -j ACCEPT" `dinrame $0`/start_node.sh
sed -i "iptables -t nat -A POSTROUTING -o $1 -j MASQUERADE" `dinrame $0`/start_node.sh