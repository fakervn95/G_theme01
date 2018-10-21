jQuery(document).ready(function(){
// SCROLL TO DIV
	jQuery(window).scroll(function(){
		if(jQuery(this).scrollTop()>500){
			jQuery('.scrolltop').addClass('go_scrolltop');
		}
		else if(jQuery(this).scrollTop()>50){
		}
		else{
			jQuery('.scrolltop').removeClass('go_scrolltop');
		}
	});
	jQuery('.scrolltop').click(function (){
	    jQuery('html, body').animate({
	      scrollTop: jQuery("html").offset().top
	    }, 1000);
	 }); 
	var scrollAmount = 95;

	$(window).on('scroll', function(){
	  if($(window).scrollTop()>=scrollAmount && !$('.nav_primary ').hasClass('fixed')){
	    $('.nav_primary ').addClass('fixed'); 
	  }
	  else if($(window).scrollTop()<scrollAmount && $('.nav_primary ').hasClass('fixed')){
	     $('.nav_primary ').removeClass('fixed') 
	  }
	});

// SLIDE
	jQuery('.focal_week ul').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
				// fade: true,
			cssEase: 'linear',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
	});

	$('.like__btn').click(function(){
    	var post_id = jQuery(this).data('id');
    	var post_count = jQuery(this).data('count');
		jQuery.ajax({
			url : postlove.ajax_url,
			type : 'post',
			data : {
				action : 'post_love_add_love',
				post_id : post_id
			},
			success : function( response ) {
				jQuery('.like__btn.id_'+post_id).prop("disabled", true);
				jQuery('.like__number_'+post_id).html( response );
			}
		});
    })
});
	
