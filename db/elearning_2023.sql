-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2023 pada 14.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `elearning_2023`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id` int(11) NOT NULL,
  `kode_pelajaran` varchar(100) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `update_oleh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id`, `kode_pelajaran`, `hari`, `jam_mulai`, `jam_selesai`, `tgl_dibuat`, `dibuat_oleh`, `tgl_update`, `update_oleh`) VALUES
(1, '00003', 'Senin', '09:00:00', '11:05:00', '2023-08-05', 'Admin', '2023-08-05', 'Admin'),
(2, '00001', 'Senin', '08:00:00', '09:05:00', '2023-08-05', 'Admin', '2023-08-05', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, '10'),
(4, '11'),
(6, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode` char(5) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `update_oleh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode`, `pelajaran`, `kelas_id`, `tgl_dibuat`, `dibuat_oleh`, `tgl_update`, `update_oleh`) VALUES
('00001', 'Bahasa Indonesia', 1, '2023-08-05', 'Admin', NULL, NULL),
('00002', 'Bahasa Inggris', 4, '2023-08-05', 'Admin', NULL, NULL),
('00003', 'Matematika I', 1, '2023-08-05', 'Admin', NULL, NULL),
('00004', 'Matematika II', 4, '2023-08-05', 'Admin', NULL, NULL),
('00005', 'Bahasa Indonesia II', 4, '2023-08-05', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pembahasan` text NOT NULL,
  `tanggal` date NOT NULL,
  `file` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `kode_pelajaran` char(5) NOT NULL,
  `pertemuan_id` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `tgl_update` date NOT NULL,
  `update_oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nomo_siswa` char(20) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `nilai` double DEFAULT NULL,
  `tgl_update` date NOT NULL,
  `update_oleh` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Murid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `kode_pelajaran` char(5) NOT NULL,
  `tugas` varchar(56) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kelas_id` char(20) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `update_oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nomor_identitas` char(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kel` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `agama` varchar(30) NOT NULL,
  `kelas_id` char(5) DEFAULT NULL,
  `mapel_id` char(5) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gambar` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nomor_identitas`, `nama`, `jenis_kel`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `alamat`, `agama`, `kelas_id`, `mapel_id`, `email`, `password`, `gambar`, `status`, `role_id`, `tgl_dibuat`) VALUES
('', 'Admin', 'L', '', '0000-00-00', '087897551129', NULL, '', NULL, NULL, 'admin@gmail.com', '$2y$10$JWGHtWc6E92vPd50F/e24e8DzXJTKN7t9DlBN6pb6E6Gilgm/m6gW', NULL, 1, 1, '2023-07-29'),
('IDS2307290002', 'Melisa ar', 'P', 'Jakarta, Indonesia', '2001-07-29', '087897551129', 'Jakarta, Indonesia', 'Islam', '1', '', 'mel@gmail.com', '111111', '', 1, 3, '2023-07-29'),
('IDS2308050003', 'Erna lalajo erna', 'P', 'Tangerang Banten', '2006-08-05', '08987654321', 'Tangerang Banten', 'Islam', '1', '', 'erna@gmail.com', '111111', NULL, 1, 3, '2023-08-05'),
('IDS2308050004', 'rudo roudo', 'L', 'Jakarta, Indonesia', '2007-12-11', '08299900000', 'Tangerang Banten', 'Islam', '2', '', 'rudo@gmail.com', '111111', '', 1, 3, '2023-08-05'),
('IDS2308050005', 'Yusuf Aryadilla', 'L', '', '2023-08-05', '', 'Tangerang Banten', '', '2', '', 'arya', '111111', '', 1, 3, '2023-08-05'),
('IDT2307290002', 'Pak Pense', 'L', 'Tangerang Banten', '1998-07-29', '08999999990', 'Jakarta, Indonesia', 'Islam', '', '00001', 'pens@gmail.com', '111111', '', 1, 2, '0000-00-00'),
('IDT2308050003', 'Yusuf Aryadilla', 'L', '', '2023-08-05', '', 'Tangerang Banten', '', '', '', 'aryaherby29nov2k@gmail.com', '111111', '', 1, 2, '2023-08-05'),
('IDT2308050004', 'Yas yaaaa', 'L', '', '2023-08-05', '08122346789', 'Tangerang Banten', '', '', '00003', 'yas@gmail.com', '111111', NULL, 1, 2, '2023-08-05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nomor_identitas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
