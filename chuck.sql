-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 02. 05 2017 kl. 09:52:12
-- Serverversion: 10.1.21-MariaDB
-- PHP-version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webudvikling`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `chuck`
--

CREATE TABLE `chuck` (
  `id` int(10) UNSIGNED NOT NULL,
  `joke` text COLLATE utf8_danish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Data dump for tabellen `chuck`
--

INSERT INTO `chuck` (`id`, `joke`) VALUES
(1, 'Chuck Norris was bitten by a cobra and after five days of excruciating pain... the cobra died.'),
(2, 'He who laughs last, laughs best. He who laughs at Chuck Norris, it\'s definitely his last laugh.'),
(3, 'The easiest way to determine Chuck Norris\'s age is to cut him in half and count the rings.'),
(4, 'Chuck Norris is currently suing NBC, claiming Law and Order are trademarked names for his left and right legs.'),
(5, 'Chuck Norris doesn\'t dial the wrong number. You answered the wrong phone.\r\n'),
(6, 'Chuck Norris knows Victoria\'s secret.'),
(7, 'If Chuck Norris was a Spartan in the movie 300, the movie would be called 1.'),
(8, 'When Chuck Norris turned 18, his parents moved out.'),
(9, 'When Chuck Norris swims in the ocean, the sharks are in a steel cage.'),
(10, 'Chuck Norris will never have a heart attack. His heart isn\'t nearly foolish enough to attack him.'),
(11, 'Chuck Norris once kicked a horse in the chin. Its descendants today are known as giraffes.'),
(12, 'Chuck Norris doesn\'t breathe air. He holds air hostage.'),
(13, 'Chuck Norris can delete the Recycling Bin.'),
(14, 'Chuck Norris has already been to Mars. That\'s why there are no signs of life.'),
(15, 'Chuck Norris can kill two stones with one bird.'),
(16, 'Chuck Norris\'s calendar goes straight from March 31st to April 2. No one fools Chuck Norris.'),
(17, 'Chuck Norris wears sunglasses so that his eyes won\'t hurt the sun.'),
(18, 'If you see Chuck Norris crying he will grant you a wish, if your wish is dying.'),
(19, 'When Chuck Norris works out he doesn\'t get stronger, the machine does.'),
(20, 'Chuck Norris does not sleep; he waits.');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `chuck`
--
ALTER TABLE `chuck`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `chuck`
--
ALTER TABLE `chuck`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
