Facebook Giriş ve Kayıt Sistemi

Kullanımı:

1- İlk önce facebook uygulaması oluşturun.
2- Uygulamadan verilen bilgileri api.php dosyasına yazın.
3- ayar.php'deki veritabanı kısmını doldurun ve sql dosyasını veritabanınıza ekleyin.
4- index.php'deki

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

http://www.site.com/ kısma kendi site url'nizi yazın.
İŞLEM TAMAMDIR..

Özellikleri:

* Üyelik sisteminize kolaylıkla entegre edebilirsiniz.
* İlk facebook girişinde veritabanına facebooktan çektiği bilgileri kayıt eder ve her girişinde aynı üyelikle giriş yapar.
* Her girişte tarih, ipadresi ve facebook id'yi kayıt eder.
* Facebook üyeliğinden çıkış eklenmiştir.

Kodlama: Calimera
www.konsoldizayn.com
