var interfaces = [];

$.ajax({
        method: "POST",
        url: "./scripts/interfaceIp.php",
    })
    .done(function(response) {
        var data_entries = response.replaceAll(/<.?p>|<.?span>/gm, '').split('\n');

        for (var i = 0; i < data_entries.length - 1; i++) {
            var split_data = data_entries[i].split('/');
            var interface_plus_ip = split_data[0].split(':');
            interfaces[i] = interface_plus_ip[0];
        }

        set_selector("if_to_mesh", if_to_mesh_rule);
        set_selector("gw_if", gw_rule);
        set_selector("if1", function() {return true;});
        set_selector("if2", function() {return true;});
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
        .done(function(response) {
            $("div.list_of_bridges").html(response);
        });
}

function if_to_mesh_rule(interface_name) {
    if (interface_name.includes("bat")) {
        return false;
    }
    return true;
}

function gw_rule(interface_name) {
    return !if_to_mesh_rule(interface_name);
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
