-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-04 15:01:11
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `menberlist_database01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `menber_list`
--

CREATE TABLE `menber_list` (
  `id` int(6) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `No` int(6) NOT NULL,
  `name` char(20) NOT NULL,
  `department` char(20) NOT NULL,
  `class` char(20) NOT NULL,
  `skill` text NOT NULL,
  `hobby` text NOT NULL,
  `photo` varchar(128) NOT NULL,
  `hire date` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `menber_list`
--

INSERT INTO `menber_list` (`id`, `pass`, `No`, `name`, `department`, `class`, `skill`, `hobby`, `photo`, `hire date`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 999999, 'admin', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(2, '1234', 100001, '荒巻大輔', 'DEV15', '機構', 'test', 'お酒', '', '0000-00-00', '2024-07-04 01:54:53', NULL),
(3, 'qs33a5hkn', 100002, '佐藤 健', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(4, 'ksr2lr183', 100003, '田中 美咲', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(5, '6he90qtekux4', 100004, '鈴木 一郎', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(6, '2cuipcdz1j4', 100005, '高橋 恵美', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(7, 'rl5f5fkxu7kl', 100006, '渡辺 花子', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(8, '6x5j6e54g44', 100007, '伊藤 浩', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(9, 'qhet8sv3t', 100008, '山本 あゆみ', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(10, 'di948qbs', 100009, '中村 太郎', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', NULL),
(12, '1234567', 100010, 'なかやま', '', '', '', '', '', '0000-00-00', '0000-00-00 00:00:00', '2024-07-04 12:35:05');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `menber_list`
--
ALTER TABLE `menber_list`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `menber_list`
--
ALTER TABLE `menber_list`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
