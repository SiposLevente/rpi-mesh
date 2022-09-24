$.ajax({
        method: "POST",
        url: "./scripts/plugins.php",
        data: {
            text: $("div.plugin_menu").text()
        }
    })
    .done(function(response) {

        $("div.plugin_menu").html(response);
    });
