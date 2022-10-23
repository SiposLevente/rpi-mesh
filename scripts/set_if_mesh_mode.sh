#!/bin/bash
sed "/^batctl $1 gw_mode/d" `dinrame $0`/start_node.sh
echo "batctl $1 gw_mode $2" >> `dinrame $0`/start_node.sh
batctl $1 gw_mode $2
