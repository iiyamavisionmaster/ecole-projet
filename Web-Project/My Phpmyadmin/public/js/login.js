
function alert_msg(msg, type) {
	$("#error").append('<div class="alert ' + type + '" id="' + type + '">\
		<button type="button" class="close" data-dismiss="alert">x</button>\
		' + msg + '\
		</div>');
	$("." + type).fadeOut(7000);

};
$( "form" ).submit(function( event ) {
	event.preventDefault();
	var pass = $("input[name='passwordDB']").val();
	var login = $("input[name='loginDB']").val(); 
	$.post({
		url : 'controller/checkDB.php',  
		dataType: "text",
		data: {login: login,pass: pass},
       success : function(data, statut){ 
       	if (data == "true") {
       		window.location.href = "./public"
       	}
       	else
       		alert_msg(data, "alert-danger")
       },

   error : function(result, statut, error){
   	alert(error);
   }
});
});
$(document).ready(function() {

});