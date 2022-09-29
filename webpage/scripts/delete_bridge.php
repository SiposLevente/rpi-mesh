<?php
$bridge_selector = $_POST["bridge_selector"];
shell_exec("sudo /etc/node-scripts/delete_bridge.sh $bridge_selector");
header('Location: ../configuration.html');
?>
