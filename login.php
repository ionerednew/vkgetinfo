<?php
require_once('config.php');
if (empty($_GET['code'])){
	header("location:/vkgetinfo/");
}
else {
	@$token = file_get_contents("https://oauth.vk.com/access_token?client_id=".$appId."&client_secret=".$secretKey."&redirect_uri=".$redirectUrl."&code=".$_GET['code']);
	$token = json_decode($token, true);
	$_SESSION['token'] = $token['access_token'];
	$_SESSION['user_id'] = $token['user_id'];
	$_SESSION['email'] = $token['email'];
	header("location:/vkgetinfo");
}