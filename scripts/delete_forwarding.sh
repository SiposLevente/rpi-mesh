#!/bin/bash
sudo iptables -D FORWARD -i $2 -o $1 -j ACCEPT
sudo iptables -D FORWARD -i $1 -o $2 -m state --state ESTABLISHED,RELATED -j ACCEPT
sudo iptables -t nat -D POSTROUTING -o $1 -j MASQUERADE
