<?php
$temp = exec("cat /sys/class/thermal/thermal_zone0/temp | cut -c 1-3 | sed -e \"s/.\{2\}/&.    /g\"");                                                                                                          
$tempNum = floatval($temp);
if($tempNum < 40)
{
    echo "<span style=\"color:rgb(0,200,0)\">";
}
else if ($tempNum >= 40 && $tempNum < 60)
{
    echo "<span style=\"color:orange\">";
}
else
{
    echo "<span style=\"color:red\">";
}

echo " $temp </span>°C"

?>
