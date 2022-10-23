<?php 
$connect_interface = $_POST["ssid_interface_selector"];
$ssid=explode(" ", $_POST["ssid"])[0];
$wifi_password=$_POST["wifi_password"];

shell_exec("sudo /etc/node-scripts/connect_to_wifi.sh " . $ssid . " "  . $wifi_password . " "  . $connect_interface);
header("Location: ../settings.html");
?>