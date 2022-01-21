-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2022 at 01:46 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `titan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_preco`
--

DROP TABLE IF EXISTS `tb_preco`;
CREATE TABLE IF NOT EXISTS `tb_preco` (
  `id_preco` int NOT NULL AUTO_INCREMENT,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_preco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
CREATE TABLE IF NOT EXISTS `tb_produtos` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nm_produto` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor_produto` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_preco` int NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_preco` (`fk_preco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD CONSTRAINT `fk_preco` FOREIGN KEY (`fk_preco`) REFERENCES `tb_preco` (`id_preco`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
