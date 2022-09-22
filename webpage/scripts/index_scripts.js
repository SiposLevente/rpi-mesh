function updateTime() {
    $.ajax({
            method: "POST",
            url: "./scripts/time.php",
            data: {
                text: $("div.time").text()
            }
        })
        .done(function(response) {
            $("div.time").html(response);
        });
}

unction updateStartupTime() {
    $.ajax({
            method: "POST",
            url: "./scripts/uptime.php",
            data: {
                text: $("div.startup-time").text()
            }
        })
        .done(function(response) {
            $("div.startup-time").html(response);
        });
}

function updateTemp() {
    $.ajax({
            method: "POST",
            url: "./scripts/temp.php",
            data: {
                text: $("div.temperature").text()
            }
        })
        .done(function(response) {
            $("div.temperature").html(response);
        });
}

function updateInterfaces() {
    $.ajax({
            method: "POST",
            url: "./scripts/interfaceIp.php",
            data: {
                text: $("div.interfaces").text()
            }
        })
        .done(function(response) {
            $("div.interfaces").html(response);
        });
}

function updateMemory() {
    $.ajax({
            method: "POST",
            url: "./scripts/memory.php",
            data: {
                text: $("div.memory").text()
            }
        })
        .done(function(response) {
            $("div.memory").html(response);
        });
}

function updateSwap() {
    $.ajax({
            method: "POST",
            url: "./scripts/swap.php",
            data: {
                text: $("div.swap").text()
            }
        })
        .done(function(response) {
            $("div.swap").html(response);
        });
}

function updateStorage() {
    $.ajax({
            method: "POST",
            url: "./scripts/diskUsage.php",
            data: {
                text: $("div.storage").text()
            }
        })
        .done(function(response) {
            $("div.storage").html(response);
        });
}

function updateTexts() {
    updateTime();
    updateTemp();
    updateSwap();
    updateMemory();
    updateStartupTime();
}

function slowUpdate() {
    updateInterfaces();
    updateStorage();
}


updateStartupTime();
updateInterfaces();
updateStorage();
updateMemory();
updateSwap();
updateTime();
updateTemp();

setInterval(updateTexts, 1000);
setInterval(slowUpdate, 10000);
