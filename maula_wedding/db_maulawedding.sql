-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 08:15 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_maulawedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Elma Maula silva', 'elmamaulasilva@gmail.com', 'admin', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'qbotsista', 'qbotsista@gmail.com', 'qbotsista', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_blog` varchar(80) NOT NULL,
  `slug_blog` varchar(80) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `keywords` text,
  `status_blog` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_admin`, `id_kategori`, `judul_blog`, `slug_blog`, `deskripsi`, `keywords`, `status_blog`, `keterangan`, `gambar`, `tanggal_post`, `tanggal_update`) VALUES
(19, 1, 6, 'HENNA PENGANTIN PUTIH', '6-henna-pengantin-putih', 'Henna pengantin putih plus kuku', 'henna pengantin putih, jasa henna pengantin, henna pengan tangerang', 'Publish', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'IMG-20200525-WA0001.jpg', '2020-08-01 12:32:06', '2020-12-01 02:14:14'),
(23, 1, 4, 'Parsel Pernikahan', '4-parsel-pernikahan', 'Parsel pernikahan dengan tampilan elegan yang dapat memberikan kesan mewah pada saat seserahan pernikahan', 'parsel pernikahan', 'Publish', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'Screenshot_2020-08-26-13-14-31-493.jpeg', '2020-11-19 20:25:22', '2020-12-01 02:15:37'),
(24, 1, 5, 'MAHAR PERNIKAHAN SCRAPBOOK', '5-mahar-pernikahan-scrapbook', 'Mahar Pernikahan Scrapbook', 'Mahar pernikahan scrapbook', 'Publish', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'Screenshot_2020-09-04-08-29-25-755_com_facebook_lite.png', '2020-12-01 03:17:19', '2020-12-01 02:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `judul_gambar` varchar(80) DEFAULT NULL,
  `gambar` varchar(80) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `kode_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 'henna01', 'Henna pengantin warna putih', 'IMG-20200525-WA0000.jpg', '2020-11-17 19:38:47'),
(2, 'henna01', 'Henna pengantin warna putih', '1.jpeg', '2020-12-01 02:19:02'),
(3, 'henna01', 'Henna pengantin warna putih', '2.jpeg', '2020-12-01 02:19:11'),
(4, 'henna01', 'Henna pengantin warna putih', '3.jpeg', '2020-12-01 02:19:22'),
(5, 'Henna02', 'Henna pengantin warna putih', 'dd.jpg', '2020-12-01 16:57:11'),
(6, 'Henna02', 'Henna pengantin warna putih', 'd.jpg', '2020-12-01 16:57:30'),
(7, 'parsel02', 'Parsel Pernikahan', 'Screenshot_2020-08-26-13-16-46-321.jpeg', '2020-12-02 02:31:00'),
(8, 'parsel02', 'Parsel Pernikahan', 'Screenshot_2020-08-26-13-16-26-534.jpeg', '2020-12-02 02:31:17'),
(9, 'parsel02', 'Parsel Pernikahan', 'Screenshot_2020-08-26-13-14-15-780.jpeg', '2020-12-02 02:31:25'),
(10, 'parsel03', 'Parsel Pernikahan', 'Screenshot_2020-08-26-13-13-59-125.jpeg', '2020-12-02 02:38:16'),
(11, 'parsel03', 'Parsel Pernikahan', 'Screenshot_2020-08-26-13-12-42-101.jpeg', '2020-12-02 02:38:30'),
(12, 'Henna03', 'Henna pengantin warna cokelat', 'cc.jpg', '2020-12-02 02:41:51'),
(13, 'Henna03', 'Henna pengantin warna cokelat', 'ccccc.jpg', '2020-12-02 02:42:06'),
(14, 'Henna03', 'Henna pengantin warna cokelat', 'c.jpg', '2020-12-02 02:42:15'),
(15, 'Henna04', 'Henna pengantin warna putih', '9.jpeg', '2020-12-02 02:43:51'),
(16, 'Henna04', 'Henna pengantin warna putih', '7.jpeg', '2020-12-02 02:43:59'),
(17, 'Henna04', 'Henna pengantin warna putih', '10.jpeg', '2020-12-02 02:44:09'),
(18, 'Henna05', 'Henna pengantin warna putih', 'm.jpg', '2020-12-02 02:45:28'),
(19, 'Henna05', 'Henna pengantin warna putih', 'mm.jpg', '2020-12-02 02:45:43'),
(20, 'Henna05', 'Henna pengantin warna putih', 'mmm.jpg', '2020-12-02 02:45:53'),
(21, 'Henna06', 'Henna pengantin warna cokelat', 'zz.jpg', '2020-12-02 02:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(80) NOT NULL,
  `nama_kategori` varchar(80) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`) VALUES
(4, 'parsel-pernikahan', 'PARSEL PERNIKAHAN', 3),
(5, 'mahar-pernikahan', 'MAHAR PERNIKAHAN', 2),
(6, 'henna-pengantin', 'HENNA PENGANTIN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(80) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(60) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(12) DEFAULT NULL,
  `alamat` text,
  `whatsapp` varchar(100) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `id_admin`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `whatsapp`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 'Maula Wedding ', 'Jasa Pernikahan', 1, 'maulahennaart@gmail.com', 'maulahenna', 'Jual Jasa Pernikahan, Henna Pengantin, Parsel Pernikahan, Mahar Pernikahan', 'Jual Jasa Pernikahan, Henna Pengantin, Parcel Pernikahan, Mahar Pernikahan', '08557997782', 'Jl Adi Sucipto Kel. Pajang Kec. Benda Kota Tangerang', 'http://facebook.com/mensista', 'http://facebook.com/mensista', 'http://instagram.com/maula.hennaart', 'Toko Maula Wedding Melayani Jasa Pernikahan, Henna Pengantin, Percel Pernikahan, Mahar Pernikahan.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'logo2.png', 'icon3.png', '2020-12-02 02:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(5, 'elma', 'testing@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08557997782', 'jkt', '2020-08-16 12:09:07', '2020-08-16 10:09:07'),
(6, 'pelanggan', 'pelanggan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '0855799788553', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', '2020-09-11 03:38:24', '2020-12-02 09:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` text,
  `nama_pengantin` varchar(60) DEFAULT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `no_rekening` varchar(20) DEFAULT NULL,
  `rek_pembayaran` varchar(20) DEFAULT NULL,
  `rek_pelanggan` varchar(20) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `status_pesanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kode_pembayaran`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `nama_pengantin`, `kode_transaksi`, `tanggal_transaksi`, `subtotal`, `jumlah_bayar`, `no_rekening`, `rek_pembayaran`, `rek_pelanggan`, `nama_bank`, `bukti_bayar`, `status_bayar`, `tanggal_bayar`, `status_pesanan`) VALUES
('01122020KSYZ', 6, 'pelanggan', 'pelanggan@gmail.com', '085579978855', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', '', '011220204MAY0BEJ', '2020-12-01 00:00:00', 5250000, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum', NULL, 'Segera lakukan pembayaran transaksi anda, jika dalam waktu 3 hari tidak melakukan konfirmasi pembayaran, maka transaksi akan terhapus'),
('02122020O7AB', 6, 'pelanggan', 'pelanggan@gmail.com', '0855799788553', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', 'elma', '02122020YXYRKZ8L', '2020-12-02 00:00:00', 1600000, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum', NULL, 'Segera lakukan pembayaran transaksi anda, jika dalam waktu 3 hari tidak melakukan konfirmasi pembayaran, maka transaksi akan terhapus'),
('19112020Q9BR', 6, 'pelanggan', 'pelanggan@gmail.com', '085579978855', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', '', '19112020YWPMJCSB', '0000-00-00 00:00:00', 15950000, 15950000, '1234567', '2456456456', 'qbot', 'BANK BCA', NULL, 'Selesai', '0000-00-00 00:00:00', 'Barang anda sedang dalam pengiriman\r\n'),
('20112020QMAX', 6, 'pelanggan', 'pelanggan@gmail.com', '085579978855', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', '', '20112020SEOJCNUG', '0000-00-00 00:00:00', 5700000, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum', NULL, 'Segera lakukan pembayaran transaksi anda, jika dal'),
('261120206PSF', 6, 'pelanggan', 'pelanggan@gmail.com', '085579978855', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', 'andi dan a', '26112020K9CFVH6I', '0000-00-00 00:00:00', 5250000, 5250000, '1234567', '2456456456', 'qbot', 'BANK BCA', NULL, 'Konfirmasi', '0000-00-00 00:00:00', 'Terima kasih, Barang pesanan anda akan segera dipr'),
('27112020SOEX', 6, 'pelanggan', 'pelanggan@gmail.com', '085579978855', 'jl garuda Rt 06 Rw 06 Kel. batu jaya  Kec. batu ceper', '', '27112020X2IGWQ1U', '2020-11-27 00:00:00', 5250000, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum', NULL, 'Segera lakukan pembayaran transaksi anda, jika dalam waktu 3 hari tidak melakukan konfirmasi pembayaran, maka transaksi akan terhapus');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `slug_produk` varchar(80) NOT NULL,
  `gambar` varchar(80) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `id_kategori`, `nama_produk`, `slug_produk`, `gambar`, `harga`, `keterangan`, `keywords`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
('henna01', 6, 'HENNA PENGANTIN WARNA PUTIH', 'henna-pengantin-warna-putih-henna01', 'IMG-20200525-WA0001.jpg', 400000, '<p>White Henna Pernikahan</p>\r\n\r\n<p>Spesifikasi:</p>\r\n\r\n<p><em>1.&nbsp; sudah termasuk kuku palsu</em></p>\r\n\r\n<p><em>2.&nbsp; untuk sepasang tangan pengantin</em></p>\r\n\r\n<p><em>3.&nbsp; waterproof (tahan 1-2 hari) tergantung kondisi kulit dan dengan tehnik finishing &amp; perawatan yang benar menggunakan bahan body paint yang berkualitas</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>harga belum termasuk biaya transport</em></p>\r\n', 'Henna pengantin, Henna pernikahan', 'Publish', '2020-11-17 20:38:14', '2020-12-01 12:36:53'),
('Henna02', 6, 'HENNA PENGANTIN WARNA PUTIH', 'henna-pengantin-warna-putih-henna02', 'ddd.jpg', 400000, '<p>White Henna Pernikahan</p>\r\n\r\n<p>Spesifikasi:</p>\r\n\r\n<p><em>1.&nbsp; sudah termasuk kuku palsu</em></p>\r\n\r\n<p><em>2.&nbsp; untuk sepasang tangan pengantin</em></p>\r\n\r\n<p><em>3.&nbsp; waterproof (tahan 1-2 hari) tergantung kondisi kulit dan dengan tehnik finishing &amp; perawatan yang benar menggunakan bahan body paint yang berkualitas</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>harga belum termasuk biaya transport</em></p>\r\n', '', 'Publish', '2020-12-01 17:56:19', '2020-12-01 16:56:19'),
('Henna03', 6, 'HENNA PENGANTIN WARNA COKELAT + GLITER', 'henna-pengantin-warna-cokelat-gliter-henna03', 'cccc.jpg', 400000, '<p>&nbsp;</p>\r\n\r\n<p>Spesifikasi:</p>\r\n\r\n<p><em>1.&nbsp; sudah termasuk kuku palsu</em></p>\r\n\r\n<p><em>2.&nbsp; untuk sepasang tangan pengantin</em></p>\r\n\r\n<p><em>3.&nbsp; waterproof (tahan 1-2 hari) tergantung kondisi kulit dan dengan tehnik finishing &amp; perawatan yang benar menggunakan bahan body paint yang berkualitas</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>harga belum termasuk biaya transport</em></p>\r\n', 'Henna Pengantin', 'Publish', '2020-12-02 03:41:11', '2020-12-02 02:41:11'),
('Henna04', 6, 'HENNA PENGANTIN WARNA PUTIH', 'henna-pengantin-warna-putih-henna04', '8.jpeg', 400000, '<p>Spesifikasi:</p>\r\n\r\n<p><em>1.&nbsp; sudah termasuk kuku palsu</em></p>\r\n\r\n<p><em>2.&nbsp; untuk sepasang tangan pengantin</em></p>\r\n\r\n<p><em>3.&nbsp; waterproof (tahan 1-2 hari) tergantung kondisi kulit dan dengan tehnik finishing &amp; perawatan yang benar menggunakan bahan body paint yang berkualitas</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>harga belum termasuk biaya transport</em></p>\r\n', 'henna pengantin', 'Publish', '2020-12-02 03:43:27', '2020-12-02 02:43:27'),
('Henna05', 6, 'HENNA PENGANTIN WARNA PUTIH', 'henna-pengantin-warna-putih-henna05', 'mmmm.jpg', 400000, '<p>Spesifikasi:</p>\r\n\r\n<p><em>1.&nbsp; sudah termasuk kuku palsu</em></p>\r\n\r\n<p><em>2.&nbsp; untuk sepasang tangan pengantin</em></p>\r\n\r\n<p><em>3.&nbsp; waterproof (tahan 1-2 hari) tergantung kondisi kulit dan dengan tehnik finishing &amp; perawatan yang benar menggunakan bahan body paint yang berkualitas</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>harga belum termasuk biaya transport</em></p>\r\n', 'henna pengantin', 'Publish', '2020-12-02 03:45:10', '2020-12-02 02:45:10'),
('Henna06', 6, 'HENNA PENGANTIN WARNA COKELAT', 'henna-pengantin-warna-cokelat-henna06', 'z.jpg', 400000, '<p>Spesifikasi:</p>\r\n\r\n<p><em>1.&nbsp; sudah termasuk kuku palsu</em></p>\r\n\r\n<p><em>2.&nbsp; untuk sepasang tangan pengantin</em></p>\r\n\r\n<p><em>3.&nbsp; waterproof (tahan 1-2 hari) tergantung kondisi kulit dan dengan tehnik finishing &amp; perawatan yang benar menggunakan bahan body paint yang berkualitas</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>harga belum termasuk biaya transport</em></p>\r\n', 'henna pengantin', 'Publish', '2020-12-02 03:47:34', '2020-12-02 02:47:34'),
('parsel01', 4, 'PARSEL PERNIKAHAN MINIMALIS', 'parsel-pernikahan-minimalis-parsel01', 'Screenshot_2020-08-26-13-13-46-386.jpeg', 35000, '<p>Kami hanya menyediakan jasa pembuatan parsel.</p>\r\n\r\n<p>yang kami sediakan :</p>\r\n\r\n<p>1. Box parsel (<em>hanya meminjamkan bukan untuk dijual</em>)</p>\r\n\r\n<p>2. Alat alat untuk kebutuhan parsel</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pemesan hanya cukup menyiapkan isi untuk didalam box.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Harga di atas adalah harga perbox</em></p>\r\n', 'parsel pernikahan', 'Publish', '2020-12-01 18:00:40', '2020-12-02 02:35:40'),
('parsel02', 4, 'PARSEL PERNIKAHAN BOX GOLD', 'parsel-pernikahan-box-gold-parsel02', 'Screenshot_2020-08-26-13-16-37-312.jpeg', 35000, '<p>Kami hanya menyediakan jasa pembuatan parsel.</p>\r\n\r\n<p>yang kami sediakan :</p>\r\n\r\n<p>1. Box parsel (<em>hanya meminjamkan bukan untuk dijual</em>)</p>\r\n\r\n<p>2. Alat alat untuk kebutuhan parsel</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pemesan hanya cukup menyiapkan isi untuk didalam box.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Harga di atas adalah harga perbox</em></p>\r\n\r\n<p><em>harga belom termasuk biaya transport</em></p>\r\n', 'Parsel Pernikahan', 'Publish', '2020-12-02 03:30:31', '2020-12-02 02:49:31'),
('parsel03', 4, 'PARSEL PERNIKAHAN BOX BLACK GOLD', 'parsel-pernikahan-box-black-gold-parsel03', 'Screenshot_2020-08-26-13-14-31-4931.jpeg', 35000, '<p>Kami hanya menyediakan jasa pembuatan parsel.</p>\r\n\r\n<p>yang kami sediakan :</p>\r\n\r\n<p>1. Box parsel (<em>hanya meminjamkan bukan untuk dijual</em>)</p>\r\n\r\n<p>2. Alat alat untuk kebutuhan parsel</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pemesan hanya cukup menyiapkan isi untuk didalam box.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Harga di atas adalah harga perbox</em></p>\r\n\r\n<p><em>harga belom termasuk biaya transport</em></p>\r\n', 'parsel pernikahan', 'Publish', '2020-12-02 03:37:48', '2020-12-02 02:49:19'),
('SB01', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb01', 'SB01.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Mahar pernikahan scrapbook', 'Publish', '2020-11-17 20:40:15', '2020-12-01 16:54:01'),
('SB02', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb02', 'SB02.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'mahar pernikahan scrapbook', 'Publish', '2020-11-17 20:40:46', '2020-12-01 16:53:25'),
('SB03', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb03', 'SB03.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'mahar pernikahan scrapbook', 'Publish', '2020-11-17 20:48:54', '2020-12-01 16:52:49'),
('SB04', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb04', 'SB041.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Mahar pernikahan', 'Publish', '2020-12-01 17:48:51', '2020-12-01 16:48:51'),
('SB05', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb05', 'SB05.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'Publish', '2020-12-01 17:49:56', '2020-12-01 16:49:56'),
('SB06', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb06', 'SB06.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'Publish', '2020-12-01 17:50:55', '2020-12-01 16:50:55'),
('SB07', 5, 'MAHAR PERNIKAHAN SCRAPBOOK', 'mahar-pernikahan-scrapbook-sb07', 'SB07.png', 1500000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'Publish', '2020-12-01 17:51:39', '2020-12-01 16:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `no_rekening` varchar(20) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `gambar` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`no_rekening`, `nama_bank`, `nama_pemilik`, `gambar`) VALUES
('123456', 'BANK BCA', 'ELMA MAULA SILVA', 'bca1.png'),
('1234567', 'BANK BRI', 'ELMA MAULA SILVA', 'bank_mandiri_copy1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_transport` int(11) NOT NULL,
  `biaya_transport` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tanggal_pernikahan` date NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_pelanggan`, `kode_produk`, `harga`, `jumlah`, `total_harga`, `id_transport`, `biaya_transport`, `subtotal`, `tanggal_pernikahan`, `tanggal_transaksi`, `tanggal_update`) VALUES
(4, '19112020YWPMJCSB', 6, 'henna01', 400000, 1, 400000, 5, 100000, 15950000, '2020-12-23', '2020-11-19 00:00:00', '2020-11-19 01:23:15'),
(5, '19112020YWPMJCSB', 6, 'SB01', 5150000, 1, 5150000, 5, 100000, 15950000, '2020-12-23', '2020-11-19 00:00:00', '2020-11-19 01:23:15'),
(6, '19112020YWPMJCSB', 6, 'SB02', 5150000, 2, 10300000, 5, 100000, 15950000, '2020-12-23', '2020-11-19 00:00:00', '2020-11-19 01:23:15'),
(7, '20112020SEOJCNUG', 6, 'henna01', 400000, 1, 400000, 4, 150000, 5700000, '2020-11-21', '2020-11-20 00:00:00', '2020-11-20 10:56:59'),
(8, '20112020SEOJCNUG', 6, 'SB01', 5150000, 1, 5150000, 4, 150000, 5700000, '2020-11-21', '2020-11-20 00:00:00', '2020-11-20 10:56:59'),
(9, '26112020K9CFVH6I', 6, 'SB02', 5150000, 1, 5150000, 3, 100000, 5250000, '2020-12-23', '2020-11-26 00:00:00', '2020-11-26 01:16:19'),
(11, '27112020X2IGWQ1U', 6, 'SB01', 5150000, 1, 5150000, 3, 100000, 5250000, '2020-12-10', '2020-11-27 00:00:00', '2020-11-27 20:40:02'),
(12, '011220204MAY0BEJ', 6, 'SB01', 5150000, 1, 5150000, 3, 100000, 5250000, '2020-12-17', '2020-12-01 00:00:00', '2020-12-01 05:05:37'),
(13, '02122020YXYRKZ8L', 6, 'SB07', 1500000, 1, 1500000, 3, 100000, 1600000, '2020-12-16', '2020-12-02 00:00:00', '2020-12-02 09:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id_transport` int(11) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `biaya_transport` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id_transport`, `tujuan`, `biaya_transport`, `urutan`, `tanggal_update`) VALUES
(3, 'Kota Tangerang', 100000, 1, '2020-08-24 09:45:48'),
(4, 'Tangerang Selatan', 150000, 2, '2020-08-24 09:46:12'),
(5, 'Jakarta Barat', 100000, 3, '2020-08-24 09:46:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `no_rekening` (`no_rekening`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`no_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_transport` (`id_transport`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`no_rekening`) REFERENCES `rekening` (`no_rekening`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id_transport`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
