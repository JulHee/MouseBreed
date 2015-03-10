var clock = {

    nextDay: function (breed) {
        breed.timeUnit++;
        gainWeight(breed.mouseArray)
    },

    gainWeight: function (mouseArray) {
        /*siehe gewichtsentwicklung.xlsx*/
        var addedWeight = 1;
        for (var i = 0, l = mouseArray.length; i < l; i++) {
            mouseArray[i].weight += addedWeight;
        }
    },

    checkPubescent: function (mouseArray) {
        for (var i = 0, l = mouseArray.length; i < l; i++) {
            if (mouseArray[i].age > 69) {
                mouseArray[i].pubescent = true;
            } else {
                mouseArray[i].pubescent = false;
            }
        }
    }
};


var engine = {
    /*
     * genotyp mix with length of 2(ex: Ab,AA,...)
     * @param geno1 string with 2 Chars
     * @param geno2 string with 2 Chars
     * @return one possible Genotypes, each one has 25%
     */
    mixGenotyp: function (mouseOne, mouseTwo) {

        var x = mouseOne.genotyp;
        var y = mouseTwo.genotyp;

        var x1 = x.charAt(0);
        var x2 = x.charAt(1);
        var y1 = y.charAt(0);
        var y2 = y.charAt(1);

        var res1 = x1 + y1;
        var res2 = x1 + y2;
        var res3 = x2 + y1;
        var res4 = x2 + y2;

        var genoarray = [res1, res2, res3, res4];
        var randNum = Math.floor((Math.random() * 4) + 1);

        return genoarray[randNum]
    }
}



