<?php
//	标题
	$title = '';
	if(isset($_POST['title'])){
		$title = $_POST['title'];
	}
//	板块
	$plate = '';
	if(isset($_POST['plate'])){
		$plate = $_POST['plate'];
	}
	$content = '';
	if(isset($_POST['content'])){
		$content = $_POST['content'];
	}

	require './common/init.php';
	$id = "";
	if(isset($_POST['id'])){
		$id=$_POST['id'];
	}
	if($id){
		$sql = "insert patientsinfo (Name,Sex,Age,Office) value('$Name','$Sex','$Age','$Office')";

		$res = mysqli_query($link,$sql);
		if($res == false){
			exit("执行SQL语句失败，错误：".mysqli_error($link));
		}
		//释放结果集
		mysqli_free_result($res);
		mysqli_close($link);
	}
	header('location:index.php');
?>