$(document).ready(function () {

    $("#CListMouse a").on("click", function(){
        if ($(this).hasClass("active")){
        $(this).removeClass("active");}
        else {$(this).addClass("active")};
    });

    $("#mousetocage").on("click", function(){
       addBen("Maus verschoben","Hier soll stehen welche Maus in welchen Käfig geschoben wurde","info");
    });

    $("#cagetomouse").on("click", function(){

        addBen("Maus entnommen","Hier steht welche Mäuse entnommen wurden","info");

    });



});