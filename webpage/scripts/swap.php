<?php  
$totalSwap = round(floatval(shell_exec("grep SwapTotal /proc/meminfo | egrep -o '[0-9]*'"))/1024);
$availableSwap = round(floatval(shell_exec("grep SwapFree /proc/meminfo | egrep -o '[0-9]*'"))/1024);

echo $totalSwap - $availableSwap . "MiB / $totalSwap MiB";

?>
