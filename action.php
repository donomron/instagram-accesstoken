<?php
	session_start();
	include 'config.php';

	function httpPost($url, $data=array()){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	print_r($_SESSION["clientSecret"]);


	$data = array();
	$data['client_id'] = $_SESSION["clientId"];
	$data['client_secret'] = $_SESSION["clientSecret"];
	$data['grant_type'] = 'authorization_code';
	$data['redirect_uri'] = $redirectUri;
	$data['code'] = $_GET['code'];
	$res = httpPost('https://api.instagram.com/oauth/access_token', $data);		

	header('Location: ' . $baseUrl . '?token=' . $res->access_token);
?>