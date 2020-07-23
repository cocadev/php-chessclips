-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 50.62.209.14:3306
-- Generation Time: Jul 24, 2018 at 08:38 AM
-- Server version: 5.5.43-37.2-log
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ph17726826401_chessclips`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_games`
--

CREATE TABLE `tbl_games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` varchar(25) NOT NULL,
  `end_time` varchar(25) NOT NULL,
  `game_fen` text NOT NULL,
  `submit_to` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_games`
--

INSERT INTO `tbl_games` (`id`, `user_id`, `start_time`, `end_time`, `game_fen`, `submit_to`, `status`) VALUES
(13, 25, '2018-07-21 03:38:21', '', 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', 0, 1),
(15, 31, '2018-07-22 18:54:44', '2018-07-22 18:54:55', 'rn1qkbnr/pp2pppp/2p5/3pPb2/3P4/8/PPP2PPP/RNBQKBNR w KQkq - 1 4', 17, 0),
(16, 32, '2018-07-22 20:16:08', '2018-07-24 13:41:53', '8/p3kp2/4p3/3pPP1R/1p5R/8/PPr3r1/3K4 w - - 0 36', 0, 0),
(17, 20, '2018-07-22 21:22:33', '2018-07-22 21:22:44', 'r1bqkbnr/pp1ppppp/2n5/8/3NP3/8/PPP2PPP/RNBQKB1R b KQkq - 0 4', 17, 0),
(18, 20, '2018-07-23 16:53:08', '2018-07-23 16:53:45', 'r1b1kbnr/pp3ppp/2n5/2ppp3/7N/3P2P1/PPP1PPBP/RNBQ1RK1 b kq - 0 6', 33, 0),
(19, 20, '2018-07-23 17:13:47', '2018-07-23 17:14:17', 'rnbqkbnr/ppp2ppp/3pp3/8/5P2/4P3/PPPP2PP/RNBQKBNR w KQkq - 0 3', 17, 0),
(20, 20, '2018-07-23 19:00:54', '2018-07-24 12:52:13', 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', 17, 0),
(21, 20, '2018-07-24 12:52:37', '2018-07-24 12:53:32', 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', 0, 0),
(22, 20, '2018-07-24 13:48:07', '2018-07-24 14:31:38', 'rnbqkbnr/pp1ppppp/8/2p5/8/5NP1/PPPPPP1P/RNBQKB1R b KQkq - 1 2', 17, 0),
(23, 32, '2018-07-24 14:25:40', '', 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', 0, 1);

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
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_game_history`
--

INSERT INTO `tbl_game_history` (`id`, `game_id`, `move_num`, `game_fen`, `game_pgn`, `last_move`, `move_time`, `comment`) VALUES
(334, 13, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-21 03:38:22', ''),
(343, 15, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 18:54:45', ''),
(344, 15, 2, 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1', '1. e4', 'e4', '2018-07-22 18:54:46', 'e4'),
(345, 15, 3, 'rnbqkbnr/pp1ppppp/2p5/8/4P3/8/PPPP1PPP/RNBQKBNR w KQkq - 0 2', '1. e4 c6', 'c6', '2018-07-22 18:54:47', 'c6\r\nCaro cann defense'),
(346, 15, 4, 'rnbqkbnr/pp1ppppp/2p5/8/3PP3/8/PPP2PPP/RNBQKBNR b KQkq d3 0 2', '1. e4 c6 2. d4', 'd4', '2018-07-22 18:54:48', 'd4'),
(347, 15, 5, 'rnbqkbnr/pp2pppp/2p5/3p4/3PP3/8/PPP2PPP/RNBQKBNR w KQkq d6 0 3', '1. e4 c6 2. d4 d5', 'd5', '2018-07-22 18:54:48', 'd5'),
(348, 15, 6, 'rnbqkbnr/pp2pppp/2p5/3pP3/3P4/8/PPP2PPP/RNBQKBNR b KQkq - 0 3', '1. e4 c6 2. d4 d5 3. e5', 'e5', '2018-07-22 18:54:49', 'e5'),
(349, 15, 7, 'rn1qkbnr/pp2pppp/2p5/3pPb2/3P4/8/PPP2PPP/RNBQKBNR w KQkq - 1 4', '1. e4 c6 2. d4 d5 3. e5 Bf5', 'Bf5', '2018-07-22 18:54:50', 'Bf5'),
(350, 16, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 20:16:09', ''),
(351, 16, 2, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 20:19:04', ''),
(352, 16, 3, 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1', '1. e4', 'e4', '2018-07-22 20:19:09', ''),
(353, 16, 4, 'rnbqkbnr/ppppp1pp/8/5p2/4P3/8/PPPP1PPP/RNBQKBNR w KQkq f6 0 2', '1. e4 f5', 'f5', '2018-07-22 20:19:10', ''),
(354, 16, 5, 'rnbqkbnr/ppppp1pp/8/5P2/8/8/PPPP1PPP/RNBQKBNR b KQkq - 0 2', '1. e4 f5 2. exf5', 'exf5', '2018-07-22 20:19:14', ''),
(355, 16, 6, 'rnbqkbnr/ppppp2p/8/5Pp1/8/8/PPPP1PPP/RNBQKBNR w KQkq g6 0 3', '1. e4 f5 2. exf5 g5', 'g5', '2018-07-22 20:19:19', ''),
(356, 16, 7, 'rnbqkbnr/ppppp2p/8/5PpQ/8/8/PPPP1PPP/RNB1KBNR b KQkq - 1 3', '1. e4 f5 2. exf5 g5 3. Qh5#', 'Qh5#', '2018-07-22 20:19:23', ''),
(357, 16, 8, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 20:19:27', ''),
(358, 16, 9, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 20:19:31', ''),
(359, 16, 10, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 20:19:45', ''),
(360, 16, 11, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 20:20:52', ''),
(390, 17, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-22 21:22:34', ''),
(391, 17, 2, 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1', '1. e4', 'e4', '2018-07-22 21:22:35', 'e4'),
(392, 17, 3, 'rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2', '1. e4 c5', 'c5', '2018-07-22 21:22:36', 'c5'),
(393, 17, 4, 'rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2', '1. e4 c5 2. Nf3', 'Nf3', '2018-07-22 21:22:37', 'Nf3'),
(394, 17, 5, 'r1bqkbnr/pp1ppppp/2n5/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R w KQkq - 2 3', '1. e4 c5 2. Nf3 Nc6', 'Nc6', '2018-07-22 21:22:38', 'Nc6'),
(395, 17, 6, 'r1bqkbnr/pp1ppppp/2n5/2p5/3PP3/5N2/PPP2PPP/RNBQKB1R b KQkq d3 0 3', '1. e4 c5 2. Nf3 Nc6 3. d4', 'd4', '2018-07-22 21:22:39', 'd4'),
(396, 17, 7, 'r1bqkbnr/pp1ppppp/2n5/8/3pP3/5N2/PPP2PPP/RNBQKB1R w KQkq - 0 4', '1. e4 c5 2. Nf3 Nc6 3. d4 cxd4', 'cxd4', '2018-07-22 21:22:39', 'cxd4'),
(397, 17, 8, 'r1bqkbnr/pp1ppppp/2n5/8/3NP3/8/PPP2PPP/RNBQKB1R b KQkq - 0 4', '1. e4 c5 2. Nf3 Nc6 3. d4 cxd4 4. Nxd4', 'Nxd4', '2018-07-22 21:22:40', 'Nxd4\r\nOpen Sicilian '),
(398, 18, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-23 16:53:09', ''),
(399, 18, 2, 'rnbqkbnr/pppppppp/8/8/8/6P1/PPPPPP1P/RNBQKBNR b KQkq - 0 1', '1. g3', 'g3', '2018-07-23 16:53:19', ''),
(400, 18, 3, 'rnbqkbnr/pp1ppppp/8/2p5/8/6P1/PPPPPP1P/RNBQKBNR w KQkq c6 0 2', '1. g3 c5', 'c5', '2018-07-23 16:53:23', ''),
(401, 18, 4, 'rnbqkbnr/pp1ppppp/8/2p5/8/6P1/PPPPPPBP/RNBQK1NR b KQkq - 1 2', '1. g3 c5 2. Bg2', 'Bg2', '2018-07-23 16:53:23', ''),
(402, 18, 5, 'rnbqkbnr/pp2pppp/8/2pp4/8/6P1/PPPPPPBP/RNBQK1NR w KQkq d6 0 3', '1. g3 c5 2. Bg2 d5', 'd5', '2018-07-23 16:53:24', ''),
(403, 18, 6, 'rnbqkbnr/pp2pppp/8/2pp4/8/3P2P1/PPP1PPBP/RNBQK1NR b KQkq - 0 3', '1. g3 c5 2. Bg2 d5 3. d3', 'd3', '2018-07-23 16:53:25', ''),
(404, 18, 7, 'r1bqkbnr/pp2pppp/2n5/2pp4/8/3P2P1/PPP1PPBP/RNBQK1NR w KQkq - 1 4', '1. g3 c5 2. Bg2 d5 3. d3 Nc6', 'Nc6', '2018-07-23 16:53:26', ''),
(405, 18, 8, 'r1bqkbnr/pp2pppp/2n5/2pp4/8/3P1NP1/PPP1PPBP/RNBQK2R b KQkq - 2 4', '1. g3 c5 2. Bg2 d5 3. d3 Nc6 4. Nf3', 'Nf3', '2018-07-23 16:53:29', ''),
(406, 18, 9, 'r1bqkbnr/pp3ppp/2n5/2ppp3/8/3P1NP1/PPP1PPBP/RNBQK2R w KQkq e6 0 5', '1. g3 c5 2. Bg2 d5 3. d3 Nc6 4. Nf3 e5', 'e5', '2018-07-23 16:53:30', ''),
(407, 18, 10, 'r1bqkbnr/pp3ppp/2n5/2ppp3/8/3P1NP1/PPP1PPBP/RNBQ1RK1 b kq - 1 5', '1. g3 c5 2. Bg2 d5 3. d3 Nc6 4. Nf3 e5 5. O-O', 'O-O', '2018-07-23 16:53:30', ''),
(408, 18, 11, 'r1b1kbnr/pp3ppp/2n5/2ppp3/7q/3P1NP1/PPP1PPBP/RNBQ1RK1 w kq - 2 6', '1. g3 c5 2. Bg2 d5 3. d3 Nc6 4. Nf3 e5 5. O-O Qh4', 'Qh4', '2018-07-23 16:53:39', ''),
(409, 18, 12, 'r1b1kbnr/pp3ppp/2n5/2ppp3/7N/3P2P1/PPP1PPBP/RNBQ1RK1 b kq - 0 6', '1. g3 c5 2. Bg2 d5 3. d3 Nc6 4. Nf3 e5 5. O-O Qh4 6. Nxh4', 'Nxh4', '2018-07-23 16:53:40', ''),
(410, 19, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-23 17:13:47', ''),
(411, 19, 2, 'rnbqkbnr/pppppppp/8/8/8/4P3/PPPP1PPP/RNBQKBNR b KQkq - 0 1', '1. e3', 'e3', '2018-07-23 17:13:52', 'e3'),
(412, 19, 3, 'rnbqkbnr/ppp1pppp/3p4/8/8/4P3/PPPP1PPP/RNBQKBNR w KQkq - 0 2', '1. e3 d6', 'd6', '2018-07-23 17:13:53', 'd6'),
(413, 19, 4, 'rnbqkbnr/ppp1pppp/3p4/8/5P2/4P3/PPPP2PP/RNBQKBNR b KQkq f3 0 2', '1. e3 d6 2. f4', 'f4', '2018-07-23 17:13:54', 'f4\r\nBad move'),
(414, 19, 5, 'rnbqkbnr/ppp2ppp/3pp3/8/5P2/4P3/PPPP2PP/RNBQKBNR w KQkq - 0 3', '1. e3 d6 2. f4 e6', 'e6', '2018-07-23 17:13:55', 'e6'),
(415, 20, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-23 19:00:55', ''),
(416, 20, 2, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-23 20:31:18', ''),
(417, 20, 3, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 12:51:34', ''),
(418, 20, 4, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 12:51:56', ''),
(419, 20, 5, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 12:52:06', ''),
(420, 21, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 12:52:37', ''),
(421, 21, 2, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 12:53:08', ''),
(422, 21, 3, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 12:53:21', ''),
(424, 16, 12, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 13:32:11', ''),
(425, 16, 13, 'rnbqkbnr/pppppppp/8/8/2P5/8/PP1PPPPP/RNBQKBNR b KQkq c3 0 1', '1. c4', 'c4', '2018-07-24 13:32:22', ''),
(426, 16, 14, 'rnbqkbnr/pppp1ppp/8/4p3/2P5/8/PP1PPPPP/RNBQKBNR w KQkq e6 0 2', '1. c4 e5', 'e5', '2018-07-24 13:32:23', ''),
(427, 16, 15, 'rnbqkbnr/pppp1ppp/8/4p3/2P5/2N5/PP1PPPPP/R1BQKBNR b KQkq - 1 2', '1. c4 e5 2. Nc3', 'Nc3', '2018-07-24 13:32:25', ''),
(428, 16, 16, 'rnbqkb1r/pppp1ppp/5n2/4p3/2P5/2N5/PP1PPPPP/R1BQKBNR w KQkq - 2 3', '1. c4 e5 2. Nc3 Nf6', 'Nf6', '2018-07-24 13:32:49', ''),
(429, 16, 17, 'rnbqkb1r/pppp1ppp/5n2/4p3/2P5/2N3P1/PP1PPP1P/R1BQKBNR b KQkq - 0 3', '1. c4 e5 2. Nc3 Nf6 3. g3', 'g3', '2018-07-24 13:32:54', ''),
(430, 16, 18, 'rnbqkb1r/ppp2ppp/5n2/3pp3/2P5/2N3P1/PP1PPP1P/R1BQKBNR w KQkq d6 0 4', '1. c4 e5 2. Nc3 Nf6 3. g3 d5', 'd5', '2018-07-24 13:32:55', ''),
(431, 16, 19, 'rnbqkb1r/ppp2ppp/5n2/3Pp3/8/2N3P1/PP1PPP1P/R1BQKBNR b KQkq - 0 4', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5', 'cxd5', '2018-07-24 13:32:56', ''),
(432, 16, 20, 'rnbqkb1r/ppp2ppp/8/3np3/8/2N3P1/PP1PPP1P/R1BQKBNR w KQkq - 0 5', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5', 'Nxd5', '2018-07-24 13:32:57', ''),
(433, 16, 21, 'rnbqkb1r/ppp2ppp/8/3np3/8/2N3P1/PP1PPPBP/R1BQK1NR b KQkq - 1 5', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5 5. Bg2', 'Bg2', '2018-07-24 13:32:58', ''),
(434, 16, 22, 'rnbqkb1r/ppp2ppp/1n6/4p3/8/2N3P1/PP1PPPBP/R1BQK1NR w KQkq - 2 6', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5 5. Bg2 Nb6', 'Nb6', '2018-07-24 13:32:59', ''),
(435, 16, 23, 'rnbqkb1r/ppp2ppp/1n6/4p3/8/2N2NP1/PP1PPPBP/R1BQK2R b KQkq - 3 6', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5 5. Bg2 Nb6 6. Nf3', 'Nf3', '2018-07-24 13:33:00', ''),
(436, 16, 24, 'r1bqkb1r/ppp2ppp/1nn5/4p3/8/2N2NP1/PP1PPPBP/R1BQK2R w KQkq - 4 7', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5 5. Bg2 Nb6 6. Nf3 Nc6', 'Nc6', '2018-07-24 13:33:01', ''),
(437, 16, 25, 'r1bqkb1r/ppp2ppp/1nn5/4p3/8/2N2NP1/PP1PPPBP/R1BQ1RK1 b kq - 5 7', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5 5. Bg2 Nb6 6. Nf3 Nc6 7. O-O', 'O-O', '2018-07-24 13:33:08', ''),
(438, 16, 26, 'r1bqk2r/ppp1bppp/1nn5/4p3/8/2N2NP1/PP1PPPBP/R1BQ1RK1 w kq - 6 8', '1. c4 e5 2. Nc3 Nf6 3. g3 d5 4. cxd5 Nxd5 5. Bg2 Nb6 6. Nf3 Nc6 7. O-O Be7', 'Be7', '2018-07-24 13:33:13', ''),
(439, 16, 27, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 13:36:27', ''),
(440, 16, 28, 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1', '1. e4', 'e4', '2018-07-24 13:36:55', ''),
(441, 16, 29, 'rnbqkbnr/ppp1pppp/3p4/8/4P3/8/PPPP1PPP/RNBQKBNR w KQkq - 0 2', '1. e4 d6', 'd6', '2018-07-24 13:36:57', ''),
(442, 16, 30, 'rnbqkbnr/ppp1pppp/3p4/8/3PP3/8/PPP2PPP/RNBQKBNR b KQkq d3 0 2', '1. e4 d6 2. d4', 'd4', '2018-07-24 13:36:57', ''),
(443, 16, 31, 'rnbqkb1r/ppp1pppp/3p1n2/8/3PP3/8/PPP2PPP/RNBQKBNR w KQkq - 1 3', '1. e4 d6 2. d4 Nf6', 'Nf6', '2018-07-24 13:36:58', ''),
(444, 16, 32, 'rnbqkb1r/ppp1pppp/3p1n2/8/3PP3/2N5/PPP2PPP/R1BQKBNR b KQkq - 2 3', '1. e4 d6 2. d4 Nf6 3. Nc3', 'Nc3', '2018-07-24 13:36:59', ''),
(445, 16, 33, 'rnbqkb1r/ppp1pp1p/3p1np1/8/3PP3/2N5/PPP2PPP/R1BQKBNR w KQkq - 0 4', '1. e4 d6 2. d4 Nf6 3. Nc3 g6', 'g6', '2018-07-24 13:37:11', ''),
(446, 16, 34, 'rnbqkb1r/ppp1pp1p/3p1np1/8/3PPB2/2N5/PPP2PPP/R2QKBNR b KQkq - 1 4', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4', 'Bf4', '2018-07-24 13:37:12', ''),
(447, 16, 35, 'rnbqkb1r/pp2pp1p/2pp1np1/8/3PPB2/2N5/PPP2PPP/R2QKBNR w KQkq - 0 5', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6', 'c6', '2018-07-24 13:37:18', ''),
(448, 16, 36, 'rnbqkb1r/pp2pp1p/2pp1np1/8/3PPB2/2N2N2/PPP2PPP/R2QKB1R b KQkq - 1 5', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3', 'Nf3', '2018-07-24 13:37:19', ''),
(449, 16, 37, 'rnbqk2r/pp2ppbp/2pp1np1/8/3PPB2/2N2N2/PPP2PPP/R2QKB1R w KQkq - 2 6', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7', 'Bg7', '2018-07-24 13:37:20', ''),
(450, 16, 38, 'rnbqk2r/pp2ppbp/2pp1np1/8/3PPB2/2N2N2/PPPQ1PPP/R3KB1R b KQkq - 3 6', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2', 'Qd2', '2018-07-24 13:37:26', ''),
(451, 16, 39, 'rnbq1rk1/pp2ppbp/2pp1np1/8/3PPB2/2N2N2/PPPQ1PPP/R3KB1R w KQ - 4 7', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O', 'O-O', '2018-07-24 13:37:28', ''),
(452, 16, 40, 'rnbq1rk1/pp2ppbp/2pp1np1/8/3PPB2/2N2N1P/PPPQ1PP1/R3KB1R b KQ - 0 7', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3', 'h3', '2018-07-24 13:37:35', ''),
(453, 16, 41, 'rnb2rk1/pp2ppbp/2pp1np1/q7/3PPB2/2N2N1P/PPPQ1PP1/R3KB1R w KQ - 1 8', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5', 'Qa5', '2018-07-24 13:37:37', ''),
(454, 16, 42, 'rnb2rk1/pp2ppbp/2pp1np1/q3P3/3P1B2/2N2N1P/PPPQ1PP1/R3KB1R b KQ - 0 8', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5', 'e5', '2018-07-24 13:37:37', ''),
(455, 16, 43, 'rnb2rk1/pp2ppbp/2p2np1/q3p3/3P1B2/2N2N1P/PPPQ1PP1/R3KB1R w KQ - 0 9', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5', 'dxe5', '2018-07-24 13:37:39', ''),
(456, 16, 44, 'rnb2rk1/pp2ppbp/2p2np1/q3P3/5B2/2N2N1P/PPPQ1PP1/R3KB1R b KQ - 0 9', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5', 'dxe5', '2018-07-24 13:37:43', ''),
(457, 16, 45, 'rnb2rk1/pp2ppbp/2p3p1/q2nP3/5B2/2N2N1P/PPPQ1PP1/R3KB1R w KQ - 1 10', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5', 'Nd5', '2018-07-24 13:37:44', ''),
(458, 16, 46, 'rnb2rk1/pp2ppbp/2p3p1/q2NP3/5B2/5N1P/PPPQ1PP1/R3KB1R b KQ - 0 10', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5', 'Nxd5', '2018-07-24 13:37:49', ''),
(459, 16, 47, 'rnb2rk1/pp2ppbp/2p3p1/3NP3/5B2/5N1P/PPPq1PP1/R3KB1R w KQ - 0 11', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+', 'Qxd2+', '2018-07-24 13:37:53', ''),
(460, 16, 48, 'rnb2rk1/pp2ppbp/2p3p1/3NP3/8/5N1P/PPPB1PP1/R3KB1R b KQ - 0 11', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2', 'Bxd2', '2018-07-24 13:38:00', ''),
(461, 16, 49, 'rnb2rk1/pp2ppbp/6p1/3pP3/8/5N1P/PPPB1PP1/R3KB1R w KQ - 0 12', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5', 'cxd5', '2018-07-24 13:38:01', ''),
(462, 16, 50, 'rnb2rk1/pp2ppbp/6p1/3pP3/8/5N1P/PPPB1PP1/2KR1B1R b - - 1 12', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O', 'O-O-O', '2018-07-24 13:38:06', ''),
(463, 16, 51, 'r1b2rk1/pp2ppbp/2n3p1/3pP3/8/5N1P/PPPB1PP1/2KR1B1R w - - 2 13', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6', 'Nc6', '2018-07-24 13:38:07', ''),
(464, 16, 52, 'r1b2rk1/pp2ppbp/2n3p1/3pP3/8/2B2N1P/PPP2PP1/2KR1B1R b - - 3 13', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3', 'Bc3', '2018-07-24 13:38:08', ''),
(465, 16, 53, 'r1b2rk1/pp3pbp/2n1p1p1/3pP3/8/2B2N1P/PPP2PP1/2KR1B1R w - - 0 14', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6', 'e6', '2018-07-24 13:38:14', ''),
(466, 16, 54, 'r1b2rk1/pp3pbp/2n1p1p1/3pP3/7P/2B2N2/PPP2PP1/2KR1B1R b - - 0 14', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4', 'h4', '2018-07-24 13:38:15', ''),
(467, 16, 55, 'r1b2rk1/pp3pb1/2n1p1pp/3pP3/7P/2B2N2/PPP2PP1/2KR1B1R w - - 0 15', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6', 'h6', '2018-07-24 13:38:16', ''),
(468, 16, 56, 'r1b2rk1/pp3pb1/2n1p1pp/3pP3/7P/2BB1N2/PPP2PP1/2KR3R b - - 1 15', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3', 'Bd3', '2018-07-24 13:38:23', ''),
(469, 16, 57, 'r4rk1/pp1b1pb1/2n1p1pp/3pP3/7P/2BB1N2/PPP2PP1/2KR3R w - - 2 16', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7', 'Bd7', '2018-07-24 13:38:24', ''),
(470, 16, 58, 'r4rk1/pp1b1pb1/2n1p1pp/3pP3/7P/2BB1N2/PPP2PP1/2KRR3 b - - 3 16', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1', 'Rhe1', '2018-07-24 13:38:34', ''),
(471, 16, 59, 'r1r3k1/pp1b1pb1/2n1p1pp/3pP3/7P/2BB1N2/PPP2PP1/2KRR3 w - - 4 17', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8', 'Rfc8', '2018-07-24 13:38:35', ''),
(472, 16, 60, 'r1r3k1/pp1b1pb1/2n1p1pp/3pP3/7P/2BB1N2/PPPR1PP1/2K1R3 b - - 5 17', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2', 'Rd2', '2018-07-24 13:38:46', ''),
(473, 16, 61, '1rr3k1/pp1b1pb1/2n1p1pp/3pP3/7P/2BB1N2/PPPR1PP1/2K1R3 w - - 6 18', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8', 'Rab8', '2018-07-24 13:38:47', ''),
(474, 16, 62, '1rr3k1/pp1b1pb1/2n1p1pp/3pP3/7P/2BB1N2/PPP1RPP1/2K1R3 b - - 7 18', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2', 'Rde2', '2018-07-24 13:39:00', ''),
(475, 16, 63, '1rr3k1/p2b1pb1/2n1p1pp/1p1pP3/7P/2BB1N2/PPP1RPP1/2K1R3 w - b6 0 19', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5', 'b5', '2018-07-24 13:39:01', ''),
(476, 16, 64, '1rr3k1/p2b1pb1/2n1p1pp/1p1pP3/3N3P/2BB4/PPP1RPP1/2K1R3 b - - 1 19', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4', 'Nd4', '2018-07-24 13:39:13', ''),
(477, 16, 65, '1rr3k1/p2b1pb1/2n1p1pp/3pP3/1p1N3P/2BB4/PPP1RPP1/2K1R3 w - - 0 20', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4', 'b4', '2018-07-24 13:39:14', ''),
(478, 16, 66, '1rr3k1/p2b1pb1/2N1p1pp/3pP3/1p5P/2BB4/PPP1RPP1/2K1R3 b - - 0 20', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6', 'Nxc6', '2018-07-24 13:39:18', ''),
(479, 16, 67, '1rr3k1/p4pb1/2b1p1pp/3pP3/1p5P/2BB4/PPP1RPP1/2K1R3 w - - 0 21', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6', 'Bxc6', '2018-07-24 13:39:19', ''),
(480, 16, 68, '1rr3k1/p4pb1/2b1p1pp/3pP3/1p1B3P/3B4/PPP1RPP1/2K1R3 b - - 1 21', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4', 'Bd4', '2018-07-24 13:39:19', ''),
(481, 16, 69, '1rr3k1/p4pb1/4p1pp/1b1pP3/1p1B3P/3B4/PPP1RPP1/2K1R3 w - - 2 22', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5', 'Bb5', '2018-07-24 13:39:25', ''),
(482, 16, 70, '1rr3k1/p4pb1/4p1pp/1b1pP3/1p1B3P/3B4/PPPKRPP1/4R3 b - - 3 22', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2', 'Kd2', '2018-07-24 13:39:32', ''),
(483, 16, 71, '1rr3k1/p4pb1/4p1p1/1b1pP2p/1p1B3P/3B4/PPPKRPP1/4R3 w - - 0 23', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5', 'h5', '2018-07-24 13:39:33', ''),
(484, 16, 72, '1rr3k1/p4pb1/4p1p1/1b1pP2p/1p1B1P1P/3B4/PPPKR1P1/4R3 b - f3 0 23', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4', 'f4', '2018-07-24 13:39:42', ''),
(485, 16, 73, '1rr2bk1/p4p2/4p1p1/1b1pP2p/1p1B1P1P/3B4/PPPKR1P1/4R3 w - - 1 24', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8', 'Bf8', '2018-07-24 13:39:48', ''),
(486, 16, 74, '1rr2bk1/p4p2/4p1p1/1b1pP2p/1p1B1PPP/3B4/PPPKR3/4R3 b - g3 0 24', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4', 'g4', '2018-07-24 13:39:58', ''),
(487, 16, 75, '1rr2bk1/p4p2/4p1p1/1b1pP3/1p1B1PpP/3B4/PPPKR3/4R3 w - - 0 25', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4', 'hxg4', '2018-07-24 13:39:59', ''),
(488, 16, 76, '1rr2bk1/p4p2/4p1p1/1b1pP3/1p1B1PpP/3B4/PPPKR3/6R1 b - - 1 25', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1', 'Rg1', '2018-07-24 13:40:05', ''),
(489, 16, 77, '1rr3k1/p4p2/4p1p1/1bbpP3/1p1B1PpP/3B4/PPPKR3/6R1 w - - 2 26', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5', 'Bc5', '2018-07-24 13:40:10', ''),
(490, 16, 78, '1rr3k1/p4p2/4p1p1/1bBpP3/1p3PpP/3B4/PPPKR3/6R1 b - - 0 26', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5', 'Bxc5', '2018-07-24 13:40:17', ''),
(491, 16, 79, '1r4k1/p4p2/4p1p1/1brpP3/1p3PpP/3B4/PPPKR3/6R1 w - - 0 27', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5', 'Rxc5', '2018-07-24 13:40:18', ''),
(492, 16, 80, '1r4k1/p4p2/4p1p1/1brpP3/1p3PRP/3B4/PPPKR3/8 b - - 0 27', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4', 'Rxg4', '2018-07-24 13:40:28', ''),
(493, 16, 81, '1r3k2/p4p2/4p1p1/1brpP3/1p3PRP/3B4/PPPKR3/8 w - - 1 28', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8', 'Kf8', '2018-07-24 13:40:28', ''),
(494, 16, 82, '1r3k2/p4p2/4p1p1/1brpP3/1p3PRP/3B4/PPPK3R/8 b - - 2 28', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2', 'Rh2', '2018-07-24 13:40:34', ''),
(495, 16, 83, '1r3k2/p4p2/4p1p1/2rpP3/1p3PRP/3b4/PPPK3R/8 w - - 0 29', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3', 'Bxd3', '2018-07-24 13:40:36', ''),
(496, 16, 84, '1r3k2/p4p2/4p1p1/2rpP3/1p3PRP/3K4/PPP4R/8 b - - 0 29', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3', 'Kxd3', '2018-07-24 13:40:40', ''),
(497, 16, 85, '1r3k2/p4p2/4p1p1/3pP3/1pr2PRP/3K4/PPP4R/8 w - - 1 30', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4', 'Rc4', '2018-07-24 13:40:41', ''),
(498, 16, 86, '1r3k2/p4p2/4p1p1/3pP2P/1pr2PR1/3K4/PPP4R/8 b - - 0 30', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5', 'h5', '2018-07-24 13:40:52', ''),
(499, 16, 87, '1r3k2/p4p2/4p3/3pP2p/1pr2PR1/3K4/PPP4R/8 w - - 0 31', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5', 'gxh5', '2018-07-24 13:40:52', ''),
(500, 16, 88, '1r3k2/p4p2/4p3/3pP2R/1pr2PR1/3K4/PPP5/8 b - - 0 31', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5', 'Rxh5', '2018-07-24 13:41:06', ''),
(501, 16, 89, '1r6/p3kp2/4p3/3pP2R/1pr2PR1/3K4/PPP5/8 w - - 1 32', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7', 'Ke7', '2018-07-24 13:41:12', ''),
(502, 16, 90, '1r6/p3kp2/4p3/3pP2R/1pr2P1R/3K4/PPP5/8 b - - 2 32', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4', 'Rgh4', '2018-07-24 13:41:18', ''),
(503, 16, 91, '6r1/p3kp2/4p3/3pP2R/1pr2P1R/3K4/PPP5/8 w - - 3 33', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8', 'Rg8', '2018-07-24 13:41:28', ''),
(504, 16, 92, '6r1/p3kp2/4p3/3pPP1R/1pr4R/3K4/PPP5/8 b - - 0 33', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8 33. f5', 'f5', '2018-07-24 13:41:29', ''),
(505, 16, 93, '8/p3kp2/4p3/3pPP1R/1pr4R/3K2r1/PPP5/8 w - - 1 34', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8 33. f5 Rg3+', 'Rg3+', '2018-07-24 13:41:38', ''),
(506, 16, 94, '8/p3kp2/4p3/3pPP1R/1pr4R/6r1/PPPK4/8 b - - 2 34', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8 33. f5 Rg3+ 34. Kd2', 'Kd2', '2018-07-24 13:41:39', ''),
(507, 16, 95, '8/p3kp2/4p3/3pPP1R/1pr4R/8/PPPK2r1/8 w - - 3 35', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8 33. f5 Rg3+ 34. Kd2 Rg2+', 'Rg2+', '2018-07-24 13:41:39', ''),
(508, 16, 96, '8/p3kp2/4p3/3pPP1R/1pr4R/8/PPP3r1/3K4 b - - 4 35', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8 33. f5 Rg3+ 34. Kd2 Rg2+ 35. Kd1', 'Kd1', '2018-07-24 13:41:45', ''),
(509, 16, 97, '8/p3kp2/4p3/3pPP1R/1p5R/8/PPr3r1/3K4 w - - 0 36', '1. e4 d6 2. d4 Nf6 3. Nc3 g6 4. Bf4 c6 5. Nf3 Bg7 6. Qd2 O-O 7. h3 Qa5 8. e5 dxe5 9. dxe5 Nd5 10. Nxd5 Qxd2+ 11. Bxd2 cxd5 12. O-O-O Nc6 13. Bc3 e6 14. h4 h6 15. Bd3 Bd7 16. Rhe1 Rfc8 17. Rd2 Rab8 18. Rde2 b5 19. Nd4 b4 20. Nxc6 Bxc6 21. Bd4 Bb5 22. Kd2 h5 23. f4 Bf8 24. g4 hxg4 25. Rg1 Bc5 26. Bxc5 Rxc5 27. Rxg4 Kf8 28. Rh2 Bxd3 29. Kxd3 Rc4 30. h5 gxh5 31. Rxh5 Ke7 32. Rgh4 Rg8 33. f5 Rg3+ 34. Kd2 Rg2+ 35. Kd1 Rcxc2', 'Rcxc2', '2018-07-24 13:41:46', ''),
(511, 22, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 13:48:07', ''),
(512, 23, 1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 14:25:41', ''),
(513, 23, 2, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 14:25:54', ''),
(514, 22, 2, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 14:31:05', ''),
(515, 22, 3, 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1', '1. e4', 'e4', '2018-07-24 14:31:09', ''),
(516, 22, 4, 'rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2', '1. e4 c5', 'c5', '2018-07-24 14:31:10', ''),
(517, 22, 5, 'rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2', '1. e4 c5 2. Nf3', 'Nf3', '2018-07-24 14:31:11', ''),
(518, 22, 6, 'r1bqkbnr/pp1ppppp/2n5/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R w KQkq - 2 3', '1. e4 c5 2. Nf3 Nc6', 'Nc6', '2018-07-24 14:31:12', ''),
(519, 22, 7, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1', '', '', '2018-07-24 14:31:26', ''),
(520, 22, 8, 'rnbqkbnr/pppppppp/8/8/8/6P1/PPPPPP1P/RNBQKBNR b KQkq - 0 1', '1. g3', 'g3', '2018-07-24 14:31:30', ''),
(521, 22, 9, 'rnbqkbnr/pp1ppppp/8/2p5/8/6P1/PPPPPP1P/RNBQKBNR w KQkq c6 0 2', '1. g3 c5', 'c5', '2018-07-24 14:31:31', ''),
(522, 22, 10, 'rnbqkbnr/pp1ppppp/8/2p5/8/5NP1/PPPPPP1P/RNBQKB1R b KQkq - 1 2', '1. g3 c5 2. Nf3', 'Nf3', '2018-07-24 14:31:32', '');

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
(1, 'New Uname', 'majjanatech@gmail.com', 'YWRtaW4=', 0, '', '0', 'admin', '', '', 1),
(17, 'AliM', 'ali.morshedi@gmail.com', 'Y2hlc3NjbGlwczIwMTg=', 0, 'FM', 'English', 'coach', '2018-07-17 20:25:47', 'yFpC4HEx', 1),
(20, 'student0', 'student0@gmail.com', 'c3R1ZGVudDA=', 0, 'None', 'English', 'student', '2018-07-18 15:29:02', '', 1),
(24, 'Majjana', 'majjana.com@gmail.com', 'YWRtaW4=', 0, 'FM', 'English', 'coach', '2018-07-20 19:24:29', '', 1),
(28, 'Cristy:)', 'cristy.garcia1@gmail.com', 'cnVubmVyMzM=', 0, 'None', 'English', 'student', '2018-07-21 14:44:42', '', 1),
(30, 'Trocon Reffell', 'reffellt@hotmail.com', 'S25sZWRnZTc=', 0, 'None', 'English', 'student', '2018-07-22 18:22:09', 'CIXnXm6aYHbX', 0),
(31, 'StudentA', 'alimorshedi4283@yahoo.com', 'Y2hlc3NjbGlwczIwMTg=', 0, 'None', 'English', 'student', '2018-07-22 18:51:03', '', 1),
(32, 'Pascal Charbonneau ', 'charbop@gmail.com', 'Y2hlc3M4Mw==', 0, 'GM', 'English', 'student', '2018-07-22 20:09:10', '', 1),
(33, 'Andrei Zaremba', 'takebacktwo@gmail.com', 'aXBhbmVtYTExNA==', 0, 'FM', 'English', 'coach', '2018-07-23 16:30:54', '', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_games`
--
ALTER TABLE `tbl_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_game_history`
--
ALTER TABLE `tbl_game_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
