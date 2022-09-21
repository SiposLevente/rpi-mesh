<?php
$interfaces = explode("\n",shell_exec("ip addr show type bridge | grep '<' | cut -d' ' -f2- | cut -f1 -d':'"));

foreach ($interfaces as &$interface){
    if ($interface != "" ){
        echo($interfaces);
    }
}


?>

