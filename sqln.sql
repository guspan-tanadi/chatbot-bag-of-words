SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE `unachat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `unachat`;

CREATE TABLE IF NOT EXISTS `answer` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `jawab` text NOT NULL,
  PRIMARY KEY (`kd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

INSERT INTO `answer` (`kd`, `jawab`) VALUES
(1, 'Kami ingin meningkatkan sumber daya manusia melalui pemerataan pendidikan tinggi.'),
(2, 'Karena kami adalah satu-satunya Universitas Terbuka di Kabupaten Asahan.'),
(3, 'Universitas ini berlokasi di Jln. Jendral Ahmad Yani, Kota Kisaran.'),
(4, 'Kami mengelola ada 5 fakultas.'),
(5, 'UNA akronim dari Universitas Asahan, sebuah Universitas di Kabupaten Asahan.'),
(6, 'Bapak Prof. Dr. Ibnu Hajar, M.Si.'),
(7, 'Kami sedang menerapkan pembelajaran E-Learning.'),
(8, 'Beno dan Surip.'),
(9, 'UNA berakreditas BAN-PT.'),
(10, 'Kami telah meluluskan ribuan mahasiswa.'),
(11, 'Ada di una.ac.id atau bisa juga di universitasasahan.ac.id.'),
(12, 'Kampus ini memiliki laboratorium komputer, perpustakaan dan musola.'),
(13, 'Sudah sejak 18 Juli 1985.'),
(29, 'Pemerintah Kabupaten Asahan.'),
(15, 'Kami masih berstatus sebagai Perguruan Tinggi Swasta.'),
(18, 'Email kami univ_asahan@yahoo.co.id'),
(17, 'Di Gedung Biro Rektor Universitas Asahan.'),
(28, 'Kami menyediakan 11 program studi.');

CREATE TABLE IF NOT EXISTS `cms` (
  `link` varchar(19) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `legal` char(3) NOT NULL,
  PRIMARY KEY (`link`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `cms` (`link`, `page_name`, `legal`) VALUES
('keyword', 'Masukan Pengetahuan', 'adm'),
('panduan', 'Panduan Penggunaan', 'cli'),
('chat', 'Uji Pertanyaan', 'adm'),
('signIn', 'SignIn Admin', 'cli'),
('unanswered', 'Pertanyaan Tak Dijawab', 'adm'),
('tentang', 'Tentang Chatbot', 'cli');

CREATE TABLE IF NOT EXISTS `guide` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kalimat` varchar(233) NOT NULL,
  `pola` varchar(233) NOT NULL,
  `kd_ans` int(11) NOT NULL,
  PRIMARY KEY (`kd`),
  KEY `kd_ans` (`kd_ans`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

INSERT INTO `guide` (`kd`, `kalimat`, `pola`, `kd_ans`) VALUES
(2, 'Apa tujuan una ?', 'tujuan una', 1),
(3, 'Sudah berapa lulusan ?', 'berapa lulusan', 10),
(4, 'Kenapa kuliah di una ?', 'kenapa kuliah una', 2),
(5, 'Di mana letak kampus una?', 'una di mana', 3),
(7, 'jumlah fakultas?', 'jumlah fakultas', 4),
(42, 'apa itu una sih?', 'apa itu una', 5),
(9, 'Siapa nama rektor UNA?', 'rektor una', 6),
(10, 'Apa perkembangan kampus UNA?', 'perkembangan una', 7),
(12, 'Siapa saja wakil rektor UNA?', 'wakil rektor una', 8),
(13, 'Apa akreditas kampus UNA?', 'akreditas una', 9),
(14, 'apa situs kampus una?', 'situs una', 11),
(15, 'apa visi misi kampus una ?', 'visi misi una', 1),
(16, 'web una apa?', 'web una', 11),
(19, 'apa fasilitas kampus una?', 'fasilitas una', 12),
(20, 'Kapan una berdiri?', 'berdiri una', 13),
(22, 'UNA itu swasta atau negeri', 'swasta negeri una', 15),
(29, 'sejarah una?', 'sejarah una', 13),
(24, 'Tempat mendaftar di una?', 'tempat mendaftar', 17),
(27, 'una itu ptn atau pts?', 'ptn pts', 15),
(30, 'kapan una lahir?', 'lahir una', 13),
(32, 'Email una apa?', 'email una', 18),
(44, 'UNA ada berapa fakultas ?', 'berapa fakultas una', 4);

CREATE TABLE IF NOT EXISTS `unknown` (
  `kd` int(11) NOT NULL AUTO_INCREMENT,
  `kalimat` varchar(233) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sah` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`kd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

INSERT INTO `unknown` (`kd`, `kalimat`, `waktu`, `sah`) VALUES
(6, 'cara mendaftar di kampus una?', '2017-08-21 09:12:14', 1),
(176, 'siapa pendiri kampus una?', '2018-02-11 12:46:45', 1),
(177, 'pendiri una itu siapa?', '2018-02-11 12:47:08', 1),
(173, 'Kenapa banyak yang pilih FKIP UNA ?', '2017-12-20 02:02:43', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
