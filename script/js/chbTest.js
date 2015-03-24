$(document).ready(function(){
        $("#ChristianButton").click(function(){
            //engine.changeCage("2","1","2");
            engine.newCage(40);
            engine.newMouse(2, 0, 'neue_Maus', 'AB', '50.5', 4, 4, 0, 'img_name');
        })

    $("#save").click(function(){
        engine.save();
    })
});


