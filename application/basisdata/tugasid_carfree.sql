-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2018 pada 09.18
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasid_carfree`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `idAcara` char(3) NOT NULL,
  `namaAcara` varchar(50) NOT NULL,
  `deskripAcara` text,
  `pamflet` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `idJadwal` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`idAcara`, `namaAcara`, `deskripAcara`, `pamflet`, `status`, `lat`, `lng`, `idJadwal`) VALUES
('E01', 'MOBIL MAPELING AKAN HADIRRR DI CFD DAGO', ' MAPELING\r\nAkta Kelahiran dan Perekaman KTP Elektronik\r\nLokasi berada di sekitar Hotel Geulis Jl. Dago (Ir.H.Juanda)\r\ndari jam 8-10\r\n\r\nAcara:\r\n-Pelayanan Akta Kelahiran 0-18 tahu\r\n-Perekaman KTP-e (bawa fotokopi Kartu Keluarga) ', 'MOBIL MAPELING AKAN HADIRRR DI CFD DAGO.jpg', 'Aktif', -6.898393806632684, 107.61280730366707, 'J01'),
('E02', 'GATHERING MEWHOLIC BANDUNG', ' Lokasi : Car Free Day Dago\r\nJam : 07:00 - Selesai\r\n\r\nAcara:\r\n-OPEN MEMBER OPEN ADOPT\r\n-GAMES ', 'GATHERING MEWHOLIC BANDUNG.jpg', 'Ditolak', -6.891728792061336, 107.61335849761963, 'J01'),
('E03', 'Berbagi SUSU GRATIS', 'CFD DAGO BANDUNG \r\n27 Maret 2016\r\n\r\nAcara:\r\n- Senam\r\n- Games\r\n- Akustik ', 'Berbagi SUSU GRATIS.jpg', 'Aktif', -6.8909618966366715, 107.61331558227539, 'J01'),
('E04', 'KOIN PERSIB', ' Pengumpulan koin untuk denda persib\r\nKUY UDUNAN ', 'KOIN PERSIB.jpg', 'Aktif', -6.885891834569511, 107.61271476745605, 'J02'),
('E05', 'Pelayanan SIM keliling', ' Nanti Hari minggu ada sim keliling loh, bagi masyarakat yang ingin perpanjang sambil menikmati car free day  ', 'Pelayanan SIM keliling.jpg', 'Aktif', -6.894327706217563, 107.61305809020996, 'J02'),
('E06', 'lari pagi', 'lari pagi', 'lari_pagi.png', 'Belum Aktif', -6.941976371836538, 107.60786533355713, 'J04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carfree`
--

CREATE TABLE `carfree` (
  `idCarFree` char(3) NOT NULL,
  `namaCFD` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `deskrip` text,
  `petugas` varchar(5) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carfree`
--

INSERT INTO `carfree` (`idCarFree`, `namaCFD`, `lat`, `lng`, `deskrip`, `petugas`) VALUES
('C01', 'Car Free Day Dago ', -6.898393806632684, 107.61280730366707, 'Car Free Day (CFD) atau hari dimana jalanan bebas dari kendaraan bermotor. Setiap tahun pada tanggal 22 September diperingati sebagai hari CFD sedunia, awal mula gerakan ini dicetuskan oleh Carbuster pada tahun 1997. Semangat dari Car Free Day adalah, tinggalkan kendaraan bermotor dirumah dan berjalan kakilah atau gunakan kendaraan tidak bermotor ataupun menggunakan kendaraan umum untuk perjalanan panjang. Kalau diminta seharian penuh ngangkot atau bersepeda pasti banyak yang kabur, kecuali mereka yang sehari-harinya ngangkot dan nyapedah, makanya CFD hanya diterapkan di sebagian jalanan saja tidak mengambil seluruh kota dan dalam hari dan jangka waktu tertentu saja tidak seharian 24 jam. Untuk CFD Dago diadakan di hari minggu sepanjang jalan Ir. H. Juanda dari Dago bawah, persis dibawah jalan layang pasupati sampai Dago atas pertigaan Jl. Ir.H. Juanda dan Jl. Dayang Sumbi, aktivitas kendaraan bermotor haram lewat CFD Dago dimulai dari jam 06.00 sampai 10.00 WIB.', 'Sudah'),
('C02', 'CFD Muhammad Toha', -6.953861826558085, 107.61118322610855, 'Car Free Day (CFD) atau hari dimana jalanan bebas dari kendaraan bermotor. Setiap tahun pada tanggal 22 September diperingati sebagai hari CFD sedunia, awal mula gerakan ini dicetuskan oleh Carbuster pada tahun 1997. Semangat dari Car Free Day adalah, tinggalkan kendaraan bermotor dirumah dan berjalan kakilah atau gunakan kendaraan tidak bermotor ataupun menggunakan kendaraan umum untuk perjalanan panjang. Kalau diminta seharian penuh ngangkot atau bersepeda pasti banyak yang kabur, kecuali mereka yang sehari-harinya ngangkot dan nyapedah, makanya CFD hanya diterapkan di sebagian jalanan saja tidak mengambil seluruh kota dan dalam hari dan jangka waktu tertentu saja tidak seharian 24 jam. ', 'Sudah'),
('C03', 'XYZ', -6.886933012451771, 107.60980322957039, 'xyz', 'Sudah'),
('C04', 'CFD serang', -6.890554482937745, 107.6269070059061, 'Hallo ', 'Sudah'),
('C05', 'CFD CIGADUNG', -6.881862907327165, 107.62572482228279, 'dawdawda', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` char(3) NOT NULL,
  `tgl` date NOT NULL,
  `idCarFree` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `tgl`, `idCarFree`) VALUES
('J01', '2017-12-17', 'C01'),
('J02', '2017-12-24', 'C01'),
('J03', '2018-01-14', 'C01'),
('J04', '2018-01-14', 'C02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `noKTP` char(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`noKTP`, `email`, `password`) VALUES
('123', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
('001', 'admin@cfd.com', '0192023a7bbd73250516f069df18b500'),
('1212', 'angga3399@gmail.com', 'cc841728f14bf6da6df3018d98b02531'),
('111111111111111', 'kikifachry25@gmail.com', 'e4cbc42c72304db84e72b061c982fcc2'),
('10114105', 'maulanaamsors@gmail.com', 'd10901cfc7d2db2d829a5252db5acae4'),
('10114202', 'petugas@cfd.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `idLok` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `idCarFree` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`idLok`, `lat`, `lng`, `idCarFree`) VALUES
('L01', -6.8857826572167715, 107.61375144124031, 'C01'),
('L02', -6.89877724848576, 107.61280730366707, 'C01'),
('L03', -6.939036911981429, 107.60611921548843, 'C02'),
('L04', -6.956332600196787, 107.61178404092789, 'C02'),
('L05', -6.892003063387703, 107.62923080474138, 'C04'),
('L06', -6.8879981537005985, 107.62413695454597, 'C04'),
('L07', -6.876025828492447, 107.62306407094002, 'C05'),
('L08', -6.882416786992916, 107.62593939900398, 'C05'),
('L09', -6.90031101279308, 107.6040954887867, 'C03'),
('L10', -6.884461875544452, 107.6070499420166, 'C03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `noKTP` char(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kontak` char(12) DEFAULT NULL,
  `statusUser` varchar(8) NOT NULL,
  `idCarFree` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`noKTP`, `nama`, `kontak`, `statusUser`, `idCarFree`) VALUES
('001', 'Admin', NULL, 'Admin', 'C01'),
('10114105', 'Maulana Amsor Siddik', '089111111111', 'Petugas', 'C01'),
('10114202', 'Rizki Agusti Ghofur', '089611525997', 'Petugas', 'C02'),
('111111111111111', 'rizki', '085723656531', 'Petugas', 'C04'),
('1212', 'aa', '1212', 'Petugas', 'C03'),
('123', 'admin', '00000', 'Admin', 'C01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`idAcara`),
  ADD KEY `idJadwal` (`idJadwal`);

--
-- Indeks untuk tabel `carfree`
--
ALTER TABLE `carfree`
  ADD PRIMARY KEY (`idCarFree`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `idCarFree` (`idCarFree`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `noKTP` (`noKTP`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`idLok`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`noKTP`),
  ADD KEY `idCarFree` (`idCarFree`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_ibfk_1` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idCarFree`) REFERENCES `carfree` (`idCarFree`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`noKTP`) REFERENCES `user` (`noKTP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idCarFree`) REFERENCES `carfree` (`idCarFree`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
