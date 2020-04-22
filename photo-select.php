<?php
	header("Content-Type:text/html;charset:utf-8");
	require './common/init.php';

	//查询数据
	$s = "SELECT * FROM `user`";
	//将查询到的数据赋值给结果集$r
	$r = mysqli_query($link,$s);
	if($r == false){
		exit("执行SQL语句失败，错误：".mysqli_error($link));
	}
	//如果查询内容为多条数据，通常转换为数组
	$d = mysqli_fetch_all($r,MYSQLI_ASSOC);
	//释放结果集
	mysqli_free_result($r);


