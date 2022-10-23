#!/bin/bash
batctl if add $1
echo "batctl if add $1" >> `dinrame $0`/start_node.sh
