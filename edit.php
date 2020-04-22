<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	require './common/init.php';
	$sql="select * from bbs where id=$id";
	$res=mysqli_query($link,$sql);
	if($res==false){
		exit("操作数据库失败，错误：".mysqli_error($link));
	}
	$edit=mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($link);
	require './view/BBS edit.html';
}
?>