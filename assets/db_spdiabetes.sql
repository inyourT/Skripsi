-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2024 pada 06.56
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spdiabetes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idpenyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `basis_aturan`
--

INSERT INTO `basis_aturan` (`idaturan`, `idpenyakit`) VALUES
(15, 9),
(17, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`idaturan`, `idgejala`) VALUES
(15, 3),
(15, 9),
(15, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `idkonsultasi` int(11) NOT NULL,
  `idpenyakit` int(11) NOT NULL,
  `persentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`idkonsultasi`, `idpenyakit`, `persentase`) VALUES
(2, 9, 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `nmgejala` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `nmgejala`) VALUES
(2, 'Infeksi Jamur'),
(3, 'Gatal-Gatal'),
(4, 'Mudah Lemas'),
(5, 'Luka Lama Sembuh'),
(6, 'Penglihatan Rabun'),
(7, 'Sering Minum'),
(8, 'Sering Buang Air Kecil'),
(9, 'Penurunan Berat Badan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` int(11) NOT NULL,
  `nmpenyakit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `nmpenyakit`, `keterangan`, `solusi`) VALUES
(9, 'Diabetes Tipe 1', '-----', '---');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`idkonsultasi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `idkonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `idpenyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
