<?php 
	// time : kieu int thoi gian muon hien thi
	// fulltime : lay ca gio phut giay
	function get_date($time ,$fulltime = true)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$format = 'd-m-y';
		if ($fulltime) {
			$format = $format/*.' - %H:%i:%s'*/;
		}
		$date = date($format,$time);
		return $date;
	}
?>