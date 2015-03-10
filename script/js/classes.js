function User(id,user,password,firstname,lastname,email){
	this.id = id;
	this.user = user;
	this.password =password;
	this.firstname =firstname;
	this.lastname = lastname;
	this.email = email;
}

function Task(id,number_of_mouse,end_date){
this.id = id;
this.number_of_mouse = number_of_mouse;
this.end_date = end_date;
}

function Mouse(id,name,gender,genotyp,generation,age,weight,cage_id,breed_id,user_id){
	this.id = id;
    this.name = name;
    this.gender = gender;
    this.genotyp = genotyp;
    this.generation = generation;
    this.age = age;
    this.weight=weight;
    this.cage_id = cage_id;
    this.breed_id = breed_id;
    this.user_id = user_id;
    this.motherID = 0;
    this.fatherID = 0;

    function toString() {
        return "{" + this.gender + "," + this.genotyp + "," + this.age + "," + this.weight + "," + "}"
    }


    function checkPubescent(mouseArray){
        for ( var i = 0, l = mouseArray.length; i < l; i++ ) {
            if(mouseArray[i].age >69){
                return true;
            }else{
                return false;
            };
        };
    }

}

function Cage(id,maxMouseMass,breed_id){
	this.id=id;
	this.maxMouseMass = maxMouseMass;
	this.breed_id = breed_id;

    function reproduction(femaleMouse,maleMouse){
        new Mouse()
    }
}
function Breed(id,user_id,target,name){
	this.id = id;
	this.user = user_id;
	this.task = target;
	this.name = name;
    this.time_of_creation = Date.now();
    this.timeUnit = 0;
    this.mouseArray=[];
}