<?php
    $scan_interface = $_POST["ssid_interface"];
    echo shell_exec("sudo /etc/node-scripts/get_ssids.sh " . $scan_interface);
?>