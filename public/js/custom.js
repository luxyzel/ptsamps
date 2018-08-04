
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

    $('.dboard-menu6-box').hover(function(){
        $('#dboard-menu-pop6').toggle(200);
    });

    $('.dboard-menu7-box').hover(function(){
        $('#dboard-menu-pop7').toggle(200);
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

    // Popup confirmation manage
    $('.manage-archive-but').click(function(){
    	$('.manage-archive-confirmation').css("display", "block");
    });

    $('#manage-popup-cancel').click(function(){
    	$('.manage-archive-confirmation').css("display", "none");
    });

});

// fixed account popup
$(document).on("click", function () {
    $("#acc-but-popup").hide();
});


// sorting table
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("assetTable");
    switching = true;

     // Set the sorting direction to ascending:
    dir = "asc"; 

    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {

        // Start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByTagName("TR");

        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {

        // Start by saying there should be no switching:
        shouldSwitch = false;

        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];

        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {

                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {

          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;

          // Each time a switch is done, increase this count by 1:
          switchcount ++; 
        } else {
            
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
