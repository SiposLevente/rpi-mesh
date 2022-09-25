<?php
$plugin_name = $_POST["plugin"];
$plugin_folder = "../plugins/";

$info = json_decode(file_get_contents($plugin_folder . $plugin_name."/info.json"));

echo "<h3 style=\"text-align: center\">$info->pluginName</h3><center>v$info->version by $info->author</center><p>$info->long_description</p><div class=\"plugin_settings\"><a class=\"settings_button\" href=\"./plugins/$plugin_name/pages/settings.php\" >Settings</a></div>"




?>
