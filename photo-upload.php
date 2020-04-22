<?php
	global $thumb_pic;
	//判断$_FILES['pic]是否存在，如果存在执行上传，不存在限时表单
	if (!empty($_FILES['pic'])) {
		$pic = $_FILES['pic'];

		//判断上传码,>0上传失败
		if ($pic['error'] > 0 ) {
			$error = '上传失败,';
			switch ($pic['error']) {
				case '1': $error .= '文件大小超过了服务器设置的限制!';break;
				case '2': $error .= '文件大小超过了表单设置的限制!';break;
				case '3': $error .= '文件大只有部分被上传!';break;
				case '4': $error .= '没有文件被上传!';break;
				case '5': $error .= '上传文件临时目录不存在!';break;
				case '6': $error .= '文件写入失败!';break;
				default: $error .= '未知错误!';break;
			}
			exit($error);
		}

		//判断上传文件是否为jpg图片
		$type = strrchr($pic['name'],'.');
		if ($type != '.jpg') {
			exit('上传文件必须是jpg格式');
		}

		//判断文件是否为图像文件
		if($pic['type'] != 'image/jpeg'){
			exit('上传文件必须是jpg格式');
		}
		//将上传文件移动到头像目录
		if (!is_dir('./uploads')) {
			mkdir('./uploads');
		}
		if (!move_uploaded_file($pic['tmp_name'],'./uploads/'.$user.'.jpg')) {
			exit('上传失败');
		}
		$show_pic = './uploads/'.$user.'.jpg';


		//上传成功后进行缩略图错做
		//1. 获取原图的宽高信息
		list($width,$height) = getimagesize($show_pic);
		//2.设置缩略图的宽高,不超过150
		$max_width = $max_height = 150;
		if ($width > $height) {
			//宽度大于高度时，将宽度固定为最大值，然后计算高度值(等比例放大)
			$new_width = $max_width;
			$new_height = round($new_width * $height / $width);
		}else{
			//高度大于宽度时，将高度固定为最大值，然后计算宽度值(等比例放大)
			$new_height = $max_height;
			$new_width = round($new_height * $width / $height);
		}
		//3.进行缩略图的操作
		// 创建要进行缩略的源图
		$source = imagecreatefromjpeg($show_pic);
		// 创建要进行缩略的资源
		$thumb = imagecreatetruecolor($new_width,$new_height);


		/*将源图缩放填充到缩略图画布中
		* 参数$thumb表示目标图像
		* 参数$source表示源图像
		* 参数0,0,0,0分别表示目标点的X坐标和Y坐标,源点的X坐标和Y坐标
		* 参数$new_width表示目标图像的宽度
		* 参数$new_height表示目标图像的高度
		* 参数$width表示源图像的宽度
		* 参数$height表示源图像的高度
		*/
		imagecopyresized( $thumb, $source, 0,0,0,0, $new_width, $new_height, $width, $height);
		//4.保存缩略图
		$thumb_pic = './uploads/thumb_'.$user.'.jpg';
		imagejpeg($thumb, $thumb_pic);

	}
?>