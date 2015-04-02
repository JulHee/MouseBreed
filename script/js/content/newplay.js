// Das Canvas
var stage;
// Array das alle Mause enthält
var arrMouse = [];
// Array das alle Käfige enthält
var arrCage = [];
// Der aktuelle Käfig
var selectedCage = 1;
//linke Breite des Canvas (Mausbereich)
var mousezone = 600;

function Mouse(id) {
    this.src = "/data/img/play/play_mouse_2.png";
    this.id = id;
    this.mouseani = null;
    this.mousecontainer = null;
    this.mouselabel = null;
}
// Initialisieren der Informatioenen
Mouse.prototype.init = function() {
    // Holen der Informationen zu der Maus aus dem LocalStorage
    var tmpInfoMouse = getInfo(this.id);
    // Konvertieren in ein createjs.Bitmap
    this.mouseani = new createjs.Bitmap(this.src);
    // Erstellen des Labels
    this.mouselabel = new createjs.Text("#" + tmpInfoMouse.id + ":" + tmpInfoMouse.name, "bold 14px Arial", "#314ddf");
    this.mouselabel.textAlign = "center";
    // Positionieren des Labels
    this.mouselabel.y = 35;
    this.mouselabel.x = 20;
    // Erstellen des Containers der das Label und das Bild beinhaltet
    this.mousecontainer = new createjs.Container();
    this.mousecontainer.addChild(this.mouseani, this.mouselabel);
    this.mousecontainer.mouseid = this.id;
    this.mousecontainer.direction = 90;
    this.mousecontainer.ismove = true;
    this.mousecontainer.isdrag = false;
    this.mousecontainer.vX = 2;
    this.mousecontainer.vY = 2;
    this.mousecontainer.x = 16 + Math.random() * 300;
    this.mousecontainer.y = 32 + Math.random() * 300;
    this.mousecontainer.sizex = this.mousecontainer.getBounds().width;
    this.mousecontainer.sizey = this.mousecontainer.getBounds().height;
    // Erstellen eines Ziels für die Maus
    this.mousecontainer.targetx = this.mousecontainer.sizex + (Math.random() * (mousezone - this.mousecontainer.sizex));
    this.mousecontainer.targety = this.mousecontainer.sizey + (Math.random() * (stage.canvas.height - this.mousecontainer.sizey));
    // Erstellen der Hitbox. Achtung laut Docs püft hitTest() nicht auf Hitboxen
    //var hit = new createjs.Shape();
    //hit.graphics.beginFill("#000").drawRect(0, 0, this.mousecontainer.width, this.mousecontainer.height);
    //this.mousecontainer.hitArea = hit;
    // Registrieren der Events
    // Beim klicken laden der Informationen
    this.mousecontainer.on("click", function(evt) {
        clickedMouse(evt.currentTarget.mouseid);
    });
    this.mousecontainer.on("mouseover", function(elem) {
        elem.currentTarget.ismove = false;
        elem.currentTarget.alpha = 0.5;
        stage.update();
    });
    this.mousecontainer.on("mouseout", function(elem) {
        elem.currentTarget.ismove = true;
        elem.currentTarget.alpha = 1;
    });
    /*
    // Bei Maustastendruck (Drag-and-Drop). Später für Käfige
    this.mousecontainer.on("mousedown", function(evt) {
        console.log(evt.currentTarget);
        evt.currentTarget.ismove = false;
        evt.currentTarget.isdrag = true;
        evt.currentTarget.x = evt.stageX;
        evt.currentTarget.y = evt.stageY;
        // make sure to redraw the stage to show the change:
        stage.update();
    });
    // Beim loslasen der Maustaste
    this.mousecontainer.on("mouseup", function(evt) {
        // Prüfen ob die Maus über einem der Käfige schwebt
        for (var i = 0; i < arrCage.length; i++) {
            var isCollision = ndgmr.checkRectCollision(evt.currentTarget, arrCage[i].cagecontainer);
            if (isCollision != null) {
                console.log(i);
            }
        }
        evt.currentTarget.isdrag = false;
        evt.currentTarget.ismove = true;
    });
*/
    this.mousecontainer.refreshTarget = function(xmin, xmax, ymin, ymax) {
        this.targetx = getRandomInt(xmin, xmax);
        this.targety = getRandomInt(ymin, ymax);
    }
    this.mousecontainer.move = function() {
        // Prüfen auf Collision
        checkCollision();
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
                    this.x += this.vX;
                    this.y += this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x > this.targetx && this.y < this.targety) {
                if (zug_n_x > 0 && zug_p_y <= stage.canvas.height) {
                    this.x -= this.vX;
                    this.y += this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x < this.targetx && this.y > this.targety) {
                if (zug_p_x <= mousezone && zug_n_y > 0) {
                    this.x += this.vX;
                    this.y -= this.vY;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x > this.targetx && this.y > this.targety) {
                if (zug_n_x > 0 && zug_n_x > 0) {
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
                    this.x += this.vX;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            } else if (this.x > this.targetx && this.y == this.targety) {
                if (zug_n_x > 0) {
                    this.x -= this.vX;
                } else {
                    this.refreshTarget(0, mousezone, 0, stage.canvas.height);
                }
            }
        }
    }
};

function Cage(id) {
    this.id = id;
    this.src = "/data/img/play/cage_small_with_bg_rounded.png";
    this.cagecontainer = null;
    this.cagelabel = null;
    this.cageani = null;
}
Cage.prototype.init = function(y) {
    this.cageani = new createjs.Bitmap(this.src);
    this.cagelabel = new createjs.Text("Käfig Nr." + this.id, "20px Arial", "#201d1b");
    this.cagelabel.textAlign = "center";
    this.cagelabel.y = 20;
    this.cagelabel.x = 115;
    this.cagecontainer = new createjs.Container();
    this.cagecontainer.addChild(this.cageani, this.cagelabel);
    this.cagecontainer.x = 600;
    this.cagecontainer.y = y * 62;
    this.cagecontainer.cageid = this.id;
    this.cagecontainer.on("click", function(evt) {
        console.log(evt);
        addBen("Käfig #" + evt.currentTarget.cageid, "Es wurde der Käfig gewechselt", "info");
    });
};

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getInfo(mouseid) {
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
    var thisMice = thisCage[selectedCage].mice;
    return thisMice[mouseid];
}

function clickedMouse(id) {
    var info = getInfo(id);
    $("#mouseinfoName").text(info.name);
    $("#mouseinfoAge").text(info.age);
    if (info.gender == 1) {
        $('#mouseinfoGender').text("Männlich");
    } else {
        $('#mouseinfoGender').text("Weiblich");
    }
    $("#mouseinfoWeight").text(info.weight);
}

function getCages() {
    // Auslesen der Elemente aus dem localStorage
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
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
    // Auslesen der Elemente aus dem localStorage
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
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
    line.graphics.setStrokeStyle(1);
    line.graphics.beginStroke("#201d1b");
    line.graphics.moveTo(mousezone, 0);
    line.graphics.lineTo(mousezone, 500);
    line.graphics.endStroke();
    stage.addChild(line);
    // Zeichen des Käfighintergrundes
    var cage_bg = new createjs.Bitmap("/data/img/play/cage_bg.png");
    cage_bg.x = mousezone;
    cage_bg.y = 0;
    stage.addChild(cage_bg);
}

function init() {
    // Laden des Canvas
    stage = new createjs.Stage("demoCanvas");
    stage.enableMouseOver();
    stage.mouseChildren = true;
    // Zeichnen des Hintergrundes
    drawBackground();
    // Laden der Käfiginformationen
    getCages();
    // Hinzufügen der Käfige
    for (i = 0; i < arrCage.length; i++) {
        stage.addChild(arrCage[i].cagecontainer);
    }
    // Laden der Käfiginformationen
    updateMouseArray(1);
    // Hinzufügen aller Mäuse im Array in das Canvas
    for (i = 0; i < arrMouse.length; i++) {
        stage.addChild(arrMouse[i].mousecontainer);
    }
    // Registrieren der Tick-Funktion als Zeitgeber
    createjs.Ticker.on("tick", tick);
    createjs.Ticker.timingMode = createjs.Ticker.RAF_SYNCHED;
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
    for (var i = 0; i < arrMouse.length; i++) {
        // Aktuelles Element
        var elem = arrMouse[i].mousecontainer;
        if (!elem.isdrag && elem.ismove) {
            elem.move();
        }
    }
    // Aktualisieren des Canvas
    stage.update(event);
};
$(document).ready(function() {
    // Aufrufen der Startfunktion
    init();
});