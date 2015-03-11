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
            updateListMouse();

        });},

    updateMouseInfo : function (mouse){
        $('#mouseinfoWeight').innerHTML = mouse.weight;
        $('#mouseinfoGender').innerHTML = mouse.gender;
        $('#mouseinfoAge').innerHTML    = mouse.age;
        $('#mouseinfoProfileImg').src = mouse.gender == "m" ? "/data/img/Malemouse.png" : "/data/img/Femalemouse.png";
    },

    updateListMouse : function (){
        var allMice = $_SESSION['loadedListMouse']['mice'];
        var activeBool = false;
        $.each(allMice,function(){
            if(!activeBool) {
                activeBool = true;
                $.('#ListMouse').append("\<a href=\" #\" class=\"list-group-item active\">"+this.name+"(#"+ this.id +") \</a>")
            }else{
                $.('ListMouse').append("\<a href=\" #\" class=\"list-group-item\">"+this.name+"(#"+ this.id +") \</a>")
            }
        })

    }
};



$(document).ready(function () {
    BasicFunctions.onReady;

    $("#ListCage a").on("click", function(){
        $("#ListCage").find(".active").removeClass("active");
        $(this).addClass("active");
    });

});