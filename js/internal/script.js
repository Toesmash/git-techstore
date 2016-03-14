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


$(document).ready(function() {
    var showChar = 100;
    var ellipsestext = "...";
    var moretext = "more";
    var lesstext = "less";
    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});