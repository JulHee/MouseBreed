var BasicFunctions = {
    onReady :  function () {
        /*Aktionen wenn ein Tag weiter geklickt wird*/
        $(nextDay()).click(function(){
            nextDay($_SESSION['loadedBreed']);
        });

        /*Wechsel der ausgewähltn Maus*/
        $("#ListMouse a").on("click", function(){
            var activeMouse = $('#ListMouse').find(".active");
            activeMouse.removeClass("active");
            $(this).addClass("active");
            updateMouseInfo(activeMouse);

        });

    updateMouseInfo : function updateMouseInfo(mouse){
        $('#mouseinfoWeight').innerHTML = mouse.weight;
        $('#mouseinfoGender').innerHTML = mouse.gender;
        $('#mouseinfoAge').innerHTML    = mouse.age;
        $('#mouseinfoProfileImg').src = mouse.gender == "m" ? "/data/img/Malemouse.png" : "/data/img/Femalemouse.png";
    }

    }
};



$(document).ready(function () {
    BasicFunctions.onReady;

    $("#ListCage a").on("click", function(){
        $("#ListCage").find(".active").removeClass("active");
        $(this).addClass("active");
    });

});