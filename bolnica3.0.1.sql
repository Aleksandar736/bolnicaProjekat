-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 01:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolnica`
--
CREATE DATABASE IF NOT EXISTS `bolnica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bolnica`;

-- --------------------------------------------------------

--
-- Table structure for table `bolest`
--

CREATE TABLE `bolest` (
  `bolest_id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `opis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `bolest`:
--

--
-- Dumping data for table `bolest`
--

INSERT INTO `bolest` (`bolest_id`, `naziv`, `opis`) VALUES
(1, 'Konjuktivitis', 'Bolest oka'),
(2, 'Kandida', 'Kozna bolest'),
(3, 'Bronhitis', 'Bolest grla'),
(4, 'Anemija', 'Poremecaj krvi'),
(5, 'Tuberkuloza', 'Bolest pluca'),
(6, 'Dijabetes', 'Endokrinolosko oboljenje');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `failed_jobs`:
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(60) NOT NULL,
  `prezime` varchar(60) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `uloga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `korisnik`:
--   `uloga_id`
--       `uloge` -> `id`
--

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `email`, `password`, `uloga_id`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', '$2y$10$H8fYALd9DqO/ixIvSK6bmu9fg9OakTKSliQbIgQI1a02C/5vMkLsK', 1),
(2, 'Dragan', 'Dragic', 'dragan@mail.com', '$2y$10$NlQL0s0TMjGUyI9InXvnw.r7TEANi23LcI9mypWG8lTGWCLtu6hTS', 2),
(3, 'Pera', 'Peric', 'pera@mail.com', '$2y$10$SCBObKVYpue.NQfYDIY3eOm73O6c..K41MtbRwAVwa6PGozFQ4eAe', 3),
(4, 'Sima', 'Simic', 'sima@mail.com', '$2y$10$xPwZ9wZ8Cn.m4P1WlsZo5ecqwUBYW8L5M1bqECDhwEjDsn6UUX3im', 2),
(5, 'Maja', 'Mitrovic', 'maja@mail.com', '$2y$10$odVLS.PfWdzn8iF.BPsA0.zeuWRqZZLJwCWKpX2OJLG8LIlDexqeW', 3),
(8, 'Marko', 'Markovic', 'marko@mail.com', '$2y$10$9Hp4qLsoD1eWHp4JlgQyPuG8PdtOYKdKgAGJ3apwNL2QMQ7ohtq2y', 2),
(9, 'Petar', 'Petrovic', 'petar@mail.com', '$2y$10$LTVFnKpIhBSm8.J2wFH6i.CAobC2imOoSu0trPoud5uWHA2igAz9G', 3),
(11, 'Ivana', 'Ivanovic', 'ivana@mail.com', '$2y$10$ZoWYhptpE4zAtjziRdLYNedsYX.IEd7xJwuMCF82sxUoNbo.xERVG', 2),
(12, 'Ivan', 'Ivic', 'ivan@mail.com', '$2y$10$I/E6S5WG80Hk8NA3KgmwxehAUNy43xDP0vX/c8KmcjvEzDuAmwQ4q', 3),
(14, 'administrator', 'adminovic', 'administrator@mail.com', '$2y$10$ffim3FDb82U2MqDmgck.DetSRQNp3GbZmD.7hqFNFUkUlTx02klWu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lekovi`
--

CREATE TABLE `lekovi` (
  `lek_id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `kolicina_na_zalihama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `lekovi`:
--

--
-- Dumping data for table `lekovi`
--

INSERT INTO `lekovi` (`lek_id`, `naziv`, `kolicina_na_zalihama`) VALUES
(3, 'BRUFEN 500MG', 94),
(4, 'DIKLOFEN', 95),
(5, 'ANDOL', 95),
(6, 'VITAMIN C', 98),
(7, 'PANTENOL', 100),
(8, 'BROMAZEPAM', 98);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `migrations`:
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pacijent`
--

CREATE TABLE `pacijent` (
  `pacijent_id` int(11) NOT NULL,
  `ime_pacijenta` varchar(60) NOT NULL,
  `prezime_pacijenta` varchar(90) NOT NULL,
  `email_pacijenta` varchar(100) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `pol` enum('muski','zenski','ostalo','') NOT NULL COMMENT '1-muski,2-zenski,3-ostalo',
  `adresa` varchar(255) NOT NULL,
  `dodeljeni_lekar_id` int(11) NOT NULL,
  `datum_dodele_lekara` date NOT NULL,
  `lbo` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `pacijent`:
--

--
-- Dumping data for table `pacijent`
--

INSERT INTO `pacijent` (`pacijent_id`, `ime_pacijenta`, `prezime_pacijenta`, `email_pacijenta`, `datum_rodjenja`, `pol`, `adresa`, `dodeljeni_lekar_id`, `datum_dodele_lekara`, `lbo`) VALUES
(1, 'Misa', 'Misic', 'misa@gmail.com', '1980-12-12', 'muski', 'Francuska 12', 2, '2005-01-01', 23587253721),
(2, 'Rade', 'Radic', 'rade@gmail.com', '1998-11-11', 'muski', 'Ustanicka 5', 2, '2010-02-02', 12323457643),
(3, 'Uros', 'Urosevic', 'uros@yahoo.com', '1974-10-10', 'muski', 'Prvomajska 23', 3, '2015-03-03', 34548374623),
(4, 'Mira', 'Miric', 'mira.pacijent@live.com', '1965-09-09', 'zenski', 'Takovska 7', 3, '2018-04-04', 12345678932),
(5, 'Nadezda', 'Nikolic', 'nadezda@mail.com', '1970-12-04', 'zenski', 'Radnicka 9', 8, '2019-01-15', 43567898234),
(6, 'Dragana', 'Markovic', 'draganamarkovic@mail.com', '1960-12-02', 'zenski', 'Nemanjina 5', 12, '2017-12-01', 56765433234);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `password_resets`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pregledi`
--

CREATE TABLE `pregledi` (
  `pregledi_id` int(11) NOT NULL,
  `pacijent_id` int(11) NOT NULL,
  `doktor_id` int(11) NOT NULL,
  `bolest_id` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `opis` varchar(255) NOT NULL,
  `uput_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `pregledi`:
--   `doktor_id`
--       `korisnik` -> `korisnik_id`
--   `uput_id`
--       `spec_pregled` -> `uput_id`
--   `pacijent_id`
--       `pacijent` -> `pacijent_id`
--   `bolest_id`
--       `bolest` -> `bolest_id`
--

--
-- Dumping data for table `pregledi`
--

INSERT INTO `pregledi` (`pregledi_id`, `pacijent_id`, `doktor_id`, `bolest_id`, `datum`, `opis`, `uput_id`) VALUES
(27, 1, 3, 1, '2020-01-20 20:18:35', 'It is a long established fact that a reader will be distracted\r\nby the readable content of a page when looking at its layout. \r\nIt is a long established fact that a reader will be distracted\r\nby the readable content of a page when looking at its layout.', 1),
(28, 2, 3, 2, '2019-12-29 14:07:13', 'Many desktop publishing packages and web page editors now use \r\nLorem Ipsum as their default model text, and a search for \'lorem ipsum\' \r\nwill uncover many web sites still in their infancy.', 7),
(29, 3, 3, 3, '2019-12-29 14:07:55', 'Various versions have evolved over the years, sometimes by accident,\r\nsometimes on purpose (injected humour and the like).', 2),
(30, 4, 2, 4, '2019-12-29 14:09:25', 'There are many variations of passages of Lorem Ipsum available, \r\nbut the majority have suffered alteration in some form, by injected humour, \r\nor randomised words\r\nwhich don\'t look even slightly believable.', 3),
(87, 1, 8, 3, '2019-12-29 14:00:21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum is simply \r\ndummy text of the printing and typesetting industry. \r\nLorem Ipsum is simply dummy text of the printing and typesetting industry.', 5),
(88, 2, 12, 4, '2019-12-29 14:13:46', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text.\r\n If you are going to use a passage of Lorem Ipsum.', 4),
(89, 3, 8, 5, '2019-12-29 14:15:39', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined\r\nchunks as necessary, making this the first true generator on the Internet.\r\nAll the Lorem Ipsum generators on the Internet tend to repeat predefined\r\nchunks as necessary.', 6),
(90, 5, 12, 4, '2019-12-29 14:30:15', 'The generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `prepisani_lekovi`
--

CREATE TABLE `prepisani_lekovi` (
  `id` int(11) NOT NULL,
  `pregled_id` int(11) NOT NULL,
  `lek_id` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `prepisani_lekovi`:
--   `pregled_id`
--       `pregledi` -> `pregledi_id`
--   `lek_id`
--       `lekovi` -> `lek_id`
--

--
-- Dumping data for table `prepisani_lekovi`
--

INSERT INTO `prepisani_lekovi` (`id`, `pregled_id`, `lek_id`, `kolicina`) VALUES
(76, 87, 5, 2),
(83, 28, 4, 2),
(84, 29, 5, 2),
(86, 30, 4, 2),
(88, 89, 8, 3),
(90, 90, 6, 2),
(98, 27, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `spec_pregled`
--

CREATE TABLE `spec_pregled` (
  `uput_id` int(11) NOT NULL,
  `specijalista` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `spec_pregled`:
--

--
-- Dumping data for table `spec_pregled`
--

INSERT INTO `spec_pregled` (`uput_id`, `specijalista`) VALUES
(1, ''),
(2, 'ORL'),
(3, 'DERMATOLOGIJA'),
(4, 'PEDIJATRIJA'),
(5, 'LABORATORIJA'),
(6, 'NEUROLOGIJA'),
(7, 'KARDIOLOGIJA');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `uloge`:
--

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'asistent'),
(3, 'doktor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bolest`
--
ALTER TABLE `bolest`
  ADD PRIMARY KEY (`bolest_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `lekovi`
--
ALTER TABLE `lekovi`
  ADD PRIMARY KEY (`lek_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacijent`
--
ALTER TABLE `pacijent`
  ADD PRIMARY KEY (`pacijent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pregledi`
--
ALTER TABLE `pregledi`
  ADD PRIMARY KEY (`pregledi_id`),
  ADD KEY `doktor` (`doktor_id`),
  ADD KEY `bolest` (`bolest_id`),
  ADD KEY `uput_id` (`uput_id`),
  ADD KEY `pacijent_id` (`pacijent_id`);

--
-- Indexes for table `prepisani_lekovi`
--
ALTER TABLE `prepisani_lekovi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregled_id` (`pregled_id`),
  ADD KEY `lek_id` (`lek_id`);

--
-- Indexes for table `spec_pregled`
--
ALTER TABLE `spec_pregled`
  ADD PRIMARY KEY (`uput_id`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bolest`
--
ALTER TABLE `bolest`
  MODIFY `bolest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lekovi`
--
ALTER TABLE `lekovi`
  MODIFY `lek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pacijent`
--
ALTER TABLE `pacijent`
  MODIFY `pacijent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pregledi`
--
ALTER TABLE `pregledi`
  MODIFY `pregledi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `prepisani_lekovi`
--
ALTER TABLE `prepisani_lekovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `spec_pregled`
--
ALTER TABLE `spec_pregled`
  MODIFY `uput_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloge` (`id`);

--
-- Constraints for table `pregledi`
--
ALTER TABLE `pregledi`
  ADD CONSTRAINT `pregledi_ibfk_3` FOREIGN KEY (`doktor_id`) REFERENCES `korisnik` (`korisnik_id`),
  ADD CONSTRAINT `pregledi_ibfk_4` FOREIGN KEY (`uput_id`) REFERENCES `spec_pregled` (`uput_id`),
  ADD CONSTRAINT `pregledi_ibfk_5` FOREIGN KEY (`pacijent_id`) REFERENCES `pacijent` (`pacijent_id`),
  ADD CONSTRAINT `pregledi_ibfk_6` FOREIGN KEY (`bolest_id`) REFERENCES `bolest` (`bolest_id`);

--
-- Constraints for table `prepisani_lekovi`
--
ALTER TABLE `prepisani_lekovi`
  ADD CONSTRAINT `prepisani_lekovi_ibfk_1` FOREIGN KEY (`pregled_id`) REFERENCES `pregledi` (`pregledi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prepisani_lekovi_ibfk_2` FOREIGN KEY (`lek_id`) REFERENCES `lekovi` (`lek_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
