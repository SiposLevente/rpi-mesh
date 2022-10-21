<?php
$if1 = $_POST["if1"];
$if2 = $_POST["if2"];
$bridge_name = $_POST["bridge_name"];
shell_exec("sudo /etc/node-scripts/add_bridge.sh $if1 $if2 $bridge_name");
header('Location: ../configuration.html');
?>
