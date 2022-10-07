<?php
$active = exec("systemctl is-active $proc");
$result = "";
if($active == "active")
{
$result = "ONLINE";
}
else
{
$result =  "OFFLINE";
}
echo $result;
?>