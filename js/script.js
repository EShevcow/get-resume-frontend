$('.navbar-burger').click(function(){
    $('.navbar-toggle').slideToggle();
});

// 2) Masked Input
$(function($){
	$('[name="phone"]').mask("+7(999) 999-9999");
}); 