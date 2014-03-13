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

	/* Add lightbox to attachment images */
	num = 1; // each image needs an unique data-lightbox attribute
	$('.entry a > img').parent().each(function(e){
		if(!$(this).attr('data-lightbox')) {
		console.log($(this).attr('data-lightbox'))
			$(this).attr('data-lightbox', num++);
		}
	});

});

