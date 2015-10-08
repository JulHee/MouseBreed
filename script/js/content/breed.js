var BasicFunctions = {
    onReady: function() {
        $("#save").click(function() {
            engine.save();
        });
        //Wechsel der ausgewähltn Maus
        $("#ListMouse a").on("click", function() {
            var activeMouse = $('#ListMouse').find(".active");
            activeMouse.removeClass("active");
            $(this).addClass("active");
            updateMouseInfo(activeMouse);
            updateListMouse();
        });
    },
    updateMouseInfo: function(mouse) {
            $('#mouseinfoWeight').innerHTML = mouse.weight;
            $('#mouseinfoGender').innerHTML = mouse.gender;
            $('#mouseinfoAge').innerHTML = mouse.age;
            $('#mouseinfoProfileImg').src = mouse.gender == "m" ? "/data/img/Malemouse.png" : "/data/img/Femalemouse.png";
        }
        /* SyntaxError
        updateListMouse : function (){
            var allMice = $_SESSION['loadedListMouse']['mice'];
            var activeBool = false;
            $.each(allMice,function(){
                if(!activeBool) {
                    activeBool = true;
                    $.('#ListMouse').append("\<a href=\" #\" class=\"list-group-item active\">"+this.name+"(#"+ this.id +") \</a>");
                }else{
                    $.('ListMouse').append("\<a href=\" #\" class=\"list-group-item\">"+this.name+"(#"+ this.id +") \</a>");
                }
            });

        }*/
};
var LoadInformations = {
    onReady: function() {
        //Setzen des Titels
        $("#BreedTitle").html(loadedBreed.name);
        // Setzten der Käfige
        var cages = loadedBreed.cages;
        for (var i in cages) {
            var elem = cages[i];
            $("#dropdownCages").append('<li><a onclick=LoadInformations.specificCageInfo($(this)) data-cage-id=' + elem.id + '>Käfig ' + i + '</a></li>');
        }
    },
    specificCageInfo: function(cage_a) {
        var cage = loadedBreed.cages[cage_a[0].getAttribute("data-cage-id")];
        $("#selectedCageID").html(cage.id);
        var MaxNumberofMice = 0;
        if (cage.max_number_of_mice) {
            MaxNumberofMice = cage.max_number_of_mice;
        }
        $("#maxNumberofMice").html(MaxNumberofMice);
        var NumberofMice = 0;
        var i;

        for (i in cage.mice) {
            if (cage.mice.hasOwnProperty(i)) {
                NumberofMice++;
            }
        }
        $("#numberofMice").html(NumberofMice);
        LoadInformations.printMouses(cage.id);
    },
    printMouses: function(cage_id) {
        // Leeren der Tabelle
        $("#tableMouse tbody").remove();
        var mouses = loadedBreed.cages[cage_id].mice;
        if (mouses) {
            for (var i in mouses) {
                var mouse = mouses[i];
                $("#tableMouse").append('<tr><td>' + mouse.name + '</td><td>' + number2Gender(mouse.gender)  + '</td><td>' + mouse.genotyp + '</td><td>'+ engine.getGeneration(mouse.id,null) +'</td><td>' + mouse.age + '</td><td>' + Math.round(mouse.weight*100)/100  + '</td></tr>');
            }
        }
    }
};

function getSelectedCage(){return }
$(document).ready(function() {
    BasicFunctions.onReady;
    LoadInformations.onReady();
    console.log(loadedBreed);

});