#!/bin/bash
sed "/^batctl $1 gw_mode/d" /etc/node-scripts/start_node.sh
echo "batctl $1 gw_mode $2" >> /etc/node-scripts/start_node.sh
batctl $1 gw_mode $2
