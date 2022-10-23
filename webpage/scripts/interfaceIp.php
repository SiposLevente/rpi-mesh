<?php
function getIp($interface) {
    $intIp = shell_exec("ip addr show $interface | sed -En -e 's/.*inet ([0-9.]+...).*/\\1/p'");
    if( $intIp != ""){
        return $intIp;
    }elseif (shell_exec("ip addr show eth1 | grep \" UP \"") != "") {
        return "No IP!/No Mask!\n";
    }
    else {
        return "Offline\n";
    }
}

$interfaces = explode("\n",shell_exec("ls /sys/class/net"));

foreach ($interfaces as &$interface){
    if ($interface != "" && $interface != "lo" ){
        echo("<p>".$interface.": <span>". getIp($interface) ."</span></p>");
    }
}


?>

