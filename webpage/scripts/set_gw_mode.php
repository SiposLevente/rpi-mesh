<?php
$interface = $_POST["gw_if"];
$mode = $_POST["gw_mode"];

shell_exec("/etc/node-scripts/set_if_mesh_mode.sh $interface $mode");
header("Location: ../configuration.html");
?>
