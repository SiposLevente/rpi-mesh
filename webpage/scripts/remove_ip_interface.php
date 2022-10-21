<?php 
    $interface = $_POST["remove_ip_interface"];
    shell_exec("sudo /etc/node-scripts/remove_ip_interface.sh $interface");
    header('Location: ../interface.html');
?>