#!/bin/bash
batctl if add $1
echo "batctl if add $1" >> /etc/node-scripts/start_node.sh
