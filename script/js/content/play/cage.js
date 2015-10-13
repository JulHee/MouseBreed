/**
 *  Filename : cage.js
 *
 *  This file contains all informations about the Object {Cage}.
 *
 */

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