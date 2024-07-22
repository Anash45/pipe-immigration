-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2024 at 02:19 PM
-- Server version: 5.6.51
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `develope_Immigration`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `AddressID` int(11) NOT NULL,
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
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `UserID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Goal` varchar(3000) NOT NULL,
  `Notes` varchar(5000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Document`
--

CREATE TABLE `Document` (
  `userID` int(11) NOT NULL,
  `DocType` varchar(100) NOT NULL COMMENT 'Passport, birth certificate, spouse’s citizenship {US Birth Certificate, US Passport, US Naturalization Certificate}, State and Country of marriage certificate, IRS 1040, non-US children’s school records, W-2, rental agreement, utility bills, ICE issues {Detailed at the border, false paper given to ICE, deported, criminal record {Felony, drug usage, drug trafficking, crimes against minors',
  `DocDate` date NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Employer`
--

CREATE TABLE `Employer` (
  `EmployerID` int(11) NOT NULL,
  `EmployerName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Notes` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `IdentifierDocument`
--

CREATE TABLE `IdentifierDocument` (
  `UserID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL COMMENT 'Passport, BirthCertificate, etc.',
  `DateIssued` date NOT NULL,
  `IssuingLegalEntity` int(11) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Notes` int(11) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Marriage`
--

CREATE TABLE `Marriage` (
  `UserID` int(11) NOT NULL,
  `SpouseID` int(11) NOT NULL,
  `MarriageDate` int(11) NOT NULL,
  `State and Country` varchar(100) NOT NULL,
  `URLofMarriageCertificate` varchar(500) NOT NULL,
  `DivorceDate` date NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Office`
--

CREATE TABLE `Office` (
  `OfficeID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Hours` varchar(300) NOT NULL,
  `GooglePin` varchar(150) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Offspring`
--

CREATE TABLE `Offspring` (
  `UserID` int(11) NOT NULL COMMENT 'ID of the father or mother',
  `ChildID` int(11) NOT NULL,
  `Notes` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `UserID` int(11) NOT NULL,
  `TrxDateTime` datetime NOT NULL,
  `PaymentGateway` varchar(50) NOT NULL COMMENT 'Stripe, Zelle, Bank Transfer, Check, InPerson',
  `PaymentCleared` datetime NOT NULL,
  `TrxID` varchar(50) NOT NULL COMMENT 'Trx from Stripe or Paypal, Zelle''s confirmation number, check routing and number, Cash to whom.',
  `AuthCode` varchar(50) NOT NULL,
  `TrxStatus` varchar(50) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Currency` varchar(50) NOT NULL,
  `CardLastFourDigit` tinyint(4) NOT NULL,
  `CardExpiryDate` date NOT NULL,
  `Updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProofOfResidency`
--

CREATE TABLE `ProofOfResidency` (
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
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Screen`
--

CREATE TABLE `Screen` (
  `SreenName` varchar(14) DEFAULT NULL,
  `Sequence` varchar(2) DEFAULT NULL,
  `FieldName` varchar(49) DEFAULT NULL,
  `EnglishLabel` varchar(76) DEFAULT NULL,
  `EnglishHelp` varchar(241) DEFAULT NULL,
  `SpanishLabel` varchar(89) DEFAULT NULL,
  `SpanishHelp` varchar(304) DEFAULT NULL,
  `Updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Screen`
--

INSERT INTO `Screen` (`SreenName`, `Sequence`, `FieldName`, `EnglishLabel`, `EnglishHelp`, `SpanishLabel`, `SpanishHelp`, `Updated`) VALUES
('Create Account', '0', 'Title', 'Create Account', '', 'Crear Una Cuenta', '', '2024-07-15 11:07:52'),
('Create Account', '1', 'Your ID', 'Use your email or cell phone #:', 'Use your email address or your cell phone number where we can send you answers to your questions or updates about the status of your case.', 'Utilice su correo electrónico o número de teléfono celular:', 'Utilice su dirección de correo electrónico o su número de teléfono celular donde podemos enviarle respuestas a sus preguntas o actualizaciones sobre el estado de su caso.', '2024-07-15 11:07:52'),
('Create Account', '2', 'Password', 'Password:', 'Must be at least 6 characters', 'Contraseña:', 'Debe tener como mínimo 6 caracteres', '2024-07-15 11:07:52'),
('Log In', '0', 'Title', 'Log In', '', 'Entrar a Tu Cuenta', '', '2024-07-15 11:07:52'),
('Log In', '1', 'Your ID', 'Email or Cell Phone #:', 'Use the email address or the cell phone number that you used when you created your account.', 'Correo electrónico o número de teléfono celular:', 'Utilice la dirección de correo electrónico o el número de teléfono celular que utilizó cuando creó su cuenta.', '2024-07-15 11:07:52'),
('Log In', '2', 'Password', 'Password:', 'Enter the password you used when you created your account.  If you\'ve forgotten your password, use forgot password below.', 'Contraseña:', 'Ingrese la contraseña que utilizó cuando creó su cuenta.  Si olvidó su contraseña, use la contraseña olvidada a continuación.', '2024-07-15 11:07:52'),
('Log In', '3', 'Forgot Password', 'Forgot Password', 'We\'ll send you a 6 digit code to the email or cell phone number you gave us when you created your account.', 'Olvide mi contraseña', 'Le enviaremos un código de 6 dígitos al correo electrónico o al número de teléfono celular que nos proporcionó cuando creó su cuenta.', '2024-07-15 11:07:52'),
('Inquiry Form', '0', 'Title', 'Inquiry/Qualification Payment', 'Provide us your name, ', 'Preguntas/Pago Para Cualificarlo', '', '2024-07-15 11:07:52'),
('Inquiry Form', '1', 'FirstName', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
('Inquiry Form', '2', 'LastName', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
('Inquiry Form', '3', 'Current State, Country of Residence', 'Your current state and country of residence', 'Enter the US State of your primary residence. If you\'re not currently residing in the US, enter the state and country were you\'re currently residing.', 'Su estado actual y país de residencia', 'Ingrese el estado estadounidense de su residencia principal. Si actualmente no reside en los EE. UU., ingrese el estado y el país donde reside actualmente.', '2024-07-15 11:07:52'),
('Inquiry Form', '4', 'PhoneNumber', 'Cell Phone Number', 'Enter your US cell phone number. If your cell phone is not American, select the code for that country first.', 'Número Celular', 'Ingrese su número de teléfono celular de EE. UU. Si tu celular no es americano, selecciona primero el código de ese país.', '2024-07-15 11:07:52'),
('Inquiry Form', '5', 'email', 'Your email address', 'Enter your primary email address, if you don\'t have an email address, leave it blank.', 'Su dirección de correo electrónico', 'Ingrese su dirección de correo electrónico principal; si no tiene una dirección de correo electrónico, déjela en blanco.', '2024-07-15 11:07:52'),
('Inquiry Form', '6', 'HelpwithQualifyingForm', 'Do you need help completing the PIPE Qualification form?', 'If you\'re not comfortable filling computer forms, you can schedule help with one of our assistants for an additional fee of $25 USD by checking \"Yes.\"', '¿Necesita ayuda para completar el formulario de Calificación PIPE?', 'Si no se siente cómodo completando formularios por computadora, puede programar ayuda con uno de nuestros asistentes por una tarifa adicional de $25 USD marcando \"Sí\".', '2024-07-15 11:07:52'),
('Inquiry Form', '6', 'PIPEQualifyingFee', 'Payment options', 'Select one of the 5 payment option that\'s most convenient for you. We\'ll be able to fill in your qualification data as soon as the payment has cleared. ', 'Opciones de Pago', 'Selecione una de las 5 forma de pago que más le convenga. Podremos completar sus datos de calificación tan pronto como se haya liquidado el pago. ', '2024-07-15 11:07:52'),
('Inquiry Form', '7', 'Questions', 'Do do have any questions before we can qualify you?', '', '¿Tiene alguna pregunta antes de que podamos calificarlo?', '', '2024-07-15 11:07:52'),
('', '', '', '', '', '', '', '2024-07-15 11:07:52'),
('Qualification', '0', 'PIPE Qualification', 'PIPE Immigration Qualification ', 'The data you provide during the process will be used to determine if you qualify and how much effort will be required to get you the benefits of the PIPE program.', 'Calificación Para el Programa de inmigración PIPE ', 'Los datos que proporcione durante el proceso se utilizarán para determinar si califica y cuánto esfuerzo se requerirá para obtener los beneficios del programa PIPE.', '2024-07-15 11:07:52'),
('Qualification', '1', 'Firstname', 'Your First Name(s)', 'Enter your first name(s) as they appear in your passport or your birth certificate.', 'Su(s) nombre(s)', 'Ingrese su(s) nombre(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
('Qualification', '2', 'Lastname', 'Your Last Name(s)', 'Enter your last name(s) as they appear in your passport or your birth certificate.', 'Su(s) apellido(s)', 'Ingrese su(s) apellido(s) tal como aparecen en su pasaporte o en su certificado de nacimiento.', '2024-07-15 11:07:52'),
('Qualification', '3', 'Birthday', 'Birthday', 'What date were you born?', 'Cumpleaños', '¿En qué fecha naciste?', '2024-07-15 11:07:52'),
('Qualification', '4', 'Birth State and Country', 'The country and state where you were born', 'If the country were you were born used a different administrative division than state, use that classification. ', 'El país y estado donde naciste.', 'Si el país donde nació utilizaba una división administrativa diferente a la del estado, utilice esa clasificación. ', '2024-07-15 11:07:52'),
('Qualification', '5', 'AddressLine1', 'Your US Address Line 1', 'Line 1 of the US Address. If you don\'t have an address in the US, use your current address and explain in the last section why you don\'t have a US address.', 'Su dirección en EE. UU. Línea 1', 'Línea 1 de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., use su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
('Qualification', '6', 'AddressLine2', 'Your US Address Line 1', 'Line 2 of the US Address. If you don\'t have an address in the US, use your current address and explain in the last section why you don\'t have a US address.', 'Su dirección en EE. UU. Línea 1', 'Línea 2 de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., use su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
('Qualification', '7', 'ZipCode', 'The zipcode of your US address', 'Zip code of the US Address. If you don\'t have an address in the US, use the postal code of your current address and explain in the last section why you don\'t have a US address.', 'El código postal de su dirección en EE. UU.', 'Código postal de la dirección de EE. UU. Si no tiene una dirección en los EE. UU., utilice el código postal de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
('Qualification', '8', 'City', 'City', 'City of your US Address. If you don\'t have an address in the US, use the city of your current address and explain in the last section why you don\'t have a US address.', 'Ciudad', 'Ciudad de su dirección en EE. UU. Si no tiene una dirección en los EE. UU., utilice la ciudad de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
('Qualification', '9', 'State', 'State', 'State of your US Address. If you don\'t have an address in the US, use the state/administrative division of your current address and explain in the last section why you don\'t have a US address.', 'Estado', 'Estado de su dirección en EE. UU. Si no tiene una dirección en los EE. UU., utilice la división estatal/administrativa de su dirección actual y explique en la última sección por qué no tiene una dirección en los EE. UU.', '2024-07-15 11:07:52'),
('Qualification', '10', 'CellPhone', 'Your Cell Phone #', 'Your primary US cell phone #. If your primary cell phone # is not in the US, specify its country code.', 'Su número de teléfono celular', 'Su número de teléfono celular principal de EE. UU. Si su número de teléfono celular principal no está en los EE. UU., especifique su código de país.', '2024-07-15 11:07:52'),
('', '11', 'WhatApp', 'WhatApp?', 'WhatsApp is the easier way for us to send you text.  If you can install it on your cell phone, that would make it easy for us to communicate.  Leave it blank if you don\'t have WhatsApp installed. ', '¿Qué aplicación?', 'WhatsApp es la forma más fácil para nosotros de enviarte mensajes de texto.  Si puede instalarlo en su teléfono celular, nos facilitará la comunicación.  Déjalo en blanco si no tienes WhatsApp instalado. ', '2024-07-15 11:07:52'),
('Qualification', '12', 'HomePhone', 'Your Home Phone #', 'If you have a home phone number, please specify it, otherwise leave this field blank.', 'Su número de teléfono residencial', 'Si tiene un número de teléfono residencial, especifíquelo; de lo contrario, deje este campo en blanco.', '2024-07-15 11:07:52'),
('Qualification', '13', 'WorkPhone', 'Your Work Phone #', 'If you have a work phone number, please specify it, otherwise leave this field blank.', 'Su número de teléfono de trabajo', 'Si tiene un número de teléfono del trabajo, especifíquelo; de lo contrario, deje este campo en blanco.', '2024-07-15 11:07:52'),
('Qualification', '14', 'email', 'Your email address', 'If you have an email address where we can send you large document, please specify it, otherwise leave blank.', 'Su dirección de correo electrónico', 'Si tiene una dirección de correo electrónico donde podamos enviarle un documento grande, especifíquela; de lo contrario, déjela en blanco.', '2024-07-15 11:07:52'),
('Qualification', '15', 'EmergencyContact', 'The Name of Your Emergency Contact', 'The person we should contact in case we can\'t get a hold of you.', 'El nombre de su contacto de emergencia', 'La persona con la que debemos contactar en caso de que no podamos comunicarnos con usted.', '2024-07-15 11:07:52'),
('Qualification', '16', 'EmergencyPhone', 'The Phone # of this Emergency Contact', 'The cell phone number of your emergency contact.', 'El número de teléfono de este contacto de emergencia', 'El número de teléfono celular de su contacto de emergencia.', '2024-07-15 11:07:52'),
('Qualification', '17', 'SpouseName', 'Your Spouse\'s Name', 'Your US citizen spouse\'s full legal name as it appears in their US documents.', 'El nombre de su cónyuge', 'El nombre legal completo de su cónyuge ciudadano estadounidense tal como aparece en sus documentos estadounidenses.', '2024-07-15 11:07:52'),
('Qualification', '18', 'SpouseBirthday', 'Your Spouse\'s Birthday', 'Your US citizen spouse\'s birthday.', 'El cumpleaños de su cónyuge', 'El cumpleaños de su cónyuge ciudadano estadounidense.', '2024-07-15 11:07:52'),
('Qualification', '19', 'StateCountryofMarriage', 'Country, State Where You Marry', 'Country and state where you were married.', 'País, estado donde se casa', 'País y estado donde se casó.', '2024-07-15 11:07:52'),
('Qualification', '20', 'DateofMarriage', 'The Date of Your Marriage', 'The date that appears on your marriage to the US citizen.', 'La fecha de su matrimonio', 'La fecha que aparece en su matrimonio con el ciudadano estadounidense.', '2024-07-15 11:07:52'),
('Qualification', '21', 'ProofofSpouse\'sCitizenship', 'Proof of Your Spouse\'s US Citizenship', 'Typically it\'s their US birthcertificate, but if they\'re a naturalized citizen, then specify their US passport number and its expiration number.  If they don\'t have a US passport, enter their naturalization number.', 'Prueba de ciudadanía estadounidense de su cónyuge', 'Normalmente es su certificado de nacimiento de EE. UU., pero si es ciudadano naturalizado, especifique su número de pasaporte estadounidense y su número de vencimiento.  Si no tienen pasaporte estadounidense, ingrese su número de naturalización.', '2024-07-15 11:07:52'),
('Qualification', '22', 'USEntryDate', 'Date You Entered the US', 'What date did you enter the US? If you\'re not use enter your best estimate.', 'Fecha en que ingresó a los EE. UU.', '¿En qué fecha ingresaste a Estados Unidos? Si no lo utiliza, ingrese su mejor estimación.', '2024-07-15 11:07:52'),
('Qualification', '23', 'StateViaWhichYouEntered', 'State Via Which You Entered the US', 'Specify via which state, territory or commonwealth you entered the US.  If you\'re not sure, please explain.', 'Estado por el que ingresó a los EE. UU.', 'Especifique a través de qué estado, territorio o estado libre asociado ingresó a los EE. UU.  Si no está seguro, explíquelo.', '2024-07-15 11:07:52'),
('Qualification', '24', 'DescribeHowYouEnter', 'Describe How You Entered the US', 'Specify if you crossed the Mexican or Canadian borders, took a boat into the US, or arrived via commercial carriers.', 'Describa cómo ingresó a los EE. UU.', 'Especifique si cruzó las fronteras de México o Canadá, tomó un barco hacia los EE. UU. o llegó a través de transportistas comerciales.', '2024-07-15 11:07:52'),
('Qualification', '25', 'DidYouUseAnyIllegualDocumentation', 'Did You Use Any Ilegal Documentation to Enter the US?', '', '¿Utilizó alguna documentación ilegal para ingresar a los EE. UU.?', '', '2024-07-15 11:07:52'),
('Qualification', '26', 'WereYouDetainedbyUSBorderPatrol?', 'Were you Detained by US Border Patrol?', 'If you were detained by US Border Patrol, describe how and were specifically it happenned.', '¿Fuiste detenido por la Patrulla Fronteriza de EE. UU.?', 'Si fue detenido por la Patrulla Fronteriza de EE. UU., describa cómo y dónde sucedió específicamente.', '2024-07-15 11:07:52'),
('Qualification', '27', 'TaxReturnData', 'What years, if any, did you file US tax returns?', 'Enter the year of your US Federal tax returns, typically called IRS 1040 form.', '¿En qué años, si corresponde, presentó declaraciones de impuestos en los EE. UU.?', 'Ingrese el año de sus declaraciones de impuestos federales de EE. UU., generalmente llamado formulario 1040 del IRS.', '2024-07-15 11:07:52'),
('Qualification', '28', 'BirthCertificateofUSBornChildren?', 'How many of your children were born in the US?', 'Tell us the names and birthday of your US born children.', '¿Cuántos de sus hijos nacieron en Estados Unidos?', 'Díganos los nombres y la fecha de nacimiento de sus hijos nacidos en Estados Unidos.', '2024-07-15 11:07:52'),
('Qualification', '29', 'W-2?', 'Did you ever receive any W-2 from any of your employers?', 'Enter the name and years your employers provided you with W-2 forms.', '¿Alguna vez recibió algún W-2 de alguno de sus empleadores?', 'Ingrese el nombre y los años en que sus empleadores le proporcionaron los formularios W-2.', '2024-07-15 11:07:52'),
('Qualification', '30', 'DriverLicense', 'Did you ever get a driver\'s license from any US states?', 'If you ever received driver licenses from any US states, specify as much information as you have, e.g., the state of that driver\'s license, the year and ID number if you have it.', '¿Alguna vez obtuvo una licencia de conducir de algún estado de EE. UU.?', 'Si alguna vez recibió licencias de conducir de algún estado de EE. UU., especifique toda la información que tenga, por ejemplo, el estado de esa licencia de conducir, el año y el número de identificación, si lo tiene.', '2024-07-15 11:07:52'),
('Qualification', '31', 'OtherStateIssueIDs', 'Did you ever receive any State issued IDs?', 'If you ever received an ID from any US state, specify as much information as you have, e.g., the state of that ID, the year and ID number if you have it.', '¿Alguna vez recibió alguna identificación emitida por el estado?', 'Si alguna vez recibió una identificación de cualquier estado de EE. UU., especifique toda la información que tenga, por ejemplo, el estado de esa identificación, el año y el número de identificación, si lo tiene.', '2024-07-15 11:07:52'),
('Qualification', '32', 'OtherDocumentThatCouldUse', 'Do you have any other documents that could help us verify your US residency?', 'If you ever signed a rental agreement, have electric, water, phone or any utility bills in your name, tell us as much as you can remember about these documents. E.g., name on the contract/utility bill, its address, date, account number, etc.', '¿Tiene algún otro documento que pueda ayudarnos a verificar su residencia en los EE. UU.?', 'Si alguna vez firmó un contrato de alquiler, tiene facturas de electricidad, agua, teléfono o cualquier servicio público a su nombre, cuéntenos todo lo que pueda recordar sobre estos documentos. Por ejemplo, nombre en el contrato/factura de servicios públicos, su dirección, fecha, número de cuenta, etc.', '2024-07-15 11:07:52'),
('Qualification', '33', 'Child\'sFullLegalName', 'Full Name', 'Legal name of the child for whom you would like to obtain PIPE benefits.', 'Nombre completo', 'Nombre legal del niño por quien desea obtener beneficios PIPE.', '2024-07-15 11:07:52'),
('Qualification', '34', 'Birthday', 'Birthday', 'The birthday of that child', 'Cumpleaños', 'El cumpleaños de ese niño.', '2024-07-15 11:07:52'),
('Qualification', '35', 'StateCountryofBirth', 'State and Country of Birth', 'The state and country where that child was born.', 'Estado y país de nacimiento', 'El estado y país donde nació ese niño.', '2024-07-15 11:07:52'),
('Qualification', '36', 'MotherName', 'Mother\'s Name', 'The name of the child\'s mother as it appears in their birth certificate.', 'Nombre de la madre', 'El nombre de la madre del niño tal como aparece en su certificado de nacimiento.', '2024-07-15 11:07:52'),
('Qualification', '37', 'FatherName', 'Father\'s Name', 'The name of the child\'s father as it appears in their birth certificate.', 'Nombre del Padre', 'El nombre del padre del niño tal como aparece en su certificado de nacimiento.', '2024-07-15 11:07:52'),
('Qualification', '38', 'Gender', 'Gender', 'Whether the child is male or female.  The US immigration service currently doesn\'t recognize non-binary as a sex.', 'Género', 'Si el niño es hombre o mujer.  Actualmente, el servicio de inmigración de EE. UU. no reconoce el sexo no binario.', '2024-07-15 11:07:52'),
('Qualification', '39', 'School Attended, state and school years', 'School Attended, US state and school years', 'Names and US state of the schools the child has attended.  The school year the child attended these schools. ', 'Asistencia escolar, estado de EE. UU. y años escolares', 'Nombres y estado estadounidense de las escuelas a las que ha asistido el niño.  El año escolar el niño asistió a estas escuelas. ', '2024-07-15 11:07:52'),
('Qualification', '40', 'SchoolRecordAvailable', 'Can You Get Their School\'s Records?', 'If necessary, are you able to get the school records where your child attended the US school.', '¿Puede obtener los registros escolares de su escuela?', 'Si es necesario, ¿puede obtener los registros escolares en los que asistió su hijo a la escuela de EE. UU.?', '2024-07-15 11:07:52'),
('Qualification', '41', 'Employer', 'Name of Last Employer', 'The name of your last or current employer', 'Nombre del último empleador', 'El nombre de su último o actual empleador', '2024-07-15 11:07:52'),
('Qualification', '42', 'EmployerAddress', 'Employer\'s Address', 'The full address of your last or current employer', 'Dirección del empleado', 'La dirección completa de su último o actual empleador', '2024-07-15 11:07:52'),
('Qualification', '43', 'StartDate', 'Start Date', 'The approximate date when you started working there.', 'Fecha de inicio', 'La fecha aproximada en la que empezaste a trabajar allí.', '2024-07-15 11:07:52'),
('Qualification', '44', 'EndDate', 'End Date', 'The approximate last date when you stopped working there.', 'Fecha final', 'La última fecha aproximada en la que dejó de trabajar allí.', '2024-07-15 11:07:52'),
('Qualification', '45', 'JobTitle', 'Job Title', 'Whatever title is used to described your job.', 'Título profesional', 'Cualquier título que se utilice para describir su trabajo.', '2024-07-15 11:07:52'),
('Qualification', '46', 'JobDescription', 'Your Job Description', 'Tell us what you do in your job.', 'Su descripción de trabajo', 'Cuéntanos a qué te dedicas en tu trabajo.', '2024-07-15 11:07:52'),
('Qualification', '47', 'HighestCertificationDegree', 'Highest Certification Degree', 'If you had any college education or craft training that provided certification, please specify the highest certification here.', 'Grado de certificación más alto', 'Si tuvo alguna educación universitaria o capacitación artesanal que le otorgara certificación, especifique aquí la certificación más alta.', '2024-07-15 11:07:52'),
('Qualification', '48', 'InstitutionIssuingDegree', 'Institution Issuing Certification', 'The college, university, or trade school that issue that certification.', 'Institución que emite la certificación', 'El colegio, universidad o escuela vocacional que emite esa certificación.', '2024-07-15 11:07:52'),
('Qualification', '49', 'DateofDegree', 'Date of Certification', 'The date of that certification.', 'Fecha de Certificación', 'La fecha de dicha certificación.', '2024-07-15 11:07:52'),
('Qualification', '50', 'State and Country', 'State and Country of Certification', 'The state and country that certification.', 'Estado y país de certificación', 'El estado y país que certifica.', '2024-07-15 11:07:52'),
('Qualification', '51', 'CommunicableDisease', 'Communicable Disease', 'Are you currently being treated for any communicable diseases, e.g., the one listed below?', 'Enfermedad transmisible', 'Si actualmente está recibiendo tratamiento por alguna de las enfermedades transmisibles de esta lista, seleccione esta.', '2024-07-15 11:07:52'),
('Qualification', '52', 'MentalDisorder', 'Mental health challenges ', 'Are you currently being treated for any mental health challenges, e.g., the one listed below?', 'Desafíos de salud mental ', 'Si actualmente está recibiendo tratamiento por alguno de los problemas de salud mental de esta lista, seleccione esto.', '2024-07-15 11:07:52'),
('Qualification', '53', 'AccusedofChildAbduction', 'Accused of Child Abduction', 'Have you ever been formally charged by the police of child abduction?', 'Acusado de sustracción de menores', '¿Alguna vez la policía le ha acusado formalmente de sustracción de menores?', '2024-07-15 11:07:52'),
('Qualification', '54', 'ClaimedUSCitizenshipAfterSept1996', 'Last Date Claimed to be a US Citizen', 'What was the last date that you claimed to be a US Citizen? Describe in the field below what were the circumstances?', 'Última fecha en la que afirmó ser ciudadano estadounidense', '¿Cuál fue la última fecha en la que afirmó ser ciudadano estadounidense? Describe en el campo a continuación ¿cuáles fueron las circunstancias?', '2024-07-15 11:07:52'),
('Qualification', '55', 'MissingAnyUSRequiredVaccines', 'Are You Missing An US Required Vaccines', 'Are you missing any of the vaccines listed below?', '¿Le faltan las vacunas requeridas en EE. UU.?', '¿Le falta alguna de las vacunas que se enumeran a continuación?', '2024-07-15 11:07:52'),
('Qualification', '56', 'AccusedofDrugAddictionTraffickingProstitutionVice', 'Accused of Drug Addiction Trafficking Prostitution Vice', 'Have you ever been formally charged by the police in your country or in the US of drug addiction, drug trafficking, prostitution, vice, or abduction of another person?', 'Acusado de drogadicción, tráfico, prostitución y vicio', '¿Alguna vez ha sido acusado formalmente por la policía de su país o de Estados Unidos de drogadicción, tráfico de drogas, prostitución, vicio o secuestro de otra persona?', '2024-07-15 11:07:52'),
('Qualification', '57', 'Deported from the US', 'Deported from the US', 'Have you ever been deported from the US?', 'Deportado de EE.UU.', '¿Alguna vez ha sido deportado de los EE. UU.?', '2024-07-15 11:07:52'),
('Qualification', '58', 'USElectionVotedIn', 'Last US Election You Voted In', 'Enter the date of the last US election that you voted in.', 'Última elección estadounidense en la que usted votó', 'Ingrese la fecha de la última elección estadounidense en la que votó.', '2024-07-15 11:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `ScreenContent`
--

CREATE TABLE `ScreenContent` (
  `ScreenName` varchar(50) NOT NULL,
  `Sequence` smallint(6) NOT NULL,
  `FieldName` varchar(50) NOT NULL,
  `EnglishLabel` varchar(100) NOT NULL,
  `EnglishHelp` varchar(3000) NOT NULL,
  `SpanishLabel` varchar(100) NOT NULL,
  `SpanishHelp` varchar(3000) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `URLofDocumentation`
--

CREATE TABLE `URLofDocumentation` (
  `UserID` int(11) NOT NULL,
  `DocURL` varchar(300) NOT NULL,
  `DocType` varchar(100) NOT NULL COMMENT 'MarriageCertificate, BirthCertificate, Passport, Employment, UtilityBill, RentalAgreement, etc.',
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `ClientID` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `BirthCountry` varchar(50) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Birthdate` date NOT NULL,
  `PreferLanguage` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserRelation`
--

CREATE TABLE `UserRelation` (
  `UserID` int(11) NOT NULL,
  `RelationID` int(11) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
