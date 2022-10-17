const IP_PLACEHOLDER = "xxx.xxx.xxx.xxx";
var interfaces = [];


$.ajax({
    method: "POST",
    url: "./scripts/interfaceIp.php",
})
    .done(function (response) {
        var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, '').split('\n').filter(function (element) { return element != "" });
        var selector = document.getElementById("selector");
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
            selector.options[selector.options.length] = new Option(interfaces[i].interface, interfaces[i].interface);
        }

        set_input();
        selector.onchange = function () {
            updated_interfaces();
            set_input();
        }
    });

setInterval(updated_interfaces, 1000);

function updated_interfaces() {
    $.ajax({
        method: "POST",
        url: "./scripts/interfaceIp.php",
    })
        .done(function (response) {
            var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, '').split('\n').filter(function (element) { return element != "" });
            var selector = document.getElementById("selector");
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
            }
        });
}


function set_input() {
    if (interfaces[selector.selectedIndex].ip != IP_PLACEHOLDER) {
        document.getElementById("interface_status").innerHTML = "UP\t";
        document.querySelectorAll('input.static_ip').forEach(element => element.disabled = false);
        document.getElementById("ip").placeholder = interfaces[selector.selectedIndex].ip;
        document.getElementById("ip").value = interfaces[selector.selectedIndex].ip;
        document.getElementById("mask").placeholder = interfaces[selector.selectedIndex].mask;
        document.getElementById("mask").value = interfaces[selector.selectedIndex].mask;
        document.getElementById("submit_button").disabled = false;
    } else {
        document.getElementById("ip").value = IP_PLACEHOLDER;
        document.getElementById("ip").placeholder = IP_PLACEHOLDER;
        document.getElementById("interface_status").innerHTML = "DOWN\t";
        //document.querySelectorAll('input.static_ip').forEach(element => element.disabled = true);
        //document.getElementById("submit_button").disabled = true;
    }
}


function toggle_interface() {
    var interface = interfaces[selector.selectedIndex].interface;
    $.ajax({
        method: "POST",
        url: "./scripts/toggle_interface.php",
        data: {
            "interface": interface
        }
    })
        .done(function (response) { });
    set_input();
}


function display_static() {
    document.querySelectorAll('*.static_ip').forEach(element => element.style.visibility = "visible");
    document.querySelectorAll('*.static_ip').forEach(element => element.disabled = false);
    document.querySelectorAll('*.dhcp_ip').forEach(element => element.style.visibility = "hidden");
    document.querySelectorAll('*.dhcp_ip').forEach(element => element.disabled = true);
    document.querySelectorAll('*.avahi_ip').forEach(element => element.style.visibility = "hidden");
    document.querySelectorAll('*.avahi_ip').forEach(element => element.disabled = true);
    set_input();
}

function display_dhcp() {
    document.querySelectorAll('*.static_ip').forEach(element => element.style.visibility = "hidden");
    document.querySelectorAll('*.static_ip').forEach(element => element.disabled = true);
    document.querySelectorAll('*.dhcp_ip').forEach(element => element.style.visibility = "visible");
    document.querySelectorAll('*.dhcp_ip').forEach(element => element.disabled = false);
    document.querySelectorAll('*.avahi_ip').forEach(element => element.style.visibility = "hidden");
    document.querySelectorAll('*.avahi_ip').forEach(element => element.disabled = true);
}

function display_avahi() {
    document.querySelectorAll('*.static_ip').forEach(element => element.style.visibility = "hidden");
    document.querySelectorAll('*.static_ip').forEach(element => element.disabled = true);
    document.querySelectorAll('*.dhcp_ip').forEach(element => element.style.visibility = "hidden");
    document.querySelectorAll('*.dhcp_ip').forEach(element => element.disabled = true);
    document.querySelectorAll('*.avahi_ip').forEach(element => element.style.visibility = "visible");
    document.querySelectorAll('*.avahi_ip').forEach(element => element.disabled = false);
}

function radio_change_event(radio) {
    switch (radio.value) {
        case "static":
            display_static();
            break;
        case "dhcp":
            display_dhcp();
            break;
        case "avahi":
            display_avahi();
            break;

    }

}
