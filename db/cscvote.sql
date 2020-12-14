-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 21, 2020 at 10:26 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cscvote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `matric_no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `createdOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` varchar(255) NOT NULL,
  `level_id` varchar(11) NOT NULL,
  `matric` varchar(70) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `bio` text NOT NULL,
  `createdOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `level_id`, `matric`, `firstname`, `lastname`, `image`, `bio`, `createdOn`) VALUES
(3, '2', '14', 'Kasu/16/1892', 'Justice', 'Yakubu', 'IMG_20190822_172815_5.jpg', 'Ioiuhiugufatfdtftafdyasvdbaksjdnasd', '2020-02-02'),
(6, '6', '18', 'Kasu/15/csc/1084', 'Emmanuel', 'Emmanuel', '1515502852.jpg', 'sfdgreegfdgfsfsfsfs', '2020-02-13'),
(7, '3', '12', 'Kasu/11/csc/2019', 'Bobai', 'Bob', '1515502852.jpg', 'kjlhdhahdhad', '2020-02-15'),
(8, '7', '19', 'Kasu/15/csc/1084', 'Emmanuel', 'Emma', '1515503452.png', 'fewerewryouewyribciweri7vwr7vwqv', '2020-02-17'),
(9, '9', '11', 'Kasu/20/csc/1000', 'New', 'Voter', '1515502269.jpg', 'Ambitions that cannot be matched by anybody', '2020-02-18'),
(10, '7', '11', 'Kasu/20/csc/1000', 'New', 'Voter', '1515502269.jpg', 'I have ambition that cannot be matched by anybody', '2020-02-18'),
(11, '7', '19', 'Kasu/11/csc/2018', 'Matric', 'Matty', '1515503191.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames. Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Fusce id velit ut tortor. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Sit amet facilisis magna etiam tempor orci eu. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Eu volutpat odio facilisis mauris sit. Suspendisse sed nisi lacus sed viverra tellus in. Commodo sed egestas egestas fringilla phasellus. Feugiat sed lectus vestibulum mattis.', '2020-02-18'),
(12, '8', '18', 'Kasu/11/csc/2019', 'Bobai', 'Bob', '1515503358.png', 'kdlkfhjlkhjlfhlhfiohadhohdlkvidfljbvjboihiohiohoifhoihoafi', '2020-02-19'),
(13, '9', '19', 'Kasu/15/csc/1011', 'John', 'Ben', '1515502997.jpg', 'kljlhhuiakjcgugcxbczhxgcjkhdc', '2020-02-19'),
(14, '11', '19', 'kasu/15/csc/1099', 'Solo', 'Don', '1515502801.jpg', 'kljljoiqhoidhoibdsabdjskbkjfvkbsvfausbuiasvfjsabjksbfb', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `election_year`
--

CREATE TABLE `election_year` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `election_year`
--

INSERT INTO `election_year` (`id`, `year`) VALUES
(1, 2017),
(2, 2018),
(3, 2019),
(4, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(11, 100),
(12, 200),
(18, 300),
(19, 400);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(8, 'Secretary'),
(9, 'Public Relations Officer'),
(10, 'Treasurer'),
(11, 'President');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `postedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_title`, `post_image`, `postedOn`) VALUES
(1, 'jgkiagidgiadiadoapjibuyvzcuyvuvcisdjsadja;huasgfysabskczjjbzcvcysagydgad', 'Software Dev', 'images/1515502949.jpg', '2020-02-12'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Finished App', '../images/1515502747.jpg', '2020-02-16'),
(3, 'jutuytvce5xetyfuhop i. uutu ttitvuu777', 'test', '../images/1515503485.jpg', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_matric` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `user_firstname`, `user_lastname`, `user_matric`, `user_role`) VALUES
(3, '$2y$10$6hpAYs2F6JjH/1KOPQUODuSNmHZ5eXV65UR1TQZJJ6x4nTFdvLqiO', 'Emmanuel', 'Emmanuel', 'Kasu/15/csc/1084', '1'),
(4, '$2y$10$MAhAYjtj.T3PCHJZLRG5du7A9yUjjLWm674zV3yAK5qVvTM9Jpmui', 'Test', 'Test', 'Kasu/14/csc/2020', '2'),
(5, '$2y$10$2v9Qi9QLEomoxRLTaRjwh.o9o4HOYJ4eAPHzSYRLFcXqUqX9BjK0G', 'Bobai', 'Bob', 'Kasu/11/csc/2019', '2'),
(6, '$2y$10$V4/ncfjBBoSqk1RtBBjcsedfXJLadI6h/9q8h4fks3afJV/rIBclO', 'New ', 'Voter', 'Kasu/20/csc/1000', '2'),
(7, '$2y$10$OlhSKTjCElvLy/93iQ99x.dyA4NYveZewmq4NA3FI3bTZhR7IGbk.', 'Second', 'Voter', 'Kasu/15/csc/1083', '2'),
(8, '$2y$10$Etq0vwsxh2pQunBgXocePuuEkLpngJ1qt7Z9VmJG703/5sYftZqvG', 'James', 'Jay', 'Kasu/15/csc/1082', '2'),
(9, '$2y$10$KYaBWaar9FAh9u9C1qwYF.cNwUCi6k74QallvIpKsDnOpjDcm6NJy', 'Matric', 'Matty', 'Kasu/11/csc/2018', '2'),
(10, '$2y$10$rBRFg/IGu5/SN6pN2BnTs.VCm15ECdACN5r17PS0Dk1KYDFUd/Xo6', 'John', 'Ben', 'Kasu/15/csc/1011', '2'),
(11, '$2y$10$ZS3OthWVQQl7Gv4d.MU1.Oe3niKbIgSSkhBkeAqp7aNSlpK1L6796', 'Solo', 'Don', 'kasu/15/csc/1099', '2');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `matric_no` varchar(70) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `matric_no`, `firstname`, `lastname`, `password`, `image`) VALUES
(1, '', 'Bobai', 'Philip', '$2y$10$XiXDRcQT06SepRb8ZmynO.c..P8HNzr5nspRkabGBu9NZdkBxxBpK', ''),
(2, 'KASU/18/CSC/0001', 'Akoke', 'Anto', '$2y$10$eCaso.RxWNjoepmgLLxdv.COB9iCSX87X5TSrb5FTDLXwKWz23/F6', ''),
(3, 'KASU/18/CSC/0001', 'Akoke', 'Anto', '$2y$10$j2nxGMYw/AyDtoo0.KGIZeDOMDXUfwEiDOoetlrBLboQd/LArI4Ni', ''),
(4, 'KASU/18/CSC/0001', 'Akoke', 'Anto', '$2y$10$f9rw184bpka9aWPUq3xvP.apaxn6eqUVvZKdFS6Ti0HGe/ycBlTKi', ''),
(5, 'KASU/18/CSC/0001', 'Justice', 'Yakubu', '$2y$10$2CxNEU4dZY5o2peWKe8KNeHchJK6o5ZYV7pHru5NUOoI3VcnsrnPm', ''),
(6, 'Kasu/17/csc/2020', 'Noah', 'Sylvester', '$2y$10$mO1ZYNI6Ilta8RCIh3Mjy.HrHbPGcL1jHyojzTP/wrMyCbsFHjdW2', ''),
(7, 'kasu/01/csc/0001', 'test', 'testuser', '$2y$10$pufePWdZi078G7oCVtOTMuQyZe5yqsR9YQx6t6Vrxj.LXP2d7dwZW', ''),
(8, 'KASU/18/CSC/0001', '', 'TestAgain', '$2y$10$m/lwhkl/qbfxBnIA8Qqes.SS1YwwizahInEOoy8yXTWx1gFqESgTq', ''),
(9, 'KASU/18/CSC/0001', 'Test', 'TestAgain', '$2y$10$ASkpUQkyZtUCen8a.jqxUOmvUDf0ZnzM5ewF16gRYlhN0AFN4pvX2', ''),
(10, 'KASU/18/CSC/2020', '', 'user', '$2y$10$Fsrj4h3CMRy2dskzD7hawOt.84kCgHs2KHHCKOi13eVr7lgGH7mDa', ''),
(11, 'kasu/15/csc/1084', '', 'Sunday', '$2y$10$TAIndx8yetiqpIJbwc.P2eOJH5FGYuu66NMdF9yUR.1wEUd8CWp/m', ''),
(12, '', '', '', '$2y$10$1AMoSUumOifDBLRdDFrHBukdjKBckutEES3EMPVtt47EPjbqmIS8m', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `position_id` int(100) NOT NULL,
  `user` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `candidate_name`, `position_id`, `user`) VALUES
(1, 'Emmanuel Emmanuel', 6, '0'),
(2, 'Emmanuel Emmanuel', 6, '0'),
(3, 'Emmanuel Emmanuel', 6, '0'),
(4, 'Emmanuel Emmanuel', 6, '1'),
(5, 'Emmanuel Emmanuel', 6, '4'),
(6, 'Emmanuel Emmanuel', 6, '4'),
(7, 'Emmanuel Emmanuel', 6, '4'),
(8, 'Emmanuel Emmanuel', 6, '4'),
(9, 'Emmanuel Emmanuel', 6, '4'),
(10, 'Emmanuel Emmanuel', 6, '4'),
(11, 'Emmanuel Emmanuel', 6, '4'),
(12, 'Emmanuel Emmanuel', 6, '4'),
(13, 'Emmanuel Emmanuel', 6, '4'),
(14, 'Emmanuel Emmanuel', 6, '4'),
(15, 'Emmanuel Emmanuel', 6, '4'),
(16, 'Emmanuel Emmanuel', 6, '4'),
(17, 'Emmanuel Emmanuel', 6, '4'),
(18, 'Bobai Bob', 3, '0'),
(19, 'Emmanuel Emmanuel', 6, '0'),
(20, 'Emmanuel Emmanuel', 6, 'Bob'),
(21, 'Emmanuel Emmanuel', 6, 'Test'),
(22, 'Emmanuel Emma', 7, 'Emmanuel'),
(23, 'New Voter', 7, 'Voter'),
(24, 'New Voter', 7, 'Jay'),
(25, 'New Voter', 7, 'Matty'),
(26, '', 9, 'Ben'),
(27, 'Solo Don', 11, 'Don');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_year`
--
ALTER TABLE `election_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `election_year`
--
ALTER TABLE `election_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
