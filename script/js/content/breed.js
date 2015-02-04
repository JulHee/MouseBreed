$(document).ready(function() {
	$("#mybutton").click(
		function(){
			addBen($("#name").val(),$("#optionlist").val());
	});
	$(".testButton").click(function() {
		$.notify("Eine Maus ist schwanger ","warn");
	});
	$("#mail_pic").click(function(){
		$("#benachrichtigungen").fadeToggle("slow");	
		
	});
	$("#deleteall").click(function(){
		$("#Benliste").empty();
	});
	
	$("#benachrichtigungen").fadeToggle("slow");
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
		
	  $("#Benliste").append($('<li>').append($('<div>').append(nachricht).attr("class","nachr"))
	  .append($("<div>").append($('<a>').attr("onClick","$(this).parent().parent().remove()")
	  .append("X")).attr("class","entfernen")).attr("class","clearing"));
	  
  	//  $("#Benliste").append($('<li>').append(nachricht+"  ").append($('<a>				 ').attr("onClick","$(this).parent().remove()").append("X")));
}


