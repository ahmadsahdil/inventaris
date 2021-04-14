-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Waktu pembuatan: 14 Apr 2021 pada 08.29
-- Versi server: 8.0.23
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poskobumn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `merk_barang` varchar(100) NOT NULL,
  `stok` int NOT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `total_masuk` int NOT NULL,
  `total_keluar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `merk_barang`, `stok`, `satuan`, `keterangan`, `total_masuk`, `total_keluar`) VALUES
(2032, 'Connector RJ45', 'Belden', 100, 'Pcs', NULL, 100, 0),
(2033, 'Cable Patch Cord FO', 'SC - SC', 5, 'Pcs', NULL, 0, 0),
(2034, 'Cable Patch Cord FO', 'SC - ST', 4, 'Pcs', NULL, 0, 0),
(2035, 'Cable Patch Cord FO', 'ST - LC', 2, 'Pcs', NULL, 0, 0),
(2036, 'Cable Patch Cord FO', 'ST - ST', 2, 'Pcs', NULL, 0, 0),
(2037, 'Cable Patch Cord FO', 'SC - LC', 4, 'Pcs', NULL, 10, 8),
(2038, 'Kabel UTP', 'Commscope Ca', 0, 'Roll', NULL, 0, 0),
(2039, 'Kabel Fiber Optic', '2 Core 1 Seling', 0, 'Meter', NULL, 0, 0),
(2040, 'SFP', 'Ericson', 3, 'Pcs', NULL, 0, 1),
(2041, 'SFP', 'Cisco', 1, 'Pcs', NULL, 4, 3),
(2042, 'SFP', 'Huawei', 4, 'Pcs', NULL, 0, 0),
(2043, 'Grid Antena', 'Ubiquity M5', 18, 'Pcs', NULL, 0, 0),
(2044, 'Horn', 'Ubiquity M5', 9, 'Pcs', NULL, 0, 0),
(2045, 'L Grid Radio', 'Ubiquity M5', 3, 'Pcs', '2 lengkap dan 1 tidak lengkap', 0, 0),
(2046, 'Fast Connector FO', 'Fast Connector SC', 3, 'Pcs', '-', 0, 0),
(2047, 'Sambungan FO', 'SC - SC', 26, 'Pcs', '', 0, 4),
(2048, 'UPS', 'TOPAZ 700 WATT', 0, 'Unit', NULL, 0, 0),
(2049, 'AKI', 'Yuasa 12V-32A', 0, 'Unit', NULL, 0, 0),
(2050, 'AKI', 'Yuasa 12V-50A', 0, 'Unit', NULL, 0, 0),
(2051, 'CCTV Indoor', 'Hikvision', 2, 'Pcs', NULL, 6, 4),
(2052, 'CCTV Outdoor', 'Hikvision', 1, 'Pcs', NULL, 5, 4),
(2053, 'Kabel CCTV', 'MMP', 0, 'Roll', NULL, 2, 2),
(2054, 'Adaptor CCTV', '12 V', 5, 'Pcs', NULL, 5, 0),
(2055, 'Jack DC CCTV', '-', 0, 'Pcs', NULL, 0, 0),
(2056, 'Connector BNC CCTV', 'BNC', 10, 'Pcs', NULL, 10, 0),
(2057, 'OTB', '4 Core', 1, 'Pcs', NULL, 2, 1),
(2058, 'Server', 'Rack Server TMC 11H', 1, 'Unit', 'rusak rectifier', 0, 0),
(2059, 'Dudukan Server', 'Dudukan Rack Server', 1, 'Unit', '', 0, 0),
(2060, 'Switch', '-', 0, 'Unit', NULL, 0, 0),
(2061, 'ODP FO', 'Fiber Optic', 0, 'Unit', NULL, 0, 0),
(2062, 'Roset', 'Fiber Optic', 0, 'Pcs', NULL, 0, 0),
(2064, 'Pigtail FO', 'FO', 0, 'Pcs', NULL, 0, 0),
(2065, 'Wire Tracker', '-', 1, 'Pcs', NULL, 1, 0),
(2066, 'Sok Pipa', '-', 0, 'Pcs', NULL, 0, 0),
(2067, 'L Pipa', '-', 0, 'Pcs', NULL, 0, 0),
(2068, 'Klem Pipa', '-', 0, 'Pcs', NULL, 0, 0),
(2069, 'Connector DC Female', '-', 0, 'Pcs', NULL, 8, 8),
(2070, 'Connector DC Male', '-', 0, 'Pcs', NULL, 8, 8),
(2071, 'UPS', 'UPS 602B', 1, 'Unit', NULL, 1, 0),
(2072, 'Access Point', 'Ubiquity NSM2', 0, 'Pcs', NULL, 2, 2),
(2073, 'Media Converter', 'tp-link', 2, 'Pcs', NULL, 0, 0),
(2074, 'Router', 'Mikrotik RB750r2', 1, 'Pcs', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int NOT NULL,
  `id_penerima` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah_keluar` int NOT NULL,
  `tgl_keluar` date NOT NULL,
  `keterangan_keluar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_penerima`, `id_barang`, `jumlah_keluar`, `tgl_keluar`, `keterangan_keluar`) VALUES
(12, 36, 2037, 4, '2021-03-29', 'masing\" 2 disisi Shelter XL dan Pelanggan'),
(13, 36, 2041, 1, '2021-03-29', 'disisi Shelter XL'),
(14, 36, 2040, 1, '2021-03-29', 'Disisi Pelanggan'),
(15, 36, 2057, 1, '2021-03-29', 'disisi Shelter XL'),
(16, 37, 2037, 4, '2021-03-29', 'Masing\" 2 di shelter XL dan  Pelanggan'),
(17, 37, 2041, 2, '2021-03-29', 'Masing\" 1 disisi Shelter XL dan Pelanggan'),
(19, 38, 2053, 2, '2021-03-29', '1 stok di mess trawangan dan 1 dari kantor mataram'),
(20, 38, 2052, 4, '2021-03-29', ''),
(21, 38, 2051, 4, '2021-03-29', ''),
(22, 39, 2072, 2, '2021-04-12', 'Penambahan Titik AP di Villa 7 dan Villa Baru'),
(23, 38, 2069, 8, '2021-04-29', 'Barang perbaikan CCTV di TDC'),
(24, 38, 2070, 8, '2021-03-29', 'Barang perbaikan CCTV di TDC'),
(25, 37, 2047, 4, '2021-03-29', 'Masing\" 2 di shelter XL dan Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int NOT NULL,
  `id_pemberi` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan_masuk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_pemberi`, `id_barang`, `jumlah`, `tgl_masuk`, `keterangan_masuk`) VALUES
(210, 12, 2056, 10, '2020-07-10', ''),
(211, 12, 2051, 2, '2020-07-10', ''),
(212, 12, 2052, 1, '2020-07-10', ''),
(213, 12, 2053, 1, '2020-07-10', ''),
(214, 12, 2054, 5, '2020-07-10', ''),
(215, 12, 2041, 4, '2021-03-22', ''),
(216, 12, 2051, 4, '2021-05-25', 'Barang perbaikan CCTV di TDC'),
(217, 12, 2052, 4, '2021-03-25', 'Barang perbaikan CCTV di TDC'),
(218, 12, 2069, 4, '2021-03-25', 'Barang perbaikan CCTV di TDC'),
(219, 12, 2070, 4, '2021-03-25', 'Barang perbaikan CCTV di TDC'),
(220, 12, 2053, 1, '2021-03-25', 'Barang perbaikan CCTV di TDC'),
(221, 12, 2037, 10, '2021-03-25', ''),
(222, 12, 2057, 2, '2021-03-25', ''),
(223, 12, 2065, 1, '2021-03-26', ''),
(224, 12, 2071, 1, '2021-03-31', 'UPS Dari Trawangan'),
(225, 12, 2072, 2, '2021-04-10', 'Barang Gili Eco'),
(226, 12, 2032, 100, '2021-04-10', 'Terdapat 2 Bungkus (1 Bungkus isi 50Pcs)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur`
--

CREATE TABLE `infrastruktur` (
  `id_infrastruktur` int NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `kondisi` text NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_wilayah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `infrastruktur`
--

INSERT INTO `infrastruktur` (`id_infrastruktur`, `nama_barang`, `merk`, `mac`, `jumlah`, `satuan`, `kondisi`, `keterangan`, `id_wilayah`) VALUES
(2, 'nama trawangan', 'merk', 'mac', 1, 'satuan', 'kondisi', 'keterangan', 2),
(4, 'nama mataram', 'merk', 'mac', 1, 'satuan', 'kondisi', 'keterangan', 3),
(5, 'trawangan', 'ad', 'ads', 2, 'jhg', 'hg', 'hg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberi`
--

CREATE TABLE `pemberi` (
  `id_pemberi` int NOT NULL,
  `nama_pemberi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberi`
--

INSERT INTO `pemberi` (`id_pemberi`, `nama_pemberi`, `nama`) VALUES
(12, 'PT. Jaya Kartha Solusindo', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int NOT NULL,
  `nama_penerima` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama_penerima`, `atas_nama`, `alamat`) VALUES
(36, 'NASA Net', '', 'Sukaraja Lombok Timur'),
(37, 'NIYAZ Net', '', 'Aikmel LombokTimur'),
(38, 'TDC', '', 'Gili Trawangan'),
(39, 'Gili Eco', '', 'Gili Trawangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Admin','Operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
(3, 'operator', 'fe96dd39756ac41b74283a9292652d366d73931f', 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(2, 'trawangan'),
(3, 'MATARAM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_bantuan_masuk` (`id_barang`),
  ADD KEY `id_posko` (`id_penerima`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_donatur` (`id_pemberi`),
  ADD KEY `id_jenis_bantuan` (`id_barang`);

--
-- Indeks untuk tabel `infrastruktur`
--
ALTER TABLE `infrastruktur`
  ADD PRIMARY KEY (`id_infrastruktur`);

--
-- Indeks untuk tabel `pemberi`
--
ALTER TABLE `pemberi`
  ADD PRIMARY KEY (`id_pemberi`);

--
-- Indeks untuk tabel `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2075;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur`
--
ALTER TABLE `infrastruktur`
  MODIFY `id_infrastruktur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemberi`
--
ALTER TABLE `pemberi`
  MODIFY `id_pemberi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_4` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id_penerima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_5` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_4` FOREIGN KEY (`id_pemberi`) REFERENCES `pemberi` (`id_pemberi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
