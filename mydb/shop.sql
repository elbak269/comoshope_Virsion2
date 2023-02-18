-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 02:21 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `AdressID` int(11) NOT NULL,
  `City` int(11) DEFAULT NULL,
  `Gouvernorate` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `PlaceDescription` varchar(255) DEFAULT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`AdressID`, `City`, `Gouvernorate`, `ClientID`, `PlaceDescription`, `IslandID`, `CountryID`) VALUES
(2, 1, 2, 1, 'PHILIPS', 1, 1),
(3, 1, 2, 1, 'Magoudjou', 1, 1),
(4, 1, 2, 1, 'Philips', 1, 1),
(5, 12, 1, 1, 'mdrawadjouu', 1, 1),
(6, 1, 2, 1, NULL, 1, 1),
(10, 1, 2, 2, 'jksncjs', 1, 1),
(11, 1, 2, 2, 'rdfvrtsh', 1, 1),
(12, 1, 2, 2, 'dcnsndm', 1, 1),
(15, 1, 2, 2, 'cgdf', 1, 1),
(16, 1, 2, 2, 'OSIS', 1, 1),
(17, 2, 2, 1, '52', 1, 1),
(19, 2, 2, 1, 'Badjanani', 1, 1),
(20, 12, 1, 1, 'paris', 1, 1),
(33, 2, 2, 1, 'fhjrtfshxbfryttttttttttttttttttttttttttttttttttttttttttttttttttttc', 1, 1),
(34, 2, 2, 1, 'dxtujes65uj46ea5s', 1, 1),
(36, 2, 2, 1, 'zd64eh6dr4htdr54jr5s7808530', 1, 1),
(50, 2, 2, 1, 'DTGHFTDS', 1, 1),
(54, 2, 2, 1, 'TDJY', 1, 1),
(56, 2, 2, 1, 'TDUJR76', 1, 1),
(62, 2, 2, 1, '524654656', 1, 1),
(64, 2, 2, 1, 'rstrhy', 1, 1),
(73, 2, 2, 1, '58895688', 1, 1),
(74, 1, 1, 1, 'iugguy', 1, 1),
(75, 12, 1, 1, 'mdarya', 1, 1),
(80, 13, NULL, 1, 'Lacpurneuve ', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(255) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(460, 'LG', 57);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `CardID` int(11) NOT NULL,
  `CardNumber` bigint(17) NOT NULL,
  `CardName` varchar(255) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `MM` tinyint(4) NOT NULL,
  `YY` tinyint(4) NOT NULL,
  `CVC` smallint(4) NOT NULL,
  `DateSet` datetime NOT NULL,
  `Order_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Ordering` int(11) DEFAULT NULL,
  `Visibilty` tinyint(4) DEFAULT NULL,
  `AllowComment` tinyint(4) NOT NULL DEFAULT '0',
  `AllowAds` tinyint(4) NOT NULL DEFAULT '0',
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(58, 'Plastic', NULL, NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(255) NOT NULL,
  `GovernorateID` int(11) DEFAULT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `CountrID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ClientID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `City` int(11) DEFAULT NULL,
  `Island` int(11) DEFAULT NULL,
  `Gouvernorate` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Country` varchar(255) NOT NULL,
  `IslandName` varchar(255) DEFAULT NULL,
  `Mobile` bigint(17) DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL,
  `CodeChat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`, `FullName`, `City`, `Island`, `Gouvernorate`, `Date`, `Country`, `IslandName`, `Mobile`, `Avatar`, `CodeChat`) VALUES
(1, 'elbak', '1234', 'elbak1995@gmail.com', 'Elbak', 'Mahmoud', 'Elbak Mahmoud', 9, 1, 6, '2019-11-27', 'Comors', '', 10566588, 'theme/image/userImg/elbak/32060200717012317pm.JPG', 16578956),
(2, 'salim', '1234', 'Salim@hotmail.com', 'Salim', 'Mahmoud', '', 0, 0, 0, '2019-11-30', '', NULL, 0, 'theme/image/userImg/salim/22390200225045430am.JPG', 89468579),
(3, 'Amanata', '1234', 'Amanata@gmail.com', 'Amanata', 'Mahmoud', '', 1, 1, 1, '2019-12-17', 'Comoros', NULL, 335685, '', 568945368),
(18, 'salima', '1234', 'salim@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 752200605010450),
(19, 'Idriss', '1234', 'Idriss@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 405200605064324),
(20, 'salmata', '1234', 'elbak269@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 443200703022118),
(21, 'manzel', '1234', 'mazel@gmail.com', 'Manzel', 'Said', NULL, NULL, NULL, NULL, '2020-07-03', '', NULL, NULL, NULL, 0),
(22, 'Mahmoud', '1234', 'Mahmoud@gmail.com', 'Mahmoud', 'Said', NULL, NULL, NULL, NULL, '2020-07-03', '', NULL, NULL, NULL, 0),
(24, 'said', '1234', 'said@gmail.com', 'said', 'assoumani', NULL, NULL, NULL, NULL, '2020-07-04', '', NULL, NULL, 'theme/image/userImg/said/603755816424.jpg', 0),
(25, 'nokuthula', '1234', 'nokuthula@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, 'theme/image/userImg/nokuthula/9079200706033006am.JPG', 153200706125822);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `ColorID` int(11) NOT NULL,
  `ColorCode` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ColorName` varchar(255) CHARACTER SET utf8 DEFAULT NULL
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
  `Comment_ID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `CommentDate` date NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `Rating` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `CpuID` int(11) NOT NULL,
  `CPUNAME` varchar(255) NOT NULL,
  `generation` int(11) DEFAULT NULL,
  `Device_Type` int(11) DEFAULT NULL
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
  `id` int(11) NOT NULL,
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
  `CurrencyID` int(11) NOT NULL,
  `CurrencyName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`CurrencyID`, `CurrencyName`) VALUES
(1, 'EUR'),
(2, 'KMF');

-- --------------------------------------------------------

--
-- Table structure for table `gouvernorate`
--

CREATE TABLE `gouvernorate` (
  `GovernorateID` int(11) NOT NULL,
  `GouvernoratName` varchar(255) NOT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `shipping_price` decimal(10,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `incart`
--

CREATE TABLE `incart` (
  `ProductID` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incart`
--

INSERT INTO `incart` (`ProductID`, `QTY`, `ClientID`) VALUES
(NULL, 2, 1),
(NULL, 1, 1),
(NULL, 6, 1),
(NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `islands`
--

CREATE TABLE `islands` (
  `IslandID` int(11) NOT NULL,
  `IslandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ItemID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Price` varchar(255) DEFAULT NULL,
  `CurrencyID` int(11) DEFAULT NULL,
  `AddDate` date NOT NULL,
  `CountryMade` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `Rating` smallint(6) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `Pic1` varchar(255) NOT NULL,
  `Pic2` varchar(255) NOT NULL,
  `Pic3` varchar(255) NOT NULL,
  `MembersName` varchar(255) DEFAULT NULL,
  `Offer` int(11) NOT NULL,
  `Tags` text,
  `Color` int(11) DEFAULT NULL,
  `CPUSpeed` varchar(100) NOT NULL,
  `NumberOfSIM` tinyint(4) NOT NULL,
  `MobilePhoneType` tinyint(50) NOT NULL,
  `CellulaNetworkTechnology` tinyint(4) NOT NULL,
  `CPU` int(11) DEFAULT NULL,
  `BatteryCapacityinmAh` varchar(255) NOT NULL,
  `Expirable` date DEFAULT NULL,
  `SerialScanRequired` varchar(255) NOT NULL,
  `FrontCamera` varchar(100) NOT NULL,
  `FastCharge` tinyint(1) NOT NULL,
  `Imagequality` varchar(50) NOT NULL,
  `MemoryRAM` int(11) DEFAULT NULL,
  `Operating_System_ID` int(11) DEFAULT NULL,
  `Version_Operating_System_ID` int(11) DEFAULT NULL,
  `ShippingCountry` int(11) DEFAULT NULL,
  `ShippingIsland` int(11) DEFAULT NULL,
  `Discount` int(11) DEFAULT '0',
  `Color1` int(11) DEFAULT NULL,
  `Color2` int(11) DEFAULT NULL,
  `Color3` int(11) DEFAULT NULL,
  `Color4` int(11) DEFAULT NULL,
  `MemoryStorage` int(11) DEFAULT NULL,
  `ship_ngazidja` smallint(15) DEFAULT '0',
  `ship_ndzouwani` smallint(15) DEFAULT '0',
  `ship_mwali` smallint(15) DEFAULT '0',
  `ship_france` smallint(15) DEFAULT '0',
  `ship_ngazidja_price` varchar(100) DEFAULT NULL,
  `ship_ndzouwani_price` varchar(100) DEFAULT NULL,
  `ship_mwali_price` varchar(100) DEFAULT NULL,
  `ship_france_price` varchar(100) DEFAULT NULL,
  `Estamited_Delivery_Ngzidja` smallint(6) DEFAULT NULL,
  `Estamited_Delivery_Nduwani` smallint(6) DEFAULT NULL,
  `Estamited_Delivery_Mwali` smallint(6) DEFAULT NULL,
  `Estamited_Delivery_France` smallint(6) DEFAULT NULL,
  `Ship_Method_Ngazidja` int(11) DEFAULT NULL,
  `Ship_Method_Ndzuwani` int(11) DEFAULT NULL,
  `Ship_Method_Mwali` int(11) DEFAULT NULL,
  `Ship_Method_France` int(11) DEFAULT NULL,
  `payment_method_Ngazida` int(11) DEFAULT NULL,
  `payment_method_Ndzuwani` int(11) DEFAULT NULL,
  `payment_method_Mwali` int(11) DEFAULT NULL,
  `payment_method_France` int(11) DEFAULT NULL,
  `GPU_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Description`, `Price`, `CurrencyID`, `AddDate`, `CountryMade`, `Image`, `Status`, `Rating`, `CategoryID`, `MemberID`, `UserID`, `BrandID`, `Pic1`, `Pic2`, `Pic3`, `MembersName`, `Offer`, `Tags`, `Color`, `CPUSpeed`, `NumberOfSIM`, `MobilePhoneType`, `CellulaNetworkTechnology`, `CPU`, `BatteryCapacityinmAh`, `Expirable`, `SerialScanRequired`, `FrontCamera`, `FastCharge`, `Imagequality`, `MemoryRAM`, `Operating_System_ID`, `Version_Operating_System_ID`, `ShippingCountry`, `ShippingIsland`, `Discount`, `Color1`, `Color2`, `Color3`, `Color4`, `MemoryStorage`, `ship_ngazidja`, `ship_ndzouwani`, `ship_mwali`, `ship_france`, `ship_ngazidja_price`, `ship_ndzouwani_price`, `ship_mwali_price`, `ship_france_price`, `Estamited_Delivery_Ngzidja`, `Estamited_Delivery_Nduwani`, `Estamited_Delivery_Mwali`, `Estamited_Delivery_France`, `Ship_Method_Ngazidja`, `Ship_Method_Ndzuwani`, `Ship_Method_Mwali`, `Ship_Method_France`, `payment_method_Ngazida`, `payment_method_Ndzuwani`, `payment_method_Mwali`, `payment_method_France`, `GPU_ID`) VALUES
(4, 'IPhone 11 pro', 'iPhone 11 ApPle', '700', 1, '2020-10-05', 'USA', '', 'Neuf', 0, 28, 1, NULL, 4, 'elbak/21034459821111.JPG', 'elbak/21034459821112.JPG', 'elbak/21034459821113.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '10', '11', '12', '14', 1, 2, 3, 4, 3, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Samsung Note 20', 'Samsung Note 20', '1000', 1, '2020-10-05', 'South Korea', '', 'Neuf', 0, 28, 1, NULL, 459, 'elbak/76158522511881.JPG', 'elbak/76158522511882.JPG', 'elbak/76158522511883.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', 8, 1, 18, NULL, NULL, 0, NULL, NULL, NULL, NULL, 7, 1, 0, 0, 0, '20', '0', '0', '0', 1, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Router Tp-link', 'ROuter', '25', 1, '2020-10-09', 'egypt', '', 'Neuf', 0, 22, 1, NULL, 7, 'elbak/93404609785921.JPG', 'elbak/93404609785922.JPG', 'elbak/93404609785923.JPG', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '15', '0', '0', '0', 2, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `NameID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`NameID`, `ClientID`, `FirstName`, `LastName`) VALUES
(1, 1, 'mahmoud', 'said'),
(2, NULL, 'fatoumia', 'ali'),
(3, 1, 'Fatoumia', 'Ali'),
(4, 1, 'dse56yh', 'rs6uhy5er46'),
(5, 1, 'Elbak', 'Mahmoud'),
(6, 1, 'SAYED', 'ASSOUMANI'),
(7, 1, 'SAYED', 'Asoumani'),
(8, 1, 'SALIM', 'MAHAMOUD'),
(9, 1, 'elbak', 'mahmoud sayed'),
(10, 1, 'rdsghd', 'dfthdr'),
(11, 1, 'fgbh', 'ftgh'),
(12, 1, 'kassi', 'lalala'),
(13, 1, 'elbak', 'mahamoud'),
(14, 1, 'salmata', 'mahmoud'),
(15, 1, 'salima', 'mahmoud'),
(16, 1, 'salim', 'mahamoud'),
(17, 1, 'salmat', 'sayed');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orders_details_id` int(11) NOT NULL,
  `OrderID` bigint(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `CurrencyID` int(11) DEFAULT NULL,
  `PromoCode` varchar(100) DEFAULT NULL,
  `Discount` varchar(200) DEFAULT NULL,
  `StatusOrder` smallint(6) NOT NULL,
  `Expected_delvery_date` date DEFAULT NULL,
  `DelevredDate` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `Product_Img_For_Return` varchar(255) DEFAULT NULL,
  `reason_for_returned_orders` text,
  `reward_for_client_id` int(11) DEFAULT NULL,
  `Shipr_Price` varchar(255) NOT NULL,
  `SallerID` int(11) NOT NULL,
  `Code_For_Self_Ship` bigint(20) NOT NULL,
  `date_asked_for_return` datetime DEFAULT NULL,
  `Order_Returned_Code` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orders_details_id`, `OrderID`, `ProductID`, `QTY`, `amount`, `total_amount`, `CurrencyID`, `PromoCode`, `Discount`, `StatusOrder`, `Expected_delvery_date`, `DelevredDate`, `date_returned`, `Product_Img_For_Return`, `reason_for_returned_orders`, `reward_for_client_id`, `Shipr_Price`, `SallerID`, `Code_For_Self_Ship`, `date_asked_for_return`, `Order_Returned_Code`) VALUES
(1, 122040164222, 4, 2, '1400', '1410', 2, NULL, '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '10', 1, 31114722578789, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` bigint(20) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `RequestDate` date NOT NULL,
  `DelevredDate` date NOT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `RECEPIENT` varchar(255) DEFAULT NULL,
  `TotalOrder` varchar(200) NOT NULL,
  `CurrencyID` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT '0',
  `Place_shipping` int(11) DEFAULT NULL,
  `Track_Number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ClientID`, `RequestDate`, `DelevredDate`, `Adress`, `RECEPIENT`, `TotalOrder`, `CurrencyID`, `payment_method`, `Place_shipping`, `Track_Number`) VALUES
(122040164222, 1, '2020-10-06', '0000-00-00', 'Moroni NGazidja', 'elbak mahmoud', '1410', 2, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `Status_id` smallint(6) NOT NULL,
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
-- Table structure for table `paypals`
--

CREATE TABLE `paypals` (
  `PaypalID` int(11) NOT NULL,
  `PaypalEmail` varchar(255) NOT NULL,
  `ClientPayapl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paypals`
--

INSERT INTO `paypals` (`PaypalID`, `PaypalEmail`, `ClientPayapl`) VALUES
(4, 'Elbak1995@gmail.com', 1),
(5, 'elbak269@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `PromoID` int(11) NOT NULL,
  `PromoCode` varchar(60) NOT NULL,
  `Discount` int(11) NOT NULL,
  `CurrencyID` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`PromoID`, `PromoCode`, `Discount`, `CurrencyID`, `ClientID`) VALUES
(1, '56xjd', 18, 2, 1),
(2, '25G25', 15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `SellerID` int(11) NOT NULL,
  `StoreName` varchar(255) DEFAULT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `RegisterDate` date DEFAULT NULL,
  `TrustStatus` tinyint(4) DEFAULT NULL COMMENT 'seller rank',
  `Aprovable` tinyint(4) DEFAULT NULL,
  `Delleted` tinyint(4) DEFAULT '0',
  `WhoDelleted` int(11) DEFAULT NULL,
  `DateDeleted` date DEFAULT NULL,
  `WhoAprovaled` int(11) DEFAULT NULL,
  `BusinessLocation` int(11) DEFAULT NULL,
  `IslandStore` varchar(255) DEFAULT NULL,
  `StoreAdress` varchar(255) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `PlaceDescription` varchar(255) NOT NULL,
  `Gouvernorate` int(11) NOT NULL,
  `City` int(11) NOT NULL,
  `ISLAND` int(11) DEFAULT NULL,
  `Verificated` varchar(15) DEFAULT NULL,
  `BestSeller` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`SellerID`, `StoreName`, `Mobile`, `RegisterDate`, `TrustStatus`, `Aprovable`, `Delleted`, `WhoDelleted`, `DateDeleted`, `WhoAprovaled`, `BusinessLocation`, `IslandStore`, `StoreAdress`, `ClientID`, `PlaceDescription`, `Gouvernorate`, `City`, `ISLAND`, `Verificated`, `BestSeller`) VALUES
(1, 'Comoshop', 1140017342, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 1, '4', 'Moroni', 1, '', 0, 0, 0, 'true', 'true'),
(2, 'ComoSyst', 1098090201, '2019-12-31', 5, 6, 0, 0, '0000-00-00', 1, 1, 'Ngazidja', 'Moroni', NULL, '', 0, 0, 0, 'true', NULL),
(3, 'ComoSyst', 333036, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 2, '1', 'Dimadjou Hamahamet', 2, '', 0, 0, 0, 'true', NULL),
(4, 'Amanata', 353542, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 1, '1', '5864822', 3, '', 0, 0, 0, 'true', 'true'),
(47, 'ComoSys', NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 18, '', 0, 0, NULL, 'true', NULL),
(58, 'comorco', NULL, NULL, NULL, 4, 0, NULL, NULL, NULL, 2, NULL, NULL, 19, 'dje', 0, 13, NULL, 'true', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ShippingID` int(11) NOT NULL,
  `ShippingName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ShippingID`, `ShippingName`) VALUES
(1, 'DHL'),
(3, 'Self'),
(2, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL COMMENT 'to identify user',
  `Username` varchar(255) NOT NULL COMMENT 'username to login',
  `FirstName` varchar(255) NOT NULL,
  `LastNmae` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL COMMENT 'password to login',
  `Email` varchar(255) NOT NULL,
  `Mobile` int(17) NOT NULL,
  `TrustStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'seller rank',
  `RegStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'user approval',
  `WhoAdded` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `UserDeleted` int(11) NOT NULL DEFAULT '0',
  `WhoDeleted` varchar(250) NOT NULL,
  `WhoActivated` varchar(250) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Governorate` varchar(255) NOT NULL,
  `Island` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `GroupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `FirstName`, `LastNmae`, `Password`, `Email`, `Mobile`, `TrustStatus`, `RegStatus`, `WhoAdded`, `Date`, `UserDeleted`, `WhoDeleted`, `WhoActivated`, `avatar`, `City`, `Governorate`, `Island`, `Country`, `FullName`, `GroupID`) VALUES
(1, 'elbak', '', '', '1234', 'elbak269@gmail.com', 140017342, 1, 1, 'elbak', '2019-11-01', 0, '', 'elbak', '', 'Dimadjou', 'Hamahamet', 'Ngazidja', 'Comores', '', 1),
(2, 'salmata', '', '', '1234', 'salmat@gmail.com', 0, 0, 1, 'elbak', '2019-11-07', 0, '', 'elbak', '', '0', '0', '', 'Egyp[', '', 0);

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
-- Indexes for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  ADD PRIMARY KEY (`GovernorateID`),
  ADD KEY `IslandID` (`IslandID`);

--
-- Indexes for table `incart`
--
ALTER TABLE `incart`
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
  ADD KEY `GPU_ID` (`GPU_ID`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`NameID`),
  ADD KEY `nAME_Clien` (`ClientID`);

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
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ShippingID`),
  ADD KEY `ShippingName` (`ShippingName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`(15));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `AdressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `ColorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `CpuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000000;

--
-- AUTO_INCREMENT for table `cpugenerations`
--
ALTER TABLE `cpugenerations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `CurrencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  MODIFY `GovernorateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `islands`
--
ALTER TABLE `islands`
  MODIFY `IslandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `NameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orders_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paypals`
--
ALTER TABLE `paypals`
  MODIFY `PaypalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `PromoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `SellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ShippingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'to identify user', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `City_adr5` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `adress_client56` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `gouver_adres62` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `CATEGORY__` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `CPU_CDD` FOREIGN KEY (`CPU`) REFERENCES `cpu` (`CpuID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `GPU_ID` FOREIGN KEY (`GPU_ID`) REFERENCES `gpu` (`GPU_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `MEMOR__` FOREIGN KEY (`MemoryStorage`) REFERENCES `storage` (`Storage_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `OPERAT_SY` FOREIGN KEY (`Operating_System_ID`) REFERENCES `operating_system` (`OS_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `RAM__` FOREIGN KEY (`MemoryRAM`) REFERENCES `ram` (`RamID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_MWAL` FOREIGN KEY (`Ship_Method_Mwali`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NDZUWAN` FOREIGN KEY (`Ship_Method_Ndzuwani`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NGAZI` FOREIGN KEY (`Ship_Method_Ngazidja`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NGAZI_FRANCE` FOREIGN KEY (`Ship_Method_France`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `VER_OPER` FOREIGN KEY (`Version_Operating_System_ID`) REFERENCES `versions_os` (`version_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `brand_1` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `currency_1` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `member_item` FOREIGN KEY (`MemberID`) REFERENCES `sellers` (`SellerID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserId`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `names`
--
ALTER TABLE `names`
  ADD CONSTRAINT `nAME_Clien` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `currency_id__` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`ProductID`) REFERENCES `items` (`ItemID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reaward_client` FOREIGN KEY (`reward_for_client_id`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `clien_di` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `curencyid` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `palce_ship__` FOREIGN KEY (`Place_shipping`) REFERENCES `ship_place` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `paym_meth` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `CITY` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `GOUVERNORA_` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ISLAND__` FOREIGN KEY (`ISLAND`) REFERENCES `islands` (`IslandID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `businessLocation` FOREIGN KEY (`BusinessLocation`) REFERENCES `countries` (`CountryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `client_sele568` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `whoaprovale_seller` FOREIGN KEY (`WhoAprovaled`) REFERENCES `users` (`UserId`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
