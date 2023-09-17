-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2023 pada 15.16
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
(1, 'Diamond Mobile Legend', '86 + 5 Diamond', 'Diamond', 18000, 96, 'diamond.png'),
(2, 'Diamond Mobile Legend', '168 + 5 Diamond', 'Diamond', 36000, 248, 'diamond.png'),
(3, 'Diamond Mobile Legend', '250 + 7 Diamond ', 'Diamond', 54000, 629, 'diamond.png'),
(19, 'UC PUBG', '150 UC', 'UC', 20000, 30, 'pubg-uc.png'),
(20, 'UC PUBG', '300 UC', 'UC', 35000, 45, 'dm-ff.png'),
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
(27, 'testing', '123456', '2023-09-04 08:41:04', '2023-09-05 08:41:04'),
(28, 'testing', '123456', '2023-09-07 19:57:11', '2023-09-08 19:57:11'),
(29, 'tester', '123456', '2023-09-07 20:01:46', '2023-09-08 20:01:46');

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
  `pilihan` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_invoice`, `id`, `nama_barang`, `jumlah`, `harga`, `pilihan`, `status`, `email`) VALUES
(1, 2, 1, 'Diamond Mobile Legend', 1, 18000, '', 1, 'testing@gmail.com'),
(18, 27, 1, 'Diamond Mobile Legend', 1, 18000, '', 1, ''),
(19, 28, 2, 'Diamond Mobile Legend', 1, 36000, '', 0, 'testing@gmail.com'),
(20, 29, 20, 'UC PUBG', 1, 35000, '', 1, 'tester@gmail.com');

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
  `no_wa` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_wa`, `image`, `password`, `pin`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'testing', 'testing@gmail.com', '', 'default.jpg', '$2y$10$2BxIZGlSnrhYL8T1Ps/FRuhClHutiqXsYDc7Ijrr1dVqEawLuypXO', '', 2, 1, 1669894736),
(4, 'tester', 'tester@gmail.com', '08999999999', 'default.jpg', '$2y$10$aGdO/4NIVMmmzlYW8A4ra.NEFu4KXs/SgmKQ3F8FC.EXY.amMXha2', '$2y$10', 2, 1, 1669894966),
(5, 'admin', 'admin@gmail.com', '', 'default.jpg', '$2y$10$JneTAZJcBcuQDLg2hjT8sO/kFbIyjky2ObZI7fmET8uX3ayDwK0mK', '', 1, 1, 1669902720),
(7, 'coba', 'coba@gmail.com', '083145678910', 'default.jpg', '$2y$10$10.UsbHil6D1Pk18lad60.cnMCqSwuKxRkTR3e7ihxQTKVb6J3P4W', '$2y$10', 2, 1, 1671274147),
(8, 'sultan', 'sultan123@gmail.com', '', 'default.jpg', '$2y$10$0JejEo2cFHzux2zCPPmSUeu/6V2n4juyt9lD9X6AKaGzAXz8tIY0K', '', 2, 1, 1671360859),
(9, 'heri', 'heri@gmail.com', '08123456789', 'default.jpg', '$2y$10$kLFCwnkt3/XCG3T2y8pfeOY3aI3qVIarx/MTdkH6jNJaCVAtrPROW', '123456', 2, 1, 1671672416),
(10, 'aw', 'aw@gmail.com', '0812131451213', 'default.jpg', '$2y$10$iYv6GcR4E9LacU4S8RUtbuHvhUmjngLTgG8z9aq7ph3zMyldmrZ5.', '$2y$10', 2, 1, 1693189161),
(13, 'Samsul', 'samsul@gmail.com', '089812345888', 'default.jpg', '$2y$10$9PTFx70CT7HtBNQJMMW4fenePrrwvexXY9NZ2ycs4F0P6pyhF1unW', '$2y$10', 2, 1, 1693273193),
(14, 'test2', 'test2@gmail.com', '', 'default.jpg', '$2y$10$F062NjByx5h59r1PrJqqNONJ2ZUtz1jpYQ45PGUK250Fv6Ibb3iry', '$2y$10', 2, 1, 1693874969);

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
(6, 2, 'Home', 'user', '', 1),
(7, 1, 'Data User', 'admin/datauser', 'fas fa-users', 1);

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
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
