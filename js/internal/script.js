function submitForm() {
	document.getElementById("formular").submit();
}

$("#sign_in_affix" ).click(function() {
	$("#sign_in_div").fadeToggle();

});

$("#closer" ).click(function() {
	$("#sign_in_div").fadeToggle();

});



$('#sign_in_div').affix();	

$('#sidebar').affix({
	offset: {
		top: $('header').height()
	}
});	


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});