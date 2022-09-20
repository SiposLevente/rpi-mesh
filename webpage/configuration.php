<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Node Configuration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <script src="./scripts/configuration_scripts.js"></script>
</head>

<body>
    <div class="container">
        <div class="toppane">
            <img src="icon.png" class="top_img" alt="">
            <p class="top_txt">Node Configuration</p>
        </div>
        <div class="leftpane">
            <a href="index.php" class="side_btn"><span class="side_btn_span">System Status</span></a>
            <a href="interface.php" class="side_btn"><span class="side_btn_span">Interface configuration</span></a>
            <a href="configuration.php" class="selected_menu"><span class="side_btn_span">Node Configuration</span></a>
            <a href="settings.php" class="side_btn"><span class="side_btn_span">System settings</span></a>
            <a href="plugins.php" class="side_btn"><span class="side_btn_span">Plugins</span></a>
        </div>
        <div class="middlepane">
            <h2>Mesh settings</h2>
            <form action="./scripts/add_if_to_mesh.php" method="post">
                <label for="if_to_mesh">Select interface to add to mesh: </label>
                <select id="selector" name="if_to_mesh" id="if_to_mesh">
                </select>
                <input id="submit_button" type="submit" value="Add!">
            </form>
            <h3>List of interfaces in mesh: </h3> 

            <hr>
            <h2>Gateway settings</h2>
            <form action="./scripts/set_gw_mode.php" method="post">
                <label for="gw_if">Select interface to set gateway mode: </label>
                <select id="selector" name="gw_if" id="gw_if">
                </select>
                </br>
                <input type="radio" id="server" checked="checked" name="gw_mode" value="server">
                <label for="server">Server </label>
                <br>
                <input type="radio" id="client" name="gw_mode" value="client">
                <label for="client">Client </label>
                <br>
                <input type="radio" id="off" name="gw_mode" value="off">
                <label for="off">OFF</label>
                <br>

                <input id="submit_button" type="submit" value="Set!">
            </form>


            <hr>
            <h2>Bridge settings</h2>
            <h3>Add bridge</h3>
            <form action="./scripts/set_bridge.php" method="post">
                Bridge
                <select id="selector" name="if1" id="if1">
                </select>
                with
                <select id="selector" name="if2" id="if2">
                </select>
                <br>

                <label for="bridge_name">Input a bridge name: </label>
                <input id="bridge_name" name="bridge_name" type="text" minlength="2" maxlength="16" size="12" required>


                <input id="submit_button" type="submit" value="Set!">
            </form>
            <h3>Delete bridge</h3>
            <form action="./scripts/set_bridge.php" method="post">

                <label for="bridge_selector">Select bridge to delete: </label>
                <select id="selector" name="bridge_selector" id="bridge">
                </select>


                <input id="submit_button" type="submit" value="Delete!">
            </form>

            <h3>List of bridges:</h3>



        </div>
    </div>
</body>

</html>
