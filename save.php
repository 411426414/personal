<?php
	require './common/function.php';
	require './common/init.php';
//	标题
	$title="";
	if(isset($_POST['title'])){
		$title = $_POST['title'];
	}
//	版块
	$plate="";
	if(isset($_POST['plate'])){
		$plate = $_POST['plate'];
	}
//	时间
	$time = time();
//	内容
	$content="";
	if(isset($_POST['content'])){
		$content = $_POST['content'];
	}

	$id="";
	if(isset($_POST['id'])){
		$id=$_POST['id'];
	}
	if($id==true){
		$sql="update `bbs` set title='$title',plate='$plate',time='$time',content='$content' where id=$id";
	}else{

//	    require './file.php';
		$sql="insert `bbs` (`title`,`plate`,`time`,`content`) values ('$title','$plate','$time','$content')";
	}
	$res=mysqli_query($link,$sql);
	if($res==false){
		exit("操作数据库失败，错误：".mysqli_error($link));
	}
	mysqli_close($link);
	header('location: ./BBS.php');