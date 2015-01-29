
var URL_ROOT = "http://local.mousebreed";

$( document ).ready(function() {

    $( ".left_list" ).css('height', ($( ".content_container" ).height() - $( ".left_list_head" ).height() - 20) + 'px');

    $( "#logout_button" ).click(function() {
        $.ajax({
            url: URL_ROOT + "/script/php/ajax/logout.php"
        }).done(function() {
            location.reload();
        });
    });

    // testen des LocalStorage
    var m = new Mouse("m","ACAD",10,500);
    var k = new Mouse("m","ACAD",5,100);
    var arr = new Array(m,k);

    saveGameState(arr);
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

