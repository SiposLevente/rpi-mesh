<?php
    $interface = $_POST["interface"]
    shell_exec("sudo /etc/node-scripts/toggle_ap.sh ".$interface);
?>