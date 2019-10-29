jQuery(document).ready(function($) {
	var time = $('#getting-started').attr('data-time');
	$("#getting-started").countdown(time,function(event) {
		$('.days').text(
		event.strftime('%D')
		);
		$('.hours').text(
		event.strftime('%H')
		);
		$('.minutes').text(
		event.strftime('%M')
		);
		$('.seconds').text(
		event.strftime('%S')
		);
	});
	/* view list product*/
	$('.view-list').click(function(event) {
		$('.view-grid').removeClass('active');
		$(this).addClass('active');
		var elem = $(this).parents('.bigcontent');
		elem.find('.col-lg-4').addClass('col-lg-12');
		elem.find('.qick-add').addClass('dis-none');
		elem.find('.col-lg-12').removeClass('col-lg-4');
		elem.find('.block2').addClass('flex-w');
		elem.find('.block2').children('.block2-txt').addClass('w-size20').addClass('p-l-20');
		elem.find('.block2').children('.block2-txt').children('.text').removeClass('dis-none');
		elem.find('.block2').children('.block2-txt').children('.sz-cl').removeClass('dis-none');
		elem.find('.block2').children('.block2-img').addClass('w-size6');
		if ($(window).width() < 992) {
			elem.find('.col-sm-6').addClass('col-sm-12');
			elem.find('.col-sm-12').removeClass('col-sm-6');
			elem.find('.col-md-4').addClass('col-md-12');
			elem.find('.col-md-12').removeClass('col-md-4');
		}

	});
	$('#drag-left').click(function(event) {
		$('#leftbar').animate({'left': '0%'}, 500);
		$(this).children('a').addClass('active');
	});
	$('#clse').click(function(event) {
		$('#leftbar').animate({'left': '-100%'}, 500);
		$('#drag-left').children('a').removeClass('active');
	});

	/* view grid product*/
	$('.view-grid').click(function(event) {
		$('.view-list').removeClass('active');
		$(this).addClass('active');
		var elem = $(this).parents('.bigcontent');
		elem.find('.col-lg-12').addClass('col-lg-4');
		elem.find('.col-lg-4').removeClass('col-lg-12');
		elem.find('.qick-add').removeClass('dis-none');
		elem.find('.block2').removeClass('flex-w');
		elem.find('.block2').children('.block2-txt').removeClass('w-size20').removeClass('p-l-20');
		elem.find('.block2').children('.block2-txt').children('.text').addClass('dis-none');
		elem.find('.block2').children('.block2-txt').children('.sz-cl').addClass('dis-none');
		elem.find('.block2').children('.block2-img').removeClass('w-size6');
		if ($(window).width() < 992) {
			elem.find('.col-sm-12').addClass('col-sm-6');
			elem.find('.col-sm-6').removeClass('col-sm-12');
			elem.find('.col-md-12').addClass('col-md-4');
			elem.find('.col-md-4').removeClass('col-md-12');
		}
	});
	
});	