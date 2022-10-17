const IP_PLACEHOLDER = "xxx.xxx.xxx.xxx";
var interfaces = [];

$.ajax({
    method: "POST",
    url: "./scripts/interfaceIp.php",
})
    .done(function (response) {
        var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, '').split('\n').filter(function (element) { return element != "" });
        var ap_selector = document.getElementById("ap_selector");

        for (var i = 0; i < data_entries.length; i++) {
            var split_data = data_entries[i].split('/');
            var interface_plus_ip = split_data[0].split(':');
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
            if (interfaces[i].interface[0] == 'w') {
                ap_selector.options[ap_selector.options.length] = new Option(interfaces[i].interface, interfaces[i].interface);
            }
        }
    });
ap_status();
setInterval(ap_status, 2500);

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