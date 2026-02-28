-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2026 at 01:16 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `sub_judul` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `isi_berita` text,
  `dokumentasi` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `sub_judul`, `kategori`, `thumbnail`, `isi_berita`, `dokumentasi`, `tanggal`) VALUES
(4, '“Let’s Talk About Low Vision”', 'Kuliah umum bersama Dr. Karin Van Dijk', 'Low Vision', '20022026124900.png', 'Kegiatan “Let’s Talk About Low Vision” telah terlaksana dengan baik 👁✨\r\nKuliah umum bersama Dr. Karin Van Dijk membahas bagaimana membantu orang dengan penglihatan terbatas agar tetap bisa beraktivitas lebih mandiri melalui penanganan dan pendampingan yang tepat.\r\nTerima kasih kepada seluruh pihak yang telah berpartisipasi. Semoga ilmu yang dibagikan bermanfaat dan semakin meningkatkan kepedulian terhadap kesehatan mata', 'Humas', '2026-02-20 12:49:00'),
(5, '\"Apa Itu Low Vision?\"', 'Pengabdian Masyarakat Bersama Alumni FKUB', 'Kisah Inspiratif', '21022026043433.png', 'Pengabdian kami pada masyarakat bersama alumni fkub', 'Humas', '2026-02-21 04:34:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
