-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2023 at 08:00 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `AdressID` int NOT NULL,
  `City` int DEFAULT NULL,
  `Gouvernorate` int DEFAULT NULL,
  `ClientID` int DEFAULT NULL,
  `PlaceDescription` varchar(255) DEFAULT NULL,
  `IslandID` int DEFAULT NULL,
  `CountryID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`AdressID`, `City`, `Gouvernorate`, `ClientID`, `PlaceDescription`, `IslandID`, `CountryID`) VALUES
(82, NULL, NULL, 1, 'Dimadjou Hamahamet', NULL, NULL),
(83, NULL, NULL, 1, 'Moroni Philips', NULL, NULL),
(84, NULL, NULL, NULL, 'moroni philips', NULL, NULL),
(85, NULL, NULL, NULL, 'dstfgrt', NULL, NULL),
(86, NULL, NULL, NULL, 'paris', NULL, NULL),
(87, NULL, NULL, NULL, 'dimadjou hamahemt', NULL, NULL),
(88, NULL, NULL, NULL, 'dimadjou hamahamet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int NOT NULL,
  `BrandName` varchar(255) NOT NULL,
  `CategoryID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`, `CategoryID`) VALUES
(1, '---Choisissez La Marque--', NULL),
(2, 'Ajouter Une Nouvelle Marque\r\n', NULL),
(3, 'All Brands', NULL),
(4, 'APPLE', 28),
(5, 'OPPO', 28),
(6, 'Xomi', 28),
(7, 'Tp-link', 22),
(8, 'Sonny', 28),
(10, 'Hp', 26),
(11, 'Dahua', NULL),
(12, 'tp-link', NULL),
(13, 'Cran Samsung', 27),
(14, 'Pepsi', 9),
(458, 'DVR Dahua', 41),
(459, 'Samsung', 28),
(460, 'LG', 57),
(461, 'Lenovo', 8),
(462, 'Lenovo', 26),
(463, 'test', 52),
(464, 'testtyh', 22),
(465, 'Sammsung', 28),
(466, 'Sammsung', 28),
(467, 'Sammsung', 26),
(469, 'Dahua', 39),
(470, 'Maison', 43),
(471, 'ups', 25),
(472, 'Nike', 53),
(473, 'HP', 8),
(474, 'HP', 37),
(475, 'sables', 59),
(476, 'Hik Vision', 41),
(477, 'Advision', 39),
(478, 'Riz', 9),
(479, 'Nestle', 9),
(480, 'Mitr Phol ', 60),
(481, 'PRINCESSE', 62),
(482, 'pasta de roma', 63),
(483, 'OKI', 64),
(484, 'Fanta', 65),
(485, 'AL USRAH ', 66),
(486, 'poulet', 67),
(487, 'Mara', 68),
(488, 'Hodari', 69),
(489, 'Global', 69),
(490, 'falcon cement', 69),
(491, 'fer', 70),
(492, 'Maçcon Renforcé', 71),
(493, 'Maçcon Renforcé', 71),
(494, 'Brouette', 72);

-- --------------------------------------------------------

--
-- Table structure for table `camera_resolution`
--

CREATE TABLE `camera_resolution` (
  `Resolution_ID` int NOT NULL,
  `Resolution_Value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camera_resolution`
--

INSERT INTO `camera_resolution` (`Resolution_ID`, `Resolution_Value`) VALUES
(7, 0.1),
(8, 0.5),
(9, 1),
(10, 1.1),
(11, 1.2),
(12, 1.3),
(13, 2),
(14, 2.1),
(16, 2.2),
(17, 3),
(18, 3.1),
(19, 3.2),
(20, 3.3),
(3, 5),
(2, 8),
(1, 12),
(5, 13),
(21, 15),
(4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carid` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carid`, `name`, `model`) VALUES
(1, 'TOYOTA', 2015),
(2, 'NISSAN', 2013),
(3, 'HUNDAI', 2010),
(4, 'RENAULT', 2009);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `CardID` int NOT NULL,
  `CardNumber` bigint NOT NULL,
  `CardName` varchar(255) NOT NULL,
  `ClientID` int DEFAULT NULL,
  `MM` tinyint NOT NULL,
  `YY` tinyint NOT NULL,
  `CVC` smallint NOT NULL,
  `DateSet` datetime NOT NULL,
  `Order_ID` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`CardID`, `CardNumber`, `CardName`, `ClientID`, `MM`, `YY`, `CVC`, `DateSet`, `Order_ID`) VALUES
(12, 526485612, 'Elbak Mahmoud', 1, 20, 65, 856, '2020-09-27 02:10:40', 541840042215);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Ordering` int DEFAULT NULL,
  `Visibilty` tinyint DEFAULT NULL,
  `AllowComment` tinyint NOT NULL DEFAULT '0',
  `AllowAds` tinyint NOT NULL DEFAULT '0',
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`, `Description`, `Ordering`, `Visibilty`, `AllowComment`, `AllowAds`, `Image`) VALUES
(1, '---Choisissez La Catégorie--', NULL, 0, 1, 1, 1, NULL),
(2, 'Ajouter Une Nouvelle Catégorie', 'Ajouter Une Nouvelle Catégorie', 1, 1, 1, 1, NULL),
(3, 'All Categories', '', 3, 0, 0, 0, 'cell.png'),
(7, 'Games', 'games', 1, 1, 1, 1, 'game-controller.png'),
(8, 'Computres', 'Computres items', 2, 0, 0, 0, 'computer-screen.png'),
(9, 'Food', NULL, NULL, NULL, 0, 0, NULL),
(21, 'Oil', NULL, NULL, NULL, 0, 0, NULL),
(22, 'Router', NULL, NULL, NULL, 0, 0, NULL),
(23, 'Papers', NULL, NULL, NULL, 0, 0, NULL),
(25, 'Ups', NULL, NULL, NULL, 0, 0, NULL),
(26, 'Laptop', NULL, NULL, NULL, 0, 0, NULL),
(27, 'Cran', NULL, NULL, NULL, 0, 0, NULL),
(28, 'Telephones', NULL, NULL, NULL, 0, 0, 'cell.png'),
(37, 'PC', NULL, NULL, NULL, 0, 0, NULL),
(38, 'Drinks', NULL, NULL, NULL, 0, 0, NULL),
(39, 'Cameras', NULL, NULL, NULL, 0, 0, NULL),
(41, 'DVR', NULL, NULL, NULL, 0, 0, NULL),
(42, 'Printer', NULL, NULL, NULL, 0, 0, NULL),
(43, 'Maison & Cuisine', NULL, NULL, NULL, 0, 0, NULL),
(52, 'Clothes', NULL, NULL, NULL, 0, 0, NULL),
(53, 'Sports', NULL, NULL, NULL, 0, 0, NULL),
(54, 'Jouets', NULL, NULL, NULL, 0, 0, NULL),
(57, 'Télé', NULL, NULL, NULL, 0, 0, NULL),
(58, 'Plastic', NULL, NULL, NULL, 0, 0, NULL),
(59, 'sables', NULL, NULL, NULL, 0, 0, NULL),
(60, 'Sucre', NULL, NULL, NULL, 0, 0, NULL),
(62, 'Sardine', NULL, NULL, NULL, 0, 0, NULL),
(63, 'Macaroni', NULL, NULL, NULL, 0, 0, NULL),
(64, 'LAIT', NULL, NULL, NULL, 0, 0, NULL),
(65, 'Boisson ', NULL, NULL, NULL, 0, 0, NULL),
(66, 'Riz', NULL, NULL, NULL, 0, 0, NULL),
(67, 'Poulet', NULL, NULL, NULL, 0, 0, NULL),
(68, 'Tomate', NULL, NULL, NULL, 0, 0, NULL),
(69, 'Cement', NULL, NULL, NULL, 0, 0, NULL),
(70, 'fer', NULL, NULL, NULL, 0, 0, NULL),
(71, 'Seau ', NULL, NULL, NULL, 0, 0, NULL),
(72, 'Brouette ', NULL, NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityID` int NOT NULL,
  `CityName` varchar(255) NOT NULL,
  `GovernorateID` int DEFAULT NULL,
  `IslandID` int DEFAULT NULL,
  `CountrID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityID`, `CityName`, `GovernorateID`, `IslandID`, `CountrID`) VALUES
(0, '----', 0, 0, 1),
(1, 'Dimadjjou', 1, 1, 1),
(2, 'Moroni', 2, 1, 1),
(5, 'Mitsamidou', 4, 2, 1),
(9, 'wela', 6, 1, 1),
(12, 'mwadja', 1, 1, 1),
(13, 'Paris', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `City` int DEFAULT NULL,
  `Island` int DEFAULT NULL,
  `Gouvernorate` int DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Country` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `IslandName` varchar(255) DEFAULT NULL,
  `Mobile` bigint DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL,
  `CodeChat` bigint DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`, `FullName`, `City`, `Island`, `Gouvernorate`, `Date`, `Country`, `IslandName`, `Mobile`, `Avatar`, `CodeChat`, `Adress`) VALUES
(1, 'elbak', '1234', 'elbak268@gmail.com', 'Elbak', 'Mahmoud', 'Elbak Mahmoud', 9, 1, 6, '2019-11-27', 'Comors', '', 586814659, 'theme/image/userImg/elbak/38323210707100558pm.JPG', 16578956, 'Dimadjou Hmahamet'),
(2, 'salim', '1234', 'Salim@hotmail.com', 'Salim', 'Mahmoud', '', 0, 0, 0, '2019-11-30', '', NULL, 0, 'theme/image/userImg/salim/22390200225045430am.JPG', 89468579, '0'),
(3, 'Amanata', '1234', 'Amanata@gmail.com', 'Amanata', 'Mahmoud', '', 1, 1, 1, '2019-12-17', 'Comoros', NULL, 335685, '', 568945368, '0'),
(18, 'salima', '1234', 'salim@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 752200605010450, '0'),
(19, 'Idriss', '1234', 'Idriss@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 405200605064324, '0'),
(20, 'salmata', '1234', 'elbak269@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 443200703022118, '0'),
(21, 'manzel', '1234', 'mazel@gmail.com', 'Manzel', 'Said', NULL, NULL, NULL, NULL, '2020-07-03', '', NULL, NULL, NULL, 0, '0'),
(22, 'Mahmoud', '1234', 'Mahmoud@gmail.com', 'Mahmoud', 'Said', NULL, NULL, NULL, NULL, '2020-07-03', '', NULL, NULL, NULL, 0, '0'),
(24, 'said', '1234', 'said@gmail.com', 'said', 'assoumani', NULL, NULL, NULL, NULL, '2020-07-04', '', NULL, NULL, 'theme/image/userImg/said/603755816424.jpg', 0, '0'),
(25, 'nokuthula', '1234', 'nokuthula@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, 'theme/image/userImg/nokuthula/9079200706033006am.JPG', 153200706125822, '0'),
(26, 'user', '1234', 'user@hotmail.com', 'user', 'client', 'Said Assoumani', NULL, NULL, NULL, '2020-11-15', '', NULL, NULL, NULL, 0, '0'),
(27, 'tets', '1234', 'test@gmail.com', NULL, NULL, 'Said Assoumani', NULL, NULL, NULL, '2020-11-15', '', NULL, NULL, NULL, 0, '0'),
(28, 'Saidassan', '1234', 'moindjiesalmata@gmail.com', NULL, NULL, 'Salimata MOINDJIE', NULL, NULL, NULL, '2020-11-17', '', NULL, 767866461, NULL, 0, '15 Mail Maucice de Fontenay 93120 La Courneuve'),
(29, 'comosyst', 'comosyst123', 'comosyst@gmail.com', NULL, NULL, 'comores system', NULL, NULL, NULL, '2021-05-24', '', NULL, 3249369, NULL, 0, 'Moroni Philips'),
(30, 'test3', '1234', 'test3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 45210703100138, NULL),
(31, 'user124', '1234', 'user@gamil.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, 'theme/image/userImg/user124/26970210706085119pm.JPG', 15210704065237, NULL),
(32, 'omar', '1234', 'omar@gmail.com', NULL, NULL, 'omar zainou', NULL, NULL, NULL, '2021-07-09', '', NULL, NULL, NULL, 0, NULL),
(33, 'SALMA', '12345', 'SALMA@GMAIL.COM', NULL, NULL, 'SALMATA SALMATA', NULL, NULL, NULL, '2021-07-10', '', NULL, NULL, NULL, 0, NULL),
(34, 'amah', '123', 'amah@gmail.com', NULL, NULL, 'mahmoud mahmoud', NULL, NULL, NULL, '2021-07-11', '', NULL, NULL, NULL, 0, NULL),
(35, 'amah mahmoudf', '11111', 'amanatam@gmail.com', NULL, NULL, 'mahmoud mahmoud', NULL, NULL, NULL, '2021-07-11', '', NULL, NULL, NULL, 0, NULL),
(36, 'zaidati269', '1234', 'zaidati@gmail.com', NULL, NULL, 'zaidati oumouri', NULL, NULL, NULL, '2023-01-26', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Zaidatioumou', '1234', 'Zaidatioumou@gmail.com', NULL, NULL, 'zaid tii', NULL, NULL, NULL, '2023-01-26', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Zaidati', '1234', 'zaidati269@gmail.com', NULL, NULL, 'zaidati oumouri', NULL, NULL, NULL, '2023-01-26', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'elbak256', '1234', 'elbak256@gmail.com', NULL, NULL, 'salim ela', NULL, NULL, NULL, '2023-01-28', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_page`
--

CREATE TABLE `client_page` (
  `client_page_id` bigint NOT NULL,
  `ClientID` int NOT NULL,
  `Description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `PageName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `show_img` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_page`
--

INSERT INTO `client_page` (`client_page_id`, `ClientID`, `Description`, `PageName`, `show_img`) VALUES
(11532845, 22, 'Description', 'Mahmoud', ''),
(22362123, 23, 'kdajaaaaaaaaa', 'sayed2', ''),
(27962462, 25, 'my decriptionnnnnnnnnnnnnnn', 'Nokuthula', 'true'),
(28408878, 21, 'Description', 'manzel', ''),
(32654953, 26, 'Description', 'user', ''),
(50705741, 27, 'Description', 'tets', ''),
(51776646, 34, 'Description', 'amah', ''),
(54734446, 33, 'Description', 'SALMA', ''),
(65224404, 24, 'Description', 'said', 'true'),
(66354458, 30, 'Description', 'test3', ''),
(71173432, 32, 'Description', 'omar', ''),
(71722501, 28, 'Description', 'Saidassan', ''),
(73240583, 37, 'Description', 'Zaidatioumou', NULL),
(75216652, 31, 'Description', 'user124', ''),
(83120963, 38, 'Description', 'Zaidati', NULL),
(84312211, 29, 'Description', 'comosyst', ''),
(88646281, 35, 'Description', 'amah mahmoudf', ''),
(91306132, 39, 'Description', 'elbak256', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `ColorID` int NOT NULL,
  `ColorCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ColorName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`ColorID`, `ColorCode`, `ColorName`) VALUES
(1, '#f38a00', 'orange'),
(2, '#458500', 'green'),
(3, '#343a40', 'black'),
(4, '#007bff', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_ID` int NOT NULL,
  `Comment` text NOT NULL,
  `Status` tinyint NOT NULL DEFAULT '1',
  `CommentDate` date NOT NULL,
  `ClientID` int DEFAULT NULL,
  `ItemID` int DEFAULT NULL,
  `Rating` smallint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int NOT NULL,
  `CountryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryID`, `CountryName`) VALUES
(1, 'Comoros'),
(2, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `CpuID` int NOT NULL,
  `CPUNAME` varchar(255) NOT NULL,
  `generation` int DEFAULT NULL,
  `Device_Type` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`CpuID`, `CPUNAME`, `generation`, `Device_Type`) VALUES
(1, 'Core i7', 4, 2),
(2, 'Core i7', 7, 2),
(9999999, 'Ajouter Un Nouveau Processeur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpugenerations`
--

CREATE TABLE `cpugenerations` (
  `id` int NOT NULL,
  `generation` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpugenerations`
--

INSERT INTO `cpugenerations` (`id`, `generation`, `description`) VALUES
(1, '860', '2.8 GHz'),
(2, '870', '	2.93 GHz'),
(3, '2600', ''),
(4, '3th', ''),
(5, '4th', ''),
(6, '5th', ''),
(7, '6th', ''),
(8, '7th', ''),
(9, '8th', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `CurrencyID` int NOT NULL,
  `CurrencyName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`CurrencyID`, `CurrencyName`) VALUES
(1, 'EUR'),
(2, 'KMF');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `Device_ID` int NOT NULL,
  `Device_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`Device_ID`, `Device_Name`) VALUES
(1, 'Mobile'),
(2, 'Ordinateur');

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `ID` int NOT NULL,
  `CurrencyID` int NOT NULL,
  `Cu_Value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`ID`, `CurrencyID`, `Cu_Value`) VALUES
(1, 2, '500'),
(2, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `gouvernorate`
--

CREATE TABLE `gouvernorate` (
  `GovernorateID` int NOT NULL,
  `GouvernoratName` varchar(255) NOT NULL,
  `IslandID` int DEFAULT NULL,
  `shipping_price` decimal(10,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gouvernorate`
--

INSERT INTO `gouvernorate` (`GovernorateID`, `GouvernoratName`, `IslandID`, `shipping_price`) VALUES
(0, '----', 0, '0'),
(1, 'Hamahamet', 1, '0'),
(2, 'Bambao', 1, '0'),
(3, 'Mitsamihouli', 1, '0'),
(4, 'Mitsamidou', 2, '0'),
(6, 'Hambou', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `GPU_ID` int NOT NULL,
  `GPU_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`GPU_ID`, `GPU_NAME`) VALUES
(9999999, 'Ajouter Un Nouveau Processeur graphique'),
(5, 'AMD Radeon HD 6490M'),
(6, 'AMD Radeon HD 6750m'),
(7, 'AMD Radeon HD 6770M'),
(1, 'Il N\'y a Pas'),
(3, 'Intel HD Graphic 615'),
(4, 'Intel HD Graphic 630');

-- --------------------------------------------------------

--
-- Table structure for table `incart`
--

CREATE TABLE `incart` (
  `Incart_Id` int NOT NULL,
  `ProductID` int DEFAULT NULL,
  `QTY` int DEFAULT NULL,
  `ClientID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incart`
--

INSERT INTO `incart` (`Incart_Id`, `ProductID`, `QTY`, `ClientID`) VALUES
(1, 6, 15, 29),
(2, 4, 6, 29),
(3, 5, 6, 29),
(4, 24, 5, 1),
(5, 31, 4, 1),
(6, 42, 1, 33),
(7, 47, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `islands`
--

CREATE TABLE `islands` (
  `IslandID` int NOT NULL,
  `IslandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `islands`
--

INSERT INTO `islands` (`IslandID`, `IslandName`) VALUES
(0, '----'),
(4, 'Maore'),
(3, 'Mwali'),
(2, 'Ndzwani'),
(1, 'Ngazidja');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Price` varchar(255) DEFAULT NULL,
  `CurrencyID` int DEFAULT NULL,
  `AddDate` date DEFAULT NULL,
  `CountryMade` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Status` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Status_Visible` smallint NOT NULL DEFAULT '1',
  `Rating` smallint DEFAULT NULL,
  `CategoryID` int DEFAULT NULL,
  `MemberID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `BrandID` int DEFAULT NULL,
  `Pic1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Pic2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Pic3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `MembersName` varchar(255) DEFAULT NULL,
  `Offer` int DEFAULT NULL,
  `Tags` text,
  `Color` int DEFAULT NULL,
  `CPUSpeed` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `NumberOfSIM` tinyint DEFAULT NULL,
  `MobilePhoneType` tinyint DEFAULT NULL,
  `CellulaNetworkTechnology` tinyint DEFAULT NULL,
  `CPU` int DEFAULT NULL,
  `BatteryCapacityinmAh` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Expirable` date DEFAULT NULL,
  `SerialScanRequired` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `FrontCamera` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `FastCharge` tinyint(1) DEFAULT NULL,
  `Imagequality` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `MemoryRAM` int DEFAULT NULL,
  `Operating_System_ID` int DEFAULT NULL,
  `Version_Operating_System_ID` int DEFAULT NULL,
  `ShippingCountry` int DEFAULT NULL,
  `ShippingIsland` int DEFAULT NULL,
  `Discount` int DEFAULT '0',
  `Color1` int DEFAULT NULL,
  `Color2` int DEFAULT NULL,
  `Color3` int DEFAULT NULL,
  `Color4` int DEFAULT NULL,
  `MemoryStorage` int DEFAULT NULL,
  `ship_ngazidja` smallint DEFAULT '0',
  `ship_ndzouwani` smallint DEFAULT '0',
  `ship_mwali` smallint DEFAULT '0',
  `ship_france` smallint DEFAULT '0',
  `ship_ngazidja_price` varchar(100) DEFAULT NULL,
  `ship_ndzouwani_price` varchar(100) DEFAULT NULL,
  `ship_mwali_price` varchar(100) DEFAULT NULL,
  `ship_france_price` varchar(100) DEFAULT NULL,
  `Estamited_Delivery_Ngzidja` smallint DEFAULT NULL,
  `Estamited_Delivery_Nduwani` smallint DEFAULT NULL,
  `Estamited_Delivery_Mwali` smallint DEFAULT NULL,
  `Estamited_Delivery_France` smallint DEFAULT NULL,
  `Ship_Method_Ngazidja` int DEFAULT NULL,
  `Ship_Method_Ndzuwani` int DEFAULT NULL,
  `Ship_Method_Mwali` int DEFAULT NULL,
  `Ship_Method_France` int DEFAULT NULL,
  `payment_method_Ngazida` int DEFAULT NULL,
  `payment_method_Ndzuwani` int DEFAULT NULL,
  `payment_method_Mwali` int DEFAULT NULL,
  `payment_method_France` int DEFAULT NULL,
  `GPU_ID` int DEFAULT NULL,
  `camera_resolution` varchar(50) DEFAULT NULL,
  `sim_id` int DEFAULT NULL,
  `SSD_ID` int DEFAULT NULL,
  `Weight` smallint NOT NULL DEFAULT '1',
  `Fixed_shipping_price_Ngazidja` tinyint(1) DEFAULT NULL,
  `Fixed_shipping_price_Ndzuwani` tinyint(1) DEFAULT NULL,
  `Fixed_shipping_price_Mwali` tinyint(1) DEFAULT NULL,
  `Fixed_shipping_price_France` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Description`, `Price`, `CurrencyID`, `AddDate`, `CountryMade`, `Image`, `Status`, `Status_Visible`, `Rating`, `CategoryID`, `MemberID`, `UserID`, `BrandID`, `Pic1`, `Pic2`, `Pic3`, `MembersName`, `Offer`, `Tags`, `Color`, `CPUSpeed`, `NumberOfSIM`, `MobilePhoneType`, `CellulaNetworkTechnology`, `CPU`, `BatteryCapacityinmAh`, `Expirable`, `SerialScanRequired`, `FrontCamera`, `FastCharge`, `Imagequality`, `MemoryRAM`, `Operating_System_ID`, `Version_Operating_System_ID`, `ShippingCountry`, `ShippingIsland`, `Discount`, `Color1`, `Color2`, `Color3`, `Color4`, `MemoryStorage`, `ship_ngazidja`, `ship_ndzouwani`, `ship_mwali`, `ship_france`, `ship_ngazidja_price`, `ship_ndzouwani_price`, `ship_mwali_price`, `ship_france_price`, `Estamited_Delivery_Ngzidja`, `Estamited_Delivery_Nduwani`, `Estamited_Delivery_Mwali`, `Estamited_Delivery_France`, `Ship_Method_Ngazidja`, `Ship_Method_Ndzuwani`, `Ship_Method_Mwali`, `Ship_Method_France`, `payment_method_Ngazida`, `payment_method_Ndzuwani`, `payment_method_Mwali`, `payment_method_France`, `GPU_ID`, `camera_resolution`, `sim_id`, `SSD_ID`, `Weight`, `Fixed_shipping_price_Ngazidja`, `Fixed_shipping_price_Ndzuwani`, `Fixed_shipping_price_Mwali`, `Fixed_shipping_price_France`) VALUES
(4, 'Oppo 11', 'Technology: GSM / HSPA / LTE\n2G bands: GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2\n3G bands: HSDPA 850 / 900 / 2100\n4G bands: LTE band 1(2100), 3(1800), 5(850), 7(2600), 8(900), 20(800), 28(700), 38(2600), 40(2300), 41(2500) - V1\nSpeed: HSPA 42.2/5.76 Mbps, LTE-A (2CA) Cat7 300/50 Mbps\nGPRS: Yes\nEDGE: Yes\nDimensions: 161.3 x 76.1 x 8.8 mm (6.35 x 3.00 x 0.35 in)\nWeight: 190 g (6.70 oz)\nBuild: Front glass, plastic body\nSIM: Dual SIM (Nano-SIM, dual stand-by)', '300', 1, '2021-07-04', '', '', 'Neuf', 2, 0, 28, 1, NULL, 5, 'test3/43523368945441.JPG', 'test3/43523368945442.JPG', 'test3/43523368945443.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', 4, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 4, 1, 0, 1, 1, '20', '0', '60', '60', 6, 0, 4, 4, 1, NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '14', 2, NULL, 1, 1, 0, 0, 0),
(5, 'Samsung Note 11', 'Samsung', '950', 1, '2020-11-15', '', '', 'Neuf', 2, 0, 28, 1, NULL, 5, 'elbak/2919995821441.JPG', 'elbak/2919995821442.JPG', 'elbak/2919995821443.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', 5, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 6, 1, 0, 1, 1, '20', NULL, '60', '60', 6, NULL, 4, 4, 1, NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '14', 1, 6, 1, 1, 0, 0, 0),
(6, 'Lenovo G50-70', 'Lenovo G50-70  ', '600', 1, '2020-11-28', '', '', 'Neuf', 2, 0, 26, 1, NULL, 462, 'elbak/2295431862.JPG', 'elbak/2295431862.JPG', 'elbak/2295431862.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 10, 8, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 10, 1, 0, 0, 1, '7', '0', '0', '20', 2, 0, 0, 6, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 5, '7', NULL, 1, 1, 1, 0, 0, 0),
(21, 'sable concassé', 'Le sable concassé permet de fabriquer un béton, un mortier ou un enduit pour des travaux de maçonnerie courants.\n', '200', 1, '2021-06-19', '', '', 'Neuf', 2, 0, 59, 1, NULL, 475, 'elbak/3525092251747sable concase.jpg', 'elbak/4137985827792sable concase.jpg', 'elbak/1061065717188sable concase.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '150', NULL, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, 6, 0, 0, 1, 1, 1),
(22, 'Sable Wuwadani', 'Sable Wuwadani', '90', 1, '2021-06-17', '', '', 'Neuf', 2, 0, 59, 1, NULL, 475, 'elbak/5888706280734sable-wuwadani.jpg', 'elbak/2894726321764sable-wuwadani.jpg', 'elbak/9250690449805sable-wuwadani.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '150', NULL, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0),
(23, 'Xprinter', NULL, '120', 1, '2021-06-17', '', '', 'Neuf', 2, 0, 7, 1, NULL, 4, 'elbak/91037169646x-printer.png', 'elbak/7926037979875xprinter2.png', 'elbak/72080858775018xprinter3.png', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '20', NULL, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, 6, 1, 1, 0, 0, 0),
(24, 'Hikvision 4 Channel 1 & 2MP DVR Turbo HD 4.0 1080P H.265 Pro+ – White Series', 'Hikvision Digital Technology DS-7104HQHI-K1, Blanc, H.264,H.264+,H.265,H.265+, 1.0 canaux, 12 V, 1U, 4 canaux\nHikvision Digital Technology DS-7104HQHI-K1. Couleur du produit: Blanc, Formats de compression visuels: H.264,H.264+,H.265,H.265+, Canaux de sortie audio: 1.0 canaux. Canaux d\'entrée vidéo: 4 canaux. Type d\'interface Ethernet: Fast Ethernet, Protocoles réseau pris en charge: TCP/IP, PPPoE, DHCP, Hik-Connect, DNS, DDNS, NTP, SADP, NFS, iSCSI, UPnP, HTTPS, ONVIF. Interface du disque dur: SATA, Capacité max. du disque dur: 4000 Go. Consommation électrique typique: 8 W', '100', 1, '2021-06-17', '', '', 'Neuf', 2, 0, 41, 1, NULL, 476, 'elbak/7577304944462ds-7116hqhi-k1-400.jpg', 'elbak/8450678438613Hikvision-DS-7104HQHI-K1.1-700x508.jpg', 'elbak/2276558560212dvr-hikvision-ds-7104hghi-f1-4-channels-turbo-hd-tvi-h264-2_-1.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '20', NULL, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0),
(31, 'Advision Camera 4MB', 'Advision AD-HFW1400R-S2 - Caméra de sécurité extérieure - 4MP - Blanc', '45', 1, '2021-06-26', '', '', 'Neuf', 2, 0, 39, 1, NULL, 477, 'elbak/8467801719187ADVISIONCA.jpg', 'elbak/2399433523454AD-HFW1400T-S2-510x196.png', 'elbak/4026847107154ADVISIONCA.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '20', NULL, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, 6, 1, NULL, 1, 1, 1),
(41, 'ONicor Riz  25 kg', 'Un sac de 25 Kg de riz Onicor', '14.5', 1, '2021-07-12', '', '', 'Neuf', 2, 0, 9, 1, NULL, 478, 'elbak/51067160842riz.jpg', 'elbak/9761147452336riz.jpg', 'elbak/984679279581riz.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '14.5', NULL, NULL, NULL, 15, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, 6, 1, NULL, 1, 1, 1),
(42, 'Riz Mahmoud', 'Un sac de 5kg de Riz Basmati Mahmood 500 ', '14', 1, '2021-07-10', 'Emirate', '', 'Neuf', 2, 0, 9, 1, NULL, 478, 'elbak/58277674640901.JPG', 'elbak/58277674640902.JPG', 'elbak/58277674640903.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '14', '0', '0', '0', 1, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1),
(47, 'NIdo 900gm', 'NIdo 900gm', '10', 1, '2021-07-10', 'Swiss', '', 'Neuf', 1, 0, 9, 1, NULL, 479, 'elbak/17759492755471.JPG', 'elbak/17759492755472.JPG', 'elbak/17759492755473.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '10', '0', '0', '0', 1, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1),
(49, 'SUCRE EN POUDRE 25KG', 'SUCRE EN POUDRE 25KG THAILANDE', '20', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 60, 1, NULL, 480, 'elbak/84681443935be124557f6d32e48a233d71cc3a3.jpeg', 'elbak/8643607188391be124557f6d32e48a233d71cc3a3.jpeg', 'elbak/925893014676be124557f6d32e48a233d71cc3a3.jpeg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '20', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(50, 'SARDINE DELMONACO 50X125G', 'Carton de 50 boites de sardines 125 G', '30', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 62, 1, NULL, 481, 'elbak/3428507411sardin.jpg', 'elbak/1913072373383sardin.jpg', 'elbak/50769012401282sardin.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '25', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, 6, 1, NULL, 1, 1, 1),
(51, 'MACARONI PASTA RAMA 20X400G', '1 carton de 20 paquets de coquillettes Dost \n\n', '18', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 63, 1, NULL, 482, 'elbak/6650075617800c90139a8845d1bdac415ec85ed4ee836.jpg', 'elbak/5433864063103c90139a8845d1bdac415ec85ed4ee836.jpg', 'elbak/6250263003770c90139a8845d1bdac415ec85ed4ee836.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(52, 'LAIT OKI 24X390G', 'Un carton de 24 Boites de 390g de lait concentré sucré de la marque OKI\n\n', '16', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 64, 1, NULL, 483, 'elbak/2353840620816a6d773097d8d81841cd1bee4ddbf9c2a.jpg', 'elbak/5292525231357a6d773097d8d81841cd1bee4ddbf9c2a.jpg', 'elbak/8344909173831a6d773097d8d81841cd1bee4ddbf9c2a.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(53, 'BOISSON FANTA 24X33CL', 'Boisson rafraîchissante au jus d\'orange avec sucre et édulcorants', '15', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 65, 1, NULL, 484, 'elbak/11441195707396c95a777b587dbd9000c8ccf98646734.jpg', 'elbak/73371159599276c95a777b587dbd9000c8ccf98646734.jpg', 'elbak/55732336720306c95a777b587dbd9000c8ccf98646734.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(54, 'RIZ AL USRAH 5KG', 'Al-Usrah Basmati rice est un riz plus facile à cuisiner, populaire non seulement pour sa saveur mais aussi pour son arôme. Il donne des résultats remarquables en particulier pour ses caractéristiques incollables et «long grain» après la cuisson. Le riz est plus léger et plus moelleux que le riz blanc standard. Ainsi Al-Usrah basmati rice s\'adaptera parfaitement à tous vos plats : aussi bon en pilaou qu\'en salade.', '10', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 66, 1, NULL, 485, 'elbak/5955532845936c7255f35d17f5fba5b556cfe5f96b6e4.jpg', 'elbak/5843813054112c7255f35d17f5fba5b556cfe5f96b6e4.jpg', 'elbak/6988609897466c7255f35d17f5fba5b556cfe5f96b6e4.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '10', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(55, 'AILES DE POULET 10KG', '1 Carton d\'ailes de poulet, 10 kg', '23', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 67, 1, NULL, 486, 'elbak/9419954436278a2c72dde4c33bbeb45ead5916a567dd0.jpg', 'elbak/3476476258799a2c72dde4c33bbeb45ead5916a567dd0.jpg', 'elbak/6895584709477a2c72dde4c33bbeb45ead5916a567dd0.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(56, 'TOMATE MARA 24X400G', 'Un carton de 24 boites de tomates pelées de 400g de la marque Mara.', '30', 1, '2021-07-12', '', '', 'Neuf', 1, 0, 68, 1, NULL, 487, 'elbak/76825670123679165a3008056d35c9c98f9f3bbbb3f46.jpg', 'elbak/8931093518999a394ad82c766d1e32693722e1e1a4f0b.jpg', 'elbak/64174325969709165a3008056d35c9c98f9f3bbbb3f46.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '20', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(57, 'Ciment Lafarge 42.5R  HODARI 50kgx20 tonne', 'Ciment courant gris HODARI destiné à la mise en oeuvre de vos travaux courants de maçonnerie. Convient particulièrement à la réalisation du ciment et du mortier.\n\n', '145', 1, '2021-07-13', '', '', 'Neuf', 1, 0, 69, 1, NULL, 488, 'elbak/5707278685491109-cart_default.jpg', 'elbak/652685791332587-cart_default.jpg', 'elbak/233638378453215-cart_default.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '60', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(58, 'Ciment Gris 42.5N  GLOBAL 50kgX20 Tone', 'Poids (kg)                                 50\nConditionnement                       Sac\nClasse de résistance (N/mm2)    42.5\nNorme produit                           Portland\nDESCRIPTION :Le ciment gris est le produit incontournable pour les travaux de gros oeuvre. Multi-usages, vous pouvez préparer béton et mortier en toute simplicité ! Sa norme portland vous confère la garantie d\'un produit de qualité professionnelle. Votre sac de ciment gris est livré directement sur votre chantier pour commencer vos travaux au plus vite.', '160', 1, '2021-07-13', '', '', 'Neuf', 1, 0, 69, 1, NULL, 489, 'elbak/1431528700777110-cart_default.jpg', 'elbak/805653705046089-cart_default.jpg', 'elbak/5855423600047110-cart_default.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '60', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(59, 'Ciment Portland FALCON CEM I 52.5NR 50kgX20', 'Le ciment Portland CEM I 52.5 R est un ciment Portland pur, composé au moins de 95% de clinker de ciment Portland finement broyé auquel on rajoute du gypse comme régulateur de prise. Ses propriétés et sa composition répondent à la norme SN EN 197-1.', '140', 1, '2023-01-28', '', '', 'Neuf', 1, 0, 69, 1, NULL, 490, 'elbak/5531242893729111-cart_default.jpg', 'elbak/7858908171024111-cart_default.jpg', 'elbak/8844869523139111-cart_default.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '60', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, 6, 1, NULL, 1, 1, 1),
(60, 'fer 10', 'Le fer à béton est l\'accessoire indispensable pour la réalisation des chaînages. Il servira notamment lors de la réalisation des murs et assure la solidité de votre ouvrage. Il suffit d\'insérer le fer à béton dans votre parpaing d\'angle ou votre parpaing de chaînage et ensuite couler le béton. Vous pouvez également l\'utiliser pour l\'ensemble de vos travaux nécessitant du béton armé.\n', '3.5', 1, '2021-07-13', '', '', 'Neuf', 1, 0, 70, 1, NULL, 491, 'elbak/9712866364747images (2).jpg', 'elbak/4843568343365fer-de-contruction-metallique-acier.jpg', 'elbak/4001074198409images (2).jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '60', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(61, 'fer 8', 'Le fer à béton est l\'accessoire indispensable pour la réalisation des chaînages. Il servira notamment lors de la réalisation des murs et assure la solidité de votre ouvrage. Il suffit d\'insérer le fer à béton dans votre parpaing d\'angle ou votre parpaing de chaînage et ensuite couler le béton. Vous pouvez également l\'utiliser pour l\'ensemble de vos travaux nécessitant du béton armé.', '2.5', 1, '2021-07-13', '', '', 'Neuf', 1, 0, 70, 1, NULL, 491, 'elbak/5779879328899jpeg.jpg', 'elbak/1537887710161images (4).jpg', 'elbak/8272806611581rond-torsade-hle-8.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '60', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(62, 'Seau De Maçcon Renforcé -12L', 'Excellente résistance aux chocs, à l\'abrasion et aux écarts de température. Excellente prise en main. Diamètre de l\'anse : 7 mm. Bords renforcés.Seau 12 litres - Ø anse : 7 mm - gradué.', '5', 1, '2021-07-13', '', '', 'Neuf', 1, 0, 71, 1, NULL, 493, 'elbak/3769719467900106-cart_default.jpg', 'elbak/6333428053410106-cart_default.jpg', 'elbak/6185930017029106-cart_default.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(63, 'Brouette Standard 90L', 'Brouette, chariot à main tous travaux 90L. Coffre renforcé par arceau et traverses sous coffre. Roues gonflables avec moyeu acier.', '37', 1, '2021-07-13', '', '', 'Neuf', 1, 0, 72, 1, NULL, 494, 'elbak/2544914972107103-cart_default.jpg', 'elbak/5459449397641103-cart_default.jpg', 'elbak/7742839502933103-cart_default.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(65, 'Samsung Galaxy A10s Dual SIM 32GB 2GB RAM SM-A107F/DS Noir', 'Smartphone sous systeme Android 9. 0 (Pie)\nEcran de 6. 2\'\' - 4G: Oui\nMemoire interne: 32 Go - RAM: 2 Go\nAppareil photo de 13 + 2 Mégapixels', '165', 1, '2021-07-14', '', '', 'Neuf', 1, 0, 28, 1, NULL, 459, 'elbak/725510462577541hgI4Zq8IL._AC_SX425_.jpg', 'elbak/906759766755531FsZR4gGbL._AC_SX425_.jpg', 'elbak/9244093112690319uppimFqL._AC_SX425_.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', 2, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 4, 1, 0, 0, 0, '5', NULL, NULL, NULL, 17, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', 1, NULL, 1, NULL, 1, 1, 1),
(66, 'lafarge', NULL, '50', 1, '2023-01-26', '', NULL, 'Neuf', 2, NULL, 7, 1, NULL, 4, 'elbak/889866919641download.jpg', 'elbak/6945078857358download.jpg', 'elbak/8750778021445download.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(67, 'test', 'dfvd', '1', 1, '2023-01-27', '', NULL, 'Neuf', 1, NULL, 7, 1, NULL, 4, 'elbak/1157289736115download.jpg', 'elbak/6081452016341download.jpg', 'elbak/4813093227285download.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1),
(68, 'test2', 'test', '1', 1, '2023-01-27', '', NULL, 'Neuf', 1, NULL, 37, 1, NULL, 474, 'elbak/1880733996266download.jpg', 'elbak/3675265368359download.jpg', 'elbak/7664501816281download.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 4, 1, 0, 0, 1, '1', NULL, NULL, '1', 1, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 5, NULL, NULL, 2, 1, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_allow_place_shiping`
--

CREATE TABLE `items_allow_place_shiping` (
  `id` int NOT NULL,
  `CountryID` int NOT NULL,
  `IslandID` int DEFAULT NULL,
  `CityID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `Model_ID` int NOT NULL,
  `Model_Nmae` varchar(100) NOT NULL,
  `Brand_ID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `NameID` int NOT NULL,
  `ClientID` int DEFAULT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`NameID`, `ClientID`, `fullname`) VALUES
(20, 1, 'elbak Mahmoud Said'),
(21, 1, 'Salim Mahmoud'),
(22, 1, 'elbak Mahmoud Said AS'),
(23, 1, 'testt'),
(24, 1, 'elala'),
(25, 1, 'moronid'),
(26, 1, 'elbak mahmoud'),
(27, 1, 'tessssssssss'),
(28, 1, 'tessssssssss'),
(29, 1, 'elbak said'),
(30, 1, 'elbak said'),
(31, 1, 'elbak mahmoud'),
(32, 1, 'elbak assoumani'),
(33, 1, 'dje mzde'),
(34, 1, 'elaaa'),
(35, 1, 'djee'),
(36, 1, 'kela said'),
(37, 1, 'kela said asaid'),
(38, 1, 'tess555555'),
(39, 29, 'comosyst'),
(40, 29, 'said assou'),
(41, 1, 'elbak'),
(42, 1, 'huku'),
(43, 1, '6RY'),
(44, 1, 'ythuyt'),
(45, 1, 'said'),
(46, 34, 'salmata'),
(47, 1, 'amanata mahmoud'),
(48, 1, 'salmata'),
(49, 1, 'amah'),
(50, 1, 'amanata');

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `connective_id` int NOT NULL,
  `Conective_value` varchar(50) NOT NULL,
  `Device_ID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`connective_id`, `Conective_value`, `Device_ID`) VALUES
(1, '2G', 1),
(2, '3G', 1),
(3, '4G', 1),
(4, '5G', 1),
(5, 'GPRS', 1),
(6, 'GPS', 1),
(7, 'Infrarouge', 1),
(8, 'Quadri-Bande', 1),
(9, 'DisplayPort', 2),
(10, 'HDMI', 2),
(11, 'Micro-HDMI', 2),
(12, 'Micro-USB', 2),
(13, 'Mini-USB', 2),
(14, 'USB 1.0/1.1', 2),
(15, 'USB 2.0', 2),
(16, 'USB 3.0', 2),
(17, 'USB 3.1', 2),
(18, 'USB -A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `network_for_product`
--

CREATE TABLE `network_for_product` (
  `ne_id` int NOT NULL,
  `Product_ID` int DEFAULT NULL,
  `Network_ID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network_for_product`
--

INSERT INTO `network_for_product` (`ne_id`, `Product_ID`, `Network_ID`) VALUES
(28, NULL, 2),
(29, NULL, 3),
(30, NULL, 4),
(31, NULL, 5),
(32, NULL, 6),
(33, NULL, 7),
(34, NULL, 8),
(134, 5, 1),
(135, 5, 2),
(136, 5, 3),
(137, 5, 4),
(138, 5, 5),
(163, NULL, 1),
(164, NULL, 1),
(186, 6, 9),
(187, 6, 10),
(188, 6, 11),
(189, 6, 12),
(190, 6, 13),
(191, 6, 14),
(192, 6, 15),
(193, 6, 16),
(194, 6, 17),
(205, NULL, 1),
(206, NULL, 2),
(207, NULL, 3),
(238, 4, 1),
(239, 4, 2),
(240, 4, 3),
(241, 4, 4),
(242, 4, 5),
(243, NULL, 1),
(244, NULL, 2),
(245, NULL, 3),
(246, NULL, 4),
(247, NULL, 6),
(248, NULL, 7),
(249, 65, 1),
(250, 65, 2),
(251, 65, 3),
(252, 65, 6),
(253, 68, 1),
(254, 68, 1),
(255, 68, 1),
(256, 68, 1),
(257, 68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `operating_system`
--

CREATE TABLE `operating_system` (
  `OS_ID` int NOT NULL,
  `OS_NAME` varchar(100) NOT NULL,
  `Device_ID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operating_system`
--

INSERT INTO `operating_system` (`OS_ID`, `OS_NAME`, `Device_ID`) VALUES
(1, 'Android', 1),
(2, 'iOS', 1),
(3, 'Windows Phone', 1),
(4, 'Windows xp', 2),
(5, 'Windows 7', 2),
(6, 'Windows 8', 2),
(7, 'Windows 10', 2),
(8, 'Windows 10 Pro', 2),
(9, 'Mac', 2),
(10, 'DOS', 2),
(11, 'Linux', 2),
(12, 'Chrome', 2),
(13, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orders_details_id` int NOT NULL,
  `OrderID` bigint DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `QTY` int DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `CurrencyID` int DEFAULT NULL,
  `PromoCode` varchar(100) DEFAULT NULL,
  `Discount` varchar(200) DEFAULT NULL,
  `StatusOrder` smallint DEFAULT NULL,
  `Expected_delvery_date` date DEFAULT NULL,
  `DelevredDate` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `Product_Img_For_Return` varchar(255) DEFAULT NULL,
  `reason_for_returned_orders` text,
  `reward_for_client_id` int DEFAULT NULL,
  `Shipr_Price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `SallerID` int DEFAULT NULL,
  `Code_For_Self_Ship` bigint DEFAULT NULL,
  `date_asked_for_return` datetime DEFAULT NULL,
  `Order_Returned_Code` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orders_details_id`, `OrderID`, `ProductID`, `QTY`, `amount`, `total_amount`, `CurrencyID`, `PromoCode`, `Discount`, `StatusOrder`, `Expected_delvery_date`, `DelevredDate`, `date_returned`, `Product_Img_For_Return`, `reason_for_returned_orders`, `reward_for_client_id`, `Shipr_Price`, `SallerID`, `Code_For_Self_Ship`, `date_asked_for_return`, `Order_Returned_Code`) VALUES
(53, 540246131716, 62, 1, '5', '20', 1, NULL, '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '15', 1, 63887789488856, NULL, NULL),
(54, 540246030362, 58, 1, '160', '220', 1, NULL, '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '60', 1, 96691555267155, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` bigint NOT NULL,
  `ClientID` int DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `DelevredDate` date DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `RECEPIENT` varchar(255) DEFAULT NULL,
  `TotalOrder` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `CurrencyID` int DEFAULT NULL,
  `payment_method` int DEFAULT '0',
  `Place_shipping` int DEFAULT NULL,
  `Track_Number` varchar(255) DEFAULT NULL,
  `Phone` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ClientID`, `RequestDate`, `DelevredDate`, `Adress`, `RECEPIENT`, `TotalOrder`, `CurrencyID`, `payment_method`, `Place_shipping`, `Track_Number`, `Phone`) VALUES
(540246030362, 1, '2023-01-27', NULL, 'Moroni Philips', 'amanata', '220', 1, 2, 1, NULL, 5464),
(540246131716, 1, '2023-01-27', NULL, 'Moroni Philips', 'amanata', '20', 1, 2, 1, NULL, 74387547854);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `Status_id` smallint NOT NULL,
  `StatusName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`Status_id`, `StatusName`) VALUES
(1, 'Wating Order'),
(2, 'on The Way'),
(3, 'Confirmed Order'),
(4, 'Returnded'),
(5, 'cONFIRMED RETUNED'),
(7, 'Cancled Order');

-- --------------------------------------------------------

--
-- Table structure for table `payemts_allow_detais`
--

CREATE TABLE `payemts_allow_detais` (
  `__id` int NOT NULL,
  `ProductID` int NOT NULL,
  `Place_Ship` int NOT NULL,
  `Payment_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payemts_allow_detais`
--

INSERT INTO `payemts_allow_detais` (`__id`, `ProductID`, `Place_Ship`, `Payment_id`) VALUES
(467, 5, 1, 1),
(468, 5, 1, 2),
(469, 5, 1, 3),
(470, 5, 3, 1),
(471, 5, 3, 2),
(472, 5, 4, 2),
(473, 5, 4, 3),
(515, 8, 1, 1),
(516, 9, 1, 1),
(517, 9, 1, 2),
(518, 10, 1, 1),
(519, 10, 1, 2),
(520, 10, 1, 3),
(521, 11, 1, 2),
(522, 12, 1, 1),
(523, 13, 1, 1),
(524, 14, 1, 3),
(525, 15, 1, 3),
(526, 16, 1, 1),
(527, 16, 1, 2),
(528, 16, 1, 3),
(529, 17, 1, 2),
(530, 18, 1, 1),
(531, 18, 1, 2),
(549, 6, 1, 1),
(550, 6, 1, 2),
(551, 6, 1, 3),
(552, 6, 4, 1),
(553, 6, 4, 2),
(554, 6, 4, 3),
(573, 19, 1, 1),
(574, 19, 1, 2),
(575, 20, 1, 1),
(576, 20, 1, 2),
(578, 22, 1, 1),
(580, 23, 1, 1),
(581, 24, 1, 1),
(582, 25, 1, 1),
(583, 26, 1, 1),
(584, 27, 1, 1),
(585, 28, 1, 1),
(586, 29, 1, 1),
(587, 30, 1, 1),
(590, 21, 1, 1),
(591, 31, 1, 1),
(592, 31, 1, 2),
(593, 32, 1, 1),
(594, 33, 1, 1),
(595, 33, 1, 2),
(596, 34, 1, 1),
(597, 34, 1, 2),
(598, 35, 1, 1),
(599, 35, 1, 2),
(600, 36, 1, 1),
(601, 36, 1, 2),
(602, 37, 1, 1),
(603, 37, 1, 2),
(604, 38, 1, 1),
(605, 38, 1, 2),
(648, 4, 1, 1),
(649, 4, 3, 1),
(650, 4, 3, 2),
(651, 4, 3, 3),
(652, 4, 4, 1),
(653, 39, 1, 1),
(654, 40, 1, 2),
(657, 42, 1, 1),
(658, 42, 1, 2),
(659, 43, 1, 1),
(660, 43, 1, 2),
(661, 44, 1, 1),
(662, 44, 1, 2),
(663, 45, 1, 1),
(664, 45, 1, 2),
(665, 46, 1, 1),
(666, 46, 1, 2),
(667, 47, 1, 1),
(668, 47, 1, 2),
(669, 48, 1, 1),
(670, 48, 1, 2),
(671, 49, 1, 1),
(672, 49, 1, 2),
(675, 51, 1, 1),
(676, 51, 1, 2),
(677, 50, 1, 1),
(678, 50, 1, 2),
(679, 41, 1, 1),
(680, 41, 1, 2),
(681, 52, 1, 1),
(682, 52, 1, 2),
(683, 53, 1, 1),
(684, 53, 1, 2),
(685, 54, 1, 1),
(686, 54, 1, 2),
(687, 55, 1, 1),
(688, 55, 1, 2),
(689, 56, 1, 1),
(690, 56, 1, 2),
(691, 57, 1, 1),
(692, 57, 1, 2),
(693, 58, 1, 1),
(694, 58, 1, 2),
(697, 60, 1, 1),
(698, 60, 1, 2),
(699, 61, 1, 1),
(700, 61, 1, 2),
(701, 62, 1, 1),
(702, 62, 1, 2),
(703, 63, 1, 1),
(704, 63, 1, 2),
(705, 64, 1, 2),
(706, 65, 1, 2),
(707, 66, 1, 1),
(708, 67, 1, 1),
(709, 67, 1, 2),
(710, 68, 1, 1),
(711, 68, 1, 2),
(712, 68, 4, 1),
(713, 68, 4, 2),
(716, 59, 1, 1),
(717, 59, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int NOT NULL,
  `payment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `payment_name`) VALUES
(1, 'Paypal'),
(2, 'Cash'),
(3, 'carte De Crédit');

-- --------------------------------------------------------

--
-- Table structure for table `paypals`
--

CREATE TABLE `paypals` (
  `PaypalID` int NOT NULL,
  `PaypalEmail` varchar(255) NOT NULL,
  `ClientPayapl` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `paypals`
--

INSERT INTO `paypals` (`PaypalID`, `PaypalEmail`, `ClientPayapl`) VALUES
(4, 'Elbak1995@gmail.com', 1),
(5, 'elbak269@gmail.com', 1),
(6, 'ELBALKLKFCX', 26),
(7, 'Mahmoudsalmata@hotmail.com', 28),
(8, 'mahmoudsalmata@gmail.com', 28),
(9, 'comosyst@gmail.com', 29),
(10, 'elbak346546@hmnf.com', 38);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `PromoID` int NOT NULL,
  `PromoCode` varchar(60) NOT NULL,
  `Discount` int NOT NULL,
  `CurrencyID` int DEFAULT NULL,
  `ClientID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`PromoID`, `PromoCode`, `Discount`, `CurrencyID`, `ClientID`) VALUES
(1, '56xjd', 18, 2, 1),
(2, '25G25', 15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `RamID` int NOT NULL,
  `Rame_Value` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`RamID`, `Rame_Value`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(12, '12'),
(13, '16'),
(14, '24'),
(15, '32');

-- --------------------------------------------------------

--
-- Table structure for table `report_problem`
--

CREATE TABLE `report_problem` (
  `feedbackid` int NOT NULL,
  `Client_id` int NOT NULL,
  `date_comment` int NOT NULL,
  `Comment` text NOT NULL,
  `Image_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_problem`
--

INSERT INTO `report_problem` (`feedbackid`, `Client_id`, `date_comment`, `Comment`, `Image_comment`) VALUES
(1, 1, 2147483647, 'drfg', '../theme/image/report_problem/elbak/130200524080514am.JPG'),
(2, 1, 2147483647, 'drfg', '../theme/image/report_problem/elbak/253200524080628am.JPG'),
(3, 1, 2147483647, 'cfdhbftg', '../theme/image/report_problem/elbak/736200524081841am.JPG'),
(4, 1, 2147483647, 'cfdhbftg', '../theme/image/report_problem/elbak/500200524081849am.JPG'),
(5, 1, 2147483647, 'cfdhbftg', '../theme/image/report_problem/elbak/252200524081951am.JPG'),
(6, 1, 2147483647, 'DGTHFYDDHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', NULL),
(7, 1, 2147483647, 'CRASH APPP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reward_withdrawn`
--

CREATE TABLE `reward_withdrawn` (
  `Withdrawn_ID` int NOT NULL,
  `ClientID` int NOT NULL,
  `date` date NOT NULL,
  `Amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `SellerID` int NOT NULL,
  `StoreName` varchar(255) DEFAULT NULL,
  `Mobile` int DEFAULT NULL,
  `RegisterDate` date DEFAULT NULL,
  `TrustStatus` tinyint DEFAULT NULL COMMENT 'seller rank',
  `Aprovable` tinyint DEFAULT NULL,
  `Delleted` tinyint DEFAULT '0',
  `WhoDelleted` int DEFAULT NULL,
  `DateDeleted` date DEFAULT NULL,
  `WhoAprovaled` int DEFAULT NULL,
  `BusinessLocation` int DEFAULT NULL,
  `IslandStore` varchar(255) DEFAULT NULL,
  `StoreAdress` varchar(255) DEFAULT NULL,
  `ClientID` int DEFAULT NULL,
  `PlaceDescription` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Gouvernorate` int DEFAULT NULL,
  `City` int DEFAULT NULL,
  `ISLAND` int DEFAULT NULL,
  `Verificated` varchar(15) DEFAULT NULL,
  `BestSeller` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`SellerID`, `StoreName`, `Mobile`, `RegisterDate`, `TrustStatus`, `Aprovable`, `Delleted`, `WhoDelleted`, `DateDeleted`, `WhoAprovaled`, `BusinessLocation`, `IslandStore`, `StoreAdress`, `ClientID`, `PlaceDescription`, `Gouvernorate`, `City`, `ISLAND`, `Verificated`, `BestSeller`) VALUES
(1, 'Comoshop', 1140017342, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 1, '4', 'Moroni', 1, '', 0, 0, 0, 'true', 'true'),
(2, 'ComoSyst', 1098090201, '2019-12-31', 5, 6, 0, 0, '0000-00-00', 1, 1, 'Ngazidja', 'Moroni', NULL, '', 0, 0, 0, 'true', NULL),
(3, 'ComoSyst', 333036, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 2, '1', 'Dimadjou Hamahamet', 2, '', 0, 0, 0, 'true', NULL),
(4, 'Amanata', 353542, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 1, '1', '5864822', 3, '', 0, 0, 0, 'true', 'true'),
(47, 'ComoSys', NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 18, '', 0, 0, NULL, 'true', NULL),
(58, 'comorco', NULL, NULL, NULL, 4, 0, NULL, NULL, NULL, 2, NULL, NULL, 19, 'dje', 0, 13, NULL, 'true', NULL),
(59, 'Salimata', 635315114, NULL, NULL, 8, 0, NULL, NULL, 1, 1, '1', '15 Mail Maurice de Fontenay', 28, '', 0, 0, NULL, NULL, NULL),
(60, 'TYH', 0, NULL, NULL, 6, 0, NULL, NULL, NULL, 1, '3', 'YGTHJYTU', 26, '', 0, 0, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 26, '', 0, 0, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 26, '', 0, 0, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 26, '', 0, 0, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 26, '', 0, 0, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 26, '', 0, 0, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 26, '', 0, 0, NULL, NULL, NULL),
(67, 'Comosyst', 3249369, NULL, NULL, 6, 0, NULL, NULL, NULL, 1, '1', 'Moroni Philips', 29, '', 0, 0, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 29, '', 0, 0, NULL, NULL, NULL),
(69, 'leo', 64582, NULL, NULL, 6, 0, NULL, NULL, NULL, 1, '1', 'moroni2', 38, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_payment_method`
--

CREATE TABLE `seller_payment_method` (
  `ID` int NOT NULL,
  `PaymentID` int NOT NULL,
  `SellerID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_payment_method`
--

INSERT INTO `seller_payment_method` (`ID`, `PaymentID`, `SellerID`) VALUES
(1, 2, 51),
(2, 2, 51);

-- --------------------------------------------------------

--
-- Table structure for table `serched_word`
--

CREATE TABLE `serched_word` (
  `id` int NOT NULL,
  `Word` varchar(100) NOT NULL,
  `Count_Times` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ShippingID` int NOT NULL,
  `ShippingName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ShippingID`, `ShippingName`) VALUES
(1, 'DHL'),
(3, 'Self'),
(2, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `ship_place`
--

CREATE TABLE `ship_place` (
  `id` int NOT NULL,
  `Place_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship_place`
--

INSERT INTO `ship_place` (`id`, `Place_Name`) VALUES
(1, 'Ngazidja'),
(2, 'Ndzuwani'),
(3, 'Mwali'),
(4, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `sim_card_slot`
--

CREATE TABLE `sim_card_slot` (
  `SIM_Card_Slot_ID` int NOT NULL,
  `SIM_Card_Slot_VALUE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim_card_slot`
--

INSERT INTO `sim_card_slot` (`SIM_Card_Slot_ID`, `SIM_Card_Slot_VALUE`) VALUES
(1, 'Double Puce'),
(2, 'Unique Puce');

-- --------------------------------------------------------

--
-- Table structure for table `ssd`
--

CREATE TABLE `ssd` (
  `SSD_ID` int NOT NULL,
  `SSD_VALUE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssd`
--

INSERT INTO `ssd` (`SSD_ID`, `SSD_VALUE`) VALUES
(6, '1'),
(4, '128'),
(1, '256'),
(2, '4'),
(5, '500'),
(3, '8');

-- --------------------------------------------------------

--
-- Table structure for table `status_visible_prod`
--

CREATE TABLE `status_visible_prod` (
  `sta_us_id` smallint NOT NULL,
  `Status_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_visible_prod`
--

INSERT INTO `status_visible_prod` (`sta_us_id`, `Status_Name`) VALUES
(1, 'Visible'),
(2, 'Invisible');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `Storage_ID` int NOT NULL,
  `Storage_Value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`Storage_ID`, `Storage_Value`) VALUES
(1, '0.512'),
(2, '8'),
(3, '16'),
(4, '32'),
(5, '64'),
(6, '128'),
(7, '256'),
(8, '512'),
(9, '500'),
(10, '1000'),
(11, '2000'),
(12, '3000'),
(13, '250');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int NOT NULL,
  `TagName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`) VALUES
(1, 'Cocacola'),
(2, 'Pepsi');

-- --------------------------------------------------------

--
-- Table structure for table `time_searched_word`
--

CREATE TABLE `time_searched_word` (
  `time_searched_word_id` int NOT NULL,
  `Searched_word_Id` int NOT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `Date_SEARCHED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `used_status_product`
--

CREATE TABLE `used_status_product` (
  `Staus_ID` int NOT NULL,
  `Value_ST` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_status_product`
--

INSERT INTO `used_status_product` (`Staus_ID`, `Value_ST`) VALUES
(1, 'Neuf'),
(2, 'Utilise');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int NOT NULL COMMENT 'to identify user',
  `Username` varchar(255) NOT NULL COMMENT 'username to login',
  `FirstName` varchar(255) NOT NULL,
  `LastNmae` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL COMMENT 'password to login',
  `Email` varchar(255) NOT NULL,
  `Mobile` int NOT NULL,
  `TrustStatus` int NOT NULL DEFAULT '0' COMMENT 'seller rank',
  `RegStatus` int NOT NULL DEFAULT '0' COMMENT 'user approval',
  `WhoAdded` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `UserDeleted` int NOT NULL DEFAULT '0',
  `WhoDeleted` varchar(250) NOT NULL,
  `WhoActivated` varchar(250) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Governorate` varchar(255) NOT NULL,
  `Island` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `GroupID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `FirstName`, `LastNmae`, `Password`, `Email`, `Mobile`, `TrustStatus`, `RegStatus`, `WhoAdded`, `Date`, `UserDeleted`, `WhoDeleted`, `WhoActivated`, `avatar`, `City`, `Governorate`, `Island`, `Country`, `FullName`, `GroupID`) VALUES
(1, 'elbak', '', '', '1234', 'elbak269@gmail.com', 140017342, 1, 1, 'elbak', '2019-11-01', 1, 'elbak', 'elbak', '', 'Dimadjou', 'Hamahamet', 'Ngazidja', 'Comores', '', 1),
(2, 'salmata', '', '', '1234', 'salmat@gmail.com', 0, 0, 1, 'elbak', '2019-11-07', 0, '', 'elbak', '', '0', '0', '', 'Egyp[', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `versions_os`
--

CREATE TABLE `versions_os` (
  `version_id` int NOT NULL,
  `Version_Value` varchar(50) NOT NULL,
  `Operating_System_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `versions_os`
--

INSERT INTO `versions_os` (`version_id`, `Version_Value`, `Operating_System_ID`) VALUES
(1, '1.0', 1),
(2, '1.1', 1),
(3, '1.5', 1),
(4, '1.6', 1),
(5, '2.0 - 2.1', 1),
(6, '2.2 - 2.2.3', 1),
(7, '2.3 - 2.3.7', 1),
(8, '3.0 - 3.2.6', 1),
(9, '4.0 - 4.0.4', 1),
(10, '4.1 - 4.3.1', 1),
(11, '4.4 - 4.4.4', 1),
(12, '5.0 - 5.1.1', 1),
(13, '6.0 - 6.0.1', 1),
(14, '7.0', 1),
(15, '7.1.0 - 7.1.2', 1),
(16, '8.0', 1),
(17, '8.1', 1),
(18, '9.0', 1),
(19, '10.0', 1),
(20, '3.1.3', 2),
(21, '4.2.1', 2),
(22, '5.1.1', 2),
(23, '6.1.6', 2),
(24, '7.1.2', 2),
(25, '9.3.5', 2),
(26, '9.3.6', 2),
(27, '10.3.3', 2),
(28, '10.3.4', 2),
(29, '12.4.8', 2),
(30, '14.0.1', 2),
(31, '14.2 beta 2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`AdressID`),
  ADD KEY `adress_client56` (`ClientID`),
  ADD KEY `City_adr5` (`City`),
  ADD KEY `gouver_adres62` (`Gouvernorate`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`),
  ADD KEY `CATEGORY__` (`CategoryID`);

--
-- Indexes for table `camera_resolution`
--
ALTER TABLE `camera_resolution`
  ADD PRIMARY KEY (`Resolution_ID`),
  ADD UNIQUE KEY `Resolution_Value` (`Resolution_Value`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carid`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`CardID`),
  ADD KEY `cardClient` (`ClientID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `IslandID` (`IslandID`),
  ADD KEY `GovernorateID` (`GovernorateID`) USING BTREE;

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`),
  ADD KEY `gouvernemant_client` (`Gouvernorate`),
  ADD KEY `city_client` (`City`),
  ADD KEY `island_client` (`Island`);

--
-- Indexes for table `client_page`
--
ALTER TABLE `client_page`
  ADD PRIMARY KEY (`client_page_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`ColorID`),
  ADD UNIQUE KEY `ColorCode` (`ColorCode`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `item1` (`ItemID`),
  ADD KEY `usr2` (`ClientID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`CpuID`),
  ADD KEY `genera` (`generation`),
  ADD KEY `device_type__` (`Device_Type`);

--
-- Indexes for table `cpugenerations`
--
ALTER TABLE `cpugenerations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`Device_ID`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `currency__` (`CurrencyID`);

--
-- Indexes for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  ADD PRIMARY KEY (`GovernorateID`),
  ADD KEY `IslandID` (`IslandID`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`GPU_ID`),
  ADD UNIQUE KEY `GPU_NAME` (`GPU_NAME`);

--
-- Indexes for table `incart`
--
ALTER TABLE `incart`
  ADD PRIMARY KEY (`Incart_Id`),
  ADD KEY `prod_incar` (`ProductID`),
  ADD KEY `clien_inca` (`ClientID`);

--
-- Indexes for table `islands`
--
ALTER TABLE `islands`
  ADD PRIMARY KEY (`IslandID`),
  ADD KEY `IslandName` (`IslandName`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `cat_1` (`CategoryID`),
  ADD KEY `user_1` (`UserID`),
  ADD KEY `brand_1` (`BrandID`),
  ADD KEY `currency_1` (`CurrencyID`),
  ADD KEY `member_item` (`MemberID`),
  ADD KEY `shipping_islan5` (`ShippingIsland`),
  ADD KEY `discount_promo35` (`Discount`),
  ADD KEY `color_1` (`Color1`),
  ADD KEY `color2` (`Color2`),
  ADD KEY `color_3` (`Color3`),
  ADD KEY `color_4` (`Color4`),
  ADD KEY `color` (`Color`),
  ADD KEY `ram` (`MemoryRAM`),
  ADD KEY `CPU_CDD` (`CPU`),
  ADD KEY `SHP_METH_NGAZI` (`Ship_Method_Ngazidja`),
  ADD KEY `SHP_METH_NDZUWAN` (`Ship_Method_Ndzuwani`),
  ADD KEY `SHP_METH_MWAL` (`Ship_Method_Mwali`),
  ADD KEY `SHP_METH_NGAZI_FRANCE` (`Ship_Method_France`),
  ADD KEY `paymen_meth_ngazidja` (`payment_method_Ngazida`),
  ADD KEY `paymen_meth_nduw` (`payment_method_Ndzuwani`),
  ADD KEY `paymen_meth_mwal` (`payment_method_Mwali`),
  ADD KEY `paymen_meth_france` (`payment_method_France`),
  ADD KEY `MEMOR__` (`MemoryStorage`),
  ADD KEY `OPERAT_SY` (`Operating_System_ID`),
  ADD KEY `VER_OPER` (`Version_Operating_System_ID`),
  ADD KEY `GPU_ID` (`GPU_ID`),
  ADD KEY `sim__` (`sim_id`),
  ADD KEY `ssd__` (`SSD_ID`),
  ADD KEY `Status_Visible_Prod___` (`Status_Visible`);

--
-- Indexes for table `items_allow_place_shiping`
--
ALTER TABLE `items_allow_place_shiping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `island` (`IslandID`),
  ADD KEY `city_` (`CityID`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`Model_ID`),
  ADD KEY `BRAND_ID` (`Brand_ID`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`NameID`),
  ADD KEY `nAME_Clien` (`ClientID`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`connective_id`),
  ADD KEY `device_id` (`Device_ID`);

--
-- Indexes for table `network_for_product`
--
ALTER TABLE `network_for_product`
  ADD PRIMARY KEY (`ne_id`),
  ADD KEY `PRODUCTID__` (`Product_ID`),
  ADD KEY `NETWORK_ID` (`Network_ID`);

--
-- Indexes for table `operating_system`
--
ALTER TABLE `operating_system`
  ADD PRIMARY KEY (`OS_ID`),
  ADD KEY `DEVIC__` (`Device_ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orders_details_id`),
  ADD KEY `ORDER_ORDD` (`OrderID`),
  ADD KEY `product` (`ProductID`),
  ADD KEY `reaward_client` (`reward_for_client_id`),
  ADD KEY `currency_id__` (`CurrencyID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `adress_order_68568` (`Adress`),
  ADD KEY `recepient_con` (`RECEPIENT`),
  ADD KEY `curencyid` (`CurrencyID`),
  ADD KEY `paym_meth` (`payment_method`),
  ADD KEY `palce_ship__` (`Place_shipping`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `payemts_allow_detais`
--
ALTER TABLE `payemts_allow_detais`
  ADD PRIMARY KEY (`__id`),
  ADD KEY `place_shi` (`Place_Ship`),
  ADD KEY `paym_id` (`Payment_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `paypals`
--
ALTER TABLE `paypals`
  ADD PRIMARY KEY (`PaypalID`),
  ADD KEY `ClientPaypal_` (`ClientPayapl`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`PromoID`),
  ADD KEY `clietn_id` (`ClientID`),
  ADD KEY `curen` (`CurrencyID`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`RamID`);

--
-- Indexes for table `report_problem`
--
ALTER TABLE `report_problem`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `reward_withdrawn`
--
ALTER TABLE `reward_withdrawn`
  ADD PRIMARY KEY (`Withdrawn_ID`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`SellerID`),
  ADD KEY `businessLocation` (`BusinessLocation`),
  ADD KEY `Mobile` (`Mobile`) USING BTREE,
  ADD KEY `whoaprovale_seller` (`WhoAprovaled`),
  ADD KEY `client_sele568` (`ClientID`),
  ADD KEY `CITY` (`City`),
  ADD KEY `GOUVERNORA_` (`Gouvernorate`),
  ADD KEY `ISLAND__` (`ISLAND`);

--
-- Indexes for table `seller_payment_method`
--
ALTER TABLE `seller_payment_method`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PAYMENT` (`PaymentID`);

--
-- Indexes for table `serched_word`
--
ALTER TABLE `serched_word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ShippingID`),
  ADD KEY `ShippingName` (`ShippingName`);

--
-- Indexes for table `ship_place`
--
ALTER TABLE `ship_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim_card_slot`
--
ALTER TABLE `sim_card_slot`
  ADD PRIMARY KEY (`SIM_Card_Slot_ID`);

--
-- Indexes for table `ssd`
--
ALTER TABLE `ssd`
  ADD PRIMARY KEY (`SSD_ID`),
  ADD UNIQUE KEY `SSD_VALUE` (`SSD_VALUE`);

--
-- Indexes for table `status_visible_prod`
--
ALTER TABLE `status_visible_prod`
  ADD PRIMARY KEY (`sta_us_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`Storage_ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `time_searched_word`
--
ALTER TABLE `time_searched_word`
  ADD PRIMARY KEY (`time_searched_word_id`),
  ADD KEY `SEARCH_WORD__` (`Searched_word_Id`);

--
-- Indexes for table `used_status_product`
--
ALTER TABLE `used_status_product`
  ADD PRIMARY KEY (`Staus_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`(15));

--
-- Indexes for table `versions_os`
--
ALTER TABLE `versions_os`
  ADD PRIMARY KEY (`version_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `AdressID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `camera_resolution`
--
ALTER TABLE `camera_resolution`
  MODIFY `Resolution_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `CardID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `ColorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `CpuID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000000;

--
-- AUTO_INCREMENT for table `cpugenerations`
--
ALTER TABLE `cpugenerations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `CurrencyID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `Device_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  MODIFY `GovernorateID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `GPU_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000000;

--
-- AUTO_INCREMENT for table `incart`
--
ALTER TABLE `incart`
  MODIFY `Incart_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `islands`
--
ALTER TABLE `islands`
  MODIFY `IslandID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `items_allow_place_shiping`
--
ALTER TABLE `items_allow_place_shiping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `Model_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `NameID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
  MODIFY `connective_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `network_for_product`
--
ALTER TABLE `network_for_product`
  MODIFY `ne_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `operating_system`
--
ALTER TABLE `operating_system`
  MODIFY `OS_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orders_details_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `payemts_allow_detais`
--
ALTER TABLE `payemts_allow_detais`
  MODIFY `__id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paypals`
--
ALTER TABLE `paypals`
  MODIFY `PaypalID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `PromoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `RamID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report_problem`
--
ALTER TABLE `report_problem`
  MODIFY `feedbackid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reward_withdrawn`
--
ALTER TABLE `reward_withdrawn`
  MODIFY `Withdrawn_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `SellerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `seller_payment_method`
--
ALTER TABLE `seller_payment_method`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serched_word`
--
ALTER TABLE `serched_word`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ShippingID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_place`
--
ALTER TABLE `ship_place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sim_card_slot`
--
ALTER TABLE `sim_card_slot`
  MODIFY `SIM_Card_Slot_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ssd`
--
ALTER TABLE `ssd`
  MODIFY `SSD_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_visible_prod`
--
ALTER TABLE `status_visible_prod`
  MODIFY `sta_us_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `Storage_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time_searched_word`
--
ALTER TABLE `time_searched_word`
  MODIFY `time_searched_word_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `used_status_product`
--
ALTER TABLE `used_status_product`
  MODIFY `Staus_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int NOT NULL AUTO_INCREMENT COMMENT 'to identify user', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `versions_os`
--
ALTER TABLE `versions_os`
  MODIFY `version_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_client56` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `City_adr5` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `gouver_adres62` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `CATEGORY__` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cardClient` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `gouvernemant_cit` FOREIGN KEY (`GovernorateID`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `islan_city` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `city_client` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `gouvernemant_client` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `island_client` FOREIGN KEY (`Island`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr2` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `device_type__` FOREIGN KEY (`Device_Type`) REFERENCES `devices` (`Device_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `genera` FOREIGN KEY (`generation`) REFERENCES `cpugenerations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `exchange`
--
ALTER TABLE `exchange`
  ADD CONSTRAINT `currency__` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON UPDATE CASCADE;

--
-- Constraints for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  ADD CONSTRAINT `Island_gouv` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `incart`
--
ALTER TABLE `incart`
  ADD CONSTRAINT `clien_inca` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_incar` FOREIGN KEY (`ProductID`) REFERENCES `items` (`ItemID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `brand_1` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `CPU_CDD` FOREIGN KEY (`CPU`) REFERENCES `cpu` (`CpuID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `currency_1` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `GPU_ID` FOREIGN KEY (`GPU_ID`) REFERENCES `gpu` (`GPU_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `member_item` FOREIGN KEY (`MemberID`) REFERENCES `sellers` (`SellerID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `MEMOR__` FOREIGN KEY (`MemoryStorage`) REFERENCES `storage` (`Storage_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `OPERAT_SY` FOREIGN KEY (`Operating_System_ID`) REFERENCES `operating_system` (`OS_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `RAM__` FOREIGN KEY (`MemoryRAM`) REFERENCES `ram` (`RamID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_MWAL` FOREIGN KEY (`Ship_Method_Mwali`) REFERENCES `shipping` (`ShippingID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NDZUWAN` FOREIGN KEY (`Ship_Method_Ndzuwani`) REFERENCES `shipping` (`ShippingID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NGAZI` FOREIGN KEY (`Ship_Method_Ngazidja`) REFERENCES `shipping` (`ShippingID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NGAZI_FRANCE` FOREIGN KEY (`Ship_Method_France`) REFERENCES `shipping` (`ShippingID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sim__` FOREIGN KEY (`sim_id`) REFERENCES `sim_card_slot` (`SIM_Card_Slot_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ssd__` FOREIGN KEY (`SSD_ID`) REFERENCES `ssd` (`SSD_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Status_Visible_Prod___` FOREIGN KEY (`Status_Visible`) REFERENCES `status_visible_prod` (`sta_us_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserId`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `VER_OPER` FOREIGN KEY (`Version_Operating_System_ID`) REFERENCES `versions_os` (`version_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `items_allow_place_shiping`
--
ALTER TABLE `items_allow_place_shiping`
  ADD CONSTRAINT `city_` FOREIGN KEY (`CityID`) REFERENCES `cities` (`CityID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `island` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON UPDATE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `BRAND_ID` FOREIGN KEY (`Brand_ID`) REFERENCES `brand` (`BrandID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `names`
--
ALTER TABLE `names`
  ADD CONSTRAINT `nAME_Clien` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `network`
--
ALTER TABLE `network`
  ADD CONSTRAINT `device_id` FOREIGN KEY (`Device_ID`) REFERENCES `devices` (`Device_ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `network_for_product`
--
ALTER TABLE `network_for_product`
  ADD CONSTRAINT `NETWORK_ID` FOREIGN KEY (`Network_ID`) REFERENCES `network` (`connective_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCTID__` FOREIGN KEY (`Product_ID`) REFERENCES `items` (`ItemID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `operating_system`
--
ALTER TABLE `operating_system`
  ADD CONSTRAINT `DEVIC__` FOREIGN KEY (`Device_ID`) REFERENCES `devices` (`Device_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `currency_id__` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`ProductID`) REFERENCES `items` (`ItemID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reaward_client` FOREIGN KEY (`reward_for_client_id`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `clien_di` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `curencyid` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `palce_ship__` FOREIGN KEY (`Place_shipping`) REFERENCES `ship_place` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `paym_meth` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`payment_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payemts_allow_detais`
--
ALTER TABLE `payemts_allow_detais`
  ADD CONSTRAINT `paym_id` FOREIGN KEY (`Payment_id`) REFERENCES `payment_method` (`payment_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `place_shi` FOREIGN KEY (`Place_Ship`) REFERENCES `ship_place` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paypals`
--
ALTER TABLE `paypals`
  ADD CONSTRAINT `ClientPaypal_` FOREIGN KEY (`ClientPayapl`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `clietn_id` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `curen` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `businessLocation` FOREIGN KEY (`BusinessLocation`) REFERENCES `countries` (`CountryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `CITY` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `client_sele568` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `GOUVERNORA_` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ISLAND__` FOREIGN KEY (`ISLAND`) REFERENCES `islands` (`IslandID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `whoaprovale_seller` FOREIGN KEY (`WhoAprovaled`) REFERENCES `users` (`UserId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `seller_payment_method`
--
ALTER TABLE `seller_payment_method`
  ADD CONSTRAINT `PAYMENT` FOREIGN KEY (`PaymentID`) REFERENCES `payment_method` (`payment_id`) ON UPDATE CASCADE;

--
-- Constraints for table `time_searched_word`
--
ALTER TABLE `time_searched_word`
  ADD CONSTRAINT `SEARCH_WORD__` FOREIGN KEY (`Searched_word_Id`) REFERENCES `serched_word` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
