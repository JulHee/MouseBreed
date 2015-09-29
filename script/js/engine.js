var loadedBreed = JSON.parse(localStorage.getItem("loadedBreed"));
var target;

var engine = {
    //                           benötigt ???

    updateLoadedBreed: function () {
        var data = localStorage.getItem("loadedBreed");
        loadedBreed = JSON.parse(data);
    },

    /*compute with php
     *@return all pairings with an age 21
     **/
    getBroods: function () {
        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/getBroods.php",
            async: false
        }).responseText;
        response = JSON.parse(response);

        if (response.success == true) {

            // erfolgreich erstellt

            return response.broods;
        } else {

            // nicht erstellt
            // Rückgabe?
        }

    },


    //                           functions to create mice


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

    /* create new pairing
     * @param mother_id
     * @param father_id
     * @retrun the id of the new pairing*/
    newMating: function (mother_id, father_id) {
        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/newMating.php",
            data: {mother_id: mother_id, father_id: father_id},
            async: false
        }).responseText;
        response = JSON.parse(response);

        if (response.success == true) {

            return response.id;

        } else {

            // not created
        }

    },

    /*
     * @param cage_id
     * @param gender
     * @param genotyp
     * @param weight
     * @param mating_id
     * @param mother_id
     * @param father_id
     * @param age
     * @param img_name
     * */
    newMouse: function (cage_id, gender, genotyp, weight, mating_id, mother_id, father_id, age, img_name) {

        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/newMouse.php",
            data: {
                cage_id: cage_id, gender: gender, genotyp: genotyp, weight: weight, mating_id: mating_id,
                mother_id: mother_id, father_id: father_id, age: age, img_name: img_name
            },
            async: false
        }).responseText;
        response = JSON.parse(response);

        if (response.success == true) {
            loadedBreed['cages'][cage_id]['mice'][response.id] = {                                        // successful created
                id: response.id, cage_id: cage_id, gender: gender, name: response.name,
                genotyp: genotyp, weight: weight, mother_id: mother_id, father_id: father_id, age: age,
                img_name: img_name
            };
        } else {
            addBen("Käfig nicht erstellt", "Die Maus wurde nicht erstellt, Fehler beim Datenbankzugriff", "Warn");  // not created
        }
    },

    /*get the ready pairings out of the database and create a new cage with the mother and her children*/
    birth: function () {
        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/birth.php",
            async: false
        }).responseText;
        response = JSON.parse(response);
        if (response.success == true) {
            var initial_img_name = "data\img\defaultMausChB.png";
            for (i in response["ready_matings"]) {
                var curr_mating = i;
                var father_id = response["ready_matings"][i]["father_id"]
                var mother_id = response["ready_matings"][i]["mother_id"]
                engine.newCage(6);
                var tmp_cage_id = engine.find_newest_cage();
                var genotypArray = engine.mixGenotyp(engine.find_mouse(mother_id), engine.find_mouse(father_id))
                for (k = 0; k <= 5; k++) {
                    var tmp_gender = (Math.random() < 0.5) ? 0 : 1;                           //each new Mouse gets its (random) Gender
                    var initial_weight = 1 + Math.round(Math.random() * 7.5 * 100) / 100;     //each new Mouse gets its (random) Weight
                    engine.newMouse(tmp_cage_id, tmp_gender, genotypArray[k % 4], initial_weight, response["ready_matings"][curr_mating]["id"], mother_id, father_id, 0, initial_img_name)
                }
                engine.changeCage(mother_id, engine.find_cage(mother_id), tmp_cage_id); // move the mother into the new cage
                addBen("Der Wurf ist da", "Der Wurf von der Mutter " + mother_id + " ist nun auf der Welt und in Käfig " + tmp_cage_id + " machen die Kleinen ihre ersten Schritte", "info");
                draw();
            }
            return response;

        } else {

            // request not successful and new mice are not created
        }

    },


    //                                       functions working with mice


    /*increase the age of the breed and of all pairings < 22  , computed with php
     **/
    incrementAge: function () {
        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/nextDay.php",
            async: false
        }).responseText;
        response = JSON.parse(response);

        if (response.success == true) {

            // successful

        } else {

            // not successful
        }

    },

    /*
     * @param mouse_id
     * @return the mouse with the given ID, if no mouse was found -1*/
    find_mouse: function (mouse_id) {
        var erg;
        for (i in loadedBreed["cages"]) {
            for (j in loadedBreed["cages"][i]["mice"]) {
                if (loadedBreed["cages"][i]["mice"][j]["id"] == mouse_id) {
                    return loadedBreed["cages"][i]["mice"][j]
                }
            }
        }
        return -1;

    },

    /*@param index the index of the cage
     *@return the ID of the male mouse from cage with the ID == index */
    find_Male: function (index) {
        for (m in loadedBreed["cages"][index]["mice"]) {
            if (parseInt(loadedBreed["cages"][index]["mice"][m]["gender"]) == 0 && parseInt(loadedBreed["cages"][index]["mice"][m]["age"]) > 69) {
                return loadedBreed["cages"][index]["mice"][m]["id"];
            }
        }
        return -1;
    },


    //                                       functions working with cages


    changeCage: function (mouse_ID, old_cage_ID, new_cage_ID) {
        var choosenMouse = loadedBreed.cages[old_cage_ID].mice[mouse_ID];  /*get choosen mouse*/
        choosenMouse["cage_id"] = new_cage_ID;                             /*set new cage ID*/
        loadedBreed["cages"][new_cage_ID]["mice"][mouse_ID] = choosenMouse;/*add choosenMouse to new cage*/
        delete loadedBreed["cages"][old_cage_ID]["mice"][mouse_ID];        /*delete choosenMouse from old cage*/
    },

    /*Delete mouse, move to trash_cage, for the mice aspecially the male mouse wich does not fit the target and are not useful anymore
     * @param mouse_id
     * @param cage_id*/
    move2Trash: function (mouse_id,cage_id) {
        engine.changeCage(mouse_id,cage_id,loadedBreed["trash_cage"])
    },

    newCage: function (maxNumberMice) {
        var response = $.ajax({                                // request to database
            type: "POST",
            url: "/script/php/ajax/newCage.php",
            data: {max_number_of_mice: maxNumberMice},
            async: false
        }).responseText;
        response = JSON.parse(response);

        if (response.success == true) {                      // create new cage in loadedBreed
            loadedBreed["cages"][response.id] = {
                id: response.id,
                breed_id: loadedBreed.id,
                id: response.id,
                max_number_of_mice: maxNumberMice,
                mice: {}
            };
            addBen("Käfig erstellt", "Der Käfig wurde erstellt", "Es ist ein neuer Käfig angelegt worden");
        } else {
             addBen("Käfig nicht erstellt", "Der Käfig wurde nicht erstellt, Fehler beim Datenbankzugriff", "Warn");
            }
    },

    /*
     * @param mouse_id
     * @return i the cage wich contains this mouse, if no cage was found -1*/
    find_cage: function (mouse_id) {
        var erg;
        for (i in loadedBreed["cages"]) {
            for (j in loadedBreed["cages"][i]["mice"]) {
                if (loadedBreed["cages"][i]["mice"][j]["id"] == mouse_id) {
                    return i
                }
            }
        }
        return -1;
    },

    /*@return the highest cage id*/
    find_newest_cage: function () {
        var maxNum = 0;
        for (i in loadedBreed["cages"]) {
            if (parseInt(loadedBreed["cages"][i]["id"]) > maxNum) {
                maxNum = loadedBreed["cages"][i]["id"]
            }
        }
        return maxNum;
    },


    //                                     SAVE AND CHECK CONDITIONS


    /*save the breed to database*/
    save: function () {
        var response = $.ajax({
            type: "POST",
            url: "/script/php/ajax/saveBreed.php",
            data: {breed: JSON.stringify(loadedBreed)},
            dataType: "json",
            async: false
        }).responseText;
        response = JSON.parse(response);
        if (response.success == true) {
            addBen("Gesichert","Deine Zucht wurde in der Datenbank gesichert","info")
        } else {
            addBen("Nict gesichert","Beim Speichern ist ein Fehler aufgetreten","warn")
        }
    },

    /* This function checks the conditions -> only one male adult in each cage  -> max. 6 adult mice in each cage
    *@return globalBool wich signals if every condition for changeing to next day is true
    * */
    ready2GoOn: function () {
        var menProblem;
        var flag;
        var tooMuchMice;
        var count;
        var globalBool = true;
        for (i in loadedBreed["cages"]) {
            menProblem = false;
            flag = false;
            tooMuchMice = false;
            count = 0;
            for (j in loadedBreed["cages"][i]["mice"]) {
                if (loadedBreed["cages"][i]["mice"][j]["age"] > 69) {
                    count = count + 1;
                    if (loadedBreed["cages"][i]["mice"][j]["gender"] == 0) {
                        if (flag) {                                                                //check men conflict
                            addBen("Männchen Konflikt", "Es gibt zum Zeitpunkt der Paarung " +
                                "mehrer Geschlechtsreife Männchen im Käfig " + i + " !!!", "warn");
                            menProblem = true;
                        } else {
                            flag = true
                        }
                    }
                }
                tooMuchMice = count > 6;                                                          // check number of mice
                globalBool = globalBool && ((menProblem  && tooMuchMice) == false) ;
            }
        }
        return globalBool ;
    },


    //                                   GAME OVER functions


    /*Target is an object that represents the properties of one target for one scenario
     * @param strictTime integer; If 0 there is no restriction, else x is the number of days
     * @param numberOfMice integer; the total number of mice needed
     * @param gender integer; 0 = male,1=female
     * @param genotyp string; 2 characters
     * @param age integer; the minimal age the mice should have, 6 days range so the maximal age is age + 6
     * */

    /*Creating an Array which contains every possible scenario
     * target = [scenario1,scenario2,...]*/
    setTarget: function () {
        target = [
            {strictTime: 0, numberOfMice: 20, gender: 1, genotyp: "BB", age: 42},
            {strictTime: 0, numberOfMice: 10,  gender: 1, genotype: "BB", age: 28}];
    },

    getTargetStrictTime : function(){return target[engine.convertScenario2Index(loadedBreed.scenario)].strictTime},

    getTargetNumberOfMice : function(){return target[engine.convertScenario2Index(loadedBreed.scenario)].numberOfMice},

    getTargetGender : function() {return parseInt(target[engine.convertScenario2Index(loadedBreed.scenario)].gender)},

    getTargetGenotyp : function() {return parseInt(target[engine.convertScenario2Index(loadedBreed.scenario)].genotyp)},

    getTargetAge : function(){return target[engine.convertScenario2Index(loadedBreed.scenario)].age},

    convertScenario2Index: function (s) {      // get the Index for the Target-Array out of the scenarioname
        switch (s) {
            case "easy_1" :
                return 0
                break;
            case "easy_2" :
                return 1
                break;
            default :
                return -1
        }

    },

    /*@return */
    checkStrictTime : function(){
        if(engine.getTargetStrictTime()==0){return true}
         else{
            if(engine.getTargetStrictTime()>= loadedBreed.age){return true}
             else{return false}
         }
    },

    /*@return bool value, weather the amount of mice is as recomended*/
    checkNumberOfReadyMice :function(){
        var cnt = 0;
        for(i in loadedBreed["cages"][parseInt(loadedBreed["finished_cage"])]){
            cnt = cnt + 1;
        };
        return (cnt == engine.getTargetNumberOfMice());
    },

    /*@return selectedGEnder the gender of the ready mice */
    getGenderOfReadyMice: function () {
        var flag = true;
        var selectedGender = loadedBreed["finished_cage"]["mice"][0]["gender"];
        for (i in loadedBreed["finished_cage"]["mice"]) {
            flag = loadedBreed["finished_cage"]["mice"][i]["gender"] == selectedGender;
        }
        if (flag) {
            return parseInt(selectedGender);
        } else {
            addBen("Verschiedene Geschlechter im Zielkäfig", "Es befinden sich Mäuse mit unterschiedlichen Geschlechtern im Zielkäfig", "warn");
        }
    },

    /*@return selectedGenotyp the genotype of the ready mice*/
    getGenotypeOfReadyMice: function () {
        var flag = true;
        var selectedGenotype = loadedBreed["finished_cage"]["mice"][0]["genotype"];
        for (i in loadedBreed["finished_cage"]["mice"]) {
            flag = loadedBreed["finished_cage"]["mice"][i]["genotyp"] == selectedGenotype;
        }
        if (flag) {
            return selectedGenotype;
        } else {
            addBen("Verschiedene Genotypen im Zielkäfig", "Es befinden sich Mäuse mit unterschiedlichen Genotypen im Zielkäfig", "warn");
        }
    },

    /*@return bool value wheather the ready mice have the right age or not*/
    checkAge: function () {
        for (i in loadedBreed["finished_cage"]["mice"]) {
            if (loadedBreed["finished_cage"]["mice"][i]["age"] >= engine.getTargetAge() &&
                loadedBreed["finished_cage"]["mice"][i]["age"] < engine.getTargetAge() + 6) {
                return false
            }
        }

    },

};

var clock = {
    /*each day change runs this function
    **/
    nextDay: function () {

        if (engine.ready2GoOn()) {
            clock.increaseAge();
            clock.gainWeight();
            clock.pairing();
            engine.birth();
            loadedBreed.age = parseInt(loadedBreed.age) + 1;
            refereshNumberOfDays();
            refreshProgressbar();
            if (selectedMouse) {                                // refresh the information of the choosen mouse
                clickedMouse(selectedMouse.id);
            }
            if (clock.checkTarget()) {
                alert("Ende")
            }
            ;
        }
        else {
            addBen("Tag wurde NICHT gewechselt", "warn")
        }
    },

    /*Mice get older*/
    increaseAge: function () {
        for (i in loadedBreed["cages"]) {
            for (j in loadedBreed["cages"][i]["mice"]) {
                loadedBreed["cages"][i]["mice"][j]["age"] = parseInt(loadedBreed["cages"][i]["mice"][j]["age"]) + 1;
            }
        }
        engine.incrementAge();                                     // increment the age of the unborn mice (via php)

    },

    /*Mice get weight*/
    gainWeight: function () {
        /*addWeight- Arrays zählen für die jeweiligen Mäuse ab 20 age*/
        var addWeightMale = [0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.84, 0.53, 0.53, 0.53, 0.53,
            0.53, 0.53, 0.52, 0.24, 0.24, 0.24, 0.24, 0.24, 0.24, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.24, 0.16,
            0.16, 0.16, 0.16, 0.16, 0.16, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.16, 0.09, 0.09, 0.09, 0.09, 0.09,
            0.09, 0.06, 0.16, 0.16, 0.16, 0.16, 0.16, 0.16, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.16, 0.10, 0.10, 0.10,
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
        for (i in loadedBreed["cages"]) {
            for (j in loadedBreed["cages"][i]["mice"]) {
                if (loadedBreed["cages"][i]["mice"][j]["age"] > 20) {
                    if (loadedBreed["cages"][i]["mice"][j]["gender"] == 0) {
                        loadedBreed["cages"][i]["mice"][j]["weight"] = parseInt(loadedBreed["cages"][i]["mice"][j]["weight"]) + addWeightFemale[loadedBreed["cages"][i]["mice"][j]["age"] - 20];
                    } else {
                        loadedBreed["cages"][i]["mice"][j]["weight"] = parseInt(loadedBreed["cages"][i]["mice"][j]["weight"]) + addWeightMale[loadedBreed["cages"][i]["mice"][j]["age"] - 20];
                    }
                }
            }
        }
    },

    /*One male and one female create one mating together*/
    pairing: function () {
        for (i in loadedBreed["cages"]) {
            theManId = engine.find_Male(i);
            if (theManId > 0) {
                for (m in loadedBreed["cages"][i]["mice"]) {
                    if (parseInt(loadedBreed["cages"][i]["mice"][m]["age"]) > 69) {
                        if (parseInt(loadedBreed["cages"][i]["mice"][m]["gender"]) == 1) {
                            if (parseInt(loadedBreed["cages"][i]["mice"][m]["pregnant"]) == 0) {
                                loadedBreed["cages"][i]["mice"][m]["pregnant"] = 1;
                                engine.newMating(loadedBreed["cages"][i]["mice"][m]["id"], theManId);
                                addBen("Neue Schwangerschaft", "Die Maus mit der ID " + loadedBreed["cages"][i]["mice"][m]["id"] + " ist jetzt Schwanger", "info");
                            }
                        }
                    }
                }
            }
        }
    },

    /*check all conditions wich are important for the end
    * @return rtn Booolean if true the game is over, if false at least one condition is false and the game goes on*/
    checkTarget: function () {
        var rtn = true;
        rtn = rtn && engine.checkStrictTime(); // check strictTime
        rtn = rtn && (engine.getTargetNumberOfMice() <= loadedBreed.cage[loadedBreed["finished_cage"]]["mice"].length); // check number of Mice
        rtn = rtn && (engine.getTargetGender == engine.getGenderOfReadyMice);                         // check gender
        rtn = rtn && (engine.getTargetGenotyp() == engine.getGenotypeOfReadyMice());                  // check genotyp
        rtn = rtn && engine.checkAge();                                                               // check age
        return rtn;
    },

};

/*
 --------------------------------------------------------------------------------------------------------------------
 engine|
 ------
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

 setOwnGender : function(mouse_ID,userGender){
 loadedBreed["currentCage"]["mice"][mouse_ID]["userGender"] = userGender;
 },

 ------------------------------------------------------------------------------------------------------
 clock|
 -----
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
