-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2026 pada 07.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2526_24db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `2526_24`
--

CREATE TABLE `2526_24` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `2526_24`
--

INSERT INTO `2526_24` (`id`, `username`, `password`, `role`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `jurusan`) VALUES
(14, 'admin', '123', 'admin', 'admin utama', '2026-05-25', 'disini', 'Perempuan', 'TJKT'),
(21, 'mita', '123', 'siswa', 'mita sugiarti', '2008-10-03', 'mekarsari', 'Perempuan', 'TJKT'),
(22, 'sisy', '123', 'siswa', 'sisy juliasari', '2009-07-27', 'jelekong\r\n', 'Perempuan', 'TJKT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `2526_24`
--
ALTER TABLE `2526_24`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `2526_24`
--
ALTER TABLE `2526_24`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
