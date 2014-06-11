jQuery(document).ready(function($) {

	/* Init the carousel */
	$('#carousel').carouFredSel({
		prev: '#carousel-prev',
		next: '#carousel-next',
		auto: {
			timeoutDuration: 4000,
		},
		direction: 'left',
		items: {
			visible: 1,
			// width: 940,
			// height: 363
		},
		align: "center",
		scroll : {
			items        : 1,
			fx           : "directscroll",
			easing       : "swing",
			duration     : 500,
			pauseOnHover : true
		}
	});

	/* Disable links with only '#' as href */
	$('a[href="#"]').click(function(e){
		e.preventDefault();
	});

});