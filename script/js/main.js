var URL_ROOT = "http://local.mousebreed";
var Logout = {

    onReady: function () {
        $("#logout").click(Logout.run);
    },

    run: function () {
        $.ajax({
            url: "/script/php/ajax/logout.php"
        }).done(function () {
            location.replace(URL_ROOT);
        });
    }
};

// Datenstruktur zum speichern der Elemente aus mouse.js

function Mouse(sex, genotyp, age, weight) {
    this.sex = sex;
    this.genotyp = genotyp;
    this.age = age;
    this.weight = weight;
    function toString() {
        return "{" + this.sex + "," + this.genotyp + "," + this.age + "," + this.weight + "," + "}"
    }
}

function addBen(titel, nachricht, art) {
    // TODO: Die Nachricht muss unterhalb der Oberen leiste angezeigt werden
    switch (art) {
        case "success":
            $.notify(nachricht, "success");
            break;
        case "warn":
            $.notify(nachricht, "warn");
            break;
        case "info":
            $.notify(nachricht, "info");
            break;
        case "error":
            $.notify(nachricht, "error", {gap: 30});
            break;
        default:
            $.notify(nachricht, "info");
            break;
    }
    var date = new Date();
    $("#benliste_top").prepend('<li class="divider"></li>');
    $("#benliste_top").prepend('<li class="benMessagetoDelete"><a href="#"><div class="benTitle"><strong>' + titel + '</strong></div><div class="bentimestamp"><p class="text-muted"><em>' + date.toLocaleString() + '</em></p></div><div class="benMessage">' + nachricht + '</div></a></li>');
    $("#NumBen").html($("#benliste_top > li.benMessagetoDelete").length);
}

var loginTOP = {

    onReady: function () {
        $("#TOPlogin_button").click(loginTOP.check);
        $(document).keypress(loginTOP.keyPressed);
    },

    check: function () {
        $.ajax({
            type: "POST",
            url: "/script/php/ajax/login.php",
            data: {password: $("#TOPpassword").val(), username: $("#TOPusername").val()},
            dataType: "json"
        }).done(function (response) {
            if (response.success == true) {
                $("#TOPlogin_form").submit();
            } else {
                $("#TOPusername").notify("Benutzername oder Passwort falsch", "error");
            }
        });
    },

    keyPressed: function (e) {
        if (e.which == 13) {
            $("#TOPlogin_button").click();
            return false;
        }
    }

};

// Checken ob der Browser LocalStorage unterstützt
function supports_html5_storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}

/*
 Man setzt zwei Elementidentifikatoren als Standart z.b.:
 i.      mouse
 ii.     name
 iii.    info
 */

function loadGameState() {
    if (!supports_html5_storage()) {
        alert("Der Browser unterstützt das Feature 'LocalStorage' nicht");
    }

    var name_of_mouse = parseInt(localStorage.getItem("mousebreed.gamestate.mouse_number"));
    var array_of_mouse_info = new Array(name_of_mouse);
    for (i = 0; i < name_of_mouse; i++) {
        array_of_mouse_info[i] = JSON.parse(localStorage.getItem("mousebreed.gamestate.mouse." + i));
    }
    return array_of_mouse_info;
}

function saveGameState(array_of_mouses) {
    if (!supports_html5_storage()) {
        alert("Der Browser unterstützt das Feature 'LocalStorage' nicht");
    }
    // Set the number of Mouses to save in localStorage
    localStorage.setItem("mousebreed.gamestate.mouse_number", array_of_mouses.length);
    for (var i = 0; i < array_of_mouses.length; i++) {
        localStorage.setItem(["mousebreed.gamestate.mouse." + i], JSON.stringify(array_of_mouses[i]));
    }

}


$(document).ready(function () {
    Logout.onReady();
    loginTOP.onReady();

    $("#mybutton").click(
        function () {
            addBen($("#title").val(), $("#name").val(), document.querySelector('input[name="inlineRadioOptionen"]:checked').value);
        });
    $('#deleteall').click(
        function () {
            // TODO Sehr unsauber sollte noch verbessert werden funktion wird nicht mehr angefügt nach Löschen

            $("#benliste_top").empty();
            // $("#benliste_top").prepend('<li class="divider"></li>');
            $("#benliste_top").prepend('<li id="benLast"><button id="deleteall" class="btn btn-danger center-block">Alles Löschen</button></li>');
            $("#NumBen").html(0);
        }
    );
    $('#benachrichtigung').click(
        function () {
            $('#deleteall').click(
                function () {
                    // TODO Sehr unsauber sollte noch verbessert werden funktion wird nicht mehr angefügt nach Löschen

                    $("#benliste_top").empty();
                    // $("#benliste_top").prepend('<li class="divider"></li>');
                    $("#benliste_top").prepend('<li id="benLast"><button id="deleteall" class="btn btn-danger center-block">Alles Löschen</button></li>');
                    $("#NumBen").html(0);
                }
            );
        }
    );
});