
var URL_ROOT = "http://mousebreed";

$( document ).ready(function() {

    $( ".left_list" ).css('height', ($( ".content_container" ).height() - $( ".left_list_head" ).height() - 20) + 'px');

    $( "#logout_button" ).click(function() {
        $.ajax({
            url: "http://mousebreed/script/php/ajax/logout.php"
        }).done(function() {
            location.reload();
        });
    });

});