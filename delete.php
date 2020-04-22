<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	require './common/init.php';
	$sql="DELETE FROM bbs WHERE id=$id;";
	$res=mysqli_query($link,$sql);
	if($res==false){
		exit("操作数据库失败，错误：".mysqli_error($link));
	}
	mysqli_close($link);
	require './BBS.php';
}
?>