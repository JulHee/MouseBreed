/*
 * genotyp mix with length of 2(ex: Ab,AA,...)
 * @param geno1 string with 2 Chars
 * @param geno2 string with 2 Chars 
 * @return one possible Genotypes, each one has 25%
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
    var randNum = Math.floor((Math.random() * 4) + 1);

	return genoarray[randNum]
}
