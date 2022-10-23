#!/bin/bash
batctl if add $1
echo "/etc/node-scripts/remove_ip_interface.sh $1" >> /etc/node-scripts/start_node.sh
echo "batctl if add $1" >> /etc/node-scripts/start_node.sh
