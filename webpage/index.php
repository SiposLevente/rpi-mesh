<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Status</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="./scripts/index_scripts.js"></script>
</head>

<body>
    <div class="container">
        <div class="toppane">
            <img src="icon.png" class="top_img" alt="">
            <p class="top_txt">System Status</p>
        </div>
        <div class="leftpane">
            <a href="index.php" class="selected_menu"><span class="side_btn_span">System Status</span></a>
            <a href="interface.php" class="side_btn"><span class="side_btn_span">Interface configuration</span></a>
            <a href="configuration.php" class="side_btn"><span class="side_btn_span">Node Configuration</span></a>
            <a href="settings.php" class="side_btn"><span class="side_btn_span">System settings</span></a>
            <a href="plugins.php" class="side_btn"><span class="side_btn_span">Plugins</span></a>
        </div>
        <div class="middlepane">
            <h3>System Information</h3>
            <div class="data_line">System time: <div style="display:inline-block" class="time"></div>
            </div>
            <div class="data_line">Startup time: <div style="display:inline-block" class="startup-time"></div>
            </div>
            <div class="data_line">Temperature: <div style="display:inline-block" class="temperature"></div>
            </div>
            <div class="data_line">Memory usage: <div style="display:inline-block" class="memory"></div>
            </div>
            <div class="data_line">Swap usage: <div style="display:inline-block" class="swap"></div>
            </div>
            <hr>
            <h3>Network Addresses</h3>
            <div class="interfaces data_line"></div>

            <hr>
            <h3>Storage statistics</h3>
            <div class="storage data_line"></div>
        </div>

    </div>




</body>

</html>
