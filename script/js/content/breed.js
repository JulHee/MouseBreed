var BasicFunctions = {
    onReady :  function () {
        $(nextDay()).click(function(){
            nextDay(SESSION_breed);
        });

    }
}
$( document ).ready( BasicFunctions.onReady );