-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-06-01 00:19:44
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `project`
--

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 0, 'Anime', '2020-04-30 16:17:20'),
(2, 0, 'Movie', '2020-04-30 16:17:20'),
(3, 0, 'Drama', '2020-04-30 16:18:36'),
(4, 0, 'Music', '2020-04-30 16:18:36'),
(5, 0, 'Dance', '2020-04-30 16:18:46'),
(6, 0, 'Sport', '2020-04-30 16:18:46'),
(7, 0, 'Technology', '2020-04-30 16:18:56'),
(8, 0, 'Entertainment', '2020-04-30 16:18:56');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(0, 9, 'comment_tester', 'comment_tester@gmail.com', 'this is a test\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra ut sem et molestie. Proin non justo vehicula, dictum libero et, consequat neque. Etiam et dolor vitae turpis convallis tincidunt eget non elit. Suspendisse sed nibh dignissim, ornare nulla vel, scelerisque tortor. Phasellus laoreet vitae est ultrices consequat. Morbi luctus semper erat quis bibendum. Maecenas malesuada elementum auctor.\r\n\r\nUt rutrum mi porttitor', '2020-05-01 00:53:18'),
(1, 9, 'test_comment', 'test_comment@gmail.com', 'test bottom comment function', '2020-04-30 23:59:19');

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `description`, `video`, `created_at`) VALUES
(1, 4, 0, 'Post One', 'Post-One', '   ediuited   Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '2020-04-30 13:58:10'),
(2, 1, 0, 'Post Two', 'Post-Two', '            edited agin    edited Ut rutrum mi porttitor iaculis elementum.             Ut rutrum mi porttitor iaculis elementum.             Ut rutrum mi porttitor iaculis elementum.             Ut rutrum mi porttitor iaculis elementum. ', '', '2020-04-30 13:58:10'),
(4, 6, 0, 'Salvation!', 'Salvation', 'Morbi luctus semper erat quis bibendum. Maecenas malesuada elementum auctor.', 'test_video_one.mp4', '2020-04-30 15:49:58'),
(7, 1, 0, 'Test upload', 'Test-upload', '            This is a test', '', '2020-04-30 20:19:29'),
(8, 1, 0, 'Test upload2', 'Test-upload2', 'This is another test', '', '2020-04-30 20:23:11'),
(9, 1, 0, 'No image', 'No-image', '              dwdsd  edited  This is a no image post', '', '2020-04-30 20:49:00'),
(10, 3, 0, 'asfas', 'asfas', 'asfas', 'sample.mp4', '2020-05-31 19:39:50'),
(11, 2, 0, 'asfdsa', 'asfdsa', 'asdsa', 'sample.mp4', '2020-05-31 20:08:23'),
(12, 2, 0, 'wwa', 'wwa', 'wefae', 'file_example_AVI_480_750kB.avi', '2020-05-31 21:30:15');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `avatar`, `mobile`, `register_date`) VALUES
(0, 'Pico', 'Chen', 'picowithleo@gmail.com', 'Pico2333', 'e10adc3949ba59abbe56e057f20f883e', 'shyamin1.gif', 0, '2020-05-01 05:09:36');

--
-- 转储表的索引
--

--
-- 表的索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
