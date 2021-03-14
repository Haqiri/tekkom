-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2021 pada 17.44
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tekkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('Laki - Laki','Perempuan') NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pendidikan` varchar(2) NOT NULL,
  `sk` varchar(30) NOT NULL,
  `sa` varchar(20) NOT NULL,
  `rp` varchar(300) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `jk`, `jabatan`, `pendidikan`, `sk`, `sa`, `rp`, `foto`) VALUES
(0001, '061830700478', 'M Rifqi Hanif', 'Laki - Laki', 'Lektor', 'S3', 'Dosen Tetap', 'Aktif', 'https://sinta.ristekbrin.go.id/authors/detail?id=6664681&view=overview', 'rifqi.jpg'),
(0002, '061830700479', 'M Fernaldo Harefa', 'Laki - Laki', 'Wakil Lektor', 'S3', 'Dosen Tetap', 'Aktif', 'https://sinta.ristekbrin.go.id/authors/detail?id=6036507&view=overview', 'Fernaldo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `id` int(24) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `ktg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`id`, `judul`, `isi`, `foto`, `tgl`, `author`, `ktg`) VALUES
(1, 'POLSRIVALTER III 2019 (Festival Teknik Komputer) | POLSRI', 'Pengumuman Hasil Evaluasi Semester Ganjil Tahun Akademik 2020/2021 Politeknik Negeri Sriwijaya Nomor :1439/PL6.3.1/PU/2021\r\nFebruary 27, 2021BeritaWD\r\nPENGUMUMAN HASIL EVALUASI SEMESTER GANJIL\r\nTAHUN AKADEMIK 2020/2021\r\nPOLITEKNIK NEGERI SRIWIJAYA\r\nNomor : 1439/PL6.3.1/PU/2021\r\n<br>\r\nMemperhatikan hasil evaluasi Ujian Tengah Semester (UTS) dan Ujian Akhir Semester (UAS) pada semester ganjil tahun akademik 2020/2021 pada :\r\n\r\nA. Program Diploma III\r\n1 Program Studi Teknik Sipil\r\n2 Program Studi Teknik Mesin\r\n3 Program Studi Teknik Listrik\r\n4 Program Studi Teknik Elektronika\r\n5 Program Studi Teknik Telekomunikasi\r\n6 Program Studi Teknik Kimia\r\n7 Program Studi Akuntansi\r\n8 Program Studi Administrasi Bisnis\r\n9 Program Studi Teknik Komputer\r\n10 Program Studi Manajemen Informatika\r\n11 Program Studi Bahasa Inggris\r\n\r\nB. Program Sarjana Terapan Diploma IV\r\n1 Program Studi Perancangan Jalan dan Jembatan\r\n2 Program Studi Teknik Mesin Produksi Dan Perawatan\r\n3 Program Studi Teknik Elektro Konsentrasi Mekatronika\r\n4 Program Studi Teknik Telekomunikasi\r\n5 Program Studi Teknik Energi\r\n6 Program Studi Teknologi Kimia Industri\r\n7 Program Studi Akuntansi Sektor Publik\r\n8 Program Studi Usaha Perjalanan Wisata\r\n9 Program Studi Manajemen Bisnis\r\n10 Program Studi Teknologi Informatika Multimedia Digital\r\n11 Program Studi Manajemen Informatika\r\n\r\nC. Program Kerjasama Diploma III\r\n1. Jurusan Teknik Mesin, Program Studi Teknik Mesin Konsentrasi Teknik Mesin Airframe & Power Plant (AP)\r\n2. Jurusan Teknik Elektro,Program Studi Teknik Elektronika Konsentrasi Teknik Electrical Avionic (EA)\r\n3 Jurusan Teknik Elektro, Program Studi Teknik Listrik (PT. PLN Persero)\r\n4 Jurusan Teknik Elektro, Program Studi Teknik Listrik (PT. Trias Indra Saputra)\r\n\r\nD. Program Kerjasama Sarjana Terapan Diploma IV\r\n1. Program Studi Teknik Mesin (Management and Science University)\r\n2. Program Studi Akuntansi Sektor Publik (Management and Science University)\r\n3. Program Studi Manajemen Informatika (Management and Science University)\r\n\r\nE. Program Magister (S2) Teknik Energi Terbarukan\r\n\r\ntanggal 24 Februari 2021, dengan ini Direktur Politeknik Negeri Sriwijaya mengumumkan hasil-hasil tersebut seperti terlampir.\r\n\r\nPalembang, 26 Februari 2021\r\nDirektur,\r\n\r\ndto\r\n\r\nDr. Ing. Ahmad Taqwa, M.T.\r\nNIP 196812041997031001', 'valter.jpg', '2021-03-07', 'Super Admin', 'Berita'),
(2, 'Tekkom Fun 2019 | POLSRI', 'Ahmad Zamheri Serahkan dana Pengembangan Kewira ushaan Mahasiswa\r\nJanuary 20, 2021BeritaEA\r\nSelasa/19/01/21, Bertempat di aula kantor administrasi Politeknik Negeri Sriwijaya (Polsri) Wakil Direktur III Polsri menyerahkan dana pengembangan kewirausahaan mahasiswa tahun 2020 sebanyak 17 Judul kelompok usaha yang telah berhasil didanai, dari 17 kelompok ini dalam pelaksanaannya dibimbing oleh dosen pembimbing setiap masing-masing kelompok. Periode pelaksanaan program ini selama 6 bulan dari bulan Januari sampai Juni 2021.\r\n<br>\r\nWakil Direktur Bidang Kemahasiswaan (WD III) Ahmad Zamheri menyampaikan dalam sambutannya bahwa program kewirausahaan mahasiswa ini bertujuan untuk meningkatkan kemampuan mahasiswa dalam berwira usaha sehingga soft skill para mahasiswa terbentuk bukan hanya untuk mencari lapangan kerja setelah selesai pendidikan di Polsri, melainkan untuk membuka peluang kerja serdiri sehingga meningkatkan budaya ekonomi kreatif dimasyarakat dan bahkan untuk membuka lapangan kerja bagi masyarakat lain. Besaran biaya yang di berikan kepada 17 kelompok usaha ini berasal dari dana DIPA Polsri tahun 2020. Program ini juga bukan hanya sebatas menjalankan usaha saja akan tetapi diarahkan untuk pengembangan usahanya nanti dibantu pemerintah melalu beberapa program dari pemerintah pusat, untuk mendapatkan bantuan dari pusat tentunya akan dilakukan kompetisi dari berbagai kampus di Indonesia ujarnya. Ketua program kewirausahaan mahasiswa Polsri Bainil Yulina menyampaikan selama program ini berlangsung para kelompok usaha akan dilakukan monitoring sebanyak dua kali dengan tujuan untuk mengukur keberhasilan program ini, jika hasil monitoring programnya tidak berjalan dengan baik dari masing ï¿½ masing kelompok maka kelompok usaha tersebut akan di putus pembiayaannya dari Polsri. Hasil dari program ini akan di kompetisikan di tingkat nasional. Program kewirausahaan mahasiswa Polsri ini sudah dimulai sejak tahun 2009 yang lalu sampai sekarang Alhamdulillah Polsri sudah beberapakali mendapatkan peringkat terbaik di tingkat nasional tentunya hal ini tidak terlepas dari keberhasilan para pembimbing yang sudah berpengalaman dalam mengelola usaha. Ujarnya.', 'tekkom.jpg', '2021-03-08', 'Super Admin', 'Berita'),
(3, 'Akreditasi Tekkom - D4 TIMD 2021 | POLSRI', 'banyuasin/21/1/21, Bertempat di aula kampus Politeknik Negeri Sriwijaya (Polsri) Banyuasin adara silahturahmi dan sosialisasi program kerja unit kegiatan mahsiswa (UKM) Polsri untuk mahasiswa baru kampus Polsri Banyuasi, acara ini dengan tujuan untuk mengajak para mahasiswa baru bergabung dalam kepengurusan UKM yang ada di Polsri sekaligus mencari bakat-bakat mahasiswa yang berprestasi maupun yang peunya kemampuan di berbagai bidang.\r\n\r\n<br>\r\nKegiatan ini di hadiri oleh Wakil Direktur III Polsri, Koordinator kampus Polsri Banyuasin, Para Ketua Jurusan, Dosen Pembibing ormawa, para perwakilan ormawa serta mahasiswa baru Polsri Kampus Banyuasin. Wakil Direktur III, Ahmad Zamheri menyampaikan bahwa kegiatan ini untuk menyamakan persepsi mahasiswa bahwa antara kampus Banyuasin dan Kampus Polsri Bukit tidak ada perbedaan perlakukan serta standar kurikulum yang diberikan, dia berharap para mahasiswa melalui kegiatan kemahasiswaan baik mahasiswa yang dikampus Banyuasin maupun yang dikampus bukit untuk ikut berperan dengan tujuan untuk meningkatkan softskill para mahasiswa selama pendidikan di Polsri. Banyak prestasi-prestasi yang sudah dicapai oleh para mahasiswa baik di tingkat regional, nasional bahkan di ajang internasional melalui program kerja kemahasiswaan.\r\n\r\n<br>\r\nZulkarnain dalam sambutannya menyampaikan bahwa pemeritah banyuasin sangat mengapresiasi kegiatan ini karena dan sangat mendukung pengembangan kampus Polsri di Banyuasin, bahkan saat ini pemerinah daerah sudah memproses hibah lahan seluas 100 ha lagi untuk kampus Polsri Banyuasin.', 'polsri.jpg', '2021-03-09', 'Super Admin', 'Berita'),
(4, 'POLSRIVALTER III 2019 (Festival Teknik Komputer) | POLSRI', 'Pengumuman Hasil Evaluasi Semester Ganjil Tahun Akademik 2020/2021 Politeknik Negeri Sriwijaya Nomor :1439/PL6.3.1/PU/2021\r\nFebruary 27, 2021BeritaWD\r\nPENGUMUMAN HASIL EVALUASI SEMESTER GANJIL\r\nTAHUN AKADEMIK 2020/2021\r\nPOLITEKNIK NEGERI SRIWIJAYA\r\nNomor : 1439/PL6.3.1/PU/2021\r\n\r\nMemperhatikan hasil evaluasi Ujian Tengah Semester (UTS) dan Ujian Akhir Semester (UAS) pada semester ganjil tahun akademik 2020/2021 pada :\r\n\r\nA. Program Diploma III\r\n1 Program Studi Teknik Sipil\r\n2 Program Studi Teknik Mesin\r\n3 Program Studi Teknik Listrik\r\n4 Program Studi Teknik Elektronika\r\n5 Program Studi Teknik Telekomunikasi\r\n6 Program Studi Teknik Kimia\r\n7 Program Studi Akuntansi\r\n8 Program Studi Administrasi Bisnis\r\n9 Program Studi Teknik Komputer\r\n10 Program Studi Manajemen Informatika\r\n11 Program Studi Bahasa Inggris\r\n\r\nB. Program Sarjana Terapan Diploma IV\r\n1 Program Studi Perancangan Jalan dan Jembatan\r\n2 Program Studi Teknik Mesin Produksi Dan Perawatan\r\n3 Program Studi Teknik Elektro Konsentrasi Mekatronika\r\n4 Program Studi Teknik Telekomunikasi\r\n5 Program Studi Teknik Energi\r\n6 Program Studi Teknologi Kimia Industri\r\n7 Program Studi Akuntansi Sektor Publik\r\n8 Program Studi Usaha Perjalanan Wisata\r\n9 Program Studi Manajemen Bisnis\r\n10 Program Studi Teknologi Informatika Multimedia Digital\r\n11 Program Studi Manajemen Informatika\r\n\r\nC. Program Kerjasama Diploma III\r\n1. Jurusan Teknik Mesin, Program Studi Teknik Mesin Konsentrasi Teknik Mesin Airframe & Power Plant (AP)\r\n2. Jurusan Teknik Elektro,Program Studi Teknik Elektronika Konsentrasi Teknik Electrical Avionic (EA)\r\n3 Jurusan Teknik Elektro, Program Studi Teknik Listrik (PT. PLN Persero)\r\n4 Jurusan Teknik Elektro, Program Studi Teknik Listrik (PT. Trias Indra Saputra)\r\n\r\nD. Program Kerjasama Sarjana Terapan Diploma IV\r\n1. Program Studi Teknik Mesin (Management and Science University)\r\n2. Program Studi Akuntansi Sektor Publik (Management and Science University)\r\n3. Program Studi Manajemen Informatika (Management and Science University)\r\n\r\nE. Program Magister (S2) Teknik Energi Terbarukan\r\n\r\ntanggal 24 Februari 2021, dengan ini Direktur Politeknik Negeri Sriwijaya mengumumkan hasil-hasil tersebut seperti terlampir.\r\n\r\nPalembang, 26 Februari 2021\r\nDirektur,\r\n\r\ndto\r\n\r\nDr. Ing. Ahmad Taqwa, M.T.\r\nNIP 196812041997031001', 'valter.jpg', '2021-03-07', 'Super Admin', 'Berita'),
(5, 'Tekkom Fun 2019 | POLSRI', 'Ahmad Zamheri Serahkan dana Pengembangan Kewira ushaan Mahasiswa\r\nJanuary 20, 2021BeritaEA\r\nSelasa/19/01/21, Bertempat di aula kantor administrasi Politeknik Negeri Sriwijaya (Polsri) Wakil Direktur III Polsri menyerahkan dana pengembangan kewirausahaan mahasiswa tahun 2020 sebanyak 17 Judul kelompok usaha yang telah berhasil didanai, dari 17 kelompok ini dalam pelaksanaannya dibimbing oleh dosen pembimbing setiap masing-masing kelompok. Periode pelaksanaan program ini selama 6 bulan dari bulan Januari sampai Juni 2021.\r\n<br>\r\nWakil Direktur Bidang Kemahasiswaan (WD III) Ahmad Zamheri menyampaikan dalam sambutannya bahwa program kewirausahaan mahasiswa ini bertujuan untuk meningkatkan kemampuan mahasiswa dalam berwira usaha sehingga soft skill para mahasiswa terbentuk bukan hanya untuk mencari lapangan kerja setelah selesai pendidikan di Polsri, melainkan untuk membuka peluang kerja serdiri sehingga meningkatkan budaya ekonomi kreatif dimasyarakat dan bahkan untuk membuka lapangan kerja bagi masyarakat lain. Besaran biaya yang di berikan kepada 17 kelompok usaha ini berasal dari dana DIPA Polsri tahun 2020. Program ini juga bukan hanya sebatas menjalankan usaha saja akan tetapi diarahkan untuk pengembangan usahanya nanti dibantu pemerintah melalu beberapa program dari pemerintah pusat, untuk mendapatkan bantuan dari pusat tentunya akan dilakukan kompetisi dari berbagai kampus di Indonesia ujarnya. Ketua program kewirausahaan mahasiswa Polsri Bainil Yulina menyampaikan selama program ini berlangsung para kelompok usaha akan dilakukan monitoring sebanyak dua kali dengan tujuan untuk mengukur keberhasilan program ini, jika hasil monitoring programnya tidak berjalan dengan baik dari masing ï¿½ masing kelompok maka kelompok usaha tersebut akan di putus pembiayaannya dari Polsri. Hasil dari program ini akan di kompetisikan di tingkat nasional. Program kewirausahaan mahasiswa Polsri ini sudah dimulai sejak tahun 2009 yang lalu sampai sekarang Alhamdulillah Polsri sudah beberapakali mendapatkan peringkat terbaik di tingkat nasional tentunya hal ini tidak terlepas dari keberhasilan para pembimbing yang sudah berpengalaman dalam mengelola usaha. Ujarnya.', 'tekkom.jpg', '2021-03-08', 'Super Admin', 'Berita'),
(6, 'Akreditasi Tekkom - D4 TIMD 2021 | POLSRI', 'banyuasin/21/1/21, Bertempat di aula kampus Politeknik Negeri Sriwijaya (Polsri) Banyuasin adara silahturahmi dan sosialisasi program kerja unit kegiatan mahsiswa (UKM) Polsri untuk mahasiswa baru kampus Polsri Banyuasi, acara ini dengan tujuan untuk mengajak para mahasiswa baru bergabung dalam kepengurusan UKM yang ada di Polsri sekaligus mencari bakat-bakat mahasiswa yang berprestasi maupun yang peunya kemampuan di berbagai bidang.\r\n<br><br>\r\nKegiatan ini di hadiri oleh Wakil Direktur III Polsri, Koordinator kampus Polsri Banyuasin, Para Ketua Jurusan, Dosen Pembibing ormawa, para perwakilan ormawa serta mahasiswa baru Polsri Kampus Banyuasin. Wakil Direktur III, Ahmad Zamheri menyampaikan bahwa kegiatan ini untuk menyamakan persepsi mahasiswa bahwa antara kampus Banyuasin dan Kampus Polsri Bukit tidak ada perbedaan perlakukan serta standar kurikulum yang diberikan, dia berharap para mahasiswa melalui kegiatan kemahasiswaan baik mahasiswa yang dikampus Banyuasin maupun yang dikampus bukit untuk ikut berperan dengan tujuan untuk meningkatkan softskill para mahasiswa selama pendidikan di Polsri. Banyak prestasi-prestasi yang sudah dicapai oleh para mahasiswa baik di tingkat regional, nasional bahkan di ajang internasional melalui program kerja kemahasiswaan.\r\n<br><br>\r\nZulkarnain dalam sambutannya menyampaikan bahwa pemeritah banyuasin sangat mengapresiasi kegiatan ini karena dan sangat mendukung pengembangan kampus Polsri di Banyuasin, bahkan saat ini pemerinah daerah sudah memproses hibah lahan seluas 100 ha lagi untuk kampus Polsri Banyuasin.', 'polsri.jpg', '2021-03-09', 'Super Admin', 'Berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(4) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `judul`, `keterangan`, `foto`) VALUES
(1, 'Teknik Komputer', 'Contoh', 'tekkom.png'),
(2, 'Coba Sider 2', 'Ini adalah slider 2', 'banner2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `foto`, `level`) VALUES
(1, 'M. Fernaldo Harefa', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Fernaldo.jpg', 'Super Admin'),
(2, 'M. Rifqi Hanif', 'admin', '88100f92d66deb5f6ec2146e0b047cce', 'rifqi.jpg', 'Super Admin'),
(5, 'Fernaldo Harefa', 'odla', '6d796693a39197ae6abc91594d18f266', '34.png', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
