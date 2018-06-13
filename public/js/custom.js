
$(document).ready(function() {
    
    // login popup icon
	$('#pop-abt').hover(function(){
		$('.pop-about').toggle(500);
	});


	//Dashboar menu name popup
	$('.dboard-menu1-box').hover(function(){
		$('#dboard-menu-pop1').toggle(200);
	});

	$('.dboard-menu2-box').hover(function(){
		$('#dboard-menu-pop2').toggle(200);
	});

	$('.dboard-menu3-box').hover(function(){
		$('#dboard-menu-pop3').toggle(200);
	});

	$('.dboard-menu4-box').hover(function(){
		$('#dboard-menu-pop4').toggle(200);
	});

	$('.dboard-menu5-box').hover(function(){
		$('#dboard-menu-pop5').toggle(200);
	});


	// Account Settings/Logout popup
	$('.dboard-rmenu1-box').click(function(event){
        event.stopPropagation();
         $("#acc-but-popup").slideToggle(300);
    });

    $('.dboard-rmenu2-box').click(function(event){
        event.stopPropagation();
         $("#acc-but-popup").slideToggle(300);
    });

    $("#acc-but-popup").on("click", function (event) {
        event.stopPropagation();
    });

});

// fixed account popup
$(document).on("click", function () {
    $("#acc-but-popup").hide();
});