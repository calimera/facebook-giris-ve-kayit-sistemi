<?php

/*

	Facebook Giriþ ve Kayýt Sistemi
	
	Kodlayan: KonsolDizayn.com
	
*/

header('Content-Type: text/html; charset=utf-8');

define('dbhost','localhost'); // Veritabaný Host
define('dbuser','root'); // Veritabaný Kullanýcý Adý
define('dbpass',''); // Veritabaný Þifresi
define('dbdata','facebook'); // Veritabaný Adý

if (!@$hayatabaglan = mysql_connect(dbhost, dbuser, dbpass)) {
	die("Veritabanýna baðlanýlamadý!");
}

if (!@mysql_select_db(dbdata)) {
	die("Veritabaný seçilemedi!");
}

mysql_query("SET NAMES UTF8");
mysql_query("SET_CHARACTER utf8_general_ci");
mysql_query("SET_CHARACTER SET 'utf8_general_ci'");
mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");

function isletimsistemi() {
	$tespit=$_SERVER['HTTP_USER_AGENT'];
	if(stristr($tespit,"Windows 95")) { $os="Windows 95"; }
	elseif(stristr($tespit,"Windows 98")) { $os="Windows 98"; }
	elseif(stristr($tespit,"Windows NT 5.0")) { $os="Windows 2000"; }
	elseif(stristr($tespit,"Windows NT 5.1")) { $os="Windows XP"; }
	elseif(stristr($tespit,"Windows NT 6.0")) { $os="Windows Vista"; }
	elseif(stristr($tespit,"Windows NT 6.1")) { $os="Windows 7"; }
	elseif(stristr($tespit,"Windows NT 6.2")) { $os="Windows 8"; }
	elseif(stristr($tespit,"Mac")) { $os="Mac"; }
	elseif(stristr($tespit,"Linux")) { $os="Linux"; }
	else {$os="Bilinmiyor ?";}
	return $os;
}

function tarayici() {
	$tespit2=$_SERVER['HTTP_USER_AGENT'];
	if(stristr($tespit2,"MSIE")) { $tarayici="Internet Explorer"; }
	elseif(stristr($tespit2,"Firefox")) { $tarayici="Mozilla Firefox"; }
	elseif(stristr($tespit2,"YaBrowser")) { $tarayici="Yandex Browser"; }
	elseif(stristr($tespit2,"Chrome")) { $tarayici="Google Chrome"; }
	elseif(stristr($tespit2,"Safari")) { $tarayici="Safari"; }
	elseif(stristr($tespit2,"Opera")) { $tarayici="Opera"; }
	else {$tarayici="Bilinmiyor ?";}
	return $tarayici;
}

?>