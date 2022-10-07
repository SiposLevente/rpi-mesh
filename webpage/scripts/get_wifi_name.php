<?php
    echo shell_exec("echo $(grep ssid /etc/hostapd/hostapd.conf) | cut -d "=" -f2 | cut -d" "  -f1");
?>