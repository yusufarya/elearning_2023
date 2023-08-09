-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2023 pada 17.58
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `semester` char(2) DEFAULT '01',
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

INSERT INTO `jadwal_pelajaran` (`id`, `kode_pelajaran`, `semester`, `hari`, `jam_mulai`, `jam_selesai`, `tgl_dibuat`, `dibuat_oleh`, `tgl_update`, `update_oleh`) VALUES
(1, '00003', '01', 'Senin', '09:00:00', '11:05:00', '2023-08-05', 'Admin', '2023-08-05', 'Admin'),
(2, '00001', '01', 'Senin', '08:00:00', '09:05:00', '2023-08-05', 'Admin', '2023-08-05', 'Admin'),
(6, '00008', '01', 'Selasa', '09:00:00', '10:05:00', '2023-08-08', 'Admin', '2023-08-08', 'Admin'),
(7, '00006', '01', 'Selasa', '08:00:00', '09:05:00', '2023-08-08', 'Admin', NULL, NULL),
(8, '00010', '01', 'Rabu', '08:00:00', '09:05:00', '2023-08-09', 'Pak Pense', NULL, NULL);

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
('00002', 'Bahasa Inggris 2', 4, '2023-08-05', 'Admin', NULL, NULL),
('00003', 'Matematika I', 1, '2023-08-05', 'Admin', NULL, NULL),
('00004', 'Matematika II', 4, '2023-08-05', 'Admin', NULL, NULL),
('00005', 'Bahasa Indonesia II', 4, '2023-08-05', 'Admin', NULL, NULL),
('00006', 'Penjaskes 1', 1, '2023-08-08', 'Admin', NULL, NULL),
('00007', 'Penjaskes 2', 4, '2023-08-08', 'Admin', NULL, NULL),
('00008', 'Bahasa Inggris', 1, '2023-08-08', 'Admin', NULL, NULL),
('00009', 'Sejarah', 1, '2023-08-09', 'Pak Pense', NULL, NULL),
('00010', 'Sosiologi', 1, '2023-08-09', 'Pak Pense', NULL, NULL);

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
  `semester` char(2) DEFAULT '01',
  `pertemuan` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `tgl_update` date NOT NULL,
  `update_oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul`, `pembahasan`, `tanggal`, `file`, `link`, `kode_pelajaran`, `semester`, `pertemuan`, `tgl_dibuat`, `dibuat_oleh`, `tgl_update`, `update_oleh`) VALUES
(1, 'Matematika Dasar I', 'Matematika Secara Umum Didefinisikan Sebagai Bidang Ilmu Yang Mempelajari Pola Dari Struktur, Perubahan Dan Ruang. Maka Secara Informal Dapat Juga Di Sebut Sebagai Ilmu Bilangan Dan Angka.', '2023-08-07', 'BAB_1_Proposal_Fachry_Riziq_Huseini_103454.pdf', '', '00003', '01', 1, '2023-08-07', 'Pak Pense', '2023-08-08', 'Yas yaaaa'),
(2, 'Matematika Aljabar', 'Matematika Secara Umum Didefinisikan Sebagai Bidang Ilmu Yang Mempelajari Pola Dari Struktur, Perubahan Dan Ruang. Maka Secara Informal Dapat Juga Di Sebut Sebagai Ilmu Bilangan Dan Angka.', '2023-08-07', 'Laporan Rekapulasi.csv', '', '00003', '01', 2, '2023-08-07', 'Pak Pense', '2023-08-08', 'Yas yaaaa'),
(3, 'Bahasa indonesia', 'Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Laborum Eos Delectus Maiores Minima Neque Nam Qui Saepe Aspernatur Porro Ipsa, Officia Eaque Facere Atque Animi Quaerat Adipisci Soluta Dolorem Nisi.', '2023-08-08', '', '', '00001', '01', 1, '2023-08-08', 'Pak Pense', '2023-08-08', 'Pak Pense'),
(4, 'Bahasa Inggris Dasar', 'Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Beatae, Quibusdam Fugiat? Voluptatum Reprehenderit Perspiciatis Dolorem Dolores Maiores Provident Architecto Eum Ab! Asperiores Sint Fugiat Soluta Exercitationem. Saepe, Ex Exercitationem. Nihil.', '2023-08-08', 'bingris11.docx', '29digitect.com', '00008', '01', 1, '2023-08-08', 'Yas yaaaa', '2023-08-08', 'Yas yaaaa'),
(5, 'Dasar Sosiologi', 'Apa Yang Dimaksud Dengan Sosiologi?\r\nSosiologi Adalah Ilmu Yang Menyelidiki Tentang Susunan-susunan Dan Proses Kehidupan Social Sebagai Suatu Keseluruhan / Suatu Sistem.', '2023-08-09', 'Sosiologi2.pdf', '', '00010', '01', 1, '2023-08-09', 'Sosogi', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tugas`
--

CREATE TABLE `nilai_tugas` (
  `id` int(11) NOT NULL,
  `nomor_identitas` char(20) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `nilai` double DEFAULT NULL,
  `file` text NOT NULL,
  `tgl_update` date NOT NULL,
  `update_oleh` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_tugas`
--

INSERT INTO `nilai_tugas` (`id`, `nomor_identitas`, `tugas_id`, `nilai`, `file`, `tgl_update`, `update_oleh`) VALUES
(1, 'IDS2308050005', 2, NULL, 'tugasSosiologi8.pdf', '2023-08-09', 'Yusuf Aryadilla');

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
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `kode` char(2) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`kode`, `nama`) VALUES
('01', 'GANJIL'),
('02', 'GENAP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `semester` char(2) DEFAULT '01',
  `tugas` varchar(56) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `kelas_id` char(20) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `update_oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `materi_id`, `semester`, `tugas`, `deskripsi`, `file`, `kelas_id`, `pertemuan`, `tgl_update`, `update_oleh`) VALUES
(1, 4, '01', 'English Task 1', 'Tugas Bhs Ingris', 'bingris1.docx', '', 1, '2023-08-08', 'Yas yaaaa'),
(2, 5, '01', 'Sosiologi tugas 1', 'Terakhir Minggu Depan,\r\nSilahkan Download File Untuk Melihat Tugas', 'Sosiologi3.pdf', '', 1, '2023-08-09', 'Sosogi');

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
('IDS2307290002', 'Melisa ar', 'P', 'Jakarta, Indonesia', '2001-07-29', '087897551129', 'Jakarta, Indonesia', 'Islam', '1', '', 'mel@gmail.com', '$2y$10$azZLpCKhaBwW2RuDxynQCerNNe2WowtzP3QUMnCXh8eMALhBExmvG', '', 1, 3, '2023-07-29'),
('IDS2308050003', 'Erna lalajo erna', 'P', 'Tangerang Banten', '2006-08-05', '08987654321', 'Tangerang Banten', 'Islam', '1', '', 'erna@gmail.com', '$2y$10$QzRjiTnspnTx5DGULqLXsulmqu34Y05.C0zDcQj/.DloYR3JjjjvC', '', 1, 3, '2023-08-05'),
('IDS2308050004', 'rudo roudo', 'L', 'Jakarta, Indonesia', '2007-12-11', '08299900000', 'Tangerang Banten', 'Islam', '1', '', 'rudo@gmail.com', '$2y$10$otFjlO6uJiDqeGEya5DET.3AepiDFY6Ufmo4XTWuDta6itToANKci', '', 1, 3, '2023-08-05'),
('IDS2308050005', 'Yusuf Aryadilla', 'L', '', '2023-08-05', '', 'Tangerang Banten', '', '1', '', 'arya@gmail.com', '$2y$10$4PaeagFVB4UYV83LaONKR.reg8Iy93h73hqg4PXYzOXXtPX1BaIAG', '', 1, 3, '2023-08-05'),
('IDT2307290002', 'Pak Pense', 'L', 'Tangerang Banten', '1998-07-29', '08999999990', 'Jakarta, Indonesia', 'Islam', '', '00001', 'pens@gmail.com', '$2y$10$K.zChIj60Qjdix3n1Wak3e2FbBzPQvE4EbcZg/1G2KxUgaAeCUefu', '', 1, 2, '0000-00-00'),
('IDT2308050003', 'Yusuf Aryadilla', 'L', '', '2023-08-05', '', 'Tangerang Banten', '', '', '00003', 'aryaherby29nov2k@gmail.com', '$2y$10$5Lv28XxwI9Qnp2TWhMeB.uDwaISRUfqsmpd3jQr0fXsD8A72f8xoC', '', 1, 2, '2023-08-05'),
('IDT2308050004', 'Yas yaaaa', 'L', '', '2023-08-05', '08122346789', 'Tangerang Banten', '', '', '00008', 'yas@gmail.com', '$2y$10$8D63tRxoDrxr5N53apzqKulCaHCLUUWQKoiERYX986WhvSaNFmXlC', '', 1, 2, '2023-08-05'),
('IDT2308090005', 'Sosogi', 'L', 'Bandung', '1998-08-09', '087897551129', '', '', '', '00010', 'sosogi@gmail.com', '$2y$10$g7sr5sSNguhTy3CGeboxCep1tVN9X8QHsHE.A/ZVzmHAt0f2gZN/e', NULL, 1, 2, '2023-08-09');

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
-- Indeks untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kode`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
