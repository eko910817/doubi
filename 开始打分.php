<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <title>开始打分</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/db.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<style type="text/css">

html {

  height: 100%;
}

body{
  height: 100%;

  background: url(img/bg.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.CoverImage {
  background-position: 50%;
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 100%;
  min-width: 100%;
}

#footer {
    position:fixed;
    right:0;
    bottom:0;
    margin:0;
    padding:0;
    width:100%;
}
#footer img {width:100%;}

</style>  
  
  <body onload="shit();">



    <div style="width:100%;" id="div1">
        <img src="img/开始打分bg.png" class="img-responsive imgCenter">
    </div>

    <div style="width:100%; visibility:hidden; padding-left: 10%; padding-right:10%; " id="div2">
      <img src="img/avator.png" class="imgCenter" style="width:120px; height:120px;">
      <p class="center">Hi 王尼玛，欢迎你启动你的2014年度照片计划。只需简单几步，即可发布最能代表你2014年的照片，让朋友们为你打分！</p>

        <img src="img/开始打分.png" class="img-responsive imgCenter" style="height:50px; margin-top:20px;">
      
    </div>   

<div id="footer">
  <img src="img/bottom.png" class="img-responsive imgCenter">    
</footer>

<!--
<div class="CoverImage" style="background-image: url('img/开始打分bg.png');">

</div>
-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


<script>
$(document).ready(function(){

/*
  $("#area1").click(function(){
    window.location.href="viewPic.php?openID=&whichPic=2";
  });
*/
});

function shit(){
  
  var h = $("#div1").height();

  $("#div2").css("position", "relative");
  $("#div2").css("top", h*0.78*(-1) + "px");
  $("#div2").css("visibility", "visible");



}
</script>

  </body>
</html>