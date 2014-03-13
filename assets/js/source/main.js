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

		// Add data-lightbox attribute to all linked images that don't have it already
		if(!$(this).attr('data-lightbox')) {
			console.log($(this).attr('data-lightbox'))
			$(this).attr('data-lightbox', num++);
		}

		// Copy alt tag from image to link's title, to display it as lightbox caption, if the link has no title
		// Usually the title will be set from image's wp_caption, but if it empty, then we will use image's alt.
		alt = $(this).children('img').attr('alt');
		title = $(this).attr('title');
		if(!title) {
			$(this).attr('title', alt);
		}
	});

});

