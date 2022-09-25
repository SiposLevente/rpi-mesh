function update_plugins() {
    $.ajax({
            method: "POST",
            url: "./scripts/plugin_read.php",
            data: {
                text: $("div.plugin_menu").text()
            }
        })
        .done(function(response) {

            $("div.plugin_menu").html(response);
        });
}

function displayDescription(plugin_name) {
    $.ajax({
            method: "POST",
            url: "./scripts/plugin_sidepanel_data.php",
            data: {
                plugin: plugin_name
            }
        })
        .done(function(response) {

            $("div.side_description").html(response);
        });



}

update_plugins();
setInterval(update_plugins, 5000);
