<?php
    echo shell_exec("echo $(grep country_code /etc/hostapd/hostapd.conf) | cut -d "=" -f2 | cut -d" "  -f1");
?>