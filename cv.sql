-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 18, 2021 at 09:39 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_etudie`
--

CREATE TABLE `a_etudie` (
  `ID_PERSONNE_personne` int(11) NOT NULL,
  `ID_DIPLOME_diplome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `a_travaille`
--

CREATE TABLE `a_travaille` (
  `ID_PERSONNE_personne` int(11) NOT NULL,
  `ID_EXPERIENCE_experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `ID_COMPETENCE_competence` int(11) NOT NULL,
  `COMPETENCE_competence` varchar(255) DEFAULT NULL,
  `NIVEAU_competence` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `diplome`
--

CREATE TABLE `diplome` (
  `ID_DIPLOME_diplome` int(11) NOT NULL,
  `DIPLOME_diplome` varchar(255) DEFAULT NULL,
  `ECOLE_diplome` varchar(255) DEFAULT NULL,
  `ANNEE_diplome` varchar(255) DEFAULT NULL,
  `ID_LIEU_lieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `ID_EXPERIENCE_experience` int(11) NOT NULL,
  `EXPERIENCE_experience` varchar(255) DEFAULT NULL,
  `ENTREPRISE_experience` varchar(255) DEFAULT NULL,
  `DATE_DEBUT_experience` varchar(255) DEFAULT NULL,
  `DATE_FIN_experience` varchar(255) DEFAULT NULL,
  `DESCRIPTION_experience` text,
  `ID_LIEU_lieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `ID_LANGUE_langue` int(11) NOT NULL,
  `LANGUE_langue` varchar(255) DEFAULT NULL,
  `NIVEAU_langue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE `lieu` (
  `ID_LIEU_lieu` int(11) NOT NULL,
  `VILLE_lieu` varchar(255) DEFAULT NULL,
  `PAYS_lieu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `maitrise`
--

CREATE TABLE `maitrise` (
  `ID_PERSONNE_personne` int(11) NOT NULL,
  `ID_COMPETENCE_competence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `parle`
--

CREATE TABLE `parle` (
  `ID_PERSONNE_personne` int(11) NOT NULL,
  `ID_LANGUE_langue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `ID_PERSONNE_personne` int(11) NOT NULL,
  `PRENOM_personne` varchar(37) DEFAULT NULL,
  `NOM_personne` varchar(37) DEFAULT NULL,
  `ADRESSE_personne` varchar(100) DEFAULT NULL,
  `TELEPHONE_personne` varchar(30) DEFAULT NULL,
  `EMAIL_personne` varchar(80) DEFAULT NULL,
  `PRESENTATION_personne` text,
  `WEBSITE_personne` varchar(255) DEFAULT NULL,
  `GITHUB_personne` varchar(255) DEFAULT NULL,
  `LINKEDIN_personne` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`ID_PERSONNE_personne`, `PRENOM_personne`, `NOM_personne`, `ADRESSE_personne`, `TELEPHONE_personne`, `EMAIL_personne`, `PRESENTATION_personne`, `WEBSITE_personne`, `GITHUB_personne`, `LINKEDIN_personne`) VALUES
(1, 'Prénom', 'Nom', 'adresse\nCode postale ville\nPays', 'téléphone', 'mail@mail.com', 'présentation ici', 'https://www.alinefierobe.com', 'https://www.alinefierobe.com', 'https://www.alinefierobe.com');


-- --------------------------------------------------------

--
-- Table structure for table `recherche`
--

CREATE TABLE `recherche` (
  `ID_PERSONNE_personne` int(11) NOT NULL,
  `ID_TRAVAIL_travail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recherche`
--

INSERT INTO `recherche` (`ID_PERSONNE_personne`, `ID_TRAVAIL_travail`) VALUES
(1, 1);


-- --------------------------------------------------------

--
-- Table structure for table `travail`
--

CREATE TABLE `travail` (
  `ID_TRAVAIL_travail` int(11) NOT NULL,
  `POSTE_travail` varchar(255) DEFAULT NULL,
  `DISPONIBILITE_travail` varchar(255) DEFAULT NULL,
  `MOBILITE_travail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travail`
--

INSERT INTO `travail` (`ID_TRAVAIL_travail`, `POSTE_travail`, `DISPONIBILITE_travail`, `MOBILITE_travail`) VALUES
(1, 'Poste Recherché', 'disponibilité', 'mobilité');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_etudie`
--
ALTER TABLE `a_etudie`
  ADD PRIMARY KEY (`ID_PERSONNE_personne`,`ID_DIPLOME_diplome`);

--
-- Indexes for table `a_travaille`
--
ALTER TABLE `a_travaille`
  ADD PRIMARY KEY (`ID_PERSONNE_personne`,`ID_EXPERIENCE_experience`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`ID_COMPETENCE_competence`);

--
-- Indexes for table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`ID_DIPLOME_diplome`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`ID_EXPERIENCE_experience`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`ID_LANGUE_langue`);

--
-- Indexes for table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`ID_LIEU_lieu`);

--
-- Indexes for table `maitrise`
--
ALTER TABLE `maitrise`
  ADD PRIMARY KEY (`ID_PERSONNE_personne`,`ID_COMPETENCE_competence`);

--
-- Indexes for table `parle`
--
ALTER TABLE `parle`
  ADD PRIMARY KEY (`ID_LANGUE_langue`,`ID_PERSONNE_personne`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID_PERSONNE_personne`);

--
-- Indexes for table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`ID_PERSONNE_personne`,`ID_TRAVAIL_travail`);

--
-- Indexes for table `travail`
--
ALTER TABLE `travail`
  ADD PRIMARY KEY (`ID_TRAVAIL_travail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competence`
--
ALTER TABLE `competence`
  MODIFY `ID_COMPETENCE_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `ID_DIPLOME_diplome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `ID_EXPERIENCE_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `ID_LANGUE_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `ID_LIEU_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID_PERSONNE_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travail`
--
ALTER TABLE `travail`
  MODIFY `ID_TRAVAIL_travail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
