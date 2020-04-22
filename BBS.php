<?php
	require 'common/function.php';
	require 'common/init.php';
	//执行sql语句，并获得BBS的内容
	$sql="select * from bbs";
	$res=mysqli_query($link,$sql);
	if($res == false){
		exit("操作数据库失败，错误：".mysqli_error($link));
	}
	//将结果集转换为数组
	$data=mysqli_fetch_all($res,MYSQLI_ASSOC);
	
	//echo "<pre>";
	//print_r($data_user);
	
    //释放结果集
	mysqli_free_result($res);
	mysqli_close($link);
	require './view/BBS.html';