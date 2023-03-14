-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2022 pada 03.08
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsite`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Diamond Mobile Legend', '86 + 5 Diamond', 'Diamond', 18000, 98, 'diamond.png'),
(2, 'Diamond Mobile Legend', '168 + 5 Diamond', 'Diamond', 36000, 249, 'diamond.png'),
(3, 'Diamond Mobile Legend', '250 + 7 Diamond ', 'Diamond', 54000, 629, 'diamond.png'),
(19, 'UC PUBG', '150 UC', 'UC', 20000, 30, 'pubg-uc.png'),
(20, 'UC PUBG', '300 UC', 'UC', 35000, 46, 'dm-ff.png'),
(21, 'UC PUBG', '450 UC', 'UC', 35000, 19, 'pubg-uc.png'),
(22, 'UC PUBG', '660 UC', 'UC', 50000, 10, 'pubg-uc.png'),
(26, 'Diamond FF', '83 Diamond', 'Diamond FF', 50000, 245, 'dm-ff1.png'),
(27, 'Diamond FF', '86 + 3 Diamond', 'Diamond FF', 69000, 189, 'dm-ff2.png'),
(28, 'Diamond FF', '86 + 3 Diamond', 'Diamond FF', 69000, 189, 'dm-ff3.png'),
(29, 'Diamond FF', '250 + 7 Diamond ', 'Diamond FF', 119000, 133, 'dm-ff5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_game` varchar(255) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `nama`, `id_game`, `tgl_pesan`, `batas_bayar`) VALUES
(2, 'test', '213124252', '2022-12-11 19:21:53', '2022-12-12 19:21:53'),
(3, 'test', '2019283122', '2022-12-12 16:37:42', '2022-12-13 16:37:42'),
(22, 'pelanggan', '2352532', '2022-12-20 12:15:38', '2022-12-21 12:15:38'),
(23, 'Sutan', '8334', '2022-12-21 14:07:55', '2022-12-22 14:07:55'),
(24, 'heri', '1234567', '2022-12-22 08:31:17', '2022-12-23 08:31:17'),
(25, 'testing', '8433', '2022-12-22 08:37:45', '2022-12-23 08:37:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_invoice`, `id`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 2, 1, 'Diamond Mobile Legend', 1, 18000, ''),
(2, 3, 3, 'Diamond Mobile Legend', 1, 54000, ''),
(13, 22, 3, 'Diamond Mobile Legend', 1, 54000, ''),
(14, 23, 21, 'UC PUBG', 1, 35000, ''),
(15, 24, 1, 'Diamond Mobile Legend', 1, 18000, ''),
(16, 25, 2, 'Diamond Mobile Legend', 1, 36000, '');

--
-- Trigger `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok-NEW.jumlah
    WHERE id = NEW.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'testing', 'testing@gmail.com', 'default.jpg', '$2y$10$ApXTFmEdVbNOBU2zVefSceCHPiSt8IWTqYUKML17E096ltzp9f90q', 2, 1, 1669894736),
(4, 'tester', 'tester@gmail.com', 'default.jpg', '$2y$10$I2aUy2Y0MNtN85O2abNdX.oDgi8Fe8vOhdfLtMHeNrA1Z4zLnjPgW', 2, 1, 1669894966),
(5, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$ApXTFmEdVbNOBU2zVefSceCHPiSt8IWTqYUKML17E096ltzp9f90q', 1, 1, 1669902720),
(6, 'coba', 'coba@gmail.com', 'default.jpg', '$2y$10$n5cAgSNqB7fJPL4CR28xfeIQKRmQacklBayS4eBcY5ui.nuO29bbu', 2, 1, 1671099154),
(7, 'coba1', 'coba1@gmail.com', 'default.jpg', '$2y$10$OSVFg3VnDX.J029T7Y06y.rcdUUGSHlAvjIA0TNgAhIlYBX2yTTM.', 2, 1, 1671274147),
(8, 'sultan', 'sultan123@gmail.com', 'default.jpg', '$2y$10$0JejEo2cFHzux2zCPPmSUeu/6V2n4juyt9lD9X6AKaGzAXz8tIY0K', 2, 1, 1671360859),
(9, 'heri', 'heri@gmail.com', 'default.jpg', '$2y$10$kLFCwnkt3/XCG3T2y8pfeOY3aI3qVIarx/MTdkH6jNJaCVAtrPROW', 2, 1, 1671672416);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(4, 1, 'Data Barang', 'admin/databarang', 'fas fa-fw fa-gem', 1),
(5, 1, 'Invoice', 'admin/invoice', 'fas fa-fw fa-receipt', 1),
(6, 2, 'Home', 'user', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
