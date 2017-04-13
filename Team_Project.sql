SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `Games` (
  `Game_id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Year_Released` int(11) NOT NULL,
  `Number_of_Characters` int(11) NOT NULL,
  `Platform(s)` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Average_Play_Time` tinyint(4) NOT NULL,
  `Cost` int(4) NOT NULL,
  PRIMARY KEY (`Game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Games` (`Game_id`, `Name`, `Year_Released`, `Number_of_Characters`, `Platform(s)`, `Average_Play_Time`, `Cost`) VALUES
(1, 'Tales of Berseria', 2016, 6, 'Playstation 4', 70, 50),
(2, 'Tales of Xillia', 2011, 6, 'Play Station 3', 51, 30),
(3, 'Tales of Symphonia', 2003, 9, 'Gamecube', 66, 20),
(4, 'Tales of Destiny', 1997, 9, 'Playstation', 37, 85),
(5, 'Tales of Vesperia', 2008, 9, 'Playstation 3', 72, 25);

CREATE TABLE IF NOT EXISTS `Main_Characters` (
  `name_id` int(11) NOT NULL,
  `first_Name` varchar(11) NOT NULL,
  `last_Name` varchar(11) DEFAULT NULL,
  `Game_id` int(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Age` int(11) NOT NULL,
  `Hometown` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`name_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Main_Characters` (`name_id`, `first_Name`, `last_Name`, `Game_id`, `Gender`, `Age`, `Hometown`) VALUES
(1, 'Velvet', 'Crowe', 1, 'F', 19, 'Aball'),
(2, 'Laphicet', NULL, 1, 'M', 10, NULL),
(3, 'Eizen', NULL, 1, 'M', 30, NULL),
(4, 'Rokurou', 'Rangetsu', 1, 'M', 22, NULL),
(5, 'Magilou', 'Mayvin', 1, 'F', 25, NULL),
(6, 'Eleanor', 'Hume', 1, 'F', 18, NULL),
(7, 'Jude', 'Mathis', 2, 'M', 15, 'Leronde'),
(8, 'Milla', 'Maxwell', 2, 'F', 20, 'Nia Khera'),
(9, 'Alvin', 'Svent', 2, 'M', 25, 'Trigleph'),
(10, 'Leia', 'Rolando', 2, 'F', 15, 'Leronde'),
(11, 'Elize', 'Lutus', 2, 'F', 12, 'Mon Highlan'),
(12, 'Rowen', 'Ilbert', 2, 'M', 62, 'Sharilton'),
(13, 'Lloyd', 'Irving', 3, 'M', 17, 'Iselia'),
(14, 'Colette', 'Brunel', 3, 'F', 16, 'Iselia'),
(15, 'Genis', 'Sage', 3, 'M', 12, 'Heimdall'),
(16, 'Raine', 'Sage', 3, 'F', 23, 'Heimdall'),
(17, 'Kratos', 'Aurion', 3, 'M', 28, 'Meltokio'),
(18, 'Sheena', 'Fujibayashi', 3, 'F', 19, 'Mizuho'),
(19, 'Zelos', 'Wilder', 3, 'M', 22, 'Meltokio'),
(20, 'Presea', 'Combatir', 3, 'F', 12, 'Ozette'),
(21, 'Regal', 'Bryant', 3, 'M', 33, 'Altamira'),
(22, 'Stahn', 'Aileron', 4, 'M', 19, 'Lienea'),
(23, 'Rutee', 'Katrea', 4, 'F', 18, 'Cresta'),
(24, 'Leon', 'Magnus', 4, 'M', 16, 'Darilsheid'),
(25, 'Philia', 'Felice', 4, 'F', 19, 'Straylize T'),
(26, 'Garr', 'Kelvin', 4, 'M', 23, 'Heidelberg'),
(27, 'Mary', 'Argent', 4, 'F', 24, 'Cyril'),
(28, 'Chelsea', 'Torn', 4, 'F', 14, NULL),
(29, 'Karyl', 'Sheeden', 4, 'M', 26, 'Sheeden'),
(30, 'Brusier', 'Khang', 4, 'M', 39, 'Neuestadt'),
(31, 'Yuri', 'Lowell', 5, 'M', 21, 'Zaphias'),
(32, 'Estellise', 'Heurassein', 5, 'F', 18, 'Zaphias'),
(33, 'Flynn', 'Scifo', 5, 'M', 21, 'Zaphias'),
(34, 'Repede', NULL, 5, 'M', 4, NULL),
(35, 'Karol', 'Capel', 5, 'M', 12, 'Dahngrest'),
(36, 'Rita', 'Mordio', 5, 'F', 15, 'Aspio'),
(37, 'Raven', 'Atomais', 5, 'M', 35, 'Dahngrest'),
(38, 'Judith', NULL, 5, 'F', 19, 'Temza'),
(39, 'Patty', 'Fleur', 5, 'F', 14, 'Capua Torim');

CREATE TABLE IF NOT EXISTS `Worlds` (
  `World_id` int(11) NOT NULL,
  `World_Name` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Number_of_Towns` int(11) NOT NULL,
  `Game_id` int(1) NOT NULL,
  `Capital_City` varchar(15) NOT NULL,
  PRIMARY KEY (`World_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Worlds` (`World_id`, `World_Name`, `Number_of_Towns`, `Game_id`, `Capital_City`) VALUES
(1, 'Desolation', 10, 1, 'Loegres'),
(2, 'Rieze Maxia', 12, 2, 'Kanbalar'),
(3, 'Sylvarant', 16, 3, 'Palmacosta'),
(4, 'Er''ther Lands', 17, 4, 'Darilsheid'),
(5, 'Terca Lumireis', 13, 5, 'Zaphias');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
