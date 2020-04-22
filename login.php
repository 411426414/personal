<?php
	header("content-type:text/html;charset=utf-8");
	require './common/init.php';
	require './photo-upload.php';
//	$email = $_POST['email']; //获取邮箱
	$user = $_POST['user'];	//获取用户名
	$pwd = md5($_POST["pwd"]);;	//获取密码
	//获取邮箱
	$email = isset($_POST['email']) ? $email = $_POST['email'] : '';
	//获取ID,用于判断是否注册
	$id = isset($_POST['id']) ? $id = $_POST['id'] : '';
	//获取用户输入的验证码
	$captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
	if($captcha){
		//获取验证码
		session_start();
		if(empty($_SESSION['captcha'])){//如果Session中不存在验证码，则退出
//			exit('验证码已经过期，请刷新页面重试。');
			echo "<script>alert('验证码已经过期，请刷新页面重试。');window.location.href='view/login.html';</script>";
		}
		//获取验证码并清楚Session中的验证码
		$true_captcha = $_SESSION['captcha'];
		unset($_SESSION['captcha']);//限制验证码只能验证一次，房子重复使用
		//忽略字符串的大小写，进行比较
		if(strtolower($captcha) !== strtolower($true_captcha)){
//			exit('您输入的验证码不正确!请重新输入。');
			echo "<script>alert('您输入的验证码不正确!请重新输入。');window.location.href='view/login.html';</script>";
		}
	}
	if(!$id){
//		echo '登录';
		$result=mysqli_query($link,"select * from user where `user`='$user' and `pwd`='$pwd'");//执行SQL语句,获得结果集
		if(!$result){//判断查询是否执行成功
			exit("查询有误，错误信息:".mysqli_error($link));
		}
		$rows = mysqli_num_rows($result);//获得结果集的行数
		if($rows > 0){//如果$row大于0代表有该记录,有就登录成功,否则登录失败
//			header("Location: index.php");
            $_SESSION['user'] = array('id' => $k,' username' => $v['username']);
			echo "<script>alert('登录成功！');window.location.href='index.php';</script>";
		}else{
//			header("Location: view/login.html");
			echo "<script>alert('登录失败！用户名或密码有误。');window.location.href='view/login.html';</script>";
		}

	}
	else{
//		echo '注册';
		$sql = "insert user (user,email,pwd,pic) value('$user','$email','$pwd','$thumb_pic')";
		$res = mysqli_query($link,$sql);
		if($res == false){
			exit("执行SQL语句失败，错误：".mysqli_error($link));
		}
//		header("Location: view/login.html");
		echo "<script>alert('注册成功！');window.location.href='view/login.html';</script>";
	}
