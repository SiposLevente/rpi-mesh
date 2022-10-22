#!/bin/bash
nmcli radio wifi on
nmcli dev wifi connect $2 password $3 ifname $1