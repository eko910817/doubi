<?php

	define("APPID","wx14bd85697c4ba992");
	define("SECRET","2e9edbfd8a4b1727e2242f98cec13a72");


	$code = $_GET['code'];

	$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.APPID.'&secret='.SECRET.'&code='.$code.'&grant_type=authorization_code';
	// echo $url;
	$out_put = curl_http_request($url);

	$code_json = json_decode($out_put, true);

	$access_token = $code_json['access_token'];
	$openid = $code_json['openid'];
	$refresh_token = $code_json['refresh_token'];

	// $res = access_vary($access_token, $openid, $refresh_token);
	// $access_token = $res['access_token'];
	// $openid = $res['openid'];


	$root = $_SERVER['DOCUMENT_ROOT'].'/wei_game';
	// echo $root;
	require_once $root.'/controller/logic_controller.php';
	require_once 'protocol.php';

	if (is_user_exist($openid)) {
		# code...
		$user = get_user_info($openid);
	} else {
		# code...
		$url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
		$out_put = curl_http_request($url);
		$user_json = json_decode($out_put, true);

		$name = $user_json['nickname'];
		$sex = $user_json['sex'];
		$province = $user_json['province'];
		$city = $user_json['city'];
		$country = $user_json['country'];
		$head = $user_json['headimgurl'];
		$unionid = $user_json['unionid'];

		$user = register($access_token, $openid, $name, $sex, $province, $city, 
				$country, $head, $unionid);
	}
	echo json_encode(get_user_protocol($user));

	// header("Location: http://120.24.71.165/wei_game/rate.html");

	function curl_http_request($url){
		$ch = curl_init();	// 初始化CURL句柄
		curl_setopt($ch, CURLOPT_URL, $url);	//设置请求的URL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);		// 设为TRUE把curl_exec()结果转化为字串，而不是直接输出
		$response = curl_exec($ch);	//执行预定义的CURL
		curl_close($ch);	//关闭CURL
		return $response;
	}

	function access_vary($access_token, $openid, $refresh_token) {
		$url = 'https://api.weixin.qq.com/sns/auth?access_token='.$access_token.'&openid='.$openid;

		$out_put = curl_http_request($url);
		$access_json = json_decode($out_put, true);

		if ($access_json['errcode'] != 0) {
			# code...
			$url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.APPID.'&grant_type=refresh_token&refresh_token='.$refresh_token;
			$out_put = curl_http_request($url);

			$refresh_json = json_decode($out_put, true);

			$access_token = $refresh_json['access_token'];
			$openid = $refresh_json['openid'];
			$refresh_token = $refresh_json['refresh_token'];
		}

		return array('access_token'=>$access_token, 'openid'=>$openid, 'refresh_token'=>$refresh_token);
	}

?>