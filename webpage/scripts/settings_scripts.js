const IP_PLACEHOLDER = "xxx.xxx.xxx.xxx";
var interfaces = [];


$.ajax({
    method: "POST",
    url: "./scripts/interfaceIp.php",
})
    .done(function (response) {
        var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, '').split('\n').filter(function (element) { return element != "" });
        //        var dhcp_selector = document.getElementById("dhcp_selector");
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
            //dhcp_selector.options[dhcp_selector.options.length] = new Option(interfaces[i].interface, interfaces[i].interface);
            if (interfaces[i].interface[0] == 'w') {
                ap_selector.options[ap_selector.options.length] = new Option(interfaces[i].interface, interfaces[i].interface);
            }
        }


        //        set_input();
        ap_selector.onchange = function () {
            //set_input();
        }
        /*        dhcp_selector.onchange = function() {
                    //set_input();
                }
                */
    });

function toggle_ap() {
    $.ajax({
        method: "POST",
        url: "./scripts/toggle_ap.php",
    })
        .done(function (response) {
         });
}