<?php

/*

	Facebook Giriş ve Kayıt Sistemi
	
	Kodlayan: KonsolDizayn.com
	
*/

require("ayarlar.php");
require_once("fb/facebook.php");

include("api.php");

unset($_SESSION['fboturum']); 
unset($_SESSION['fboturumid']); 

$facebook->destroySession();

header("Location: index.php");  

?>