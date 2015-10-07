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



function Mouse(id) {
    //55x30
    this.src = "/data/img/play/play_mouse_2.png";
    this.id = id;
    this.mouseani = null;
    this.mousecontainer = null;
    this.mouselabel = null;
    this.mouseGen = loadedBreed["cages"][selectedCage]["mice"][this.id]["gender"];
    this.mouseUgen = loadedBreed["cages"][selectedCage]["mice"][this.id]["user_gender"];
    this.mouseUgenImg = null;
    this.mousePreg = loadedBreed["cages"][selectedCage]["mice"][this.id]["pregnant"];
    this.mousePregImg = null;
};

// Initialisieren der Informationen
Mouse.prototype.init = function() {
    // Holen der Informationen zu der Maus aus dem LocalStorage
    var tmpInfoMouse = getInfo(this.id);
    // Konvertieren in ein createjs.Bitmap
    this.mouseani = new createjs.Bitmap(this.src);
    //gender?
    this.setUgen();
    //pregnancy
    this.setPreg();


    //setzen der Positionen innerhalb des Containers
    this.mouseani.x = 15+27;
    this.mouseani.y = 0+15;
    this.mouseani.regX = 27;
    this.mouseani.regY = 15;
    this.mouseUgenImg.x = 0;
    this.mouseUgenImg.y = 0;
    this.mousePregImg.x = 0;
    this.mousePregImg.y = 15;



    // Erstellen des Labels
    // Wenn der Benutzer die Maus bestimmt hat, wir der richtige Name angegeben,
    // wenn nicht Fragezeichen um nicht das Geschlecht am Namen zu erkennen

    if (!this.mouseUgen){
        this.mouselabel = new createjs.Text("????", "bold 14px Arial", "#fdfdfc");
    } else {
        this.mouselabel = new createjs.Text("" + tmpInfoMouse.name, "bold 14px Arial", "#fdfdfc");
    }

    this.mouselabel.textAlign = "center";
    // Positionieren des Labels
    this.mouselabel.y = 35;
    this.mouselabel.x = 35;

    // Erstellen des Containers der das Label und das Bild beinhaltet
    this.mousecontainer = new createjs.Container();
    this.mousecontainer.addChild(this.mouseani, this.mouselabel, this.mouseUgenImg, this.mousePregImg);
    this.mousecontainer.mouseid = this.id;
    //this.mousecontainer.direction = 90;
    this.mousecontainer.ismove = true;
    this.mousecontainer.isdrag = false;
    this.mousecontainer.vX = 1;
    this.mousecontainer.vY = 1;
    this.mousecontainer.x = 16 + Math.random() * 300;
    this.mousecontainer.y = 32 + Math.random() * 300;
    //frei gesetzt
    this.mousecontainer.sizex = 70;
    this.mousecontainer.sizey = 45;
    // Erstellen eines Ziels für die Maus
    this.mousecontainer.targetx = this.mousecontainer.sizex + (Math.random() * (mousezone - this.mousecontainer.sizex));
    this.mousecontainer.targety = this.mousecontainer.sizey + (Math.random() * (stage.canvas.height - this.mousecontainer.sizey));
    // Erstellen der Hitbox. Achtung laut Docs püft hitTest() nicht auf Hitboxen
    //var hit = new createjs.Shape();
    //hit.graphics.beginFill("#000").drawRect(0, 0, this.mousecontainer.width, this.mousecontainer.height);
    //this.mousecontainer.hitArea = hit;
    // Registrieren der Events
    this.mousecontainer.on("mouseover", function(elem) {
        clickedMouse(elem.currentTarget.mouseid);
        elem.currentTarget.ismove = false;
        elem.currentTarget.alpha = 0.5;
    });
    this.mousecontainer.on("mouseout", function(elem) {
        elem.currentTarget.ismove = true;
        elem.currentTarget.alpha = 1;
    });

    // Bei Maustastendruck (Drag-and-Drop). Später für Käfige
    this.mousecontainer.on("pressmove", function(evt) {
        evt.currentTarget.ismove = false;
        evt.currentTarget.isdrag = true;
        evt.currentTarget.x = evt.stageX - (this.sizex/2);
        evt.currentTarget.y = evt.stageY - (this.sizey/2);

    });
    // Beim loslasen der Maustaste
    this.mousecontainer.on("pressup", function(evt) {
        var cagehit = false;
        // Prüfen ob die Maus über einem der Käfige schwebt
        for (var i = 0; i < arrCage.length; i++) {
            if (selectedCage != arrCage[i].id) {
                var isCollision = ndgmr.checkRectCollision(evt.currentTarget, arrCage[i].cagecontainer);
                if (isCollision != null) {
                    cagehit = true;
                    var mouse_info = getInfo(evt.currentTarget.mouseid);
                    if (!mouse_info.user_gender){
                        addBen("???? wurde verschoben",mouse_info.name + " # " + mouse_info.id + " wurde in Käfig: #"+i+" verschoben","info");
                    } else {
                        addBen(mouse_info.name + " wurde verschoben",mouse_info.name + " # " + mouse_info.id + " wurde in Käfig: #"+i+" verschoben","info");
                    }
                    // Verschieben der Maus
                    engine.changeCage(mouse_info.id,selectedCage,arrCage[i].id);
                    draw();

                }
            }
        }
        if (cagehit == false && evt.currentTarget.x >= mousezone){
            evt.currentTarget.x = 16 + Math.random() * 300;
            evt.currentTarget.y = 32 + Math.random() * 300;
        }


        evt.currentTarget.isdrag = false;
        evt.currentTarget.ismove = true;


    });

    this.mousecontainer.refreshTarget = function(xmin, xmax, ymin, ymax) {
        this.targetx = getRandomInt(xmin, xmax);
        this.targety = getRandomInt(ymin, ymax);
    }
    this.mousecontainer.move = function() {
        /* Collisoncheck aufgrund der Kosten entfernt,
         * Mäuse laufen nun einfach wild durcheinander
         */
        // Prüfen auf Collision
        //  checkCollision();
        // Abstand zum Ziel
        var absx = Math.abs(this.x - this.targetx);
        var absy = Math.abs(this.y - this.targety);
        // Neue Koordinaten
        var zug_p_x = this.x + this.vX + this.sizex;
        var zug_p_y = this.y + this.vY + this.sizey;
        var zug_n_x = this.x - this.vX;
        var zug_n_y = this.y - this.vY;
        // TODO Besser Testen ob das Ziel getroffen wurde
        if (absx <= 10 || absy <= 10) {
            this.refreshTarget(0, mousezone, 0, stage.canvas.height);
        } else {
            // Bewegen der Maus in Richtung des Ziels
            if (this.x < this.targetx && this.y < this.targety) {
                // Prüfen ob keiner der Ränder mit dem Zug überschritten wird
                if (zug_p_x <= mousezone && zug_p_y <= stage.canvas.height) {
                    // move rechts also bild skalieren
                    this.getChildAt(0).scaleX = -1;

                    this.x += this.vX;
                    this.y += this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x > this.targetx && this.y < this.targety) {
                if (zug_n_x > 0 && zug_p_y <= stage.canvas.height) {
                    // move rechts also bild skalieren
                    this.getChildAt(0).scaleX = 1;

                    this.x -= this.vX;
                    this.y += this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x < this.targetx && this.y > this.targety) {
                if (zug_p_x <= mousezone && zug_n_y > 0) {
                    // move rechts also bild skalieren
                    this.getChildAt(0).scaleX = -1;

                    this.x += this.vX;
                    this.y -= this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x > this.targetx && this.y > this.targety) {
                if (zug_n_x > 0 && zug_n_x > 0) {
                    // move rechts also bild skalieren
                    this.getChildAt(0).scaleX = 1;

                    this.x -= this.vX;
                    this.y -= this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x == this.targetx && this.y < this.targety) {
                if (zug_p_y <= stage.canvas.height) {
                    this.y += this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x == this.targetx && this.y > this.targety) {
                if (zug_n_y > 0) {
                    this.y -= this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x < this.targetx && this.y == this.targety) {
                if (zug_p_x <= mousezone) {
                    // move rechts also bild skalieren
                    this.getChildAt(0).scaleX = -1;

                    this.x += this.vX;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x > this.targetx && this.y == this.targety) {
                if (zug_n_x > 0) {
                    // move rechts also bild skalieren
                    this.getChildAt(0).scaleX = 1;

                    this.x -= this.vX;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            }
        }
    }
};

//gendersettings
Mouse.prototype.setUgen = function () {
    if (!this.mouseUgen){
        this.mouseUgenImg = new createjs.Bitmap("data/img/play/noUgen.png");
    } else if (this.mouseUgen == 0) {
        this.mouseUgenImg = new createjs.Bitmap("data/img/play/male icon.png");
    } else if (this.mouseUgen == 1){
        this.mouseUgenImg = new createjs.Bitmap("data/img/play/female icon.png");
    } else {
        console.log("Your Usergender is stupid!");
    }
};
//Matingsettings
Mouse.prototype.setPreg = function () {
   if (this.mouseGen == 0 || !this.mouseUgen){
        this.mousePregImg = new createjs.Bitmap("data/img/play/PregFalse.png");
   } else {
        if (this.mousePreg == 1){
            this.mousePregImg = new createjs.Bitmap("data/img/play/PregTrue.png");
        } else {
            this.mousePregImg = new createjs.Bitmap("data/img/play/PregFalse.png");
        }
   }
};

function Cage(id) {
    this.id = id;
    this.src = "/data/img/play/cage_small_with_bg_rounded.png";
    this.cagecontainer = null;
    this.cagelabel1 = null;
    this.cagelabel2 = null;
    this.cageani = null;
    this.micenum = 0;
    this.maxmicenum = -1;
}
Cage.prototype.init = function(y) {

    this.maxmicenum = loadedBreed["cages"][this.id]["max_number_of_mice"];

    this.cageani = new createjs.Bitmap(this.src);
    if (this.id == loadedBreed['finished_cage']) {
        this.cagelabel1 = new createjs.Text("Ziel-Käfig", "Bold 15px Arial", "#201d1b");
    } else if (this.id == loadedBreed['trash_cage']) {
        this.cagelabel1 = new createjs.Text("Trash-Käfig", "Bold 15px Arial", "#201d1b");
    } else {
        this.cagelabel1 = new createjs.Text("Käfig Nr." + this.id, "Bold 15px Arial", "#201d1b");
    }
    this.cagelabel1.textAlign = "center";
    this.cagelabel1.y = 10;
    this.cagelabel1.x = 140;
    this.cagelabel2 = new createjs.Text("Belegung " + this.micenum +"/"+this.maxmicenum, "12px Arial", "#201d1b");
    this.cagelabel2.textAlign = "center";
    this.cagelabel2.y = 30;
    this.cagelabel2.x = 140;
    this.cagecontainer = new createjs.Container();
    this.cagecontainer.addChild(this.cageani, this.cagelabel1, this.cagelabel2);
    this.cagecontainer.x = 600;
    this.cagecontainer.y = (y * 72)+40;
    //console.log("ID: "+this.id + " y = "+this.cagecontainer.y);
    this.cagecontainer.cageid = this.id;
    this.cagecontainer.on("click", function(evt) {
        var cage_id = evt.currentTarget.cageid;
        if (selectedCage != cage_id){
            addBen("Käfig #" + cage_id, "Es wurde der Käfig gewechselt", "info");
            selectedCage = cage_id;
            draw();
        }
    });
};
Cage.prototype.cUpdate = function(){
    var mices = loadedBreed["cages"][this.id]["mice"];
    this.micenum =  Object.keys(mices).length;
    this.cagelabel2.text = "Belegung " + this.micenum +"/"+this.maxmicenum;
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getInfo(mouseid) {
    var data = loadedBreed;
    var thisCage = data.cages;
    var thisMice = thisCage[selectedCage].mice;
    return thisMice[mouseid];
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
        }

    });

    $('#deleteCage').click(function(){
        engine.deleteCage(selectedCage);
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

$( window ).on('beforeunload', saveChanges);