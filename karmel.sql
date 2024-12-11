-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karmel`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `image_1_path` varchar(255) DEFAULT NULL,
  `image_2_path` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image_1_path`, `image_2_path`, `sub_title`, `title`, `description`) VALUES
(1, 'uploads/Pantai-Serena.jpg', 'uploads/1g.png', 'Sulawesi Utara', 'DINAS PARIWISATA KOTA BITUNG', 'Dinas Pariwisata Kota Bitung memiliki peran penting dalam mengembangkan industri pariwisata di kota tersebut, dengan fokus pada peningkatan kualitas dan promosi destinasi wisata lokal. Dinas ini bertanggung jawab untuk merumuskan kebijakan, menyelenggarakan kegiatan pariwisata, serta membina dan membimbing pelaku pariwisata di wilayahnya, dengan tujuan meningkatkan kontribusi sektor pariwisata terhadap perekonomian daerah');

-- --------------------------------------------------------

--
-- Table structure for table `additional_info`
--

CREATE TABLE `additional_info` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_info`
--

INSERT INTO `additional_info` (`id`, `text`) VALUES
(1, 'Di jantung Kota Bitung, Sulawesi Utara, berdiri kokoh Dinas Pariwisata Kota Bitung, sebuah gerbang menuju pesona alam dan budaya yang tak terlupakan. Lebih dari sekadar instansi pemerintah, Dinas Pariwisata Kota Bitung adalah pemandu handal bagi para penj'),
(3, 'Lebih dari itu, Dinas Pariwisata Kota Bitung berkomitmen untuk memajukan pariwisata yang berkelanjutan. Mereka bekerja sama dengan masyarakat lokal untuk menjaga kelestarian alam dan budaya, serta memastikan bahwa pariwisata memberikan manfaat bagi semua ');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`id`, `location`, `phone_number`, `email`) VALUES
(1, 'Bitung, Sulawesi Utara', '082112341516', 'pariwisata@gmail.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `klik_read_more`
--

CREATE TABLE `klik_read_more` (
  `id` int(11) NOT NULL,
  `tempat_id` int(11) DEFAULT NULL,
  `waktu_klik` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `name`, `email`, `phone`, `subject`, `message`, `date`) VALUES
(1, 'MUHAMAD ZIDAN DAILER', 'zidan.dailer@gmail.com', '0987654321', 'good', 'best dinasssss', '2024-05-06 07:20:16'),
(2, 'nnjnjnjn', 'zdzd@gmail.com', 'vsavas', 'vsasv', 'vasvassav', '2024-05-06 07:20:16'),
(3, 'MUHAMAD ZIDAN DAILER', 'zidan.dailer@gmail.com', '0987654321', 'csasc', 'csaasc', '2024-05-06 07:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `rekom`
--

CREATE TABLE `rekom` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekom`
--

INSERT INTO `rekom` (`id`, `sub_title`, `title`, `description`) VALUES
(1, 'WISATA', 'Daftar Tempat Wisata Bitung', 'tempat wisata yang ada di sulawesi utara');

-- --------------------------------------------------------

--
-- Table structure for table `slides_dua`
--

CREATE TABLE `slides_dua` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides_dua`
--

INSERT INTO `slides_dua` (`id`, `title`, `subtitle`, `description`, `image_path`) VALUES
(1, '2DINAS PARIWISATA KOTA BITUNG', 'Sulawesi Utara', 'Bitung, Sulawesi Utara', 'uploads/new_image_1714797425.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slides_satu`
--

CREATE TABLE `slides_satu` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides_satu`
--

INSERT INTO `slides_satu` (`id`, `image_path`, `title`, `subtitle`, `description`) VALUES
(1, 'uploads/new_image_1714803058.jpg', 'DINAS PARIWISATA KOTA BITUNG', 'Sulawesi Utara', 'Bitung, Sulawesi Utara');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `facebook`, `twitter`, `instagram`, `tiktok`) VALUES
(1, 'asas1', 'asas1', 'asas1', 'asas1');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `deskripsi_full` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `jumlah_klik` tinyint(11) DEFAULT 0,
  `encrypted_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`id`, `nama`, `deskripsi`, `deskripsi_full`, `gambar`, `jumlah_klik`, `encrypted_id`) VALUES
(11, 'Trikora', 'Tugu Trikora adalah sebuah monumen bersejarah yang terletak di Pulau Lembeh, Bitung, Sulawesi Utara, yang didirikan untuk memperingati Operasi Trikora, sebuah aksi militer Indonesia untuk merebut Irian Barat dari tangan Belanda pada tahun 1961. Tugu ini merupakan simbol perlawanan dan penghormatan kepada para pejuang yang gugur dan selamat dalam operasi tersebut, serta menjadi pengingat akan pentingnya perjuangan kemerdekaan dan persatuan bangsa.', 'Di Pulau Lembeh, Kota Bitung, Sulawesi Utara, berdiri kokoh Tugu Trikora, sebuah monumen bersejarah yang menandakan tekad kuat bangsa Indonesia untuk membebaskan Irian Barat dari cengkeraman Belanda. Dibangun pada tahun 1962, tugu ini menjadi pengingat perjuangan para pahlawan yang gugur demi keutuhan NKRI.\n\nTugu Trikora memiliki ketinggian 61 meter, melambangkan tanggal 12 Desember 1961, hari diumumkannya Trikora (Komando Rakyat Tiga) oleh Presiden Soekarno. Angka 9 dan 12 pada sisi tugu juga melambangkan tanggal dan bulan tersebut.\n\nDi sekitar tugu terdapat taman yang tertata rapi, di mana pengunjung dapat bersantai dan menikmati pemandangan laut yang indah. Terdapat pula museum mini yang menyimpan berbagai informasi dan foto tentang Operasi Trikora.\n\nBagi para pencinta sejarah, mengunjungi Tugu Trikora Bitung adalah sebuah keharusan. Di sini, Anda dapat mempelajari perjuangan para pahlawan dan merasakan semangat nasionalisme yang membara.', 'uploads/2.png', 3, NULL),
(14, 'Patung Tuhan Yesus', 'Patung Yesus Penebus di Pulau Lembeh, Sulawesi Utara, adalah monumen yang mengesankan dengan tinggi mencapai 35 meter, berwarna putih, dan berdiri di kawasan berkontur perbukitan. Patung ini memiliki desain unik dengan empat tingkat yang menyerupai bentuk perahu dari puncaknya, menawarkan pemandangan yang indah dari Selat Lembeh dan Gunung Dua Sudara sebagai latar belakang yang sempurna untuk foto', 'Menyaksikan Keagungan Patung Yesus Memberkati di Bitung: Simbol Kasih dan Perlindungan\n\nMenjulang setinggi 30 meter di atas Bukit Pulisan, Patung Yesus Memberkati menjadi ikon wisata religi yang tak hanya menarik wisatawan lokal, tetapi juga mancanegara. Patung putih dengan pose tangan terbuka seolah memberkati ini memancarkan aura ketenangan dan kedamaian. Dari kejauhan, patung ini terlihat begitu kokoh dan megah, menjadi simbol kasih dan perlindungan bagi Kota Bitung.\n\nPatung Yesus Memberkati Bitung bukan hanya tempat wisata religi, tetapi juga menjadi simbol pengharapan dan semangat bagi masyarakat Bitung. Keindahan dan kemegahan patung ini menjadi daya tarik utama bagi para wisatawan untuk berkunjung dan merasakan kedamaian yang ditawarkan.', 'uploads/yesus.jpg', 11, NULL),
(15, 'Batu Angus', 'Batu Angus adalah destinasi wisata yang unik di Kota Bitung, Sulawesi Utara, terkenal dengan batuan hitamnya yang seperti hangus terbakar. Pantai ini menawarkan pemandangan kerikil hitam di pinggirannya dan kolam alami yang dikelilingi oleh batuan hitam, memberikan kesan eksotis dan misterius. Terletak di Cagar Alam Duasaudara, Pantai Batuangus juga menarik bagi pecinta snorkeling karena airnya yang jernih dan kehidupan bawah laut yang menawan', 'Di pesisir utara Kota Bitung, Sulawesi Utara, terbentang pesona Batu Angus yang menanti untuk dijelajahi. Bagaikan permata tersembunyi, Batu Angus menghadirkan perpaduan luar biasa antara keindahan alam dan jejak sejarah yang memikat. Hamparan pasir hitam berkilauan, hasil letusan Gunung Gamalama purba, menjadi ciri khas pantai ini. Berjalanlah di atas pasirnya yang unik, rasakan sensasi teksturnya yang berbeda, dan nikmati panorama laut biru jernih yang menyejukkan mata.\n\nFormasi batu-batu besar berwarna hitam pekat dengan berbagai bentuk dan ukuran menghiasi pantai Batu Angus. Bebatuan ini menjadi saksi bisu sejarah letusan gunung berapi dan menjadi objek foto yang Instagramable. Bagi para pecinta diving dan snorkeling, Batu Angus menawarkan surga bawah laut yang luar biasa. Terumbu karang yang masih terjaga dan berbagai spesies ikan tropis yang menawan siap menyambut Anda.\n\nGua Kelelawar, sebuah gua yang dihuni oleh koloni kelelawar, menghadirkan sensasi petualangan yang seru. Jelajahi gua ini dan saksikan pemandangan gua yang unik. Di balik bebatuan yang kokoh, terdapat mata air alami yang menyegarkan. Airnya yang jernih dan dingin dapat dinikmati untuk melepas dahaga dan menyegarkan tubuh.\n\nBatu Angus bukan hanya tentang pantai yang indah. Di sini, Anda juga dapat mempelajari sejarah dan budaya lokal. Suku Minahasa yang mendiami wilayah ini memiliki tradisi dan kearifan lokal yang unik. Anda dapat berinteraksi dengan penduduk setempat dan belajar tentang budaya mereka.\n\nBerbagai fasilitas, seperti toilet, mushola, dan warung makan, tersedia untuk menunjang kenyamanan pengunjung. Bagi yang ingin bermalam, beberapa penginapan di sekitar pantai siap menyambut Anda.\n\nWaktu terbaik untuk mengunjungi Batu Angus adalah pada musim kemarau, yaitu antara bulan April dan Oktober. Gunakan pakaian dan alas kaki yang nyaman untuk berjalan di atas pasir hitam. Bawalah topi, kacamata hitam, dan tabir surya untuk melindungi diri dari sinar matahari. Jangan lupa untuk membawa kamera untuk mengabadikan momen indah di Batu Angus.\n\nJaga kebersihan dan kelestarian alam Batu Angus. Mari kita bersama-sama menjaga keindahan alam ini agar dapat dinikmati oleh generasi mendatang. Batu Angus Bitung, destinasi istimewa di Sulawesi Utara, siap memberikan pengalaman wisata yang tak terlupakan bagi Anda.', 'uploads/Jepretan Layar 2024-05-07 pukul 22.02.12.png', 50, NULL),
(22, 'Batu Putih', 'Pantai Batu Putih di Bitung, Sulawesi Utara, adalah pantai yang menarik dengan pasir hitam vulkanik yang lembut dan pemandangan laut yang indah. Pantai ini menawarkan kesempatan untuk bersantai di tepi laut, menikmati keindahan alam bawah laut melalui snorkeling, dan mengamati satwa liar endemik di Taman Wisata Alam Batuputih yang berdekatan', 'Di pesisir utara Kota Bitung, Sulawesi Utara, terbentang pesona Batu Putih yang memikat para pelancong. Keindahan alam, kekayaan budaya, dan jejak sejarah berpadu harmonis di destinasi wisata ini. Pasir hitam berkilauan di Pantai Batu Putih menjadi ciri khasnya, hasil letusan Gunung Soputan purba. Hamparan laut biru jernih dan pulau-pulau kecil di sekitarnya menghadirkan panorama yang memanjakan mata. Berenang, berjemur, bermain air, dan snorkeling adalah beberapa aktivitas wisata yang dapat Anda nikmati di sini.\n\nBagi pecinta alam, Hutan Batu Putih menawarkan petualangan seru. Hutan tropis yang rindang ini menyimpan keanekaragaman flora dan fauna endemik Sulawesi Utara. Air terjun tersembunyi dan Gua Kelelawar menjadi daya tarik utama bagi para penjelajah. Di sisi lain, kekayaan budaya Suku Minahasa menanti untuk dipelajari. Tradisi unik seperti Tarian Tumbuan, upacara adat Tuluk, dan rumah Walewangko membuka jendela budaya lokal yang mempesona. Cicipi kuliner khas Suku Minahasa yang lezat dan kaya rasa, serta belilah souvenir khas seperti ukiran kayu, kain tenun, dan perhiasan perak sebagai kenangan.\n\nBatu Putih Bitung bukan hanya tentang pantai dan hutan. Di sini, Anda dapat menelusuri jejak sejarah di Tugu Trikora, monumen bersejarah yang menandakan tekad kuat bangsa Indonesia untuk membebaskan Irian Barat. Keindahan dan kemegahan tugu ini menjadi simbol patriotisme dan semangat nasionalisme.\n\nBatu Putih Bitung: Destinasi wisata yang menjanjikan pengalaman tak terlupakan bagi para pelancong. Keindahan alam yang memukau, kekayaan budaya yang unik, dan jejak sejarah yang inspiratif menjadikan Batu Putih sebagai tempat yang wajib dikunjungi di Sulawesi Utara.', 'uploads/3.png', 4, NULL),
(23, 'Lirang', 'Desa Wisata Lirang, yang terletak di Kelurahan Lirang, Kecamatan Lembeh Utara, Kota Bitung, Sulawesi Utara, dijuluki sebagai “surga tersembunyi di ujung Lembeh”. Desa ini menawarkan berbagai atraksi wisata seperti Tanjung Salib, Hutan Mangrove, Pantai Air Biru, dan kesempatan untuk diving dan snorkeling. Dengan penduduk yang mayoritas berasal dari suku Loloda, Lirang juga kaya akan budaya lokal, termasuk tradisi Roko (potong gigi) yang unik. Hutan Mangrove Lirang sendiri adalah perpaduan memukau antara hutan bakau yang rimbun dan keindahan lautan biru yang menenangkan, menjadikannya destinasi yang cocok bagi pecinta alam, pemancing, atau fotografer alam', 'Di balik pesona Pulau Lembeh yang terkenal dengan keanekaragaman hayati bawah lautnya, tersembunyi sebuah desa wisata bernama Lirang. Jauh dari keramaian kota, Lirang menawarkan surga alam yang masih alami, budaya Suku Minahasa yang kental, dan keramahan penduduknya yang menghangatkan hati.\n\nPantai Lirang menyambut Anda dengan pasir putih halus dan air laut jernih bagaikan kristal. Berenang, berjemur, dan menikmati panorama laut menjadi aktivitas favorit di sini. Hutan Mangrove Lirang yang luas dan asri menanti Anda untuk menyusurinya dengan perahu, mengagumi keanekaragaman flora dan fauna. Air Terjun Lirang yang menawan dengan ketinggian 20 meter siap menyegarkan jiwa Anda.\n\nLebih dari sekadar keindahan alam, Lirang menyimpan kekayaan budaya Suku Minahasa. Rumah-rumah tradisional Suku Minahasa yang terbuat dari kayu menjadi saksi bisu kearifan lokal. Pelajari tentang budaya dan tradisi mereka yang unik dari penduduk setempat, rasakan keramahan dan kehangatan yang tak terlupakan.\n\nLirang bukan hanya tentang pantai, hutan, dan air terjun. Bagi para penyelam dan pecinta snorkeling, Lirang adalah surga bawah laut yang tak ternilai. Terumbu karang yang penuh warna, ikan tropis yang berenang bebas, bahkan hiu yang gagah berkeliaran di antara Anda, menjadi pengalaman tak terlupakan yang hanya bisa Anda temukan di Lirang.\n\nDatanglah ke Lirang, jauhkan diri dari hiruk pikuk kota, dan rasakan kedamaian di tengah alam yang masih alami. Nikmati keramahan penduduk setempat, pelajari budaya Suku Minahasa yang unik, dan ciptakan kenangan indah yang tak terlupakan di surga tersembunyi Pulau Lembeh ini.', 'uploads/lirang 2.jpg', 16, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$oYvUoow4QPaiAsV2Y.34POhi86Nmgw2jYMPdQaUkLQmiFr8D8QRg.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `sub_title`, `title`, `description`) VALUES
(1, 'Sulawesi Utara', 'DINAS PARIWISATA KOTA BITUNG', 'Daftar Tempat Wisata yang ada di Bitung, Sulawesi Utara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_info`
--
ALTER TABLE `additional_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klik_read_more`
--
ALTER TABLE `klik_read_more`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tempat_id` (`tempat_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekom`
--
ALTER TABLE `rekom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides_dua`
--
ALTER TABLE `slides_dua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides_satu`
--
ALTER TABLE `slides_satu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `additional_info`
--
ALTER TABLE `additional_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klik_read_more`
--
ALTER TABLE `klik_read_more`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekom`
--
ALTER TABLE `rekom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slides_dua`
--
ALTER TABLE `slides_dua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides_satu`
--
ALTER TABLE `slides_satu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klik_read_more`
--
ALTER TABLE `klik_read_more`
  ADD CONSTRAINT `klik_read_more_ibfk_1` FOREIGN KEY (`tempat_id`) REFERENCES `tempat_wisata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
