<?php  
$disks = shell_exec("df -hT | grep -v \"tmpfs\"");
    echo("<pre>$disks</pre>");
?>

