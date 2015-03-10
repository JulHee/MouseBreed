$(document).ready(function () {
    $("#ListMouse a").on("click", function(){
        $("#ListMouse").find(".active").removeClass("active");
        $(this).addClass("active");
    });

    $("#mousetocage").on("click", function(){
       addBen("Maus verschoben","Hier soll stehen welche Maus in welchen Käfig geschoben wurde","info");
    });

    $("#cagetomouse").on("click", function(){
        addBen("Maus entnommen","Hier soll stehen welche Maus aus welchem Käfig entnommen wurde","info");
    });

});