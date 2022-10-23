#!/bin/bash
batctl if del $1
sed -i "/batctl if add $1/d" /etc/node-scripts/start_node.sh