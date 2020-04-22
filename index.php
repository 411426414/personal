<?php
	header("Content-Type:text/html;charset:utf-8");
	require './common/init.php';

	//查询数据
	$sql = "SELECT * FROM `text`";
	//将查询到的数据赋值给结果集$res
	$res = mysqli_query($link,$sql);
	if($res == false){
		exit("执行SQL语句失败，错误：".mysqli_error($link));
	}
	//如果查询内容为多条数据，通常转换为数组
	$data = mysqli_fetch_all($res,MYSQLI_ASSOC);
	//释放结果集
	mysqli_free_result($res);

//	echo "<pre>";
//	print_r($data);

	require './photo-select.php';


	mysqli_close($link);
	require './view/index.html';