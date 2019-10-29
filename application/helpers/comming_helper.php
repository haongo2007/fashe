<?php 
	function public_url($url = '')
	{
		return base_url('public/'.$url);
	}

	function pre($list,$exit = true){
		echo "<pre>";
		print_r($list);
		if ($exit) {
			die();
		}
	}
	function time_count_down($timestamp)
	{
        $time_ago = strtotime($timestamp);  
        $current_time = time();  
        $time_difference = $current_time - $time_ago;  
        $seconds = $time_difference;  
        $minutes      = round($seconds / 60 );           // value 60 is seconds  
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
        $weeks          = round($seconds / 604800);          // 7*24*60*60;  
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
        if($seconds <= 60)  
        {  
       		return "Vừa xong";  
		}  
        else if($minutes <=60)  
        {  
	       	if($minutes==1)  
	        {  
	         	return "1 Phút trước";  
	       	}  
	       	else  
	        {  
	         	return "$minutes Phút trước";  
	       	}  
     	}  
        else if($hours <=24)  
        {  
	       	if($hours==1)  
	        {  
	         	return "1 Giờ trước";  
	       	}
	       	else  
	        {  
	         	return "$hours Giờ trước";  
	       	}  
	    }  
        else if($days <= 7)  
        {  
       		if($days==1)  
            {  
         		return "Hôm qua";  
       		}  
            else  
            {  
         		return "$days Ngày trước";  
       		}  
     	}  
        else if($weeks <= 4.3) //4.3 == 52/12  
        {  
       		if($weeks==1)  
            {  
         		return "1 Tuần trước";  
       		}  
            else  
            {  
         		return "$weeks Tuần trước";  
       		}  
     	}  
        else if($months <=12)  
        {  
       		if($months==1)  
            {  
         		return "1 Tháng trước";  
       		}  
            else  
            {  
         		return "$months Tháng trước";  
       		}  
     	}  
        else  
        {  
       		if($years==1)  
            {  
         		return "1 Năm trước";  
       		}  
            else  
            {  
         		return "$years Năm trước";  
       		}  
     	}  
	}
	function get_percentile($total, $disc) {										    
	    $index = ($total/100);
	    $result = $disc / $index;
	    return round($result).'%';
	}
	function RandomString($length = 6) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	function stripUnicode($str){
   	$unicode = array(
		      '/á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ/' => 'a',
		      '/Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ/' => 'A',
		      '/đ/' => 'd',
		      '/Đ/' => 'D',
		      '/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/'  => 'e',
		      '/É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ/' => 'E',
		      '/í|ì|ỉ|ĩ|ị/'  => 'i',
		      '/Í|Ì|Ỉ|Ĩ|Ị/' => 'I',
		      '/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/' => 'o',
		      '/Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ/' => 'O',
		      '/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/' => 'u',
		      '/Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự/' => 'U',
		      '/ý|ỳ|ỷ|ỹ|ỵ/' => 'y',
		      '/Ý|Ỳ\Ỷ|Ỷ|Ỹ|Ỵ/' => 'y',
		      '/[^\p{L}\p{N}\s]/u' => '',
   	);
    $str = preg_replace(array_keys($unicode),array_values($unicode), $str);	
    $str = trim($str);
   	$str = strtolower($str);
    $str = str_replace(" ","-",$str);
    return $str;
   	}
   	function cut_str($str) {
   		$str = explode(',', $str);
    	return $str;
   	}
    // Function to get the client IP address
	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	function count_text($text){
		$str = mb_strlen($text, 'UTF-8');
		$text = str_replace('-', ' ', $text);
		$text = substr($text,0, 30).'...';
		return $text;
	}

    function get_price($price,$discount){
    	if ($discount) {
    		$new_price = $price - $discount;
    		$new_price = number_format($new_price);
    	}else{
    		$new_price = number_format($price);
    	}
    	return $new_price;
    }

    function get_star($rate_count,$rate_total){
    	
		$raty = ($rate_count > 0) ? $rate_total/$rate_count : 0;
		for ($i=0; $i < $raty; $i++) { 
			echo '<i class="fa fa-star"></i>';
		}
    }
       
	function site_name()
	{
	    $CI =& get_instance();
	    return $CI->config->item('site_name');
	}

?>