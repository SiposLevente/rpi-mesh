#!/bin/bash
sudo ip link set $1 down
sudo ip link delete $1
