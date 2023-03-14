-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 02:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'x rpl 1', 'rekayasa perangkat lunak dan gim'),
(2, 'x rpl 2', 'rekayasa perangkat lunak dan gim'),
(3, 'xi rpl 1', 'rekayasa perangkat lunak dan gim'),
(4, 'xi rpl 2', 'rekayasa perangkat lunak dan gim'),
(5, 'xii rpl 1', 'rekayasa perangkat lunak dan gim'),
(6, 'xii rpl 2', 'rekayasa perangkat lunak dan gim'),
(7, 'x bdp 1', 'pemasaran'),
(8, 'x bdp 2', 'pemasaran'),
(9, 'xi bdp 1', 'pemasaran'),
(10, 'xi bdp 2', 'pemasaran'),
(11, 'xii bdp 1', 'pemasaran'),
(12, 'xii bdp 2', 'pemasaran'),
(13, 'x aphp', 'teknologi pengolahan hasl pertanian'),
(14, 'xi aphp', 'teknologi pengolahan hasl pertanian'),
(15, 'xii aphp', 'teknologi pengolahan hasl pertanian'),
(16, 'x tkro', 'teknik otomotif'),
(17, 'xi tkro', 'teknik otomotif'),
(18, 'xii tkro', 'teknik otomotif');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `tgl_bayar` date NOT NULL DEFAULT '0000-00-00',
  `bulan_bayar` varchar(10) DEFAULT NULL,
  `tahun_bayar` varchar(4) DEFAULT NULL,
  `id_spp` int(11) DEFAULT NULL,
  `jumlah_bayar_1` int(11) DEFAULT NULL,
  `jumlah_bayar_2` int(11) DEFAULT NULL,
  `jumlah_bayar_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_bayar`, `tahun_bayar`, `id_spp`, `jumlah_bayar_1`, `jumlah_bayar_2`, `jumlah_bayar_3`) VALUES
(1, 1, '0044160145', '2023-07-07', 'Maret', '2023', 2, 200000, 200000, NULL),
(2, 23001, '0044160145', '2023-03-14', 'Juni', '2023', 2, 7000, NULL, NULL),
(3, 23001, '0052565030', '2023-03-14', 'April', '2023', 2, 300000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(23001, 'jay', '123', 'p ujay', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(10) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama_siswa`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('0044160145', '212210016', 'LUTFI NURDIN MUHLIS', 16, 'cijati', '0867', 1),
('0047059844', '212210012', 'GIGIN SEPTIAR', 17, 'cijati', '0863', 1),
('0051889833', '212210017', 'LUTVINA RIZKI', 4, 'cijati', '0868', 1),
('0052199352', '212210027', 'RAPLI PERMANA', 8, 'cijati', '0878', 1),
('0052565030', '212210024', 'PALAH', 6, 'cijati', '0875', 1),
('0052687420', '212210015', 'ILHAM MAULANA', 3, 'cijati', '0866', 1),
('0054673624', '212210002', 'AGUS HUDA', 1, 'cijati', '0853', 1),
('0055544560', '212210001', 'ADAM R', 1, 'cijati', '0852', 1),
('0057660654', '212210028', 'RISMAYA', 8, 'cijati', '0879', 1),
('0061087481', '212210019', 'MAYASARI', 15, 'cijati', '0870', 1),
('0061607805', '212210022', 'NAZMA HUSNAENI', 5, 'cijati', '0873', 1),
('0061956960', '212210020', 'MIRAWATI', 5, 'cijati', '0871', 1),
('0061961758', '212210029', 'RIZAL PANGESTU', 9, 'cijati', '0880', 1),
('0062072365', '212210026', 'RAHMAT', 7, 'cijati', '0877', 1),
('0062570533', '212210013', 'HENDRA', 17, 'cijati', '0864', 1),
('0063278883', '212210021', 'NASRIL ILHAM JUNAEDI', 5, 'cijati', '0872', 1),
('0063357946', '212210004', 'DEA SRI WULANDARI', 1, 'cijati', '0855', 1),
('0063512389', '212210025', 'RAHMA NOPITA', 7, 'cijati', '0876', 1),
('0064417565', '212210006', 'DEDE SADIAH LINDARI', 1, 'cijati', '0857', 1),
('0064903263', '212210009', 'DEWI RESTI', 2, 'cijati', '0860', 1),
('0064913407', '212210030', 'RIZKI ILHAM MAULANA', 10, 'cijati', '0881', 1),
('0065364766', '212210034', 'SUCI SAFITRI', 14, 'cijati', '0885', 1),
('0065672636', '212210007', 'DEWI ANJANI', 1, 'cijati', '0858', 1),
('0065880157', '212210031', 'SALWA MEILANI', 11, 'cijati', '0882', 1),
('0065889775', '212210014', 'HERISA OKTARIANE ROSANI', 3, 'cijati', '0865', 1),
('0065928592', '212210011', 'FIRDA RIZKIANI', 2, 'cijati', '0862', 1),
('0066003317', '212210003', 'AI RAHMAWATI', 1, 'cijati', '0854', 1),
('0066150478', '212210033', 'SITI FERA AMELIAH', 13, 'cijati', '0884', 1),
('0068473736', '212210032', 'SANDI AROHMAN', 12, 'cijati', '0883', 1),
('0069302446', '212210005', 'DEBI SUPRILIANTI', 1, 'cijati', '0856', 1),
('0071772633', '212210018', 'MARWA WARDAH', 4, 'cijati', '0869', 1),
('0071972405', '212210035', 'ZAHRA NABILATUN NISA', 15, 'cijati', '0886', 1),
('0073277147', '212210023', 'NURTANIA', 6, 'cijati', '0874', 1),
('0077445895', '212210010', 'DINA RAIHANA', 2, 'cijati', '0861', 1),
('3067461895', '212210008', 'DEWI RAHMI', 2, 'cijati', '0859', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2022, 600000),
(2, 2023, 600000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
