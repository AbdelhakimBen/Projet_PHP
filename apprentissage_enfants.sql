-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apprentissage_enfants`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(5, 'Animaux'),
(13, 'Alphabets'),
(14, 'Planétes'),
(15, 'Couleurs');

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `titre`, `image`, `audio`, `categorie_id`) VALUES
(6, 'Chameau', 'chameau.jpg', 'chameau.mp3', 5),
(8, 'Chien', 'chien.jpg', 'chien.mp3', 5),
(9, 'Crocodile', 'crocodile.jpg', 'crocodile.mp3', 5),
(10, 'Koala', 'koala.jpg', 'koala.mp3', 5),
(11, 'Lapin', 'lapin.jpg', 'lapin.mp3', 5),
(12, 'Léopard', 'léopard.jpg', 'leopard.mp3', 5),
(13, 'Ours', 'ours.jpg', 'ours.mp3', 5),
(14, 'Panda', 'panda.jpg', 'panda.mp3', 5),
(15, 'Renard', 'renard.jpg', 'renard.mp3', 5),
(16, 'Singe', 'singe.jpg', 'singe.mp3', 5),
(17, 'Toucan', 'toucan.jpg', 'toucan.mp3', 5),
(29, 'A', 'A.png', 'A.mp3', 13),
(30, 'B', 'B.png', 'B.mp3', 13),
(31, 'C', 'C.png', 'C.mp3', 13),
(32, 'D', 'alphabet D.png', 'D.mp3', 13),
(33, 'E', 'alphabet E.png', 'E.mp3', 13),
(34, 'F', 'alphabet F.png', 'F.mp3', 13),
(35, 'G', 'alphabet G.png', 'G.mp3', 13),
(36, 'H', 'alphabet H.png', 'H.mp3', 13),
(37, 'I', 'alphabet I.png', 'I.mp3', 13),
(38, 'J', 'alphabet J.png', 'J.mp3', 13),
(39, 'K', 'alphabet K.png', 'K.mp3', 13),
(40, 'L', 'Alphabet L.png', 'L.mp3', 13),
(41, 'M', 'Alphabet M.png', 'M.mp3', 13),
(42, 'N', 'Alphabet N.png', 'N.mp3', 13),
(43, 'O', 'alphabet O.png', 'O.mp3', 13),
(44, 'P', 'Alphabet P.png', 'P.mp3', 13),
(45, 'Q', 'alphabet Q.png', 'Q.mp3', 13),
(46, 'R', 'Alphabet R.png', 'R.mp3', 13),
(47, 'S', 'alphabet S.png', 'S.mp3', 13),
(48, 'T', 'alphabet T.png', 'T.mp3', 13),
(49, 'U', 'Alphabet U.png', 'U.mp3', 13),
(50, 'V', 'alphabet V.png', 'V.mp3', 13),
(51, 'W', 'alphabet W.png', 'W.mp3', 13),
(52, 'X', 'alphabet X.png', 'X.mp3', 13),
(53, 'Y', 'alphabet Y.png', 'Y.mp3', 13),
(54, 'Z', 'alphabet Z .png', 'Z.mp3', 13),
(55, 'Jupiter', 'jupiter.png', 'jupiter.mp3', 14),
(56, 'Lune', 'lune.png', 'lune.mp3', 14),
(57, 'Mars', 'mars.png', 'mars.mp3', 14),
(58, 'Mercure', 'mercure.png', 'mercure.mp3', 14),
(59, 'Neptune', 'neptune.png', 'neptune.mp3', 14),
(60, 'Pluton', 'pluton.png', 'pluton.mp3', 14),
(61, 'Saturne', 'saturne.png', 'saturne.mp3', 14),
(62, 'Soleil', 'soleil.png', 'soleil.mp3', 14),
(63, 'Terre', 'terre.png', 'terre.mp3', 14),
(64, 'Uranus', 'uranus.png', 'uranus.mp3', 14),
(65, 'Venus', 'venus.png', 'venus.mp3', 14),
(66, 'Vert', 'vert.png', 'vert.mp3', 15),
(67, 'Blanc', 'blanc.png', 'blanc.mp3', 15),
(68, 'Bleu', 'bleu.png', 'bleu.mp3', 15),
(69, 'Gris', 'gris.png', 'gris.mp3', 15),
(70, 'Jaune', 'jaune.png', 'jaune.mp3', 15),
(71, 'Marron', 'marron.png', 'marron.mp3', 15),
(72, 'Noir', 'noir.png', 'noire.mp3', 15),
(73, 'Orange', 'orange.png', 'orange.mp3', 15),
(74, 'Rose', 'rose.png', 'rose.mp3', 15),
(75, 'Rouge', 'rouge.png', 'rouge.mp3', 15),
(76, 'Violet', 'violet.png', 'violet.mp3', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
