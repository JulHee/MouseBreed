var BasicFunctions = {
    onReady :  function () {
        $(nextDay()).click(function(){
            nextDay(SESSION_breed);
        });

    }
};

function updateMouseInfo(mouse){
    $('#mouseinfoWeight').innerHTML = mouse.weight;
    $('#mouseinfoGender').innerHTML = mouse.gender;
    $('#mouseinfoAge').innerHTML    = mouse.age;
}
$(document).ready(function () {
    BasicFunctions.onReady;

    $("#ListMouse a").on("click", function(){
        $("#ListMouse").find(".active").removeClass("active");
        $(this).addClass("active");
    });

});