-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 07:38 PM
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
-- Database: `pipe-immigration`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int NOT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `ZipCode` varchar(20) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `SpecialInstructions` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `current_marriage`
--

CREATE TABLE `current_marriage` (
  `MarriageID` int NOT NULL,
  `UserID` int NOT NULL,
  `spouseName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateOfMarriage` date NOT NULL,
  `stateCountryOfMarriage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `spouseBirthday` date NOT NULL,
  `proofOfSpouseCitizenship` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_marriage`
--

INSERT INTO `current_marriage` (`MarriageID`, `UserID`, `spouseName`, `dateOfMarriage`, `stateCountryOfMarriage`, `spouseBirthday`, `proofOfSpouseCitizenship`, `updatedAt`) VALUES
(1, 5, 'Jane', '2024-04-07', 'Ny, US', '2024-01-07', '12341321', '2024-07-23 14:38:15'),
(2, 6, 'Jane', '2024-04-07', 'Ny, US', '2024-10-07', '12341321', '2024-07-23 14:41:07'),
(3, 7, 'Jane', '2024-04-07', 'Ny, US', '2024-12-07', '12341321', '2024-07-23 14:41:13'),
(4, 8, 'Jane', '2024-04-07', 'Ny, US', '2024-12-07', '12341321', '2024-07-23 14:41:26'),
(5, 9, 'sad', '2024-07-04', 'asd', '2024-07-10', 'asdsad', '2024-07-23 14:43:20'),
(6, 10, 'DgtXzEERYq', '2024-07-17', 'GOAwrDPZwa', '2024-07-17', 'HCi8tjOvOj', '2024-07-23 14:58:43'),
(7, 11, 'DgtXzEERYq', '2024-07-17', 'GOAwrDPZwa', '2024-07-17', 'HCi8tjOvOj', '2024-07-23 14:59:58'),
(8, 12, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:40:08'),
(9, 13, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:40:29'),
(10, 14, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:41:06'),
(11, 15, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:41:35'),
(12, 16, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:51:54'),
(13, 17, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:52:17'),
(14, 18, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:53:13'),
(15, 19, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:54:14'),
(16, 20, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:54:37'),
(17, 21, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:55:05'),
(18, 22, 'jZWHUCf7qZ', '2024-07-09', 'HU9jDeWbnw', '2024-07-11', 'Q2OAWkU8QH', '2024-07-23 15:56:09'),
(19, 23, 'qyLLJs4ZId', '2024-07-10', 'j3ASPawvGm', '2024-07-11', 'NLrVnKMWhC', '2024-07-23 16:19:28'),
(20, 24, 'qyLLJs4ZId', '2024-07-10', 'j3ASPawvGm', '2024-07-11', 'NLrVnKMWhC', '2024-07-23 16:20:05'),
(21, 25, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:21:14'),
(22, 26, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:21:59'),
(23, 27, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:22:28'),
(24, 28, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:24:05'),
(25, 29, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:25:59'),
(26, 30, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:26:34'),
(27, 31, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:27:29'),
(28, 32, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:28:53'),
(29, 33, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:30:29'),
(30, 34, 'qbRGSoQJot', '2024-07-10', '0W8oKfSCmt', '2024-07-25', 'ewzH2evfll', '2024-07-23 16:31:27'),
(31, 35, '5lM756E05B', '2024-07-13', 'coiEbYAqzE', '2024-07-12', 'q1RD7Lbvts', '2024-07-23 16:43:14'),
(32, 36, '5lM756E05B', '2024-07-13', 'coiEbYAqzE', '2024-07-12', 'q1RD7Lbvts', '2024-07-23 16:43:39'),
(33, 37, '5lM756E05B', '2024-07-13', 'coiEbYAqzE', '2024-07-12', 'q1RD7Lbvts', '2024-07-23 16:44:39'),
(34, 38, '0fI5ePgGgN', '2024-07-03', 'lfpLPgMcN8', '2024-07-11', '5SOoTgAyme', '2024-07-23 16:45:51'),
(35, 39, 'L4Ikj1upRD', '2024-07-18', 'ZTLdTMRwNv', '2024-07-25', 'rjaQsMaRwl', '2024-07-23 16:46:34');

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
  `EmployerID` int NOT NULL,
  `EmployerName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Notes` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `marriage`
--

CREATE TABLE `marriage` (
  `UserID` int NOT NULL,
  `SpouseID` int NOT NULL,
  `MarriageDate` int NOT NULL,
  `State and Country` varchar(100) NOT NULL,
  `URLofMarriageCertificate` varchar(500) NOT NULL,
  `DivorceDate` date NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `UserID` int NOT NULL COMMENT 'ID of the father or mother',
  `ChildID` int NOT NULL,
  `Notes` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `UserID` int NOT NULL,
  `TrxDateTime` datetime NOT NULL,
  `PaymentGateway` varchar(50) NOT NULL COMMENT 'Stripe, Zelle, Bank Transfer, Check, InPerson',
  `PaymentCleared` datetime NOT NULL,
  `TrxID` varchar(50) NOT NULL COMMENT 'Trx from Stripe or Paypal, Zelle''s confirmation number, check routing and number, Cash to whom.',
  `AuthCode` varchar(50) NOT NULL,
  `TrxStatus` varchar(50) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Currency` varchar(50) NOT NULL,
  `CardLastFourDigit` tinyint NOT NULL,
  `CardExpiryDate` date NOT NULL,
  `Updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `previous_marriage`
--

CREATE TABLE `previous_marriage` (
  `id` int NOT NULL,
  `UserID` int NOT NULL,
  `exSpouseName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `exDateOfMarriage` date NOT NULL,
  `exPlaceOfMarriage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `exPlaceOfDivorce` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `exDateOfDivorce` date NOT NULL,
  `obtainDecreeOfDivorce` enum('Yes','No') COLLATE utf8mb4_general_ci NOT NULL,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `previous_marriage`
--

INSERT INTO `previous_marriage` (`id`, `UserID`, `exSpouseName`, `exDateOfMarriage`, `exPlaceOfMarriage`, `exPlaceOfDivorce`, `exDateOfDivorce`, `obtainDecreeOfDivorce`, `updatedAt`) VALUES
(1, 10, 'uVEek5cDD2', '2024-07-10', 'Pakistan', '3rrdnUv8YN', '2024-07-24', 'Yes', '2024-07-23 14:58:43'),
(2, 11, 'uVEek5cDD2', '2024-07-10', 'Pakistan', '3rrdnUv8YN', '2024-07-24', 'Yes', '2024-07-23 14:59:58'),
(3, 12, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:40:08'),
(4, 13, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:40:29'),
(5, 14, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:41:06'),
(6, 15, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:41:35'),
(7, 16, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:51:54'),
(8, 17, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:52:17'),
(9, 18, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:53:13'),
(10, 19, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:54:14'),
(11, 20, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:54:37'),
(12, 21, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:55:05'),
(13, 22, 'aQISmidajf', '4218-07-23', 'Pakistan', 'thQSVuZtbJ', '1970-01-01', 'No', '2024-07-23 15:56:09'),
(14, 23, 'xIe1PEQSNk', '1970-01-01', 'Pakistan', 'if8Fq5Fzm4', '1970-01-01', 'No', '2024-07-23 16:19:28'),
(15, 24, 'xIe1PEQSNk', '1970-01-01', 'Pakistan', 'if8Fq5Fzm4', '1970-01-01', 'No', '2024-07-23 16:20:05'),
(16, 25, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:21:14'),
(17, 26, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:21:59'),
(18, 27, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:22:28'),
(19, 28, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:24:05'),
(20, 29, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:25:59'),
(21, 30, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:26:34'),
(22, 31, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:27:29'),
(23, 32, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:28:53'),
(24, 33, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:30:29'),
(25, 34, 'chRWcB8YP2', '1970-01-01', 'Pakistan', 'ZxMoLszlyu', '1970-01-01', 'No', '2024-07-23 16:31:27'),
(26, 35, 'eWiym4b3mT', '1970-01-01', 'Pakistan', 'MP7qtTQMA8', '1970-01-01', 'No', '2024-07-23 16:43:14'),
(27, 36, 'eWiym4b3mT', '1970-01-01', 'Pakistan', 'MP7qtTQMA8', '1970-01-01', 'No', '2024-07-23 16:43:39'),
(28, 37, 'eWiym4b3mT', '1970-01-01', 'Pakistan', 'MP7qtTQMA8', '1970-01-01', 'No', '2024-07-23 16:44:39'),
(29, 38, 'i2gbj7fRpT', '1970-01-01', 'Pakistan', '41KZ85NDwc', '1970-01-01', 'No', '2024-07-23 16:45:51'),
(30, 39, 'iC4HTpFDBa', '1970-01-01', 'Pakistan', '2O1iCjhjDa', '1970-01-01', 'No', '2024-07-23 16:46:34');

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
  `DocumentDescription` text COLLATE utf8mb4_general_ci,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residency_documents`
--

INSERT INTO `residency_documents` (`DocumentID`, `UserID`, `DocumentType`, `DocumentDescription`, `updatedAt`) VALUES
(50, 31, 'Tax Return', 'Tax return 2023', '2024-07-23 16:27:29'),
(51, 31, 'Driving License', '2020', '2024-07-23 16:27:29'),
(52, 31, 'State ID', 'Arizona', '2024-07-23 16:27:29'),
(53, 31, 'Other Documents', 'Alabama', '2024-07-23 16:27:29'),
(54, 32, 'Tax Return', 'Tax return 2023', '2024-07-23 16:28:53'),
(55, 32, 'Driving License', '2020', '2024-07-23 16:28:53'),
(56, 32, 'State ID', 'Arizona', '2024-07-23 16:28:53'),
(57, 32, 'Other Documents', 'Alabama', '2024-07-23 16:28:53'),
(58, 33, 'Tax Return', 'Tax return 2023', '2024-07-23 16:30:29'),
(59, 33, 'Driving License', '2020', '2024-07-23 16:30:29'),
(60, 33, 'State ID', 'Arizona', '2024-07-23 16:30:29'),
(61, 33, 'Other Documents', 'Alabama', '2024-07-23 16:30:29'),
(62, 34, 'Tax Return', 'Tax return 2023', '2024-07-23 16:31:27'),
(63, 34, 'W-2', '2020', '2024-07-23 16:31:27'),
(64, 34, 'Driving License', 'Arizona', '2024-07-23 16:31:27'),
(65, 34, 'State ID', 'Alabama', '2024-07-23 16:31:27'),
(66, 34, 'Other Documents', 'Leases, Mobile number', '2024-07-23 16:31:27'),
(67, 35, 'Other Documents', 'Leases, Mobile number', '2024-07-23 16:43:14'),
(68, 36, 'Tax Return', 'Tax return 2023', '2024-07-23 16:43:39'),
(69, 36, 'Childern Birth Certificate', 'Abcd 2000', '2024-07-23 16:43:39'),
(70, 36, 'Other Documents', 'Leases, Mobile number', '2024-07-23 16:43:39'),
(71, 37, 'Tax Return', 'Tax return 2023', '2024-07-23 16:44:39'),
(72, 37, 'Childern Birth Certificate', 'Abcd 2000', '2024-07-23 16:44:39'),
(73, 37, 'Other Documents', 'Leases, Mobile number', '2024-07-23 16:44:39'),
(74, 38, 'Driving License', 'Tax return 2023', '2024-07-23 16:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `screen_id` int NOT NULL,
  `ScreenName` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Sequence` varchar(2) DEFAULT NULL,
  `FieldName` varchar(49) DEFAULT NULL,
  `EnglishLabel` varchar(76) DEFAULT NULL,
  `EnglishHelp` varchar(241) DEFAULT NULL,
  `SpanishLabel` varchar(89) DEFAULT NULL,
  `SpanishHelp` varchar(304) DEFAULT NULL,
  `Updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`screen_id`, `ScreenName`, `Sequence`, `FieldName`, `EnglishLabel`, `EnglishHelp`, `SpanishLabel`, `SpanishHelp`, `Updated`) VALUES
(1, 'Create Account', '0', 'Title', 'Create Account', '', 'Crear Una Cuenta', '', '2024-07-15 11:07:52'),
(2, 'Create Account', '1', 'Your ID', 'Use your email or cell phone #:', 'Use your email address or your cell phone number where we can send you answers to your questions or updates about the status of your case.', 'Utilice su correo electrónico o número de teléfono celular:', 'Utilice su dirección de correo electrónico o su número de teléfono celular donde podemos enviarle respuestas a sus preguntas o actualizaciones sobre el estado de su caso.', '2024-07-15 11:07:52'),
(3, 'Create Account', '2', 'Password', 'Password:', 'Must be at least 6 characters', 'Contraseña:', 'Debe tener como mínimo 6 caracteres', '2024-07-15 11:07:52'),
(4, 'Log In', '0', 'Title', 'Log In', '', 'Entrar a Tu Cuenta', '', '2024-07-15 11:07:52'),
(5, 'Log In', '1', 'Your ID', 'Email or Cell Phone #:', 'Use the email address or the cell phone number that you used when you created your account.', 'Correo electrónico o número de teléfono celular:', 'Utilice la dirección de correo electrónico o el número de teléfono celular que utilizó cuando creó su cuenta.', '2024-07-15 11:07:52'),
(6, 'Log In', '2', 'Password', 'Password:', 'Enter the password you used when you created your account.  If you\'ve forgotten your password, use forgot password below.', 'Contraseña:', 'Ingrese la contraseña que utilizó cuando creó su cuenta.  Si olvidó su contraseña, use la contraseña olvidada a continuación.', '2024-07-15 11:07:52'),
(7, 'Log In', '3', 'Forgot Password', 'Forgot Password', 'We\'ll send you a 6 digit code to the email or cell phone number you gave us when you created your account.', 'Olvide mi contraseña', 'Le enviaremos un código de 6 dígitos al correo electrónico o al número de teléfono celular que nos proporcionó cuando creó su cuenta.', '2024-07-15 11:07:52'),
(8, 'Inquiry Form', '0', 'Title', 'Inquiry/Qualification Payment', 'Provide us your name, ', 'Preguntas/Pago Para Cualificarlo', '', '2024-07-15 11:07:52'),
(9, 'Inquiry Form', '1', 'FirstName', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(10, 'Inquiry Form', '2', 'LastName', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(11, 'Inquiry Form', '3', 'Current State, Country of Residence', 'Your current state and country of residence', 'Enter the US State of your primary residence. If you\'re not currently residing in the US, enter the state and country were you\'re currently residing.', 'Su estado actual y país de residencia', 'Ingrese el estado estadounidense de su residencia principal. Si actualmente no reside en los EE. UU., ingrese el estado y el país donde reside actualmente.', '2024-07-15 11:07:52'),
(12, 'Inquiry Form', '4', 'PhoneNumber', 'Cell Phone Number', 'Enter your US cell phone number. If your cell phone is not American, select the code for that country first.', 'Número Celular', 'Ingrese su número de teléfono celular de EE. UU. Si tu celular no es americano, selecciona primero el código de ese país.', '2024-07-15 11:07:52'),
(13, 'Inquiry Form', '5', 'email', 'Your email address', 'Enter your primary email address, if you don\'t have an email address, leave it blank.', 'Su dirección de correo electrónico', 'Ingrese su dirección de correo electrónico principal; si no tiene una dirección de correo electrónico, déjela en blanco.', '2024-07-15 11:07:52'),
(14, 'Inquiry Form', '6', 'HelpwithQualifyingForm', 'Do you need help completing the PIPE Qualification form?', 'If you\'re not comfortable filling computer forms, you can schedule help with one of our assistants for an additional fee of $25 USD by checking \"Yes.\"', '¿Necesita ayuda para completar el formulario de Calificación PIPE?', 'Si no se siente cómodo completando formularios por computadora, puede programar ayuda con uno de nuestros asistentes por una tarifa adicional de $25 USD marcando \"Sí\".', '2024-07-15 11:07:52'),
(15, 'Inquiry Form', '7', 'PIPEQualifyingFee', 'Payment options', 'Select one of the 5 payment option that\'s most convenient for you. We\'ll be able to fill in your qualification data as soon as the payment has cleared. ', 'Opciones de Pago', 'Selecione una de las 5 forma de pago que más le convenga. Podremos completar sus datos de calificación tan pronto como se haya liquidado el pago. ', '2024-07-15 11:07:52'),
(16, 'Inquiry Form', '8', 'Questions', 'Do do have any questions before we can qualify you?', '', '¿Tiene alguna pregunta antes de que podamos calificarlo?', '', '2024-07-15 11:07:52'),
(17, '', '', '', '', '', '', '', '2024-07-15 11:07:52'),
(18, 'Qualification', '0', 'PIPE Qualification', 'PIPE Immigration Qualification ', 'The data you provide during the process will be used to determine if you qualify and how much effort will be required to get you the benefits of the PIPE program.', 'Calificación Para el Programa de inmigración PIPE ', 'Los datos que proporcione durante el proceso se utilizarán para determinar si califica y cuánto esfuerzo se requerirá para obtener los beneficios del programa PIPE.', '2024-07-15 11:07:52'),
(19, 'Qualification', '1', 'Firstname', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(20, 'Qualification', '2', 'Lastname', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(21, 'Qualification', '3', 'Birthday', 'Birthday', 'What date were you born?', 'Cumpleaños', '¿En qué fecha naciste?', '2024-07-15 11:07:52'),
(22, 'Qualification', '4', 'Birth State and Country', 'Birth State and Country', 'If the country were you were born used a different administrative division than state, use that classification. ', 'El país y estado donde naciste.', 'Si el país donde nació utilizaba una división administrativa diferente a la del estado, utilice esa clasificación. ', '2024-07-15 11:07:52'),
(23, 'Qualification', '5', 'AddressLine1', 'Your US Address Line 1', 'Line 1 of the US Address. If you don\'t have an address in the US, use your current address and explain in the last section why you don\'t have a US address.', 'Su dirección en EE. UU. Línea 1', 'Línea 1 de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., use su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
(24, 'Qualification', '6', 'AddressLine2', 'Your US Address Line 2', 'Line 2 of the US Address. If you don\'t have an address in the US, use your current address and explain in the last section why you don\'t have a US address.', 'Su dirección en EE. UU. Línea 1', 'Línea 2 de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., use su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
(25, 'Qualification', '7', 'ZipCode', 'The zipcode of your US address', 'Zip code of the US Address. If you don\'t have an address in the US, use the postal code of your current address and explain in the last section why you don\'t have a US address.', 'El código postal de su dirección en EE. UU.', 'Código postal de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., utilice el código postal de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
(26, 'Qualification', '8', 'City', 'City', 'City of your US Address. If you don\'t have an address in the US, use the city of your current address and explain in the last section why you don\'t have a US address.', 'Ciudad', 'Ciudad de su dirección en EE. UU. Si no tiene una dirección en los EE. UU., utilice la ciudad de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
(27, 'Qualification', '9', 'State', 'State', 'State of your US Address. If you don\'t have an address in the US, use the state/administrative division of your current address and explain in the last section why you don\'t have a US address.', 'Estado', 'Estado de su dirección en EE. UU. Si no tiene una dirección en los EE. UU., utilice la división estatal/administrativa de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
(28, 'Qualification', '10', 'CellPhone', 'Your Cell Phone #', 'Your primary US cell phone #. If your primary cell phone # is not in the US, specify its country code.', 'Su número de teléfono celular', 'Su número de teléfono celular principal de EE. UU. Si su número de teléfono celular principal no está en los EE. UU., especifique su código de país.', '2024-07-15 11:07:52'),
(29, '', '11', 'WhatApp', 'WhatApp?', 'WhatsApp is the easier way for us to send you text.  If you can install it on your cell phone, that would make it easy for us to communicate.  Leave it blank if you don\'t have WhatsApp installed. ', '¿Qué aplicación?', 'WhatsApp es la forma más fácil para nosotros de enviarte mensajes de texto.  Si puede instalarlo en su teléfono celular, nos facilitará la comunicación.  Déjalo en blanco si no tienes WhatsApp instalado. ', '2024-07-15 11:07:52'),
(30, 'Qualification', '12', 'HomePhone', 'Your Home Phone #', 'If you have a home phone number, please specify it, otherwise leave this field blank.', 'Su número de teléfono residencial', 'Si tiene un número de teléfono residencial, especifíquelo; de lo contrario, deje este campo en blanco.', '2024-07-15 11:07:52'),
(31, 'Qualification', '13', 'WorkPhone', 'Your Work Phone #', 'If you have a work phone number, please specify it, otherwise leave this field blank.', 'Su número de teléfono de trabajo', 'Si tiene un número de teléfono del trabajo, especifíquelo; de lo contrario, deje este campo en blanco.', '2024-07-15 11:07:52'),
(32, 'Qualification', '14', 'email', 'Your email address', 'If you have an email address where we can send you large document, please specify it, otherwise leave blank.', 'Su dirección de correo electrónico', 'Si tiene una dirección de correo electrónico donde podamos enviarle un documento grande, especifíquela; de lo contrario, déjela en blanco.', '2024-07-15 11:07:52'),
(33, 'Qualification', '15', 'EmergencyContact', 'The Name of Your Emergency Contact', 'The person we should contact in case we can\'t get a hold of you.', 'El nombre de su contacto de emergencia', 'La persona con la que debemos contactar en caso de que no podamos comunicarnos con usted.', '2024-07-15 11:07:52'),
(34, 'Qualification', '16', 'EmergencyPhone', 'The Phone # of this Emergency Contact', 'The cell phone number of your emergency contact.', 'El número de teléfono de este contacto de emergencia', 'El número de teléfono celular de su contacto de emergencia.', '2024-07-15 11:07:52'),
(35, 'Qualification', '17', 'SpouseName', 'Your Spouse\'s Name', 'Your US citizen spouse\'s full legal name as it appears in their US documents.', 'El nombre de su cónyuge', 'El nombre legal completo de su cónyuge ciudadano estadounidense tal como aparece en sus documentos estadounidenses.', '2024-07-15 11:07:52'),
(36, 'Qualification', '18', 'SpouseBirthday', 'Your Spouse\'s Birthday', 'Your US citizen spouse\'s birthday.', 'El cumpleaños de su cónyuge', 'El cumpleaños de su cónyuge ciudadano estadounidense.', '2024-07-15 11:07:52'),
(37, 'Qualification', '19', 'StateCountryofMarriage', 'Country, State Where You Marry', 'Country and state where you were married.', 'País, estado donde se casa', 'País y estado donde se casó.', '2024-07-15 11:07:52'),
(38, 'Qualification', '20', 'DateofMarriage', 'The Date of Your Marriage', 'The date that appears on your marriage to the US citizen.', 'La fecha de su matrimonio', 'La fecha que aparece en su matrimonio con el ciudadano estadounidense.', '2024-07-15 11:07:52'),
(39, 'Qualification', '21', 'ProofofSpouse\'sCitizenship', 'Proof of Your Spouse\'s US Citizenship', 'Typically it\'s their US birthcertificate, but if they\'re a naturalized citizen, then specify their US passport number and its expiration number.  If they don\'t have a US passport, enter their naturalization number.', 'Prueba de ciudadanía estadounidense de su cónyuge', 'Normalmente es su certificado de nacimiento de EE. UU., pero si es ciudadano naturalizado, especifique su número de pasaporte estadounidense y su número de vencimiento.  Si no tienen pasaporte estadounidense, ingrese su número de naturalización.', '2024-07-15 11:07:52'),
(40, 'Qualification', '22', 'USEntryDate', 'Date You Entered the US', 'What date did you enter the US? If you\'re not use enter your best estimate.', 'Fecha en que ingresó a los EE. UU.', '¿En qué fecha ingresaste a Estados Unidos? Si no lo utiliza, ingrese su mejor estimación.', '2024-07-15 11:07:52'),
(41, 'Qualification', '23', 'StateViaWhichYouEntered', 'State Via Which You Entered the US', 'Specify via which state, territory or commonwealth you entered the US.  If you\'re not sure, please explain.', 'Estado por el que ingresó a los EE. UU.', 'Especifique a través de qué estado, territorio o estado libre asociado ingresó a los EE. UU.  Si no está seguro, explíquelo.', '2024-07-15 11:07:52'),
(42, 'Qualification', '24', 'DescribeHowYouEnter', 'Describe How You Entered the US', 'Specify if you crossed the Mexican or Canadian borders, took a boat into the US, or arrived via commercial carriers.', 'Describa cómo ingresó a los EE. UU.', 'Especifique si cruzó las fronteras de México o Canadá, tomó un barco hacia los EE. UU. o llegó a través de transportistas comerciales.', '2024-07-15 11:07:52'),
(43, 'Qualification', '25', 'DidYouUseAnyIllegualDocumentation', 'Did You Use Any Ilegal Documentation to Enter the US?', '', '¿Utilizó alguna documentación ilegal para ingresar a los EE. UU.?', '', '2024-07-15 11:07:52'),
(44, 'Qualification', '26', 'WereYouDetainedbyUSBorderPatrol?', 'Were you Detained by US Border Patrol?', 'If you were detained by US Border Patrol, describe how and were specifically it happenned.', '¿Fuiste detenido por la Patrulla Fronteriza de EE. UU.?', 'Si fue detenido por la Patrulla Fronteriza de EE. UU., describa cómo y dónde sucedió específicamente.', '2024-07-15 11:07:52'),
(45, 'Qualification', '27', 'TaxReturnData', 'What years, if any, did you file US tax returns?', 'Enter the year of your US Federal tax returns, typically called IRS 1040 form.', '¿En qué años, si corresponde, presentó declaraciones de impuestos en los EE. UU.?', 'Ingrese el año de sus declaraciones de impuestos federales de EE. UU., generalmente llamado formulario 1040 del IRS.', '2024-07-15 11:07:52'),
(46, 'Qualification', '28', 'BirthCertificateofUSBornChildren?', 'How many of your children were born in the US?', 'Tell us the names and birthday of your US born children.', '¿Cuántos de sus hijos nacieron en Estados Unidos?', 'Díganos los nombres y la fecha de nacimiento de sus hijos nacidos en Estados Unidos.', '2024-07-15 11:07:52'),
(47, 'Qualification', '29', 'W-2?', 'Did you ever receive any W-2 from any of your employers?', 'Enter the name and years your employers provided you with W-2 forms.', '¿Alguna vez recibió algún W-2 de alguno de sus empleadores?', 'Ingrese el nombre y los años en que sus empleadores le proporcionaron los formularios W-2.', '2024-07-15 11:07:52'),
(48, 'Qualification', '30', 'DriverLicense', 'Did you ever get a driver\'s license from any US states?', 'If you ever received driver licenses from any US states, specify as much information as you have, e.g., the state of that driver\'s license, the year and ID number if you have it.', '¿Alguna vez obtuvo una licencia de conducir de algún estado de EE. UU.?', 'Si alguna vez recibió licencias de conducir de algún estado de EE. UU., especifique toda la información que tenga, por ejemplo, el estado de esa licencia de conducir, el año y el número de identificación, si lo tiene.', '2024-07-15 11:07:52'),
(49, 'Qualification', '31', 'OtherStateIssueIDs', 'Did you ever receive any State issued IDs?', 'If you ever received an ID from any US state, specify as much information as you have, e.g., the state of that ID, the year and ID number if you have it.', '¿Alguna vez recibió alguna identificación emitida por el estado?', 'Si alguna vez recibió una identificación de cualquier estado de EE. UU., especifique toda la información que tenga, por ejemplo, el estado de esa identificación, el año y el número de identificación, si lo tiene.', '2024-07-15 11:07:52'),
(50, 'Qualification', '32', 'OtherDocumentThatCouldUse', 'Do you have any other documents that could help us verify your US residency?', 'If you ever signed a rental agreement, have electric, water, phone or any utility bills in your name, tell us as much as you can remember about these documents. E.g., name on the contract/utility bill, its address, date, account number, etc.', '¿Tiene algún otro documento que pueda ayudarnos a verificar su residencia en los EE. UU.?', 'Si alguna vez firmó un contrato de alquiler, tiene facturas de electricidad, agua, teléfono o cualquier servicio público a su nombre, cuéntenos todo lo que pueda recordar sobre estos documentos. Por ejemplo, nombre en el contrato/factura de servicios públicos, su dirección, fecha, número de cuenta, etc.', '2024-07-15 11:07:52'),
(51, 'Qualification', '33', 'Child\'sFullLegalName', 'Full Name', 'Legal name of the child for whom you would like to obtain PIPE benefits.', 'Nombre completo', 'Nombre legal del niño por quien desea obtener beneficios PIPE.', '2024-07-15 11:07:52'),
(52, 'Qualification', '34', 'Birthday', 'Birthday', 'The birthday of that child', 'Cumpleaños', 'El cumpleaños de ese niño.', '2024-07-15 11:07:52'),
(53, 'Qualification', '35', 'StateCountryofBirth', 'State and Country of Birth', 'The state and country where that child was born.', 'Estado y país de nacimiento', 'El estado y país donde nació ese niño.', '2024-07-15 11:07:52'),
(54, 'Qualification', '36', 'MotherName', 'Mother\'s Name', 'The name of the child\'s mother as it appears in their birth certificate.', 'Nombre de la madre', 'El nombre de la madre del niño tal como aparece en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(55, 'Qualification', '37', 'FatherName', 'Father\'s Name', 'The name of the child\'s father as it appears in their birth certificate.', 'Nombre del Padre', 'El nombre del padre del niño tal como aparece en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(56, 'Qualification', '38', 'Gender', 'Gender', 'Whether the child is male or female.  The US immigration service currently doesn\'t recognize non-binary as a sex.', 'Género', 'Si el niño es hombre o mujer.  Actualmente, el servicio de inmigración de EE. UU. no reconoce el sexo no binario.', '2024-07-15 11:07:52'),
(57, 'Qualification', '39', 'School Attended, state and school years', 'School Attended, US state and school years', 'Names and US state of the schools the child has attended.  The school year the child attended these schools. ', 'Asistencia escolar, estado de EE. UU. y años escolares', 'Nombres y estado estadounidense de las escuelas a las que ha asistido el niño.  El año escolar el niño asistió a estas escuelas. ', '2024-07-15 11:07:52'),
(58, 'Qualification', '40', 'SchoolRecordAvailable', 'Can You Get Their School\'s Records?', 'If necessary, are you able to get the school records where your child attended the US school.', '¿Puede obtener los registros escolares de su escuela?', 'Si es necesario, ¿puede obtener los registros escolares en los que asistió su hijo a la escuela de EE. UU.?', '2024-07-15 11:07:52'),
(59, 'Qualification', '41', 'Employer', 'Name of Last Employer', 'The name of your last or current employer', 'Nombre del último empleador', 'El nombre de su último o actual empleador', '2024-07-15 11:07:52'),
(60, 'Qualification', '42', 'EmployerAddress', 'Employer\'s Address', 'The full address of your last or current employer', 'Dirección del empleado', 'La dirección completa de su último o actual empleador', '2024-07-15 11:07:52'),
(61, 'Qualification', '43', 'StartDate', 'Start Date', 'The approximate date when you started working there.', 'Fecha de inicio', 'La fecha aproximada en la que empezaste a trabajar allí.', '2024-07-15 11:07:52'),
(62, 'Qualification', '44', 'EndDate', 'End Date', 'The approximate last date when you stopped working there.', 'Fecha final', 'La última fecha aproximada en la que dejó de trabajar allí.', '2024-07-15 11:07:52'),
(63, 'Qualification', '45', 'JobTitle', 'Job Title', 'Whatever title is used to described your job.', 'Título profesional', 'Cualquier título que se utilice para describir su trabajo.', '2024-07-15 11:07:52'),
(64, 'Qualification', '46', 'JobDescription', 'Your Job Description', 'Tell us what you do in your job.', 'Su descripción de trabajo', 'Cuéntanos a qué te dedicas en tu trabajo.', '2024-07-15 11:07:52'),
(65, 'Qualification', '47', 'HighestCertificationDegree', 'Highest Certification Degree', 'If you had any college education or craft training that provided certification, please specify the highest certification here.', 'Grado de certificación más alto', 'Si tuvo alguna educación universitaria o capacitación artesanal que le otorgara certificación, especifique aquí la certificación más alta.', '2024-07-15 11:07:52'),
(66, 'Qualification', '48', 'InstitutionIssuingDegree', 'Institution Issuing Certification', 'The college, university, or trade school that issue that certification.', 'Institución que emite la certificación', 'El colegio, universidad o escuela vocacional que emite esa certificación.', '2024-07-15 11:07:52'),
(67, 'Qualification', '49', 'DateofDegree', 'Date of Certification', 'The date of that certification.', 'Fecha de Certificación', 'La fecha de dicha certificación.', '2024-07-15 11:07:52'),
(68, 'Qualification', '50', 'State and Country', 'State and Country of Certification', 'The state and country that certification.', 'Estado y país de certificación', 'El estado y país que certifica.', '2024-07-15 11:07:52'),
(69, 'Qualification', '51', 'CommunicableDisease', 'Communicable Disease', 'Are you currently being treated for any communicable diseases, e.g., the one listed below?', 'Enfermedad transmisible', 'Si actualmente está recibiendo tratamiento por alguna de las enfermedades transmisibles de esta lista, seleccione esta.', '2024-07-15 11:07:52'),
(70, 'Qualification', '52', 'MentalDisorder', 'Mental health challenges ', 'Are you currently being treated for any mental health challenges, e.g., the one listed below?', 'Desafíos de salud mental ', 'Si actualmente está recibiendo tratamiento por alguno de los problemas de salud mental de esta lista, seleccione esto.', '2024-07-15 11:07:52'),
(71, 'Qualification', '53', 'AccusedofChildAbduction', 'Accused of Child Abduction', 'Have you ever been formally charged by the police of child abduction?', 'Acusado de sustracción de menores', '¿Alguna vez la policía le ha acusado formalmente de sustracción de menores?', '2024-07-15 11:07:52'),
(72, 'Qualification', '54', 'ClaimedUSCitizenshipAfterSept1996', 'Last Date Claimed to be a US Citizen', 'What was the last date that you claimed to be a US Citizen? Describe in the field below what were the circumstances?', 'Última fecha en la que afirmó ser ciudadano estadounidense', '¿Cuál fue la última fecha en la que afirmó ser ciudadano estadounidense? Describe en el campo a continuación ¿cuáles fueron las circunstancias?', '2024-07-15 11:07:52'),
(73, 'Qualification', '55', 'MissingAnyUSRequiredVaccines', 'Are You Missing An US Required Vaccines', 'Are you missing any of the vaccines listed below?', '¿Le faltan las vacunas requeridas en EE. UU.?', '¿Le falta alguna de las vacunas que se enumeran a continuación?', '2024-07-15 11:07:52'),
(74, 'Qualification', '56', 'AccusedofDrugAddictionTraffickingProstitutionVice', 'Accused of Drug Addiction Trafficking Prostitution Vice', 'Have you ever been formally charged by the police in your country or in the US of drug addiction, drug trafficking, prostitution, vice, or abduction of another person?', 'Acusado de drogadicción, tráfico, prostitución y vicio', '¿Alguna vez ha sido acusado formalmente por la policía de su país o de Estados Unidos de drogadicción, tráfico de drogas, prostitución, vicio o secuestro de otra persona?', '2024-07-15 11:07:52'),
(75, 'Qualification', '57', 'Deported from the US', 'Deported from the US', 'Have you ever been deported from the US?', 'Deportado de EE.UU.', '¿Alguna vez ha sido deportado de los EE. UU.?', '2024-07-15 11:07:52'),
(76, 'Qualification', '58', 'USElectionVotedIn', 'Last US Election You Voted In', 'Enter the date of the last US election that you voted in.', 'Última elección estadounidense en la que usted votó', 'Ingrese la fecha de la última elección estadounidense en la que votó.', '2024-07-15 11:07:52'),
(94, 'Qualification', '66', 'Foreign Born Children Seeking PIPE Benefits', 'Foreign Born Children Seeking PIPE Benefits', NULL, 'Niños Nacidos en el Extranjero que Buscan Beneficios PIPE', NULL, '2024-07-23 04:00:46'),
(93, 'Qualification', '65', 'Encounters with Law Enforcement Agencies', 'Encounters with Law Enforcement Agencies', NULL, 'Encuentros con Agencias de Aplicación de la Ley', NULL, '2024-07-23 04:00:46'),
(92, 'Qualification', '64', 'Residency Documents', 'Residency Documents', NULL, 'Documentos de Residencia', NULL, '2024-07-23 04:00:46'),
(91, 'Qualification', '63', 'US Entries', 'US Entries', NULL, 'Entradas a EE.UU.', NULL, '2024-07-23 04:00:46'),
(90, 'Qualification', '62', 'Previous Marriage', 'Previous Marriage', NULL, 'Matrimonio Anterior', NULL, '2024-07-23 04:00:46'),
(89, 'Qualification', '61', 'Current Marriage to US Citizen', 'Current Marriage to US Citizen', NULL, 'Matrimonio Actual con Ciudadano Estadounidense', NULL, '2024-07-23 04:00:46'),
(88, 'Qualification', '60', 'Current US Address', 'Current US Address', NULL, 'Dirección Actual en EE.UU.', NULL, '2024-07-23 04:00:46'),
(87, 'Qualification', '59', 'Personal Information', 'Personal Information', NULL, 'Información Personal', NULL, '2024-07-23 04:00:46'),
(95, 'Qualification', '67', 'Occupation/Employment', 'Occupation/Employment', NULL, 'Ocupación/Empleo', NULL, '2024-07-23 04:00:46'),
(96, 'Qualification', '68', 'Education/Craft', 'Education/Craft', NULL, 'Educación/Arte', NULL, '2024-07-23 04:00:46'),
(97, 'Qualification', '69', 'Additional Considerations', 'Additional Considerations', NULL, 'Consideraciones Adicionales', NULL, '2024-07-23 04:00:46'),
(98, 'Qualification', '70', 'MiddleName', 'Your Middle Name(s)', 'Enter your middle name(s) as they appear in your passport or ID.', 'Su(s) segundo nombre(s)', 'Ingrese su(s) segundo nombre(s) tal como aparecen en su pasaporte o identificación.', '2024-07-15 11:07:52'),
(99, 'Qualification', '71', 'CountryOfCitizenship', 'Country of Citizenship', 'Indicate the country where you hold citizenship.', 'País de Ciudadanía', 'Indique el país en el que tiene ciudadanía.', '2024-07-15 11:07:52'),
(100, 'Qualification', '72', 'Gender', 'Your Gender', 'Select your gender as indicated on your official documents.', 'Su Género', 'Seleccione su género tal como aparece en sus documentos oficiales.', '2024-07-23 04:14:08'),
(101, 'Qualification', '73', 'InCareOfName', 'In Care of Name', 'Enter the name of the person in whose care the letter should be sent.', 'A cargo del nombre', 'Ingrese el nombre de la persona a cuyo cuidado se debe enviar la carta.', '2024-07-23 17:39:12'),
(102, 'Qualification', '74', 'exSpouseFullLegalName', 'Ex-spouse Full Legal Name', 'Enter the full legal name of your ex-spouse', 'Nombre completo del ex-cónyuge', 'Ingrese el nombre completo legal de su ex-cónyuge', '2024-07-23 19:45:38'),
(103, 'Qualification', '75', 'stateCountryOfDivorce', 'State and Country of Divorce', 'Enter the state and country where the divorce was finalized', 'Estado y país del divorcio', 'Ingrese el estado y país donde se finalizó el divorcio', '2024-07-23 19:45:38'),
(104, 'Qualification', '76', 'dateOfDivorce', 'Date of Divorce', 'Enter the date when the divorce was finalized', 'Fecha del divorcio', 'Ingrese la fecha en que se finalizó el divorcio', '2024-07-23 19:45:38'),
(105, 'Qualification', '77', 'decreeOfDivorce', 'Can you obtain this decree of divorce?', 'Indicate whether you can obtain the decree of divorce', '¿Puede obtener este decreto de divorcio?', 'Indique si puede obtener el decreto de divorcio', '2024-07-23 19:45:38');

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `ClientID` int DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `birthPlace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `citizenshipCountry` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `ClientID`, `firstName`, `middleName`, `lastName`, `birthday`, `birthPlace`, `citizenshipCountry`, `gender`, `createdAt`, `updatedAt`) VALUES
(1, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-10-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 12:35:04', '2024-07-23 12:35:04'),
(2, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-11-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:10:12', '2024-07-23 14:10:12'),
(3, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-11-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:11:40', '2024-07-23 14:11:40'),
(4, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-11-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:12:01', '2024-07-23 14:12:01'),
(5, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-10-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:38:15', '2024-07-23 14:38:15'),
(6, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-10-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:41:07', '2024-07-23 14:41:07'),
(7, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-10-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:41:13', '2024-07-23 14:41:13'),
(8, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-10-07', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:41:26', '2024-07-23 14:41:26'),
(9, 3, 'Ans', 'asd', 'asd', '2024-07-15', 'Pakistan', 'Pakistan', 'male', '2024-07-23 14:43:20', '2024-07-23 14:43:20'),
(10, 3, 'Syed', 's9haYvSKhe', 'Bukhari', '2024-07-09', '3tiOEjEVgy', '4SiCQxcK6m', 'male', '2024-07-23 14:58:43', '2024-07-23 14:58:43'),
(11, 3, 'Syed', 's9haYvSKhe', 'Bukhari', '2024-07-09', '3tiOEjEVgy', '4SiCQxcK6m', 'male', '2024-07-23 14:59:58', '2024-07-23 14:59:58'),
(12, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:40:08', '2024-07-23 15:40:08'),
(13, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:40:29', '2024-07-23 15:40:29'),
(14, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:41:06', '2024-07-23 15:41:06'),
(15, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:41:35', '2024-07-23 15:41:35'),
(16, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:51:54', '2024-07-23 15:51:54'),
(17, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:52:17', '2024-07-23 15:52:17'),
(18, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:53:13', '2024-07-23 15:53:13'),
(19, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:54:14', '2024-07-23 15:54:14'),
(20, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:54:36', '2024-07-23 15:54:36'),
(21, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:55:05', '2024-07-23 15:55:05'),
(22, 3, '1234', 'IIcgMej2JL', 'Bukhari', '2024-04-09', 'uajMyCs26q', 'fWhXYfsHPm', 'male', '2024-07-23 15:56:09', '2024-07-23 15:56:09'),
(23, 3, '1234', 'ZvV0VVNr10', 'Bukhari', '2024-04-09', 'td1DHtMrtx', 'Itd3EUf6Gk', 'male', '2024-07-23 16:19:28', '2024-07-23 16:19:28'),
(24, 3, '1234', 'ZvV0VVNr10', 'Bukhari', '2024-04-09', 'td1DHtMrtx', 'Itd3EUf6Gk', 'male', '2024-07-23 16:20:05', '2024-07-23 16:20:05'),
(25, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:21:14', '2024-07-23 16:21:14'),
(26, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:21:59', '2024-07-23 16:21:59'),
(27, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:22:28', '2024-07-23 16:22:28'),
(28, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:24:05', '2024-07-23 16:24:05'),
(29, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:25:59', '2024-07-23 16:25:59'),
(30, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:26:34', '2024-07-23 16:26:34'),
(31, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:27:29', '2024-07-23 16:27:29'),
(32, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:28:53', '2024-07-23 16:28:53'),
(33, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:30:29', '2024-07-23 16:30:29'),
(34, 3, '1234', 'l4G6mFNrPM', 'Bukhari', '2024-04-09', 'lmQugedYwM', '5dLLl8pbs9', 'male', '2024-07-23 16:31:27', '2024-07-23 16:31:27'),
(35, 3, '1234', 'EVMvmKc2oj', 'Bukhari', '2024-04-09', 'l4xVRTp3mc', 'zK9CIUjQip', 'male', '2024-07-23 16:43:14', '2024-07-23 16:43:14'),
(36, 3, '1234', 'EVMvmKc2oj', 'Bukhari', '2024-04-09', 'l4xVRTp3mc', 'zK9CIUjQip', 'male', '2024-07-23 16:43:39', '2024-07-23 16:43:39'),
(37, 3, '1234', 'EVMvmKc2oj', 'Bukhari', '2024-04-09', 'l4xVRTp3mc', 'zK9CIUjQip', 'male', '2024-07-23 16:44:39', '2024-07-23 16:44:39'),
(38, 3, '1234', 'TorfWYXbp8', 'Bukhari', '2024-04-09', 'SysdX5JI5q', 'hHZCgaUpva', 'male', '2024-07-23 16:45:51', '2024-07-23 16:45:51'),
(39, 3, '1234', 'QSOxr4y8oJ', 'Bukhari', '2024-04-09', 'pb2hOQfA2y', '1Voi2f3RNv', 'male', '2024-07-23 16:46:34', '2024-07-23 16:46:34');

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
-- Table structure for table `us_address`
--

CREATE TABLE `us_address` (
  `AddressID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `careOfName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `street2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipCode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cellPhone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homePhone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `workPhone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currentEmail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergencyContact` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergencyPhone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `residency` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `us_address`
--

INSERT INTO `us_address` (`AddressID`, `UserID`, `careOfName`, `street1`, `street2`, `zipCode`, `city`, `state`, `cellPhone`, `homePhone`, `workPhone`, `currentEmail`, `emergencyContact`, `emergencyPhone`, `residency`, `createdAt`, `updatedAt`) VALUES
(1, 3, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'New York', 'New York', '33994040353', '', '', 'anas14529@gmail.com', 'Muzammal', '12341234', 'Flr,', '2024-07-23 14:11:40', '2024-07-23 14:11:40'),
(2, 4, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'New York', 'New York', '33994040353', '', '', 'anas14529@gmail.com', 'Muzammal', '12341234', 'Flr,Abcd', '2024-07-23 14:12:01', '2024-07-23 14:12:01'),
(3, 5, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'Faisalabad', 'Punjab', '33994040353', '', '', 'anas14529@gmail.com', 'Abcd', '33994040353', 'Other,', '2024-07-23 14:38:15', '2024-07-23 14:38:15'),
(4, 6, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'Faisalabad', 'Punjab', '33994040353', '', '', 'anas14529@gmail.com', 'Abcd', '33994040353', 'Other,', '2024-07-23 14:41:07', '2024-07-23 14:41:07'),
(5, 7, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'Faisalabad', 'Punjab', '33994040353', '', '', 'anas14529@gmail.com', 'Abcd', '33994040353', 'Other,', '2024-07-23 14:41:13', '2024-07-23 14:41:13'),
(6, 8, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'Faisalabad', 'Punjab', '33994040353', '', '', 'anas14529@gmail.com', 'Abcd', '33994040353', 'Other,', '2024-07-23 14:41:26', '2024-07-23 14:41:26'),
(7, 9, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', '38000', 'Faisalabad', 'Punjab', '33994040353', '', '', 'anas14529@gmail.com', 'sad', '33994040353', 'Other,', '2024-07-23 14:43:20', '2024-07-23 14:43:20'),
(8, 10, 'PMU8k44SDO', '2WmhFiheYh', 'bRP5kZPF7b', 'CJVDLzkQiI', 'R9RNGmctug', 'HjcWDatHi7', 'aTWDk28Grh', 'K3N2R0IfLs', 'S9zqyFbCcs', 'a6scz@ucoo.com', 'C9ANbifb05', 'ssuA7vd6wa', 'Other,K3FNGadIII', '2024-07-23 14:58:43', '2024-07-23 14:58:43'),
(9, 11, 'PMU8k44SDO', '2WmhFiheYh', 'bRP5kZPF7b', 'CJVDLzkQiI', 'R9RNGmctug', 'HjcWDatHi7', '1233123321', 'K3N2R0IfLs', 'S9zqyFbCcs', 'a6scz@ucoo.com', 'C9ANbifb05', 'ssuA7vd6wa', 'Other,K3FNGadIII', '2024-07-23 14:59:58', '2024-07-23 14:59:58'),
(10, 12, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:40:08', '2024-07-23 15:40:08'),
(11, 13, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:40:29', '2024-07-23 15:40:29'),
(12, 14, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:41:06', '2024-07-23 15:41:06'),
(13, 15, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:41:35', '2024-07-23 15:41:35'),
(14, 16, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:51:54', '2024-07-23 15:51:54'),
(15, 17, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:52:17', '2024-07-23 15:52:17'),
(16, 18, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:53:13', '2024-07-23 15:53:13'),
(17, 19, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:54:14', '2024-07-23 15:54:14'),
(18, 20, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:54:37', '2024-07-23 15:54:37'),
(19, 21, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:55:05', '2024-07-23 15:55:05'),
(20, 22, 'G4qdHzLNtk', 'KwhdNWP6gj', '0CAOmPD18C', 'pq5FItJCRo', 'K0hoRgTwrk', 'WjRj0FND4g', '1233123321', 'q5eJ785Y3O', 'UoUzJBpIHJ', 'g9jg0@iltw.com', 'oeuw0rn2XC', '53ml5vuwB6', 'Other,31aVS1qaji', '2024-07-23 15:56:09', '2024-07-23 15:56:09'),
(21, 23, 'KD3MkEMzH4', 'ZWy06cGJYw', 'p8q7bDxXeq', 'CZCSNPi0ph', '5eZrOhjeh4', 'WPPzY7P8nC', '1233123321', '01aC9Vf22b', 'mp9Yr0nLdm', 'op87d@jejs.com', 'BtjsUOherE', 'fcOjTzIDuh', 'Other,9iW52uN1na', '2024-07-23 16:19:28', '2024-07-23 16:19:28'),
(22, 24, 'KD3MkEMzH4', 'ZWy06cGJYw', 'p8q7bDxXeq', 'CZCSNPi0ph', '5eZrOhjeh4', 'WPPzY7P8nC', '1233123321', '01aC9Vf22b', 'mp9Yr0nLdm', 'op87d@jejs.com', 'BtjsUOherE', 'fcOjTzIDuh', 'Other,9iW52uN1na', '2024-07-23 16:20:05', '2024-07-23 16:20:05'),
(23, 25, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:21:14', '2024-07-23 16:21:14'),
(24, 26, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:21:59', '2024-07-23 16:21:59'),
(25, 27, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:22:28', '2024-07-23 16:22:28'),
(26, 28, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:24:05', '2024-07-23 16:24:05'),
(27, 29, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:25:59', '2024-07-23 16:25:59'),
(28, 30, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:26:34', '2024-07-23 16:26:34'),
(29, 31, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:27:29', '2024-07-23 16:27:29'),
(30, 32, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:28:53', '2024-07-23 16:28:53'),
(31, 33, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:30:29', '2024-07-23 16:30:29'),
(32, 34, 'IyMNFYGGTa', 'Um1fgPN4s0', 'h4GOSUFT3H', 'IewWnzcrVN', 'MYH7w9c81n', 'uf8URBnEhC', '1233123321', 'j2k6geEstq', 'qqbJfY0WqK', 'ftonp@l5dk.com', 'DWDskaWfZ8', 'StkkY6sAXp', 'Flr,23EUuSgDcz', '2024-07-23 16:31:27', '2024-07-23 16:31:27'),
(33, 35, 'd4FDLwB6En', 'YRWrDksLYH', 'YJEs7Mt7PG', 'sBq6o1etBm', 'cJ39k7uscv', '1BnHFujGD6', '1233123321', '1DKUKR5SAI', 'kvAmtqoZzU', 'ha06p@nr2l.com', 'gUsDgP8kC1', '4ZlP7SgB4n', 'Flr,FyiQSSWREK', '2024-07-23 16:43:14', '2024-07-23 16:43:14'),
(34, 36, 'd4FDLwB6En', 'YRWrDksLYH', 'YJEs7Mt7PG', 'sBq6o1etBm', 'cJ39k7uscv', '1BnHFujGD6', '1233123321', '1DKUKR5SAI', 'kvAmtqoZzU', 'ha06p@nr2l.com', 'gUsDgP8kC1', '4ZlP7SgB4n', 'Flr,FyiQSSWREK', '2024-07-23 16:43:39', '2024-07-23 16:43:39'),
(35, 37, 'd4FDLwB6En', 'YRWrDksLYH', 'YJEs7Mt7PG', 'sBq6o1etBm', 'cJ39k7uscv', '1BnHFujGD6', '1233123321', '1DKUKR5SAI', 'kvAmtqoZzU', 'ha06p@nr2l.com', 'gUsDgP8kC1', '4ZlP7SgB4n', 'Flr,FyiQSSWREK', '2024-07-23 16:44:39', '2024-07-23 16:44:39'),
(36, 38, 'XlDxIwwwcL', '37STgnH1yQ', 'P46KbYfiCN', 'x3nadVgFWZ', 'Yb86TToR5z', 'UA6qL3FW1h', '1233123321', '9CPKnf44c0', 'm0UcUz7UGQ', 'bbaql@og7f.com', 'nDHO13kWqN', 'cmiz8JsgDR', 'Flr,odwbFraX60', '2024-07-23 16:45:51', '2024-07-23 16:45:51'),
(37, 39, 'gn5BmZkh9t', 'OADmQLn1CQ', 'y4Sk8HTtZt', 'AhKZJ9mA8w', 'p5t2dtOB60', 'wWa7xcICup', '1233123321', 'cdN5lWHn1f', 'iOhy4u1v2Q', 'iji5v@lupr.com', 'MkeFrZ8tG9', '731tLq0Q5F', 'Flr,jTqyNvMwxb', '2024-07-23 16:46:34', '2024-07-23 16:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `us_entries`
--

CREATE TABLE `us_entries` (
  `UserID` int NOT NULL,
  `dateOfEntry` date NOT NULL,
  `stateOfEntry` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `methodOfEntry` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `anyIllegalDocumentOnEntry` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detainedByUSPatrol` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `us_entries`
--

INSERT INTO `us_entries` (`UserID`, `dateOfEntry`, `stateOfEntry`, `methodOfEntry`, `anyIllegalDocumentOnEntry`, `detainedByUSPatrol`, `updatedAt`) VALUES
(22, '2024-07-04', 'x18SHDCUKQ', 'a1KX3EvB2c', 'jZlfJlxBKY', 'FN9jIYRgbV', '2024-07-23 15:56:09'),
(26, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:21:59'),
(27, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:22:28'),
(28, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:24:05'),
(29, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:25:59'),
(30, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:26:34'),
(31, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:27:29'),
(32, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:28:53'),
(33, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:30:29'),
(34, '2024-07-11', 'OJbY0lPkq3', 'r6P2ToeLZP', 'EvzybtkYET', 'H9d4ytA9ap', '2024-07-23 16:31:27'),
(35, '2024-07-23', 'u3spS8q0Du', 'uOfUL8R4Ya', 'MuKp0rM4es', 'n0ixbQKeFc', '2024-07-23 16:43:14'),
(36, '2024-07-23', 'u3spS8q0Du', 'uOfUL8R4Ya', 'MuKp0rM4es', 'n0ixbQKeFc', '2024-07-23 16:43:39'),
(37, '2024-07-23', 'u3spS8q0Du', 'uOfUL8R4Ya', 'MuKp0rM4es', 'n0ixbQKeFc', '2024-07-23 16:44:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `current_marriage`
--
ALTER TABLE `current_marriage`
  ADD PRIMARY KEY (`MarriageID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `previous_marriage`
--
ALTER TABLE `previous_marriage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `us_address`
--
ALTER TABLE `us_address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `us_entries`
--
ALTER TABLE `us_entries`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `current_marriage`
--
ALTER TABLE `current_marriage`
  MODIFY `MarriageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `previous_marriage`
--
ALTER TABLE `previous_marriage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `residency_documents`
--
ALTER TABLE `residency_documents`
  MODIFY `DocumentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `screen_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `us_address`
--
ALTER TABLE `us_address`
  MODIFY `AddressID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `current_marriage`
--
ALTER TABLE `current_marriage`
  ADD CONSTRAINT `current_marriage_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `previous_marriage`
--
ALTER TABLE `previous_marriage`
  ADD CONSTRAINT `previous_marriage_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `residency_documents`
--
ALTER TABLE `residency_documents`
  ADD CONSTRAINT `residency_documents_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `us_address`
--
ALTER TABLE `us_address`
  ADD CONSTRAINT `us_address_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `us_entries`
--
ALTER TABLE `us_entries`
  ADD CONSTRAINT `us_entries_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
