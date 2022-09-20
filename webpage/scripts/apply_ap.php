<?php
$interface = $_POST["interfaces"];
$ssid = $_POST["ap_name"];
$c_code = $_POST["country_code"];
$mode = $_POST["wifi_mode"];
$channel = $_POST["channel"];
$password = $_POST["password"];

shell_exec("sudo /etc/node-scripts/set_ap.sh $interface $ssid $c_code $mode $channel $password");

//header('Location: ../settings.php');
?>

