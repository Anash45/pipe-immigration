-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2024 at 04:10 PM
-- Server version: 10.6.18-MariaDB-cll-lve-log
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imminzio_pipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_considerations`
--

CREATE TABLE `additional_considerations` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `anyCommunicableDisease` varchar(255) DEFAULT NULL,
  `anyMissingVaccines` varchar(255) DEFAULT NULL,
  `anyMentalDisorder` varchar(255) DEFAULT NULL,
  `accusedDrugAddiction` varchar(255) DEFAULT NULL,
  `accusedChildAbduction` varchar(255) DEFAULT NULL,
  `deportedFromUS` varchar(255) DEFAULT NULL,
  `citizenshipAfter96` varchar(255) DEFAULT NULL,
  `electionsVoted` varchar(255) DEFAULT NULL,
  `capacityToSupport` varchar(255) DEFAULT NULL,
  `otherQuestions` varchar(1500) NOT NULL DEFAULT '''''',
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_considerations`
--

INSERT INTO `additional_considerations` (`id`, `UserID`, `anyCommunicableDisease`, `anyMissingVaccines`, `anyMentalDisorder`, `accusedDrugAddiction`, `accusedChildAbduction`, `deportedFromUS`, `citizenshipAfter96`, `electionsVoted`, `capacityToSupport`, `otherQuestions`, `updatedAt`) VALUES
(1, 66, 'syphilis', '', 'Major Depressive Disorder with Psychotic Features', '', '', '', '', '', '', '', '2024-07-27 01:39:37'),
(2, 86, 'tuberculosis', '', 'Schizophrenia', 'No', 'Child No', 'Deported No', 'Claimed No', 'US Election NO', 'Support Details', 'Other Questions.', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `inCareOfName` varchar(100) DEFAULT NULL,
  `street1` varchar(255) NOT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `Apartment` varchar(20) DEFAULT NULL,
  `Suite` varchar(20) DEFAULT NULL,
  `Floor` varchar(20) DEFAULT NULL,
  `zipCode` varchar(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `cellPhone` varchar(20) DEFAULT NULL,
  `homePhone` varchar(20) DEFAULT NULL,
  `workPhone` varchar(20) DEFAULT NULL,
  `currentEmail` varchar(255) DEFAULT NULL,
  `emergencyContact` varchar(255) DEFAULT NULL,
  `emergencyPhone` varchar(20) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `UserID`, `inCareOfName`, `street1`, `street2`, `Apartment`, `Suite`, `Floor`, `zipCode`, `city`, `state`, `cellPhone`, `homePhone`, `workPhone`, `currentEmail`, `emergencyContact`, `emergencyPhone`, `createdAt`, `updatedAt`) VALUES
(61, 63, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', NULL, NULL, NULL, 'CJVDLzkQiI', 'Faisalabad', 'Alabama', '33994040353', '', '', 'anas14529@gmail.com', 'C9ANbifb05', '33994040353', '2024-07-25 01:02:42', '2024-07-25 01:02:42'),
(62, 64, 'Abcd', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', NULL, NULL, NULL, 'CJVDLzkQiI', 'Faisalabad', 'Alabama', '33994040353', '', '', 'anas14529@gmail.com', 'C9ANbifb05', '33994040353', '2024-07-25 01:03:17', '2024-07-25 01:03:17'),
(63, 65, 'PMU8k44SDO', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', 'Abcd', NULL, NULL, 'x3nadVgFWZ', 'Faisalabad', 'Alabama', '33994040353', '', '', 'anas14529@gmail.com', 'BtjsUOherE', '33994040353', '2024-07-25 01:03:53', '2024-07-25 01:03:53'),
(64, 66, '', '123 Main Street', '', NULL, NULL, NULL, '85020', 'Phoenix ', 'Arizona', '60255514789', '', '8084641972', 'dsuriel1218@gmail.com', 'Nic Suriel', '6025553214', '2024-07-27 01:39:37', '2024-07-27 01:39:37'),
(65, 67, 'In Care of Name Icon', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', NULL, NULL, NULL, '39564', 'Ocean Springs', 'Mississippi', 'vYbOabr2ut', 'vJWQkQvPGE', 'ZN4ZqLFCx3', 'ol15x@4ilc.com', 'NmuJL6g2NN', 'mvP8tVqiYQ', '2024-07-29 00:24:23', '2024-07-29 00:24:23'),
(66, 68, 'In Care of Name Icon', 'H#3, St#4, Plots Bhaiwala', 'Near Al Muslim School', NULL, NULL, NULL, '39564', 'Ocean Springs', 'Mississippi', 'vYbOabr2ut', 'vJWQkQvPGE', 'ZN4ZqLFCx3', 'ol15x@4ilc.com', 'NmuJL6g2NN', 'mvP8tVqiYQ', '2024-07-29 00:25:01', '2024-07-29 00:25:01'),
(67, 69, 'In Care of Name Icon', 'fuYLq6iNyD', '30HYxQmAH9', NULL, NULL, NULL, 'VMRMe68G46', 'KqFXamEUQc', 'Alabama', '3DRyuxMZDH', 'o90vvyeJR9', 'IwZtVYYpkI', 'ye8g9@twwc.com', 'QMOFC5gfzs', 'o2CXQ0JmzV', '2024-07-29 00:29:27', '2024-07-29 00:29:27'),
(68, 70, 'ICN', 'Markaz e Aal e Hassan', 'Plots, Bhaiwala', NULL, NULL, NULL, '39564', 'Ocean Springs', 'Mississippi', '03457868696', '', '', 'f4futuretech@gmail.com', 'zIQJEltFbF', '03457868696', '2024-07-29 00:31:24', '2024-07-29 00:31:24'),
(69, 71, 'ybmhnHNafM', 'CFSXnHoB9x', 'PnYgJ3AXoJ', NULL, NULL, NULL, 'OlXVAZ4QA3', 'RKpLaP7OOi', 'Alabama', '2ANtHbQCYC', 'Idr0Cf8NTB', 'faU2ByiXWW', 'egkbq@qdtz.com', 'iXC8WycbMr', 'Rhhbj292Wo', '2024-07-29 00:32:48', '2024-07-29 00:32:48'),
(70, 72, 'ybmhnHNafM', 'CFSXnHoB9x', 'PnYgJ3AXoJ', NULL, NULL, NULL, 'OlXVAZ4QA3', 'RKpLaP7OOi', 'Alabama', '2ANtHbQCYC', 'Idr0Cf8NTB', 'faU2ByiXWW', 'egkbq@qdtz.com', 'iXC8WycbMr', 'Rhhbj292Wo', '2024-07-29 00:33:04', '2024-07-29 00:33:04'),
(71, 73, 'ybmhnHNafM', 'CFSXnHoB9x', 'PnYgJ3AXoJ', NULL, NULL, NULL, 'OlXVAZ4QA3', 'RKpLaP7OOi', 'Alabama', '2ANtHbQCYC', 'Idr0Cf8NTB', 'faU2ByiXWW', 'egkbq@qdtz.com', 'iXC8WycbMr', 'Rhhbj292Wo', '2024-07-29 00:33:23', '2024-07-29 00:33:23'),
(72, 74, 'tVUpF8TeZG', 'yAj1MTrR2U', 'awKDNxA1XY', NULL, NULL, NULL, 'olAdsax2bv', 'l5WLIN0sw2', 'Alabama', 'jVXeG1Bmd4', 'fEAfH6OYU0', 'a0ejyz21gR', 'vqrth@u3hg.com', 'uXwDwhuU19', 'M6mW5haaOW', '2024-07-29 00:34:00', '2024-07-29 00:34:00'),
(73, 75, 'tVUpF8TeZG', 'yAj1MTrR2U', 'awKDNxA1XY', NULL, NULL, NULL, 'olAdsax2bv', 'l5WLIN0sw2', 'Alabama', 'jVXeG1Bmd4', 'fEAfH6OYU0', 'a0ejyz21gR', 'vqrth@u3hg.com', 'uXwDwhuU19', 'M6mW5haaOW', '2024-07-29 00:34:01', '2024-07-29 00:34:01'),
(74, 76, 'XHnNPPUUHj', 'bUzs9olbuu', 'bbOQvktXNU', NULL, NULL, NULL, 'CtIcPOn2QN', 'N5QlJ7y75D', 'Alabama', 'dqfhQOhBTp', '7Y6u8VGnJX', 'D7cC9vqreU', 'oxbjr@mhyt.com', '6IF4kjmWxO', '9FYVc3y1YD', '2024-07-29 00:34:44', '2024-07-29 00:34:44'),
(75, 77, 'XHnNPPUUHj', 'bUzs9olbuu', 'bbOQvktXNU', NULL, NULL, NULL, 'CtIcPOn2QN', 'N5QlJ7y75D', 'Alabama', 'dqfhQOhBTp', '7Y6u8VGnJX', 'D7cC9vqreU', 'oxbjr@mhyt.com', '6IF4kjmWxO', '9FYVc3y1YD', '2024-07-29 00:34:50', '2024-07-29 00:34:50'),
(76, 78, 'XHnNPPUUHj', 'bUzs9olbuu', 'bbOQvktXNU', NULL, NULL, NULL, 'CtIcPOn2QN', 'N5QlJ7y75D', 'Alabama', 'dqfhQOhBTp', '7Y6u8VGnJX', 'D7cC9vqreU', 'oxbjr@mhyt.com', '6IF4kjmWxO', '9FYVc3y1YD', '2024-07-29 00:34:56', '2024-07-29 00:34:56'),
(77, 79, 'XHnNPPUUHj', 'bUzs9olbuu', 'bbOQvktXNU', NULL, NULL, NULL, 'CtIcPOn2QN', 'N5QlJ7y75D', 'Alabama', 'dqfhQOhBTp', '7Y6u8VGnJX', 'D7cC9vqreU', 'oxbjr@mhyt.com', '6IF4kjmWxO', '9FYVc3y1YD', '2024-07-29 00:35:33', '2024-07-29 00:35:33'),
(78, 80, 'UluVnIKNZZ', '9POBfpbRAo', 'OypkvP9AOF', NULL, NULL, NULL, 'c2DNwBdj5n', 'f0WGKNY1qg', 'Alabama', 'Axmf85RWNi', 'VnNjpr5IXV', 'm62yxJl8th', 'bfro9@96sa.com', 'YfxG2Qjxaw', '4X9kXORW7s', '2024-07-29 00:41:01', '2024-07-29 00:41:01'),
(79, 81, 'UluVnIKNZZ', '9POBfpbRAo', 'OypkvP9AOF', NULL, NULL, NULL, 'c2DNwBdj5n', 'f0WGKNY1qg', 'Alabama', 'Axmf85RWNi', 'VnNjpr5IXV', 'm62yxJl8th', 'bfro9@96sa.com', 'YfxG2Qjxaw', '4X9kXORW7s', '2024-07-29 00:41:31', '2024-07-29 00:41:31'),
(80, 82, '', '340 Lanipo Drive', '', NULL, NULL, NULL, '96734', 'Kailua', 'Hawaii', '8084641972', '', '', 'dsuriel1218@gmail.com', 'Nic Suriel', '6025551214', '2024-07-29 14:31:05', '2024-07-29 14:31:05'),
(81, 83, 'p8G3FxkAwL', 'NT7w04reoi', 'cARTLkbNVG', NULL, NULL, NULL, 'kpDIVoUTfv', '3lHtyrnskp', 'Alabama', '2OGjwqmWj6', 'vLEOAvOpyf', 'R5aCmzF2Uj', '9im4k@wa1q.com', 'MdPCDdhV2B', 'vTXpzaxZ7h', '2024-07-29 15:36:56', '2024-07-29 15:36:56'),
(82, 84, 'A1qk6E9poZ', 'YQAeb4NclD', 'O13jBxa7jW', NULL, NULL, NULL, 'eDy8ZtW9Hs', 'lDvwgazN0A', 'Alabama', 'UsdoO546Pn', 'ZpgvTEfAlC', 'Di7gpIvscX', '4znp4@oric.com', 'Soz5JkjKoz', 'egkJwqhg9R', '2024-07-29 15:40:50', '2024-07-29 15:40:50'),
(83, 85, 'LBgsCRjJU1', 'zuFoLVYgNU', 'tG73fvigwR', NULL, NULL, NULL, 'rSabX9StAe', 'JyiHKQlLai', 'Alabama', 'IAL3UurqQ8', 'KoIsL8ixWt', 'fqV8QE1aQR', 'enyit@on0e.com', '12wtc6mTTu', 'mAjwtshuJ8', '2024-07-29 15:41:43', '2024-07-29 15:41:43'),
(84, 86, 'hGfWwVpzO5', 'EGCzCYYpJR', 'J7Kam8JbO7', NULL, NULL, NULL, 'Ts69UbKtNg', 'eyzJ3r07Wk', 'Alabama', 'LBrZuiBLhv', 'NTeqeYwKO5', 'JIDKmj6PxE', 'hqcut@xxcs.com', 'RVBcPs7jq2', 'GVpYMzTrUe', '2024-07-29 15:43:27', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `UserID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Goal` varchar(3000) NOT NULL,
  `Notes` varchar(5000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE `attorney` (
  `attorneyID` int(11) NOT NULL,
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
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `certificationDegree` varchar(255) NOT NULL,
  `degreeUniversity` varchar(255) NOT NULL,
  `degreeDate` date NOT NULL,
  `degreeStateAndCountry` varchar(255) NOT NULL,
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`id`, `UserID`, `certificationDegree`, `degreeUniversity`, `degreeDate`, `degreeStateAndCountry`, `updatedAt`) VALUES
(4, 67, 'BS', 'UNV', '2024-07-13', 'Idoha', '2024-07-29 00:24:23'),
(5, 68, 'BS', 'UNV', '2024-07-13', 'Idoha', '2024-07-29 00:25:01'),
(6, 69, 'JhpVoEruJ3', 'H0qL089B5U', '1970-01-01', 'YMfTFY0pCF', '2024-07-29 00:29:27'),
(7, 71, 'oKlk1ToVQM', 'AdEtENNHgB', '2024-07-18', 'YAuDDYgWs0', '2024-07-29 00:32:48'),
(8, 72, 'oKlk1ToVQM', 'AdEtENNHgB', '2024-07-18', 'YAuDDYgWs0', '2024-07-29 00:33:04'),
(9, 73, 'oKlk1ToVQM', 'AdEtENNHgB', '2024-07-18', 'YAuDDYgWs0', '2024-07-29 00:33:23'),
(10, 74, 'DfxOQ4cyJ1', 'yXQsm7LaRM', '2024-07-18', '9DH52YhlwN', '2024-07-29 00:34:00'),
(11, 75, 'DfxOQ4cyJ1', 'yXQsm7LaRM', '2024-07-18', '9DH52YhlwN', '2024-07-29 00:34:01'),
(12, 76, 'L9ASzXTWaZ', 'oUOr3hyFPV', '2024-07-18', 'Xk8z9h3yeu', '2024-07-29 00:34:44'),
(13, 77, 'L9ASzXTWaZ', 'oUOr3hyFPV', '2024-07-18', 'Xk8z9h3yeu', '2024-07-29 00:34:50'),
(14, 78, 'L9ASzXTWaZ', 'oUOr3hyFPV', '2024-07-18', 'Xk8z9h3yeu', '2024-07-29 00:34:56'),
(15, 79, 'L9ASzXTWaZ', 'oUOr3hyFPV', '2024-07-18', 'Xk8z9h3yeu', '2024-07-29 00:35:33'),
(16, 80, 'fI8XF3AxXm', 'fMenY26GD7', '2024-07-18', 'uim5PrPPU6', '2024-07-29 00:41:01'),
(17, 81, 'fI8XF3AxXm', 'fMenY26GD7', '2024-07-18', 'uim5PrPPU6', '2024-07-29 00:41:31'),
(18, 82, '7-29 Testing highest education', 'Harvard ', '1975-12-18', 'MA, USA', '2024-07-29 14:31:05'),
(19, 83, '2bEgK448WO', 'iuNF6lGa7c', '2024-07-18', 'ljTqQ9G7Zj', '2024-07-29 15:36:56'),
(20, 84, 'Hs3XClmpgN', 'VjY9bFL9AE', '2024-07-18', '2Qrr5jvOUn', '2024-07-29 15:40:50'),
(21, 85, 'UXHnXInFtt', 'mqMLCzqXzd', '2024-07-18', 'J1cRQo2QtY', '2024-07-29 15:41:43'),
(22, 86, 'p1Gn7Fhf5m', 'uFvvQBng7f', '2024-07-18', '1VGA6pEpmy', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_or_phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `status` varchar(20) NOT NULL,
  `locked_until` datetime DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `full_name`, `email_or_phone`, `password`, `verified`, `status`, `locked_until`, `createdAt`, `updatedAt`) VALUES
(10, 'Syed Muhammad Anas Bukhari', 'anas14529@gmail.com', '$2y$10$kMkNiV4JOwUw4ALryU1AUOpTG.GqTE7gy3tdvi2Rfri8iTu2HFYZq', 1, '', NULL, '2024-07-26 23:56:00', '2024-07-27 22:28:43'),
(11, 'Syed Muhammad Anas Bukhari', 'f4futuretech@gmail.com', '$2y$10$DVUj0Z7jdfwcyuQruPLMqONpvP470FokeytE5toiTX9wkqfmhxxta', 1, '', NULL, '2024-07-27 00:32:58', '2024-07-27 00:32:58'),
(12, 'Dilia Suriel', 'dilia@appliedinsightinc.com', '$2y$10$brGt.JDR8Oexou9jJOxyheAOK/9Dt5uh8TSEkm1n155heoz8/yj/y', 1, '', NULL, '2024-07-27 01:45:18', '2024-07-27 01:45:18'),
(13, 'Diana Rockweel', 'dsuriel1218@gmail.com', '$2y$10$SAkJUcnTPU6GMrLswsFYDe2dbLN3QZh3zNK34HTJuv7D0t7a/9eRq', 1, '', NULL, '2024-07-27 17:58:40', '2024-07-27 17:58:40'),
(14, 'Matthew Suria', 'matthew@itstaskable.com', '$2y$10$dUVfsPk7DCe8YbQDcHobqOuIz3LLD6BeeoomdJVNO8gfbTwYuubpW', 1, '', NULL, '2024-07-27 19:11:56', '2024-07-27 19:11:56'),
(16, 'Dllia Suriel', 'dilia@usainmigracion.mx', '$2y$10$rQMj8hivWD.FlUSAWa4fGeTAAfD8KHzaobhSKku9ouytvG.SwIJlq', 1, '', NULL, '2024-07-28 13:10:57', '2024-07-28 13:10:57'),
(17, 'Dilia Suriel', 'pepe@gmail.com', '$2y$10$7tiF87V3ZXYZAOyFRZI6YebMBicR4VicD89irzqUDKV/8R2OQ9X0y', 1, '', NULL, '2024-07-28 14:32:39', '2024-07-28 14:32:39'),
(20, 'Anas', 'futuretest45@gmail.com', '$2y$10$xpgvx56IX2e5FNvi0MSigezLbYhzMiXxM.ToTaJynRvWSfjiCUXuu', 1, '', NULL, '2024-07-28 16:33:11', '2024-07-28 16:33:38'),
(22, 'AB', '+1 (555) 555-5555', '$2y$10$ZIpmEphdo9T.LKmFQjiEgOgSpH1zAiUYGln/QfvJPXqNx21QWlLUu', 1, '', NULL, '2024-07-28 16:41:22', '2024-07-28 16:41:22'),
(23, 'Dilia Suriel', 'ayuga@usainmigracion.mx', '$2y$10$hMpEQ.3xh2TU0LYiC4F9IuH99Oz4xpzLomUXiDtlueMCPYzOp0Uiu', 0, '', NULL, '2024-07-28 16:45:43', '2024-07-28 16:45:43'),
(24, 'Testing phone number', '+524151441187', '$2y$10$hW9EWJ8tT7OBnet/zt1YGujueakiXLK1UA61P9AU3sG/OPvIX/nFe', 1, '', NULL, '2024-07-28 16:48:47', '2024-07-28 16:48:47'),
(25, 'Testing phone number', 'dilia@thinwomanbrain.com', '$2y$10$zlCh5NI9DGN8zX6.OofEU.FEeFHMM7owASLOOOf8Q72vE7oDpgNO.', 1, '', NULL, '2024-07-28 16:51:18', '2024-07-28 16:52:32'),
(26, 'Matt Suria', 'mandre4521@gmail.com', '$2y$10$9cRCXKIAtpSK9RWvFjs5Bu2Drj5Du8fhz92KhuyJ/OC1/fZSLY7b.', 1, '', NULL, '2024-07-29 18:41:58', '2024-07-29 18:42:20'),
(27, 'Matt Suria', 'mgsuria3@gmail.com', '$2y$10$grJMH4IaVuSDRcONtA1WZ.ruxaPK/pHPKlpAJ7xHQGphVE5dm8.aq', 0, '', NULL, '2024-07-29 18:51:39', '2024-07-29 18:51:39'),
(28, 'Matthew Suria', 'msuria889@outlook.com', '$2y$10$7EMKcQP.wqxkuUeR/r2Rjuh7gXRHUfF18/WSZWEWUOoMqN9UPo32y', 0, '', NULL, '2024-07-29 21:05:47', '2024-07-29 21:05:47'),
(29, 'Gina Testing', 'rgalderton@yahoo.com', '$2y$10$jBPYnJNAZK//8cgnPagEx.pvcmf2OCKfQcoXbNP5JbVvGB5h16vIa', 0, '', NULL, '2024-07-29 21:19:41', '2024-07-29 21:19:41'),
(30, 'Gina Testing2', 'myspanishteacher111@gmail.com', '$2y$10$GH6rdgUUPfOPbRNrHpLbJeQZc20f1HIk9qk5rLe1aEgcMfl3OT5Q.', 1, '', NULL, '2024-07-29 21:26:39', '2024-07-29 21:27:13'),
(31, 'Anas', '+52 415 144 1187', '$2y$10$.AycUaxruB8bS.4SBrJUX.IcKP5niQzE8UJ.14e1iGzI7y4azLNpy', 0, '', NULL, '2024-08-02 02:20:52', '2024-08-02 02:20:52'),
(32, 'Anas', '602-399-7645', '$2y$10$dxLCDYGnPPGDO/SjyGIFgexeWGdtZ0a377riNdBvAzNbQvy6KfseC', 0, '', NULL, '2024-08-02 02:21:11', '2024-08-02 02:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `userID` int(11) NOT NULL,
  `DocType` varchar(100) NOT NULL COMMENT 'Passport, birth certificate, spouse’s citizenship {US Birth Certificate, US Passport, US Naturalization Certificate}, State and Country of marriage certificate, IRS 1040, non-US children’s school records, W-2, rental agreement, utility bills, ICE issues {Detailed at the border, false paper given to ICE, deported, criminal record {Felony, drug usage, drug trafficking, crimes against minors',
  `DocDate` date NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `employerName` varchar(255) NOT NULL,
  `employerAddress` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobLastDate` date DEFAULT NULL,
  `jobDescription` text DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `UserID`, `employerName`, `employerAddress`, `startDate`, `jobTitle`, `jobLastDate`, `jobDescription`, `createdAt`, `updatedAt`) VALUES
(1, 69, '54H4LNXzOd', 'dKFlEg1A6W', '1970-01-01', 'TkLLd0YlN5', '1970-01-01', 'a1wbY6sGax', '2024-07-29 00:29:27', '2024-07-29 00:29:27'),
(2, 71, 'shiS2vhFD8', 'fq9ZForpza', '2024-07-10', 'LLw1uPOxrs', '2024-07-10', 'Vbh3u0lxeb', '2024-07-29 00:32:48', '2024-07-29 00:32:48'),
(3, 72, 'shiS2vhFD8', 'fq9ZForpza', '2024-07-10', 'LLw1uPOxrs', '2024-07-10', 'Vbh3u0lxeb', '2024-07-29 00:33:04', '2024-07-29 00:33:04'),
(4, 73, 'shiS2vhFD8', 'fq9ZForpza', '2024-07-10', 'LLw1uPOxrs', '2024-07-10', 'Vbh3u0lxeb', '2024-07-29 00:33:23', '2024-07-29 00:33:23'),
(5, 74, 'xEFvvopLPN', 'CzhTcwgCNF', '2024-07-10', '3TZHXllnH4', '2024-07-10', 'zvCMQ5JHrN', '2024-07-29 00:34:00', '2024-07-29 00:34:00'),
(6, 75, 'xEFvvopLPN', 'CzhTcwgCNF', '2024-07-10', '3TZHXllnH4', '2024-07-10', 'zvCMQ5JHrN', '2024-07-29 00:34:01', '2024-07-29 00:34:01'),
(7, 76, 'KSmyCzvkFG', 'bJjbsQDEM9', '2024-07-10', 'Rb3oIhEjt0', '2024-07-10', 'ZPikEcZ07l', '2024-07-29 00:34:44', '2024-07-29 00:34:44'),
(8, 77, 'KSmyCzvkFG', 'bJjbsQDEM9', '2024-07-10', 'Rb3oIhEjt0', '2024-07-10', 'ZPikEcZ07l', '2024-07-29 00:34:50', '2024-07-29 00:34:50'),
(9, 78, 'KSmyCzvkFG', 'bJjbsQDEM9', '2024-07-10', 'Rb3oIhEjt0', '2024-07-10', 'ZPikEcZ07l', '2024-07-29 00:34:56', '2024-07-29 00:34:56'),
(10, 79, 'KSmyCzvkFG', 'bJjbsQDEM9', '2024-07-10', 'Rb3oIhEjt0', '2024-07-10', 'ZPikEcZ07l', '2024-07-29 00:35:33', '2024-07-29 00:35:33'),
(11, 80, 'JggHgwrsgP', 'JGrzqaTfJg', '2024-07-10', 'EMA5HUUIqB', '2024-07-10', 'KJA4o66Hul', '2024-07-29 00:41:01', '2024-07-29 00:41:01'),
(12, 81, 'JggHgwrsgP', 'JGrzqaTfJg', '2024-07-10', 'EMA5HUUIqB', '2024-07-10', 'KJA4o66Hul', '2024-07-29 00:41:31', '2024-07-29 00:41:31'),
(13, 82, '7-29 Testing Employer Name', '7-29 Testing Empleador', '2010-12-18', '7-29 Testing professional title', '2023-12-18', '7-29 Testing professional description', '2024-07-29 14:31:05', '2024-07-29 14:31:05'),
(14, 83, 'I26KJd1fXu', 'e9Um4AI7QI', '2024-07-10', 'u4BuAzMT9O', '2024-07-10', '7Wo6lAmHft', '2024-07-29 15:36:56', '2024-07-29 15:36:56'),
(15, 84, 'JCYk5ITJxW', 'xPp5M8FE61', '2024-07-10', 'PawBfMfu8U', '2024-07-10', 'yEitGgc3pg', '2024-07-29 15:40:50', '2024-07-29 15:40:50'),
(16, 85, 'y1cqrpuRSN', 'b3aEjGJL7z', '2024-07-10', '7htsbluuy8', '2024-07-10', '0IGlkKLALB', '2024-07-29 15:41:43', '2024-07-29 15:41:43'),
(17, 86, 'YQBKjI7ynF', 'ZJQXfbokJN', '2024-07-10', 'F5gDcNDHii', '2024-07-10', 'vI8ycHz1WY', '2024-07-29 15:43:27', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `encounter`
--

CREATE TABLE `encounter` (
  `EncounterID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DateOfEncounter` date NOT NULL,
  `StateCountryOfLegalEncounter` varchar(255) NOT NULL,
  `NatureOfLegalIssue` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `encounter`
--

INSERT INTO `encounter` (`EncounterID`, `UserID`, `DateOfEncounter`, `StateCountryOfLegalEncounter`, `NatureOfLegalIssue`, `Description`, `updatedAt`) VALUES
(1, 66, '2010-07-13', 'Phoenix, AZ', 'Stop for drunk driving but let go', '', '2024-07-27 01:39:37'),
(2, 67, '2024-07-14', 'ALABAMa', 'Not', 'asdjhsdasd ', '2024-07-29 00:24:23'),
(3, 68, '2024-07-14', 'ALABAMa', 'Not', 'asdjhsdasd ', '2024-07-29 00:25:01'),
(4, 71, '2024-07-17', 'kBl2vcSWEc', 'RCc6pAbEVv', 'qQXvVwD3sr', '2024-07-29 00:32:48'),
(5, 72, '2024-07-17', 'kBl2vcSWEc', 'RCc6pAbEVv', 'qQXvVwD3sr', '2024-07-29 00:33:04'),
(6, 73, '2024-07-17', 'kBl2vcSWEc', 'RCc6pAbEVv', 'qQXvVwD3sr', '2024-07-29 00:33:23'),
(7, 74, '2024-07-17', '0BJ6nFy4Qy', 'wJseXW4T44', 'h1VzZq4EhL', '2024-07-29 00:34:00'),
(8, 75, '2024-07-17', '0BJ6nFy4Qy', 'wJseXW4T44', 'h1VzZq4EhL', '2024-07-29 00:34:01'),
(9, 76, '2024-07-17', 'qf1CHHQ7uI', 'uPv725xRDW', 'zzjLFgPR54', '2024-07-29 00:34:44'),
(10, 77, '2024-07-17', 'qf1CHHQ7uI', 'uPv725xRDW', 'zzjLFgPR54', '2024-07-29 00:34:50'),
(11, 78, '2024-07-17', 'qf1CHHQ7uI', 'uPv725xRDW', 'zzjLFgPR54', '2024-07-29 00:34:56'),
(12, 79, '2024-07-17', 'qf1CHHQ7uI', 'uPv725xRDW', 'zzjLFgPR54', '2024-07-29 00:35:33'),
(13, 80, '2024-07-17', 'IGXFQyAcpc', 'Jzn6GwY0um', 'IlZF70NHrF', '2024-07-29 00:41:01'),
(14, 81, '2024-07-17', 'IGXFQyAcpc', 'Jzn6GwY0um', 'IlZF70NHrF', '2024-07-29 00:41:31'),
(15, 82, '1985-12-18', 'Phoenix, AZ', 'Stop for drunk driving but let go', 'They gave me a sobriety test, noted that I was drunk but they let me go.', '2024-07-29 14:31:05'),
(16, 83, '2024-07-17', '0S8RWf6oDV', 'wsqk7iK64C', '7ZcdmoIFCx', '2024-07-29 15:36:56'),
(17, 84, '2024-07-17', 'IBUHA0K6i9', 'RfsNXbP1CN', 'w3epfxImKf', '2024-07-29 15:40:50'),
(18, 85, '2024-07-17', '8JmG121T1P', 'qFscHb0so3', 'afKAT3M7ym', '2024-07-29 15:41:43'),
(19, 86, '2024-07-17', 'aDZXKHuLRa', 'sVhN0ix1kl', 'OiIsr5HraP', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `identifierdocument`
--

CREATE TABLE `identifierdocument` (
  `UserID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL COMMENT 'Passport, BirthCertificate, etc.',
  `DateIssued` date NOT NULL,
  `IssuingLegalEntity` int(11) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Notes` int(11) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immigration_inquiry`
--

CREATE TABLE `immigration_inquiry` (
  `InquiryID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `currentStateAndCountry` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `whatsappConnected` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usaPresenceBeforeJun2024` varchar(10) DEFAULT NULL,
  `marriedToUSCitizenBeforeJun2024` varchar(10) DEFAULT NULL,
  `NoMajorIssues` varchar(10) DEFAULT NULL,
  `continuousPresenceEvidence` varchar(10) DEFAULT NULL,
  `suitableQualificationOption` varchar(40) DEFAULT NULL,
  `otherQuestions` varchar(1500) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immigration_inquiry`
--

INSERT INTO `immigration_inquiry` (`InquiryID`, `ClientID`, `first_name`, `last_name`, `currentStateAndCountry`, `phoneNumber`, `whatsappConnected`, `email`, `usaPresenceBeforeJun2024`, `marriedToUSCitizenBeforeJun2024`, `NoMajorIssues`, `continuousPresenceEvidence`, `suitableQualificationOption`, `otherQuestions`, `updatedAt`) VALUES
(4, 10, 'Syed', 'Bukhari', '123 jk123 k2131', '33994040353', 0, 'anas14529@gmail.com', 'yes', 'no', '10', 'yes', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(5, 11, 'Syed', 'Bukhari', '123 jk123 k2131', '33994040353', 0, 'f4futuretech@gmail.com', 'no', 'yes', '10', 'no', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(6, 12, 'Dilia', 'Suriel', 'NYC, NY', '6027986541', 0, 'dilia@appliedinsightinc.com', 'yes', 'yes', '10', 'yes', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(7, 13, 'Diana', 'Rockwell', 'Phoenix, AZ', '6023997645', 0, 'dsuriel1218@gmail.com', 'yes', 'yes', '10', 'yes', 'fillYourself', '', '2024-07-29 11:44:56'),
(9, 11, 'Syed', 'Bukhari', '123 jk123 k2131', '33994040353', 0, 'f4futuretech@gmail.com', 'no', 'no', '10', 'yes', 'fillYourself', '', '2024-07-29 11:44:56'),
(10, 12, 'Name Test', 'Last Name test', 'Testing state and country', '+1602=399-1495', 0, 'dilia@appliedinsightinc.com', 'yes', 'yes', 'yes', 'yes', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(11, 12, 'Dilia', 'Suriel', 'Testing State and Country', '+524151441187', 0, 'dilia@appliedinsightinc.com', 'yes', 'yes', 'yes', 'yes', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(12, 22, 'Syed', 'Anas', 'NY,  US', '+1 (555) 555-5555', 0, 'anas14529@gmail.com', 'yes', 'no', 'yes', 'yes', 'fillYourself', '', '2024-07-29 11:44:56'),
(13, 25, 'Testing phone number', 'Testing Last Name', 'Testing estado, pais', '+524151441187', 0, 'dilia@thinwomanbrain.com', 'yes', 'yes', 'yes', 'yes', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(14, 20, 'Syed', 'Bukhari', 'San Francisco, California 94109', '33994040353', 0, 'futuretest45@gmail.com', 'no', 'yes', 'yes', 'yes', 'needVideoConference', '', '2024-07-29 11:44:56'),
(15, 25, 'Testing phone number', 'Test', 'Denver, Colorado 80012', '+52', 0, 'dilia@thinwomanbrain.com', 'yes', 'yes', 'yes', 'yes', 'needHelpFilling', '', '2024-07-29 11:44:56'),
(16, 20, 'Syed', 'Bukhari', 'Ocean Springs, Mississippi 39564', '33994040353', 1, 'futuretest45@gmail.com', 'no', 'yes', 'yes', 'yes', 'needHelpFilling', 'No Nothing.', '2024-07-29 11:44:56'),
(17, 25, 'Dilia 7-29 7:32', 'Dilia 7-30 7:32', 'Phoenix, Arizona 85020', '3033997645', 0, 'dilia@thinwomanbrain.com', 'yes', 'yes', 'yes', 'yes', 'needHelpFilling', 'Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, Questions Pending, ', '2024-07-29 11:44:56'),
(18, 20, 'Syed', 'Bukhari', 'Rancho Cordova, California 95670', '33994040353', 0, 'futuretest45@gmail.com', 'no', 'yes', 'yes', 'yes', 'needHelpFilling', 'No', '2024-07-29 11:50:01'),
(19, 25, 'Dilia', 'Suriel', '96734', '8084641972', 0, 'dilia@thinwomanbrain.com', 'yes', 'yes', 'yes', 'yes', 'needHelpFilling', '', '2024-07-29 16:26:46'),
(20, 12, 'Nicomedes', 'Suriel', '85020', '6027171107', 1, 'dilia@appliedinsightinc.com', 'yes', 'yes', 'yes', 'yes', 'legalConsultationAtLawOffice', '', '2024-07-29 16:27:02'),
(21, 26, 'Matt Suria', 'Suria', 'Jacksonville, Florida 32257', '74168275', 1, 'mandre4521@gmail.com', 'yes', 'yes', 'yes', 'yes', 'fillYourself', '', '2024-07-30 15:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `marriage`
--

CREATE TABLE `marriage` (
  `MarriageID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `spouseName` varchar(255) NOT NULL,
  `dateOfMarriage` date DEFAULT NULL,
  `stateCountryOfMarriage` varchar(255) DEFAULT NULL,
  `spouseBirthday` date DEFAULT NULL,
  `proofOfSpouseCitizenship` varchar(255) DEFAULT NULL,
  `placeOfDivorce` varchar(255) DEFAULT NULL,
  `dateOfDivorce` date DEFAULT NULL,
  `obtainDecreeOfDivorce` varchar(3) DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage`
--

INSERT INTO `marriage` (`MarriageID`, `UserID`, `spouseName`, `dateOfMarriage`, `stateCountryOfMarriage`, `spouseBirthday`, `proofOfSpouseCitizenship`, `placeOfDivorce`, `dateOfDivorce`, `obtainDecreeOfDivorce`, `updatedAt`) VALUES
(46, 63, 'Current Spouse', '2024-07-05', 'GOAwrDPZwa', '2024-07-17', 'US Passport', NULL, NULL, NULL, '2024-07-25 01:02:42'),
(47, 64, 'Current Spouse', '2024-07-05', 'GOAwrDPZwa', '2024-07-17', 'US Passport', NULL, NULL, NULL, '2024-07-25 01:03:17'),
(48, 65, 'Current Spouse', '2024-07-12', '0W8oKfSCmt', '2024-07-15', 'US birth certificate', NULL, NULL, NULL, '2024-07-25 01:03:53'),
(49, 66, 'Fernando Gutierrez ', '2011-06-18', 'Maine, USA', '1960-07-15', 'US Passport', NULL, NULL, NULL, '2024-07-27 01:39:37'),
(50, 67, 'tBqPPPNp1a', '2024-07-11', 'uSLvNJOpqB', '2024-07-10', 'US Passport', NULL, NULL, NULL, '2024-07-29 00:24:23'),
(51, 67, 'rSLQmTIT34', '1970-01-01', 'HcpAEJqYvU', NULL, NULL, '8cWIn4YfIP', '1970-01-01', 'No', '2024-07-29 00:24:23'),
(52, 68, 'tBqPPPNp1a', '2024-07-11', 'uSLvNJOpqB', '2024-07-10', 'US Passport', NULL, NULL, NULL, '2024-07-29 00:25:01'),
(53, 68, 'rSLQmTIT34', '1970-01-01', 'HcpAEJqYvU', NULL, NULL, '8cWIn4YfIP', '1970-01-01', 'No', '2024-07-29 00:25:01'),
(54, 69, '5Cz3UZsXMx', '2024-07-31', 'eWlx4YQIj2', '2024-07-15', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:29:27'),
(55, 69, 'eSmXGC5cTq', '1970-01-01', 'Ks1PzxPiTQ', NULL, NULL, 'QdxSjWMbdd', '1970-01-01', 'No', '2024-07-29 00:29:27'),
(56, 70, 'fh91dyJ79R', '2024-07-16', 'Florida', '2024-07-18', 'US Passport', NULL, NULL, NULL, '2024-07-29 00:31:24'),
(57, 71, 'IPydR9DckH', '2024-07-24', 'XD0bFq5Aeg', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:32:48'),
(58, 71, 'tn03RZnPwJ', '1970-01-01', 'zx3eOyCD9O', NULL, NULL, 'Gdgt7rosAB', '1970-01-01', 'No', '2024-07-29 00:32:48'),
(59, 72, 'IPydR9DckH', '2024-07-24', 'XD0bFq5Aeg', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:33:04'),
(60, 72, 'tn03RZnPwJ', '1970-01-01', 'zx3eOyCD9O', NULL, NULL, 'Gdgt7rosAB', '1970-01-01', 'No', '2024-07-29 00:33:04'),
(61, 73, 'IPydR9DckH', '2024-07-24', 'XD0bFq5Aeg', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:33:23'),
(62, 73, 'tn03RZnPwJ', '1970-01-01', 'zx3eOyCD9O', NULL, NULL, 'Gdgt7rosAB', '1970-01-01', 'No', '2024-07-29 00:33:23'),
(63, 74, 'FZ61jl8VyG', '2024-07-24', '44YGaWBZF1', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:34:00'),
(64, 74, 'Rrjpn9JCaJ', '1970-01-01', 'HinsYV3X1z', NULL, NULL, 'xWo1XqgjJk', '1970-01-01', 'No', '2024-07-29 00:34:00'),
(65, 75, 'FZ61jl8VyG', '2024-07-24', '44YGaWBZF1', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:34:01'),
(66, 75, 'Rrjpn9JCaJ', '1970-01-01', 'HinsYV3X1z', NULL, NULL, 'xWo1XqgjJk', '1970-01-01', 'No', '2024-07-29 00:34:01'),
(67, 76, 'YqwbKjM9GI', '2024-07-24', 'xzXSH9Sb84', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:34:44'),
(68, 76, 'ZPVbbwh021', '1970-01-01', '5KUtc2kR2L', NULL, NULL, '4Qn1dyix5R', '1970-01-01', 'No', '2024-07-29 00:34:44'),
(69, 77, 'YqwbKjM9GI', '2024-07-24', 'xzXSH9Sb84', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:34:50'),
(70, 77, 'ZPVbbwh021', '1970-01-01', '5KUtc2kR2L', NULL, NULL, '4Qn1dyix5R', '1970-01-01', 'No', '2024-07-29 00:34:50'),
(71, 78, 'YqwbKjM9GI', '2024-07-24', 'xzXSH9Sb84', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:34:56'),
(72, 78, 'ZPVbbwh021', '1970-01-01', '5KUtc2kR2L', NULL, NULL, '4Qn1dyix5R', '1970-01-01', 'No', '2024-07-29 00:34:56'),
(73, 79, 'YqwbKjM9GI', '2024-07-24', 'xzXSH9Sb84', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:35:33'),
(74, 79, 'ZPVbbwh021', '1970-01-01', '5KUtc2kR2L', NULL, NULL, '4Qn1dyix5R', '1970-01-01', 'No', '2024-07-29 00:35:33'),
(75, 80, 'kUEzWgOAYW', '2024-07-24', 'XV2fOot0UN', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:41:01'),
(76, 80, 'CAnXDzKBT8', '1970-01-01', 'ZyfKnXXJ6Z', NULL, NULL, 'esklHreRzS', '1970-01-01', 'No', '2024-07-29 00:41:01'),
(77, 81, 'kUEzWgOAYW', '2024-07-24', 'XV2fOot0UN', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 00:41:31'),
(78, 81, 'CAnXDzKBT8', '1970-01-01', 'ZyfKnXXJ6Z', NULL, NULL, 'esklHreRzS', '1970-01-01', 'No', '2024-07-29 00:41:31'),
(79, 82, 'Roberto Umberto Yucatan', '2000-12-18', 'Niagara Falls, United States', '1960-12-18', 'US Passport', NULL, NULL, NULL, '2024-07-29 14:31:05'),
(80, 83, 'sZuTITZvoN', '2024-07-24', '4VsjvAX9Gw', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 15:36:56'),
(81, 83, 'OuIa6oZLSi', '1970-01-01', 'bFXhvTL6Vw', NULL, NULL, 'nU8TueZYfO', '1970-01-01', 'No', '2024-07-29 15:36:56'),
(82, 84, 'wL80KlxWsx', '2024-07-24', '6RC5eAZh8a', '2024-08-09', 'US Passport', NULL, NULL, NULL, '2024-07-29 15:40:50'),
(83, 84, 'BeVthwG1kO', '2024-07-23', '2LUoL8KxF6', NULL, NULL, 'CbtIOv84Lz', '1970-01-01', 'No', '2024-07-29 15:40:50'),
(84, 85, 'gxDZWtUSKq', '2024-07-24', 'bqSMHOrjxB', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 15:41:43'),
(85, 85, 'czaYlBfwS2', '2024-07-23', 'SYgaNOVr8w', NULL, NULL, 'l9en7kKJVp', '1970-01-01', 'No', '2024-07-29 15:41:43'),
(86, 86, 'kBv1WQkHYF', '2024-07-24', 'EGGqpWd17I', '2024-08-09', 'US birth certificate', NULL, NULL, NULL, '2024-07-29 15:43:27'),
(87, 86, 'I1tExzbiAa', '2024-07-23', 'XfR9y89NC0', NULL, NULL, 'GgRNInJOwD', '1970-01-01', 'No', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `OfficeID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Hours` varchar(300) NOT NULL,
  `GooglePin` varchar(150) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offspring`
--

CREATE TABLE `offspring` (
  `OffspringID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `fullLegalName` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `stateCountryOfBirth` varchar(255) NOT NULL,
  `mothersName` varchar(255) NOT NULL,
  `fathersName` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `schoolDetails` text NOT NULL,
  `accessToSchoolRecords` enum('Yes','No') NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offspring`
--

INSERT INTO `offspring` (`OffspringID`, `UserID`, `fullLegalName`, `birthday`, `stateCountryOfBirth`, `mothersName`, `fathersName`, `gender`, `schoolDetails`, `accessToSchoolRecords`, `createdAt`, `updatedAt`) VALUES
(1, 66, 'Juanita Gonzalez', '2004-10-14', 'Mexico City, Mexico', 'Maria Yolanda Perez', 'Francisco Julian Perez', 'Female', 'Yes several', 'Yes', '2024-07-27 01:39:37', '2024-07-27 01:39:37'),
(2, 67, 'EY31UfOcbW', '2024-07-23', 'wCh42On7b6', 'AzB7d6LJo0', 'Z5hAc4wvfG', 'Male', 'UMXTsrhNXh', 'Yes', '2024-07-29 00:24:23', '2024-07-29 00:24:23'),
(3, 67, '0MXhIer86c', '2024-07-25', 'KLVL1HKjav', '9K34Giq9vB', 'gKLODfvkTA', 'Male', 'wtR5pWk7PY', 'Yes', '2024-07-29 00:24:23', '2024-07-29 00:24:23'),
(4, 67, 'uFmclnlUXB', '2024-07-18', 'gPAb13RMM7', 'gtCB4JMbmn', 'VZuCPTvuM0', 'Male', 'vd5aEGTc2M', 'No', '2024-07-29 00:24:23', '2024-07-29 00:24:23'),
(5, 68, 'EY31UfOcbW', '2024-07-23', 'wCh42On7b6', 'AzB7d6LJo0', 'Z5hAc4wvfG', 'Male', 'UMXTsrhNXh', 'Yes', '2024-07-29 00:25:01', '2024-07-29 00:25:01'),
(6, 68, '0MXhIer86c', '2024-07-25', 'KLVL1HKjav', '9K34Giq9vB', 'gKLODfvkTA', 'Male', 'wtR5pWk7PY', 'Yes', '2024-07-29 00:25:01', '2024-07-29 00:25:01'),
(7, 68, 'uFmclnlUXB', '2024-07-18', 'gPAb13RMM7', 'gtCB4JMbmn', 'VZuCPTvuM0', 'Male', 'vd5aEGTc2M', 'No', '2024-07-29 00:25:01', '2024-07-29 00:25:01'),
(8, 69, 'uiWlJ1IxDS', '1970-01-01', '9bsPwTen99', 'WBM5Bewl4P', '8EkRYuGAXl', 'Male', 'fD1MehB4Ys', 'No', '2024-07-29 00:29:27', '2024-07-29 00:29:27'),
(9, 69, 'L6p76TZNOj', '1970-01-01', 'FxfpY0bNQl', '1daDHVLHnw', 'Z0G8HFs4XH', 'Male', 'ChrDxIdXQx', 'No', '2024-07-29 00:29:27', '2024-07-29 00:29:27'),
(10, 69, 'J1GuX9Ej6Q', '1970-01-01', 'jUXHOIKBdC', '7bWI4XpU8u', 'hkqNaT2iCr', 'Male', 'CpvxEfkq6U', 'No', '2024-07-29 00:29:27', '2024-07-29 00:29:27'),
(11, 71, 'TtQabVpvOj', '2024-07-23', 'DzKKdsxRZW', 'E6DtyJs2XW', 'EQmDywZ4Xa', 'Male', 'lRi4U5yo0F', 'Yes', '2024-07-29 00:32:48', '2024-07-29 00:32:48'),
(12, 71, '3OwDXELROo', '2024-07-10', 'xmX6C3oRfw', 'PIcizBR2Lh', 'CLvl1xDkKD', 'Male', 'bsxm8wZ2m8', 'No', '2024-07-29 00:32:48', '2024-07-29 00:32:48'),
(13, 71, '22WvBjuUBa', '2024-07-17', '73eVk2HYUJ', 'I2pdQeuBcC', 'EeASLfEohk', 'Male', 'w9FQotTHmA', 'No', '2024-07-29 00:32:48', '2024-07-29 00:32:48'),
(14, 72, 'TtQabVpvOj', '2024-07-23', 'DzKKdsxRZW', 'E6DtyJs2XW', 'EQmDywZ4Xa', 'Male', 'lRi4U5yo0F', 'Yes', '2024-07-29 00:33:04', '2024-07-29 00:33:04'),
(15, 72, '3OwDXELROo', '2024-07-10', 'xmX6C3oRfw', 'PIcizBR2Lh', 'CLvl1xDkKD', 'Male', 'bsxm8wZ2m8', 'No', '2024-07-29 00:33:04', '2024-07-29 00:33:04'),
(16, 72, '22WvBjuUBa', '2024-07-17', '73eVk2HYUJ', 'I2pdQeuBcC', 'EeASLfEohk', 'Male', 'w9FQotTHmA', 'No', '2024-07-29 00:33:04', '2024-07-29 00:33:04'),
(17, 73, 'TtQabVpvOj', '2024-07-23', 'DzKKdsxRZW', 'E6DtyJs2XW', 'EQmDywZ4Xa', 'Male', 'lRi4U5yo0F', 'Yes', '2024-07-29 00:33:23', '2024-07-29 00:33:23'),
(18, 73, '3OwDXELROo', '2024-07-10', 'xmX6C3oRfw', 'PIcizBR2Lh', 'CLvl1xDkKD', 'Male', 'bsxm8wZ2m8', 'No', '2024-07-29 00:33:23', '2024-07-29 00:33:23'),
(19, 73, '22WvBjuUBa', '2024-07-17', '73eVk2HYUJ', 'I2pdQeuBcC', 'EeASLfEohk', 'Male', 'w9FQotTHmA', 'No', '2024-07-29 00:33:23', '2024-07-29 00:33:23'),
(20, 74, 'V1AkmaEdh1', '2024-07-17', 'WT4yCFN1iu', '27E98AAtLx', 'oVzXYuGUiW', 'Male', 'l9Bdfdx7tl', 'No', '2024-07-29 00:34:00', '2024-07-29 00:34:00'),
(21, 74, 'xJJx1vkwbJ', '2024-07-17', 'oj8a0a6fOQ', '5A5KMdrfLh', 'xbjUEdTLW4', 'Male', 'A8rGL4tTFa', 'No', '2024-07-29 00:34:00', '2024-07-29 00:34:00'),
(22, 74, 'aS6k1HgpY2', '2024-07-17', '4bxA7d11ap', 'J2m4WPnt1k', 'hMWAS1eeuy', 'Male', 'JC6zrirwFt', 'No', '2024-07-29 00:34:00', '2024-07-29 00:34:00'),
(23, 75, 'V1AkmaEdh1', '2024-07-17', 'WT4yCFN1iu', '27E98AAtLx', 'oVzXYuGUiW', 'Male', 'l9Bdfdx7tl', 'No', '2024-07-29 00:34:01', '2024-07-29 00:34:01'),
(24, 75, 'xJJx1vkwbJ', '2024-07-17', 'oj8a0a6fOQ', '5A5KMdrfLh', 'xbjUEdTLW4', 'Male', 'A8rGL4tTFa', 'No', '2024-07-29 00:34:01', '2024-07-29 00:34:01'),
(25, 75, 'aS6k1HgpY2', '2024-07-17', '4bxA7d11ap', 'J2m4WPnt1k', 'hMWAS1eeuy', 'Male', 'JC6zrirwFt', 'No', '2024-07-29 00:34:01', '2024-07-29 00:34:01'),
(26, 76, 'hULFudjHZt', '2024-07-17', 'T95so8kv5u', 'cZkfqAVg92', 'BNdFnTo1Yp', 'Male', 'GkhXppm98H', 'Yes', '2024-07-29 00:34:44', '2024-07-29 00:34:44'),
(27, 76, 'J6vjne0eZg', '2024-07-17', 'gY89jQbYvw', 'f7p8phH3uX', '4g8JoZaAVk', 'Male', 'pPlCNpdN9g', 'Yes', '2024-07-29 00:34:44', '2024-07-29 00:34:44'),
(28, 76, 'haYqeIAXJ4', '2024-07-17', 'HwTm35eRtu', 'A7R50ugpwb', 'OHvQhvi3sf', 'Male', 'cLSA3cHjvm', 'Yes', '2024-07-29 00:34:44', '2024-07-29 00:34:44'),
(29, 77, 'hULFudjHZt', '2024-07-17', 'T95so8kv5u', 'cZkfqAVg92', 'BNdFnTo1Yp', 'Male', 'GkhXppm98H', 'Yes', '2024-07-29 00:34:50', '2024-07-29 00:34:50'),
(30, 77, 'J6vjne0eZg', '2024-07-17', 'gY89jQbYvw', 'f7p8phH3uX', '4g8JoZaAVk', 'Male', 'pPlCNpdN9g', 'Yes', '2024-07-29 00:34:50', '2024-07-29 00:34:50'),
(31, 77, 'haYqeIAXJ4', '2024-07-17', 'HwTm35eRtu', 'A7R50ugpwb', 'OHvQhvi3sf', 'Male', 'cLSA3cHjvm', 'Yes', '2024-07-29 00:34:50', '2024-07-29 00:34:50'),
(32, 78, 'hULFudjHZt', '2024-07-17', 'T95so8kv5u', 'cZkfqAVg92', 'BNdFnTo1Yp', 'Male', 'GkhXppm98H', 'Yes', '2024-07-29 00:34:56', '2024-07-29 00:34:56'),
(33, 78, 'J6vjne0eZg', '2024-07-17', 'gY89jQbYvw', 'f7p8phH3uX', '4g8JoZaAVk', 'Male', 'pPlCNpdN9g', 'Yes', '2024-07-29 00:34:56', '2024-07-29 00:34:56'),
(34, 78, 'haYqeIAXJ4', '2024-07-17', 'HwTm35eRtu', 'A7R50ugpwb', 'OHvQhvi3sf', 'Male', 'cLSA3cHjvm', 'Yes', '2024-07-29 00:34:56', '2024-07-29 00:34:56'),
(35, 79, 'hULFudjHZt', '2024-07-17', 'T95so8kv5u', 'cZkfqAVg92', 'BNdFnTo1Yp', 'Male', 'GkhXppm98H', 'Yes', '2024-07-29 00:35:33', '2024-07-29 00:35:33'),
(36, 79, 'J6vjne0eZg', '2024-07-17', 'gY89jQbYvw', 'f7p8phH3uX', '4g8JoZaAVk', 'Male', 'pPlCNpdN9g', 'Yes', '2024-07-29 00:35:33', '2024-07-29 00:35:33'),
(37, 79, 'haYqeIAXJ4', '2024-07-17', 'HwTm35eRtu', 'A7R50ugpwb', 'OHvQhvi3sf', 'Male', 'cLSA3cHjvm', 'Yes', '2024-07-29 00:35:33', '2024-07-29 00:35:33'),
(38, 80, 'NNcep4ZC4K', '2024-07-17', 'Df5IgahjCW', '1nBYLTchEv', 'K8q64LkNdK', 'Male', 'cjz86pfNtR', 'No', '2024-07-29 00:41:01', '2024-07-29 00:41:01'),
(39, 80, 'xdllhltJG8', '2024-07-17', 'ZkqKaqo5Cg', 'mkapgCCi4e', 'IjPJZARgIN', 'Male', 'LfZWgZCTXk', 'No', '2024-07-29 00:41:01', '2024-07-29 00:41:01'),
(40, 80, 'qqLxPq4qqR', '2024-07-17', 'buKNB0HY3n', 'QExlHOAFHT', 'X35V5a4dkd', 'Male', 'm2CAMhD2si', 'No', '2024-07-29 00:41:01', '2024-07-29 00:41:01'),
(41, 81, 'NNcep4ZC4K', '2024-07-17', 'Df5IgahjCW', '1nBYLTchEv', 'K8q64LkNdK', 'Male', 'cjz86pfNtR', 'No', '2024-07-29 00:41:31', '2024-07-29 00:41:31'),
(42, 81, 'xdllhltJG8', '2024-07-17', 'ZkqKaqo5Cg', 'mkapgCCi4e', 'IjPJZARgIN', 'Male', 'LfZWgZCTXk', 'No', '2024-07-29 00:41:31', '2024-07-29 00:41:31'),
(43, 81, 'qqLxPq4qqR', '2024-07-17', 'buKNB0HY3n', 'QExlHOAFHT', 'X35V5a4dkd', 'Male', 'm2CAMhD2si', 'No', '2024-07-29 00:41:31', '2024-07-29 00:41:31'),
(44, 82, '7-29 Testing Child\'s Name', '1999-12-18', '7-29 Testing foreign birthplace', 'Dilia Maiden Name', '7-29 Testing Father\'s name of foreign born child', 'Male', '7-29 Testing school attendance', 'Yes', '2024-07-29 14:31:05', '2024-07-29 14:31:05'),
(45, 83, 'x7tX4sQa1d', '2024-07-17', 'JohmyZByCa', 'wc7ImDoerR', 'WLtVXvI7D2', 'Male', 'pJljHxSo48', 'No', '2024-07-29 15:36:56', '2024-07-29 15:36:56'),
(46, 83, 'tDYEHNhBuj', '2024-07-17', 'W0gUHDwYcf', 'nMlNkPQiEK', 'HphRWnNT8a', 'Male', 'Ni9nMoJiPw', 'No', '2024-07-29 15:36:56', '2024-07-29 15:36:56'),
(47, 83, 'sOWFY6TAia', '2024-07-17', '2dkSLf7aje', 'L8lMN13RtZ', 'VD8H5sebB7', 'Male', 'Gd5YkvMN1U', 'No', '2024-07-29 15:36:56', '2024-07-29 15:36:56'),
(48, 84, '142xhVxJVs', '2024-07-17', 'ZaWH7ZoZG2', 'VCunbUh8Wb', 'mu9D4C7QUm', 'Male', 'OPtTz6ywrF', 'Yes', '2024-07-29 15:40:50', '2024-07-29 15:40:50'),
(49, 84, 'gmBpQTL1kd', '2024-07-17', 'HssZTM6Bg4', 'xhyiZSp3v5', 'WQNBa6f3ao', 'Male', '1LVuqQnYVZ', 'No', '2024-07-29 15:40:50', '2024-07-29 15:40:50'),
(50, 84, 'rALFnVfA64', '2024-07-17', 'fLnMQvPvNE', 'Y8CcgVL2En', 'LszyMNiqny', 'Male', 'Hr7AhKmZBq', 'No', '2024-07-29 15:40:50', '2024-07-29 15:40:50'),
(51, 85, 'If0bwkXGV3', '2024-07-17', 'wy7cwnvCeK', 'zMIzkS4vb1', 'Fw1MKrduVE', 'Male', 'o5H2GHvvKA', 'No', '2024-07-29 15:41:43', '2024-07-29 15:41:43'),
(52, 85, 'TWaHf8Qqtc', '2024-07-17', 'KlFouYUSB7', '41E3qI99Vo', 'OdvGXQwIht', 'Male', 'bjzwdiCEeQ', 'No', '2024-07-29 15:41:43', '2024-07-29 15:41:43'),
(53, 85, 'GEwvBvh3rL', '2024-07-17', 'uhrpVAFHfe', '1OXwAQecgp', 'WdQRl7NhA9', 'Male', 'tiz5m6jROT', 'No', '2024-07-29 15:41:43', '2024-07-29 15:41:43'),
(54, 86, 'wqg8SCGOcl', '2024-07-17', 'fRcwJdoggC', '1my40i0YHs', '9Ne0dk035h', 'Male', 'p6tcwdswBX', 'No', '2024-07-29 15:43:27', '2024-07-29 15:43:27'),
(55, 86, 'rbOnI3qYYJ', '2024-07-17', 'QJEvLOJN9i', 'cI5fihgTpF', '1PJYbph0B7', 'Male', 'lQeCYGt2BI', 'No', '2024-07-29 15:43:27', '2024-07-29 15:43:27'),
(56, 86, 'laFnjSslvd', '2024-07-17', 'AUpIdTREz4', '3LEfsNX10V', '3Of3ndQ9qT', 'Male', '6k0jrqh5mU', 'No', '2024-07-29 15:43:27', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `TrxDate` date NOT NULL,
  `PaymentGateway` varchar(50) NOT NULL COMMENT 'Stripe, Zelle, Bank Transfer, Check, InPerson',
  `PaymentCleared` tinyint(1) NOT NULL DEFAULT 0,
  `TrxID` varchar(50) NOT NULL COMMENT 'Trx from Stripe or Paypal, Zelle''s confirmation number, check routing and number, Cash to whom.',
  `TrxStatus` varchar(50) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Currency` varchar(50) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `ClientID`, `TrxDate`, `PaymentGateway`, `PaymentCleared`, `TrxID`, `TrxStatus`, `Amount`, `Currency`, `Updated`) VALUES
(1, 10, '2024-07-11', 'credit-card', 1, '21313213', '0', 75, 'USD', '2024-07-27 05:09:29'),
(2, 11, '2024-07-12', 'paypal', 1, '213123213', '0', 75, 'USD', '2024-07-27 05:37:43'),
(3, 12, '2024-07-27', 'credit-card', 1, 'TestingTesting', '0', 75, 'USD', '2024-07-27 12:47:49'),
(4, 13, '2024-07-27', 'credit-card', 0, 'TestingId', '0', 50, 'USD', '2024-07-27 18:06:03'),
(5, 11, '2022-04-03', 'credit-card', 0, '21313213', '0', 50, 'USD', '2024-07-28 02:07:32'),
(6, 12, '2024-07-27', 'credit-card', 1, 'TestingID', '0', 75, 'USD', '2024-07-27 21:33:58'),
(7, 12, '2024-07-28', 'credit-card', 1, 'Pending Transaction ID', '0', 75, 'USD', '2024-07-28 09:17:11'),
(8, 22, '0000-00-00', 'check-via-mail', 1, '', '0', 50, 'USD', '2024-07-28 12:42:20'),
(9, 25, '2024-07-28', 'credit-card', 1, 'Testing Trx Payment ID', '0', 75, 'USD', '2024-07-28 13:02:59'),
(10, 20, '0000-00-00', 'check-via-mail', 1, '', '0', 100, 'USD', '2024-07-28 17:56:41'),
(11, 25, '2024-07-28', 'credit-card', 1, 'Testing Id', '0', 100, 'USD', '2024-07-28 18:52:44'),
(12, 20, '0000-00-00', 'check-via-mail', 1, '', '0', 100, 'USD', '2024-07-28 20:38:14'),
(13, 25, '2024-07-29', 'credit-card', 1, 'TrxID12365479', '0', 100, 'USD', '2024-07-29 09:38:48'),
(14, 20, '0000-00-00', 'check-via-mail', 1, '', '0', 100, 'USD', '2024-07-29 11:50:01'),
(15, 25, '2024-07-29', 'credit-card', 1, 'ajfjjdjfj', '0', 100, 'USD', '2024-07-29 16:26:46'),
(16, 12, '0000-00-00', 'credit-card', 1, '', '0', 75, 'USD', '2024-07-29 16:27:02'),
(17, 26, '2024-07-26', 'credit-card', 1, '123456789', '0', 75, 'USD', '2024-07-30 15:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `sequence` tinyint(4) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `descriptionSpanish` varchar(500) DEFAULT NULL,
  `EnglishHelp` varchar(1000) NOT NULL,
  `SpanishHelp` varchar(1000) NOT NULL,
  `price` decimal(10,2) DEFAULT 100.00,
  `LinktoStripe` varchar(300) NOT NULL,
  `LinktoStripeSpanish` varchar(300) NOT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `Updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `sequence`, `description`, `descriptionSpanish`, `EnglishHelp`, `SpanishHelp`, `price`, `LinktoStripe`, `LinktoStripeSpanish`, `status`, `Updated`) VALUES
(3, 1, 'You can complete our PIPE Qualification online form and within 36 hours we will let you know what additional documentation we will need to qualify you for the PIPE program. ', 'Puede completar nuestro formulario de Calificación PIPE en línea y dentro de 36 horas le informaremos el documento adicional que necesitaremos para calificarlo para el programa PIPE.', 'Within 36 hours we can inform you of what specific documents will be required to qualify you for the PIPE immigration program. ', 'Nuestra Calificación PIPE en línea pasa en menos de 36 horas. Y despues le informaremos qué documentación adicional necesitaremos para calificarlo para el programa PIPE.', 50.00, 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os', 'Active', '2024-08-02 16:34:12'),
(4, 2, 'Do you need help completing the PIPE Qualification form?', '¿Necesita ayuda para completar el formulario de Calificación PIPE?', 'If you\'re not comfortable filling computer forms, you can schedule help with one of our assistants for an additional fee of $25 USD.', 'Si no se siente cómodo completando formularios por computadora, puede programar ayuda con uno de nuestros asistentes por una tarifa adicional de $25 USD.', 75.00, 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os', 'Active', '2024-08-02 16:34:12'),
(2, 3, 'If I qualify for PIPE, file the minimally required PIPE forms directly to USCIS without legal representation.  IMPORTANT!! Beyond the necessary USCIS filing, complex cases will require intricate documentation and that’s the critical value of a competent immigration attorney. ', 'Si califico para PIPE, presento los formularios PIPE mínimos requeridos directamente ante USCIS sin representación legal.  ¡¡IMPORTANTE!! Más allá de la necesaria presentación ante USCIS, los casos complejos requerirán documentación compleja y ese es el valor fundamental de un abogado de inmigración competente.', 'IMPORTANT!! Beyond the necessary USCIS filing, complex cases will require intricate documentation and that’s the critical value of a competent immigration attorney. ', '¡¡IMPORTANTE!! Más allá de la necesaria presentación ante USCIS, los casos complejos requerirán documentación compleja y ese es el valor fundamental de un abogado de inmigración competente.', 150.00, '', '', 'Active', '2024-08-02 16:29:53'),
(5, 4, 'You can schedule up an online video conference with one of our staff members', 'Puede programar una videoconferencia en línea con un miembro de nuestro personal.', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', 150.00, '', '', 'Active', '2024-08-02 16:34:12'),
(6, 5, 'You can book a legal consultation with one of our lawyers at “The Law Office of Nic Suriel” in Phoenix, AZ', 'Si desea reservar una consulta legal en “La Oficina de Nic Suriel\" en Phoenix, AZ', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', 350.00, '', '', 'Active', '2024-08-02 16:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `proofofresidency`
--

CREATE TABLE `proofofresidency` (
  `UserID` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL COMMENT 'Tax Return, W2, BirthCertificate of US born child, Rental Contract, Cellphone, HousePhone, Electric, Water, Gas, Sewer, etc.',
  `URLofCopy` varchar(300) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `AccountID` varchar(50) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `AddresssID` int(11) NOT NULL,
  `ContactData` varchar(1000) NOT NULL,
  `Notes` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residency_documents`
--

CREATE TABLE `residency_documents` (
  `DocumentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DocumentType` varchar(255) NOT NULL COMMENT 'Tax Return, W2, BirthCertificate of US born child, Rental Contract, Cellphone, HousePhone, Electric, Water, Gas, Sewer, etc.',
  `DocumentDescription` text DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residency_documents`
--

INSERT INTO `residency_documents` (`DocumentID`, `UserID`, `DocumentType`, `DocumentDescription`, `updatedAt`) VALUES
(86, 66, 'Tax Return', '2010-2023', '2024-07-27 01:39:37'),
(87, 66, 'Childern Birth Certificate', 'Adam, Colorado, 2/9/1989', '2024-07-27 01:39:37'),
(88, 66, 'W-2', 'Name of employer', '2024-07-27 01:39:37'),
(89, 66, 'Driving License', 'New Jersey, Arizona, Colorado, ', '2024-07-27 01:39:37'),
(90, 66, 'State ID', 'Library card', '2024-07-27 01:39:37'),
(91, 66, 'Other Documents', 'Money transfers from the US to Mexico, Cell phone bill, hospital visits, doctor\'s visit.', '2024-07-27 01:39:37'),
(92, 67, 'Tax Return', 'Tax return 2023', '2024-07-29 00:24:23'),
(93, 67, 'W-2', '2019', '2024-07-29 00:24:23'),
(94, 68, 'Tax Return', 'Tax return 2023', '2024-07-29 00:25:01'),
(95, 68, 'W-2', '2019', '2024-07-29 00:25:01'),
(96, 71, 'Tax Return', '2022', '2024-07-29 00:32:48'),
(97, 71, 'Childern Birth Certificate', 'ABCD 2000', '2024-07-29 00:32:48'),
(98, 71, 'Other Documents', 'Nooo', '2024-07-29 00:32:48'),
(99, 72, 'Tax Return', '2022', '2024-07-29 00:33:04'),
(100, 72, 'Childern Birth Certificate', 'ABCD 2000', '2024-07-29 00:33:04'),
(101, 72, 'Other Documents', 'Nooo', '2024-07-29 00:33:04'),
(102, 73, 'Tax Return', '2022', '2024-07-29 00:33:23'),
(103, 73, 'Childern Birth Certificate', 'ABCD 2000', '2024-07-29 00:33:23'),
(104, 73, 'Other Documents', 'Nooo', '2024-07-29 00:33:23'),
(105, 76, 'Tax Return', '201222', '2024-07-29 00:34:44'),
(106, 77, 'Tax Return', '201222', '2024-07-29 00:34:50'),
(107, 78, 'Tax Return', '201222', '2024-07-29 00:34:56'),
(108, 79, 'Tax Return', '201222', '2024-07-29 00:35:33'),
(109, 82, 'Tax Return', '7-29 Testing  IRS 1040', '2024-07-29 14:31:05'),
(110, 82, 'Childern Birth Certificate', '7-29 Testing US born children ', '2024-07-29 14:31:05'),
(111, 82, 'W-2', '7-29 Testing W-2', '2024-07-29 14:31:05'),
(112, 82, 'Driving License', '7-29 Testing State Licenses', '2024-07-29 14:31:05'),
(113, 82, 'State ID', '7-29 Testing other state IDs', '2024-07-29 14:31:05'),
(114, 82, 'Other Documents', '7-29 Testing other docs to validate 10 years in the US', '2024-07-29 14:31:05'),
(115, 84, 'Tax Return', '2023 ad', '2024-07-29 15:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `screen_id` int(11) NOT NULL,
  `ScreenName` varchar(14) DEFAULT NULL,
  `Sequence` varchar(2) DEFAULT NULL,
  `FieldName` varchar(49) DEFAULT NULL,
  `EnglishLabel` varchar(500) DEFAULT NULL,
  `EnglishHelp` varchar(1000) DEFAULT NULL,
  `SpanishLabel` varchar(500) DEFAULT NULL,
  `SpanishHelp` varchar(1000) DEFAULT NULL,
  `Updated` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`screen_id`, `ScreenName`, `Sequence`, `FieldName`, `EnglishLabel`, `EnglishHelp`, `SpanishLabel`, `SpanishHelp`, `Updated`) VALUES
(1, 'Create Account', '0', 'Title', 'Create Account', '', 'Crear Una Cuenta', '', '2024-07-15 11:07:52'),
(2, 'Create Account', '2', 'Your ID', 'Use your email or cell phone number #:', 'Use your email address or your cell phone number where we can send you answers to your questions or updates about the status of your case.', 'Utilice su correo electrónico o número de teléfono celular:', 'Utilice su dirección de correo electrónico o su número de teléfono celular donde podemos enviarle respuestas a sus preguntas o actualizaciones sobre el estado de su caso.', '2024-07-15 11:07:52'),
(3, 'Create Account', '3', 'Password', 'Password:', 'Must be at least 6 characters', 'Contraseña:', 'Debe tener como mínimo 6 caracteres', '2024-07-15 11:07:52'),
(4, 'Log In', '0', 'Title', 'Log In', '', 'Entrar a Tu Cuenta', '', '2024-07-15 11:07:52'),
(5, 'Log In', '1', 'Your ID', 'Email or Cell Phone #:', 'Use the email address or the cell phone number that you used when you created your account.', 'Correo electrónico o número de teléfono celular:', 'Utilice la dirección de correo electrónico o el número de teléfono celular que utilizó cuando creó su cuenta.', '2024-07-15 11:07:52'),
(6, 'Log In', '2', 'Password', 'Password:', 'Enter the password you used when you created your account.  If you\'ve forgotten your password, use forgot password below.', 'Contraseña:', 'Ingrese la contraseña que dio cuando creo su cuenta. Si olvidó su contraseña, haga clic en \"Olvidé mi contraseña\".', '2024-07-15 11:07:52'),
(7, 'Log In', '3', 'Forgot Password', 'Forgot Password', 'We\'ll send you a 6 digit code to the email or cell phone number you gave us when you created your account.', 'Olvidé mi contraseña', 'Le enviaremos un código de 6 dígitos al correo electrónico o al número de teléfono celular que nos proporcionó cuando creó su cuenta.', '2024-07-15 11:07:52'),
(8, 'Inquiry Form', '0', 'Title', 'Inquiry/Qualification Payment', 'Provide us your name, ', 'Preguntas/Pago Para Cualificarlo', '', '2024-07-15 11:07:52'),
(9, 'Inquiry Form', '1', 'FirstName', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(10, 'Inquiry Form', '2', 'LastName', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
(11, 'Inquiry Form', '3', 'Current State, Country of Residence', 'Enter your zip code', 'Enter the US State of your primary residence. If you\'re not currently residing in the US, enter the state and country were you\'re currently residing.', 'Ingrese su codigo postal', 'Ingrese el estado estadounidense de su residencia principal. Si actualmente no reside en los EE. UU., ingrese el estado y el país donde reside actualmente.', '2024-07-15 11:07:52'),
(12, 'Inquiry Form', '4', 'PhoneNumber', 'Cell Phone Number', 'Enter your US cell phone number. If your cell phone is not American, select the code for that country first.', 'Número Celular', 'Ingrese su número de teléfono celular de EE. UU. Si tu celular no es americano, selecciona primero el código de ese país.', '2024-07-15 11:07:52'),
(13, 'Inquiry Form', '5', 'email', 'Your email address', 'Enter your primary email address, if you don\'t have an email address, leave it blank.', 'Su dirección de correo electrónico', 'Ingrese su dirección de correo electrónico principal; si no tiene una dirección de correo electrónico, déjela en blanco.', '2024-07-15 11:07:52'),
(14, 'Inquiry Form', '13', 'HelpwithQualifyingForm', 'Do you need help completing the PIPE Qualification form?', 'If you\'re not comfortable filling computer forms, you can schedule help with one of our assistants for an additional fee of $25 USD.', '¿Necesita ayuda para completar el formulario de Calificación PIPE?', 'Si no se siente cómodo completando formularios por computadora, puede programar ayuda con uno de nuestros asistentes por una tarifa adicional de $25 USD.', '2024-07-15 11:07:52'),
(15, 'Inquiry Form', '16', 'PIPEQualifyingFee', 'Payment options', 'Select one of the 4 payment options that\'s most convenient for you. You\'ll be able to fill in your Qualification data as soon as the payment has cleared. ', 'Opciones de Pago', 'Selecione una de las r forma de pago que más le convenga. Podremos completar sus datos de calificación tan pronto como se haya liquidado el pago. ', '2024-07-15 11:07:52'),
(16, 'Inquiry Form', '17', 'Questions', 'Do do have any questions before we can qualify you?', '', '¿Tiene alguna pregunta antes de que podamos calificarlo?', '', '2024-07-15 11:07:52'),
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
(46, 'Qualification', '28', 'BirthCertificateofUSBornChildren?', 'Names, birthday and US states of where your US-born children.', 'Tell us the names and birthday of your US born children.', 'Nombre, fecha de nacimiento y estados de EE. UU. donde nacieron sus hijos.', 'Díganos los nombres y la fecha de nacimiento de sus hijos nacidos en Estados Unidos.', '2024-07-15 11:07:52'),
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
(70, 'Qualification', '52', 'MentalDisorder', 'Mental health challenges ', 'Are you currently being treated for any mental health challenges, e.g., the one listed below?', 'Enfermedades mentales', 'Si posee alguna discapacidad mental, seleccione de la siguiente lista', '2024-07-15 11:07:52'),
(71, 'Qualification', '53', 'AccusedofChildAbduction', 'Accused of Child Abduction', 'Have you ever been formally charged by the police of child abduction?', 'Acusado de sustracción de menores', '¿Alguna vez la policía le ha acusado formalmente de sustracción de menores?', '2024-07-15 11:07:52'),
(72, 'Qualification', '54', 'ClaimedUSCitizenshipAfterSept1996', 'Last Date Claimed to be a US Citizen', 'What was the last date that you claimed to be a US Citizen? Describe in the field below what were the circumstances?', 'Última fecha en la que afirmó ser ciudadano estadounidense', '¿Cuál fue la última fecha en la que afirmó ser ciudadano estadounidense? Describe en el campo a continuación ¿cuáles fueron las circunstancias?', '2024-07-15 11:07:52'),
(73, 'Qualification', '55', 'MissingAnyUSRequiredVaccines', 'Are You Missing An US Required Vaccines', 'Are you missing any of the vaccines listed below?', '¿Le faltan las vacunas requeridas en EE. UU.?', '¿Le falta alguna de las vacunas que se enumeran a continuación?', '2024-07-15 11:07:52'),
(74, 'Qualification', '56', 'AccusedofDrugAddictionTraffickingProstitutionVice', 'Accused of Drug Addiction Trafficking Prostitution Vice', 'Have you ever been formally charged by the police in your country or in the US of drug addiction, drug trafficking, prostitution, vice, or abduction of another person?', 'Acusado de drogadicción, tráfico, prostitución y vicio', '¿Alguna vez ha sido acusado formalmente por la policía de su país o de Estados Unidos de drogadicción, tráfico de drogas, prostitución, vicio o secuestro de otra persona?', '2024-07-15 11:07:52'),
(75, 'Qualification', '57', 'Deported from the US', 'Deported from the US', 'Have you ever been deported from the US?', 'Deportado de EE.UU.', '¿Alguna vez ha sido deportado de los EE. UU.?', '2024-07-15 11:07:52'),
(76, 'Qualification', '58', 'USElectionVotedIn', 'Last US Election You Voted In', 'Enter the date of the last US election that you voted in.', 'Última elección estadounidense en la que usted votó', 'Ingrese la fecha de la última elección estadounidense en la que votó.', '2024-07-15 11:07:52'),
(94, 'Qualification', '66', 'Foreign Born Children Seeking PIPE Benefits', 'Foreign Born Children Seeking PIPE Benefits', NULL, 'Niños Nacidos en el Extranjero que Buscan Beneficios PIPE', NULL, '2024-07-23 04:00:46'),
(93, 'Qualification', '65', 'Encounters with Law Enforcement Agencies', 'Encounters with Law Enforcement Agencies', NULL, 'Encuentros con Agencias de Aplicación de la Ley', NULL, '2024-07-23 04:00:46'),
(92, 'Qualification', '64', 'Residency Documents', 'Proof of 10 years of Continuous Physical Presence in the US', NULL, 'Prueba de 10 años de Presencia en los EE.UU.', NULL, '2024-07-23 04:00:46'),
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
(105, 'Qualification', '77', 'decreeOfDivorce', 'Can you obtain this decree of divorce?', 'Indicate whether you can obtain the decree of divorce', '¿Puede obtener este decreto de divorcio?', 'Indique si puede obtener el decreto de divorcio', '2024-07-23 19:45:38'),
(106, 'Qualification', '78', 'dateOfEncounter', 'Date of Encounter', 'The date when the legal encounter occurred.', 'Fecha del Encuentro', 'La fecha en la que ocurrió el encuentro legal.', '2024-07-24 16:42:23'),
(107, 'Qualification', '79', 'stateCountryOfLegalEncounter', 'State and Country of Legal Encounter', 'The state and country where the legal encounter took place.', 'Estado y País del Encuentro Legal', 'El estado y el país donde tuvo lugar el encuentro legal.', '2024-07-24 16:42:23'),
(108, 'Qualification', '80', 'natureOfLegalIssue', 'Nature of Legal Issue', 'A brief description of the nature of the legal issue.', 'Naturaleza del Problema Legal', 'Una breve descripción de la naturaleza del problema legal.', '2024-07-24 16:42:23'),
(109, 'Qualification', '81', 'description', 'Description', 'A more detailed description of the legal issue.', 'Descripción', 'Una descripción más detallada del problema legal.', '2024-07-24 16:42:23'),
(110, 'Qualification', '82', 'capacityToSupport', 'Describe your capacity to support yourself?', 'Provide a detailed explanation of your financial stability and ability to support yourself.', 'Describa su capacidad para mantenerse a sí mismo?', 'Proporcione una explicación detallada de su estabilidad financiera y capacidad para mantenerse a sí mismo.', '2024-07-24 18:47:40'),
(111, 'Log In', '4', 'login', 'Login', 'Enter your login credentials', 'Iniciar sesión', 'Ingrese sus credenciales de inicio de sesión', '2024-07-25 23:21:07'),
(112, 'Log In', '5', 'signUp', 'Sign Up', 'Create a new account', 'Registrarse', 'Crear una nueva cuenta', '2024-07-25 23:21:07'),
(113, 'Log In', '6', 'fullName', 'Full Name', 'Enter your full name', 'Nombre completo', 'Ingrese su nombre completo', '2024-07-25 23:21:07'),
(114, 'Log In', '7', 'confirmPassword', 'Confirm Password', 'Re-enter your password', 'Confirmar contraseña', 'Reingrese su contraseña', '2024-07-25 23:21:07'),
(115, 'Inquiry Form', '7', 'Presence07172024', 'Were you present in the USA on June 17, 2024?', 'Were you physically present in the US on July 17th, 2024?', '¿Estuvo presente en EE. UU. el 17 de junio de 2024?', '¿Estuvo físicamente presente en los EE. UU. el 17 de julio de 2024?', '2024-07-27 15:01:43'),
(116, 'Inquiry Form', '8', 'MarriedtoUSCitizen', 'Are you lawfully married to a United States citizen and did that marriage oc', 'Do you have a certificate of your marriage?', '¿Está usted casado legalmente con un ciudadano estadounidense y ese matrimonio se produjo', '¿Tiene su certificado de su matrimonio?', '2024-07-27 15:13:19'),
(118, 'Inquiry Form', '9', 'USCPP10years', 'Do you have documentation that demonstrates your continuous physical presence in the US for the last 10 years? E.g., IRS 1040, birth certificate of US born children, W-2, driver_s license, etc.', 'Can you demonstrate with documentation that you_ve been in the US for the past 10 years?', '¿Tiene documentación que demuestre su presencia física continua en los EE. UU. durante los últimos 10 años? Por ejemplo, IRS 1040, certificado de nacimiento de niños nacidos en los EE. UU., W-2, licencia de conducir, etc. ', '¿Puede demostrar con documentación que ha estado en los EE. UU. durante los últimos 10 años?', '2024-07-27 15:18:36'),
(119, 'Inquiry Form', '10', 'NoMajorIssues', 'Can you confirm that you don’t have any convictions, or been arrested for any crime?\r\n', 'Unless your case can be mitigated with the right documentation, if you have any convictions, or been arrested for any crime, it\'s likely that the US immigration will deny you PIPE case.', '¿Puede confirmar que no tiene ninguna condena ni ha sido arrestado por ningún delito?', 'A menos que su caso se pueda mitigarse con la documentación correcta, si tiene alguna condena o ha sido arrestado por algún delito, es probable que la inmigración de EE. UU. te niegue tu caso PIPE.', '2024-07-27 15:22:56'),
(120, 'Inquiry Form', '11', 'OptionstoQualify', 'The next step is to get you qualified for the PIPE program. Please select the one most suitable option from the 4 choices below:', 'We need to understand what data we need to submit to US immigration to qualify you for the PIPE program, for that we need to understand the data that you have available.', 'El siguiente paso es qualificar para el programa PIPE. Seleccione la opción más adecuada para ti de las 4 opciones a continuación', 'Necesitamos comprender qué datos debemos enviar a inmigración de EE. UU. para calificarlo para el programa PIPE, para eso necesitamos todos tus datos que tengas disponibles.', '2024-07-27 15:25:28'),
(121, 'Inquiry Form', '14', 'OnlineConf', 'You can schedule up an online video conference with one of our staff members', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Puede programar una videoconferencia en línea con un miembro de nuestro personal.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', '2024-07-27 15:59:16'),
(122, 'Inquiry Form', '15', 'ConsultwithLawyer', 'You can book a legal consultation with one of our lawyers at “The Law Office of Nic Suriel” in Phoenix, AZ', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Si desea reservar una consulta legal en “La Oficina de Nic Suriel\" en Phoenix, AZ', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', '2024-07-27 16:05:35'),
(123, 'Inquiry Form', '12', 'Online', 'You can complete our PIPE Qualification online form and within 36 hours we will let you know what additional documentation we will need to qualify you for the PIPE program. ', 'Within 36 hours we can inform you of what specific documents will be required to qualify you for the PIPE immigration program. ', 'Puede completar nuestro formulario de Calificación PIPE en línea y dentro de 36 horas le informaremos el documento adicional que necesitaremos para calificarlo para el programa PIPE.', 'Nuestra Calificación PIPE en línea pasa en menos de 36 horas. Y despues le informaremos qué documentación adicional necesitaremos para calificarlo para el programa PIPE.', '2024-07-27 16:14:18'),
(124, 'Inquiry Form', '18', 'inquiry_form', 'If you need any help to fill out our PIPE Qualification online form, we can book one of our staff members to help you.', 'If you need any help to fill out our PIPE Qualification online form, we can book one of our staff members to help you.', 'Si necesita ayuda para completar nuestro formulario de calificación PIPE en línea, podemos reservar a uno de nuestros miembros del personal para ayudarle.', 'Si necesita ayuda para completar nuestro formulario de calificación PIPE en línea, podemos reservar a uno de nuestros miembros del personal para ayudarle.', '2024-07-28 01:21:56'),
(125, 'Inquiry Form', '19', 'terms_and_conditions', 'I accept. <span class=\"text-muted\">By checking \'Accept\', you agree that <a href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#tacModal\" class=\"text-primary\">we\'re only providing limited legal advice and to our privacy statement</a>.</span>', '', 'Acepto. <span class=\"text-muted\">Al marcar \'Aceptar\', <a href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#tacModalSpanish\" class=\"text-primary\">usted acepta que solo estamos proporcionando asesoría legal limitada y a nuestra declaración de privacidad</a>.</span>', '', '2024-07-28 01:26:54'),
(128, 'Inquiry Form', '21', 'other_questions', '\"Need further help? Please enter your questions below\"', NULL, '\"¿Necesita más ayuda? Por favor ingrese tus preguntas abajo.\"', NULL, '2024-07-28 18:41:25'),
(129, 'Create Account', '1', 'WelcomeMsg', 'Find out from a competent, seasoned US lawyer, if you qualify for this new immigration program.', 'Esquire Nicomedes E. Suriel has been exclusively practicing immigration law for the past 30 years. He has voted one of 25 best immigration lawyers! He is reputable and honest.', 'Infórmese con un abogado estadounidense experto y capaz, si usted califica para este nuevo programa de inmigración', 'Lic. Nicomedes E. Suriel ha practicado exclusivamente leyes inmigración a los EE.UU. los últimos 30 años. ¡Se votado como uno de los 25 mejores abogados de inmigración! Es respetable y honesto.', '2024-07-30 17:10:41'),
(126, 'Inquiry Form', '20', 'payment_method_information', 'We can determine if you qualify for the new PIPE program for a fee of <span class=\"fee fw-bold\"></span> USD. Please select your payment method below.', '', 'Podemos determinar si califica para el nuevo programa PIPE por una tarifa de <span id=\"fee\" class=\"fw-bold\"></span> USD. Por favor, seleccione su método de pago a continuación.', '', '2024-07-28 01:34:34'),
(127, 'Inquiry Form', '6', 'WhatsApp', 'Do you have WhatsApp installed in this cell?', 'It\'s easier for us to text you via WhatsApp.', '¿Tienes WhatsApp instalado en este celular?', 'Es más fácil para nosotros enviarte mensajes de texto desde México vía WhatsApp.', '2024-07-15 11:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `screencontent`
--

CREATE TABLE `screencontent` (
  `ScreenName` varchar(50) NOT NULL,
  `Sequence` smallint(6) NOT NULL,
  `FieldName` varchar(50) NOT NULL,
  `EnglishLabel` varchar(100) NOT NULL,
  `EnglishHelp` varchar(3000) NOT NULL,
  `SpanishLabel` varchar(100) NOT NULL,
  `SpanishHelp` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemdynamicdata`
--

CREATE TABLE `systemdynamicdata` (
  `ID` int(11) NOT NULL,
  `KeyName` varchar(255) NOT NULL,
  `Value` text NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(32, 'AttorneyNameofLawFirm', 'The Law Offices of Nicomedes E. Suriel, LLC', '2024-07-30 16:17:37', '2024-07-30 16:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `urlofdocumentation`
--

CREATE TABLE `urlofdocumentation` (
  `UserID` int(11) NOT NULL,
  `DocURL` varchar(300) NOT NULL,
  `DocType` varchar(100) NOT NULL COMMENT 'MarriageCertificate, BirthCertificate, Passport, Employment, UtilityBill, RentalAgreement, etc.',
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `USCISdocs`
--

CREATE TABLE `USCISdocs` (
  `docID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `docname` varchar(200) DEFAULT NULL,
  `LinktoUSCISdoc` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birthPlace` varchar(255) NOT NULL,
  `citizenshipCountry` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `ClientID`, `firstName`, `middleName`, `lastName`, `birthday`, `birthPlace`, `citizenshipCountry`, `gender`, `createdAt`, `updatedAt`) VALUES
(63, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-07-04', 'Pakistan', 'Pakistan', 'male', '2024-07-25 01:02:42', '2024-07-25 01:02:42'),
(64, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-07-04', 'Pakistan', 'Pakistan', 'male', '2024-07-25 01:03:17', '2024-07-25 01:03:17'),
(65, 3, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-07-24', 'Pakistan', 'Pakistan', 'male', '2024-07-25 01:03:53', '2024-07-25 01:03:53'),
(66, NULL, 'Maria', 'Hernanda', 'Gonzales', '1965-12-18', 'Oaxaca, Mexico', 'Mexico', 'female', '2024-07-27 01:39:37', '2024-07-27 01:39:37'),
(67, NULL, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-07-10', 'Pakistan', 'Pakistan', 'male', '2024-07-29 00:24:23', '2024-07-29 00:24:23'),
(68, NULL, 'Syed', 'Muhammad Anas', 'Bukhari', '2024-07-10', 'Pakistan', 'Pakistan', 'male', '2024-07-29 00:25:01', '2024-07-29 00:25:01'),
(69, NULL, 'ykCyZhummp', '8h9DCpwnFk', 'TspkKAMlkR', '2024-07-10', 'Pd06EIuuQi', '9KDerZGRHX', 'male', '2024-07-29 00:29:27', '2024-07-29 00:29:27'),
(70, NULL, 'Syed Muhammad Anas', 'Vin', 'Bukhari', '2024-07-08', 'Pakistan', 'Pakistan', 'male', '2024-07-29 00:31:24', '2024-07-29 00:31:24'),
(71, NULL, 'fOVUuYPr8N', 'vGFO0xRNcJ', 'RUgmLoFtIL', '2024-07-01', '2b03iFHw7v', 'bb3YwLEcBj', 'male', '2024-07-29 00:32:48', '2024-07-29 00:32:48'),
(72, NULL, 'fOVUuYPr8N', 'vGFO0xRNcJ', 'RUgmLoFtIL', '2024-07-01', '2b03iFHw7v', 'bb3YwLEcBj', 'male', '2024-07-29 00:33:04', '2024-07-29 00:33:04'),
(73, NULL, 'fOVUuYPr8N', 'vGFO0xRNcJ', 'RUgmLoFtIL', '2024-07-01', '2b03iFHw7v', 'bb3YwLEcBj', 'male', '2024-07-29 00:33:23', '2024-07-29 00:33:23'),
(74, NULL, 'Kg8Pv1SUmv', 'Y5TleiV7dD', 'oSSNSWjC41', '2024-07-01', 'ffnRjQfbCa', 'bavENiLLJf', 'male', '2024-07-29 00:34:00', '2024-07-29 00:34:00'),
(75, NULL, 'Kg8Pv1SUmv', 'Y5TleiV7dD', 'oSSNSWjC41', '2024-07-01', 'ffnRjQfbCa', 'bavENiLLJf', 'male', '2024-07-29 00:34:01', '2024-07-29 00:34:01'),
(76, NULL, 'hgas34WFVN', 'kzte4NjzPa', 'wm8YfXx73k', '2024-07-01', 'N9fKEaXc5n', '8EFr9JVZBQ', 'male', '2024-07-29 00:34:44', '2024-07-29 00:34:44'),
(77, NULL, 'hgas34WFVN', 'kzte4NjzPa', 'wm8YfXx73k', '2024-07-01', 'N9fKEaXc5n', '8EFr9JVZBQ', 'male', '2024-07-29 00:34:50', '2024-07-29 00:34:50'),
(78, NULL, 'hgas34WFVN', 'kzte4NjzPa', 'wm8YfXx73k', '2024-07-01', 'N9fKEaXc5n', '8EFr9JVZBQ', 'male', '2024-07-29 00:34:56', '2024-07-29 00:34:56'),
(79, NULL, 'hgas34WFVN', 'kzte4NjzPa', 'wm8YfXx73k', '2024-07-01', 'N9fKEaXc5n', '8EFr9JVZBQ', 'male', '2024-07-29 00:35:33', '2024-07-29 00:35:33'),
(80, NULL, 'm53kLjaC9R', 'SWvKzf3nIt', 'UzMfk4cmLc', '2024-07-01', 'a9TnEAqYyh', 'LXEzvHI4il', 'male', '2024-07-29 00:41:01', '2024-07-29 00:41:01'),
(81, NULL, 'm53kLjaC9R', 'SWvKzf3nIt', 'UzMfk4cmLc', '2024-07-01', 'a9TnEAqYyh', 'LXEzvHI4il', 'male', '2024-07-29 00:41:31', '2024-07-29 00:41:31'),
(82, NULL, 'Dilia', 'Hernanda', 'Suriel', '1965-12-18', 'SD, DR', 'DR', 'female', '2024-07-29 14:31:05', '2024-07-29 14:31:05'),
(83, NULL, 'TYYu4Cgsqx', 'h3qzjlxVKC', 'TNamzQ6TlI', '2024-07-01', 'B4JKOsFnv5', 'TRR5Ar2Sg5', 'male', '2024-07-29 15:36:56', '2024-07-29 15:36:56'),
(84, NULL, 'mwC2wBpPgp', 'p77jrKsIL4', 'xUNNK2oqrU', '2024-07-01', 'gi53wJmLuj', 'mQRIPAAoAT', 'male', '2024-07-29 15:40:50', '2024-07-29 15:40:50'),
(85, NULL, 'zxYH0G66lD', 'rClnkwuCBT', '97cwY4fNQC', '2024-07-01', 'ZIYa5ZsA8f', 'lhrsFvGJkb', 'male', '2024-07-29 15:41:43', '2024-07-29 15:41:43'),
(86, NULL, 'fFn2IurHd3', 'LauangEk8L', '48Dv8uyRSJ', '2024-07-01', '1JigZv0HSZ', 'Hn7LEjCkwG', 'male', '2024-07-29 15:43:27', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `userrelation`
--

CREATE TABLE `userrelation` (
  `UserID` int(11) NOT NULL,
  `RelationID` int(11) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `us_entry`
--

CREATE TABLE `us_entry` (
  `UserID` int(11) NOT NULL,
  `dateOfEntry` date NOT NULL,
  `stateOfEntry` varchar(255) NOT NULL,
  `methodOfEntry` varchar(255) NOT NULL,
  `anyIllegalDocumentOnEntry` text NOT NULL,
  `detainedByUSPatrol` text NOT NULL,
  `updatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `us_entry`
--

INSERT INTO `us_entry` (`UserID`, `dateOfEntry`, `stateOfEntry`, `methodOfEntry`, `anyIllegalDocumentOnEntry`, `detainedByUSPatrol`, `updatedAt`) VALUES
(66, '2008-02-06', 'Arizona', 'Crossed the border by car', 'My sister\'s green card.', 'Long story about the details', '2024-07-27 01:39:37'),
(67, '2000-01-01', 'Arizona', 'qzQJUvuIer', 'sK4J2QivdT', 'j0yaV1muHb', '2024-07-29 00:24:23'),
(68, '2000-01-01', 'Arizona', 'qzQJUvuIer', 'sK4J2QivdT', 'j0yaV1muHb', '2024-07-29 00:25:01'),
(82, '1989-12-18', 'Hawaii', 'Took a boat to Hawaii, swam to shore', 'Fake driver\'s license to flight from HI to US.', '', '2024-07-29 14:31:05'),
(84, '2024-07-11', 'Alabama', 'RSEylW8qO4', 'MmQYcWbhhL', 'OkuUTIXtxY', '2024-07-29 15:40:50'),
(85, '2024-07-11', 'Alabama', 'wpUNofwm7M', 'ZxtlzzKStN', 'kbcKsn2Etp', '2024-07-29 15:41:43'),
(86, '2024-07-11', 'Alabama', 'U9vAttfGov', 'j6H4WJMJhK', 'W2NnY8Sq08', '2024-07-29 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `verification_attempts`
--

CREATE TABLE `verification_attempts` (
  `AttemptID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `is_successful` tinyint(1) NOT NULL,
  `attempt_time` timestamp NULL DEFAULT current_timestamp()
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
(30, 32, 0, '2024-08-02 02:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `CodeID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`CodeID`, `ClientID`, `verification_code`, `expires_at`, `created_at`) VALUES
(15, 11, '125767', '2024-07-26 22:32:58', '2024-07-27 00:32:58'),
(16, 12, '582581', '2024-07-27 02:45:18', '2024-07-27 01:45:18'),
(17, 13, '295257', '2024-07-27 18:58:40', '2024-07-27 17:58:40'),
(18, 14, '121806', '2024-07-27 20:11:56', '2024-07-27 19:11:56'),
(32, 16, '612543', '2024-07-28 18:10:57', '2024-07-28 13:10:57'),
(33, 17, '401440', '2024-07-28 19:32:39', '2024-07-28 14:32:39'),
(36, 20, '857394', '2024-07-28 21:33:11', '2024-07-28 16:33:11'),
(38, 22, '599459', '2024-07-28 21:41:22', '2024-07-28 16:41:22'),
(40, 23, '740365', '2024-07-28 21:47:31', '2024-07-28 16:47:31'),
(41, 24, '478325', '2024-07-28 21:48:47', '2024-07-28 16:48:47'),
(42, 25, '336383', '2024-07-28 21:51:18', '2024-07-28 16:51:18'),
(43, 26, '616929', '2024-07-29 23:41:58', '2024-07-29 18:41:58'),
(44, 27, '873978', '2024-07-29 23:51:39', '2024-07-29 18:51:39'),
(45, 28, '350278', '2024-07-30 02:05:47', '2024-07-29 21:05:47'),
(46, 29, '486086', '2024-07-30 02:19:41', '2024-07-29 21:19:41'),
(47, 30, '309786', '2024-07-30 02:26:39', '2024-07-29 21:26:39'),
(48, 31, '666300', '2024-08-02 07:20:52', '2024-08-02 02:20:52'),
(52, 32, '753713', '2024-08-02 07:31:05', '2024-08-02 02:31:05');

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
  ADD PRIMARY KEY (`payment_id`);

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
-- Indexes for table `USCISdocs`
--
ALTER TABLE `USCISdocs`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `us_entry`
--
ALTER TABLE `us_entry`
  ADD PRIMARY KEY (`UserID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `attorney`
--
ALTER TABLE `attorney`
  MODIFY `attorneyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `encounter`
--
ALTER TABLE `encounter`
  MODIFY `EncounterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `immigration_inquiry`
--
ALTER TABLE `immigration_inquiry`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `marriage`
--
ALTER TABLE `marriage`
  MODIFY `MarriageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `offspring`
--
ALTER TABLE `offspring`
  MODIFY `OffspringID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `residency_documents`
--
ALTER TABLE `residency_documents`
  MODIFY `DocumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `systemdynamicdata`
--
ALTER TABLE `systemdynamicdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `USCISdocs`
--
ALTER TABLE `USCISdocs`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `verification_attempts`
--
ALTER TABLE `verification_attempts`
  MODIFY `AttemptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `CodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  ADD CONSTRAINT `immigration_inquiry_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `verification_codes_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
