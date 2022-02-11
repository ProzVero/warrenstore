-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jan 2022 pada 05.01
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warren_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `pass_user` varchar(85) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_user`, `pass_user`, `nama_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nirmayanti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `merek_barang` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `merek_barang`, `harga`, `deskripsi`, `stok`, `id_kategori`, `id_admin`) VALUES
(1, 'Polo agung', 56000, '<p>sdjfgasdfasfdas</p><p>dfsadfasdfbsahdfaskdfsadf&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', 27, 1, 1),
(2, 'Kaos Dreambirds Artwear', 150000, '<p>Siapa yang tidak mengenal desain logo burung hantu yang terkenal? \r\nBagi kamu yang belum tahu desain ini lekat dengan merk Dreambirds \r\nArtwear. Warna dan desain yang simpel menunjukan gaya yang elegan.</p>\r\n\r\n\r\n\r\n<p>Gaya ini juga cocok bagi kamu yang tidak suka menjadi pusat \r\nperhatian, namun tetap memiliki selera sebagai pribadi yang kalem namun \r\nmenarik. <br></p>', 195, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `id_detail_keranjang` int(11) NOT NULL,
  `no_penjualan` varchar(25) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `ukuran` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`id_detail_keranjang`, `no_penjualan`, `id_barang`, `id_konsumen`, `ukuran`, `jumlah`) VALUES
(1, 'NOP-202108280001', 2, 1, 'XL', 2),
(2, 'NOP-202108280001', 1, 1, 'L', 2),
(3, 'NOP-202108280002', 2, 1, 'M', 1),
(8, 'NOP-202108290003', 2, 2, 'XL', 1),
(9, 'NOP-202201020004', 2, 3, 'XL', 2),
(10, 'NOP-202201020005', 2, 3, 'XL', 2),
(11, 'NOP-202201020006', 1, 3, 'XL', 2),
(12, 'NOP-202201020007', 1, 3, 'XL', 1),
(13, 'NOP-202201020008', 1, 3, 'XL', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar_barang`
--

CREATE TABLE `tbl_gambar_barang` (
  `id_gambar_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gambar_barang`
--

INSERT INTO `tbl_gambar_barang` (`id_gambar_barang`, `id_barang`, `gambar`) VALUES
(2, 2, '20210811031354-1.-Dreambirds-Artwear-300x300.jpg'),
(3, 2, '20210811031745-kaosbird.jpg'),
(5, 2, '20210811031836-dream4.jpg'),
(6, 1, '20210811110245-polo1.jpg'),
(7, 1, '20210811110254-polo2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `id_admin`) VALUES
(1, 'Baju Kaos', 1),
(2, 'Celana Jeans', 1),
(3, 'Kaos Kaki', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `ukuran` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsumen`
--

CREATE TABLE `tbl_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(60) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id_konsumen`, `nama_konsumen`, `alamat`, `kota`, `tlp`, `username`, `password`) VALUES
(1, 'Alesha', 'jl pendidikan no 10 luwu utara', '246', '', 'al', '97282b278e5d51866f8e57204e4820e5'),
(2, 'Ramadan', 'Btn Merdeka No. 40 kecamatan Wara timur Kota Palopo', '328', '0986324623', 'ra', 'db26ee047a4c86fbd2fba73503feccb6'),
(3, 'Yudhi', 'tandipau', '328', '082333853392', 'yudhi', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_penjualan` varchar(25) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `upload_bukti` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `kurir` text NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `resi` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `bank_pengirim` varchar(50) NOT NULL,
  `bank_tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `bank`, `nama_rekening`, `no_rekening`, `gambar`, `id_login`) VALUES
(1, 'BRI', 'Alesha', '03247243923742424234', '20210829104514-bri.png', 1),
(2, 'BNI', 'Alesha', '3243456546', '20210829104807-bni.jpg', 1),
(3, 'BCA', 'Alesha', '344324234', '20210829104828-bca.png', 1),
(4, 'Mandiri', 'Mandiri', '00023432354345345', '20210829105451-mandiri.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ukuran`
--

CREATE TABLE `tbl_ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ukuran` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ukuran`
--

INSERT INTO `tbl_ukuran` (`id_ukuran`, `id_barang`, `ukuran`) VALUES
(1, 2, 'XL'),
(5, 2, 'L'),
(6, 2, 'M'),
(7, 2, 'S'),
(8, 1, 'XL'),
(9, 1, 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`id_detail_keranjang`);

--
-- Indexes for table `tbl_gambar_barang`
--
ALTER TABLE `tbl_gambar_barang`
  ADD PRIMARY KEY (`id_gambar_barang`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `id_detail_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_gambar_barang`
--
ALTER TABLE `tbl_gambar_barang`
  MODIFY `id_gambar_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
