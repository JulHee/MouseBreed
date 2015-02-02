
var URL_ROOT = "http://local.mousebreed";

var Navi = {

    onReady: function() {
        // check is naviHidden cookie is set, default value is false
        if(!($.cookie('naviHidden') == "true" || $.cookie('naviHidden') == "false")) {
            $.cookie('naviHidden', 'false');
        }
        var naviAnchor = $( ".menu_container" );
        naviAnchor.on('click', '.arrow_in', Navi.toogleOut);
        naviAnchor.on('click', '.arrow_out', Navi.toogleIn);
    },

    toogleOut: function() {
        $( ".menu_container").animate({ "margin-left": "-250px" }, "slow" );
        $( ".arrow").removeClass("arrow_in").addClass("arrow_out");
        $.cookie('naviHidden', 'true');
    },

    toogleIn: function() {
        $( ".menu_container").animate({ "margin-left": "0" }, "slow" );
        $( ".arrow").removeClass("arrow_out").addClass("arrow_in");
        $.cookie('naviHidden', 'false');
    }
};

var Logout = {

    onReady: function() {
        $( "#logout" ).click(Logout.run);
    },

    run: function() {
        $.ajax({
            url: URL_ROOT + "/script/php/ajax/logout.php"
        }).done(function() {
            location.replace(URL_ROOT);
        });
    }
};

$( document ).ready(function() {

    Navi.onReady();
    Logout.onReady();

    /*
    // testen des LocalStorage
    var m = new Mouse("m","ACAD",10,500);
    var k = new Mouse("m","ACAD",5,100);
    var arr = new Array(m,k);

    saveGameState(arr);
    */
});

// Datenstruktur zum speichern der Elemente aus mouse.js

function Mouse(sex,genotyp,age,weight){
    this.sex = sex;
    this.genotyp = genotyp;
    this.age = age;
    this.weight = weight;
    function toString(){
        return "{"+this.sex+","+this.genotyp+","+this.age+","+this.weight+","+"}"
    }
}


// Checken ob der Browser LocalStorage unterstützt
function supports_html5_storage(){
    try{
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e){
        return false;
    }
}

/*
    Man setzt zwei Elementidentifikatoren als Standart z.b.:
        i.      mouse
        ii.     name
        iii.    info
 */


function loadGameState(){
    if (!supports_html5_storage())
    {
        alert("Der Browser unterstützt das Feature 'LocalStorage' nicht");
    }

    var name_of_mouse = parseInt(localStorage.getItem("mousebreed.gamestate.mouse_number"));
    var array_of_mouse_info = new Array(name_of_mouse);
    for (i = 0; i < name_of_mouse;i++){
       array_of_mouse_info[i] = JSON.parse(localStorage.getItem("mousebreed.gamestate.mouse."+i));
    }
    return array_of_mouse_info;
}

function saveGameState(array_of_mouses){
    if (!supports_html5_storage())
    {
        alert("Der Browser unterstützt das Feature 'LocalStorage' nicht");
    }
    // Set the number of Mouses to save in localStorage
    localStorage.setItem("mousebreed.gamestate.mouse_number",array_of_mouses.length);
    for (var i=0; i < array_of_mouses.length; i++){
        localStorage.setItem(["mousebreed.gamestate.mouse."+i],JSON.stringify(array_of_mouses[i]));
    }

}

