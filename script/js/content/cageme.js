$(document).ready(function () {
    var activeone = null;

    $("#CListMouse a").on("click", function(){
        $(".ListMouse").find(".active").removeClass("active");
        $(this).addClass("active");
        activeone = $(this).attr('id');
    });

    $("#mousetocage").on("click", function(){
       addBen("Maus verschoben","Hier soll stehen welche Maus in welchen Käfig geschoben wurde","info");
    });

    $("#cagetomouse").on("click", function(){
        addBen("Maus entnommen","Die Maus mit der ID #"+ activeone.substring(1) +" wurde entnommen","info");

    });



});