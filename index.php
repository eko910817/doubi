<?php
	define("APPID","wx14bd85697c4ba992");
	define("SECRET","2e9edbfd8a4b1727e2242f98cec13a72");

	$redirect_uri = urlencode('http://120.24.71.165/wei_game/enter.php');

	$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.APPID.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=12#wechat_redirect';

	// echo $url;
	// curl_http_request($url);
	header("Location: ".$url);

?>