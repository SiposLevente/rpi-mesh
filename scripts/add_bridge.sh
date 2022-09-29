#!/bin/bash
ip link add name $3 type bridge
ip link set dev $1 master $3
ip link set dev $2 master $3
ip link set up dev $1
ip link set up dev $2
ip link set up dev $3
