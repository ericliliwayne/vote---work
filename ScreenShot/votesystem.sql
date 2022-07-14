-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-14 17:53:38
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `votesystem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) UNSIGNED NOT NULL,
  `categorys` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '類別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `categorys`
--

INSERT INTO `categorys` (`id`, `categorys`) VALUES
(1, '生活'),
(2, '經濟'),
(3, '政治'),
(4, '科技'),
(5, '動漫'),
(6, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `options` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '選項',
  `voteid` int(30) NOT NULL COMMENT '對應投票項目ID值',
  `total` int(50) NOT NULL COMMENT '該選項點擊數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `options`, `voteid`, `total`) VALUES
(1, '中華電信', 1, 1),
(2, '台灣大哥大', 1, 1),
(3, '遠傳電信', 1, 0),
(4, '台灣之星', 1, 0),
(5, '亞太電信', 1, 1),
(9, '還不錯!簡單', 2, 0),
(10, '還可以', 2, 1),
(11, '待加強', 2, 0),
(12, '貓', 3, 0),
(13, '狗', 3, 1),
(14, '航海王', 4, 1),
(15, '鬼滅之刃', 4, 1),
(16, '咒術迴戰', 4, 1),
(17, '一拳超人', 4, 0),
(18, '間諜家家酒', 4, 1),
(20, '進擊的巨人', 4, 1),
(21, '名偵探柯南', 4, 6),
(22, '獵人', 4, 6),
(24, '86-不存在的戰區', 4, 1),
(25, '東京卍復仇者', 4, 0),
(27, '灌籃高手', 4, 1),
(28, 'BLEACH死神', 4, 1),
(29, 'JOJO的奇幻冒險', 4, 0),
(34, '其他電信', 1, 0),
(35, '2', 9, 0),
(36, '王', 9, 0),
(37, '11', 9, 0),
(38, '有，一周5次以上', 8, 0),
(39, '有，一周3次~5次', 8, 0),
(40, '有，但一周3次以下', 8, 0),
(41, '沒有', 8, 0),
(42, '晴天', 10, 0),
(43, '雨天', 10, 0),
(44, '陰天', 10, 0),
(45, '颱風天', 10, 0),
(50, 'HTML', 11, 0),
(51, 'CSS', 11, 0),
(52, 'JS、Jquery...', 11, 0),
(53, 'PHP', 11, 1),
(54, 'SQL', 11, 1),
(55, '六福村', 12, 0),
(56, '義大世界', 12, 1),
(57, '麗寶樂園', 12, 2),
(58, '九族文化村', 12, 0),
(59, '劍湖山世界', 12, 1),
(60, '墾丁', 12, 0),
(61, '知本溫泉', 12, 1),
(62, '綠島', 12, 1),
(63, '蘭嶼', 12, 1),
(64, '小琉球', 12, 0),
(65, '木柵動物園', 12, 0),
(66, '目前沒規劃', 12, 0),
(78, '寒流', 10, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 1,
  `birthday` date NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwnote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creattime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`, `name`, `gender`, `birthday`, `email`, `education`, `pwnote`, `creattime`) VALUES
(1, '1234', '1234', '王小名', 1, '1974-10-07', 'abc@defg.com', '小學', '1234', '2022-06-26 00:40:38'),
(2, '73737', '698d51a19d8a121ce581', '菜英文', 0, '2021-12-26', '7373@73737', '中學', '124532453453', '2022-07-10 23:56:06'),
(3, '54375', '3db11d259a9db7fb8965', '董彗如', 1, '2022-07-11', '3737@7865786', '碩士', '37', '2022-07-11 00:03:08'),
(4, 'ericliliwayne', 'aaf771fb6798618bb007dc429b52a021', '董韋逸', 1, '1993-10-07', 'ericliliwayne@yahoo.com.tw', '大學/專科', '我+家', '2022-07-11 00:04:54'),
(5, '111', '698d51a19d8a121ce581', '123', 1, '2003-11-26', '111@111', '博士', '111', '2022-07-11 00:14:16'),
(7, 'maing123', '827ccb0eea8a706c4c34a16891f84e7b', '碼櫻韭', 1, '1950-07-13', 'maing@gmail.com', '博士', '12345', '2022-07-13 22:40:31'),
(8, 'lisa0714', '01cfcd4f6b8770febfb40cb906715822', 'Lisa', 0, '1990-12-26', 'lisa@gg.com', '高中/職', '54321', '2022-07-14 23:28:42');

-- --------------------------------------------------------

--
-- 資料表結構 `voted`
--

CREATE TABLE `voted` (
  `id` int(11) UNSIGNED NOT NULL,
  `usersip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者IP',
  `votesid` int(11) NOT NULL COMMENT '投票項目ID',
  `votetime` date NOT NULL DEFAULT current_timestamp() COMMENT '投票時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `voted`
--

INSERT INTO `voted` (`id`, `usersip`, `votesid`, `votetime`) VALUES
(6, '::1', 2, '2022-07-14'),
(7, '::1', 4, '2022-07-14'),
(8, '::1', 1, '2022-07-14');

-- --------------------------------------------------------

--
-- 資料表結構 `votes`
--

CREATE TABLE `votes` (
  `id` int(11) UNSIGNED NOT NULL,
  `votename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '投票項目名稱',
  `categoryid` int(30) NOT NULL COMMENT '類別ID',
  `multiples` tinyint(1) NOT NULL DEFAULT 0 COMMENT '複選',
  `start` datetime NOT NULL DEFAULT current_timestamp() COMMENT '開始日期',
  `end` datetime NOT NULL COMMENT '截止日期',
  `total` int(32) NOT NULL COMMENT '投票總人數',
  `show` tinyint(1) NOT NULL DEFAULT 1 COMMENT '顯示開啟或關閉',
  `creatid` int(11) NOT NULL COMMENT '建立投票會員ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `votes`
--

INSERT INTO `votes` (`id`, `votename`, `categoryid`, `multiples`, `start`, `end`, `total`, `show`, `creatid`) VALUES
(1, '你電信服務商是用哪一家的?', 1, 0, '2022-06-28 23:19:38', '2022-07-31 23:59:59', 3, 1, 0),
(2, 'php程式課程學習的怎麼樣?', 1, 0, '2022-06-30 23:32:45', '2022-09-15 12:00:00', 1, 1, 0),
(3, '狗跟貓，都幾?', 1, 0, '2022-06-30 23:35:50', '2022-07-31 23:59:59', 1, 1, 0),
(4, '你喜歡看的動漫是...?', 5, 1, '2022-06-30 23:39:17', '2022-09-15 00:00:01', 6, 1, 0),
(8, '你平常有運動的習慣嗎?', 1, 0, '2022-07-07 02:08:23', '2022-12-31 12:59:00', 0, 1, 0),
(9, '1+1=?', 6, 0, '2022-07-07 02:33:11', '2022-10-07 10:07:00', 0, 0, 0),
(10, '你喜歡哪種天氣?', 6, 0, '2022-07-07 22:21:56', '2022-07-08 12:59:00', 0, 1, 0),
(11, '你覺得最難的課是什麼呢?', 1, 0, '2022-07-09 02:33:10', '2022-09-15 10:00:00', 2, 1, 0),
(12, '你今年想規劃去哪裡玩呢?', 1, 1, '2022-07-09 02:42:26', '2022-12-31 12:59:00', 2, 1, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `voted`
--
ALTER TABLE `voted`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
