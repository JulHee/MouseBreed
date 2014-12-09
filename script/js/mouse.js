/*
 * Mouse with Parameters to define it
 */
function Mouse(sex,genotyp,age,weight){
	this.sex = sex;
	this.genotyp = genotyp;
	this.age = age;
	this.weight = weight;
}

/*
 * genotyp mix with length of 2(ex: Ab,AA,...)  
 * @param geno1 string with 2 Chars
 * @param geno2 string with 2 Chars 
 * @return Array with all possible Genotypes
 */
function Mix(geno1,geno2){
	var x = geno1;
	var y = geno2;
	
	var x1 = x.charAt(0);
	var x2 = x.charAt(1);
	var y1 = y.charAt(0);
	var y2 = y.charAt(1);

	var res1 = x1 + y1;
	var res2 = x1 + y2;
	var res3 = x2 + y1;
	var res4 = x2 + y2; 
	
	var genoarray = [res1,res2,res3,res4];
	return genoarray
}

/* TODO
 * - Genotyp -> Phänotyp (enum(?) to declare what a Genotyp does: "Ab" --> blue/yellow mouse)
 * - other Classes [Cage,breed,User,"Mission/Task"]
 */