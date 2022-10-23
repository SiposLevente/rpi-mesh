<?php
$active = exec("systemctl is-active hostapd.service");
if($active == "active") {
    $result = "ONLINE";
}
else {
    $result = "OFFLINE";
}
echo $result;
?>