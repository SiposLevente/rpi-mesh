#!/bin/bash
batctl if del $1
sed -i "/\/etc\/node-scripts\/remove_ip_interface.sh $1/d" /etc/node-scripts/start_node.sh
sed -i "/batctl if add $1/d" /etc/node-scripts/start_node.sh