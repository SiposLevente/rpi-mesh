<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System settings</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="./scripts/settings_scripts.js"></script>
</head>

<body>
<?php
function isProcessRunning($proc)
{
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
}
?>




    <div class="container">
        <div class="toppane">
            <img src="icon.png" class="top_img" alt="">
            <p class="top_txt">System settings</p>
        </div>
        <div class="leftpane">
            <a href="index.html" class="side_btn"><span class="side_btn_span">System Status</span></a>
            <a href="interface.html" class="side_btn"><span class="side_btn_span">Interface configuration</span></a>
            <a href="configuration.html" class="side_btn"><span class="side_btn_span">Node Configuration</span></a>
            <a href="settings.php" class="selected_menu"><span class="side_btn_span">System settings</span></a>
            <a href="plugins.html" class="side_btn"><span class="side_btn_span">Plugins</span></a>
        </div>
        <div class="middlepane">
            <h2>Access point configuration</h2>
            <div>Access point is <span id="ap-status"><?php isProcessRunning("hostapd")  ?> </span><button onclick="toggle_ap()" type="button">Toggle!</button>
                <form action="./scripts/apply_ap.php" method="post">
                    <label for="interfaces">Select interface to configure access point on: </label>
                    <select id="ap_selector" name="interfaces" id="ap_interfaces">
                    </select>
                    <br>
                    <label for="ap_name">SSID: </label>
                    <input id="ap_name" placeholder="Network_Name" maxlength="32" minlength="1" size="15" name="ap_name" type="text" required>
                    <br>
                    <label for="country_code">Country code: </label>
                    <input id="country_code" placeholder="US" maxlength="2" minlength="1" size="2" name="country_code" type="text" required>
                    <br>

                    <label for="wifi_mode">Select interface to configure access point on:</label>
                    <select id="wifi_mode" name="wifi_mode" id="wifi_mode">
                        <option value="a">a</option>
                        <option value="b">b</option>
                        <option selected="selected" value="g">g</option>
                    </select>
                    <br>
                    <label for="channel">Channel: </label>
                    <input id="channel" placeholder="9" size="3" min="1" max="13" name="channel" type="number" required>
                    <br>

                    <label for="password">Password: </label>
                    <input id="password" maxlength="63" minlength="8" size="15" name="password" type="password" required>
                    <br>

                    <!--

    ssid=Rpi-Network
    country_code=HU
    ieee80211d=1
    ieee80211n=1
    hw_mode=g
    channel=9
    macaddr_acl=0

    wmm_enabled=1
    auth_algs=1
    ignore_broadcast_ssid=1
    wpa=2
    wpa_passphrase=RpiNehezJelszoLew
    wpa_key_mgmt=WPA-PSK
    wpa_pairwise=TKIP
    rsn_pairwise=CCMP

    -->


                    <input id="submit_button" type="submit" value="Save">
                </form>




</div>
</div>


</body>

</html>
