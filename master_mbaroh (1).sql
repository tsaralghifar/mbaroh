-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2020 pada 04.34
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_mbaroh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_brg`, `jumlah`, `tanggal`, `created_by`) VALUES
(1, 11, 5, '2020-09-04 09:39:55', 'Dwyne Johnson'),
(2, 11, 5, '2020-09-04 09:40:07', 'Dwyne Johnson'),
(3, 11, 10, '2020-09-04 09:46:35', 'Dwyne Johnson'),
(4, 11, 5, '2020-09-04 09:46:51', 'Dwyne Johnson'),
(5, 12, 3, '2020-09-04 10:02:56', 'Dwyne Johnson'),
(6, 13, 5, '2020-09-04 10:03:04', 'Dwyne Johnson'),
(7, 14, 7, '2020-09-05 04:58:02', 'Tsar ALghifari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_status`
--

CREATE TABLE `book_status` (
  `id` int(11) NOT NULL,
  `status_b` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book_status`
--

INSERT INTO `book_status` (`id`, `status_b`) VALUES
(1, 'pending'),
(2, 'complete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(128) NOT NULL,
  `kegiatan` varchar(123) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1:selesai, 2:soon_',
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_event`, `kegiatan`, `foto`, `status`, `tgl`) VALUES
(7, 'Sport Challenge', 'Marathon Run', 'andalkan-ai-robot-exosuit-bisa-bantu-orang-berjalan-dan-berlari-d0XPEEGmix.jpg', 2, '2020-07-30'),
(8, 'PUBG Tourney 2K20', 'Game Tournament', '1aa60b12f04b362937b9aa5d9730a15f.jpg', 1, '2020-07-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `unit` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `foto_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama_barang`, `kategori`, `unit`, `status`, `tanggal_masuk`, `foto_barang`) VALUES
(11, 'Kursi Kayu', '2', 20, 'Ok', '0000-00-00', '25.jpg'),
(12, 'Poster Quote', '1', 3, 'Ok', '0000-00-00', 'EdYamBKUwAQz3mu.jpg'),
(13, 'Kursi Mamang Ace Hardware', '2', 5, 'Ok', '0000-00-00', 'EdaLdHeVcAEKd2K.jpg'),
(14, 'Meja Kayu', '3', 7, 'Ok', '0000-00-00', 'black2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama_plgn` varchar(128) NOT NULL,
  `kritik_saran` text NOT NULL,
  `rateIndex` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `nama_plgn`, `kritik_saran`, `rateIndex`) VALUES
(10, 'Rizky', 'No base font-size is declared on the <html>, but 16px is assumed (the browser default). font-size: 1rem i', 1),
(11, 'Benny', 'he default web fonts (Helvetica Neue, Helvetica, and Arial) have been dropped in Bootstrap 4 and replaced with a “native font stack”', 4),
(12, 'Mikaneko', 'he default web fonts (Helvetica Neue, Helvetica, and Arial) have been dropped in Bootstrap 4 and replaced with a “native font stack”he default web fonts (Helvetica Neue, Helvetica, and Arial) have been dropped in Bootstrap 4 and replaced with a “native font stack”', 3),
(13, 'Mori-jin', 'wqewqewwqrr', 3),
(14, 'Hideo Kojima', 'Mantap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `foto`) VALUES
(2, 'LORD Ozan', 'Jl Pal 7', '68139_675752035877890_4654783190666280632_n.jpg'),
(3, 'Tsar', 'Jl Gambut', 'Ea-RIuGy_400x400.jpg'),
(5, 'Benny Rahmat', 'Jl Sukamara', 'a912808c-4c07-42f7-a850-52228fe32ff92.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_`
--

CREATE TABLE `kategori_` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_`
--

INSERT INTO `kategori_` (`id`, `nama_kategori`) VALUES
(1, 'Dekorasi'),
(2, 'Kursi Outdoor'),
(3, 'Interior Indoor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `no_doc` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL,
  `doc_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `no_doc`, `created_at`, `created_by`, `doc_type`) VALUES
(181, 'DOC/00001/PJ/01/09/2020', '2020-09-01 09:06:58', 'Tsar ALghifari', 2),
(182, 'DOC/00002/PJ/01/09/2020', '2020-09-01 09:09:28', 'Tsar ALghifari', 2),
(183, 'DOC/00003/PJ/01/09/2020', '2020-09-01 09:22:30', 'Dwyne Johnson', 2),
(184, 'DOC/00004/PJ/01/09/2020', '2020-09-01 09:29:42', 'Dwyne Johnson', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penjualan_detail`
--

CREATE TABLE `laporan_penjualan_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `faktur` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `totalPenjualan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_penjualan_detail`
--

INSERT INTO `laporan_penjualan_detail` (`id`, `doc_id`, `faktur`, `total`, `totalPenjualan`) VALUES
(7, 13, 'P2007200011', 10000, ''),
(8, 13, 'P2007200012', 300000, ''),
(9, 18, 'P2007200011', 10000, ''),
(10, 18, 'P2007200012', 300000, ''),
(11, 19, 'P2007200011', 10000, ''),
(12, 19, 'P2007200012', 300000, ''),
(13, 37, 'P2207200013', 20000, ''),
(14, 38, 'P2207200013', 20000, ''),
(15, 39, 'P2207200013', 20000, ''),
(16, 40, 'P2207200013', 20000, ''),
(17, 40, 'P2207200014', 100000, ''),
(18, 41, 'P2207200013', 20000, ''),
(19, 41, 'P2207200014', 100000, ''),
(20, 42, 'P2207200013', 20000, ''),
(21, 42, 'P2207200014', 100000, ''),
(22, 42, 'P2207200015', 75000, ''),
(23, 43, 'P2207200013', 20000, ''),
(24, 43, 'P2207200014', 100000, ''),
(25, 43, 'P2207200015', 75000, ''),
(26, 44, 'P2307200016', 150000, ''),
(27, 50, 'P2407200017', 50000, ''),
(28, 52, 'P2407200017', 50000, ''),
(29, 52, 'P2407200018', 30000, ''),
(30, 71, '', 0, ''),
(31, 71, '', 0, ''),
(32, 71, '', 0, ''),
(33, 71, '', 0, ''),
(34, 71, '', 0, ''),
(35, 71, '', 0, ''),
(36, 71, '', 0, ''),
(37, 71, '', 0, ''),
(38, 71, '', 0, ''),
(39, 71, '', 0, ''),
(40, 71, '', 0, ''),
(41, 71, '', 0, ''),
(42, 71, '', 0, ''),
(43, 71, '', 0, ''),
(44, 71, '', 0, ''),
(45, 71, '', 0, ''),
(46, 71, '', 0, ''),
(47, 71, '', 0, ''),
(48, 72, '', 0, ''),
(49, 72, '', 0, ''),
(50, 72, '', 0, ''),
(51, 72, '', 0, ''),
(52, 72, '', 0, ''),
(53, 72, '', 0, ''),
(54, 72, '', 0, ''),
(55, 72, '', 0, ''),
(56, 72, '', 0, ''),
(57, 72, '', 0, ''),
(58, 72, '', 0, ''),
(59, 72, '', 0, ''),
(60, 72, '', 0, ''),
(61, 72, '', 0, ''),
(62, 72, '', 0, ''),
(63, 72, '', 0, ''),
(64, 72, '', 0, ''),
(65, 72, '', 0, ''),
(66, 85, '', 0, ''),
(67, 85, '', 0, ''),
(68, 85, '', 0, ''),
(69, 85, '', 0, ''),
(70, 85, '', 0, ''),
(71, 85, '', 0, ''),
(72, 85, '', 0, ''),
(73, 85, '', 0, ''),
(74, 85, '', 0, ''),
(75, 85, '', 0, ''),
(76, 85, '', 0, ''),
(77, 85, '', 0, ''),
(78, 85, '', 0, ''),
(79, 85, '', 0, ''),
(80, 85, '', 0, ''),
(81, 85, '', 0, ''),
(82, 85, '', 0, ''),
(83, 85, '', 0, ''),
(84, 0, '', 0, ''),
(85, 0, '', 0, ''),
(86, 0, '', 0, ''),
(87, 0, '', 0, ''),
(88, 0, '', 0, ''),
(89, 0, '', 0, ''),
(90, 0, '', 0, ''),
(91, 0, '', 0, ''),
(92, 0, '', 0, ''),
(93, 0, '', 0, ''),
(94, 0, '', 0, ''),
(95, 0, '', 0, ''),
(96, 89, '', 0, ''),
(97, 89, '', 0, ''),
(98, 89, '', 0, ''),
(99, 89, '', 0, ''),
(100, 89, '', 0, ''),
(101, 89, '', 0, ''),
(102, 89, '', 0, ''),
(103, 89, '', 0, ''),
(104, 89, '', 0, ''),
(105, 89, '', 0, ''),
(106, 89, '', 0, ''),
(107, 89, '', 0, ''),
(108, 89, '', 0, ''),
(109, 89, '', 0, ''),
(110, 89, '', 0, ''),
(111, 89, '', 0, ''),
(112, 89, '', 0, ''),
(113, 89, '', 0, ''),
(114, 90, 'P2407200017', 50000, ''),
(115, 90, 'P2407200018', 30000, ''),
(116, 111, 'P2306200001', 150000, ''),
(117, 111, 'P2306200002', 150000, ''),
(118, 111, 'P2306200003', 20000, ''),
(119, 111, 'P2306200004', 20000, ''),
(120, 111, 'P2306200005', 20000, ''),
(121, 111, 'P2306200006', 2400000, ''),
(122, 111, 'P2306200007', 2400000, ''),
(123, 111, 'P2706200008', 10000, ''),
(124, 111, 'P0207200009', 40000, ''),
(125, 111, 'P0207200010', 80000, ''),
(126, 111, 'P2007200011', 10000, ''),
(127, 111, 'P2007200012', 300000, ''),
(128, 111, 'P2207200013', 20000, ''),
(129, 111, 'P2207200014', 100000, ''),
(130, 111, 'P2207200015', 75000, ''),
(131, 111, 'P2307200016', 150000, ''),
(132, 111, 'P2407200017', 50000, ''),
(133, 111, 'P2407200018', 30000, ''),
(134, 112, 'P2306200001', 150000, ''),
(135, 112, 'P2306200002', 150000, ''),
(136, 112, 'P2306200003', 20000, ''),
(137, 112, 'P2306200004', 20000, ''),
(138, 112, 'P2306200005', 20000, ''),
(139, 112, 'P2306200006', 2400000, ''),
(140, 112, 'P2306200007', 2400000, ''),
(141, 112, 'P2706200008', 10000, ''),
(142, 112, 'P0207200009', 40000, ''),
(143, 112, 'P0207200010', 80000, ''),
(144, 112, 'P2007200011', 10000, ''),
(145, 112, 'P2007200012', 300000, ''),
(146, 112, 'P2207200013', 20000, ''),
(147, 112, 'P2207200014', 100000, ''),
(148, 112, 'P2207200015', 75000, ''),
(149, 112, 'P2307200016', 150000, ''),
(150, 112, 'P2407200017', 50000, ''),
(151, 112, 'P2407200018', 30000, ''),
(152, 112, 'P2607200019', 300000, ''),
(153, 120, 'P0207200009', 40000, ''),
(154, 120, 'P0207200010', 80000, ''),
(155, 120, 'P2007200011', 10000, ''),
(156, 120, 'P2007200012', 300000, ''),
(157, 120, 'P2207200013', 20000, ''),
(158, 120, 'P2207200014', 100000, ''),
(159, 120, 'P2207200015', 75000, ''),
(160, 120, 'P2307200016', 150000, ''),
(161, 120, 'P2407200017', 50000, ''),
(162, 120, 'P2407200018', 30000, ''),
(163, 120, 'P2607200019', 300000, ''),
(164, 121, 'P2207200013', 20000, ''),
(165, 121, 'P2207200014', 100000, ''),
(166, 121, 'P2207200015', 75000, ''),
(167, 121, 'P2307200016', 150000, ''),
(168, 121, 'P2407200017', 50000, ''),
(169, 121, 'P2407200018', 30000, ''),
(170, 121, 'P2607200019', 300000, ''),
(171, 139, 'P2707200020', 10000, ''),
(172, 153, 'P2707200020', 10000, ''),
(173, 157, 'P3007200021', 150000, ''),
(174, 157, 'P3007200022', 40000, ''),
(175, 158, 'P0207200009', 40000, ''),
(176, 158, 'P0207200010', 80000, ''),
(177, 158, 'P2007200011', 10000, ''),
(178, 158, 'P2007200012', 300000, ''),
(179, 158, 'P2207200013', 20000, ''),
(180, 158, 'P2207200014', 100000, ''),
(181, 158, 'P2207200015', 75000, ''),
(182, 158, 'P2307200016', 150000, ''),
(183, 158, 'P2407200017', 50000, ''),
(184, 158, 'P2407200018', 30000, ''),
(185, 158, 'P2607200019', 300000, ''),
(186, 158, 'P2707200020', 10000, ''),
(187, 158, 'P3007200021', 150000, ''),
(188, 158, 'P3007200022', 40000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_reservasi_detail`
--

CREATE TABLE `laporan_reservasi_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `total_k` varchar(128) NOT NULL,
  `status_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_reservasi_detail`
--

INSERT INTO `laporan_reservasi_detail` (`id`, `doc_id`, `nama`, `phone`, `status`, `total_k`, `status_bayar`) VALUES
(381, 181, 'Comrade', '23214', 1, '100000', 2),
(382, 181, 'Mhamank Kesbor', '34324', 1, '', 1),
(383, 182, 'Comrade', '23214', 1, '100000', 3),
(384, 182, 'Mhamank Kesbor', '34324', 1, '50000', 3),
(385, 183, 'Comrade', '23214', 1, '100000', 1),
(386, 183, 'Mhamank Kesbor', '34324', 1, '50000', 3),
(387, 184, 'Comrade', '23214', 1, '100000', 1),
(388, 184, 'Mhamank Kesbor', '34324', 1, '50000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `kategori_menu` int(1) NOT NULL COMMENT '1:makanan, 2:minuman',
  `harga` varchar(40) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `kategori_menu`, `harga`, `gambar`) VALUES
(42, 'Kentang Goreng', 1, '10000', 'cara-mudah-bikin-kentang-goreng-kembali-renyah-190225t.jpg'),
(43, 'Wine', 2, '150000', 'Akarua-winery-650x3501.jpg'),
(44, 'Chiken Meatball', 1, '15000', 'buffalo-chicken-meatballs-coated-pic-650x350.jpg'),
(45, 'Orang Tua', 2, '175000', 'DFf624cXsAAom32.jpg'),
(46, 'Pizza', 1, '75000', 'pepperoni-pizza-dough-boys-vb-650x350.jpg'),
(47, 'Baraccatt', 2, '200000', 'bustedbarrel-650x350.jpg'),
(48, 'Chia Tea', 2, '15000', 'chia_tea_cubes-sk_ispo8f.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `faktur` varchar(128) NOT NULL,
  `kasir` varchar(128) NOT NULL,
  `pelanggan` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`faktur`, `kasir`, `pelanggan`, `total`, `bayar`, `kembalian`, `waktu_transaksi`, `aktif`) VALUES
('P2306200001', 'Tsar ALghifari', 'Umum', 150000, 200000, 50000, '2020-06-23', 0),
('P2306200002', 'Tsar ALghifari', 'Umum', 150000, 200000, 50000, '2020-06-23', 0),
('P2306200003', 'Tsar ALghifari', 'Umum', 20000, 20000, 0, '2020-06-23', 0),
('P2306200004', 'Tsar ALghifari', 'Umum', 20000, 25000, 5000, '2020-06-23', 0),
('P2306200005', 'Tsar ALghifari', 'Umum', 20000, 25000, 5000, '2020-06-23', 0),
('P2306200006', 'Tsar ALghifari', 'Umum', 2400000, 2500000, 100000, '2020-06-23', 0),
('P2306200007', 'Tsar ALghifari', 'Umum', 2400000, 2500000, 100000, '2020-06-23', 0),
('P2706200008', 'Tsar ALghifari', 'Umum', 10000, 10000, 0, '2020-06-27', 0),
('P0207200009', 'Tsar ALghifari', 'Umum', 40000, 50000, 10000, '2020-07-02', 0),
('P0207200010', 'Tsar ALghifari', 'Umum', 80000, 100000, 20000, '2020-07-02', 0),
('P2007200011', 'Tsar ALghifari', 'Umum', 10000, 10000, 0, '2020-07-20', 0),
('P2007200012', 'Tsar ALghifari', 'Umum', 300000, 300000, 0, '2020-07-20', 0),
('P2207200013', 'Tsar ALghifari', 'Umum', 20000, 20000, 0, '2020-07-22', 0),
('P2207200014', 'Tsar ALghifari', 'Umum', 100000, 100000, 0, '2020-07-22', 0),
('P2207200015', 'Tsar ALghifari', 'Umum', 75000, 100000, 25000, '2020-07-22', 0),
('P2307200016', 'Tsar ALghifari', 'Umum', 150000, 150000, 0, '2020-07-23', 0),
('P2407200017', 'Tsar ALghifari', 'Umum', 50000, 50000, 0, '2020-07-24', 0),
('P2407200018', 'Tsar ALghifari', 'Umum', 30000, 50000, 20000, '2020-07-24', 0),
('P2607200019', 'Tsar ALghifari', 'Umum', 300000, 300000, 0, '2020-07-26', 0),
('P2707200020', 'Tsar ALghifari', 'Umum', 10000, 10000, 0, '2020-07-27', 0),
('P3007200021', 'Dwyne Johnson', 'Umum', 150000, 150000, 0, '2020-07-30', 0),
('P3007200022', 'Dwyne Johnson', 'Umum', 40000, 50000, 10000, '2020-07-30', 0),
('P3008200023', 'Tsar ALghifari', 'Umum', 150000, 150000, 0, '2020-08-30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `faktur_id` varchar(128) NOT NULL,
  `items` int(11) NOT NULL,
  `sold_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `faktur_id`, `items`, `sold_qty`) VALUES
(1, 'P2306200004', 42, 2),
(2, 'P2306200005', 42, 2),
(3, 'P2306200006', 47, 12),
(4, 'P2306200007', 47, 12),
(5, 'P2706200008', 42, 1),
(6, 'P0207200009', 42, 2),
(7, 'P0207200009', 44, 2),
(9, 'P0207200010', 42, 2),
(10, 'P0207200010', 44, 2),
(11, 'P0207200010', 48, 2),
(12, 'P2007200011', 42, 1),
(13, 'P2007200011', 43, 2),
(14, 'P2207200013', 42, 2),
(15, 'P2207200014', 42, 10),
(16, 'P2207200015', 44, 5),
(17, 'P2307200016', 46, 2),
(18, 'P2407200017', 42, 5),
(19, 'P2407200018', 44, 2),
(20, 'P2607200019', 43, 2),
(21, 'P2707200020', 42, 1),
(22, 'P3007200021', 46, 2),
(23, 'P3007200021', 42, 4),
(24, 'P3008200023', 46, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `jumlah_orang` int(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `booking_at` date NOT NULL,
  `tag` varchar(128) DEFAULT NULL,
  `tgl_h` date NOT NULL,
  `status_bayar` int(1) NOT NULL COMMENT '1:belum, 2:lunas, 3:dp',
  `tf` varchar(128) NOT NULL,
  `total_k` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `nama`, `phone`, `jumlah_orang`, `status`, `booking_at`, `tag`, `tgl_h`, `status_bayar`, `tf`, `total_k`) VALUES
(33, 'Comrade', '23214', 2, 1, '2020-09-01', NULL, '2020-09-02', 1, '23.jpg', '100000'),
(34, 'Mhamank Kesbor', '34324', 5, 1, '2020-09-01', NULL, '2020-09-10', 3, '51B+bDnLv+L__AC_SY400_1.jpg', '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:user_'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Tsar ALghifari', 'Gambut', 1),
(2, 'john', '12dea96fec20593566ab75692c9949596833adc9', 'John', 'Paris', 2),
(5, 'salamander', 'cedfaaf37db678aea57782e582714df420b84c7e', 'salamanderman', 'bumi', 2),
(8, 'tsarsaja', 'cedfaaf37db678aea57782e582714df420b84c7e', 'tsarsaja', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book_status`
--
ALTER TABLE `book_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kategori_`
--
ALTER TABLE `kategori_`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_penjualan_detail`
--
ALTER TABLE `laporan_penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_reservasi_detail`
--
ALTER TABLE `laporan_reservasi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `book_status`
--
ALTER TABLE `book_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_`
--
ALTER TABLE `kategori_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT untuk tabel `laporan_penjualan_detail`
--
ALTER TABLE `laporan_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT untuk tabel `laporan_reservasi_detail`
--
ALTER TABLE `laporan_reservasi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
