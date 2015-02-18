-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Feb 2015 pada 10.51
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bayar_cicilan`
--

CREATE TABLE IF NOT EXISTS `t_bayar_cicilan` (
  `kode_cicilan` varchar(20) NOT NULL,
  `kode_kredit` varchar(20) NOT NULL,
  `tgl_cicilan` date NOT NULL,
  `jml_cicilan` float NOT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `cicilan_sisa_ke` float NOT NULL,
  `cicilan_sisa_harga` float NOT NULL,
  PRIMARY KEY (`kode_cicilan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_beli_cash`
--

CREATE TABLE IF NOT EXISTS `t_beli_cash` (
  `kode_cash` varchar(20) NOT NULL,
  `ktp_pembeli` int(20) NOT NULL,
  `kode_mobil` varchar(20) NOT NULL,
  `cash_tanggal` date NOT NULL,
  `cash_bayar` float NOT NULL,
  PRIMARY KEY (`kode_cash`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_beli_cash`
--

INSERT INTO `t_beli_cash` (`kode_cash`, `ktp_pembeli`, `kode_mobil`, `cash_tanggal`, `cash_bayar`) VALUES
('CASH2015/02/010002', 15000000, 'TOYO20150001', '2015-02-01', 150000000),
('CASH090220150001', 15000000, 'TOYO20150001', '2015-02-08', 150000000),
('CASH09.02.20150003', 15000000, 'TOYO20150001', '2009-02-20', 90000000),
('CASH09.02.20150004', 15000000, 'TOYO20150001', '2009-02-20', 1),
('CASH090220150005', 15000000, 'TOYO20150001', '2009-02-20', 11111),
('CASH090220150006', 15000000, 'TOYO20150001', '2009-02-20', 900000000),
('C201502007', 15000000, 'TOYO20150001', '2009-02-20', 0),
('C2015022008', 15000000, 'TOYO20150001', '2009-02-20', 15000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kredit`
--

CREATE TABLE IF NOT EXISTS `t_kredit` (
  `kode_kredit` varchar(20) NOT NULL,
  `ktp_pembeli` varchar(25) NOT NULL,
  `kode_paket` varchar(20) NOT NULL,
  `kode_mobil` varchar(20) NOT NULL,
  `tgl_kredit` date NOT NULL,
  `fotokopi_ktp` varchar(50) NOT NULL,
  `fotokopi_kk` varchar(50) NOT NULL,
  `fotokopi_slip_gaji` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kredit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kredit`
--

INSERT INTO `t_kredit` (`kode_kredit`, `ktp_pembeli`, `kode_paket`, `kode_mobil`, `tgl_kredit`, `fotokopi_ktp`, `fotokopi_kk`, `fotokopi_slip_gaji`) VALUES
('K2015020006', '15000000', 'PK0001', 'TOYO20150001', '2015-02-09', '', '', ''),
('K2015020005', '15000000', 'PK0001', 'TOYO20150001', '2015-02-09', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mobil`
--

CREATE TABLE IF NOT EXISTS `t_mobil` (
  `kode_mobil` varchar(20) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `harga_mobil` float NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_mobil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_mobil`
--

INSERT INTO `t_mobil` (`kode_mobil`, `merk`, `type`, `warna`, `harga_mobil`, `gambar`) VALUES
('TOYO20150001', 'INNOVA 2014', 'KELUARGA', 'HITAM', 150000000, 'innova_color4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_paket_kredit`
--

CREATE TABLE IF NOT EXISTS `t_paket_kredit` (
  `kode_paket` varchar(20) NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `paket_jml_cicilan` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  PRIMARY KEY (`kode_paket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_paket_kredit`
--

INSERT INTO `t_paket_kredit` (`kode_paket`, `uang_muka`, `paket_jml_cicilan`, `bunga`) VALUES
('PK0001', 30, 12, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembeli`
--

CREATE TABLE IF NOT EXISTS `t_pembeli` (
  `ktp_pembeli` int(25) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(200) NOT NULL,
  `telp_pembeli` varchar(20) NOT NULL,
  PRIMARY KEY (`ktp_pembeli`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pembeli`
--

INSERT INTO `t_pembeli` (`ktp_pembeli`, `nama_pembeli`, `alamat_pembeli`, `telp_pembeli`) VALUES
(15000000, 'DONNY', 'CIPANAS', '085724923311');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `level`) VALUES
('U0001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('U0003', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
('U0002', 'superuser', '0baea2f0ae20150db78f58cddac442a9', 'superuser');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
