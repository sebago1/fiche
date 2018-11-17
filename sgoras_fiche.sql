-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lis 2018, 20:33
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `fiche`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `known`
--

CREATE TABLE `known` (
  `id` int(11) NOT NULL,
  `polski` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `angielski` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wymowa` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `known`
--

INSERT INTO `known` (`id`, `polski`, `angielski`, `wymowa`) VALUES
(1, 'kot', 'cat', 'kat'),
(2, 'CIEZAROWKA', 'TRUCK', 'TRAK'),
(3, 'KON', 'HORSE', 'HORS'),
(4, 'DOM', 'HOUSE', 'HAUS'),
(5, 'LYZKA', 'SPOON', 'SPUN'),
(6, 'ISC', 'GO', 'GOL'),
(7, 'KOLO', 'WHEEL', 'HIL'),
(8, 'TELEWIZOR', 'TV', 'TIWI');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slowkabeta`
--

CREATE TABLE `slowkabeta` (
  `id` int(11) NOT NULL,
  `polski` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `angielski` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wymowa` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `slowkabeta`
--

INSERT INTO `slowkabeta` (`id`, `polski`, `angielski`, `wymowa`) VALUES
(1, 'Pies', 'Dog', 'Dog'),
(2, 'Kot', 'Cat', 'Kat'),
(3, 'Rysowac', 'Draw', 'Dral'),
(4, 'marionetka', 'puppet', 'papet'),
(5, 'Tajny', 'Undercover', 'Andekowe'),
(6, 'sklonny', 'willing', 'wiling'),
(7, 'przypuszczac', 'suppose', 'supous'),
(8, 'wytrzymalosc', 'strength', 'stren'),
(9, 'zaniepokojony', 'concerned', 'kansend'),
(10, 'udowodniony', 'proven', 'pruwen'),
(11, 'przekraczac', 'exceed', 'eksiid'),
(12, 'skrecone', 'twisted', 'tlisted'),
(13, 'zarost', 'beard', 'berd'),
(14, 'kokarda', 'bow', 'bol');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `polski` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `angielski` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wymowa` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `words`
--

INSERT INTO `words` (`id`, `polski`, `angielski`, `wymowa`) VALUES
(1, 'robic', 'do', 'du'),
(2, 'koza', 'goat', 'got'),
(3, 'dziecko', 'baby', 'bejbi'),
(4, 'ryba', 'fish', 'fisz'),
(5, 'biec', 'run', 'ran');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `known`
--
ALTER TABLE `known`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `slowkabeta`
--
ALTER TABLE `slowkabeta`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
