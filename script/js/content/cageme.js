$(document).ready(function () {
    var activeone = null;
    var name = null;

    $("#CListMouse a").on("click", function(){
        $(".ListMouse").find(".active").removeClass("active");
        $(this).addClass("active");
        activeone = $(this).attr('id');
        name = $(this).attr('name');
        var obj = document.getElementById("mouseinfoName");
        obj.innerHTML  = ""+ name;
    });

    $("#mousetocage").on("click", function(){
       addBen("Maus verschoben","Hier soll stehen welche Maus in welchen Käfig geschoben wurde","info");
    });

    $("#cagetomouse").on("click", function(){
        addBen("Maus entnommen","Die Maus "+ name +" mit der ID #"+ activeone.substring(1) +" wurde entnommen","info");

    });



});