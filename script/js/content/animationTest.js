$(document).ready(function(){
    $('.mouse').each(function() {
        var newP = newPosition();
        $(this).css({ top: newP[0], left: newP[1] });
        animateMouse($(this));
    });

    $('.mouse').on( 'mouseover', function() {
        $(this).addClass('stopped');
        $(this).stop();
    });

    $('.mouse').on( 'mouseleave', function() {
        $(this).removeClass('stopped');
        animateMouse($(this));
    });

});

function newPosition(){

    var h = $('#cage').height() - 30;
    var w = $('#cage').width() - 55;

    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w);

    return [nh,nw];

}

function animateMouse(mouse){
    var newP = newPosition();
    mouse.animate({ top: newP[0], left: newP[1] }, {duration: Math.random() * 2000 + 2000, complete: function() {
        setTimeout(function() { if(!mouse.hasClass('stopped')) animateMouse(mouse) }, Math.random() * 5000); }
    });
}