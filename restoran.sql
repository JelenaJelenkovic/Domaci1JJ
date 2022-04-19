-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 03:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domaci_zadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `jela`
--

CREATE TABLE `jela` (
  `ID_Jela` int(11) NOT NULL,
  `Naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Cena` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Kategorija` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jela`
--

INSERT INTO `jela` (`ID_Jela`, `Naziv`, `Cena`, `Kategorija`) VALUES
(2, 'Sendvič šunka', '200,00 din.', 'Doručak'),
(3, 'Sendvič pršuta', '230,00 din.', 'Doručak'),
(4, 'Domaći doručak', '270,00 din.', 'Doručak'),
(6, 'Slatki doručak ', '170,00 din.', 'Doručak'),
(7, 'Pita', '120,00 din.', 'Doručak'),
(8, 'Proja', '120,00 din.', 'Doručak'),
(9, 'Uštipci', '120,00 din.', 'Doručak'),
(10, 'Cezar salata', '300,00 din.', 'Salate'),
(12, 'Grčka salata', '100,00 din.', 'Salate'),
(13, 'Mešana salata', '100,00 din.', 'Salate'),
(14, 'Mocarela salata', '200,00 din.', 'Salate'),
(15, 'Brauni', '170,00 din.', 'Desert'),
(16, 'Čokoladni mafin', '150,00 din.', 'Desert'),
(17, 'Čokoladni mafin sa višnjom', '160,00 din', 'Desert'),
(18, 'Nutela, plazma', '150,00 din.', 'Desert-palačinke'),
(19, 'Nutela, plazma, višnja', '160,00 din.', 'Desert-palačinke'),
(20, 'Američke palačinke', '170,00 din.', 'Desert'),
(21, 'Plata sireva za dve osobe', '400,00 din.', 'Meze'),
(22, 'Suhomesnato za dve osobe', '350,00 din.', 'Meze'),
(23, 'Brusketi', '170,00 din.', 'Meze'),
(24, 'Burger', '350,00 din.', 'Glavno jelo'),
(26, 'Bolonjeze', '370,00 din.', 'Glavno jelo'),
(27, 'Njoke-4 vrste sira', '360,00 din.', 'Glavno jelo'),
(28, 'Paradajz čorba', '160,00 din.', 'Toplo predjelo'),
(29, 'Pileće belo meso na žaru', '350,00 din.', 'Glavno jelo'),
(30, 'Pohovani pileći štapići', '360,00 din.', 'Glavno jelo'),
(31, 'Dimljena kobasica', '400,00 din.', 'Glavno jelo'),
(32, 'Dimljeni pileći batak na pireu', '400,00 din.', 'Glavno jelo'),
(33, 'Pomfrit', '120,00 din.', 'Prilog'),
(34, 'Piletina u sosu od pečuraka', '320,00 din.', 'Glavno jelo');

-- --------------------------------------------------------

--
-- Table structure for table `pica`
--

CREATE TABLE `pica` (
  `ID_Pica` int(9) NOT NULL,
  `Naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Cena` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Kategorija` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pica`
--

INSERT INTO `pica` (`ID_Pica`, `Naziv`, `Cena`, `Kategorija`) VALUES
(1, 'Voćni čaj', '100,00 din.', 'Topli napici'),
(3, 'Espresso', '110,00 din.', 'Kafe'),
(4, 'Espresso sa mlekom', '120,00 din.', 'Kafe'),
(5, 'Cappuccino', '120,00 din.', 'Kafe'),
(6, 'Kafe late', '140,00 din.', 'Kafe'),
(7, 'Neskafa', '140,00 din.', 'Kafe'),
(8, 'Moka kafa', '160,00 din.', 'Kafe'),
(9, 'Topla čokolada (crna)', '140,00 din.', 'Topli napici'),
(10, 'Topla čokolada (bela)', '140,00 din.', 'Topli napici'),
(11, 'Plazma šejk', '170,00 din.', 'Kafe'),
(12, 'Biljni čaj', '100,00 din.', 'Topli napici'),
(13, 'Rosa 0.33l', '100,00 din.', 'Vode'),
(14, 'Rosa 0,75l', '130,00 din.', 'Vode'),
(15, 'Devils Ice Tea', '250,00 din.', 'Kokteli'),
(16, 'Long Island Ice Tea ', '250,00 din.', 'Kokteli'),
(17, 'Maitai', '250,00 din.', 'Kokteli'),
(18, 'Mohito', '220,00 din', 'Kokteli'),
(19, 'Crveno vino-čaša', '270,00 din.', 'Vina'),
(20, 'Belo vino-čaša', '270,00 din.', 'Vina'),
(21, 'Penušavo vino-čaša', '300,00 din.', 'Vina'),
(22, 'Crveno vino-flaša', '1800,00 din.', 'Vina'),
(23, 'Belo vino-flaša', '1900,00 din.', 'Vina'),
(24, 'Penušavo vino-flaša', '2000,00 din.', 'Vina'),
(25, 'Tekila', '200,00 din.', 'Alkoholna pića'),
(26, 'Vodka', '220,00 din.', 'Alkoholna pića'),
(27, 'Džin', '210,00 din.', 'Alkoholna pića'),
(28, 'Pelinkovac', '140,00 din.', 'Alkoholna pića'),
(29, 'Zaječarsko-točeno 0,33', '120,00 din.', 'Piva'),
(30, 'Zaječarsko-točeno 0,5l', '150,00 din.', 'Piva'),
(31, 'Medovača', '160,00 din.', 'Alkoholna pića'),
(32, 'Višnjevača', '160,00 din.', 'Alkoholna pića'),
(33, 'Malinovača', '160,00 din.', 'Alkoholna pića'),
(34, 'Tuborg-flaširano', '180,00 din.', 'Piva'),
(35, 'Heineken', '190,00 din.', 'Piva'),
(36, 'Tuborg-točeno 0,33l', '160,00 din.', 'Piva'),
(37, 'Tuborg-točeno 0,5l', '180,00 din', 'Piva');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
