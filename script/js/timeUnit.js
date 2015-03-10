function nextDay(breed){
    breed.timeUnit ++;
    gainWeight(breed.mouseArray)
}

function gainWeight(mouseArray){
    /*siehe gewichtsentwicklung.xlsx*/
    var addedWeight = 1;
    for ( var i = 0, l = mouseArray.length; i < l; i++ ) {
        mouseArray[i].weight += addedWeight;
    };
}
/*
* */
function checkPubescent(mouseArray){
    for ( var i = 0, l = mouseArray.length; i < l; i++ ) {
        if(mouseArray[i].age >69){
            mouseArray[i].pubescent = true;
        }else{
            mouseArray[i].pubescent = false;
        };
    };
}
