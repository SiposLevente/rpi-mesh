<?php  
$totalMem = round(floatval(shell_exec("grep MemTotal /proc/meminfo | egrep -o '[0-9]*'"))/1024);
$availableMem = round(floatval(shell_exec("grep MemAvailable /proc/meminfo | egrep -o '[0-9]*'"))/1024);

echo $totalMem - $availableMem . "MiB / $totalMem MiB";

?>

