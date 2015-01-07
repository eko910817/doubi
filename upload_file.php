
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
?>
