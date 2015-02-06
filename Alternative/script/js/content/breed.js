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
	
	$("#benachrichtigungen").fadeToggle("slow");
});




