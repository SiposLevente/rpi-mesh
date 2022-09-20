<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Configuration</title>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <script src="./scripts/interface_scripts.js"></script>
</head>

<body>
    <div class="container">
        <div class="toppane">
            <img src="icon.png" class="top_img" alt="">
            <p class="top_txt">Interface Configuration</p>
        </div>
        <div class="leftpane">
            <a href="index.php" class="side_btn"><span class="side_btn_span">System Status</span></a>
            <a href="interface.php" class="selected_menu"><span class="side_btn_span">Interface configuration</span></a>
            <a href="configuration.php" class="side_btn"><span class="side_btn_span">Node Configuration</span></a>
            <a href="settings.php" class="side_btn"><span class="side_btn_span">System settings</span></a>
            <a href="plugins.php" class="side_btn"><span class="side_btn_span">Plugins</span></a>
        </div>
        <div class="middlepane">

            <form action="./scripts/apply_interface.php" method="post">
                <label for="interfaces">Select Interface to configure:</label>
                <select id="selector" name="interfaces" id="interfaces">
                </select>

                <div>Selected interface is <span id="interface_status"></span><button onclick="toggle_interface()" type="button">Toggle!</button>
                </div>
                <hr>

                Interface address mode:<br>
                <input type="radio" id="static" checked="checked" name="address_mode" onchange="radio_change_event(this)" value="static">
                <label for="static">Static </label>
                <br>
                <input type="radio" id="dhcp" name="address_mode" onchange="radio_change_event(this)" value="dhcp">
                <label for="dhcp">DHCP </label>
                <br>
                <input type="radio" id="avahi" name="address_mode" onchange="radio_change_event(this)" value="avahi">
                <label for="avahi">Avahi </label>
                <br>
                <hr>
                <div class="static_ip">
                    <label class="static_ip" for="ip">Interface address:</label>
                    <input class="static_ip" id="ip" name="ip" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                    <label class="static_ip" for="mask">/</label>
                    <input class="static_ip" id="mask" name="mask" type="number" min="1" max="30" size="3" required>
                    <br>
                    <label class="static_ip" for="gateway">Gateway: </label>
                    <input class="static_ip" name="gateway" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                    <br>
                    <label class="static_ip" for="dns_1">DNS server #1: </label>
                    <input class="static_ip" name="dns_1" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                    <br>
                    <label class="static_ip" for="dns_2">DNS server #2: </label>
                    <input class="static_ip" name="dns_2" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                    <br>
                </div>
                <input id="submit_button" type="submit" value="Save">
            </form>


        </div>
    </div>
</body>

</html>
