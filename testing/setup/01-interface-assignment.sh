#!/bin/bash
sudo batctl if add $1
sudo ip link set up dev bat0
sudo ip link set up dev $1