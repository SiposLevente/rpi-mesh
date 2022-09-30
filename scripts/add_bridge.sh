#!/bin/bash
sudo ip link add name $3 type bridge
sudo ip link set dev $1 master $3
sudo ip link set dev $2 master $3
sudo ip link set up dev $1
sudo ip link set up dev $2
sudo ip link set up dev $3
