var loadedBreed= JSON.parse(localStorage.getItem("loadedBreed"));

var engine = {
    /*Target is an object that represents the properties of one target for one level
    * @param level integer ; Number of the level
    * @param strictTime integer; If 0 there is no restriction, else x is the number of days
    * @param numberOfMice integer; the total number of mice needed
    * @param gender integer; 0 = male,1=female
    * @param genotyp string; 2 characters
    * @param age integer; the minimal age
    * */
    Target: function (level,strictTime,numberOfMice,gender,genotyp,age){},


    updateLoadedBreed: function(){
    var data = localStorage.getItem("loadedBreed");
    loadedBreed = JSON.parse(data);
    },
    /*
     * genotyp mix with length of 2(ex: Ab,AA,...)
     * @param geno1 string with 2 Chars
     * @param geno2 string with 2 Chars
     * @return Array of Genotypes
     */
    mixGenotyp: function (mouseOne, mouseTwo) {
        var x = mouseOne["genotyp"];
        var y = mouseTwo["genotyp"];

        var x1 = x.charAt(0);
        var x2 = x.charAt(1);
        var y1 = y.charAt(0);
        var y2 = y.charAt(1);

        var res1 = x1 + y1;
        var res2 = x1 + y2;
        var res3 = x2 + y1;
        var res4 = x2 + y2;

        var genoarray = [res1, res2, res3, res4];
        /*var randNum = Math.floor((Math.random() * 4) + 1)-1;  */

        return genoarray
    },

    changeCage: function(mouse_ID,old_cage_ID,new_cage_ID){
        var choosenMouse = loadedBreed.cages[old_cage_ID].mice[mouse_ID];   /*gewünschte Maus heraussuchen*/
        choosenMouse["cage_id"] = new_cage_ID;                              /*die neue cage_ID wird gesetzt*/
        loadedBreed["cages"][new_cage_ID]["mice"][mouse_ID] = choosenMouse; /*choosenMouse wird in den neuen Käfig angefügt*/
        delete loadedBreed["cages"][old_cage_ID]["mice"][mouse_ID];         /*choosenMouse aus dem Alten Käfig-Objekt löschen*/
    },

    newCage: function(maxNumberMice){
        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/newCage.php",
            data: { max_number_of_mice: maxNumberMice },
            async: false
        }).responseText;
        response = JSON.parse(response);

        if(response.success == true) {
            loadedBreed["cages"][response.id] = { id: response.id, breed_id: loadedBreed.id, id: response.id, max_number_of_mice: maxNumberMice, mice: {}};

            // erfolgreich erstellt

            // Rückgabe?
        } else {

            // nicht erstellt
            addBen("Käfig nicht erstellt","Der Käfig wurde nicht erstellt, Fehler beim Datenbankzugriff","Warn");
            // Rückgabe?
        }

    },

    newMouse: function(cage_id, gender, genotyp, weight, mother_id, father_id, age, img_name){

        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/newMouse.php",
            data: { cage_id: cage_id, gender: gender, genotyp: genotyp, weight: weight, mother_id: mother_id,
                    father_id: father_id, age: age, img_name: img_name },
            async: false
        }).responseText;
        response = JSON.parse(response);

        if(response.success == true) {
            loadedBreed['cages'][cage_id]['mice'][response.id] = { id: response.id, cage_id: cage_id, gender: gender, name: response.name,
                genotyp: genotyp, weight: weight, mother_id: mother_id, father_id: father_id, age: age,
                img_name: img_name };

            // erfolgreich erstellt

            // Rückgabe?
        } else {

            // nicht erstellt
            addBen("Käfig nicht erstellt","Die Maus wurde nicht erstellt, Fehler beim Datenbankzugriff","Warn");
            // Rückgabe?
        }

    },


    setOwnGender : function(mouse_ID,userGender){
        loadedBreed["currentCage"]["mice"][mouse_ID]["userGender"] = userGender;
    },

    save: function() {

        $.ajax({
            type: "POST",
            url: "/script/php/ajax/saveBreed.php",
            data: { breed: JSON.stringify(loadedBreed) },
            dataType: "json"
        }).done(function (response) {
            if (response.success == true) {
                alert("Gespeichert");
            } else {
                alert("Fehler");
            }
        });
    }

};
/*Anlegen des Ziel-Arrays*/
var target=[new engine.Target(1,0,20,1,"--",42),new engine.Target(2,0,0,0,"",0)];

var clock = {

    nextDay: function () {
        /*loadedBreed[timeUnit] = loadedBreed[timeUnit]+1; */
        clock.gainWeight();
        clock.checkHomelessMouse();
        clock.pairing();
        alert("bp")



    },



    gainWeight: function () {
        /*addWeight- Arrays zählen für die jeweiligen Mäuse ab 20 age*/
        var addWeightMale = [0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.84, 0.53, 0.53, 0.53, 0.53,
            0.53, 0.53, 0.52, 0.24, 0.24, 0.24, 0.24, 0.24, 0.24, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.24, 0.16,
            0.16, 0.16, 0.16, 0.16, 0.16, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.16, 0.09, 0.09, 0.09, 0.09, 0.09,
            0.09, 0.06, 0.16, 0.16,0.16, 0.16,0.16, 0.16,0.14, 0.14,0.14, 0.14,0.14, 0.14,0.14, 0.16, 0.10, 0.10, 0.10,
            0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.09, 0.09, 0.09, 0.09, 0.09, 0.09, 0.06,
            0.06, 0.06, 0.06, 0.06, 0.06, 0.06, 0.04, 0.09, 0.09, 0.09, 0.09, 0.09, 0.09, 0.06, 0.06, 0.06, 0.06, 0.06,
            0.06, 0.06, 0.04, 0.04, 0.04, 0.04, 0.04, 0.04, 0.04, 0.06, 0.06, 0.06, 0.06, 0.06, 0.06, 0.06, 0.049];
        var addWeightFemale = [0.69, 0.69, 0.69, 0.69, 0.69, 0.69, 0.69, 0.66, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40,
            0.40, 0.09, 0.09, 0.09, 0.09, 0.09, 0.09, 0.06, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.10, 0.07, 0.07, 0.07,
            0.07, 0.07, 0.07, 0.08, 0.09, 0.09, 0.09, 0.09, 0.09, 0.09, 0.06, 0.07, 0.07, 0.07, 0.07, 0.07, 0.07, 0.08,
            0.06, 0.06, 0.06, 0.06, 0.06, 0.06, 0.04, 0.07, 0.07, 0.07, 0.07, 0.07, 0.07, 0.08, 0.14, 0.14, 0.14, 0.14,
            0.14, 0.14, 0.16, 0.04, 0.04, 0.04, 0.04, 0.04, 0.04, 0.06, 0.04, 0.04, 0.04, 0.04, 0.04, 0.04, 0.06, 0.04,
            0.04, 0.04, 0.04, 0.04, 0.04, 0.06, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.06, 0.06, 0.06, 0.06, 0.06,
            0.06, 0.04, 0.07, 0.07, 0.07, 0.07, 0.07, 0.07, 0.08, 0.01, 0.01, 0.01, 0.01, 0.01, 0.01, 0.04];
        for ( i in loadedBreed["cages"]) {
            for( j in i["mice"]){
                alert("Breakpoint w"+j);
                if(j["age"]>20)
                {
                    if (j["gender"] == 0) {
                        j["weight"] += addWeightFemale[j["age"]-20];
                    } else {
                        j["weight"] += addWeightMale[j["age"]-20];
                    }
                }
            }
        }
    },

    checkHomelessMouse: function(){
        var level = 1;
        for(i in loadedBreed["cages"]){
            for(j in i["mice"]) {
                if (j["cage_id"] == -1) {
                    if (level == 1) {
                        addBen("Nicht zugeordnete Mäuse", "Es gibt Mäuse die noch keinem Käfig zugeordnet sind !!!", "warn")
                    } else {
                        addBen("†", "Die freilauende Maus wurde von der Katze gefressen", "error")
                    }
                }
            }

        }

    },

    pairing: function () {
        var initialWeight = 1;
        var initialImgName = "data\img\defaultMausChB.png";
        for(i in loadedBreed["cages"]){
            var menList = [];
            var womenList = [];
            for(m in loadedBreed["cages"][i]["mice"]){
                if(loadedBreed["cages"][i]["mice"][m]["age"]>69){
                    if(loadedBreed["cages"][i]["mice"][m]["gender"]==0){
                        menList.push(loadedBreed["cages"][i]["mice"][m])
                    }else{
                        womenList.push(loadedBreed["cages"][i]["mice"][m])
                    }
                }
            }

            if(menList.length > 1){
                addBen("Männchen Konflikt","Es gibt zum Zeitpunkt der Paarung mehrer Geschlechtsreife Männchen im Käfig "+i+" !!!","Error")
            }else{
                for(j in womenList ){
                    var tmpGender = (Math.random()<0.5) ? 0 : 1;
                    var genotypArray = engine.mixGenotyp(womenList[j],menList[0])
                    for(k=0;k<=5;k++){
                        engine.newMouse(i,tmpGender,genotypArray[k%4],initialWeight,womenList[j]["id"],menList[0]["id"],0,initialImgName)
                    }

                }
            }

        }


    },

    checkTarget : function (){
        var tmp;
        tmp = target[loadedBreed["currentLvl"] - 1];

    },

    checkGenderProblem : function(){
        var problem = false;
        for(i in loadedBreed["cages"]){
            var menList = [];
            for(j in loadedBreed["cages"][i]["mice"]){
                if(loadedBreed["cages"][i]["mice"][j]["gender"]==0 && loadedBreed["cages"][i]["mice"][j]["age"]>69){
                    menList.push(loadedBreed["cages"][i]["mice"][m])
                }
            }
            if(menList.length > 1){
                problem = true;
                addBen("Männchen Konflikt","Es gibt zum Zeitpunkt der Paarung mehrer Geschlechtsreife Männchen im Käfig "+i+" !!!","Error");
            };
        }
        return problem;
    }


    /*
    engine

     ,

     feed: function(){
     for(i in loadedBreed["cages"]){
     i["plate"] += 10;
     }
     },

     giveWaterToDrink: function(){
     for(i in loadedBreed["cages"]){
     i["bottle"] += 10;
     }
     },

     handInMouse: function(thisMouse){

    engine.deleteFromBreed(thisMouse);
},

burry: function(cageID,mouseID){


}

    ------------------------------------------------------------------------------------------------------
    clock
    eat: function(){
        for(i in loadedBreed["cages"]){
            for(j in i["mice"]){
                i["plate"] -= j["age"]*0.1 //Annahme Mäuse fressen 1/10 ihres Alters in Gramm
            }
        }
    },

    drink: function(){
        for(i in loadedBreed["cages"]){
            for(j in i["mice"]){
                i["bottle"] -= j["age"]*0.1 //Annahme Mäuse trinken 1/10 ihres Alters in ml
            }
        }
    }
    */

    /*checkPubescent: function () {
        for (i in loadedBreed["cages"]) {
            for(j in loadedBreed["cages"][i]["mice"]){
                if(j["age"] > 69){
                    j.pubescent = true;
                }else{
                    j.pubescent = false;
                }

            }


        }
    }

     checkDeadMouse: function () {
     for(i in loadedBreed["cages"]){
     for(j in loadedBreed["cages"][i]["mice"]){
     //if(!loadedBreed["cages"][i]["mice"][j]["alive"]){engine.burry(i,j)}
     }
     }
     },

    */
    /*increaseNumberOfDay: function(){
     var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
     var firstDate = new Date();
     var arrayDate = loadedBreed["time_of_creation"].split("-");
     var secondDate = new Date(arrayDate[0],arrayDate[1],arrayDate[2]);
     var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
     numberOfDays = diffDays;
     },*/
};