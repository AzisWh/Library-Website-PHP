-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2023 pada 05.16
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kat` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kat`, `nama_kategori`) VALUES
(8, 'a'),
(9, 'b'),
(10, 'c'),
(11, 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `NamaDepan` varchar(100) NOT NULL,
  `NamaBelakang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `NamaDepan`, `NamaBelakang`, `email`, `password`) VALUES
(1, 'dea', 'giraldi', 'dea@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'azis', 'aw', 'azis@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'amel', '', 'amalia@gmail.com', 'e9407be6fcd8601f0ee39fd4756618dc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `buku_penulis` varchar(200) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `buku_cover` varchar(200) NOT NULL,
  `deskripsi_buku` varchar(200) NOT NULL,
  `isbn_buku` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul_buku`, `id_kat`, `buku_penulis`, `tahun_terbit`, `buku_cover`, `deskripsi_buku`, `isbn_buku`, `status`) VALUES
(17, 'buku kak riki', 8, 'diagirald', 2001, 'Ricky.png', 'Hak Kekayaan Intelektual (HKI) adalah hak-hak yang berhubungan dengan hasil penemuan dan kreativitas seseorang atau suatu kelompok, yang berkaitan dengan perlindungan permasalahan reputasi dalam', '1234-2313-666', 'Available'),
(19, 'laut bercerita', 8, 'leila chudori', 2018, 'Screenshot 2023-03-05 000405.png', 'cerita ', '456-765-779', 'Available'),
(20, 'bukan buku biasa', 11, 'diagirald', 2009, 'Margareta Valencia.png', 'Dengan penambahan validasi strtotime, Anda memastikan bahwa tanggal yang dimasukkan memiliki format yang valid. Jika tidak valid, skrip akan mengatur tanggal ke default (tanggal hari ini).', '1234-2313-145', 'Available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `email`, `password`, `timestamp`, `nama_user`) VALUES
(15, 'gira@gmail.com', '$2y$10$cDaqo2gNBRqZToLD0L1ZlOY46CoFg2/l.eD9m3ZJMi5xmkhgLHFaa', '2023-11-21 11:05:39', 'reza arap'),
(19, 'mansyuraw24@gmail.com', '$2y$10$1xIzi779ppiHhYkML5rCsuzj0LJ62rTCBM0cfjAGPLb01GQzJPOF2', '2023-11-25 10:37:36', 'mansur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `usrdata_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `namadepan` varchar(200) NOT NULL,
  `namabelakang` varchar(200) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `NIM` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`usrdata_id`, `userid`, `namadepan`, `namabelakang`, `prodi`, `mobile`, `NIM`) VALUES
(2, 15, 'HIBATUL', 'WIHASTO', 'teknik kapal', '0812345', 'a1113876'),
(5, 19, 'ea', 'owi', 'teknik kapal', '0812123123', 'a111321');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`usrdata_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `usrdata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
