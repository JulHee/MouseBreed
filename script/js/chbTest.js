$(document).ready(function(){
        $("#ChristianButton").click(function(){
            var x = localStorage.getItem("loadedBreed");
            var parsedX = JSON.parse(x);
            $("#ChristianDiv").append(parsedX.cages[1].mice[0].name);
        })
});


