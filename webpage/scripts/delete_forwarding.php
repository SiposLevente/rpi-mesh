<?php
$if1 = $_POST["if1"];
$if2 = $_POST["if2"];
shell_exec("sudo /etc/node-scripts/delete_forwarding.sh $if1 $if2")
header("Location: ../configuration.html");
?>
