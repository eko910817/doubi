
<?php
	if ($_FILES["file"]["error"] > 0)
	{  
// 错误代码
		echo "错误代码: " . $_FILES["file"]["error"] . "<br />";
	}
	else
	{
		echo "文件名称: " . $_FILES["file"]["name"] . "<br />";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br />";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		echo "临时路径: " . $_FILES["file"]["tmp_name"] . "<br />";
//图片会上传到upload文件夹，如果upload文件夹不存在，会出错
//判断图片是否重复上传
		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo "该文件已经存在";
		}
		else
		{
//存储到upload/下
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
			echo "存储路径: " . "upload/" . $_FILES["file"]["name"];
		}
	}
?>
