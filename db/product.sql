-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2024 at 06:31 PM
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
(2, 3, 'If I qualify for PIPE, file the minimally required PIPE forms directly to USCIS without legal representation.  IMPORTANT!! Beyond the necessary USCIS filing, complex cases will require intricate documentation and that’s the critical value of a competent immigration attorney. ', 'Si califico para PIPE, presento los formularios PIPE mínimos requeridos directamente ante USCIS sin representación legal.  ¡¡IMPORTANTE!! Más allá de la necesaria presentación ante USCIS, los casos complejos requerirán documentación compleja y ese es el valor fundamental de un abogado de inmigración competente.', 'IMPORTANT!! Beyond the necessary USCIS filing, complex cases will require intricate documentation and that’s the critical value of a competent immigration attorney. ', '¡¡IMPORTANTE!! Más allá de la necesaria presentación ante USCIS, los casos complejos requerirán documentación compleja y ese es el valor fundamental de un abogado de inmigración competente.', 150.00, 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os\r\n', 'Active', '2024-08-02 16:29:53'),
(5, 4, 'You can schedule up an online video conference with one of our staff members', 'Puede programar una videoconferencia en línea con un miembro de nuestro personal.', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', 150.00, 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os\r\n', 'Active', '2024-08-02 16:34:12'),
(6, 5, 'You can book a legal consultation with one of our lawyers at “The Law Office of Nic Suriel” in Phoenix, AZ', 'Si desea reservar una consulta legal en “La Oficina de Nic Suriel\" en Phoenix, AZ', 'Call our main office at 602-297-2005 or visit us at 7220 N 20th Street, Suite F, Phoenix, AZ 85020, Monday through Friday between 9 AM and 5 PM.', 'Llame a nuestra oficina principal al 602-297-2005 o visitanos a 7220 N 20th Street, Suite F, Phoenix, AZ 85020, lunes a viernes entre 9 AM a 5 PM.', 350.00, 'https://buy.stripe.com/fZe29D6RO3Z8bCMaEG', 'https://buy.stripe.com/7sI7tX2By0MW8qA6os\r\n', 'Active', '2024-08-02 16:34:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
