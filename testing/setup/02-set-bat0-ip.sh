#!/bin/bash
sudo ip addr add dev bat0 $1
sudo ip link set bat0 up