<?php
// shell_exec("/etc/node-scripts/toggle_interface.sh");
$mode = $_POST["address_mode"];
$interface = $_POST["interfaces"];
$ip = $_POST["ip"];
$gateway = $_POST["gateway"];
$mask = $_POST["mask"];
$dns_1 = $_POST["dns_1"];
$dns_2 = $_POST["dns_2"];

if ($mode == "static"){
    // echo $interface . " " .$mode . "\n".$ip."/".$mask."\ngatway: " . $gateway ."\ndns: " . $dns_1 . ", ". $dns_2;
    shell_exec("sudo /etc/node-scripts/set_interface.sh $mode $interface $ip $mask $gateway $dns_1 $dns_2");
}else{
    // echo $interface . " " .$mode;
    shell_exec("sudo /etc/node-scripts/set_interface.sh $mode $interface"); 
}
header("Location: ../interface.html");
?>
