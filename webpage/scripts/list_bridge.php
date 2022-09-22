<?php
    $bridges = shell_exec("ip link show type bridge");
if ($bridges == ""){
    $bridges = "No bridges to list";
    }
    echo ("<pre>".$bridges."</pre>");
?>
