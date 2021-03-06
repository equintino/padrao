-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Set-2016 às 01:38
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sinistro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tr`
--

CREATE TABLE IF NOT EXISTS `tr` (
  `ANO` int(4) DEFAULT NULL,
  `JANEIRO` varchar(6) DEFAULT NULL,
  `FEVEREIRO` varchar(6) DEFAULT NULL,
  `MARCO` varchar(6) DEFAULT NULL,
  `ABRIL` varchar(6) DEFAULT NULL,
  `MAIO` varchar(6) DEFAULT NULL,
  `JUNHO` varchar(6) DEFAULT NULL,
  `JULHO` varchar(6) DEFAULT NULL,
  `AGOSTO` varchar(6) DEFAULT NULL,
  `SETEMBRO` varchar(6) DEFAULT NULL,
  `OUTUBRO` varchar(6) DEFAULT NULL,
  `NOVEMBRO` varchar(6) DEFAULT NULL,
  `DEZEMBRO` varchar(6) DEFAULT NULL,
  `ACUMULADO` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tr`
--

INSERT INTO `tr` (`ANO`, `JANEIRO`, `FEVEREIRO`, `MARCO`, `ABRIL`, `MAIO`, `JUNHO`, `JULHO`, `AGOSTO`, `SETEMBRO`, `OUTUBRO`, `NOVEMBRO`, `DEZEMBRO`, `ACUMULADO`) VALUES
(1991, '-', '7', '8,5', '8,93', '8,99', '9,4', '10,05', '11,95', '16,78', '19,77', '30,52', '28,42', '335,51'),
(1992, '25,48', '25,61', '24,27', '21,08', '19,81', '21,05', '23,69', '23,22', '25,38', '25,07', '23,29', '23,95', '1.156,22'),
(1993, '26,76', '26,4', '25,81', '28,22', '28,68', '30,08', '30,37', '33,34', '34,62', '36,53', '36,16', '36,8', '2.474,73'),
(1994, '41,44', '39,86', '41,85', '45,97', '46,44', '46,88', '5,03', '2,13', '2,44', '2,56', '2,92', '2,87', '951,19'),
(1995, '2,1', '1,85', '2,3', '3,47', '3,25', '2,89', '2,99', '2,6', '1,94', '1,65', '1,44', '1,34', '31,6207'),
(1996, '1,25', '0,96', '0,81', '0,65', '0,58', '0,6099', '0,5851', '0,6275', '0,662', '0,7419', '0,8146', '0,8717', '9,5551'),
(1997, '0,744', '0,6616', '0,6316', '0,6211', '0,6354', '0,6535', '0,658', '0,627', '0,6474', '0,6553', '1,5334', '1,3085', '9,7849'),
(1998, '1,1459', '0,4461', '0,8995', '0,472', '0,4543', '0,4913', '0,5503', '0,3749', '0,4512', '0,8892', '0,6136', '0,7434', '7,7938'),
(1999, '0,5163', '0,8298', '1,1614', '0,6092', '0,5761', '0,3108', '0,2933', '0,2945', '0,2715', '0,2265', '0,1998', '0,2998', '5,7295'),
(2000, '0,2149', '0,2328', '0,2242', '0,1301', '0,2492', '0,214', '0,1547', '0,2025', '0,1038', '0,1316', '0,1197', '0,0991', '2,0962'),
(2001, '0,1369', '0,0368', '0,1724', '0,1546', '0,1827', '0,1458', '0,2441', '0,3436', '0,1627', '0,2913', '0,1928', '0,1983', '?2,2852'),
(2002, '0,2591', '0,1171', '0,1758', '0,2357', '0,2102', '0,1582', '0,2656', '0,2481', '0,1955', '0,2768', '0,2644', '0,3609', '2,8023'),
(2003, '0,4878', '0,4116', '0,3782', '0,4184', '0,465', '0,4166', '0,5465', '0,4038', '0,3364', '0,3213', '0,1776', '0,1899', '4,6485'),
(2004, '0,128', '0,0458', '0,1778', '0,0874', '0,1546', '0,1761', '0,1952', '0,2005', '0,1728', '0,1108', '0,1146', '0,24', '1,8184'),
(2005, '0,188', '0,0962', '0,2635', '0,2003', '0,2527', '0,2993', '0,2575', '0,3466', '0,2637', '0,21', '0,1929', '0,2269', '2,8335'),
(2006, '0,2326', '0,0725', '0,2073', '0,0855', '0,1888', '0,1937', '0,1751', '0,2436', '0,1521', '0,1875', '0,1282', '0,1522', '2,0377'),
(2007, '0,2189', '0,0721', '0,1876', '0,1272', '0,1689', '0,0954', '0,1469', '0,1466', '0,0352', '0,1142', '0,059', '0,064', '1,4452'),
(2008, '0,101', '0,0243', '0,0409', '0,0955', '0,0736', '0,1146', '0,1914', '0,1574', '0,197', '0,2506', '0,1618', '0,2149', '1,6348'),
(2009, '0,184', '0,0451', '0,1438', '0,0454', '0,0449', '0,0656', '0,1051', '0,0197', '0', '0', '0', '0,0533', '0,709'),
(2010, '0', '0', '0,0792', '0', '0,051', '0,0589', '0,1151', '0,0909', '0,0702', '0,0472', '0,0336', '0,1406', '0,6887'),
(2011, '0,0715', '0,0524', '0,1212', '0,0369', '0,157', '0,1114', '0,1229', '0,2076', '0,1003', '0,062', '0,0645', '0,0937', '1,2079'),
(2012, '0,0864', '0', '0,1068', '0,0227', '0,0468', '0', '0,0144', '0,0123', '0', '0', '0', '0', '0,2897'),
(2013, '0', '0', '0', '0', '0', '0', '0,0209', '0', '0,0079', '0,092', '0,0207', '0,0494', '0,191'),
(2014, '0,1126', '0,0537', '0,0266', '0,0459', '0,0604', '0,0465', '0,1054', '0,0602', '0,0873', '0,1038', '0,0483', '0,1053', '0,8592'),
(2015, '0,0878', '0,0168', '0,1296', '0,1074', '0,1153', '0,1813', '0,2305', '0,1867', '0,192', '0,179', '0,1297', '0,225', '1,7954'),
(2016, '0,132', '0,0957', '0,2168', '0,1304', '0,1533', '0,2043', '0,1621', '0,2545', '0,1575', '-', '-', '-', '1,5166');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
