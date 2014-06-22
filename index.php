<?php

/*

	Facebook Giriş ve Kayıt Sistemi
	
	Kodlayan: KonsolDizayn.com
	
*/

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
	ob_start("ob_gzhandler"); 
} else {
	ob_start(); 
}

header('Content-type: text/html; charset=utf8');

require("ayarlar.php");
require_once("fb/facebook.php");

include("api.php");

$userid = $facebook->getUser();

if($userid){
	try {
		$profile = $facebook->api('/me');
		$friendlists = $facebook->api('/me/friends');
	} catch(FacebookApiException $e){
		print $e->getMessage();
		$userid = null;
	}
}


if($userid){
	$logout = $facebook->getLogoutUrl(array(
		'next' => 'http://www.site.com/fbcikis.php'
	));
} else {
	$login = $facebook->getLoginUrl(array(
		'scope' => 'publish_stream,email,user_likes,read_stream',
		'redirect_uri' => 'http://www.site.com/fbgiris.php'
	));
}

if($userid){
	$fb_id = $profile['id'];
	$adsoyad = $profile['first_name'];
	$eposta = $profile['email'];
	$dogumgunu = $profile['birthday'];
	$cinsiyet = $profile['gender'];
	$bolge = $profile['locale'];
	$aktiftarih = $profile['updated_time'];
	echo '<a href="'.$logout.'">Çıkış Yap</a>';
	echo '<br>';
	echo '<img src="https://graph.facebook.com/'.$profile['id'].'/picture" alt="" />';
	echo '<br>';
	echo $profile['first_name'];
	echo '<br>';
	echo $profile['birthday'];
	echo '<br>';
	echo $profile['email'];
	echo '<br>';
	echo $profile['gender'];
	echo '<br>';
	echo $profile['locale'];
	echo '<br>';
	echo $profile['updated_time'];
} else {
	print '<a href="'.$login.'">Giriş Yap</a>';
}

mysql_close($hayatabaglan);

ob_end_flush();

?>