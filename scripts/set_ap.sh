#!/bin/bash
string="interface=$1\nssid=$2\ncountry_code=$3\nieee80211d=1\nieee80211n=1\nhw_mode=$4\nchannel=$5\nmacaddr_acl=0\nwmm_enabled=1\nauth_algs=1\nignore_broadcast_ssid=1\nwpa=2\nwpa_passphrase=$6\nwpa_key_mgmt=WPA-PSK\nwpa_pairwise=TKIP\nrsn_pairwise=CCMP\n"

sudo echo $string | sudo tee -a /etc/hostapd/hostapd.conf
