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
