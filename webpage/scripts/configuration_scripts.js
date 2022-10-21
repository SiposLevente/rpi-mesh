var interfaces = [];
var mesh_interfaces = [];

$.ajax({
    method: "POST",
    url: "./scripts/interfaceIp.php",
})
    .done(function (response) {
        var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, '').split('\n').filter(function (element) { return element != "" });

        for (var i = 0; i < data_entries.length; i++) {
            var split_data = data_entries[i].split('/');
            var interface_plus_ip = split_data[0].split(':');
            interfaces[i] = interface_plus_ip[0];
        }

        set_selector("if_to_mesh", if_to_mesh_rule);
        set_selector("gw_if", gw_rule);

        set_selector("fa_if1", every_interface_rule);
        set_selector("fa_if2", every_interface_rule);

        set_selector("fd_if1", every_interface_rule);
        set_selector("fd_if2", every_interface_rule);

        set_selector("if1", every_interface_rule);
        set_selector("if2", every_interface_rule);
    });

$.ajax({
    method: "POST",
    url: "./scripts/list_mesh_if.php",
})
    .done(function (response) {
        var data_entries = response.split('\n');
        var selector = document.getElementById("if_from_mesh");
        var list = document.getElementById("interface_list");
        for (var i = 0; i < data_entries.length - 1; i++) {
            mesh_interfaces[i] = data_entries[i];
            selector.options[selector.options.length] = new Option(data_entries[i], data_entries[i]);
            list.innerHTML += "<li>" + data_entries[i] + "</li>";
        }
    });

updateBridgeList();

setInterval(updateBridgeList, 5000);

function updateBridgeList() {
    $.ajax({
        method: "POST",
        url: "./scripts/list_bridge.php",
        data: {
            text: $("div.list_of_bridges").text()
        }
    })
        .done(function (response) {
            $("div.list_of_bridges").html(response);
        });
}

function if_to_mesh_rule(interface_name) {
    return (!interface_name.includes("bat") && !mesh_interfaces.includes(interface_name));
}

function gw_rule(interface_name) {
    return interface_name.includes("bat");
}

function every_interface_rule() {
    return true;
}

function set_selector(selector_name, rule) {
    var selector = document.getElementById(selector_name);
    for (let index = 0; index < interfaces.length; index++) {
        var interf = interfaces[index]
        if (rule(interf)) {
            selector.options[selector.options.length] = new Option(interf, interf);
        }
    }
}
