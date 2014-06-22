<?php

/*

	Facebook Giriş ve Kayıt Sistemi
	
	Kodlayan: KonsolDizayn.com
	
*/

require("ayarlar.php");
require_once("fb/facebook.php");

include("api.php");

$userid = $facebook->getUser();

if($userid){
	try {
		$profile = $facebook->api('/me');
	} catch(FacebookApiException $e){
		print $e->getMessage();
		$userid = null;
	}
}

if($userid){

	$fb_id = $profile['id'];
	$adsoyad = $profile['name'];
	$eposta = $profile['email'];
	$dogumgunu = $profile['birthday'];
	$cinsiyet = $profile['gender'];
	$bolge = $profile['locale'];
	$tarih = date("d/m/Y");
	$ipadresi = $_SERVER['REMOTE_ADDR'];
	$tarayici = tarayici();
	$sistem = isletimsistemi();
	
	$uyekontrol = mysql_query("SELECT * FROM uyeler WHERE fb_id='$fb_id' AND adsoyad='$adsoyad'") or die(mysql_error()); 

	if(mysql_num_rows($uyekontrol) == 1){

		mysql_query("INSERT INTO girisler (fb_id,tarih,tarayici,ipadresi,sistem) VALUES ('$fb_id','$tarih','$tarayici','$ipadresi','$sistem')") or die(mysql_error());
	
		$_SESSION['fboturum'] = "tamam";
		$_SESSION['fboturumid'] = $fb_id;
		
		header("Location: index.php");
		
	} else {

		mysql_query("INSERT INTO uyeler (fb_id,adsoyad,eposta,dogumgunu,cinsiyet,bolge,tarih) VALUES ('$fb_id','$adsoyad','$eposta','$dogumgunu','$cinsiyet','$bolge', '$tarih')");
		mysql_query("INSERT INTO girisler (fb_id,tarih,tarayici,ipadresi,sistem) VALUES ('$fb_id','$tarih','$tarayici','$ipadresi','$sistem')") or die(mysql_error());
		
		$_SESSION['fboturum'] = "tamam";
		$_SESSION['fboturumid'] = $fb_id;
		
		header("Location: index.php");
	}

}

?>