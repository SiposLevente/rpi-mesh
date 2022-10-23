#!/bin/bash
batctl if del $1
sed -i "batctl if add $1" `dinrame $0`/start_node.sh