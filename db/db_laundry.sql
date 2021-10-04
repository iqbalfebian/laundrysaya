-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 04 Okt 2021 pada 09.22
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keluar`
--

DROP TABLE IF EXISTS `laporan_keluar`;
CREATE TABLE IF NOT EXISTS `laporan_keluar` (
  `id_laporan` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian` varchar(200) NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_order`
--

DROP TABLE IF EXISTS `laporan_order`;
CREATE TABLE IF NOT EXISTS `laporan_order` (
  `id_laporan` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

DROP TABLE IF EXISTS `orderan`;
CREATE TABLE IF NOT EXISTS `orderan` (
  `id_order` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_paket` int(10) UNSIGNED NOT NULL,
  `berat` int(10) UNSIGNED DEFAULT NULL,
  `total` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

DROP TABLE IF EXISTS `paket`;
CREATE TABLE IF NOT EXISTS `paket` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `name`, `price`) VALUES
(1, 'Paket Hemat', 5000),
(2, 'Paket Express', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `nama_app` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`nama_app`, `logo`, `alamat`, `email`) VALUES
('Toko Laundry 98', 'uploaded-img-2021-10-04.png', 'Ds. Bintang Alam blok E2 no.09 RT33 RW11, Kec. Telukjambe Timur, Kab. Karawang', 'laundry99@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Karyawan'),
(2, 'Customer'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
(1, 'menunggu karyawan'),
(2, 'sedang dirposes'),
(3, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_FK_1` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
