-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2018 at 04:00 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bunga`
--

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pesanan`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pesanan` (
  `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `nm_pembayar` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `gambar_bukti` text NOT NULL,
  `status` enum('Diproses','Diterima','Ditolak') DEFAULT 'Diproses',
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `konfirmasi_pesanan`
--


-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(15) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(25) NOT NULL,
  `tarif` int(15) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nm_kota`, `tarif`) VALUES
(1, 'Padang', 15000),
(2, 'Bukittinggi', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE IF NOT EXISTS `level_user` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nm_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nm_level`) VALUES
(1, 'Admin'),
(2, 'Pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Belum Selesai','Sudah Selesai') NOT NULL DEFAULT 'Belum Selesai',
  `alamat` varchar(200) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_produk`, `id_user`, `tgl_pesan`, `status`, `alamat`, `nomor_hp`, `id_kota`, `jumlah`) VALUES
(31, 5, 9, '2018-05-24 16:17:09', 'Sudah Selesai', 'Padang', '081345890990', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nm_produk` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `stok` int(5) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `deskripsi`, `harga`, `gambar`, `stok`) VALUES
(12, 'Anting Putri', 'tinggi 80 cm', 250000, '9.jpg', 2),
(5, 'Bunga Ester', 'merah', 75000, '3.jpg', 35),
(6, 'Bambu Kuning', 'Bambu tinggi 2,5 m', 350000, '26.jpg', 3),
(7, 'Serud Merah', 'merah', 80000, '21.jpg', 8),
(8, 'Bunga melati', 'putih', 70000, '11.jpg', 30),
(9, 'bunga taman', 'besar', 500000, '12.jpg', 6),
(10, 'Bunga Ester', 'Kuning', 75000, '1.jpg', 30),
(11, 'Cemara Udag', 'baik', 300000, '25.jpg', 10),
(14, 'bunga kertas', 'baik-baik saja', 50000, '4.jpg', 15),
(17, 'Rose Juliette', 'baik-baik saja', 150000, '27.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `pass`, `nm_lengkap`, `id_level`, `email`) VALUES
(9, 'admin', 'admin', '', 1, ''),
(23, 'Udin', '1234', 'Si udin', 2, ''),
(20, 'afdhal', '1234', '', 1, ''),
(27, 'jarwo', '1234', 'jarwo kuat', 2, 'jarwo@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
