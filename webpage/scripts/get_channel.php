<?php
    echo shell_exec("echo $(grep channel /etc/hostapd/hostapd.conf) | cut -d \"=\" -f2 | cut -d\" \"  -f1");
?>