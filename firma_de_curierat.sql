-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2022 at 09:18 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firma_de_curierat`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `Client_ID` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `Firma` varchar(50) DEFAULT NULL,
  `Judet` varchar(50) NOT NULL,
  `Localitate` varchar(50) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` char(10) NOT NULL,
  `Telefon` char(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`Client_ID`, `Nume`, `Prenume`, `Firma`, `Judet`, `Localitate`, `Strada`, `Numar`, `Telefon`, `Email`) VALUES
(1111, 'Marin', 'Ionut', '', 'Bistrita', 'Bistrita Nasaud', 'Viilor', '331', '23456', 'marin_ionut@gmail.com'),
(1112, 'Ionescu', 'Ana', '', 'Bucuresti', 'Bucuresti', 'Teilor', '35A', '23412', 'ionescu_a@gmail.com'),
(1113, 'Dragan', 'Maria', '', 'Vrancea', 'Focsani', 'Viitorului', '14', '11123', 'maria.d@yahoo.com'),
(1114, 'Popescu', 'Cornel', '', 'Constanta', 'Constanta', 'Liliacului', '55', '11323', 'p.cornel@gmail.com'),
(1115, 'Dragomir', 'Irina', 'Firma1', 'Tulcea', 'Tulcea', 'Republicii', '24', '55542', 'irina@gamil.com'),
(1116, 'Petrescu', 'Iulia', '', 'Brasov', 'Brasov', 'Pacii', '11', '66645', 'iuliapetrescu@gmail.com'),
(1117, 'Coman', 'Cristina', '', 'Sibiu', 'Sibiu', 'Rozelor', '244', '34453', 'comancristina@gmail.com'),
(1118, 'Rusu', 'Andrei', '', 'Timis', 'Timisoara', 'Decebal', '12', '22223', 'r.andrei@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `curieri`
--

CREATE TABLE `curieri` (
  `Curier_ID` int(11) NOT NULL,
  `Sediu_ID` int(11) DEFAULT NULL,
  `Masina_ID` int(11) DEFAULT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Localitate` varchar(50) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` char(10) NOT NULL,
  `Sex` char(1) NOT NULL DEFAULT 'F',
  `Data_Nasterii` date NOT NULL,
  `Data_Angajarii` date NOT NULL,
  `Salariu` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curieri`
--

INSERT INTO `curieri` (`Curier_ID`, `Sediu_ID`, `Masina_ID`, `Nume`, `Prenume`, `CNP`, `Judet`, `Localitate`, `Strada`, `Numar`, `Sex`, `Data_Nasterii`, `Data_Angajarii`, `Salariu`) VALUES
(1, 2, 1, 'Iorgu', 'Andrei', '1111111111111', 'Bucuresti', 'Sector 1', 'Crisan', '10', 'M', '1995-02-15', '2020-10-11', '2000.00'),
(2, 1, 4, 'Dumitrescu', 'Marius', '2222', 'Timis', 'Timisoara', 'Horea', '20', 'M', '1980-03-30', '2006-01-19', '3000.00'),
(3, 1, 4, 'Popa', 'Costin', '3333', 'Timis', 'Timisoara', 'Crinului', '53', 'M', '1990-12-04', '2015-07-21', '2500.00'),
(4, 2, 4, 'Stoica', 'Marin', '4444', 'Bucuresti', 'Sector 3', 'Bradului', '24', 'M', '1993-10-01', '2019-04-30', '2000.00'),
(5, 3, 5, 'Lazar', 'Cristian', '5555', 'Cluj', 'Cluj-Napoca', 'Plopilor', '64', 'M', '1989-11-16', '2013-08-23', '2650.00'),
(6, 4, 7, 'Mihai', 'Ion', '6666', 'Mures', 'Targu Mures', 'Ion Creanga', '1002', 'M', '1992-08-22', '2016-09-04', '2500.00'),
(7, 2, 5, 'Iordache', 'Adrian', '7777', 'Bucuresti', 'Sector 2', 'Train', '38A', 'M', '1983-02-15', '2004-10-09', '3250.00'),
(8, 2, 7, 'Tanase', 'Vlad', '8888', 'Bucuresti', 'Sector 5', 'Ferdinand', '88', 'M', '1990-08-14', '2018-06-17', '2250.00'),
(9, 3, 5, 'Lupu', 'Daniel', '9999', 'Cluj', 'Cluj-Napoca', 'Narciselor', '1234', 'M', '1999-09-22', '2021-01-11', '2000.00'),
(10, 4, 7, 'Nicolae', 'Ilie', '1212', 'Mures', 'Targu Mures', 'Lalelelor', '21', 'M', '1986-05-25', '2007-08-13', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `masini`
--

CREATE TABLE `masini` (
  `Masina_ID` int(11) NOT NULL,
  `Nr_Inm` char(7) NOT NULL,
  `Model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masini`
--

INSERT INTO `masini` (`Masina_ID`, `Nr_Inm`, `Model`) VALUES
(1, '144', '1tuy'),
(4, 'B100ABC', 'bbb'),
(5, 'xxx', 'xxxxx'),
(7, 'dfsdfr', 'sdfgg');

-- --------------------------------------------------------

--
-- Table structure for table `pachete`
--

CREATE TABLE `pachete` (
  `Pachet_ID` int(11) NOT NULL,
  `Punct_Colectare_ID` int(11) DEFAULT NULL,
  `Curier_ID` int(11) DEFAULT NULL,
  `Client_ID` int(11) NOT NULL,
  `Greutate` float NOT NULL,
  `Stare` varchar(45) DEFAULT NULL,
  `Pret` float NOT NULL,
  `Data_Expediere` date DEFAULT NULL,
  `Data_Primirii` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pachete`
--

INSERT INTO `pachete` (`Pachet_ID`, `Punct_Colectare_ID`, `Curier_ID`, `Client_ID`, `Greutate`, `Stare`, `Pret`, `Data_Expediere`, `Data_Primirii`) VALUES
(3, 1, 10, 1111, 1, 'livrat', 200, '2021-07-12', '2021-07-14'),
(4, NULL, 1, 1112, 0.05, 'livrat', 100, '2021-10-01', '2021-10-04'),
(5, NULL, 1, 1113, 2, 'in tranzit', 50, '2021-11-10', NULL),
(6, NULL, 5, 1111, 0.9, 'livrat', 250, '2021-05-10', '2021-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `punct_colectare`
--

CREATE TABLE `punct_colectare` (
  `Punct_Colectare_ID` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Localitate` varchar(50) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` char(10) NOT NULL,
  `Telefon` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `punct_colectare`
--

INSERT INTO `punct_colectare` (`Punct_Colectare_ID`, `Nume`, `Judet`, `Localitate`, `Strada`, `Numar`, `Telefon`) VALUES
(1, 'Punct1', 'Timis', 'Timisoara', 'Licuricilor', '201', '25575768'),
(2, 'Punct2', 'Bucuresti', 'Sector 3', 'Straduintei', '388B', '45678907'),
(3, 'Punct3', 'Cluj', 'Cluj-Napoca', 'Merisor', '13', '46688765'),
(4, 'Punct4', 'Mures', 'Targu Mures', 'Frunzelor', '75', '65789975');

-- --------------------------------------------------------

--
-- Table structure for table `sedii`
--

CREATE TABLE `sedii` (
  `Sediu_ID` int(11) NOT NULL,
  `NumeS` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Localitate` varchar(50) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sedii`
--

INSERT INTO `sedii` (`Sediu_ID`, `NumeS`, `Judet`, `Localitate`, `Strada`, `Numar`) VALUES
(1, 'SediuA', 'Timis', 'Timisoara', 'Aviatorilor', '2011'),
(2, 'SediuB', 'Bucuresti', 'Sector 6', 'Mihau Eminescu', '55B'),
(3, 'SediuC', 'Cluj', 'Cluj-Napoca', 'Primaverii', '17'),
(4, 'SediuD', 'Mures', 'Targu Mures', 'Zorilor', '26'),
(15, 'SediuE', 'Constanta', 'Constanta', 'Merisor', '21'),
(16, 'SediuF', 'Iasi', 'Iasi', 'Murelor', '35A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'user', '1234', 'user'),
(3, 'marin_ionut@gmail.com', '1234', 'user'),
(4, 'ionescu_a@gmail.com', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`Client_ID`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);

--
-- Indexes for table `curieri`
--
ALTER TABLE `curieri`
  ADD PRIMARY KEY (`Curier_ID`),
  ADD UNIQUE KEY `CNP_UNIQUE` (`CNP`),
  ADD KEY `FK1_idx` (`Sediu_ID`),
  ADD KEY `Masina_ID` (`Masina_ID`);

--
-- Indexes for table `masini`
--
ALTER TABLE `masini`
  ADD PRIMARY KEY (`Masina_ID`),
  ADD UNIQUE KEY `Nr_Inm` (`Nr_Inm`);

--
-- Indexes for table `pachete`
--
ALTER TABLE `pachete`
  ADD PRIMARY KEY (`Pachet_ID`),
  ADD KEY `FK2_idx` (`Curier_ID`),
  ADD KEY `FK1_idx` (`Client_ID`),
  ADD KEY `FK4_idx` (`Punct_Colectare_ID`);

--
-- Indexes for table `punct_colectare`
--
ALTER TABLE `punct_colectare`
  ADD PRIMARY KEY (`Punct_Colectare_ID`);

--
-- Indexes for table `sedii`
--
ALTER TABLE `sedii`
  ADD PRIMARY KEY (`Sediu_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `Client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1119;

--
-- AUTO_INCREMENT for table `curieri`
--
ALTER TABLE `curieri`
  MODIFY `Curier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `masini`
--
ALTER TABLE `masini`
  MODIFY `Masina_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pachete`
--
ALTER TABLE `pachete`
  MODIFY `Pachet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `punct_colectare`
--
ALTER TABLE `punct_colectare`
  MODIFY `Punct_Colectare_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sedii`
--
ALTER TABLE `sedii`
  MODIFY `Sediu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curieri`
--
ALTER TABLE `curieri`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`Sediu_ID`) REFERENCES `sedii` (`Sediu_ID`),
  ADD CONSTRAINT `FK8` FOREIGN KEY (`Masina_ID`) REFERENCES `masini` (`Masina_ID`);

--
-- Constraints for table `pachete`
--
ALTER TABLE `pachete`
  ADD CONSTRAINT `Clienti_fk3` FOREIGN KEY (`Client_ID`) REFERENCES `clienti` (`Client_ID`),
  ADD CONSTRAINT `Curieri_fk1` FOREIGN KEY (`Curier_ID`) REFERENCES `curieri` (`Curier_ID`),
  ADD CONSTRAINT `P_C_fk4` FOREIGN KEY (`Punct_Colectare_ID`) REFERENCES `punct_colectare` (`Punct_Colectare_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
