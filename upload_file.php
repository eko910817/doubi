
<?php
	if ($_FILES["file"]["error"] > 0)
	{  
// 错误代码
		echo "错误代码: " . $_FILES["file"]["error"] . "\n";
	}
	else
	{
		echo "文件名称: " . $_FILES["file"]["name"] . "\n";
		echo "文件类型: " . $_FILES["file"]["type"] . "\n";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " Kb" . "\n";
		echo "临时路径: " . $_FILES["file"]["tmp_name"] . "\n";
//接收用户ID
		echo "用户ID: " . $_POST["userid"] . "\n";
//接收图片标号
		echo "图片标号: " . $_POST["imgnum"] . "\n";

		//判断upload目录是否存在，若不存在，建立
		if (!file_exists("upload")) {
			mkdir("upload");
		}
//图片存储到upload/下
//图片在服务器上的文件名只与"用户ID"和"图片标号"有关，格式为：userid-imgnum.jpg (或其他图片格式）。若参数都相同，则自动覆盖之前的图片
//strrchr函数获取原图片格式
		move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_POST["userid"] . "-" . $_POST["imgnum"] . strrchr($_FILES["file"]["name"], '.'));
		echo "存储路径: " . "upload/" . $_POST["userid"] . "-" . $_POST["imgnum"] . strrchr($_FILES["file"]["name"], '.');
		
	}

	function upload_image($iid, $file_path, $mimetype) {
		$root = $_SERVER['DOCUMENT_ROOT'];
		require_once($root.'/upyun.class.php');
		
		$format = explode('/', $mimetype)[0];
		
		// if ($format != 'image') {
		// 	err_ret('-10', 'not a image', '请上传图片');
		// }
		$type = explode('/', $mimetype)[1];

		$time = time();
		$img_name = md5($iid.$file_path.$time);
		$img_name = $img_name.'.'.$type;

		// 参数分别是：空间名、操作员、操作员密码
		$upyun = new UpYun('wei-game', 'dobe', 'Daxiang@2014');
		// 打开待上传文件的数据流
		$fh = fopen($file_path, 'r');

		// 将文件上传到 UPYUN 的 root 目录下，并命名为“img.jpg”；
		// 第三个参数"True"表示自动创建目录
		$upyun->writeFile($img_name, $fh, True);

		// 关闭待上传文件的数据流
		fclose($fh);
		
		return 'http://wei-game.b0.upaiyun.com/'.$img_name;
	}
?>
