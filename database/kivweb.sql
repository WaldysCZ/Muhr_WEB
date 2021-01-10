-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 10. led 2021, 02:36
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `kivweb`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `muhrd_nabidka`
--

CREATE TABLE `muhrd_nabidka` (
  `id_nabidka` int(11) NOT NULL,
  `id_uzivatel` int(11) NOT NULL,
  `lokace` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `info` longtext COLLATE utf8_czech_ci NOT NULL,
  `hodnoceni` decimal(5,1) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `muhrd_nabidka`
--

INSERT INTO `muhrd_nabidka` (`id_nabidka`, `id_uzivatel`, `lokace`, `info`, `hodnoceni`, `visible`) VALUES
(1, 3, 'Plzeň', 'Ahoj jsem ...', '4.5', 1),
(2, 4, 'Plzeň', 'Zdravím vás yo yo', '3.5', 1),
(3, 5, 'Praha', 'HAHA', '1.0', 1),
(4, 3, 'Koterov', 'No jo no', '3.0', 1),
(7, 5, 'Plzen', 'AAAA', '0.0', 1),
(72, 5, 'Plzen', 'AAAAAA', '3.0', 1),
(74, 3, 'Aš', 'AAA', '3.5', 1),
(75, 3, 'Olomouc', 'Olomouc', '0.0', 0),
(76, 3, 'Stříbro', 'I do stříbra', '0.0', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `muhrd_nabidka_has_typy_pomoci`
--

CREATE TABLE `muhrd_nabidka_has_typy_pomoci` (
  `muhrd_nabidka_id_nabidka` int(11) NOT NULL,
  `muhrd_typy_pomoci_id_pomoci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `muhrd_nabidka_has_typy_pomoci`
--

INSERT INTO `muhrd_nabidka_has_typy_pomoci` (`muhrd_nabidka_id_nabidka`, `muhrd_typy_pomoci_id_pomoci`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(7, 1),
(7, 2),
(7, 4),
(72, 1),
(72, 2),
(72, 3),
(72, 4),
(74, 1),
(74, 2),
(74, 3),
(75, 2),
(75, 3),
(75, 4),
(76, 3),
(76, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `muhrd_pravo`
--

CREATE TABLE `muhrd_pravo` (
  `id_pravo` int(11) NOT NULL,
  `nazev` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `vaha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `muhrd_pravo`
--

INSERT INTO `muhrd_pravo` (`id_pravo`, `nazev`, `vaha`) VALUES
(1, 'SuperAdmin', 20),
(2, 'Admin', 10),
(3, 'Pomocník', 5),
(4, 'Uživatel', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `muhrd_typy_pomoci`
--

CREATE TABLE `muhrd_typy_pomoci` (
  `id_pomoci` int(11) NOT NULL,
  `jmeno` varchar(20) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `muhrd_typy_pomoci`
--

INSERT INTO `muhrd_typy_pomoci` (`id_pomoci`, `jmeno`) VALUES
(1, 'Nákupy'),
(2, 'Společnost'),
(3, 'Telefonáty'),
(4, 'Dovoz'),
(5, 'Doučování'),
(6, 'Obecná Pomoc');

-- --------------------------------------------------------

--
-- Struktura tabulky `muhrd_uzivatel`
--

CREATE TABLE `muhrd_uzivatel` (
  `id_uzivatel` int(11) NOT NULL,
  `id_pravo` int(11) NOT NULL,
  `jmeno` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `telefon` varchar(25) COLLATE utf8_czech_ci DEFAULT NULL,
  `id_vybrana_nabidka` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `muhrd_uzivatel`
--

INSERT INTO `muhrd_uzivatel` (`id_uzivatel`, `id_pravo`, `jmeno`, `login`, `heslo`, `email`, `telefon`, `id_vybrana_nabidka`) VALUES
(1, 1, 'Majitel webu', 'admin', 'admin', 'muhrd@students.zcu.cz', NULL, NULL),
(2, 2, 'Admin 2', 'admin2', 'admin2', 'admin@email.com', NULL, NULL),
(3, 3, 'Dan Dafoe', 'ddfoe', '123', 'ddfoe@seznam.cz', '111 222 333', NULL),
(4, 3, 'Jan Donec', 'jdec', 'abc', 'jdec@gmail.com', '444 555 666', NULL),
(5, 3, 'Lada Nová', 'lnova', 'nova', 'lnova@email.cz', '777 888 999', NULL),
(6, 4, 'Tom Fanda', 'tfnda', 'fnda', 'tfnda@gmail.com', NULL, NULL),
(7, 4, 'Lukáš Dom', 'ldom', 'dom', 'ldom@seznam.cz', '000 000 000', NULL),
(8, 4, 'David Muhr', 'muhrd', 'lego22', 'muhrd@students.zcu.cz', '774 691 520', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `muhrd_nabidka`
--
ALTER TABLE `muhrd_nabidka`
  ADD PRIMARY KEY (`id_nabidka`);

--
-- Klíče pro tabulku `muhrd_nabidka_has_typy_pomoci`
--
ALTER TABLE `muhrd_nabidka_has_typy_pomoci`
  ADD PRIMARY KEY (`muhrd_nabidka_id_nabidka`,`muhrd_typy_pomoci_id_pomoci`),
  ADD KEY `fk_muhrd_nabidka_has_muhrd_typy_pomoci_muhrd_typy_pomoci1_idx` (`muhrd_typy_pomoci_id_pomoci`),
  ADD KEY `fk_muhrd_nabidka_has_muhrd_typy_pomoci_muhrd_nabidka1_idx` (`muhrd_nabidka_id_nabidka`);

--
-- Klíče pro tabulku `muhrd_pravo`
--
ALTER TABLE `muhrd_pravo`
  ADD PRIMARY KEY (`id_pravo`);

--
-- Klíče pro tabulku `muhrd_typy_pomoci`
--
ALTER TABLE `muhrd_typy_pomoci`
  ADD PRIMARY KEY (`id_pomoci`);

--
-- Klíče pro tabulku `muhrd_uzivatel`
--
ALTER TABLE `muhrd_uzivatel`
  ADD PRIMARY KEY (`id_uzivatel`),
  ADD KEY `fk_uzivatel_pravo_id_pravo` (`id_pravo`),
  ADD KEY `fk_uzivatel_nabidka_id_nabidka` (`id_vybrana_nabidka`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `muhrd_nabidka`
--
ALTER TABLE `muhrd_nabidka`
  MODIFY `id_nabidka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pro tabulku `muhrd_pravo`
--
ALTER TABLE `muhrd_pravo`
  MODIFY `id_pravo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `muhrd_uzivatel`
--
ALTER TABLE `muhrd_uzivatel`
  MODIFY `id_uzivatel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `muhrd_nabidka_has_typy_pomoci`
--
ALTER TABLE `muhrd_nabidka_has_typy_pomoci`
  ADD CONSTRAINT `fk_muhrd_nabidka_has_muhrd_typy_pomoci_muhrd_nabidka1` FOREIGN KEY (`muhrd_nabidka_id_nabidka`) REFERENCES `muhrd_nabidka` (`id_nabidka`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_muhrd_nabidka_has_muhrd_typy_pomoci_muhrd_typy_pomoci1` FOREIGN KEY (`muhrd_typy_pomoci_id_pomoci`) REFERENCES `muhrd_typy_pomoci` (`id_pomoci`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `muhrd_uzivatel`
--
ALTER TABLE `muhrd_uzivatel`
  ADD CONSTRAINT `fk_uzivatel_pravo_id_pravo` FOREIGN KEY (`id_pravo`) REFERENCES `muhrd_pravo` (`id_pravo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
