const IP_PLACEHOLDER = "xxx.xxx.xxx.xxx";
var interfaces = [];

$.ajax({
    method: "POST",
    url: "./scripts/interfaceIp.php",
})
    .done(function (response) {
        var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, "").split("\n").filter(function (element) { return element != "" });
        var ap_selector = document.getElementById("ap_selector");
        var ssid_interface_selector = document.getElementById("ssid_interface_selector");

        for (var i = 0; i < data_entries.length; i++) {
            var split_data = data_entries[i].split("/");
            var interface_plus_ip = split_data[0].split(":");
            if (interface_plus_ip[1].trim() == "Offline") {
                interfaces[i] = {
                    interface: interface_plus_ip[0],
                    ip: IP_PLACEHOLDER,
                    mask: "24"
                };
            } else {
                interfaces[i] = {
                    interface: interface_plus_ip[0],
                    ip: interface_plus_ip[1].trim(),
                    mask: split_data[1].trim()
                };
            }
            if (interfaces[i].interface[0] == "w") {
                ap_selector.options[ap_selector.options.length] = new Option(interfaces[i].interface, interfaces[i].interface);
                ssid_interface_selector.options[ssid_interface_selector.options.length] = new Option(interfaces[i].interface, interfaces[i].interface);
            }
        }
        get_ssids()
    });

window.onload = function () {
    ap_status();

    document.getElementById("ssid_interface_selector").onchange = function () {
        get_ssids();
    }
};

setInterval(ap_status, 2500);

function get_ssids() {
    $.ajax({
        method: "POST",
        url: "./scripts/get_ssids.php",
    })
        .done(function (response) {
            var ssid_selector = document.getElementById("ssid");
            if (!ssid_selector.disabled){
                ssid_selector.disabled = false;
            }
            
            if (response != "") {
                var data_entries = response.replaceAll("SSID: ", "").split("\n").filter(function (element) { return element != "" });
                document.getElementById("ssid_warning").innerHTML = "";
                document.getElementById("ssid_interface_selector").disabled = false;
                document.getElementById("ssid").disabled = false;
                document.getElementById("wifi_password").disabled = false;
                document.getElementById("submit_ssid_button").disabled = false;


                for (var i = 0; i < data_entries.length; i++) {
                    var data = data_entries[i].trim();
                    ssid_selector.options[i] = new Option(data, data);
                }
            } else {
                document.getElementById("ssid_warning").innerHTML = "Wireless interfaces are unreachable! Please turn on a wireless interface to see nearby WiFi SSIDs!";
                document.getElementById("ssid_interface_selector").disabled = true;
                document.getElementById("ssid").disabled = true;
                document.getElementById("wifi_password").disabled = true;
                document.getElementById("submit_ssid_button").disabled = true;
            }
        });
}

$.ajax({
    method: "POST",
    url: "./scripts/get_wifi_name.php",
})
    .done(function (response) {
        document.getElementById("ap_name").value = response;
    });

$.ajax({
    method: "POST",
    url: "./scripts/get_country_code.php",
})
    .done(function (response) {
        document.getElementById("country_code").value = response;
    });

$.ajax({
    method: "POST",
    url: "./scripts/get_channel.php",
})
    .done(function (response) {
        document.getElementById("channel").value = response;
    });

$.ajax({
    method: "POST",
    url: "./scripts/get_password.php",
})
    .done(function (response) {
        document.getElementById("password").value = response;
    });

$.ajax({
    method: "POST",
    url: "./scripts/get_current_connection.php",
})
    .done(function (response) {
        var current_connecetions = document.getElementById("current_connection");
        if (response != "") {
            current_connecetions.innerHTML = response;
        } else {
            current_connecetions.innerHTML = "No active wireless conenction!";
        }
    });

function ap_status() {
    $.ajax({
        method: "POST",
        url: "./scripts/access_point_status.php",
    })
        .done(function (response) {
            document.getElementById("ap-status").innerHTML = response;
        });
}

function toggle_ap() {
    $.ajax({
        method: "POST",
        url: "./scripts/toggle_ap.php",
        data: {
            interface: document.getElementById("ap_selector").value
        }
    })
        .done(function (response) {
            ap_status();
        });
}