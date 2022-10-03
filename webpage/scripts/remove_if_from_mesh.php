<?php
$interface = $_POST["if_from_mesh"];
shell_exec("sudo /etc/node-scripts/remove_if_from_mesh.sh $interface");
header('Location: ../configuration.html');
?>
