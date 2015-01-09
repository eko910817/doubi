<?php 
$openID = $_GET["openID"];
$whichPic = $_GET["whichPic"];

$url = "viewPic.php?openID=" . $openID . "&" . "whichPic=" . ($whichPic+1);
?>



<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type"  content="text/html;  charset=utf-8"  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	<script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/jquery.raty.js"></script>

	<style>
/*图片预览区域CSS*/
		#preview {
			width: 100%;
			height:300px;
			border:1px solid gray;
			line-height: 300px;
			text-align: center;
		}
/*隐藏file input*/
		#file {
			display: none;
		}
		.imgResponsive{
			width: 100%;
			height: auto;
		}
		.imgFit{
			max-width: 100%;
    		max-height: 100%;
		}


input{
align-items: flex-start;
text-align: center;
cursor: default;
color: buttontext;
padding: 0px;
border: 0px !important;
}

button{
padding: 0px;
border: 0px !important;
box-sizing:initial;
}

.uploadBtn{
	margin-top: 20px;
	width: 100%;
	text-align: center;
	height: 50px;
	line-height: 50px;
	background: #ccc;
	border:1px solid #aaaaaa;
}

.dian30{
	width: 30%;
	float: left;
	height: 20px;
}
.dian10{
	width: 10%;
	float: left;
	height: 20px;
	background: #
}

.dot{
	width: 8px;
	height:8px;
	border-radius: 50%;
	border: 1px solid #000000;

	display: block;
	margin-right: auto;
	margin-left: auto;
}

#wrap {display:block;
		right:8px !important;
		width:60px;
		height: 60px;
		border-radius: 50%;

		line-height:60px;
		position:fixed;
		border:1px solid #fff;
		text-align:center;
		color:#fff; 
		background:#bbb;}

#content {
	width: 100%;
	text-align: center;
}

</style>

</head>

<body onload="shit();">

<div style="margin-top:14px;">
	<div class="dian30"></div>
	<div class="dian10">
		<div class="dot" id="dot1"></div>
	</div>
	<div class="dian10">
		<div class="dot" id="dot2"></div>
	</div>
	<div class="dian10">
		<div class="dot" id="dot3"></div>
	</div>
	<div class="dian10">
		<div class="dot" id="dot4"></div>
	</div>
	<div class="dian30"></div>
	<div style="clear:both;"></div>
</div>


<p style="text-align:center; margin:0;">2014<br/>最壕的一天</p>

<div data-role="page" style="">

	<div data-role="content">

<!-- 图片预览区域 -->
		<div id="preview">
			<img src="<?php echo "upload/" . $whichPic . ".jpg"; ?>" class="imgFit" />
		</div>  

	</div><!-- /content -->


</div><!-- /page -->


<div id="wrap" onClick="next();">下一张</div>



		<div id="content" style="margin-top:20px;">
			<div id="click-demo" class="session">点击评分:</div>
			<div id="click"></div>
		</div>	




		<script type="text/javascript">
			$(function() {
				$('#click').raty({
					click: function(score, evt) {
						alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
					}
				});
			});

			function shit(){
			$('#click img').css("width", "15%");
			//alert($("#preview").offset.top);
			//$("#wrap").css({"position":"relative", "top":"-20px", "right":""});
			$("#wrap").css("top", ($("#preview").offset().top + 275) + "px");

			//alert($("#preview").offset().top + $("#preview").height());
		}
		</script>



<script type="text/javascript">

$(document).ready(function(){
	$("#dot" + "<?php echo $whichPic; ?>").css("background", "#000000");
});

function next()
{
window.location.href="<?php echo $url?>"; 
}
</script>


</body>

</html>
