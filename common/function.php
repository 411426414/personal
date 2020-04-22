<?php
	/*
	* 格式化日期
	* @param type $time 给定时间戳
	* @return string 从给定时间到现在经过了多长时间（天/小时/分钟/秒）
	*/
	function format_date($time) {
		$diff = time() - $time;
		$format = [86400=>'天',3600=>'小时',60=>'分钟',1=>'秒'];
		foreach($format as $k => $v){
			$result = floor($diff / $k);
			if($result) {
				return $result.$v;
			}
		}
		return '0.5秒';
	}
?>