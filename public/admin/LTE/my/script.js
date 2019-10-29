jQuery(document).ready(function($) {
	$.ajaxSetup({
	  beforeSend: function(xhr, settings) {
	  	if (settings.data != null) {
	  		if (settings.data.indexOf('csrf_test_name') === -1) {
		      settings.data += '&csrf_test_name=' + encodeURIComponent(Cookies.get('csrf_cookie_name'));
		    }
	  	}else{
	  		$('input[name='+csrf_test_name+']').remove();
	  	}
	  }
	});
	$('.verify_action').click(function() {
		if(!confirm('Bạn chắc chắn muốn xóa ?'))
		{
			return false;
		}
	});
	//xoa nhieu du lieu
	$('#submit').click(function(){ //tim toi the co id = submit,su kien click
		if(!confirm('Bạn chắc chắn muốn xóa tất cả dữ liệu ?'))
		{
			return false;
		}
		
		var ids = new Array();
		$('[name="id[]"]:checked').each(function()
		{
			ids.push($(this).val());
		});
		
		if (!ids.length) return false;
		
		//link xoa du lieu
	    var url  = $(this).attr('url');
		//ajax để xóa
		$.ajax({
			url: url,
			type: 'POST',
			data : {'ids': ids},
			success: function()
			{
				$(ids).each(function(id, val)
				{
					//xoa cac the <tr> chua danh muc tung ung
					$('tr.row_'+val).fadeOut();
				});
			}
			
		})
		return false;
	});
	/* ajax upload video*/
	$('#video').change(function(event) {
		var x = $(this).val();
		if (x == '') {
			$('.video').hide().attr('type', '');
		}else if (x == 0){
			$('.video').show().attr('type', 'file');
		}else{
			$('.video').show().attr('type', 'text').attr('placeholder', 'Vào Youtube Phần Embed Video Coppy Thẻ <iframe>');
		}
	});

	/* ajax change contact form */
	$('#edit').click(function() {
    	$('#watch').hide();
		$('#fill').slideDown('slow',function(){         
		});
  	});	

	/* script add menu */

	$('.addmenu').click(function(event) {
		var item = $(this).parents('#item');
		
		item.addClass('dd-item');
		item.removeClass('margin').removeClass('input-group');
		item.children('#handle').addClass('dd-handle').removeClass('form-control');
		item.children('span').remove();
		$('#par-list').append(item);
		$('#save').css('display', 'block');
		$('#cancel').css('display', 'block');
		if ($('#name').val() == '') {
			$('#save').attr('disabled', 'true');
		}
	});
	$('#name').keyup(function(event) {
		if ($(this).val().length > 0) {
			$('#save').removeAttr('disabled');
		}else{
			$('#save').attr('disabled', 'true');
		}
	});
	
	

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
        maxDepth: 2,
    });

	$('#save').click(function(event) {
		var json = $('.dd').nestable('serialize'),
			url  = $(this).attr('url'),
			name = $('#name').val();
		$.ajax({
            method: "POST",
            url: url,
            data:{"vl":json,"na":name},
            success: function(data)
			{
				window.location.assign("http://localhost/fashe/admin/menu")	
			}
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });

	});

	$('#get_menu').change(function(event) {
		
		var id = $(this).val(),
			url  = $(this).attr('url');
		$.ajax({
            method: "POST",
            url: url,
            dataTye:'json',
            data:{vl:id},
            success: function(data)
			{
				$('.show').html(data);
				$(this).val('');
			}
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });
        $('#output').fadeIn('slow');
        $('#del').fadeIn('slow');
       
	});

	$('#output').click(function(event) {
		var id = $('#get_menu').val(),
			url  = $('#get_menu').attr('url'),
			posi = $('#position-view').val();
			if (posi == '') {
				alert('Bạn Chưa Chọn Vị Trí Hiển Thị');
				return false;
			}
		$.ajax({
            method: "POST",
            url: url,
            data:'sa='+id+'&po='+posi,
            success: function(data)
			{
				window.location.assign("http://localhost/fashe/admin/menu")
			}
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });
	});
	/* delete menu*/
	$('#del').click(function(event) {
		var url = $(this).attr('url'),
			id  = $('#get_menu').val();
			$.ajax({
	            method: "POST",
	            url: url,
	            data:'de='+id,
	            success: function(data)
				{
					window.location.assign("http://localhost/fashe/admin/menu")
				}
	        }).fail(function(jqXHR, textStatus, errorThrown){
		            alert("Unable to save new list order: " + errorThrown);
	        });
	});
	// function number_format like php
	function number_format( number, decimals, dec_point, thousands_sep ) {
    
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
                              
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	}
	/* slide edit */
	$('.slide_name').change(function(event) {
		var id = $(this).val();
		var url = $('.get_slide').attr('url'),
			del = $('.del_slide').attr('url');
		$('.get_slide').attr('href', url+id);
		$('.del_slide').attr('href', del+id);
	});

	$('.aj-keys').keydown(function(event) {
		var text = $(this).val();
		var url  = $(this).attr('url');

		if (text.length > 3) {
			$.ajax({
	            method: "POST",
	            url: url,
	            data:'key='+text,
	            success: function(data)
				{	
					$('#lnhei').html(data);
				}
	        });
		}
		if (text.length == 0 ) {
			$.ajax({
	            method: "POST",
	            url: url,
	            data:'all=1',
	            success: function(data)
				{	
					$('#lnhei').html(data);
				}
	        });
		}
	});
});
	