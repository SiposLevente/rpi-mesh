#!/bin/bash
nmcli -f ssid,freq,bars,security dev wifi list | tail -n +2