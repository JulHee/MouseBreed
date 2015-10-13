/**
 *  Filename : playSupport.js
 *
 *  This file contains all help functions for the play.php file.
 *
 */

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getInfo(mouseid) {
    var data = loadedBreed;
    var thisCage = data.cages;
    var thisMice = thisCage[selectedCage].mice;
    return thisMice[mouseid];
}

function getCages() {
    // Auslesen der Elemente aus dem localStorage
    var data = loadedBreed;
    var thisCage = data.cages;
    var counter = 0;
    for (var cages in thisCage) {
        var tmp = new Cage(thisCage[cages].id);
        tmp.init(counter);
        arrCage.push(tmp);
        counter += 1;
    }
}

function updateMouseArray(cageid) {
    selectedCage = cageid;
    arrMouse = [];
    // Auslesen der Elemente aus dem localStorage
    var data = loadedBreed;
    var thisCage = data.cages;
    var thisMice = thisCage[cageid].mice;
    for (var key in thisMice) {
        var tmp = new Mouse(thisMice[key].id);
        tmp.init();
        arrMouse.push(tmp);
    }
}

function clickedMouse(id) {
    var info = getInfo(id);
    // Speichern der ausgewählten Maus zur Geschlechterbestimmung
    selectedMouse = info;

    // Wenn der Benutzer die Maus bestimmt hat, wir der richtige Name angegeben,
    // wenn nicht Fragezeichen um nicht das Geschlecht am Namen zu erkennen

    if (!info.user_gender){
        $("#mouseinfoName").text("????");
        $('#mouseinfoGender').text("Unbestimmt");
    } else {
        $("#mouseinfoName").text(info.name);
        if (info.user_gender == 0) {
            $('#mouseinfoGender').text("Männlich");
        } else {
            $('#mouseinfoGender').text("Weiblich");
        }
    }
    $("#mouseinfoAge").text(info.age);
    $("#mouseinfoWeight").text(childWeight(info.age,Math.round(info.weight*100)/100));
}