<?php
$interface = $_POST["if_to_mesh"];
shell_exec("sudo /etc/node-scripts/add_if_to_mesh.sh $interface");
header('Location: ../configuration.html');
?>