var BasicFunctions = {
    onReady :  function () {
        $(nextDay()).click(function(){
            nextDay(SESSION_breed);
        });

    }
};

$(document).ready(function () {
    BasicFunctions.onReady;

    $("#ListMouse a").on("click", function(){
        $("#ListMouse").find(".active").removeClass("active");
        $(this).addClass("active");
    });

});