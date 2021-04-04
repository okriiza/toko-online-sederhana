-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2020 pada 13.07
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakaianku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `created`, `updated`) VALUES
(1, 'okriiza', 'okriiza', 'd4991725ef1475936fca32d91beea249', '2020-07-09 22:42:28', '2020-07-09 22:42:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`, `created`, `updated`) VALUES
(1, 'Bandung', 10000, '2020-07-12 01:01:22', '2020-07-12 01:01:22'),
(2, 'Jakarta', 15000, '2020-07-12 01:01:22', '2020-07-12 01:01:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`, `created`, `updated`) VALUES
(1, 1, 'Okriiza', 'BRI', 1460000, '2020-07-11', '200711230820bayar.jpg', '2020-07-12 04:08:20', '2020-07-12 04:08:20'),
(2, 4, 'Okriiza', 'BRI', 550000, '2020-07-27', '200727185615bayar.jpg', '2020-07-27 23:56:15', '2020-07-27 23:56:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `created`, `updated`) VALUES
(1, 15, 1, '2020-07-11', 1460000, 'Bandung', 10000, 'kocak gaming alamat', 'barang dikirim', 'asfs346we32', '2020-07-12 02:21:25', '2020-07-12 04:17:04'),
(3, 15, 2, '2020-07-11', 765000, 'Jakarta', 15000, 'sadasfasfas', 'Pending', '', '2020-07-12 04:37:08', '2020-07-12 04:37:08'),
(4, 20, 1, '2020-07-27', 550000, 'Bandung', 10000, '', 'barang dikirim', 'fgjh3451', '2020-07-27 23:54:53', '2020-07-27 23:58:21'),
(5, 20, 1, '2020-07-28', 250000, 'Bandung', 10000, 'testing', 'Pending', '', '2020-07-28 18:46:23', '2020-07-28 18:46:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`, `created`, `updated`) VALUES
(1, 1, 10, 4, 'Baju Muslimah Limited ', 250000, 500, 2000, 1000000, '2020-07-12 02:21:25', '2020-07-12 02:21:25'),
(2, 1, 6, 3, 'Baju Pria Populer', 150000, 500, 1500, 450000, '2020-07-12 02:21:25', '2020-07-12 02:21:25'),
(3, 3, 10, 3, 'Baju Muslimah Limited ', 250000, 500, 1500, 750000, '2020-07-12 04:37:08', '2020-07-12 04:37:08'),
(4, 4, 11, 2, 'Baju Wanita Terbaru', 120000, 500, 1000, 240000, '2020-07-27 23:54:53', '2020-07-27 23:54:53'),
(5, 4, 6, 2, 'Baju Pria Populer', 150000, 500, 1000, 300000, '2020-07-27 23:54:53', '2020-07-27 23:54:53'),
(6, 5, 11, 2, 'Baju Wanita Terbaru', 120000, 500, 1000, 240000, '2020-07-28 18:46:23', '2020-07-28 18:46:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `created`, `updated`) VALUES
(6, 'Baju Pria Populer ', 150000, 500, 'product2.jpeg', '<p>Baju Pria Populer Terbaru nyaman di pakai</p>', 50, '2020-07-11 00:46:38', '2020-07-28 00:00:08'),
(7, 'Baju Wanita Terbaru', 150000, 500, 'w1.jpeg', '<p>Baju wanita Terbaru nyaman Di pakai&nbsp;</p>', 100, '2020-07-11 14:15:53', '2020-07-11 14:15:53'),
(8, 'Baju Wanita Limited', 200000, 498, 'w5.jpeg', '<p>Baju wanita limited Edition terbaru nyaman di pakai</p>', 100, '2020-07-11 14:16:57', '2020-07-11 14:16:57'),
(9, 'Baju Muslimah Terbaru', 200000, 500, 'h1.jpg', '<p>Baju wanita muslimah populer nyaman di pakai</p>', 100, '2020-07-11 14:17:59', '2020-07-11 14:46:54'),
(10, 'Baju Muslimah Limited ', 250000, 500, 'h4.jpg', '<p>Baju wanita limited nyaman di pakai</p>', 93, '2020-07-11 14:18:54', '2020-07-12 04:37:08'),
(11, 'Baju Wanita Terbaru', 120000, 500, 'h8.jpg', '<p>Baju Wanita Terbaru Nyaman Di Pakai</p>', 96, '2020-07-11 14:20:08', '2020-07-28 18:46:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`, `created`, `updated`) VALUES
(1, 6, 'product2.jpeg', '2020-07-11 00:46:38', '2020-07-11 00:46:38'),
(2, 6, 'product.jpeg', '2020-07-11 00:46:38', '2020-07-11 00:46:38'),
(4, 6, 'product1.jpeg', '2020-07-11 00:46:38', '2020-07-11 00:46:38'),
(5, 6, '20200711091249product3.jpeg', '2020-07-11 14:12:49', '2020-07-11 14:12:49'),
(6, 7, 'w1.jpeg', '2020-07-11 14:15:53', '2020-07-11 14:15:53'),
(7, 7, 'w2.jpeg', '2020-07-11 14:15:53', '2020-07-11 14:15:53'),
(8, 7, 'w3.jpeg', '2020-07-11 14:15:53', '2020-07-11 14:15:53'),
(9, 7, 'w4.jpeg', '2020-07-11 14:15:53', '2020-07-11 14:15:53'),
(10, 8, 'w5.jpeg', '2020-07-11 14:16:57', '2020-07-11 14:16:57'),
(11, 8, 'w6.jpeg', '2020-07-11 14:16:57', '2020-07-11 14:16:57'),
(12, 8, 'w7.jpeg', '2020-07-11 14:16:57', '2020-07-11 14:16:57'),
(13, 8, 'w8.jpeg', '2020-07-11 14:16:57', '2020-07-11 14:16:57'),
(14, 9, 'h1.jpg', '2020-07-11 14:17:59', '2020-07-11 14:17:59'),
(15, 9, 'h2.jpg', '2020-07-11 14:17:59', '2020-07-11 14:17:59'),
(16, 9, 'h3.jpg', '2020-07-11 14:17:59', '2020-07-11 14:17:59'),
(17, 10, 'h4.jpg', '2020-07-11 14:18:54', '2020-07-11 14:18:54'),
(18, 10, 'h5.jpg', '2020-07-11 14:18:54', '2020-07-11 14:18:54'),
(19, 10, 'h6.jpg', '2020-07-11 14:18:54', '2020-07-11 14:18:54'),
(20, 10, 'h7.jpg', '2020-07-11 14:18:54', '2020-07-11 14:18:54'),
(21, 11, 'h8.jpg', '2020-07-11 14:20:08', '2020-07-11 14:20:08'),
(22, 11, 'h9.jpg', '2020-07-11 14:20:08', '2020-07-11 14:20:08'),
(23, 11, 'h10.jpg', '2020-07-11 14:20:08', '2020-07-11 14:20:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama`, `email`, `no_hp`, `token`, `aktif`, `created`, `updated`) VALUES
(20, 'okriiza', 'd4991725ef1475936fca32d91beea249', 'okriiza', 'okriizaa@gmail.com', '08924235115', '1bd388c7346bbb66514a5525638f920551bb430e1424b3910142b6d6026c183e', '1', '2020-07-27 23:52:58', '2020-07-27 23:53:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
