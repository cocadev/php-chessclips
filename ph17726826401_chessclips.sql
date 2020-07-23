-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 10:14 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ph17726826401_chessclips`
--
CREATE DATABASE IF NOT EXISTS `ph17726826401_chessclips` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ph17726826401_chessclips`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emails`
--

CREATE TABLE `tbl_emails` (
  `id` int(11) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `send_by` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `bodytxt` longtext NOT NULL,
  `sent_time` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_games`
--

CREATE TABLE `tbl_games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `wp_name` varchar(255) DEFAULT NULL,
  `bp_name` varchar(255) DEFAULT NULL,
  `start_time` varchar(25) NOT NULL,
  `end_time` varchar(25) NOT NULL,
  `game_fen` text NOT NULL,
  `game_pgn` varchar(2000) NOT NULL,
  `submit_to` int(11) NOT NULL,
  `coach_rating` int(11) NOT NULL,
  `rating_comment` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `score` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_games`
--

INSERT INTO `tbl_games` (`id`, `user_id`, `event_name`, `wp_name`, `bp_name`, `start_time`, `end_time`, `game_fen`, `game_pgn`, `submit_to`, `coach_rating`, `rating_comment`, `status`, `score`) VALUES
(1, 61, 'ChessClips Game', 'Eugene', 'Rapunzel', '2018-10-08 19:20:55', '2018-10-08 19:47:12', '', '1. c4 ( 1. e4 f5 {Eugene Coach: qq } ) d5 2. cxd5 {YuKai Student: r} 0-1', 62, 0, '', 500, '0-1'),
(2, 61, 'ChessClips Game', 'f', 'f', '2018-10-08 19:21:14', '2018-10-08 19:46:44', '', '1. h3 ( 1. f3 g6 {Eugene Coach: sssssssssssssssssss } ) g5 {YuKai Student: s} 1-0', 62, 0, '', 500, '1-0'),
(3, 61, 'ChessClips Game', 'Eugene', 'Rapunzel', '2018-10-08 19:22:49', '2018-10-08 19:44:07', '', '1. e3 {Eugene Coach: w } Nf6 {Eugene Coach: ww } 1-0', 62, 0, '', 500, '1-0'),
(4, 61, 'ChessClips Game', 'Eugene', 'Rapunzel', '2018-10-08 19:47:35', '2018-10-08 19:47:45', '', '1. g3 f6 2. g4 f5 3. gxf5 {YuKai Student: s } 1/2-1/2', 62, 0, '', 0, '1/2-1/2'),
(5, 61, 'ChessClips Game', 'Maximus', 'Gothl', '2018-10-08 19:47:48', '2018-10-08 19:48:46', '', '1. f4 g5 2. fxg5 {YuKai Student: s} Nc6 {Eugene Coach: ssssssssss } 1-0', 62, 0, '', 0, '1-0'),
(6, 61, 'ChessClips Game', '', '', '2018-10-09 20:28:53', '', '', '', 0, 0, '', 1, ''),
(7, 61, 'ChessClips Game', '', '', '2018-10-09 20:29:28', '', '', '', 0, 0, '', 1, ''),
(8, 61, 'ChessClips Game', '', '', '2018-10-09 20:32:03', '', '', '', 0, 0, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_game_history`
--

CREATE TABLE `tbl_game_history` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `move_num` int(11) NOT NULL,
  `game_fen` text NOT NULL,
  `game_pgn` text NOT NULL,
  `last_move` varchar(10) NOT NULL,
  `move_time` varchar(25) NOT NULL,
  `mv_question` longtext NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgnfiles`
--

CREATE TABLE `tbl_pgnfiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `pgn_link` text NOT NULL,
  `pgn_text` longtext NOT NULL,
  `pgn_date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass_word` varchar(55) NOT NULL,
  `user_balance` double NOT NULL,
  `title` varchar(20) NOT NULL,
  `pref_lang` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `reg_date` varchar(25) NOT NULL,
  `email_key` varchar(20) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `email`, `pass_word`, `user_balance`, `title`, `pref_lang`, `user_type`, `reg_date`, `email_key`, `user_status`) VALUES
(61, 'YuKai Student', 'yukai7777@outlook.com', 'MTIzcXdl', 0, '', 'English', 'student', '2018-10-08 14:27:47', 'ajdbdLCmVpxn', 1),
(62, 'Eugene Coach', 'eugene19950901@outlook.com', 'MTIzcXdl', 0, '', 'English', 'coach', '2018-10-08 14:28:44', 'uqQUKqYG8ntX', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_emails`
--
ALTER TABLE `tbl_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_games`
--
ALTER TABLE `tbl_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_game_history`
--
ALTER TABLE `tbl_game_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pgnfiles`
--
ALTER TABLE `tbl_pgnfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_emails`
--
ALTER TABLE `tbl_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `tbl_games`
--
ALTER TABLE `tbl_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_game_history`
--
ALTER TABLE `tbl_game_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pgnfiles`
--
ALTER TABLE `tbl_pgnfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
