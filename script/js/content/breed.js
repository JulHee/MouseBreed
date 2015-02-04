$(document).ready(function() {
	$("#mybutton").click(
		function(){
			addBen($("#name").val(),$("#optionlist").val());
	});
	$(".testButton").click(function() {
		$.notify("Eine Maus ist schwanger ","warn");
	});
	$("#mail_pic").click(fadeInOut());
});

function addBen(nachricht,art)
{
  switch (art) {
        case "success":
          $.notify(nachricht,"success");
            break;
        case "warn":
           $.notify(nachricht,"warn");
            break;
        case "info":
           $.notify(nachricht,"info");
            break;
        case "error":
           $.notify(nachricht,"error");
            break;
        default:
           $.notify(nachricht,"info");
            break;
      }
    $("#Benliste").append($('<li>').append(nachricht+"  ").append($('<a>').attr("onClick","$(this).parent().remove()").append("X")));
}

function fadeInOut(){
	if ($("#benachrichtigungen").css('opacity') == 0){
		unfade($("#benachrichtigungen"));
	} else {
		fade($("#benachrichtigungen"));
	}
}

function fade(element) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
}

function unfade(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
        alert("here");
    }, 10);
}


