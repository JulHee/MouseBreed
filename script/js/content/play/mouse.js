/**
 *  Filename : mouse.js
 *
 *  This file contains all informations about the Object {Mouse}.
 *
 */

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