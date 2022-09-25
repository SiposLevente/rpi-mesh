<?php
$plugin_folder = "../plugins/";
$plugins = scandir($plugin_folder);
$respounse = "";
$style_toggler = true;
$style_one = "color_one";
$style_two = "color_two";
foreach($plugins as $plugin){
    if($plugin[0] != '.'){
        $info = json_decode(file_get_contents($plugin_folder . $plugin."/info.json"));
        $style = $style_one;
        if($toggler){
            $style=$style_two;
            $toggler = !$toggler;
        }else{
            $toggler = !$toggler;
        }

        $respounse .= "<div class=\"$style\" onclick=\"displayDescription('$plugin')\">$info->pluginName <span class=\"right\">ver.: $info->version</span><br>$info->short_description<span class=\"right\"> Created by: $info->author<span></div>";



    }
}
echo $respounse;


?>
