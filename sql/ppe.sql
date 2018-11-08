-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2018 at 05:02 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppe`
--

-- --------------------------------------------------------

--
-- Table structure for table `compose`
--

CREATE TABLE `compose` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_QCM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faire`
--

CREATE TABLE `faire` (
  `ID_USER` int(11) NOT NULL,
  `ID_QCM` int(11) NOT NULL,
  `NOTE` int(11) NOT NULL,
  `DUREE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qcm`
--

CREATE TABLE `qcm` (
  `ID_QCM` int(11) NOT NULL,
  `TITRE_QCM` varchar(50) NOT NULL,
  `DESC_QCM` varchar(50) NOT NULL,
  `DUREE_MAX` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ID_QUESTION` int(11) NOT NULL,
  `LIB_QUESTION` varchar(50) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `ID_REPONSE` int(11) NOT NULL,
  `LIB_REPONSE` varchar(50) NOT NULL,
  `ISTRUE` tinyint(1) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NOM_USER` varchar(50) NOT NULL,
  `PRENOM_USER` varchar(50) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ROLE_USER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NOM_USER`, `PRENOM_USER`, `LOGIN`, `PASSWORD`, `ROLE_USER`) VALUES
(1, 'GAZEL', 'Elie', 'root', 'password', 'administrateur'),
(2, 'NOMELEVE1', 'PRENOMELEVE1', 'eleve1', '281ba63661bc803de16f1979574b96735493f497', 'eleve'),
(3, 'NOMELEVE2', 'PRENOMELEVE2', 'eleve2', '15ff3a1ee53db765d22527d3907c950b8546ea64', 'professeur'),
(4, 'NOMPROF', 'PRENOMPROF', 'prof1', '7468d258b811d2fd3be09a3221a74766737a560b', 'professeur'),
(5, 'NOMPROF2', 'PRENOMPROF2', 'prof2', 'f90ffb852c92dd9cad2b643f8e96e41222c0aa85', 'professeur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`ID_QUESTION`,`ID_QCM`),
  ADD KEY `COMPOSE_QCM0_FK` (`ID_QCM`);

--
-- Indexes for table `faire`
--
ALTER TABLE `faire`
  ADD PRIMARY KEY (`ID_USER`,`ID_QCM`),
  ADD KEY `FAIRE_QCM0_FK` (`ID_QCM`);

--
-- Indexes for table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`ID_QCM`),
  ADD KEY `QCM_USER_FK` (`ID_USER`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID_QUESTION`),
  ADD KEY `QUESTION_USER_FK` (`ID_USER`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`ID_REPONSE`),
  ADD KEY `REPONSE_QUESTION_FK` (`ID_QUESTION`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `ID_QCM` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `ID_REPONSE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `COMPOSE_QCM0_FK` FOREIGN KEY (`ID_QCM`) REFERENCES `qcm` (`ID_QCM`),
  ADD CONSTRAINT `COMPOSE_QUESTION_FK` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`);

--
-- Constraints for table `faire`
--
ALTER TABLE `faire`
  ADD CONSTRAINT `FAIRE_QCM0_FK` FOREIGN KEY (`ID_QCM`) REFERENCES `qcm` (`ID_QCM`),
  ADD CONSTRAINT `FAIRE_USER_FK` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `QCM_USER_FK` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `QUESTION_USER_FK` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `REPONSE_QUESTION_FK` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
