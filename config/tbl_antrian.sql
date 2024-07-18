-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 11:20 AM
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
-- Database: `db_antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian`
--

CREATE TABLE `tbl_antrian` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `no_antrian` smallint(6) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL,
  `kode_bidang` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_antrian`
--

INSERT INTO `tbl_antrian` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`, `kode_bidang`) VALUES
(83, '2024-06-27', 1, '0', NULL, 1),
(84, '2024-06-27', 1, '0', NULL, 2),
(85, '2024-06-27', 1, '0', NULL, 3),
(86, '2024-06-27', 1, '0', NULL, 6),
(87, '2024-06-27', 1, '0', NULL, 5),
(88, '2024-06-27', 1, '0', NULL, 4),
(89, '2024-07-01', 1, '0', NULL, 1),
(90, '2024-07-01', 2, '0', NULL, 1),
(91, '2024-07-01', 1, '0', NULL, 2),
(92, '2024-07-01', 2, '0', NULL, 2),
(93, '2024-07-01', 1, '0', NULL, 3),
(94, '2024-07-01', 1, '0', NULL, 4),
(95, '2024-07-01', 1, '0', NULL, 5),
(96, '2024-07-01', 1, '0', NULL, 6),
(97, '2024-07-01', 2, '0', NULL, 5),
(98, '2024-07-02', 1, '1', '2024-07-02 14:27:20', 2),
(99, '2024-07-02', 1, '1', '2024-07-02 14:27:01', 3),
(100, '2024-07-02', 1, '1', '2024-07-02 14:25:21', 1),
(101, '2024-07-02', 1, '1', '2024-07-02 14:26:30', 4),
(102, '2024-07-02', 1, '1', '2024-07-02 14:26:45', 5),
(103, '2024-07-02', 1, '1', '2024-07-02 14:26:19', 6),
(104, '2024-07-05', 1, '0', NULL, 1),
(105, '2024-07-05', 1, '0', NULL, 3),
(106, '2024-07-05', 1, '0', NULL, 2),
(107, '2024-07-05', 1, '0', NULL, 4),
(108, '2024-07-05', 1, '0', NULL, 6),
(109, '2024-07-05', 1, '0', NULL, 5),
(110, '2024-07-05', 2, '0', NULL, 4),
(111, '2024-07-05', 2, '0', NULL, 5),
(112, '2024-07-05', 3, '0', NULL, 5),
(113, '2024-07-05', 4, '0', NULL, 5),
(114, '2024-07-05', 2, '0', NULL, 3),
(115, '2024-07-05', 3, '0', NULL, 3),
(116, '2024-07-05', 4, '0', NULL, 3),
(117, '2024-07-05', 5, '0', NULL, 3),
(118, '2024-07-05', 6, '0', NULL, 3),
(119, '2024-07-05', 2, '0', NULL, 2),
(120, '2024-07-05', 3, '0', NULL, 2),
(121, '2024-07-05', 4, '0', NULL, 2),
(122, '2024-07-05', 2, '0', NULL, 1),
(123, '2024-07-05', 3, '0', NULL, 1),
(124, '2024-07-05', 4, '0', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
