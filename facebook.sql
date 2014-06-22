-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Haz 2014, 15:58:09
-- Sunucu sürümü: 5.6.16
-- PHP Sürümü: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `webchat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `girisler`
--

CREATE TABLE IF NOT EXISTS `girisler` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `tarayici` varchar(255) NOT NULL,
  `ipadresi` varchar(255) NOT NULL,
  `sistem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` bigint(18) unsigned NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(255) NOT NULL,
  `adsoyad` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL,
  `dogumgunu` varchar(255) NOT NULL,
  `cinsiyet` varchar(255) NOT NULL,
  `bolge` varchar(255) NOT NULL,
  `tarih` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
