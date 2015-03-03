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

function Mouse(id,cage_id,breed_id,user_id){
	this.id = id;
	this.cage_id = cage_id;
	this.breed_id = breed_id;
	this.user_id = user_id;
}

function Cage(id,max_number_of_mouses,breed_id){
	this.id=id;
	this.max_number_od_mouses = max_number_od_mouses;
	this.breed_id = breed_id;
}
function Breed(id,user_id,task,name){
	this.id = id;
	this.user = user_id;
	this.task = task;
	this.name = name;
    this.time_of_creation = Date.now();
    this.timeUnit = 0;
}