// Das Canvas
var stage;
// Array das alle Mause enthält
var arrMouse = [];
// Array das alle Käfige enthält
var arrCage = [];
// Der aktuelle Käfig
var selectedCage = -1;
//aktuelle maus
var selectedMouse;
//linke Breite des Canvas (Mausbereich)
var mousezone = 600;
//FPS Label
var fpsText;

/**
 * Draw the Background of the Game
 * Elements:
 *     - Background behind the Cage (cage_bg)
 *     - Background behind the Mousefield (mouse_bg)
 *     - 2x Arrows to move between Cages (arrowUP & arrowDown)
 *     - Textfield to see the FPS
 */

function drawBackground() {
    // Hinzufügen der Linie
    var line = new createjs.Shape();
    line.graphics.setStrokeStyle(2);
    line.graphics.beginStroke("#201d1b");
    line.graphics.moveTo(mousezone-1, 0);
    line.graphics.lineTo(mousezone-1, 500);
    line.graphics.endStroke();
    stage.addChild(line);
    // Zeichen des Käfighintergrundes
    var cage_bg = new createjs.Bitmap("/data/img/play/cage_bg.png");
    cage_bg.x = mousezone;
    cage_bg.y = 0;
    stage.addChild(cage_bg);

    var mouse_bg = new createjs.Bitmap("/data/img/play/background_mice_cage.png");
    mouse_bg.x = 0;
    mouse_bg.y = 0;
    stage.addChild(mouse_bg);

    // Zeichnen der Pfeile
    //
    // TODO Schönere Bilder
    var arrowUP = new createjs.Bitmap("/data/img/play/ArrowUP.png");
    arrowUP.x = 600;
    arrowUP.y = 0;

    arrowUP.on("click", function(evt) {
        for (var i = 0; i < arrCage.length; i++) {
            arrCage[i].cagecontainer.y += 72;
            if (arrCage[i].cagecontainer.y >= 40 && arrCage[i].cagecontainer.y <= 400 ){
                arrCage[i].cagecontainer.visible = true;
            } else {
                arrCage[i].cagecontainer.visible = false;
            }
        };
    });
    stage.addChild(arrowUP);

    var arrowDown = new createjs.Bitmap("/data/img/play/ArrowDown.png");
    arrowDown.x = 600;
    arrowDown.y = 485;

    arrowDown.on("click", function(evt) {
        for (var i = 0; i < arrCage.length; i++) {
            arrCage[i].cagecontainer.y -= 72;
            if (arrCage[i].cagecontainer.y >= 40 && arrCage[i].cagecontainer.y <= 400){
                arrCage[i].cagecontainer.visible = true;
            } else {
                arrCage[i].cagecontainer.visible = false;
            }
        };
    });
    stage.addChild(arrowDown);

    // current FPS
    fpsText = new createjs.Text("-- fps", "10px Arial", "#FFF");
    fpsText.x = 10;
    fpsText.y = 10;
    stage.addChild(fpsText);
}

/**
 * Each call of the draw()-Function draws a new complete Picture over the
 * last on in the Canvas
 */

function draw() {
    // Leeren der Arrays
    arrCage = [];
    arrMouse = [];
    stage.removeAllChildren();
    stage.removeAllEventListeners();
    stage.update();
    // Zeichnen des Hintergrundes
    drawBackground();
    // Laden der Käfiginformationen
    getCages();
    // Hinzufügen der Käfige
    for (i = 0; i < arrCage.length; i++) {
        arrCage[i].cUpdate();
        if (arrCage[i].cagecontainer.y >= 40 && arrCage[i].cagecontainer.y <= 400){
            arrCage[i].cagecontainer.visible = true;
        } else {
            arrCage[i].cagecontainer.visible = false;
        }
        stage.addChild(arrCage[i].cagecontainer);
    }

    // Laden der Käfiginformationen
    if (arrCage.length > 0){
        if (selectedCage == -1){
            selectedCage = arrCage[0].id;
        }
        updateMouseArray(selectedCage);
    } else {
        console.log("Fehler 010: Keine Käfige");
    }


    // Hinzufügen aller Mäuse im Array in das Canvas
    for (i = 0; i < arrMouse.length; i++) {
        stage.addChild(arrMouse[i].mousecontainer);
    }
}

/**
 * init()-Function to Initialise the Canvas
 */

function init() {
    // Laden des Canvas
    stage = new createjs.Stage("demoCanvas");
    stage.enableMouseOver();
    stage.mouseChildren = true;

    draw();
    selectedCage = arrCage[0].id;


    // Registrieren der Tick-Funktion als Zeitgeber
    createjs.Ticker.on("tick", tick);
    createjs.Ticker.timingMode = createjs.Ticker.RAF;
    createjs.Ticker.setFPS(60);
    stage.update();
    //  console.log(stage);
}

/**
 * Check if to Mice-Object collide.
 */

function checkCollision() {
    for (var i = 0; i < arrMouse.length; i++) {
        for (var k = i + 1; k < arrMouse.length; k++) {
            var elem1 = arrMouse[i].mousecontainer;
            var elem2 = arrMouse[k].mousecontainer;
            if (!(elem1.isdrag || elem2.isdrag)) {
                var isCollision = ndgmr.checkRectCollision(elem1, elem2);
                if (isCollision != null) {
                    // Eine Kollision ist aufgetretten
                    // Bestimmen werlches das obere Element ist
                    if (elem1.y > elem1.y) {
                        elem1.refreshTarget(0, mousezone, elem1.y, stage.canvas.height);
                        elem2.refreshTarget(0, mousezone, 0, elem2.y);
                    } else {
                        elem1.refreshTarget(0, mousezone, 0, elem1.y);
                        elem2.refreshTarget(0, mousezone, elem2.y, stage.canvas.height);
                    }
                }
            }
        }
    }
}

/**
 * Each tick() moves the mice
 */

function tick(event) {
    // TODO Dev Mode entfernen
    if (createjs.Ticker.paused){

    } else {
        for (var i = 0; i < arrMouse.length; i++) {
            // Aktuelles Element
            var elem = arrMouse[i].mousecontainer;
            if (!elem.isdrag && elem.ismove) {
                elem.move();
            }
        }
        //FPS Label Update
        fpsText.text = Math.round(createjs.Ticker.getMeasuredFPS()) + " FPS";
        // Aktualisieren des Canvas
        stage.update(event);
    }
};

$(document).ready(function() {
    // Aufrufen der Startfunktion
    init();
    $("#sidebarNextDay").click(function(){
        // Aufruf der Nextday Funktion aus eingine.js - clock
        clock.nextDay();

        // Als letztes wird die Anzeige aktualliesiert
        refereshNumberOfDays();

    })

    $("#sidebarNewCage").click(function(){
        engine.newCage(6);
        draw();
    });
    $("#mouseGenderSet").click(function(){
        var mouse = getInfo(selectedMouse.id);
        var gender = mouse.gender;
        var grnd = "/data/img/bildkarten/";
        var img = null;
        var rnd = getRandomInt(1,3);
        if (gender == 0){
            img = "m_"+rnd;
        } else {
            img = "w_"+rnd;
        }

        $('#mouseinfoGenderPic').attr('src',grnd+img+'.png');
    });

    $('#mouseMoveToTrash').click(function(){
        if(selectedMouse.user_gender == null){
            addBen("Halt","Die Maus kann nicht aussortiert werden, es ist noch nicht bekannt welches Geschlecht sie hat","warn");
        }else{
            engine.move2Trash(selectedMouse.id,selectedCage);
            draw();
        }

    });


    //TODO USERGENDER SETZEN
    $("#malesetbtn").click(function () {
        var tGen = loadedBreed["cages"][selectedCage]["mice"][selectedMouse.id]["gender"];
        if(tGen == 0){
            loadedBreed["cages"][selectedCage]["mice"][selectedMouse.id]["user_gender"] = "0";
            $("#chooseGender").modal("hide");

            // Nicht getestet
            clickedMouse(selectedMouse.id);

            draw();
            addBen("Geschlecht richtig bestimmt","Das Geschlecht der Maus wurde richtig bestimmt","success")
        } else {
            addBen("Geschlecht falsch bestimmt","Das Geschlecht der Maus wurde falsch bestimmt","error")
        }
    });
    $("#femalesetbtn").click(function () {
        var tGen = loadedBreed["cages"][selectedCage]["mice"][selectedMouse.id]["gender"];
        if(tGen == 1){
            loadedBreed["cages"][selectedCage]["mice"][selectedMouse.id]["user_gender"] = "1";
            $("#chooseGender").modal("hide");

            // Nicht getestet
            clickedMouse(selectedMouse.id);

            draw();
            addBen("Geschlecht richtig bestimmt","Das Geschlecht der Maus wurde richtig bestimmt","success")
        } else {
            addBen("Geschlecht falsch bestimmt","Das Geschlecht der Maus wurde falsch bestimmt","error")
        }
    });
});



function saveChanges() {
    engine.save();
    localStorage.setItem("loadedBreed", JSON.stringify(loadedBreed));
}

window.addEventListener("beforeunload", saveChanges);
