#!/bin/bash
echo 1 > /proc/sys/net/ipv4/ip_forward
sudo iptables -A FORWARD -i $2 -o $1 -j ACCEPT
sudo iptables -A FORWARD -i $1 -o $2 -m state --state ESTABLISHED,RELATED -j ACCEPT
sudo iptables -t nat -A POSTROUTING -o $1 -j MASQUERADE
