jQuery(document).ready(function($) {
/* AJAX */
	$.ajaxSetup({
	  beforeSend: function(xhr, settings) {
	  	if (settings.data != null) {
	  		if (settings.data.indexOf('csrf_test_name') === -1) {
		      settings.data += '&csrf_test_name=' + encodeURIComponent(Cookies.get('csrf_cookie_name'));
		    }
	  	}
	  }
	});
	function Ajax_fuc($url, $type, $params,$dataType = '') {
	  return $.ajax({
	    url: $url,
	    type: $type,
	    dataType : $dataType,
	    data:  $params,
	    async: true
	  });
	}
	/* LOGIN DESK*/
	$('.login').click(function(event) {
		var url = $(this).attr('url'),
			dataform = $('.FormCl').serialize();
		Ajax_fuc(url, "post", dataform).done(function (data) {
			if (data == 1) {
				location.reload();
			}else{
				$('.err').html(data);	
			}
		});
	});
	/* LOGIN MOBILE */
	$('.login-mobile').click(function(event) {
		var url = $(this).attr('url'),
			dataform = $('.FormCl-mobile').serialize();
			Ajax_fuc(url, "post", dataform).done(function (data) {				
				if (data == 1) {
					location.reload();
				}else{
					$('.err-mobile').html(data);   
				}
			});
	});
	/* CHANGE COLOR FETCH SIZE*/
	function change_size() {
		$('.change-size').change(function(event) {
			var x = $(this).find('option:selected').index();
			$(this).parents('.xxx').find('.posi').val(x);
			var url = $(this).attr('data-url'),
				data = $(this).val();
				id = $(this).attr('data-attr-id');
				dataform = 'data='+data+'&id='+id;
				var _this = $(this);
				Ajax_fuc(url, "post", dataform).done(function (data) {				
					_this.parents('.xxx').find('.recipients').html(data);
				});
		});
	}
	/* filter store */
	$('.consu').change(function(event) {
		if ($(this).val() == 0) {
			var url = $(this).attr('url'),
				dataform = 'rem='+val;
			$('.categ').html('');
			Ajax_fuc(url, "post", dataform).done(function (data) {				
				var res = $.parseJSON(data);
				$.each(res, function(index, val) {
					$('.categ').append('<option value='+val.id+'>'+val.name+'</option>');
				});
			});
		}else{
			var val = $(this).val(),
				url = $(this).attr('url');
				dataform = 'cons='+val;
			$('.categ').html('');
			Ajax_fuc(url, "post", dataform).done(function (data) {				
				var res = $.parseJSON(data);
				$.each(res, function(index, val) {
					$('.categ').append('<option value='+val.id+'>'+val.name+'</option>');
				});
			});
		}
	});
	/* CHANGE LANGUAGE */
	$('.selection-1').change(function(event) {
		var url = $(this).attr('url'),
			val = $(this).val(),
			dataform = 'lang='+val;
		Ajax_fuc(url, "post", dataform).done(function (data) {
			window.location.assign(window.location.href);
		});
	});
	/* CHANGE IMAGE LIST PRODUCT DETAIL*/
	$('.checkbox-color-filter').click(function(event) {
		var pos = $(this).val(),
			id  = $(this).attr('data-id'),
			name = $(this).attr('data-name'),
			url = $(this).attr('data-url'),
			dataform = 'pos='+pos+'&id='+id+'&name='+name;
		Ajax_fuc(url, "post", dataform).done(function (data) {
			$('.place_append').html(data);
		});
	});
	/* ADD WISH LIST*/
    function add_wish() {
        $('.block2-overlay > a').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-pr'),
                url = $(this).attr('data-url');
        	if ($(this).hasClass('block2-btn-addwishlist')) {
        		$(this).addClass('block2-btn-towishlist');
        		$(this).removeClass('block2-btn-addwishlist');
            	$('.'+id+'_pr').addClass('block2-btn-towishlist');
            	$('.'+id+'_pr').removeClass('block2-btn-addwishlist');
        		var ttx = $(this).parents('.block2').find('.block2-name'),
            		nameProduct = ttx.text(),
                	alertProduct = ttx.attr('add_wish');
        	}else{
        		$(this).removeClass('block2-btn-towishlist');
        		$(this).addClass('block2-btn-addwishlist');
        		$('.'+id+'_pr').addClass('block2-btn-addwishlist');
            	$('.'+id+'_pr').removeClass('block2-btn-towishlist');
        		var ttx = $(this).parents('.block2').find('.block2-name'),
            		nameProduct = ttx.text(),
                	alertProduct = ttx.attr('remove_wish');
        	}
        	if ($(window).width() < 992) {
        		var dataform = 'id='+id+'&mb=ok';
        	}else{
        		var dataform = 'id='+id;
        	} 
                
            Ajax_fuc(url, "post", dataform).done(function (data) {
                    $('.recip-cpn').html(data);
                    swal(nameProduct, alertProduct, "success");
                    change_image();
                    change_size();
                    add_cart();
            });
        });
    }
    /* ADD CART */
    function add_cart(){
        $('.block2-btn-addcart').each(function(){
            var elempr      = $(this).parents('.block2'),
            	ttx 		= elempr.find('.block2-name'),
            	nameProduct = ttx.text(),
            	notificat	= ttx.attr('add_cart'),
            	url         = $(this).children('button').attr('url'),
            	id          = $(this).children('button').attr('data-id');    
            $(this).on('click', function(){
                var qty         = elempr.find('.num-prod').val(),
                	color       = elempr.find('.clr option:selected').val(),
                	size        = elempr.find('.siz option:selected').val(),
                	posi        = elempr.find('.clr option:selected').index(),
                	dataform	= {"id" : id, "qty" : qty, "color" : color, "size" : size, "posi" : posi};
                Ajax_fuc(url, "post", dataform,dataType = 'json').done(function (data) {
	                swal(nameProduct, notificat, "success");
	                $('.cart-cont').html(data.val);
	                $('.notifycation').html(data.totals);
                    remove_cart();
                    clear_cart();
                })
            });
                
        });
    }
    /* REMOVE A PRODUCT */
    function remove_cart(){
        $('.remove_cart').click(function(event){
        	var elempr 		= $(this).parent().find('.header-cart-item-name'),
        		nameProduct = elempr.text(),
            	notificat 	= elempr.attr('remove-cart'),
            	url 		= $(this).attr('url'),
            	id 			= $(this).attr('data-id'),
            	dataform = 'id='+id;
            Ajax_fuc(url, "post", dataform).done(function (data) {
            	swal(nameProduct, notificat, "success");
            	var result = $.parseJSON(data);
                $('.cart-cont').html(result.val);
                $('.notifycation').html(result.totals); 
                remove_cart();
                clear_cart();
            })
        })
    };
    /* REMOVE ALL PRODUCT*/
    function clear_cart(){
        $('.clear-cart').click(function(event){
            var url = $(this).attr('url'),
            	dataform = 'data=clear';
            Ajax_fuc(url, "post", dataform).done(function (data) {
                var result = $.parseJSON(data);
                $('.cart-cont').html(result.val);
                $('.notifycation').html(result.totals);
                var pathArray = window.location.pathname.split('/');
                var newPathname = pathArray[2];
                if (newPathname == 'cart') {
                    window.location.assign(window.location.origin+'/'+pathArray[1]);
                }    
            })
        })
    };
    /* CHANGE IMAGE BY COLOR*/
	function change_image(argument) {
		$('.color-filter-2').click(function(event) {
			$(this).parents('.block2').find('.color-filter-2').css('box-shadow', 'unset');
			var img = $(this).attr('data-img');
			$(this).parents('.block2').find('#img_ne').attr('src', img);
			$(this).css('box-shadow', '0 0 0px 2px #fff');
		});
	}
	/* SELECT 2 */
    add_wish();
	change_size();
	change_image();
    add_cart();
    remove_cart();
    clear_cart();
	$(".selection-2").select2({
	  	minimumResultsForSearch: 20,
	  	dropdownParent: $('#dropDownSelect2')
	});
	$(".selection-1").select2({
	  	minimumResultsForSearch: 20,
	  	dropdownParent: $('#dropDownSelect1')
	});
	$(".select2insidemodal").select2({
		dropdownParent: $("#myModal")
	});
});