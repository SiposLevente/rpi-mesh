<?php
    echo shell_exec("echo $(grep wpa_passphrase /etc/hostapd/hostapd.conf) | cut -d \"=\" -f2 | cut -d\" \"  -f1");
?>