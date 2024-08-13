-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 11:33 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-pipe-immigration`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_considerations`
--

CREATE TABLE `additional_considerations` (
  `id` int NOT NULL,
  `UserID` int NOT NULL,
  `anyCommunicableDisease` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anyMissingVaccines` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anyMentalDisorder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accusedDrugAddiction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accusedChildAbduction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deportedFromUS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenshipAfter96` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `electionsVoted` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `capacityToSupport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otherQuestions` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '''''',
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_considerations`
--

INSERT INTO `additional_considerations` (`id`, `UserID`, `anyCommunicableDisease`, `anyMissingVaccines`, `anyMentalDisorder`, `accusedDrugAddiction`, `accusedChildAbduction`, `deportedFromUS`, `citizenshipAfter96`, `electionsVoted`, `capacityToSupport`, `otherQuestions`, `updatedAt`) VALUES
(3, 121, 'Leprosy', '', '', '', '', '', '', '', '', 'None', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `inCareOfName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `street2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Apartment` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Suite` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Floor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homePhone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `workPhone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergencyContact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergencyPhone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `UserID`, `inCareOfName`, `street1`, `street2`, `Apartment`, `Suite`, `Floor`, `homePhone`, `workPhone`, `emergencyContact`, `emergencyPhone`, `createdAt`, `updatedAt`) VALUES
(127, 121, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', NULL, NULL, 'Abcd', '123333', '1234', 'Abcd 123', '33994040353', '2024-08-13 21:17:36', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `UserID` int NOT NULL,
  `DateTime` datetime NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Goal` varchar(3000) NOT NULL,
  `Notes` varchar(5000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE `attorney` (
  `attorneyID` int NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `StreetNumberName` varchar(100) DEFAULT NULL,
  `Suite` varchar(10) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `ZipCode` varchar(10) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `DayTimePhone` varchar(20) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `FaxNumber` varchar(50) DEFAULT NULL,
  `Eligibility` varchar(3) DEFAULT NULL,
  `LicensingAuthority` varchar(2) DEFAULT NULL,
  `BarNumber` varchar(10) DEFAULT NULL,
  `USCISOnlineNo` varchar(12) NOT NULL,
  `NotLegallyRestricted` varchar(3) DEFAULT NULL,
  `NameofLawFirm` varchar(100) DEFAULT NULL,
  `OfficeHours` varchar(100) DEFAULT NULL,
  `Notes` varchar(1500) DEFAULT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attorney`
--

INSERT INTO `attorney` (`attorneyID`, `LastName`, `FirstName`, `MiddleName`, `StreetNumberName`, `Suite`, `City`, `State`, `ZipCode`, `Country`, `DayTimePhone`, `emailAddress`, `FaxNumber`, `Eligibility`, `LicensingAuthority`, `BarNumber`, `USCISOnlineNo`, `NotLegallyRestricted`, `NameofLawFirm`, `OfficeHours`, `Notes`, `Updated`) VALUES
(1, 'Suriel', 'Nicomedes', 'E.', '7220 N. 16th Street', 'F', 'Phoenix', 'AZ', '85020', 'United States of America', '(602) 297-2005', 'ayuda@usainmigracion.mx', '(480) 718-7564', 'Yes', 'AZ', '016317', '009413075162', 'Yes', 'The Law Of Nicomedes E. Suriel, LLC', 'Monday to Fridays 9 AM to 5 PM, closed an hour for lunch at noon', NULL, '2024-07-30 12:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE `certification` (
  `id` int NOT NULL,
  `UserID` int NOT NULL,
  `certificationDegree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `degreeUniversity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `degreeDate` date NOT NULL,
  `degreeStateAndCountry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`id`, `UserID`, `certificationDegree`, `degreeUniversity`, `degreeDate`, `degreeStateAndCountry`, `updatedAt`) VALUES
(38, 121, 'Nooo', 'abcd', '2024-08-31', 'Pakistan', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_or_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `locked_until` datetime DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `first_name`, `last_name`, `email_or_phone`, `password`, `verified`, `status`, `locked_until`, `createdAt`, `updatedAt`) VALUES
(10, 'Syed Muhammad Anas Bukhari', '', 'anas14529@gmail.com', '$2y$10$kMkNiV4JOwUw4ALryU1AUOpTG.GqTE7gy3tdvi2Rfri8iTu2HFYZq', 1, '', NULL, '2024-07-26 23:56:00', '2024-07-27 22:28:43'),
(11, 'Syed Muhammad Anas', 'Bukhari', 'f4futuretech@gmail.com', '$2y$10$DVUj0Z7jdfwcyuQruPLMqONpvP470FokeytE5toiTX9wkqfmhxxta', 1, '', NULL, '2024-07-27 00:32:58', '2024-08-07 13:54:08'),
(12, 'Dilia Suriel', '', 'dilia@appliedinsightinc.com', '$2y$10$brGt.JDR8Oexou9jJOxyheAOK/9Dt5uh8TSEkm1n155heoz8/yj/y', 1, '', NULL, '2024-07-27 01:45:18', '2024-07-27 01:45:18'),
(13, 'Diana Rockweel', '', 'dsuriel1218@gmail.com', '$2y$10$SAkJUcnTPU6GMrLswsFYDe2dbLN3QZh3zNK34HTJuv7D0t7a/9eRq', 1, '', NULL, '2024-07-27 17:58:40', '2024-07-27 17:58:40'),
(14, 'Matthew Suria', '', 'matthew@itstaskable.com', '$2y$10$dUVfsPk7DCe8YbQDcHobqOuIz3LLD6BeeoomdJVNO8gfbTwYuubpW', 1, '', NULL, '2024-07-27 19:11:56', '2024-07-27 19:11:56'),
(16, 'Dllia Suriel', '', 'dilia@usainmigracion.mx', '$2y$10$rQMj8hivWD.FlUSAWa4fGeTAAfD8KHzaobhSKku9ouytvG.SwIJlq', 1, '', NULL, '2024-07-28 13:10:57', '2024-07-28 13:10:57'),
(17, 'Dilia Suriel', '', 'pepe@gmail.com', '$2y$10$7tiF87V3ZXYZAOyFRZI6YebMBicR4VicD89irzqUDKV/8R2OQ9X0y', 1, '', NULL, '2024-07-28 14:32:39', '2024-07-28 14:32:39'),
(20, 'Anas', '', 'futuretest45@gmail.com', '$2y$10$xpgvx56IX2e5FNvi0MSigezLbYhzMiXxM.ToTaJynRvWSfjiCUXuu', 1, '', NULL, '2024-07-28 16:33:11', '2024-07-28 16:33:38'),
(22, 'AB', '', '+1 (555) 555-5555', '$2y$10$ZIpmEphdo9T.LKmFQjiEgOgSpH1zAiUYGln/QfvJPXqNx21QWlLUu', 1, '', NULL, '2024-07-28 16:41:22', '2024-07-28 16:41:22'),
(23, 'Dilia Suriel', '', 'ayuga@usainmigracion.mx', '$2y$10$hMpEQ.3xh2TU0LYiC4F9IuH99Oz4xpzLomUXiDtlueMCPYzOp0Uiu', 0, '', NULL, '2024-07-28 16:45:43', '2024-07-28 16:45:43'),
(24, 'Testing phone number', '', '+524151441187', '$2y$10$hW9EWJ8tT7OBnet/zt1YGujueakiXLK1UA61P9AU3sG/OPvIX/nFe', 1, '', NULL, '2024-07-28 16:48:47', '2024-07-28 16:48:47'),
(25, 'Testing phone number', '', 'dilia@thinwomanbrain.com', '$2y$10$zlCh5NI9DGN8zX6.OofEU.FEeFHMM7owASLOOOf8Q72vE7oDpgNO.', 1, '', NULL, '2024-07-28 16:51:18', '2024-07-28 16:52:32'),
(26, 'Matt Suria', '', 'mandre4521@gmail.com', '$2y$10$9cRCXKIAtpSK9RWvFjs5Bu2Drj5Du8fhz92KhuyJ/OC1/fZSLY7b.', 1, '', NULL, '2024-07-29 18:41:58', '2024-07-29 18:42:20'),
(27, 'Matt Suria', '', 'mgsuria3@gmail.com', '$2y$10$grJMH4IaVuSDRcONtA1WZ.ruxaPK/pHPKlpAJ7xHQGphVE5dm8.aq', 0, '', NULL, '2024-07-29 18:51:39', '2024-07-29 18:51:39'),
(28, 'Matthew Suria', '', 'msuria889@outlook.com', '$2y$10$7EMKcQP.wqxkuUeR/r2Rjuh7gXRHUfF18/WSZWEWUOoMqN9UPo32y', 0, '', NULL, '2024-07-29 21:05:47', '2024-07-29 21:05:47'),
(29, 'Gina Testing', '', 'rgalderton@yahoo.com', '$2y$10$jBPYnJNAZK//8cgnPagEx.pvcmf2OCKfQcoXbNP5JbVvGB5h16vIa', 0, '', NULL, '2024-07-29 21:19:41', '2024-07-29 21:19:41'),
(30, 'Gina Testing2', '', 'myspanishteacher111@gmail.com', '$2y$10$GH6rdgUUPfOPbRNrHpLbJeQZc20f1HIk9qk5rLe1aEgcMfl3OT5Q.', 1, '', NULL, '2024-07-29 21:26:39', '2024-07-29 21:27:13'),
(31, 'Anas', '', '+52 415 144 1187', '$2y$10$.AycUaxruB8bS.4SBrJUX.IcKP5niQzE8UJ.14e1iGzI7y4azLNpy', 0, '', NULL, '2024-08-02 02:20:52', '2024-08-02 02:20:52'),
(32, 'Anas', '', '602-399-7645', '$2y$10$dxLCDYGnPPGDO/SjyGIFgexeWGdtZ0a377riNdBvAzNbQvy6KfseC', 0, '', NULL, '2024-08-02 02:21:11', '2024-08-02 02:21:11'),
(33, 'Syed AB', 'Bukhari', 'anas14529@hotmail.com', '$2y$10$dmP0asbO.Kh0/YUhSRHsuOuyv8aImehjBkT6fPFAlNkg.heyKjUkK', 1, 'admin', NULL, '2024-08-03 22:58:43', '2024-08-09 14:19:43'),
(36, 'Syed', 'Bukhari', 'acid14529@gmail.com', '$2y$10$mXG2xzNFrdMXUX2yO1fJ1OJyq8sK/BZx9ITfONNMTg8f9repDWQ4S', 1, NULL, NULL, '2024-08-07 00:54:58', '2024-08-07 00:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `userID` int NOT NULL,
  `DocType` varchar(100) NOT NULL COMMENT 'Passport, birth certificate, spouse’s citizenship {US Birth Certificate, US Passport, US Naturalization Certificate}, State and Country of marriage certificate, IRS 1040, non-US children’s school records, W-2, rental agreement, utility bills, ICE issues {Detailed at the border, false paper given to ICE, deported, criminal record {Felony, drug usage, drug trafficking, crimes against minors',
  `DocDate` date NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int NOT NULL,
  `UserID` int NOT NULL,
  `employerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `employerAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startDate` date NOT NULL,
  `jobTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jobLastDate` date DEFAULT NULL,
  `jobDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `UserID`, `employerName`, `employerAddress`, `startDate`, `jobTitle`, `jobLastDate`, `jobDescription`, `createdAt`, `updatedAt`) VALUES
(44, 121, 'AAA', 'H#3, St#4, Plots Bhaiwala', '2024-08-09', 'Pakistan', '2024-08-30', 'aaaaaaaa', '2024-08-13 21:17:36', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `encounter`
--

CREATE TABLE `encounter` (
  `EncounterID` int NOT NULL,
  `UserID` int NOT NULL,
  `DateOfEncounter` date NOT NULL,
  `StateCountryOfLegalEncounter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NatureOfLegalIssue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `encounter`
--

INSERT INTO `encounter` (`EncounterID`, `UserID`, `DateOfEncounter`, `StateCountryOfLegalEncounter`, `NatureOfLegalIssue`, `Description`, `updatedAt`) VALUES
(52, 120, '2024-08-16', '', '', '', '2024-08-13 21:13:16'),
(78, 121, '2024-08-16', 'No', 'Yes', 'AAA', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `identifierdocument`
--

CREATE TABLE `identifierdocument` (
  `UserID` int NOT NULL,
  `Type` varchar(50) NOT NULL COMMENT 'Passport, BirthCertificate, etc.',
  `DateIssued` date NOT NULL,
  `IssuingLegalEntity` int NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Notes` int NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `immigration_inquiry`
--

CREATE TABLE `immigration_inquiry` (
  `InquiryID` int NOT NULL,
  `ClientID` int DEFAULT NULL,
  `whatsappConnected` tinyint(1) DEFAULT NULL,
  `usaPresenceBeforeJun2024` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marriedToUSCitizenBeforeJun2024` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NoMajorIssues` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `continuousPresenceEvidence` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` int DEFAULT NULL,
  `otherQuestions` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immigration_inquiry`
--

INSERT INTO `immigration_inquiry` (`InquiryID`, `ClientID`, `whatsappConnected`, `usaPresenceBeforeJun2024`, `marriedToUSCitizenBeforeJun2024`, `NoMajorIssues`, `continuousPresenceEvidence`, `updatedAt`, `product`, `otherQuestions`) VALUES
(29, 121, 1, 'yes', 'no', 'no', 'no', '2024-08-14 00:19:57', 2, 'Heyyy'),
(30, 121, 0, 'no', 'no', 'yes', 'yes', '2024-08-14 00:22:10', 3, ''),
(31, 121, 0, 'no', 'yes', 'no', 'no', '2024-08-14 01:20:38', 5, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `marriage`
--

CREATE TABLE `marriage` (
  `MarriageID` int NOT NULL,
  `UserID` int NOT NULL,
  `spouseName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOfMarriage` date DEFAULT NULL,
  `stateCountryOfMarriage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spouseBirthday` date DEFAULT NULL,
  `proofOfSpouseCitizenship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `placeOfDivorce` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateOfDivorce` date DEFAULT NULL,
  `obtainDecreeOfDivorce` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage`
--

INSERT INTO `marriage` (`MarriageID`, `UserID`, `spouseName`, `dateOfMarriage`, `stateCountryOfMarriage`, `spouseBirthday`, `proofOfSpouseCitizenship`, `placeOfDivorce`, `dateOfDivorce`, `obtainDecreeOfDivorce`, `updatedAt`) VALUES
(170, 121, 'Current Spouse', '2024-08-07', 'NY, US', '2024-08-09', 'US Passport', NULL, NULL, NULL, '2024-08-13 21:17:36'),
(171, 121, 'Mary Jane 2', '1970-01-01', 'Pakistan', NULL, NULL, 'DC. US', '2024-08-03', 'Yes', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `OfficeID` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Hours` varchar(300) NOT NULL,
  `GooglePin` varchar(150) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offspring`
--

CREATE TABLE `offspring` (
  `OffspringID` int NOT NULL,
  `UserID` int NOT NULL,
  `fullLegalName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `stateCountryOfBirth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mothersName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fathersName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('Male','Female','Other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `schoolDetails` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accessToSchoolRecords` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offspring`
--

INSERT INTO `offspring` (`OffspringID`, `UserID`, `fullLegalName`, `birthday`, `stateCountryOfBirth`, `mothersName`, `fathersName`, `gender`, `schoolDetails`, `accessToSchoolRecords`, `createdAt`, `updatedAt`) VALUES
(172, 121, 'First.', '2024-08-07', '', '', '', 'Male', '', 'No', '2024-08-13 21:17:36', '2024-08-13 21:17:36'),
(173, 121, '', '1970-01-01', '', '', '', 'Male', '', 'No', '2024-08-13 21:17:36', '2024-08-13 21:17:36'),
(174, 121, '', '1970-01-01', '', '', '', 'Male', '', 'No', '2024-08-13 21:17:36', '2024-08-13 21:17:36'),
(175, 121, '', '1970-01-01', '', '', '', 'Male', '', 'No', '2024-08-13 21:17:36', '2024-08-13 21:17:36'),
(176, 121, '', '1970-01-01', '', '', '', 'Male', '', 'No', '2024-08-13 21:17:36', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `ClientID` int NOT NULL,
  `TrxDate` date NOT NULL,
  `PaymentGateway` varchar(50) NOT NULL COMMENT 'Stripe, Zelle, Bank Transfer, Check, InPerson',
  `PaymentCleared` tinyint(1) NOT NULL DEFAULT '0',
  `TrxID` varchar(50) NOT NULL COMMENT 'Trx from Stripe or Paypal, Zelle''s confirmation number, check routing and number, Cash to whom.',
  `TrxStatus` varchar(50) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Currency` varchar(50) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `ClientID`, `TrxDate`, `PaymentGateway`, `PaymentCleared`, `TrxID`, `TrxStatus`, `Amount`, `Currency`, `Updated`) VALUES
(25, 121, '2024-08-14', 'in-person', 1, '', '0', '150', 'USD', '2024-08-14 01:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int NOT NULL,
  `sequence` tinyint DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `descriptionSpanish` varchar(500) DEFAULT NULL,
  `EnglishHelp` varchar(1000) NOT NULL,
  `SpanishHelp` varchar(1000) NOT NULL,
  `price` decimal(10,2) DEFAULT '100.00',
  `LinktoStripe` varchar(300) NOT NULL,
  `LinktoStripeSpanish` varchar(300) NOT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `sequence`, `description`, `descriptionSpanish`, `EnglishHelp`, `SpanishHelp`, `price`, `LinktoStripe`, `LinktoStripeSpanish`, `status`, `Updated`) VALUES
(3, 1, 'You can complete our PIPE Qualification online form and within 36 hours we will let you know what additional documentation we will need to qualify you for the PIPE program. ', 'Puede completar nuestro formulario de Calificación PIPE en línea y dentro de 36 horas le informaremos el documento adicional que necesitaremos para calificarlo para el programa PIPE.', 'Within 36 hours we can inform you of what specific documents will be required to qualify you for the PIPE immigration program. ', 'Nuestra Calificación PIPE en línea pasa en menos de 36 horas. Y despues le informaremos qué documentación adicional necesitaremos para calificarlo para el programa PIPE.', '50.00', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os', 'Active', '2024-08-02 16:34:12'),
(4, 2, 'Do you need help completing the PIPE Qualification form?', '¿Necesita ayuda para completar el formulario de Calificación PIPE?', 'If you\'re not comfortable filling computer forms, you can schedule help with one of our assistants for an additional fee of $25 USD.', 'Si no se siente cómodo completando formularios por computadora, puede programar ayuda con uno de nuestros asistentes por una tarifa adicional de $25 USD.', '75.00', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os', 'Active', '2024-08-02 16:34:12'),
(2, 3, 'If I qualify for PIPE, file the minimally required PIPE forms directly to USCIS without legal representation.  IMPORTANT!! Beyond the necessary USCIS filing, complex cases will require intricate documentation and that’s the critical value of a competent immigration attorney. ', 'Si califico para PIPE, presento los formularios PIPE mínimos requeridos directamente ante USCIS sin representación legal.  ¡¡IMPORTANTE!! Más allá de la necesaria presentación ante USCIS, los casos complejos requerirán documentación compleja y ese es el valor fundamental de un abogado de inmigración competente.', 'IMPORTANT!! Beyond the necessary USCIS filing, complex cases will require intricate documentation and that’s the critical value of a competent immigration attorney. ', '¡¡IMPORTANTE!! Más allá de la necesaria presentación ante USCIS, los casos complejos requerirán documentación compleja y ese es el valor fundamental de un abogado de inmigración competente.', '150.00', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os\r\n', 'Active', '2024-08-02 16:29:53'),
(5, 4, 'You can schedule up an online video conference with one of our staff members', 'Puede programar una videoconferencia en línea con un miembro de nuestro personal.', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', '150.00', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os\r\n', 'Active', '2024-08-02 16:34:12'),
(6, 5, 'You can book a legal consultation with one of our lawyers at “The Law Office of Nic Suriel” in Phoenix, AZ', 'Si desea reservar una consulta legal en “La Oficina de Nic Suriel\" en Phoenix, AZ', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', '350.00', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os\r\n', 'Active', '2024-08-02 16:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `proofofresidency`
--

CREATE TABLE `proofofresidency` (
  `UserID` int NOT NULL,
  `Type` varchar(100) NOT NULL COMMENT 'Tax Return, W2, BirthCertificate of US born child, Rental Contract, Cellphone, HousePhone, Electric, Water, Gas, Sewer, etc.',
  `URLofCopy` varchar(300) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `AccountID` varchar(50) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `AddresssID` int NOT NULL,
  `ContactData` varchar(1000) NOT NULL,
  `Notes` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residency_documents`
--

CREATE TABLE `residency_documents` (
  `DocumentID` int NOT NULL,
  `UserID` int NOT NULL,
  `DocumentType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tax Return, W2, BirthCertificate of US born child, Rental Contract, Cellphone, HousePhone, Electric, Water, Gas, Sewer, etc.',
  `DocumentDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residency_documents`
--

INSERT INTO `residency_documents` (`DocumentID`, `UserID`, `DocumentType`, `DocumentDescription`, `updatedAt`) VALUES
(157, 121, 'Tax Return', 'New', '2024-08-13 21:17:36'),
(158, 121, 'W-2', 'Tax return 20232', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `screen_id` int NOT NULL,
  `ScreenName` varchar(14) DEFAULT NULL,
  `Sequence` varchar(2) DEFAULT NULL,
  `FieldName` varchar(49) DEFAULT NULL,
  `EnglishLabel` varchar(500) DEFAULT NULL,
  `EnglishHelp` varchar(1000) DEFAULT NULL,
  `SpanishLabel` varchar(500) DEFAULT NULL,
  `SpanishHelp` varchar(1000) DEFAULT NULL,
  `englishPlaceholder` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `spanishPlaceholder` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `Updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`screen_id`, `ScreenName`, `Sequence`, `FieldName`, `EnglishLabel`, `EnglishHelp`, `SpanishLabel`, `SpanishHelp`, `englishPlaceholder`, `spanishPlaceholder`, `Updated`) VALUES
(1, 'Create Account', '0', 'Title', 'Create Account', '', 'Crear Una Cuenta', '', '', '', '2024-07-15 11:07:52'),
(2, 'Create Account', '2', 'Your ID', 'Use your email or cell phone number #:', 'Use your email address or your cell phone number where we can send you answers to your questions or updates about the status of your case.', 'Utilice su correo electrónico o número de teléfono celular:', 'Utilice su dirección de correo electrónico o su número de teléfono celular donde podemos enviarle respuestas a sus preguntas o actualizaciones sobre el estado de su caso.', 'Enter your Email/Phone number', 'Ingrese su correo electrónico/número de teléfono', '2024-07-15 11:07:52'),
(3, 'Create Account', '3', 'Password', 'Password:', 'Must be at least 6 characters', 'Contraseña:', 'Debe tener como mínimo 6 caracteres', 'Password', 'Contraseña', '2024-07-15 11:07:52'),
(4, 'Log In', '0', 'Title', 'Log In', '', 'Entrar a Tu Cuenta', '', '', '', '2024-07-15 11:07:52'),
(5, 'Log In', '1', 'Your ID', 'Email or Cell Phone #:', 'Use the email address or the cell phone number that you used when you created your account.', 'Correo electrónico o número de teléfono celular:', 'Utilice la dirección de correo electrónico o el número de teléfono celular que utilizó cuando creó su cuenta.', 'Email/Phone number', 'Correo electrónico/Número de teléfono', '2024-07-15 11:07:52'),
(6, 'Log In', '2', 'Password', 'Password:', 'Enter the password you used when you created your account.  If you\'ve forgotten your password, use forgot password below.', 'Contraseña:', 'Ingrese la contraseña que dio cuando creo su cuenta. Si olvidó su contraseña, haga clic en \"Olvidé mi contraseña\".', 'Password', 'Contraseña', '2024-07-15 11:07:52'),
(7, 'Log In', '3', 'Forgot Password', 'Forgot Password', 'We\'ll send you a 6 digit code to the email or cell phone number you gave us when you created your account.', 'Olvidé mi contraseña', 'Le enviaremos un código de 6 dígitos al correo electrónico o al número de teléfono celular que nos proporcionó cuando creó su cuenta.', '', '', '2024-07-15 11:07:52'),
(8, 'Inquiry Form', '0', 'Title', 'Inquiry/Qualification Payment', 'Provide us your name, ', 'Preguntas/Pago Para Cualificarlo', '', '', '', '2024-07-15 11:07:52'),
(9, 'Inquiry Form', '1', 'FirstName', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', 'Enter your first name', 'Ponga su primer nombre', '2024-07-15 11:07:52'),
(10, 'Inquiry Form', '2', 'LastName', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', 'Enter your last name', 'Introduce tu apellido', '2024-07-15 11:07:52'),
(11, 'Inquiry Form', '3', 'Current State, Country of Residence', 'Enter your zip code', 'Enter the US State of your primary residence. If you\'re not currently residing in the US, enter the state and country were you\'re currently residing.', 'Ingrese su codigo postal', 'Ingrese el estado estadounidense de su residencia principal. Si actualmente no reside en los EE. UU., ingrese el estado y el país donde reside actualmente.', 'eg: 11004', 'por ejemplo: 11004', '2024-07-15 11:07:52'),
(12, 'Inquiry Form', '4', 'PhoneNumber', 'Cell Phone Number', 'Enter your US cell phone number. If your cell phone is not American, select the code for that country first.', 'Número Celular', 'Ingrese su número de teléfono celular de EE. UU. Si tu celular no es americano, selecciona primero el código de ese país.', 'Phone number', 'Número de teléfono', '2024-07-15 11:07:52'),
(13, 'Inquiry Form', '5', 'email', 'Your email address', 'Enter your primary email address, if you don\'t have an email address, leave it blank.', 'Su dirección de correo electrónico', 'Ingrese su dirección de correo electrónico principal; si no tiene una dirección de correo electrónico, déjela en blanco.', 'Email@lato.com', 'Correo electrónico@lato.com', '2024-07-15 11:07:52'),
(14, 'Inquiry Form', '13', 'HelpwithQualifyingForm', 'Do you need help completing the PIPE Qualification form?', 'If you\'re not comfortable filling computer forms, you can schedule help with one of our assistants for an additional fee of $25 USD.', '¿Necesita ayuda para completar el formulario de Calificación PIPE?', 'Si no se siente cómodo completando formularios por computadora, puede programar ayuda con uno de nuestros asistentes por una tarifa adicional de $25 USD.', '', '', '2024-07-15 11:07:52'),
(15, 'Inquiry Form', '16', 'PIPEQualifyingFee', 'Payment options', 'Select one of the 4 payment options that\'s most convenient for you. You\'ll be able to fill in your Qualification data as soon as the payment has cleared. ', 'Opciones de Pago', 'Selecione una de las r forma de pago que más le convenga. Podremos completar sus datos de calificación tan pronto como se haya liquidado el pago. ', '', '', '2024-07-15 11:07:52'),
(16, 'Inquiry Form', '17', 'Questions', 'Do do have any questions before we can qualify you?', '', '¿Tiene alguna pregunta antes de que podamos calificarlo?', '', 'Please enter your questions below', 'Por favor ingrese sus preguntas a continuación', '2024-07-15 11:07:52'),
(17, '', '', '', '', '', '', '', '', '', '2024-07-15 11:07:52'),
(18, 'Qualification', '0', 'PIPE Qualification', 'PIPE Immigration Qualification ', 'The data you provide during the process will be used to determine if you qualify and how much effort will be required to get you the benefits of the PIPE program.', 'Calificación Para el Programa de inmigración PIPE ', 'Los datos que proporcione durante el proceso se utilizarán para determinar si califica y cuánto esfuerzo se requerirá para obtener los beneficios del programa PIPE.', '', '', '2024-07-15 11:07:52'),
(19, 'Qualification', '1', 'Firstname', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '', '', '2024-07-15 11:07:52'),
(20, 'Qualification', '2', 'Lastname', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '', '', '2024-07-15 11:07:52'),
(21, 'Qualification', '3', 'Birthday', 'Birthday', 'What date were you born?', 'Cumpleaños', '¿En qué fecha naciste?', '', '', '2024-07-15 11:07:52'),
(22, 'Qualification', '4', 'Birth State and Country', 'Birth State and Country', 'If the country were you were born used a different administrative division than state, use that classification. ', 'El país y estado donde naciste.', 'Si el país donde nació utilizaba una división administrativa diferente a la del estado, utilice esa clasificación. ', '', '', '2024-07-15 11:07:52'),
(23, 'Qualification', '5', 'AddressLine1', 'Your US Address Line 1', 'Line 1 of the US Address. If you don\'t have an address in the US, use your current address and explain in the last section why you don\'t have a US address.', 'Su dirección en EE. UU. Línea 1', 'Línea 1 de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., use su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '', '', '2024-07-15 11:07:52'),
(24, 'Qualification', '6', 'AddressLine2', 'Your US Address Line 2', 'Line 2 of the US Address. If you don\'t have an address in the US, use your current address and explain in the last section why you don\'t have a US address.', 'Su dirección en EE. UU. Línea 1', 'Línea 2 de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., use su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '', '', '2024-07-15 11:07:52'),
(25, 'Qualification', '7', 'ZipCode', 'The zipcode of your US address', 'Zip code of the US Address. If you don\'t have an address in the US, use the postal code of your current address and explain in the last section why you don\'t have a US address.', 'El código postal de su dirección en EE. UU.', 'Código postal de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., utilice el código postal de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '', '', '2024-07-15 11:07:52'),
(26, 'Qualification', '8', 'City', 'City', 'City of your US Address. If you don\'t have an address in the US, use the city of your current address and explain in the last section why you don\'t have a US address.', 'Ciudad', 'Ciudad de su dirección en EE. UU. Si no tiene una dirección en los EE. UU., utilice la ciudad de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '', '', '2024-07-15 11:07:52'),
(27, 'Qualification', '9', 'State', 'State', 'State of your US Address. If you don\'t have an address in the US, use the state/administrative division of your current address and explain in the last section why you don\'t have a US address.', 'Estado', 'Estado de su dirección en EE. UU. Si no tiene una dirección en los EE. UU., utilice la división estatal/administrativa de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '', '', '2024-07-15 11:07:52'),
(28, 'Qualification', '10', 'CellPhone', 'Your Cell Phone #', 'Your primary US cell phone #. If your primary cell phone # is not in the US, specify its country code.', 'Su número de teléfono celular', 'Su número de teléfono celular principal de EE. UU. Si su número de teléfono celular principal no está en los EE. UU., especifique su código de país.', 'Phone number', 'Número de teléfono', '2024-07-15 11:07:52'),
(29, '', '11', 'WhatApp', 'WhatApp?', 'WhatsApp is the easier way for us to send you text.  If you can install it on your cell phone, that would make it easy for us to communicate.  Leave it blank if you don\'t have WhatsApp installed. ', '¿Qué aplicación?', 'WhatsApp es la forma más fácil para nosotros de enviarte mensajes de texto.  Si puede instalarlo en su teléfono celular, nos facilitará la comunicación.  Déjalo en blanco si no tienes WhatsApp instalado. ', '', '', '2024-07-15 11:07:52'),
(30, 'Qualification', '12', 'HomePhone', 'Your Home Phone #', 'If you have a home phone number, please specify it, otherwise leave this field blank.', 'Su número de teléfono residencial', 'Si tiene un número de teléfono residencial, especifíquelo; de lo contrario, deje este campo en blanco.', 'Phone number', 'Número de teléfono', '2024-07-15 11:07:52'),
(31, 'Qualification', '13', 'WorkPhone', 'Your Work Phone #', 'If you have a work phone number, please specify it, otherwise leave this field blank.', 'Su número de teléfono de trabajo', 'Si tiene un número de teléfono del trabajo, especifíquelo; de lo contrario, deje este campo en blanco.', 'Phone number', 'Número de teléfono', '2024-07-15 11:07:52'),
(32, 'Qualification', '14', 'email', 'Your email address', 'If you have an email address where we can send you large document, please specify it, otherwise leave blank.', 'Su dirección de correo electrónico', 'Si tiene una dirección de correo electrónico donde podamos enviarle un documento grande, especifíquela; de lo contrario, déjela en blanco.', 'Email@lato.com', 'Correoelectrónico@lato.com', '2024-07-15 11:07:52'),
(33, 'Qualification', '15', 'EmergencyContact', 'The Name of Your Emergency Contact', 'The person we should contact in case we can\'t get a hold of you.', 'El nombre de su contacto de emergencia', 'La persona con la que debemos contactar en caso de que no podamos comunicarnos con usted.', '', '', '2024-07-15 11:07:52'),
(34, 'Qualification', '16', 'EmergencyPhone', 'The Phone # of this Emergency Contact', 'The cell phone number of your emergency contact.', 'El número de teléfono de este contacto de emergencia', 'El número de teléfono celular de su contacto de emergencia.', 'Phone number', 'Número de teléfono', '2024-07-15 11:07:52'),
(35, 'Qualification', '17', 'SpouseName', 'Your Spouse\'s Name', 'Your US citizen spouse\'s full legal name as it appears in their US documents.', 'El nombre de su cónyuge', 'El nombre legal completo de su cónyuge ciudadano estadounidense tal como aparece en sus documentos estadounidenses.', '', '', '2024-07-15 11:07:52'),
(36, 'Qualification', '18', 'SpouseBirthday', 'Your Spouse\'s Birthday', 'Your US citizen spouse\'s birthday.', 'El cumpleaños de su cónyuge', 'El cumpleaños de su cónyuge ciudadano estadounidense.', '', '', '2024-07-15 11:07:52'),
(37, 'Qualification', '19', 'StateCountryofMarriage', 'Country, State Where You Marry', 'Country and state where you were married.', 'País, estado donde se casa', 'País y estado donde se casó.', '', '', '2024-07-15 11:07:52'),
(38, 'Qualification', '20', 'DateofMarriage', 'The Date of Your Marriage', 'The date that appears on your marriage to the US citizen.', 'La fecha de su matrimonio', 'La fecha que aparece en su matrimonio con el ciudadano estadounidense.', '', '', '2024-07-15 11:07:52'),
(39, 'Qualification', '21', 'ProofofSpouse\'sCitizenship', 'Proof of Your Spouse\'s US Citizenship', 'Typically it\'s their US birthcertificate, but if they\'re a naturalized citizen, then specify their US passport number and its expiration number.  If they don\'t have a US passport, enter their naturalization number.', 'Prueba de ciudadanía estadounidense de su cónyuge', 'Normalmente es su certificado de nacimiento de EE. UU., pero si es ciudadano naturalizado, especifique su número de pasaporte estadounidense y su número de vencimiento.  Si no tienen pasaporte estadounidense, ingrese su número de naturalización.', '', '', '2024-07-15 11:07:52'),
(40, 'Qualification', '22', 'USEntryDate', 'Date You Entered the US', 'What date did you enter the US? If you\'re not use enter your best estimate.', 'Fecha en que ingresó a los EE. UU.', '¿En qué fecha ingresaste a Estados Unidos? Si no lo utiliza, ingrese su mejor estimación.', '', '', '2024-07-15 11:07:52'),
(41, 'Qualification', '23', 'StateViaWhichYouEntered', 'State Via Which You Entered the US', 'Specify via which state, territory or commonwealth you entered the US.  If you\'re not sure, please explain.', 'Estado por el que ingresó a los EE. UU.', 'Especifique a través de qué estado, territorio o estado libre asociado ingresó a los EE. UU.  Si no está seguro, explíquelo.', '', '', '2024-07-15 11:07:52'),
(42, 'Qualification', '24', 'DescribeHowYouEnter', 'Describe How You Entered the US', 'Specify if you crossed the Mexican or Canadian borders, took a boat into the US, or arrived via commercial carriers.', 'Describa cómo ingresó a los EE. UU.', 'Especifique si cruzó las fronteras de México o Canadá, tomó un barco hacia los EE. UU. o llegó a través de transportistas comerciales.', 'Briefly Describe your Entry...', 'Describe brevemente tu entrada...', '2024-07-15 11:07:52'),
(43, 'Qualification', '25', 'DidYouUseAnyIllegualDocumentation', 'Did You Use Any Ilegal Documentation to Enter the US?', '', '¿Utilizó alguna documentación ilegal para ingresar a los EE. UU.?', '', 'E.g., someone\'s else\'s birth certificate, a forged passport. Describe in detail.', 'Por ejemplo, el certificado de nacimiento de otra persona o un pasaporte falso. Describe detalladamente.', '2024-07-15 11:07:52'),
(44, 'Qualification', '26', 'WereYouDetainedbyUSBorderPatrol?', 'Were you Detained by US Border Patrol?', 'If you were detained by US Border Patrol, describe how and were specifically it happenned.', '¿Fuiste detenido por la Patrulla Fronteriza de EE. UU.?', 'Si fue detenido por la Patrulla Fronteriza de EE. UU., describa cómo y dónde sucedió específicamente.', 'Were you finger printed? Were you incarcerated?  Describe in detail', '¿Te tomaron las huellas dactilares? ¿Estuviste encarcelado?  Describe detalladamente', '2024-07-15 11:07:52'),
(45, 'Qualification', '27', 'TaxReturnData', 'What years, if any, did you file US tax returns?', 'Enter the year of your US Federal tax returns, typically called IRS 1040 form.', '¿En qué años, si corresponde, presentó declaraciones de impuestos en los EE. UU.?', 'Ingrese el año de sus declaraciones de impuestos federales de EE. UU., generalmente llamado formulario 1040 del IRS.', 'Enter all of the years that you filed a Federal Tax returns [e.g., 2010 through 2023]', 'Ingrese todos los años en los que presentó declaraciones de impuestos federales [por ejemplo, de 2010 a 2023]', '2024-07-15 11:07:52'),
(46, 'Qualification', '28', 'BirthCertificateofUSBornChildren?', 'Names, birthday and US states of where your US-born children.', 'Tell us the names and birthday of your US born children.', 'Nombre, fecha de nacimiento y estados de EE. UU. donde nacieron sus hijos.', 'Díganos los nombres y la fecha de nacimiento de sus hijos nacidos en Estados Unidos.', '[e.g., Rosita Juarez Tipton, 9/18/2019, Wisconsin]', '[p. ej., Rosita Juarez Tipton, 18/09/2019, Wisconsin]', '2024-07-15 11:07:52'),
(47, 'Qualification', '29', 'W-2?', 'Did you ever receive any W-2 from any of your employers?', 'Enter the name and years your employers provided you with W-2 forms.', '¿Alguna vez recibió algún W-2 de alguno de sus empleadores?', 'Ingrese el nombre y los años en que sus empleadores le proporcionaron los formularios W-2.', '[e.g., Honeywell, AZ, 2020 to 2023 ; Safeway, PA, 2010 to 2019]', '[por ejemplo, Honeywell, AZ, 2020 a 2023; Safeway, Pensilvania, 2010 a 2019]', '2024-07-15 11:07:52'),
(48, 'Qualification', '30', 'DriverLicense', 'Did you ever get a driver\'s license from any US states?', 'If you ever received driver licenses from any US states, specify as much information as you have, e.g., the state of that driver\'s license, the year and ID number if you have it.', '¿Alguna vez obtuvo una licencia de conducir de algún estado de EE. UU.?', 'Si alguna vez recibió licencias de conducir de algún estado de EE. UU., especifique toda la información que tenga, por ejemplo, el estado de esa licencia de conducir, el año y el número de identificación, si lo tiene.', '[e.g., Arizona, 2598617, 2026; Wisconsin, A0463892, 2019', '[por ejemplo, Arizona, 2598617, 2026; Wisconsin, A0463892, 2019', '2024-07-15 11:07:52'),
(49, 'Qualification', '31', 'OtherStateIssueIDs', 'Did you ever receive any State issued IDs?', 'If you ever received an ID from any US state, specify as much information as you have, e.g., the state of that ID, the year and ID number if you have it.', '¿Alguna vez recibió alguna identificación emitida por el estado?', 'Si alguna vez recibió una identificación de cualquier estado de EE. UU., especifique toda la información que tenga, por ejemplo, el estado de esa identificación, el año y el número de identificación, si lo tiene.', 'Maine, State ID: 12345678; Ohio, State ID: 326598741', 'Maine, identificación del estado: 12345678; Ohio, identificación del estado: 326598741', '2024-07-15 11:07:52'),
(50, 'Qualification', '32', 'OtherDocumentThatCouldUse', 'Do you have any other documents that could help us verify your US residency?', 'If you ever signed a rental agreement, have electric, water, phone or any utility bills in your name, tell us as much as you can remember about these documents. E.g., name on the contract/utility bill, its address, date, account number, etc.', '¿Tiene algún otro documento que pueda ayudarnos a verificar su residencia en los EE. UU.?', 'Si alguna vez firmó un contrato de alquiler, tiene facturas de electricidad, agua, teléfono o cualquier servicio público a su nombre, cuéntenos todo lo que pueda recordar sobre estos documentos. Por ejemplo, nombre en el contrato/factura de servicios públicos, su dirección, fecha, número de cuenta, etc.', '[Lease or Rental Agreement, Names of the tenant and landlord, Address of the rental property, Duration of the lease (start and end dates), Date the lease was signed. Utility Bills Type, e.g., electricity, Name of the account holder, Service address, Billing period (dates)', '[Arrendamiento o contrato de alquiler, Nombres del inquilino y del propietario, Dirección de la propiedad en alquiler, Duración del contrato de arrendamiento (fechas de inicio y finalización), Fecha en que se firmó el contrato de arrendamiento. Tipo de facturas de servicios públicos, por ejemplo, electricidad, nombre del titular de la cuenta, dirección del servicio, período de facturación (fechas)', '2024-07-15 11:07:52'),
(51, 'Qualification', '33', 'Child\'sFullLegalName', 'Full Name', 'Legal name of the child for whom you would like to obtain PIPE benefits.', 'Nombre completo', 'Nombre legal del niño por quien desea obtener beneficios PIPE.', '', '', '2024-07-15 11:07:52'),
(52, 'Qualification', '34', 'Birthday', 'Birthday', 'The birthday of that child', 'Cumpleaños', 'El cumpleaños de ese niño.', '', '', '2024-07-15 11:07:52'),
(53, 'Qualification', '35', 'StateCountryofBirth', 'State and Country of Birth', 'The state and country where that child was born.', 'Estado y país de nacimiento', 'El estado y país donde nació ese niño.', '', '', '2024-07-15 11:07:52'),
(54, 'Qualification', '36', 'MotherName', 'Mother\'s Name', 'The name of the child\'s mother as it appears in their birth certificate.', 'Nombre de la madre', 'El nombre de la madre del niño tal como aparece en su certificado de nacimiento.', '', '', '2024-07-15 11:07:52'),
(55, 'Qualification', '37', 'FatherName', 'Father\'s Name', 'The name of the child\'s father as it appears in their birth certificate.', 'Nombre del Padre', 'El nombre del padre del niño tal como aparece en su certificado de nacimiento.', '', '', '2024-07-15 11:07:52'),
(56, 'Qualification', '38', 'Gender', 'Gender', 'Whether the child is male or female.  The US immigration service currently doesn\'t recognize non-binary as a sex.', 'Género', 'Si el niño es hombre o mujer.  Actualmente, el servicio de inmigración de EE. UU. no reconoce el sexo no binario.', '', '', '2024-07-15 11:07:52'),
(57, 'Qualification', '39', 'School Attended, state and school years', 'School Attended, US state and school years', 'Names and US state of the schools the child has attended.  The school year the child attended these schools. ', 'Asistencia escolar, estado de EE. UU. y años escolares', 'Nombres y estado estadounidense de las escuelas a las que ha asistido el niño.  El año escolar el niño asistió a estas escuelas. ', '', '', '2024-07-15 11:07:52'),
(58, 'Qualification', '40', 'SchoolRecordAvailable', 'Can You Get Their School\'s Records?', 'If necessary, are you able to get the school records where your child attended the US school.', '¿Puede obtener los registros escolares de su escuela?', 'Si es necesario, ¿puede obtener los registros escolares en los que asistió su hijo a la escuela de EE. UU.?', '', '', '2024-07-15 11:07:52'),
(59, 'Qualification', '41', 'Employer', 'Name of Last Employer', 'The name of your last or current employer', 'Nombre del último empleador', 'El nombre de su último o actual empleador', 'Employer Name', 'Nombre del empleador', '2024-07-15 11:07:52'),
(60, 'Qualification', '42', 'EmployerAddress', 'Employer\'s Address', 'The full address of your last or current employer', 'Dirección del empleado', 'La dirección completa de su último o actual empleador', 'Employer Complete Address', 'Dirección completa del empleador', '2024-07-15 11:07:52'),
(61, 'Qualification', '43', 'StartDate', 'Start Date', 'The approximate date when you started working there.', 'Fecha de inicio', 'La fecha aproximada en la que empezaste a trabajar allí.', '', '', '2024-07-15 11:07:52'),
(62, 'Qualification', '44', 'EndDate', 'End Date', 'The approximate last date when you stopped working there.', 'Fecha final', 'La última fecha aproximada en la que dejó de trabajar allí.', '', '', '2024-07-15 11:07:52'),
(63, 'Qualification', '45', 'JobTitle', 'Job Title', 'Whatever title is used to described your job.', 'Título profesional', 'Cualquier título que se utilice para describir su trabajo.', 'Your Job title', 'Su puesto de trabajo', '2024-07-15 11:07:52'),
(64, 'Qualification', '46', 'JobDescription', 'Your Job Description', 'Tell us what you do in your job.', 'Su descripción de trabajo', 'Cuéntanos a qué te dedicas en tu trabajo.', 'Tell us about your Job...', 'Cuéntanos sobre tu trabajo...', '2024-07-15 11:07:52'),
(65, 'Qualification', '47', 'HighestCertificationDegree', 'Highest Certification Degree', 'If you had any college education or craft training that provided certification, please specify the highest certification here.', 'Grado de certificación más alto', 'Si tuvo alguna educación universitaria o capacitación artesanal que le otorgara certificación, especifique aquí la certificación más alta.', '', '', '2024-07-15 11:07:52'),
(66, 'Qualification', '48', 'InstitutionIssuingDegree', 'Institution Issuing Certification', 'The college, university, or trade school that issue that certification.', 'Institución que emite la certificación', 'El colegio, universidad o escuela vocacional que emite esa certificación.', '', '', '2024-07-15 11:07:52'),
(67, 'Qualification', '49', 'DateofDegree', 'Date of Certification', 'The date of that certification.', 'Fecha de Certificación', 'La fecha de dicha certificación.', '', '', '2024-07-15 11:07:52'),
(68, 'Qualification', '50', 'State and Country', 'State and Country of Certification', 'The state and country that certification.', 'Estado y país de certificación', 'El estado y país que certifica.', '', '', '2024-07-15 11:07:52'),
(69, 'Qualification', '51', 'CommunicableDisease', 'Communicable Disease', 'Are you currently being treated for any communicable diseases, e.g., the one listed below?', 'Enfermedad transmisible', 'Si actualmente está recibiendo tratamiento por alguna de las enfermedades transmisibles de esta lista, seleccione esta.', '', '', '2024-07-15 11:07:52'),
(70, 'Qualification', '52', 'MentalDisorder', 'Mental health challenges ', 'Are you currently being treated for any mental health challenges, e.g., the one listed below?', 'Enfermedades mentales', 'Si posee alguna discapacidad mental, seleccione de la siguiente lista', '', '', '2024-07-15 11:07:52'),
(71, 'Qualification', '53', 'AccusedofChildAbduction', 'Accused of Child Abduction', 'Have you ever been formally charged by the police of child abduction?', 'Acusado de sustracción de menores', '¿Alguna vez la policía le ha acusado formalmente de sustracción de menores?', 'Enter Your text here', 'Escriba su texto aquí', '2024-07-15 11:07:52'),
(72, 'Qualification', '54', 'ClaimedUSCitizenshipAfterSept1996', 'Last Date Claimed to be a US Citizen', 'What was the last date that you claimed to be a US Citizen? Describe in the field below what were the circumstances?', 'Última fecha en la que afirmó ser ciudadano estadounidense', '¿Cuál fue la última fecha en la que afirmó ser ciudadano estadounidense? Describe en el campo a continuación ¿cuáles fueron las circunstancias?', 'Enter Your text here', 'Escriba su texto aquí', '2024-07-15 11:07:52'),
(73, 'Qualification', '55', 'MissingAnyUSRequiredVaccines', 'Are You Missing An US Required Vaccines', 'Are you missing any of the vaccines listed below?', '¿Le faltan las vacunas requeridas en EE. UU.?', '¿Le falta alguna de las vacunas que se enumeran a continuación?', '', '', '2024-07-15 11:07:52'),
(74, 'Qualification', '56', 'AccusedofDrugAddictionTraffickingProstitutionVice', 'Accused of Drug Addiction Trafficking Prostitution Vice', 'Have you ever been formally charged by the police in your country or in the US of drug addiction, drug trafficking, prostitution, vice, or abduction of another person?', 'Acusado de drogadicción, tráfico, prostitución y vicio', '¿Alguna vez ha sido acusado formalmente por la policía de su país o de Estados Unidos de drogadicción, tráfico de drogas, prostitución, vicio o secuestro de otra persona?', 'Enter Your  text here', 'Escriba su texto aquí', '2024-07-15 11:07:52'),
(75, 'Qualification', '57', 'Deported from the US', 'Deported from the US', 'Have you ever been deported from the US?', 'Deportado de EE.UU.', '¿Alguna vez ha sido deportado de los EE. UU.?', 'Enter Your  text here', 'Escriba su texto aquí', '2024-07-15 11:07:52'),
(76, 'Qualification', '58', 'USElectionVotedIn', 'Last US Election You Voted In', 'Enter the date of the last US election that you voted in.', 'Última elección estadounidense en la que usted votó', 'Ingrese la fecha de la última elección estadounidense en la que votó.', 'Enter Your  text here', 'Escriba su texto aquí', '2024-07-15 11:07:52'),
(94, 'Qualification', '66', 'Foreign Born Children Seeking PIPE Benefits', 'Foreign Born Children Seeking PIPE Benefits', NULL, 'Niños Nacidos en el Extranjero que Buscan Beneficios PIPE', NULL, '', '', '2024-07-23 04:00:46'),
(93, 'Qualification', '65', 'Encounters with Law Enforcement Agencies', 'Encounters with Law Enforcement Agencies', NULL, 'Encuentros con Agencias de Aplicación de la Ley', NULL, '', '', '2024-07-23 04:00:46'),
(92, 'Qualification', '64', 'Residency Documents', 'Proof of 10 years of Continuous Physical Presence in the US', NULL, 'Prueba de 10 años de Presencia en los EE.UU.', NULL, '', '', '2024-07-23 04:00:46'),
(91, 'Qualification', '63', 'US Entries', 'US Entries', NULL, 'Entradas a EE.UU.', NULL, '', '', '2024-07-23 04:00:46'),
(90, 'Qualification', '62', 'Previous Marriage', 'Previous Marriage', NULL, 'Matrimonio Anterior', NULL, '', '', '2024-07-23 04:00:46'),
(89, 'Qualification', '61', 'Current Marriage to US Citizen', 'Current Marriage to US Citizen', NULL, 'Matrimonio Actual con Ciudadano Estadounidense', NULL, '', '', '2024-07-23 04:00:46'),
(88, 'Qualification', '60', 'Current US Address', 'Current US Address', NULL, 'Dirección Actual en EE.UU.', NULL, '', '', '2024-07-23 04:00:46'),
(87, 'Qualification', '59', 'Personal Information', 'Personal Information', NULL, 'Información Personal', NULL, '', '', '2024-07-23 04:00:46'),
(95, 'Qualification', '67', 'Occupation/Employment', 'Occupation/Employment', NULL, 'Ocupación/Empleo', NULL, '', '', '2024-07-23 04:00:46'),
(96, 'Qualification', '68', 'Education/Craft', 'Education/Craft', NULL, 'Educación/Arte', NULL, '', '', '2024-07-23 04:00:46'),
(97, 'Qualification', '69', 'Additional Considerations', 'Additional Considerations', NULL, 'Consideraciones Adicionales', NULL, '', '', '2024-07-23 04:00:46'),
(98, 'Qualification', '70', 'MiddleName', 'Your Middle Name(s)', 'Enter your middle name(s) as they appear in your passport or ID.', 'Su(s) segundo nombre(s)', 'Ingrese su(s) segundo nombre(s) tal como aparecen en su pasaporte o identificación.', '', '', '2024-07-15 11:07:52'),
(99, 'Qualification', '71', 'CountryOfCitizenship', 'Country of Citizenship', 'Indicate the country where you hold citizenship.', 'País de Ciudadanía', 'Indique el país en el que tiene ciudadanía.', '', '', '2024-07-15 11:07:52'),
(100, 'Qualification', '72', 'Gender', 'Your Gender', 'Select your gender as indicated on your official documents.', 'Su Género', 'Seleccione su género tal como aparece en sus documentos oficiales.', '', '', '2024-07-23 04:14:08'),
(101, 'Qualification', '73', 'InCareOfName', 'In Care of Name', 'Enter the name of the person in whose care the letter should be sent.', 'A cargo del nombre', 'Ingrese el nombre de la persona a cuyo cuidado se debe enviar la carta.', '', '', '2024-07-23 17:39:12'),
(102, 'Qualification', '74', 'exSpouseFullLegalName', 'Ex-spouse Full Legal Name', 'Enter the full legal name of your ex-spouse', 'Nombre completo del ex-cónyuge', 'Ingrese el nombre completo legal de su ex-cónyuge', '', '', '2024-07-23 19:45:38'),
(103, 'Qualification', '75', 'stateCountryOfDivorce', 'State and Country of Divorce', 'Enter the state and country where the divorce was finalized', 'Estado y país del divorcio', 'Ingrese el estado y país donde se finalizó el divorcio', '', '', '2024-07-23 19:45:38'),
(104, 'Qualification', '76', 'dateOfDivorce', 'Date of Divorce', 'Enter the date when the divorce was finalized', 'Fecha del divorcio', 'Ingrese la fecha en que se finalizó el divorcio', '', '', '2024-07-23 19:45:38'),
(105, 'Qualification', '77', 'decreeOfDivorce', 'Can you obtain this decree of divorce?', 'Indicate whether you can obtain the decree of divorce', '¿Puede obtener este decreto de divorcio?', 'Indique si puede obtener el decreto de divorcio', '', '', '2024-07-23 19:45:38'),
(106, 'Qualification', '78', 'dateOfEncounter', 'Date of Encounter', 'The date when the legal encounter occurred.', 'Fecha del Encuentro', 'La fecha en la que ocurrió el encuentro legal.', '', '', '2024-07-24 16:42:23'),
(107, 'Qualification', '79', 'stateCountryOfLegalEncounter', 'State and Country of Legal Encounter', 'The state and country where the legal encounter took place.', 'Estado y País del Encuentro Legal', 'El estado y el país donde tuvo lugar el encuentro legal.', '', '', '2024-07-24 16:42:23'),
(108, 'Qualification', '80', 'natureOfLegalIssue', 'Nature of Legal Issue', 'A brief description of the nature of the legal issue.', 'Naturaleza del Problema Legal', 'Una breve descripción de la naturaleza del problema legal.', '', '', '2024-07-24 16:42:23'),
(109, 'Qualification', '81', 'description', 'Description', 'A more detailed description of the legal issue.', 'Descripción', 'Una descripción más detallada del problema legal.', 'Briefly Describe', 'Describa resumidamente', '2024-07-24 16:42:23'),
(110, 'Qualification', '82', 'capacityToSupport', 'Describe your capacity to support yourself?', 'Provide a detailed explanation of your financial stability and ability to support yourself.', 'Describa su capacidad para mantenerse a sí mismo?', 'Proporcione una explicación detallada de su estabilidad financiera y capacidad para mantenerse a sí mismo.', 'Enter Your text here', 'Escriba su texto aquí', '2024-07-24 18:47:40'),
(111, 'Log In', '4', 'login', 'Login', 'Enter your login credentials', 'Iniciar sesión', 'Ingrese sus credenciales de inicio de sesión', '', '', '2024-07-25 23:21:07'),
(112, 'Log In', '5', 'signUp', 'Sign Up', 'Create a new account', 'Registrarse', 'Crear una nueva cuenta', '', '', '2024-07-25 23:21:07'),
(113, 'Log In', '6', 'fullName', 'Full Name', 'Enter your full name', 'Nombre completo', 'Ingrese su nombre completo', 'Enter your Full Name', 'Ingrese su nombre completo', '2024-07-25 23:21:07'),
(114, 'Log In', '7', 'confirmPassword', 'Confirm Password', 'Re-enter your password', 'Confirmar contraseña', 'Reingrese su contraseña', '', '', '2024-07-25 23:21:07'),
(115, 'Inquiry Form', '7', 'Presence07172024', 'Were you present in the USA on June 17, 2024?', 'Were you physically present in the US on July 17th, 2024?', '¿Estuvo presente en EE. UU. el 17 de junio de 2024?', '¿Estuvo físicamente presente en los EE. UU. el 17 de julio de 2024?', '', '', '2024-07-27 15:01:43'),
(116, 'Inquiry Form', '8', 'MarriedtoUSCitizen', 'Are you lawfully married to a United States citizen and did that marriage oc', 'Do you have a certificate of your marriage?', '¿Está usted casado legalmente con un ciudadano estadounidense y ese matrimonio se produjo', '¿Tiene su certificado de su matrimonio?', '', '', '2024-07-27 15:13:19'),
(118, 'Inquiry Form', '9', 'USCPP10years', 'Do you have documentation that demonstrates your continuous physical presence in the US for the last 10 years? E.g., IRS 1040, birth certificate of US born children, W-2, driver_s license, etc.', 'Can you demonstrate with documentation that you_ve been in the US for the past 10 years?', '¿Tiene documentación que demuestre su presencia física continua en los EE. UU. durante los últimos 10 años? Por ejemplo, IRS 1040, certificado de nacimiento de niños nacidos en los EE. UU., W-2, licencia de conducir, etc. ', '¿Puede demostrar con documentación que ha estado en los EE. UU. durante los últimos 10 años?', '', '', '2024-07-27 15:18:36'),
(119, 'Inquiry Form', '10', 'NoMajorIssues', 'Can you confirm that you don’t have any convictions, or been arrested for any crime?\r\n', 'Unless your case can be mitigated with the right documentation, if you have any convictions, or been arrested for any crime, it\'s likely that the US immigration will deny you PIPE case.', '¿Puede confirmar que no tiene ninguna condena ni ha sido arrestado por ningún delito?', 'A menos que su caso se pueda mitigarse con la documentación correcta, si tiene alguna condena o ha sido arrestado por algún delito, es probable que la inmigración de EE. UU. te niegue tu caso PIPE.', '', '', '2024-07-27 15:22:56'),
(120, 'Inquiry Form', '11', 'OptionstoQualify', 'The next step is to get you qualified for the PIPE program. Please select the one most suitable option from the 4 choices below:', 'We need to understand what data we need to submit to US immigration to qualify you for the PIPE program, for that we need to understand the data that you have available.', 'El siguiente paso es qualificar para el programa PIPE. Seleccione la opción más adecuada para ti de las 4 opciones a continuación', 'Necesitamos comprender qué datos debemos enviar a inmigración de EE. UU. para calificarlo para el programa PIPE, para eso necesitamos todos tus datos que tengas disponibles.', '', '', '2024-07-27 15:25:28'),
(121, 'Inquiry Form', '14', 'OnlineConf', 'You can schedule up an online video conference with one of our staff members', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Puede programar una videoconferencia en línea con un miembro de nuestro personal.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', '', '', '2024-07-27 15:59:16'),
(122, 'Inquiry Form', '15', 'ConsultwithLawyer', 'You can book a legal consultation with one of our lawyers at “The Law Office of Nic Suriel” in Phoenix, AZ', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Si desea reservar una consulta legal en “La Oficina de Nic Suriel\" en Phoenix, AZ', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', '', '', '2024-07-27 16:05:35'),
(123, 'Inquiry Form', '12', 'Online', 'You can complete our PIPE Qualification online form and within 36 hours we will let you know what additional documentation we will need to qualify you for the PIPE program. ', 'Within 36 hours we can inform you of what specific documents will be required to qualify you for the PIPE immigration program. ', 'Puede completar nuestro formulario de Calificación PIPE en línea y dentro de 36 horas le informaremos el documento adicional que necesitaremos para calificarlo para el programa PIPE.', 'Nuestra Calificación PIPE en línea pasa en menos de 36 horas. Y despues le informaremos qué documentación adicional necesitaremos para calificarlo para el programa PIPE.', '', '', '2024-07-27 16:14:18'),
(124, 'Inquiry Form', '18', 'inquiry_form', 'If you need any help to fill out our PIPE Qualification online form, we can book one of our staff members to help you.', 'If you need any help to fill out our PIPE Qualification online form, we can book one of our staff members to help you.', 'Si necesita ayuda para completar nuestro formulario de calificación PIPE en línea, podemos reservar a uno de nuestros miembros del personal para ayudarle.', 'Si necesita ayuda para completar nuestro formulario de calificación PIPE en línea, podemos reservar a uno de nuestros miembros del personal para ayudarle.', '', '', '2024-07-28 01:21:56'),
(125, 'Inquiry Form', '19', 'terms_and_conditions', 'I accept. <span class=\"text-muted\">By checking \'Accept\', you agree that <a href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#tacModal\" class=\"text-primary\">we\'re only providing limited legal advice and to our privacy statement</a>.</span>', '', 'Acepto. <span class=\"text-muted\">Al marcar \'Aceptar\', <a href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#tacModalSpanish\" class=\"text-primary\">usted acepta que solo estamos proporcionando asesoría legal limitada y a nuestra declaración de privacidad</a>.</span>', '', '', '', '2024-07-28 01:26:54'),
(128, 'Inquiry Form', '21', 'other_questions', '\"Need further help? Please enter your questions below\"', NULL, '\"¿Necesita más ayuda? Por favor ingrese tus preguntas abajo.\"', NULL, '', '', '2024-07-28 18:41:25'),
(129, 'Create Account', '1', 'WelcomeMsg', 'Find out from a competent, seasoned US lawyer, if you qualify for this new immigration program.', 'Esquire Nicomedes E. Suriel has been exclusively practicing immigration law for the past 30 years. He has voted one of 25 best immigration lawyers! He is reputable and honest.', 'Infórmese con un abogado estadounidense experto y capaz, si usted califica para este nuevo programa de inmigración', 'Lic. Nicomedes E. Suriel ha practicado exclusivamente leyes inmigración a los EE.UU. los últimos 30 años. ¡Se votado como uno de los 25 mejores abogados de inmigración! Es respetable y honesto.', '', '', '2024-07-30 17:10:41'),
(126, 'Inquiry Form', '20', 'payment_method_information', 'We can determine if you qualify for the new PIPE program for a fee of <span class=\"fee fw-bold\"></span> USD. Please select your payment method below.', '', 'Podemos determinar si califica para el nuevo programa PIPE por una tarifa de <span id=\"fee\" class=\"fw-bold\"></span> USD. Por favor, seleccione su método de pago a continuación.', '', '', '', '2024-07-28 01:34:34'),
(127, 'Inquiry Form', '6', 'WhatsApp', 'Do you have WhatsApp installed in this cell?', 'It\'s easier for us to text you via WhatsApp.', '¿Tienes WhatsApp instalado en este celular?', 'Es más fácil para nosotros enviarte mensajes de texto desde México vía WhatsApp.', '', '', '2024-07-15 11:07:52'),
(130, 'Create Account', '8', 'FirstName', 'First Name', 'Enter you first name', 'Enter you first name', 'Introduce tu nombre', 'Enter you first name', 'Introduce tu nombre', '2024-08-07 05:47:21'),
(131, 'Create Account', '9', 'LastName', 'Last Name', 'Enter your last name', 'Enter your last name', 'Introduce tu apellido', 'Enter your last name', 'Introduce tu apellido', '2024-08-07 05:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `screencontent`
--

CREATE TABLE `screencontent` (
  `ScreenName` varchar(50) NOT NULL,
  `Sequence` smallint NOT NULL,
  `FieldName` varchar(50) NOT NULL,
  `EnglishLabel` varchar(100) NOT NULL,
  `EnglishHelp` varchar(3000) NOT NULL,
  `SpanishLabel` varchar(100) NOT NULL,
  `SpanishHelp` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemdynamicdata`
--

CREATE TABLE `systemdynamicdata` (
  `ID` int NOT NULL,
  `KeyName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemdynamicdata`
--

INSERT INTO `systemdynamicdata` (`ID`, `KeyName`, `Value`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'PIPEQualificationFee', '$75', '2024-07-26 09:38:16', '2024-07-28 22:38:13'),
(2, 'HelpEnteringData', '$25', '2024-07-26 09:38:16', '2024-07-26 09:38:16'),
(3, 'StripeQual', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', '2024-07-26 09:38:16', '2024-07-28 20:29:37'),
(4, 'StripeQualPlusHelp', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os', '2024-07-26 09:38:16', '2024-07-28 20:29:37'),
(5, 'StripeQualEspañol', 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', '2024-07-26 09:38:16', '2024-07-28 20:08:47'),
(6, 'StripeQualPlusHelpEspañol', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os', '2024-07-26 09:38:16', '2024-07-28 20:10:54'),
(7, 'PayPalLinkforQualification', 'https://www.paypal.com/ncp/payment/RBMAYHHMCHCKG', '2024-07-26 09:38:16', '2024-07-26 09:38:16'),
(8, 'PayPalLinkforQualPlusHelp', 'https://www.paypal.com/ncp/payment/RBMAYHHMCHCKG', '2024-07-26 09:38:16', '2024-07-26 09:38:16'),
(9, 'emailforSupportEspañol', 'ayuda@USAinmigracion.mx', '2024-07-26 09:38:16', '2024-08-02 00:57:38'),
(10, 'emailforSupport', 'support@immigrationAI.lawyer', '2024-07-26 09:38:16', '2024-07-26 09:38:16'),
(11, 'VideoConferencing', '$50', '2024-07-26 21:50:41', '2024-07-26 21:50:41'),
(12, 'StripeQualVideoHelp', 'https://buy.stripe.com/14kcOhb84gLUbCMeUU', '2024-07-26 22:11:12', '2024-07-26 22:12:29'),
(13, 'StripeQualVideoHelpEspañol', 'https://buy.stripe.com/14kcOhb84gLUbCMeUU', '2024-07-26 22:12:20', '2024-07-26 22:12:20'),
(14, 'PayPalLinkforQualVideoHelp', 'https://www.paypal.com/ncp/payment/RBMAYHHMCHCKG', '2024-07-26 22:14:06', '2024-07-26 22:14:06'),
(15, 'USCISOnlineNumber', '123456789012', '2024-07-30 15:58:19', '2024-07-30 15:58:19'),
(16, 'AttorneyLastName', 'Suriel', '2024-07-30 16:11:12', '2024-07-30 16:11:12'),
(17, 'AttorneyFirstName', 'Nicomedes', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(18, 'AttorneyMiddleName', 'E', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(19, 'AttorneyStreetNumberName', '7220 N 16th Street', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(20, 'AttorneySuite', 'F', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(21, 'AttorneyCity', 'Phoenix', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(22, 'AttorneyState', 'Arizona', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(23, 'AttorneyZipCode', '85020', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(24, 'AttorneyCountry', 'United States of America', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(25, 'AttorneyDaytimeTelephone', '(602) 297-2005', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(26, 'AttorneyEmailAddress', 'ayuda@inmigrationUSA.mx', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(27, 'AttorneyFaxNumber', '(480) 718-7564', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(28, 'AttorneyEligibility', 'Yes', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(29, 'Licensing Authority', 'AZ', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(30, 'AttorneyBarNumber', '16317', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(31, 'AttorneyNotLegallyRestricted', 'Yes', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(32, 'AttorneyNameofLawFirm', 'The Law Offices of Nicomedes E. Suriel, LLC', '2024-07-30 16:17:37', '2024-07-30 16:17:37'),
(33, 'MasterCode', '321323', '2024-08-06 14:56:30', '2024-08-06 14:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `urlofdocumentation`
--

CREATE TABLE `urlofdocumentation` (
  `UserID` int NOT NULL,
  `DocURL` varchar(300) NOT NULL,
  `DocType` varchar(100) NOT NULL COMMENT 'MarriageCertificate, BirthCertificate, Passport, Employment, UtilityBill, RentalAgreement, etc.',
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uscisdocs`
--

CREATE TABLE `uscisdocs` (
  `docID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `docname` varchar(200) DEFAULT NULL,
  `LinktoUSCISdoc` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uscisdocs`
--

INSERT INTO `uscisdocs` (`docID`, `UserID`, `docname`, `LinktoUSCISdoc`, `updated`) VALUES
(1, 33, 'Syed-BukhariFilled_G-28', 'output/Syed-BukhariFilled_G-28_3.pdf', '2024-08-07 00:15:10'),
(3, 33, 'Syed-Bukhari-Filled_G-28_1', 'output/Syed-Bukhari-Filled_G-28_1.pdf', '2024-08-07 00:26:21'),
(4, NULL, NULL, 'output/--Filled_i-131.pdf', '2024-08-07 17:53:08'),
(5, NULL, NULL, 'output/Bukhari-Bukhari-Filled_i-131.pdf', '2024-08-07 17:57:00'),
(6, NULL, 'Bukhari-Bukhari-Filled_i-131_1', 'output/Bukhari-Bukhari-Filled_i-131_1.pdf', '2024-08-07 17:58:40'),
(7, 33, 'Bukhari-Bukhari-Filled_i-131_2', 'output/Bukhari-Bukhari-Filled_i-131_2.pdf', '2024-08-07 17:59:08'),
(8, 33, 'Syed-Bukhari-Filled_i-131', 'output/Syed-Bukhari-Filled_i-131.pdf', '2024-08-07 17:59:29'),
(9, 33, 'Syed-Bukhari-Filled_i-131_1', 'output/Syed-Bukhari-Filled_i-131_1.pdf', '2024-08-07 18:52:01'),
(10, 33, 'Syed-Bukhari-Filled_G-28_2', 'output/Syed-Bukhari-Filled_G-28_2.pdf', '2024-08-07 18:52:08'),
(11, 33, 'Syed-Bukhari-Filled_G-28_3', 'output/Syed-Bukhari-Filled_G-28_3.pdf', '2024-08-07 18:55:17'),
(12, 33, 'Syed-Bukhari-Filled_i-131_2', 'output/Syed-Bukhari-Filled_i-131_2.pdf', '2024-08-07 18:55:22'),
(13, 33, 'Syed-Bukhari-Filled_G-28_4', 'output/Syed-Bukhari-Filled_G-28_4.pdf', '2024-08-07 18:55:22'),
(14, 33, 'Syed-Bukhari-Filled_i-131_3', 'output/Syed-Bukhari-Filled_i-131_3.pdf', '2024-08-07 18:55:54'),
(15, 33, 'Syed-Bukhari-Filled_G-28_5', 'output/Syed-Bukhari-Filled_G-28_5.pdf', '2024-08-07 18:55:54'),
(16, 33, 'Syed-Bukhari-Filled_i-131_4', 'output/Syed-Bukhari-Filled_i-131_4.pdf', '2024-08-07 18:56:33'),
(17, 33, 'Syed-Bukhari-Filled_G-28_6', 'output/Syed-Bukhari-Filled_G-28_6.pdf', '2024-08-07 18:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `middleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `birthPlace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenshipCountry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zipCode` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `email`, `phone`, `password`, `firstName`, `middleName`, `lastName`, `birthday`, `birthPlace`, `citizenshipCountry`, `gender`, `verified`, `status`, `createdAt`, `updatedAt`, `zipCode`, `city`, `state`) VALUES
(98, 'anas14529@gmail.com', NULL, '$2y$10$cVzEJ8d78FRPlRewAK.iiOVy8TyX0NHORhboQwYA4FiIdOTIGm5d2', 'Syed Muhammad Anas Bukhari', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 21:30:24', NULL, NULL, NULL),
(99, 'f4futuretech@gmail.com', NULL, '$2y$10$DVUj0Z7jdfwcyuQruPLMqONpvP470FokeytE5toiTX9wkqfmhxxta', 'Syed Muhammad Anas', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(100, 'dilia@appliedinsightinc.com', NULL, '$2y$10$brGt.JDR8Oexou9jJOxyheAOK/9Dt5uh8TSEkm1n155heoz8/yj/y', 'Dilia Suriel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(101, 'dsuriel1218@gmail.com', NULL, '$2y$10$SAkJUcnTPU6GMrLswsFYDe2dbLN3QZh3zNK34HTJuv7D0t7a/9eRq', 'Diana Rockweel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(102, 'matthew@itstaskable.com', NULL, '$2y$10$dUVfsPk7DCe8YbQDcHobqOuIz3LLD6BeeoomdJVNO8gfbTwYuubpW', 'Matthew Suria', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(103, 'dilia@usainmigracion.mx', NULL, '$2y$10$rQMj8hivWD.FlUSAWa4fGeTAAfD8KHzaobhSKku9ouytvG.SwIJlq', 'Dllia Suriel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(104, 'pepe@gmail.com', NULL, '$2y$10$7tiF87V3ZXYZAOyFRZI6YebMBicR4VicD89irzqUDKV/8R2OQ9X0y', 'Dilia Suriel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(105, 'futuretest45@gmail.com', NULL, '$2y$10$xpgvx56IX2e5FNvi0MSigezLbYhzMiXxM.ToTaJynRvWSfjiCUXuu', 'Anas', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(106, NULL, '+1 (555) 555-5555', '$2y$10$ZIpmEphdo9T.LKmFQjiEgOgSpH1zAiUYGln/QfvJPXqNx21QWlLUu', 'AB', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(107, 'ayuga@usainmigracion.mx', NULL, '$2y$10$hMpEQ.3xh2TU0LYiC4F9IuH99Oz4xpzLomUXiDtlueMCPYzOp0Uiu', 'Dilia Suriel', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(108, NULL, '+524151441187', '$2y$10$hW9EWJ8tT7OBnet/zt1YGujueakiXLK1UA61P9AU3sG/OPvIX/nFe', 'Testing phone number', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(109, 'dilia@thinwomanbrain.com', NULL, '$2y$10$zlCh5NI9DGN8zX6.OofEU.FEeFHMM7owASLOOOf8Q72vE7oDpgNO.', 'Testing phone number', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(110, 'mandre4521@gmail.com', NULL, '$2y$10$9cRCXKIAtpSK9RWvFjs5Bu2Drj5Du8fhz92KhuyJ/OC1/fZSLY7b.', 'Matt Suria', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(111, 'mgsuria3@gmail.com', NULL, '$2y$10$grJMH4IaVuSDRcONtA1WZ.ruxaPK/pHPKlpAJ7xHQGphVE5dm8.aq', 'Matt Suria', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(112, 'msuria889@outlook.com', NULL, '$2y$10$7EMKcQP.wqxkuUeR/r2Rjuh7gXRHUfF18/WSZWEWUOoMqN9UPo32y', 'Matthew Suria', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(113, 'rgalderton@yahoo.com', NULL, '$2y$10$jBPYnJNAZK//8cgnPagEx.pvcmf2OCKfQcoXbNP5JbVvGB5h16vIa', 'Gina Testing', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(114, 'myspanishteacher111@gmail.com', NULL, '$2y$10$GH6rdgUUPfOPbRNrHpLbJeQZc20f1HIk9qk5rLe1aEgcMfl3OT5Q.', 'Gina Testing2', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(115, NULL, '+52 415 144 1187', '$2y$10$.AycUaxruB8bS.4SBrJUX.IcKP5niQzE8UJ.14e1iGzI7y4azLNpy', 'Anas', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(116, NULL, '602-399-7645', '$2y$10$dxLCDYGnPPGDO/SjyGIFgexeWGdtZ0a377riNdBvAzNbQvy6KfseC', 'Anas', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(117, 'anas14529@hotmail.com', NULL, '$2y$10$dmP0asbO.Kh0/YUhSRHsuOuyv8aImehjBkT6fPFAlNkg.heyKjUkK', 'Syed AB', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 1, 'admin', '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(118, 'acid14529@gmail.com', NULL, '$2y$10$mXG2xzNFrdMXUX2yO1fJ1OJyq8sK/BZx9ITfONNMTg8f9repDWQ4S', 'Syed', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 1, NULL, '2024-08-13 18:12:20', '2024-08-13 18:12:20', NULL, NULL, NULL),
(119, 'anas123@gmail.com', NULL, '$2y$10$Mp/GeI/5AH0pIw3lVOb.jO35mJgAwW1/xQ8V4colWAdiLO.nb9Uy6', 'Syed', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 0, NULL, '2024-08-13 18:19:58', '2024-08-13 18:19:58', NULL, NULL, NULL),
(120, 'anas1234@gmail.com', NULL, '$2y$10$Vpfc0Q7hUPr.fi.YFTTOHO3IW9UdKJUaPv2GiGqU3zAjyubquIw8C', 'Syed', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 0, NULL, '2024-08-13 18:22:13', '2024-08-13 18:22:13', NULL, NULL, NULL),
(121, 'anas1@gmail.com', '33994040353', '$2y$10$fsQ1jjiUPTFqU/xCzepd4uyrlhwaZUUJjvOhvyuTJBrz2TxKDBPsq', 'Syed', 'Anas', 'Bukhari', '2024-08-14', 'Pakistan', 'Pakistan', 'male', 1, NULL, '2024-08-13 18:23:35', '2024-08-13 21:02:28', '83002', 'Jackson', 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `userrelation`
--

CREATE TABLE `userrelation` (
  `UserID` int NOT NULL,
  `RelationID` int NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE `user_test` (
  `UserID` int NOT NULL,
  `ClientID` int DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `middleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `birthPlace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenshipCountry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zipCode` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_test`
--

INSERT INTO `user_test` (`UserID`, `ClientID`, `email`, `phone`, `password`, `firstName`, `middleName`, `lastName`, `birthday`, `birthPlace`, `citizenshipCountry`, `gender`, `verified`, `status`, `createdAt`, `updatedAt`, `zipCode`, `city`, `state`) VALUES
(87, 10, 'anas14529@gmail.com', NULL, '$2y$10$kMkNiV4JOwUw4ALryU1AUOpTG.GqTE7gy3tdvi2Rfri8iTu2HFYZq', 'Syed Muhammad Anas Bukhari', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(88, 11, 'f4futuretech@gmail.com', NULL, '$2y$10$DVUj0Z7jdfwcyuQruPLMqONpvP470FokeytE5toiTX9wkqfmhxxta', 'Syed Muhammad Anas', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(89, 12, 'dilia@appliedinsightinc.com', NULL, '$2y$10$brGt.JDR8Oexou9jJOxyheAOK/9Dt5uh8TSEkm1n155heoz8/yj/y', 'Dilia Suriel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(90, 13, 'dsuriel1218@gmail.com', NULL, '$2y$10$SAkJUcnTPU6GMrLswsFYDe2dbLN3QZh3zNK34HTJuv7D0t7a/9eRq', 'Diana Rockweel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(91, 14, 'matthew@itstaskable.com', NULL, '$2y$10$dUVfsPk7DCe8YbQDcHobqOuIz3LLD6BeeoomdJVNO8gfbTwYuubpW', 'Matthew Suria', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(92, 16, 'dilia@usainmigracion.mx', NULL, '$2y$10$rQMj8hivWD.FlUSAWa4fGeTAAfD8KHzaobhSKku9ouytvG.SwIJlq', 'Dllia Suriel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(93, 17, 'pepe@gmail.com', NULL, '$2y$10$7tiF87V3ZXYZAOyFRZI6YebMBicR4VicD89irzqUDKV/8R2OQ9X0y', 'Dilia Suriel', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(94, 20, 'futuretest45@gmail.com', NULL, '$2y$10$xpgvx56IX2e5FNvi0MSigezLbYhzMiXxM.ToTaJynRvWSfjiCUXuu', 'Anas', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(95, 22, NULL, '+1 (555) 555-5555', '$2y$10$ZIpmEphdo9T.LKmFQjiEgOgSpH1zAiUYGln/QfvJPXqNx21QWlLUu', 'AB', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(96, 23, 'ayuga@usainmigracion.mx', NULL, '$2y$10$hMpEQ.3xh2TU0LYiC4F9IuH99Oz4xpzLomUXiDtlueMCPYzOp0Uiu', 'Dilia Suriel', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(97, 24, NULL, '+524151441187', '$2y$10$hW9EWJ8tT7OBnet/zt1YGujueakiXLK1UA61P9AU3sG/OPvIX/nFe', 'Testing phone number', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(98, 25, 'dilia@thinwomanbrain.com', NULL, '$2y$10$zlCh5NI9DGN8zX6.OofEU.FEeFHMM7owASLOOOf8Q72vE7oDpgNO.', 'Testing phone number', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(99, 26, 'mandre4521@gmail.com', NULL, '$2y$10$9cRCXKIAtpSK9RWvFjs5Bu2Drj5Du8fhz92KhuyJ/OC1/fZSLY7b.', 'Matt Suria', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(100, 27, 'mgsuria3@gmail.com', NULL, '$2y$10$grJMH4IaVuSDRcONtA1WZ.ruxaPK/pHPKlpAJ7xHQGphVE5dm8.aq', 'Matt Suria', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(101, 28, 'msuria889@outlook.com', NULL, '$2y$10$7EMKcQP.wqxkuUeR/r2Rjuh7gXRHUfF18/WSZWEWUOoMqN9UPo32y', 'Matthew Suria', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(102, 29, 'rgalderton@yahoo.com', NULL, '$2y$10$jBPYnJNAZK//8cgnPagEx.pvcmf2OCKfQcoXbNP5JbVvGB5h16vIa', 'Gina Testing', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(103, 30, 'myspanishteacher111@gmail.com', NULL, '$2y$10$GH6rdgUUPfOPbRNrHpLbJeQZc20f1HIk9qk5rLe1aEgcMfl3OT5Q.', 'Gina Testing2', NULL, '', NULL, NULL, NULL, NULL, 1, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(104, 31, NULL, '+52 415 144 1187', '$2y$10$.AycUaxruB8bS.4SBrJUX.IcKP5niQzE8UJ.14e1iGzI7y4azLNpy', 'Anas', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(105, 32, NULL, '602-399-7645', '$2y$10$dxLCDYGnPPGDO/SjyGIFgexeWGdtZ0a377riNdBvAzNbQvy6KfseC', 'Anas', NULL, '', NULL, NULL, NULL, NULL, 0, '', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(106, 33, 'anas14529@hotmail.com', NULL, '$2y$10$dmP0asbO.Kh0/YUhSRHsuOuyv8aImehjBkT6fPFAlNkg.heyKjUkK', 'Syed AB', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 1, 'admin', '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL),
(107, 36, 'acid14529@gmail.com', NULL, '$2y$10$mXG2xzNFrdMXUX2yO1fJ1OJyq8sK/BZx9ITfONNMTg8f9repDWQ4S', 'Syed', NULL, 'Bukhari', NULL, NULL, NULL, NULL, 1, NULL, '2024-08-13 18:10:33', '2024-08-13 18:10:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `us_entry`
--

CREATE TABLE `us_entry` (
  `EntryID` int NOT NULL,
  `UserID` int NOT NULL,
  `dateOfEntry` date DEFAULT NULL,
  `stateOfEntry` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `methodOfEntry` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anyIllegalDocumentOnEntry` varchar(1500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detainedByUSPatrol` varchar(1500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `us_entry`
--

INSERT INTO `us_entry` (`EntryID`, `UserID`, `dateOfEntry`, `stateOfEntry`, `methodOfEntry`, `anyIllegalDocumentOnEntry`, `detainedByUSPatrol`, `updatedAt`) VALUES
(24, 121, '2024-08-10', 'Arizona', 'asdsad', 'saasdasdsa', 'No', '2024-08-13 21:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `verification_attempts`
--

CREATE TABLE `verification_attempts` (
  `AttemptID` int NOT NULL,
  `ClientID` int NOT NULL,
  `is_successful` tinyint(1) NOT NULL,
  `attempt_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_attempts`
--

INSERT INTO `verification_attempts` (`AttemptID`, `ClientID`, `is_successful`, `attempt_time`) VALUES
(18, 20, 0, '2024-07-28 16:33:15'),
(19, 20, 0, '2024-07-28 16:33:18'),
(20, 20, 0, '2024-07-28 16:33:18'),
(21, 20, 1, '2024-07-28 16:33:38'),
(22, 23, 0, '2024-07-28 16:47:25'),
(23, 25, 1, '2024-07-28 16:52:32'),
(24, 26, 0, '2024-07-29 18:42:18'),
(25, 26, 1, '2024-07-29 18:42:20'),
(26, 28, 0, '2024-07-29 21:06:04'),
(27, 29, 0, '2024-07-29 21:23:18'),
(28, 29, 0, '2024-07-29 21:23:54'),
(29, 30, 1, '2024-07-29 21:27:13'),
(30, 32, 0, '2024-08-02 02:30:46'),
(31, 33, 0, '2024-08-03 23:24:15'),
(32, 33, 1, '2024-08-03 23:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `CodeID` int NOT NULL,
  `ClientID` int NOT NULL,
  `verification_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`CodeID`, `ClientID`, `verification_code`, `expires_at`, `created_at`) VALUES
(65, 121, '913367', '2024-08-13 16:23:35', '2024-08-13 18:23:35'),
(70, 98, '170840', '2024-08-13 19:30:07', '2024-08-13 21:30:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_considerations`
--
ALTER TABLE `additional_considerations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `attorney`
--
ALTER TABLE `attorney`
  ADD PRIMARY KEY (`attorneyID`);

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`),
  ADD UNIQUE KEY `email_or_phone` (`email_or_phone`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `encounter`
--
ALTER TABLE `encounter`
  ADD PRIMARY KEY (`EncounterID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `immigration_inquiry`
--
ALTER TABLE `immigration_inquiry`
  ADD PRIMARY KEY (`InquiryID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `marriage`
--
ALTER TABLE `marriage`
  ADD PRIMARY KEY (`MarriageID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `offspring`
--
ALTER TABLE `offspring`
  ADD PRIMARY KEY (`OffspringID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payment_user` (`ClientID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `residency_documents`
--
ALTER TABLE `residency_documents`
  ADD PRIMARY KEY (`DocumentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`screen_id`),
  ADD UNIQUE KEY `unique_screen_sequence` (`ScreenName`,`Sequence`);

--
-- Indexes for table `systemdynamicdata`
--
ALTER TABLE `systemdynamicdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uscisdocs`
--
ALTER TABLE `uscisdocs`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `fk_userid` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `us_entry`
--
ALTER TABLE `us_entry`
  ADD PRIMARY KEY (`EntryID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `verification_attempts`
--
ALTER TABLE `verification_attempts`
  ADD PRIMARY KEY (`AttemptID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`CodeID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_considerations`
--
ALTER TABLE `additional_considerations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `attorney`
--
ALTER TABLE `attorney`
  MODIFY `attorneyID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `encounter`
--
ALTER TABLE `encounter`
  MODIFY `EncounterID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `immigration_inquiry`
--
ALTER TABLE `immigration_inquiry`
  MODIFY `InquiryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `marriage`
--
ALTER TABLE `marriage`
  MODIFY `MarriageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `offspring`
--
ALTER TABLE `offspring`
  MODIFY `OffspringID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `residency_documents`
--
ALTER TABLE `residency_documents`
  MODIFY `DocumentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `screen_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `systemdynamicdata`
--
ALTER TABLE `systemdynamicdata`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `uscisdocs`
--
ALTER TABLE `uscisdocs`
  MODIFY `docID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `us_entry`
--
ALTER TABLE `us_entry`
  MODIFY `EntryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `verification_attempts`
--
ALTER TABLE `verification_attempts`
  MODIFY `AttemptID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `CodeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_considerations`
--
ALTER TABLE `additional_considerations`
  ADD CONSTRAINT `additional_considerations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `certification`
--
ALTER TABLE `certification`
  ADD CONSTRAINT `certification_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `encounter`
--
ALTER TABLE `encounter`
  ADD CONSTRAINT `encounter_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `immigration_inquiry`
--
ALTER TABLE `immigration_inquiry`
  ADD CONSTRAINT `fk_immigration_inquiry_user` FOREIGN KEY (`ClientID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `marriage`
--
ALTER TABLE `marriage`
  ADD CONSTRAINT `marriage_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `offspring`
--
ALTER TABLE `offspring`
  ADD CONSTRAINT `offspring_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `residency_documents`
--
ALTER TABLE `residency_documents`
  ADD CONSTRAINT `residency_documents_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `us_entry`
--
ALTER TABLE `us_entry`
  ADD CONSTRAINT `us_entry_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `verification_attempts`
--
ALTER TABLE `verification_attempts`
  ADD CONSTRAINT `verification_attempts_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE CASCADE;

--
-- Constraints for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD CONSTRAINT `fk_verification_codes_user` FOREIGN KEY (`ClientID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
