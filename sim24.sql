-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Nov 2018 pada 10.29
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim24`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id`, `divisi`, `ket`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Direktur', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(2, 'Kepala Workshop', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(3, 'Staff Finance', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(4, 'PIC', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(5, 'K. Armada Gudang & Mobil', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(6, 'Kepala Divisi Driver Produksi', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(7, 'Kepala Divisi Listrik', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(8, 'Kepala Divisi Meubel', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(9, 'Designer', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(10, 'Drafter', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(11, 'Painting', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(12, 'Admin Project', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(13, 'Admin marketing', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(14, 'IT Support', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(15, 'Programmer', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(16, 'HRD', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(17, 'admin wifi digital', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(18, 'Admin Workshop', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(19, 'Staff Gudang', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(20, 'Staf Sipil', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(21, 'Teknisi Besi', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(22, 'Teknisi Meubel', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(23, 'teknisi support', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(24, 'listrik', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(25, 'Driver ', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(26, 'Driver Mobile Ent. Evalia', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(27, 'Driver Produksi', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(28, 'produksi', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(29, 'operasional', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(30, 'Sarana Umum', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(31, 'Umum', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(32, 'SPV', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(33, 'Marketing', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(34, 'Security', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(35, 'TL-Wifi', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL),
(36, 'OB', '-', 0, 1, '2018-11-27 13:21:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_doc_pengajuan`
--

CREATE TABLE `tbl_doc_pengajuan` (
  `id` int(11) NOT NULL,
  `no_mor` varchar(255) DEFAULT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan_dibuat_oleh` varchar(255) NOT NULL,
  `id_karyawan_yang_mengajukan` varchar(255) NOT NULL,
  `id_karyawan_yang_menyetujui` varchar(255) NOT NULL,
  `id_karyawan_yang_mengetahui` varchar(255) NOT NULL,
  `id_karyawan_finance` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_doc_pengajuan`
--

INSERT INTO `tbl_doc_pengajuan` (`id`, `no_mor`, `nama_pekerjaan`, `tanggal`, `id_karyawan_dibuat_oleh`, `id_karyawan_yang_mengajukan`, `id_karyawan_yang_menyetujui`, `id_karyawan_yang_mengetahui`, `id_karyawan_finance`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, '002', 'service printer', '2018-11-21', '1', '2', '3', '4', '5', 0, 1, '2018-11-21 17:18:59', NULL, NULL),
(2, '009', 'hardisk', '2018-11-23', '1', '2', '3', '4', '5', 0, 1, '2018-11-23 09:31:10', NULL, NULL),
(3, '001', 'service ds', '2018-11-24', '1', '2', '3', '4', '5', 0, 1, '2018-11-24 12:51:21', 1, '2018-11-24 07:34:36'),
(4, '4', 'adf', '2018-11-26', '1', '2', '5', '4', '3', 0, 1, '2018-11-26 09:53:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_doc_pengajuan_detail`
--

CREATE TABLE `tbl_doc_pengajuan_detail` (
  `id` int(11) NOT NULL,
  `doc_pengajuan_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `harga_per_unit` double NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_doc_pengajuan_detail`
--

INSERT INTO `tbl_doc_pengajuan_detail` (`id`, `doc_pengajuan_id`, `keterangan`, `unit`, `harga_per_unit`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'service printer', 4, 67000, 0, 1, '2018-11-21 17:19:33', NULL, NULL),
(2, 2, 'WDC ', 7, 800000, 0, 1, '2018-11-23 09:31:10', NULL, NULL),
(3, 2, 'Ongkos Kirim', 2, 11000, 0, 1, '2018-11-23 09:31:10', NULL, NULL),
(4, 3, 'dad', 3, 500000, 0, 1, '2018-11-24 12:51:21', 1, '2018-11-24 07:34:36'),
(5, 4, 'fdsf', 5, 900000, 0, 1, '2018-11-26 09:53:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_doc_pengajuan_opo`
--

CREATE TABLE `tbl_doc_pengajuan_opo` (
  `id` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan_dibuat_oleh` varchar(255) NOT NULL,
  `id_karyawan_yang_mengajukan` varchar(255) NOT NULL,
  `id_karyawan_yang_menyetujui` varchar(255) NOT NULL,
  `id_karyawan_yang_mengetahui` varchar(255) NOT NULL,
  `id_karyawan_finance` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_doc_pengajuan_opo`
--

INSERT INTO `tbl_doc_pengajuan_opo` (`id`, `nama_pekerjaan`, `tanggal`, `id_karyawan_dibuat_oleh`, `id_karyawan_yang_mengajukan`, `id_karyawan_yang_menyetujui`, `id_karyawan_yang_mengetahui`, `id_karyawan_finance`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(5, 'Keperluan Hardisk', '2018-11-23', '1', '2', '3', '4', '5', 0, 0, '2018-11-23 10:29:40', 1, '2018-11-24 08:19:26'),
(6, 'asdasdas', '2018-11-26', '1', '2', '4', '5', '3', 0, 1, '2018-11-26 10:43:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_doc_pengajuan_opo_detail`
--

CREATE TABLE `tbl_doc_pengajuan_opo_detail` (
  `id` int(11) NOT NULL,
  `doc_pengajuan_opo_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `harga_per_unit` double NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_doc_pengajuan_opo_detail`
--

INSERT INTO `tbl_doc_pengajuan_opo_detail` (`id`, `doc_pengajuan_opo_id`, `keterangan`, `unit`, `harga_per_unit`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(4, 5, 'd', 5, 100000, 0, 1, '2018-11-23 10:29:40', 1, '2018-11-24 08:19:26'),
(5, 5, 'j', 4, 200000, 0, 1, '2018-11-26 15:10:30', NULL, NULL),
(6, 6, 'asd', 10, 1000000, 0, 0, '2018-11-26 16:43:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `divisi_id` varchar(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `child` tinyint(5) NOT NULL,
  `join_date` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `alamat_tempat_tinggal` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `ktp_sim` varchar(40) NOT NULL,
  `kk` varchar(40) NOT NULL,
  `no_bpjs_kesehatan` varchar(40) NOT NULL,
  `no_bpjstk` varbinary(40) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `nik`, `nama_karyawan`, `username`, `divisi_id`, `sex`, `marital_status`, `child`, `join_date`, `date_of_birth`, `alamat_tempat_tinggal`, `pendidikan_terakhir`, `ktp_sim`, `kk`, `no_bpjs_kesehatan`, `no_bpjstk`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Des- 0001', 'Bunti Hamonangan Marbun Lumban Gaol', '-', '1', 'M', 'N', 1, '2006-01-01', '2006-01-30', 'Jl. Gn Guntur D VI No. 170 Perumnas Cirebon', 'S 1', '3274030710830007', '3274031112130012', '0002258099188', 0x3134303232303934343034, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(2, 'Des- 0002', 'Asen Sugianto', '-', '2', 'M', 'N', 2, '2003-01-01', '2008-01-30', 'Villa Intan III Blok p1 No.18 Gn Jati Cirebon ', 'SMA', '3209212602810009', '3209210808110013', 'mutasi (0001133333212)', 0x3137303332333939313736, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(3, 'Des- 0004', 'Tonny Hermawan Suhana', '-', '3', 'M', 'BN', 0, '2005-04-01', '2008-01-31', 'Jl. Lawanggada Gang Jati No. 11 RT/RW 001/004 Kel. Pulasaren Kec. Pekalipan Cirebon', 'SMA', '3274043105870003', '3274040105070376', 'KIS ', 0x3135303239363833343338, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(4, 'Des- 0006', 'Ferry Bambang Afrianto', '-', '4', 'M', 'BN', 0, '2003-01-01', '2001-01-30', 'Jl. Gunung Bromo D 16 RT 07 RW 03 Perumnas Cirebon', 'SMA', '3274030504830020', '3274030505070051', '0002290969405', 0x3134303232303934343533, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(5, 'Des- 0007', 'Raden Iman Akbar', '-', '9', 'M', 'BN', 0, '2003-08-01', '2006-01-30', 'Jl. Merpati VII no. 08 RT. 004/011 Kel. Larangan Kec. Harjamukti - Cirebon', 'SMA', '3274030407820009', '3274032808070205', 'KIS ', 0x3134303232303934343338, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(6, 'Des- 0014', 'M Nazarudin Noor', '-', '12', 'M', 'BN', 0, '2002-01-01', '2009-01-01', 'Ds. Wanasaba Kidul Blok Rahayu 1 RT 03/01 Kec. Talun Kab.Cirebon', 'SMA', '3209141308920000', '3209141103100003', 'KIS ', 0x3134303232303934353337, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(7, 'Des- 0015', 'Irine Faradilla', '-', '13', 'F', 'BN', 0, '2009-01-01', '2001-01-01', 'Jl. Cideng Jaya gg Bribin no.141 rt 16 rw 04 Kec Kedawung Kab Cirebon', 'SMK', '3209204409940003', '3209200501090186', '0001313284037', 0x3137303439373036383834, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(8, 'Des- 0016', 'Priantino Kusumoharjo', '-', '10', 'M', 'BN', 0, '2004-01-01', '2000-01-01', 'Jl.cideng jaya blok Sijaba Rt/Rw 016/004,Ds.Kertawinangun,kab.cirebon', 'SMK', '3209200408940004', '3209203006080009', 'KIS ', 0x3134303232303934343631, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(9, 'Des- 0019', 'Muhamad Riyadi', '-', '21', 'M', 'N', 1, '2004-01-01', '2003-01-01', 'Tengah Tani', 'SMP', '3274021504910006', '3274020611130007', '0001521282745', 0x3134303232303934363639, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(10, 'Des- 0020', 'Baharudin Yusuf Sustiyono', '-', '21', 'M', 'N', 2, '2007-01-01', '0000-00-00', 'Kp Pesantren RT 006/002 Kel Kalijaga Kec Harjamukti', 'SMP', '3274031003850012', '3274032002080001', '0001519653251', 0x3134303232303934353435, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(11, 'Des- 0021', 'Dadang', '-', '21', 'M', 'N', 4, '2004-01-01', '2006-01-27', 'Jagasatru Timur, Kec. Karang anyar, Cirebon', 'SMA', '3274040607740001', '3274040504100006', 'KIS ', 0x3137303439373036383335, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(12, 'Des- 0022', 'Jamaludin', '-', '11', 'M', 'N', 2, '2008-01-01', '2005-01-30', 'Cangkol tengah RT 008/005 Kel Lemahwungkuk Kec lemahwungkuk', 'SMK', '3274020807830010', '3274021802090006', '0001521282879', 0x3134303333303934363032, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(13, 'Des- 0023', 'Suyono (Dede)', '-', '11', 'M', 'N', 1, '2009-01-01', '0000-00-00', 'Cangkol tengah rt4/rw05 kel lemahwungkuk kec lemahwungkuk', 'SMP', '3274021609900006', '3274023001120006', 'KIS ', 0x3134303232303934353934, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(14, 'Des- 0024', 'Toto Heryanto', '-', '31', 'M', 'N', 4, '2004-01-01', '2009-01-23', 'cangkol utara rt01/rw06 ', 'SD', '3274020607650001', '3274022801110009', 'KIS ', 0x3135303239363833343132, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(15, 'Des- 0025', 'Ismanto', '-', '31', 'M', 'N', 2, '2005-01-01', '2006-01-29', 'Karang jalak RT 002/006 Kel Sunyaragi Kec Kesambi', 'SMA', '3274051907810010', '3274052411100010', '0001523304696', 0x3134303232303934363130, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(16, 'Des- 0026', 'Samsu', '-', '7', 'M', 'N', 3, '2003-01-01', '2006-01-26', 'Karang anyar RT 003/001 Kel Silebu Kec Pancalang', 'STM', '3208220205730002', '3208222811060005', '0001521283072', 0x3134303232303934353630, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(17, 'Des- 0027', 'Nana Sumarna', '-', '27', 'M', 'N', 4, '2009-01-01', '2001-09-29', 'Jl. Kalijaga Kp. Peguyuban RT 004/002 Kel Pegambiran Kec Lemahwungkuk', 'SD', '3274022408790008', '3274021304090002', 'KIS ', 0x3137303439373036393334, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(18, 'Des- 0028', 'Slamet Supriyadi', '-', '6', 'M', 'N', 2, '2001-01-01', '2005-01-30', 'Blok Caplek RT 002/RW 006 Kel Sitiwinangun Kec Jamblang ', 'SD', '3209401206840001', '3209401109080022', 'KIS ', 0x3134303232303934363737, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(19, 'Des- 0029', 'Hasan Apandi', '-', '27', 'M', 'N', 2, '2002-01-01', '2008-01-31', 'Pesatren RT 005/002 Kel Kalijaga Kec Harjamukti', 'SMA', '3274031105870016', '3274033012140006 (kk baru dan istri baru', '0001521282903', 0x3135303239363833343230, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(20, 'Des- 0030', 'Bambang Haryanto', '-', '27', 'M', 'N', 1, '2003-01-01', '2002-01-31', 'Kedungneng Rt 006 / RW 001 kedungneng Kec Losari brebes Jawa Tengah', 'SMP', '3329121611860003', '3329122605150027', 'KIS ', 0x3137303439373036393432, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(21, 'Des- 0031', 'Rahmat Mugiono', '-', '26', 'M', 'N', 2, '2002-01-01', '2002-01-27', 'blok kebon kunir rt 01 rw 02 desa kedungjaya kecamatan kedawung kabupaten cirebon', 'SMA', '3209201010740016', '3209202905120004', '0001612418297', 0x3137303439373036383932, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(22, 'Des- 0032', 'Baron', '-', '8', 'M', 'N', 2, '2002-01-01', '2007-01-26', 'Ds. Gamel, Kec. Plered rt03/rw01  Blok Kauman', 'SD', '3209360707720001', '3209363009070650', '0001519653148', 0x3137303439373036393931, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(23, 'Des- 0034', 'Agung Prabowo', '-', '22', 'M', 'N', 2, '2006-01-01', '2002-01-27', 'Blok Pengaringan RT 006/RW 002 Desa Sarabau Kec Plered', 'SMA', '3209191301760006', '3209361304170005', '0002290941066', 0x3137303439373037303037, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(24, 'Des- 0035', 'Rahudi', '-', '22', 'M', 'N', 2, '2006-01-01', '2002-01-27', 'Blok Surawiyaja, rt13 rw05, Ds. Wotgali, Kec. Plered', 'SD', '3209360412750001', '3209362701090002', 'KIS', 0x3137303439373037303135, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(25, 'Des- 0036', 'Andriyanus', '-', '22', 'M', 'BN', 0, '2000-01-01', '2004-01-01', 'Blok Silengkong rt07 rw02 Ds. Sarabau. Kec. Plered', 'SMA', '3209362103880001', '3209363009070742', '0002290962598', 0x3137303439373036393637, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(26, 'Des- 0037', 'Prima Priyanto', '-', '19', 'M', 'BN', 0, '2005-01-01', '2008-01-01', 'Dusun 01, rt02/rw01, Desa Bayalangu Lor, Kec. Gegesik. Cirebon', 'D III', '3209280501920002', '3209280106090022', '0002290946613', 0x3137303439373036393833, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(27, 'Des- 0038', 'Jakub Widjaja', '-', '5', 'M', 'N', 2, '2007-01-01', '2003-01-26', 'Jl. Pancuran Barat 002/004 Sukapura Kejaksan Kota Cirebon', 'D III', '3274012405720001', '3274011205110006', 'ikut bpjs istri', 0x3137303439373036393735, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(28, 'Des- 0039', 'Mohamad Gunawan', '-', '31', 'M', 'N', 1, '2000-01-01', '2006-01-01', 'cangkol utara rt01/rw06', 'SD', '3274022403900006', '3274020612140006', 'KIS ', 0x3134303232303934373139, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(29, 'Des- 0040', 'Taufik Maulana', '-', '31', 'M', 'BN', 0, '2006-03-01', '1997-07-12', 'jl. Ujung harapan no 77 rt/rw 006/007 kel. Drajat, kec. Kesambi', 'SMK', '3274051207970001', '3274052202110025', '0002290974917', 0x3137303439373036393030, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(30, 'Des- 0041', 'Kusmono', '-', '30', 'M', 'N', 1, '2003-01-01', '0000-00-00', 'Kp Cangkol tengah rt/rw 05/05 kec lemahwungkuk', 'SMA', '3274022505890008', '3274021308110001', 'JAMKESMAS', 0x3137303439373037303233, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(31, 'Des- 0042', 'Ratmana (Totong)', '-', '23', 'M', 'N', 1, '2002-03-01', '1977-12-21', 'Jl. Wijayakusuma Blok Kunyang Desa Getasan Kec Depok kab Cirebon ', 'SD', '3209312112770001', '3209313009070422', 'KIS ', 0x3137303439373036393539, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(32, 'Des- 0044', 'M. Toha', '-', '27', 'M', 'N', 2, '2000-01-01', '1980-03-18', 'dusun Dangder rt/rw 03/01', 'SD', '3209121803800008', '3209120601090042', 'KIS ', 0x3137303439373037303439, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(33, 'Des- 0046', 'Vika Putri Dayanti', '-', '17', 'F', 'BN', 0, '2002-01-01', '2007-05-01', 'Jl.Cipto MK Perumahan TNI AL No.40 rt/rw 06/09 ', 'D III Teknik Sipil', '3274056903930009', '3274052604100003', '0001227136926', 0x3137303439373036373737, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(34, 'Des- 0049', 'Rini Setyawati', '-', '33', 'F', 'N', 2, '2004-01-01', '2009-01-26', 'Jl.Purnabakti No. 65 rt 01 rw 01 Kel. Kesenden Kec. Kejaksan Cirebon.', 'SMA', '3274054612720005', '3274050805070001', '0001311723281', 0x3137303439373036383736, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(35, 'Des- 0052', 'Kamina', '-', '31', 'M', 'N', 4, '2002-01-01', '2002-01-24', 'Blok Pengaringan Rt 006 Rw 002 Kel. Sarabau Kec. Plered Kab. Cirebon.', 'SMP', '3209362803680001', '3209362603100014', 'KIS ', 0x3137303439373037303830, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(36, 'Des- 0054', 'Novita Putri', '-', '18', 'F', 'BN', 0, '2008-01-01', '2007-01-01', 'Jl. Pelangi III D. 29 No. 17 Lobunta Rt 003 Rw 009 Kel. Banjarwangunan Kec. Mundu Kab. Cirebon.', 'SMK', '3209125911940003', '3209122101100008', 'KIS ', 0x3134303037343930393939, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(37, 'Des- 0056', 'Rifki Adi Permana', '-', '24', 'M', 'BN', 0, '2000-01-01', '2003-01-01', 'Desa Gamel Blok Kauman rt 003 rw 001 Kab. Cirebon.', 'SMA', '3209360202950001', '3209361504100005', 'JAMKESMAS', 0x3137303439373036393138, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(38, 'Des- 0058', 'Tanira', '-', '25', 'M', 'N', 1, '2008-01-01', '2002-01-25', 'Blok weringin Rt 02 Rw 01 Sarabau Plered', 'SMEA', '3209362503700002', '3209362603100003', '0001882598747', 0x3137303439373036393030, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(39, 'Des- 0061', 'Asril Maulana', '-', '9', 'M', 'BN', 0, '2008-01-01', '2005-01-01', 'B A P Pamijahan E 7 No. 3 Rt 016 Rw 003 Kel. Pamijahan Kec .Plumbon Kab. Cirebon', 'SMK', '2309182203920007', '3209182202063639', '0001837336353', 0x3137303439373036383031, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(40, 'Des- 0073', 'R. Ibnu Wicaksono Wibowo', '-', '9', 'M', 'BN', 0, '2003-06-01', '2007-01-01', 'Perum taman harapan 1 banjarsari No A3 rt 05 rw 012 kel. Sukoharjo kec. Ngaglik kab. Sleman yogyakarta', '-', '3404120208880001', '3404122009060026', '0002063546245', 0x3138303031353033343334, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(41, 'Des- 0075', 'Muhamad Soleh', '-', '31', 'M', 'BN', 0, '2007-11-01', '2000-01-01', 'Dusun Pahing RT 007 RW 005 Kel. Nanggela Kec. Mandirancan Kab. Kuningan', '-', '3208141305960005', '3208141201090002', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(42, 'Des- 0078', 'Kristian S', '-', '14', 'M', 'N', 2, '0000-00-00', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(43, 'Des- 0079', 'Anggun Nurfitasari S. I . Kom', '-', '33', 'F', 'BN', 0, '2005-01-01', '2000-01-01', 'Villa intan I Blok B4 No. 11 Ds. Jadimulya Kec. Gunung Jati Kab. Cirebon', 'SI', '3209214204910011', '3209210212080020', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(44, 'Des- 0081', 'Elang Rudi Hartono S PD', '-', '28', 'M', 'N', 0, '2009-01-01', '2006-01-29', 'komplek keraton kacirebonan no. 75 Rt 04 rw 02 Cirebon', 'SI', '3277021601800009', '3277021103090016', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(45, 'Des- 0082', 'Eki Indradi', '-', '14', 'M', 'BN', 0, '2006-01-01', '2003-01-01', 'Jl. Sutawinangun Gg. Rahayu No. 15 Kec. Kedawung Cirebon', 'SI', '3274052509940001', '3274051204070054', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(46, 'Des- 0059', 'Ariyanto Mantani', '-', '29', 'M', 'N', 2, '2007-01-01', '2009-01-30', 'Jl. Semeru Barat Utama Rt 003 Rw 006 Kel. Tegalharjo Kec. Jebres Kota Surakarta.', 'S I', '3311090707820003', '3372040208170005', '0002290964242', 0x3137303439373037313036, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(47, 'Des- 0083', 'Betseba Irawaty', '-', '16', 'M', 'BN', 0, '2001-01-01', '2000-01-30', 'Gg. Pelangi V RT 01/RW 010 Karang Anyar, Jagasatru Selatan, Pekalipan Cirebon', 'S1', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(48, 'Des- 0089', 'Robiyanto', '-', '31', 'M', '-', 0, '2008-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(49, 'Des- 0090', 'Moh. Adnan', '-', '31', 'M', '-', 0, '2005-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(50, 'Des- 0091', 'Abdul Azis Al Fuqron', '-', '31', 'M', '-', 0, '2008-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(51, 'Des- 0092', 'Meli Amaliah', '-', '31', 'F', '-', 0, '2002-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(52, 'Des- 0094', 'Tia Rani', '-', '31', 'F', '-', 0, '2002-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(53, 'Des- 0095', 'Dimas Satria', '-', '14', 'M', '-', 0, '2004-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(54, 'Des- 0096', 'Diki Prianto', '-', '20', 'M', '2000000', 0, '2005-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(55, 'Des- 0097', 'Aexsa Alfyano', '-', '15', 'M', '3000000', 0, '2004-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(56, 'Des- 0008', 'Adrian K', '-', '32', 'M', 'N', 2, '2007-01-01', '2001-01-01', 'Komplek Puri sejahtra Jl. Menteng II no 12a Batujajar ( citunjung ) Kab bandung Barat ', '                                                  ', '3273081510880001', '3273081206110066', '0001660087091', 0x3137303439373037313134, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(57, 'Des- 0011', 'Usep Suherman', '-', '9', 'M', 'BN', 0, '2001-01-01', '2008-01-01', 'Kp Legok sura Rt 03 RW 13 Ds baros Kec Arjasari Kab bandung ', 'SMA', '3204162501920001', '3204160304059497', '0002290955051', 0x3137303439373036383237, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(58, 'Des- 0012', 'Ginanjar', '-', '4', 'M', 'BN', 0, '2002-01-01', '2007-05-01', 'Jl dago giri no 32 Rt 02 Rw 08 Ds Mekarwangi Kec Lembang Kab Bandung barat', 'SMK', '3217011909980002', '3217012804051587', '-', 0x3137303534313332383238, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(59, 'Des- 0013', 'Asep yance ', '-', '34', 'M', 'N', 3, '2009-01-01', '2003-01-27', 'Jl Sukapura Rt 01 Rw 06 Ds sukapura Kec Dayeuhkolot Kab Bandung ', 'SLTP', '-', '3204121009070043', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(60, 'Des- 0065', 'Afgan', '-', '31', 'M', 'BN', 0, '2009-01-01', '0000-00-00', 'jl banjar sari V No. 08 antapani bandung', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(61, 'Des- 0050', 'Bambang Gatot Pamungkas', '-', '33', 'M', 'N', 2, '2007-01-01', '2009-02-24', 'Jl. Piranha II/ 03 rt 021 rw 005 Kel. Minomartani Kec. Ngaglik Kota Sleman (DIY).', 'S I', '3404121410650002', '3404121202056986', '0002258099188', 0x3137303439373037303938, 0, 0, '2018-11-27 13:41:04', NULL, NULL),
(62, '-', ' Edi Nurrochman', '-', '35', 'M', '-', 0, '2008-01-01', '0000-00-00', '-', '-', '-', '-', '-', 0x2d, 0, 0, '2018-11-27 13:41:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_qa`
--

CREATE TABLE `tbl_qa` (
  `id` int(11) NOT NULL,
  `quick_access` varchar(255) NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_qa`
--

INSERT INTO `tbl_qa` (`id`, `quick_access`, `page`, `description`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'USR001', 'home.php?pg=user&act=view', 'Untuk Melihat Tabel User', 0, 1, '2018-11-21 17:06:58', NULL, NULL),
(2, 'USR002', 'home.php?pg=user&act=add', 'Untuk Menambah  User', 0, 1, '2018-11-21 17:06:58', NULL, NULL),
(3, 'USR003', 'home.php?pg=user&act=edit', 'Untuk Edit  User', 0, 1, '2018-11-21 17:06:58', NULL, NULL),
(4, 'USR004', 'home.php?pg=user&act=delete', 'Untuk Hapus  User tea', 0, 1, '2018-11-21 17:06:58', NULL, NULL),
(7, 'QA001', 'home.php?pg=qa&act=view', 'Untuk melihat quick access', 0, 1, '2018-11-22 10:51:15', NULL, NULL),
(8, 'QA002', 'home.php?pg=qa&act=add', 'Untuk Menambah quick access', 0, 1, '2018-11-22 10:51:25', NULL, NULL),
(9, 'QA003', 'home.php?pg=qa&act=edit', 'Untuk mengedit quick access', 0, 1, '2018-11-22 10:51:36', NULL, NULL),
(10, 'QA004', 'home.php?pg=qa&act=delete', 'Untuk mengahpus quick access', 0, 1, '2018-11-22 10:51:43', NULL, NULL),
(11, 'QDTL001', 'home.php?pg=qdtl&act=view', 'Untuk melihat quick access detail', 0, 1, '2018-11-22 10:51:57', NULL, NULL),
(12, 'QDTL002', 'home.php?pg=qdtl&act=add', 'Untuk menambah quick access detail', 0, 1, '2018-11-22 10:52:05', NULL, NULL),
(13, 'QDTL003', 'home.php?pg=qdtl&act=edit', 'Untuk mengedit quick access detail', 0, 1, '2018-11-22 10:52:11', NULL, NULL),
(14, 'QDTL004', 'home.php?pg=qdtl&act=delete', 'Untuk menghapus quick access detail', 0, 1, '2018-11-22 10:52:22', NULL, NULL),
(15, 'DOCA001', 'home.php?pg=doc_a&act=view', 'Untuk Melihat Dokumen Pengajuan JPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(16, 'DOCA002', 'home.php?pg=doc_a&act=add', 'Untuk Menambah Dokumen JPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(17, 'DOCA003', 'home.php?pg=doc_a&act=edit', 'Untuk Edit Dokumen JPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(18, 'DOCA004', 'home.php?pg=doc_a&act=delete', 'Untuk Hapus Dokumen JPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(19, 'DOCB001', 'home.php?pg=doc_b&act=view', 'Untuk Melihat Dokumen Pengajuan OPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(20, 'DOCB002', 'home.php?pg=doc_b&act=add', 'Untuk Menambah Dokumen  OPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(21, 'DOCB003', 'home.php?pg=doc_b&act=edit', 'Untuk Edit Dokumen OPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(22, 'DOCB004', 'home.php?pg=doc_b&act=delete', 'Untuk Hapus Dokumen OPO', 0, 1, '2018-11-22 10:52:22', NULL, '2018-11-22 10:52:22'),
(23, 'DIV001', 'home.php?pg=divisi&act=view', 'Untuk Melihat Data Divisi', 0, 1, '2018-11-24 10:19:58', NULL, NULL),
(24, 'DIV002', 'home.php?pg=divisi&act=add', 'Untuk Menambah Data Divisi', 0, 1, '2018-11-24 10:20:06', NULL, NULL),
(25, 'DIV003', 'home.php?pg=divisi&act=edit', 'Untuk Edit Data Divisi', 0, 1, '2018-11-24 10:20:13', NULL, NULL),
(26, 'DIV004', 'home.php?pg=divisi&act=delete', 'Untuk Hapus Data Divisi', 0, 1, '2018-11-24 10:20:20', NULL, NULL),
(27, 'KAR001', 'home.php?pg=karyawan&act=view', 'Untuk Melihat  Data Karyawan', 0, 1, '2018-11-24 10:20:32', NULL, NULL),
(28, 'KAR002', 'home.php?pg=karyawan&act=add', 'Untuk Menambah Data Karyawan', 0, 1, '2018-11-24 10:20:38', NULL, NULL),
(29, 'KAR003', 'home.php?pg=karyawan&act=edit', 'Untuk Edit Data Karyawan', 0, 1, '2018-11-24 10:20:44', NULL, NULL),
(30, 'KAR004', 'home.php?pg=karyawan&act=delete', 'Untuk Hapus Data Karyawan', 0, 1, '2018-11-24 10:20:51', NULL, NULL),
(31, 'fas001', 'home.php?pg=fas&act=view', 'unterdasd', 1, 1, '2018-11-24 05:58:47', 1, '2018-11-24 06:21:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_qa_detail`
--

CREATE TABLE `tbl_qa_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qa_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_qa_detail`
--

INSERT INTO `tbl_qa_detail` (`id`, `user_id`, `qa_id`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 1, 0, 1, '2018-11-22 11:24:20', NULL, NULL),
(2, 1, 2, 0, 1, '2018-11-22 11:25:17', NULL, NULL),
(3, 1, 3, 0, 1, '2018-11-22 11:25:20', NULL, NULL),
(4, 1, 4, 0, 1, '2018-11-22 11:25:30', NULL, NULL),
(5, 1, 5, 0, 1, '2018-11-22 11:25:33', NULL, NULL),
(6, 1, 6, 0, 1, '2018-11-22 11:25:37', NULL, NULL),
(7, 1, 7, 0, 1, '2018-11-22 11:25:41', NULL, NULL),
(8, 1, 8, 0, 1, '2018-11-22 11:25:45', NULL, NULL),
(9, 1, 9, 0, 1, '2018-11-22 11:25:50', NULL, NULL),
(10, 1, 10, 0, 1, '2018-11-22 11:25:54', NULL, NULL),
(11, 1, 11, 0, 1, '2018-11-22 11:25:57', NULL, NULL),
(12, 1, 12, 0, 1, '2018-11-22 11:26:01', NULL, NULL),
(13, 1, 13, 0, 1, '2018-11-22 11:26:03', NULL, NULL),
(14, 1, 14, 0, 1, '2018-11-22 11:26:06', NULL, NULL),
(15, 1, 15, 0, 1, '2018-11-22 11:26:09', NULL, NULL),
(16, 1, 16, 0, 1, '2018-11-22 11:26:15', NULL, NULL),
(17, 1, 17, 0, 1, '2018-11-22 11:26:18', NULL, NULL),
(18, 1, 18, 0, 1, '2018-11-22 11:26:23', NULL, NULL),
(19, 1, 19, 0, 1, '2018-11-22 11:33:53', NULL, NULL),
(20, 1, 20, 0, 1, '2018-11-22 09:19:17', 1, '2018-11-22 09:24:56'),
(21, 1, 21, 0, 1, '2018-11-23 10:10:04', NULL, NULL),
(22, 1, 22, 0, 1, '2018-11-23 10:10:20', NULL, NULL),
(23, 1, 23, 0, 1, '2018-11-24 10:28:02', NULL, NULL),
(24, 1, 24, 0, 1, '2018-11-24 10:28:09', NULL, NULL),
(25, 1, 25, 0, 1, '2018-11-24 10:28:13', NULL, NULL),
(26, 1, 26, 0, 1, '2018-11-24 10:28:16', NULL, NULL),
(27, 1, 27, 0, 1, '2018-11-24 10:28:20', NULL, NULL),
(28, 1, 28, 0, 1, '2018-11-24 10:28:26', NULL, NULL),
(29, 1, 29, 0, 1, '2018-11-24 10:28:46', NULL, NULL),
(30, 1, 30, 0, 1, '2018-11-24 10:28:57', NULL, NULL),
(31, 4, 29, 1, 1, '2018-11-24 06:31:26', 1, '2018-11-24 06:42:12'),
(32, 4, 4, 0, 1, '2018-11-26 07:26:52', 1, '2018-11-26 07:27:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1, '2018-11-21 17:05:11', NULL, NULL),
(2, 'DTL001', '8987dc873c81c61c5bbc18dcf7b7e46a', 0, 1, '2018-11-21 17:05:11', NULL, NULL),
(3, 'FAC001', 'e63aac06b490bc47624ee1709fd5c1b7', 0, 1, '2018-11-21 17:05:11', NULL, NULL),
(4, 'MKT001', 'fe64788e3aafbef093fa636fa3c8d5e5', 0, 1, '2018-11-21 17:05:11', NULL, NULL),
(10, 'admpm2', 'd3df161a85d19111890bb169a2de0c58', 1, 1, '2018-11-22 04:05:25', 1, '2018-11-24 05:55:01'),
(11, 'admpm3', 'f901c64c7c56b25ec86a3480e9b3d238', 1, 1, '2018-11-26 05:03:22', 1, '2018-11-26 05:04:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_log`
--

CREATE TABLE `tbl_user_log` (
  `id` int(11) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `ip_local` varchar(255) NOT NULL,
  `ip_public` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) NOT NULL,
  `login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_log`
--

INSERT INTO `tbl_user_log` (`id`, `mac_address`, `ip_local`, `ip_public`, `hostname`, `login`, `user_id`) VALUES
(1, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-17 09:34:48', 1),
(2, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-17 10:13:17', 1),
(3, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-18 13:21:04', 1),
(4, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-18 17:05:18', 1),
(5, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-18 17:21:05', 1),
(6, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-18 17:31:23', 1),
(7, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-18 17:48:34', 1),
(8, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-18 17:59:26', 1),
(9, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-19 08:27:34', 1),
(10, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-19 11:10:08', 1),
(11, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-21 09:37:30', 1),
(12, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-21 14:40:21', 1),
(13, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-21 15:47:26', 1),
(14, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-21 15:48:13', 1),
(15, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-21 16:06:05', 1),
(16, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-22 09:20:30', 1),
(17, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-22 12:00:27', 2),
(18, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-22 13:15:01', 1),
(19, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-22 13:30:54', 2),
(20, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-22 14:19:06', 1),
(21, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-23 09:12:50', 1),
(22, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-23 18:12:24', 1),
(23, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-23 18:30:00', 1),
(24, '68-F7-28-94-91-8E\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-23 22:39:45', 1),
(25, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-24 09:39:06', 1),
(26, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-24 10:29:40', 1),
(27, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-24 10:30:36', 1),
(28, '36-68-95-83-A3-A5\r', '::1', '::1', 'DESKTOP-K2RJKD4\r\n', '2018-11-24 13:18:21', 1),
(29, '36-E6-AD-B6-3C-FD\r', '::1', '::1', 'CRB-DTL00-001-P\r\n', '2018-11-26 10:48:43', 1),
(30, '36-E6-AD-B6-3C-FD\r', '127.0.0.1', '127.0.0.1', 'CRB-DTL00-001-P\r\n', '2018-11-26 12:36:25', 1),
(31, '36-E6-AD-B6-3C-FD\r', '127.0.0.1', '127.0.0.1', 'CRB-DTL00-001-P\r\n', '2018-11-27 09:30:37', 1),
(32, '36-E6-AD-B6-3C-FD\r', '127.0.0.1', '127.0.0.1', 'CRB-DTL00-001-P\r\n', '2018-11-27 13:45:17', 1),
(33, '36-E6-AD-B6-3C-FD\r', '127.0.0.1', '127.0.0.1', 'CRB-DTL00-001-P\r\n', '2018-11-27 16:09:18', 4),
(34, '36-E6-AD-B6-3C-FD\r', '127.0.0.1', '127.0.0.1', 'CRB-DTL00-001-P\r\n', '2018-11-27 16:13:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_val`
--

CREATE TABLE `tbl_user_val` (
  `id` int(11) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `ip_local` varchar(255) NOT NULL,
  `login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_val`
--

INSERT INTO `tbl_user_val` (`id`, `mac_address`, `ip_local`, `login`, `user_id`) VALUES
(2, '36-E6-AD-B6-3C-FD\r', '::1', '2018-11-26 10:48:43', 1),
(3, '36-E6-AD-B6-3C-FD\r', '127.0.0.1', '2018-11-27 16:09:18', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doc_pengajuan`
--
ALTER TABLE `tbl_doc_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doc_pengajuan_detail`
--
ALTER TABLE `tbl_doc_pengajuan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doc_pengajuan_opo`
--
ALTER TABLE `tbl_doc_pengajuan_opo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doc_pengajuan_opo_detail`
--
ALTER TABLE `tbl_doc_pengajuan_opo_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qa`
--
ALTER TABLE `tbl_qa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qa_detail`
--
ALTER TABLE `tbl_qa_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_val`
--
ALTER TABLE `tbl_user_val`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_doc_pengajuan`
--
ALTER TABLE `tbl_doc_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_doc_pengajuan_detail`
--
ALTER TABLE `tbl_doc_pengajuan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_doc_pengajuan_opo`
--
ALTER TABLE `tbl_doc_pengajuan_opo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_doc_pengajuan_opo_detail`
--
ALTER TABLE `tbl_doc_pengajuan_opo_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tbl_qa`
--
ALTER TABLE `tbl_qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_qa_detail`
--
ALTER TABLE `tbl_qa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_user_val`
--
ALTER TABLE `tbl_user_val`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
