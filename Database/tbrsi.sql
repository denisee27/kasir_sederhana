-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2021 pada 17.02
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbrsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_barang`) VALUES
('KT15', 'Ketoprak', 15000),
('MG8', 'Mie Goreng ', 8000),
('MK10', 'Mie Kuah', 10000),
('NG12', 'Nasi Goreng ', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_trans`
--

CREATE TABLE `detail_trans` (
  `id` int(11) NOT NULL,
  `kode_orderan` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_trans`
--

INSERT INTO `detail_trans` (`id`, `kode_orderan`, `tanggal`, `kode_barang`, `nama_barang`, `qty`, `subtotal`) VALUES
(1, 8, '2021-06-10', 'KT15', 'Ketoprak', 12, 180000),
(2, 8, '2021-06-10', 'MK10', 'Mie Kuah', 12, 120000),
(3, 9, '2021-06-10', 'KT15', 'Ketoprak', 12, 180000),
(4, 9, '2021-06-10', 'MK10', 'Mie Kuah', 12, 120000),
(5, 10, '2021-06-10', 'MG8', 'Mie Goreng ', 90, 720000),
(6, 10, '2021-06-10', 'MK10', 'Mie Kuah', 88, 880000),
(7, 11, '2021-06-10', 'MK10', 'Mie Kuah', 10, 100000),
(8, 11, '2021-06-10', 'KT15', 'Ketoprak', 1, 15000),
(9, 11, '2021-06-10', 'MG8', 'Mie Goreng ', 1, 8000),
(10, 12, '0000-00-00', 'MK10', 'Mie Kuah', 11, 110000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_orderan` int(10) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `inv_id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_orderan`, `tanggal`, `inv_id`, `nama`, `alamat`, `telepon`, `total`) VALUES
(1, '2021-05-20 23:05:18', '', '', '', '', 100000),
(2, '2021-05-20 23:22:35', '', '', '', '', 100000),
(3, '2021-05-20 23:22:35', '', '', '', '', 100000),
(4, '0000-00-00 00:00:00', '', '.cobasatu.', 'coba coba', '1233234', 300000),
(5, '0000-00-00 00:00:00', '', 'asd', 'asdasd', '123123', 300000),
(6, '0000-00-00 00:00:00', '', 'asd', 'SDSA', '2313', 300000),
(7, '0000-00-00 00:00:00', '', 'asdasd', 'asdsad', '2131313', 300000),
(8, '0000-00-00 00:00:00', '', 'qweqwewqe', 'qweqwe', '234234324', 300000),
(9, '0000-00-00 00:00:00', '', 'aku ya aku', 'test', '123123', 300000),
(10, '0000-00-00 00:00:00', '', 'cobasatu', 'qwew', '90909090', 1600000),
(11, '0000-00-00 00:00:00', '', '', '', '', 150000),
(12, '0000-00-00 00:00:00', '', '', '', '', 110000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `detail_trans`
--
ALTER TABLE `detail_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_orderan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_trans`
--
ALTER TABLE `detail_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_orderan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
