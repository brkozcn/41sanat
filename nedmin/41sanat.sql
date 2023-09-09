-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Oca 2023, 23:22:24
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `41sanat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(500) NOT NULL,
  `ayar_telefon` varchar(50) NOT NULL,
  `ayar_siteurl` varchar(255) NOT NULL,
  `ayar_title` varchar(100) NOT NULL,
  `ayar_description` varchar(500) NOT NULL,
  `ayar_keywords` varchar(500) NOT NULL,
  `ayar_author` varchar(255) NOT NULL,
  `ayar_facebook` varchar(255) NOT NULL,
  `ayar_twitter` varchar(255) NOT NULL,
  `ayar_instagram` varchar(255) NOT NULL,
  `ayar_footer` varchar(500) NOT NULL,
  `ayar_adres` varchar(500) NOT NULL,
  `ayar_mail` varchar(500) NOT NULL,
  `ayar_bmail` varchar(255) NOT NULL,
  `ayar_recapctha` varchar(500) NOT NULL,
  `ayar_googlemap` varchar(500) NOT NULL,
  `ayar_analytics` varchar(255) NOT NULL,
  `ayar_smtphost` varchar(500) NOT NULL,
  `ayar_smtpuser` varchar(500) NOT NULL,
  `ayar_smtppass` varchar(500) NOT NULL,
  `ayar_smtpport` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_telefon`, `ayar_siteurl`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_facebook`, `ayar_twitter`, `ayar_instagram`, `ayar_footer`, `ayar_adres`, `ayar_mail`, `ayar_bmail`, `ayar_recapctha`, `ayar_googlemap`, `ayar_analytics`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppass`, `ayar_smtpport`) VALUES
(1, 'images/logo.png', '0555-555-55-55', 'localhost', 'Infinity SEO Web', 'SEO Hizmetlerimiz Başlamıştır.', 'SEO, Hizmet', 'Brkozcn', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.insastagram.com', 'Infinity SEO Websites & Design by Brkozcn', 'Gölcük/Kocaeli', 'info@mail.com', 'basvuru@mail.com', '', 'Google Map Apinizi Giriniz', 'Analytics Apinizi Giriniz', 'smtp Host Gir', 'smtp Kullanıcı Adınızı Giriniz', 'smtp Kullanıcı Şifrenizi Giriniz', 'smtp Port Numarasını Giriniz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(255) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_video` varchar(255) NOT NULL,
  `hakkimizda_vizyon` text NOT NULL,
  `hakkimizda_misyon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(1, 'Hakkımızda BAŞLIK', 'Hakkımızda İçerik', 'Hakkımızda Video', 'Hakkımızda Vizyon', 'Hakkımızda Misyon');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
