<?php
	//php 设置字符编码为utf-8在代码开始出加入一行：
	header("content-type:text/html;charset=utf-8");

	//link.php用来连接数据库
	$link=@mysqli_connect("localhost","root","","php_wish");
	if($link==false){
		exit("连接数据库失败，错误：".mysqli_connect_error());
	}
	mysqli_set_charset($link,"utf8");
	// 在项目中设置时区，以适应各种服务器环境
	date_default_timezone_set('Asia/Shanghai');

	//设置 mbstring 扩展的内置编码
	//	mb_internal_encoding('UTF-8');
