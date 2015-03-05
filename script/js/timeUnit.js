/**
 * Created by Acer on 29.01.2015.
 */

function nextDay(breed){
    breed.timeUnit ++;
    gainWeight(breed.mouseArray)
}

function gainWeight(mouseArray){
    var addedWeight = 1;
    for ( var i = 0, l = mouseArray.length; i < l; i++ ) {
        mouseArray[i].weight += addedWeight;
    };

}
