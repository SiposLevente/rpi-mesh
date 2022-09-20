
                <hr>
                <h2>DHCP Service</h2>
                <div>DHCP service is <span id="dhcp-status"></span><button onclick="toggle_dhcp()" type="button">Toggle!</button>



                    <form action="./scripts/apply_dhcp.php" method="post">
                        <label for="interfaces">Select Interface to configure DHCP on: </label>
                        <select id="dhcp_selector" name="interfaces" id="dhcp_interfaces">
                        </select>
                        <br>
                        <label for="leash_time">Default leash time (seconds): </label>
                        <input id="leash_time" placeholder="600" value="600" size="5" name="leash_time" type="number" required>
                        <br>
                        <label for="max_leash_time">Max leash time (seconds): </label>
                        <input id="leash_time" placeholder="7200" value="7200" size="5" name="max_leash_time" type="number" required>
                        <br>
                        <label for="authoritive">Authoritive: </label>
                        <input id="authoritive" name="authoritive" type="checkbox" checked>
                        <br>

                        <label for="subnet">Subnet: </label>
                        <input name="subnet" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <br>

                        <label for="netmask">Netmask: </label>
                        <input name="netmask" value="255.255.255.0" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <br>

                        <label for="range-1">Address range: </label>
                        <input name="range-1" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <label for="range-2"> - </label>
                        <input name="range-2" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <br>

                        <label for="router">Router: </label>
                        <input name="router" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <br>
                        <label for="dns1">DNS 1: </label>
                        <input name="dns1" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <br>
                        <label for="dns2">DNS 2: </label>
                        <input name="dns2" placeholder="xxx.xxx.xxx.xxx" type="text" minlength="7" maxlength="15" size="12" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required>
                        <br>
