-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 11:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(25) NOT NULL,
  `email` varchar(2566) NOT NULL,
  `name` varchar(222) NOT NULL,
  `pass` varchar(2566) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `name`, `pass`) VALUES
(1, 'arka@admin.in', 'Arka', '123456'),
(2, 'sagar@admin.in', 'Sagar', '123456'),
(3, 'argha@admin.com', 'Argha', '123456'),
(4, 'shirsendu@admin.com', 'Shirsendu', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `file` varchar(900) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `p_name`, `name`, `content`, `file`, `time`) VALUES
(1, '', 'Sayan Das', 'hlo', '', '2024-02-09 00:28:49'),
(2, '', 'Sayan Das', 'jud', '', '2024-02-09 00:28:55'),
(3, '', 'Sayan Das', 'sdfdsf', '', '2024-02-09 00:28:59'),
(4, '', 'Sayan Das', 'waf', '', '2024-02-09 23:58:32'),
(5, '', 'Sayan Das', 'gfh', '', '2024-02-10 00:00:31'),
(6, '', 'Sayan Das', 'cvbvcb', '', '2024-02-10 00:00:36'),
(7, '', 'Sayan Das', 'nvgbnhfghj', '', '2024-02-10 00:00:38'),
(8, '', 'Sayan Das', 'fhfdh', '', '2024-02-10 00:00:39'),
(9, 'HtML', 'Sayan Das', 'k', '', '2024-02-10 10:07:24'),
(10, 'QFG444', 'Sayan Das', 'h', '', '2024-02-10 22:13:21'),
(11, 'QFG444', 'Sayan Das', 'ghf', '', '2024-02-10 22:49:14'),
(12, 'QFG444', 'Sayan Das', 'hfgh', '', '2024-02-10 22:49:16'),
(13, 'QFG444', 'Sayan Das', 'gdfgh', '', '2024-02-10 22:49:18'),
(14, 'QFG444', 'Sayan Das', 'xcvx', '', '2024-02-10 22:49:22'),
(15, 'AEDD', 'Sayan Das', 'ghj', '', '2024-02-15 00:29:52'),
(16, 'AEDD', 'Sayan Das', 'vbn', '', '2024-02-15 00:29:55'),
(17, 'AEDD', 'Sayan Das', '', 'Screenshot 2023-11-23 210545.png', '2024-02-15 00:30:07'),
(18, 'AEDD', 'Sayan Das', 'gjhg', 'Screenshot 2023-11-25 193141.png', '2024-02-15 00:30:15'),
(19, 'AEDD', 'Sayan Das', '', 'Screenshot 2023-10-19 202417.png', '2024-02-15 00:30:22'),
(20, 'AEDD', 'Sayan Das', '', 'WhatsApp_Image_2024-01-28_at_16.33.28_89cbbdcb-removebg-preview.png', '2024-02-15 01:20:32'),
(21, 'AEDD', 'Sayan Das', 'njk', '', '2024-02-16 13:06:15'),
(22, 'AEDD', 'Sayan Das', '', 'WhatsApp Image 2024-01-28 at 16.33.28_89cbbdcb.jpg', '2024-02-16 13:06:33'),
(23, 'KKKKKKKK', 'Sayan Das', 'fg', '', '2024-02-17 19:15:16'),
(24, 'KKKKKKKK', 'Sayan Das', 'fghfg', '', '2024-02-17 19:15:19'),
(25, 'KKKKKKKK', 'Sayan Das', 'gfhgfh', '', '2024-02-17 19:15:21'),
(26, 'KKKKKKKK', 'Sayan Das', '', 'WhatsApp Image 2024-02-17 at 00.46.17_3a4d6f89.jpg', '2024-02-17 19:15:27'),
(27, 'KKKKKKKK', 'Sayan Das', '', 'idman642build3.exe', '2024-02-17 19:15:34'),
(28, '', '', '', '', '2024-02-17 19:15:51'),
(29, '', '', '', '', '2024-02-17 19:17:29'),
(30, 'ASDF', 'Anamika Pal', 'bgh', '', '2024-03-22 21:18:15'),
(31, 'CURD', 'Anamika Pal', 'hlo', '', '2024-04-03 21:33:17'),
(32, 'CURD', 'Anushka Das', 'Hi', '', '2024-04-03 21:35:40'),
(33, 'CURD', 'Anamika Pal', '', 'Screenshot 2024-03-23 134829.png', '2024-04-03 21:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `complete`
--

CREATE TABLE `complete` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `submitted` varchar(255) NOT NULL,
  `submittedby` varchar(230) NOT NULL,
  `file` varchar(255) NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complete`
--

INSERT INTO `complete` (`id`, `pro_name`, `description`, `submitted`, `submittedby`, `file`, `uploaded`) VALUES
(1, 'Contact Them', 'red ', 'Shrilekha Sarkar', 'Customer Service', 'niloy.pdf ', '2023-11-23 17:54:40'),
(2, 'Axr56', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2023-11-23 17:59:55'),
(3, 'QFG444', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2023-11-23 18:00:44'),
(4, 'QASSS', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2023-11-23 18:00:54'),
(5, 'HtML', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2024-02-11 11:47:29'),
(6, 'AEDD', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2024-02-16 07:40:49'),
(7, 'JESUS', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2024-02-16 07:41:02'),
(8, 'dfg', 'red ', 'Sayan Das', 'Designing Team', 'niloy.pdf ', '2024-02-16 07:41:13'),
(9, 'ASDF', 'red ', 'Anamika Pal', 'Designing Team', 'niloy.pdf ', '2024-03-22 15:48:41'),
(10, '125FF', 'red ', 'Anamika Pal', 'Designing Team', 'niloy.pdf ', '2024-03-22 15:53:33'),
(11, 'CURD', 'as', 'Anamika Pal', 'Designing Team', 'StudySkill-Test.zip', '2024-04-03 16:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(8) NOT NULL,
  `deptm` varchar(225) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `deptm`, `dt`) VALUES
(1, 'Designing Team', '2023-11-26 11:55:35'),
(2, 'Marketing', '2023-09-28 16:40:03'),
(3, 'Development Team', '2023-09-28 16:40:26'),
(4, 'Management', '2023-09-28 16:40:36'),
(5, 'Customer Service', '2023-09-28 18:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deptm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `work_ex` varchar(255) NOT NULL,
  `cur_add` varchar(255) NOT NULL,
  `cur_city` varchar(255) NOT NULL,
  `cur_state` varchar(255) NOT NULL,
  `cur_zip` varchar(255) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `quali` varchar(255) NOT NULL,
  `per_add` varchar(255) NOT NULL,
  `per_city` varchar(255) NOT NULL,
  `per_state` varchar(255) NOT NULL,
  `per_zip` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `deptm`, `email`, `work_ex`, `cur_add`, `cur_city`, `cur_state`, `cur_zip`, `empid`, `role`, `phone`, `quali`, `per_add`, `per_city`, `per_state`, `per_zip`, `dt`) VALUES
(1, 'Aradhito Choudhury', 'Designing Team', 'aradito@ws.com', '2 years in Web Developmrntt', ' A.D Nagarr', '  Agartalaa', ' Tripuraa', ' 799120', 'DT1013M ', 'Manager', '8796545465', 'M.Techh', ' A.D Nagarr', '  Agartalaa', ' Tripuraa', ' 799120', '2023-11-23 21:39:02'),
(2, 'Priyangshu Dey', 'Marketing', 'priyangshu@ws.com', 'Past Experiance in Markating', 'Thnar Pukur Par', 'Udaipur', 'Tripura', '799120', 'MA1023M ', 'Manager', '8965785425', 'MBA', 'Thnar Pukur Par', 'Udaipur', 'Tripura', '799120', '2023-11-23 21:53:19'),
(3, 'Shirsendhu Das', 'Development Team', 'shirsendhu@ws.com', 'Big Experience', 'Ram Nagar', 'Agartala', 'Tripura', '799120', 'DT1032M ', 'Manager', '857535366', 'M.Tech', 'Ram Nagar', 'Agartala', 'Tripura', '799120', '2023-11-23 22:31:57'),
(4, 'Badal Choudhury', 'Management', 'badal@ws.com', 'TOO mUCH', 'Central Road', 'Udaipur', 'Tripura', '799120', 'MN1035M ', 'Manager', '8976465865', 'P.HD', 'Central Road', 'Udaipur', 'Tripura', '799120', '2023-11-23 22:44:07'),
(5, 'Ankur Biswas', 'Customer Service', 'ankur@ws.com', 'Past experiance in Airtal Customer Service', 'Banamali Pur', 'Agartala', 'Tripura', '799120', 'CS1023M ', 'Manager', '8796542525', 'Bsc', 'Banamali Pur', 'Agartala', 'Tripura', '799120', '2023-11-23 22:54:25'),
(6, 'Shrilekha Sarkar', 'Customer Service', 'shrilekha@ws.com', ' ', ' ', ' ', ' ', '799120', 'CS896E ', 'Employee', '896962523', ' ', ' ', ' ', ' ', '799120', '2023-11-23 23:24:27'),
(8, 'Ankit Badhya', 'Management', 'ankit@ws.com', ' ', ' ', ' ', ' ', '799120', 'MN5625E ', 'Employee', '789665655', ' ', ' ', ' ', ' ', '799120', '2023-11-23 23:48:25'),
(9, 'Shreya Routh', 'Management', 'shreya@ws.com', ' ', ' ', ' ', ' ', '799120', 'MN5455E ', 'Employee', '896565353', '  ', ' ', ' ', ' ', '799120', '2023-11-23 23:55:34'),
(10, 'Anushka Das', 'Designing Team', 'anushka@ws.com', ' ', ' ', ' ', ' ', '799120', 'DT5262 ', 'Employee', '897632535', ' ', ' ', ' ', ' ', '799120', '2023-11-24 21:21:00'),
(11, 'Ria Choudhury', 'Development Team', 'ria@ws.com', ' ', ' ', ' ', ' ', '799120', 'DT5636E ', 'Employee', '895535382', ' ', ' ', ' ', ' ', '786145', '2023-11-24 21:22:43'),
(12, 'asqw', 'Designing Team', 'email@ws.com', 'as', 'u', 'b', 'd', '786145', 'FS ', 'Freelancer', '60000001', 'kj', 'r', 'g', 'gg', '786145', '2024-02-11 19:10:29'),
(13, 'Sayan Das', 'Designing Team', 'arkajyotiroy445@gmail.com', 'as', 'as', 'as', 'as', ' 786145', 'DT5596 ', 'Employee', '8975696655', 'as', 'as', 'as', 'as', ' 786145', '2024-02-14 11:14:45'),
(14, 'Anamika Pal', 'Designing Team', 'anamika@ws.com', 'dfg', 'dfg', 'dfg', 'dfg', '786145', 'DT4535 ', 'Employee', '8975383526', 'dfg', 'dfg', 'fgd', 'dfg', '786145', '2024-02-14 23:35:46'),
(15, 'Diptanu Saha', 'Designing Team', 'diptanu@ws.com', 'fgd', 'xcv', 'sdf', 'xcvv', '786145', 'DT3515 ', 'Manager', '898565223', 'dfgdf', 'cvs', 'sdf', 'xcfer', '786145', '2024-02-14 23:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deptm` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `dt` timestamp(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `deptm`, `man`, `problem`, `desc`, `dt`) VALUES
(1, 'Aradhito Choudhury', 'Designing Team', 'Manager', 'Technical Issue', 'kkllklllllllllllllllllllllllllllllll', '2024-02-16 06:06:33.20484'),
(2, 'Aradhito Choudhury', 'Designing Team', 'Manager', 'Technical Issue', 'hn', '2024-03-22 15:46:40.73964');

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `deptm` varchar(99) NOT NULL,
  `leader` varchar(99) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deptm` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `reason` varchar(235) NOT NULL,
  `specify` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `last_date` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `name`, `deptm`, `man`, `type`, `reason`, `specify`, `img`, `start_date`, `last_date`, `email`, `status`) VALUES
(1, 'Aradhito Choudhury', 'Designing Team', 'Manager', '', 'qwsfcxc', '', '', '4565-04-20', '6546-05-04', 'aradito@ws.com', 'Approved'),
(3, 'Aradhito Choudhury', 'Designing Team', 'Manager', '', 'dgd', '', '', '2024-03-22', '2024-03-28', 'aradito@ws.com', 'Approved'),
(4, 'Anamika Pal', 'Designing Team', 'Employee', 'Casual Leave', 'Medical', 'Pat kharap', 'zoom/Screenshot 2023-10-19 202417.png', '2024-04-05', '2024-04-17', 'anamika@ws.com', 'Pending'),
(5, 'Anamika Pal', 'Designing Team', 'Employee', 'Casual Leave', 'Medical', 'Pat kharap', 'leave_file/Screenshot 2023-10-19 202417.png', '2024-04-06', '2024-04-18', 'anamika@ws.com', 'Pending'),
(6, 'Anamika Pal', 'Designing Team', 'Employee', 'Casual Leave', 'Medical', 'Pat kharap', '../leave_file/Screenshot 2023-11-25 193141.png', '2024-04-06', '2024-04-18', 'anamika@ws.com', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(26) NOT NULL,
  `name` varchar(253) NOT NULL,
  `img` varchar(356) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `deptm` varchar(235) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `email` varchar(235) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `man_task`
--

CREATE TABLE `man_task` (
  `id` int(11) NOT NULL,
  `p_name` varchar(99) NOT NULL,
  `starting_date` date NOT NULL,
  `leader` varchar(99) NOT NULL,
  `deptm` varchar(99) NOT NULL,
  `desc` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `ending_date` date NOT NULL,
  `upload_date` date NOT NULL,
  `member` varchar(99) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `man_task`
--

INSERT INTO `man_task` (`id`, `p_name`, `starting_date`, `leader`, `deptm`, `desc`, `status`, `ending_date`, `upload_date`, `member`, `dt`) VALUES
(1, 'Axr56', '2023-11-23', '', 'Designing Team', 'Submit it by 29th Nov.', 'pending', '2023-11-30', '2023-11-23', '', '2023-11-23 17:47:17'),
(2, 'QFG444', '2023-11-24', '', 'Designing Team', 'Submit it by 2nd Dec.', 'pending', '2023-12-02', '2023-11-23', '', '2023-11-23 17:48:14'),
(3, 'ASD785', '2023-11-23', '', 'Marketing', 'Do it fast', 'pending', '2023-11-27', '1000-01-01', '', '2023-11-23 17:48:50'),
(4, 'DTMH7566', '2023-11-24', '', 'Development Team', 'ASGUARD', 'pending', '2023-11-27', '1000-01-01', '', '2023-11-23 17:49:10'),
(5, 'Contact Them', '2023-11-23', '', 'Customer Service', 'ASAP Do it.', 'pending', '2023-12-09', '2023-11-23', '', '2023-11-23 17:49:54'),
(6, 'QASSS', '2023-11-24', '', 'Designing Team', 'lp', 'pending', '2023-12-05', '2023-11-23', '', '2023-11-23 17:50:18'),
(7, 'CDFF', '2023-11-24', '', 'Development Team', 'Submit it by 6th Dec.', 'pending', '2023-12-06', '1000-01-01', '', '2023-11-23 17:50:56'),
(8, 'QWS123', '2023-11-23', '', 'Management', 'All Found', 'pending', '2023-11-28', '1000-01-01', '', '2023-11-23 18:13:58'),
(9, 'ASDF', '2023-11-23', '', 'Management', 'ba;;', 'pending', '2023-11-30', '2024-03-22', '', '2023-11-23 18:14:18'),
(10, 'HtML', '2023-11-26', '', 'Designing Team', 'Ql', 'pending', '2023-11-30', '2024-02-11', '', '2023-11-26 11:23:57'),
(11, 'as', '2024-02-11', '', 'Designing Team', 'i', 'Re-Evaluated', '2024-02-12', '2024-02-15', '', '2024-02-11 11:31:23'),
(12, 'AEDD', '2024-02-14', '', 'Designing Team', 'fg', 'Re-Evaluated', '2024-02-22', '2024-02-16', '', '2024-02-14 18:08:23'),
(13, 'JESUS', '2024-02-14', '', 'Designing Team', 'asdsada', 'pending', '2024-02-27', '2024-02-16', '', '2024-02-14 18:12:07'),
(14, 'AQDDF', '2024-02-14', '', 'Development Team', 'xvdfe', 'Mid Update', '2024-02-29', '1000-01-01', '', '2024-02-14 18:13:03'),
(15, 'dfg', '2024-02-14', '', 'Designing Team', 'gfdgddf', 'Re-Evaluated', '2024-02-25', '2024-02-16', '', '2024-02-14 18:13:15'),
(16, 'KKKKKKKK', '2024-02-17', '', 'Designing Team', 'gjghjg', 'pending', '2024-02-17', '2024-02-17', '', '2024-02-17 13:11:10'),
(17, 'ASDF', '2024-03-19', '', 'Designing Team', 'ASGUARD', 'Re-Evaluated', '2024-03-27', '2024-03-22', '', '2024-03-19 07:14:22'),
(18, '125FF', '2024-03-23', '', 'Designing Team', 'gdfg', 'Re-Evaluated', '2024-03-30', '2024-03-22', '', '2024-03-22 15:41:24'),
(19, 'CURD', '2024-04-03', '', 'Designing Team', 'ASD', 'pending', '2024-04-10', '2024-04-03', '', '2024-04-03 15:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(25) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `deptm` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `ford` varchar(255) NOT NULL,
  `user` varchar(189) NOT NULL,
  `seen` varchar(225) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `subject`, `details`, `deptm`, `man`, `ford`, `user`, `seen`, `dt`) VALUES
(1, 'modon', 'dong', 'Designing Team', 'Manager', 'admin', 'Aradhito Choudhury', 'seen', '2023-11-23 23:39:47'),
(2, 'modon', 'donhjmh', 'Designing Team', '', 'admin', 'all', 'seen', '2023-11-23 23:39:58'),
(4, 'asad', 'asas', 'Management', 'Employee', 'manager', 'all', '', '2023-11-24 00:03:31'),
(5, 'df', 'df', 'Management', '', 'manager', 'all', '', '2023-11-24 00:04:36'),
(6, 'sagar', 'fdgfdg', 'Designing Team', '', 'admin', 'all', 'seen', '2023-11-24 21:15:07'),
(7, 'yu', 'hj', 'Designing Team', '', 'manager', 'all', 'seen', '2023-11-24 21:16:31'),
(8, 'hnb', 'tg', 'Designing Team', 'Employee', 'manager', 'Anushka Das', 'seen', '2023-11-24 21:16:43'),
(9, 'we', 'io', 'Designing Team', 'Employee', 'manager', 'Sayan Das', 'seen', '2023-11-24 21:19:40'),
(11, 'modon', '4556456', 'All Department', 'Manager & Employee', 'admin', 'all', 'not_seen', '2023-11-24 21:23:13'),
(12, 'mm', 'bnmnb', 'All Department', 'Manager & Employee', 'admin', 'all', 'not_seen', '2023-11-24 21:23:46'),
(13, 'SS', 'DD', 'Designing Team', 'Manager', 'admin', 'Aradhito Choudhury', 'seen', '2024-03-22 21:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(35) NOT NULL,
  `deptm` varchar(255) NOT NULL,
  `man` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `allowance` varchar(255) NOT NULL,
  `allo_amount` varchar(255) NOT NULL,
  `deduction` varchar(255) NOT NULL,
  `ded_amount` varchar(255) NOT NULL,
  `basic` varchar(255) NOT NULL,
  `total_allo` varchar(255) NOT NULL,
  `total_ded` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `deptm`, `man`, `name`, `year`, `month`, `allowance`, `allo_amount`, `deduction`, `ded_amount`, `basic`, `total_allo`, `total_ded`, `net_salary`, `mode`, `dt`) VALUES
(1, 'Designing Team', 'Manager', 'Aradhito Choudhury', '2024', 'November', 'Housing', '2569', 'Monthly Tax Deduction', '23', '500000', '2570', '40000', '462570', 'Cheque', '2023-11-23 17:34:10'),
(2, 'Designing Team', 'Employee', 'Anushka Das', '2024', 'November', 'Housing', '577', 'Monthly Tax Deduction', '75', '758757', '577', '75', '759259', 'NEFT', '2023-11-23 17:34:43'),
(3, 'Designing Team', 'Employee', 'Sayan Das', '2023', 'November', 'Housing', '785', 'Monthly Tax Deduction', '58', '587587', '785', '58', '588314', 'IMPS', '2023-11-23 17:35:07'),
(4, 'Designing Team', 'Employee', 'Sayan Das', '2023', 'November', 'Housing', '5885', 'Monthly Tax Deduction', '85', '25242785', '8585', '85', '25251285', 'RTGS', '2023-11-23 17:35:35'),
(5, 'Designing Team', 'Employee', 'Anamika Pal', '2023', 'November', 'Housing', '555', 'Monthly Tax Deduction', '85', '5858585', '0555', '0858', '5858282', 'IMPS', '2023-11-23 17:36:05'),
(6, 'Designing Team', 'Manager', 'Aradhito Choudhury', '2023', 'November', 'Housing', '88', 'Monthly Tax Deduction', '5858', '53536389', '03363', '06363', '53533389', 'UPI', '2023-11-23 17:36:26'),
(7, 'Marketing', 'Manager', 'Priyangshu Dey', '2024', 'November', 'Housing', '53653', 'Monthly Tax Deduction', '3653', '83838383', '0353', '0563', '83838173', 'NEFT', '2023-11-23 17:36:43'),
(8, 'Marketing', 'Employee', 'Saurajit Dey', '2024', 'November', 'Housing', '5635', 'Monthly Tax Deduction', '653', '36838398', '0434363', '04343', '37268418', 'UPI', '2023-11-23 17:37:15'),
(9, 'Marketing', 'Employee', 'Suravi Chakraborty', '2023', 'November', 'Housing', '63638', 'Monthly Tax Deduction', '565', '66383833', '685585', '565', '67068853', 'RTGS', '2023-11-23 17:37:41'),
(10, 'Marketing', 'Employee', 'Anurag Saha', '2023', 'November', 'Travel Allowance', '72752', 'Other', '42', '245427527', '045254', '0452', '245472329', 'Cheque', '2023-11-23 17:38:19'),
(11, 'Marketing', 'Employee', 'Sonali Das', '2023', 'November', 'Housing', '53653', 'Monthly Tax Deduction', '23', '53563563', '0363383', '038363', '53888583', 'e-Rupee', '2023-11-23 17:38:56'),
(12, 'Development Team', 'Manager', 'Shirsendhu Das', '2024', 'November', 'Housing', '66363', 'Monthly Tax Deduction', '563', '535334363', '05635635', '0563', '540969435', 'UPI', '2023-11-23 17:39:17'),
(13, 'Development Team', 'Employee', 'Ria Choudhury', '2023', 'November', 'Housing', '2452', 'Monthly Tax Deduction', '425', '452452', '05245', '0254', '457443', 'UPI', '2023-11-23 17:40:03'),
(14, 'Development Team', 'Employee', 'Rakesh Dhar', '2024', 'November', 'Housing', '452', 'Monthly Tax Deduction', '5', '522424', '05245', '0252', '527417', 'e-Rupee', '2023-11-23 17:40:21'),
(15, 'Development Team', 'Employee', 'Sagnik Roy', '2023', 'November', 'Housing', '452452', 'Monthly Tax Deduction', '2525', '424242', '0252', '052', '424442', 'NEFT', '2023-11-23 17:40:41'),
(16, 'Management', 'Manager', 'Badal Choudhury', '2023', 'November', 'Housing', '424255', 'Monthly Tax Deduction', '223', '53556356', '5353653', '54324', '58855685', 'IMPS', '2023-11-23 17:41:14'),
(17, 'Management', 'Manager', 'Badal Choudhury', '2023', 'November', 'Housing', '54343', 'Monthly Tax Deduction', '563', '5633737', '777', '052', '5634462', 'NEFT', '2023-11-23 17:41:36'),
(18, 'Management', 'Employee', 'Shreya Routh', '2024', 'November', 'Housing', '453453', 'Monthly Tax Deduction', '453', '534343', '035385', '0353', '569375', 'e-Rupee', '2023-11-23 17:41:56'),
(19, 'Management', 'Employee', 'Punith Chakraborty', '2023', 'November', 'Housing', '664534', 'Monthly Tax Deduction', '5635', '335352', '052', '02', '335402', 'UPI', '2023-11-23 17:42:21'),
(20, 'Management', 'Employee', 'Ankit Badhya', '2023', 'November', 'Housing', '54278', 'Monthly Tax Deduction', '53563', '53356.3', '03535', '056', '56835', 'IMPS', '2023-11-23 17:42:49'),
(21, 'Customer Service', 'Manager', 'Ankur Biswas', '2024', 'November', 'Housing', '5356', 'Income', '45646', '456456', '04645', '067', '461034', 'RTGS', '2023-11-23 17:43:17'),
(22, 'Customer Service', 'Manager', 'Ankur Biswas', '2023', 'December', 'Housing', '245353', 'Monthly Tax Deduction', '535', '553563', '03563', '056', '557070', 'e-Rupee', '2023-11-23 17:43:47'),
(23, 'Customer Service', 'Employee', 'Shrilekha Sarkar', '2023', 'June', 'Housing', '4646', 'Monthly Tax Deduction', '4564', '456464', '045645', '0456', '501653', 'UPI', '2023-11-23 17:44:05'),
(24, 'Designing Team', 'Manager', 'Aradhito Choudhury', '2024', 'October', 'Housing', '50', 'Monthly Tax Deduction', '5', '10000', '0500', '05', '10495', 'IMPS', '2023-11-26 11:27:18'),
(25, 'Designing Team', 'Manager', 'Aradhito Choudhury', '2024', 'February', 'Housing', '1221', 'Monthly Tax Deduction', '25', '25020', '1221', '25', '26216', 'NEFT', '2024-03-22 15:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(26) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `man` varchar(255) NOT NULL,
  `du` datetime DEFAULT NULL,
  `name` varchar(253) NOT NULL,
  `img` varchar(356) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `verify_token` varchar(9000) NOT NULL,
  `deptm` varchar(235) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `email` varchar(235) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `empid`, `man`, `du`, `name`, `img`, `pass`, `verify_token`, `deptm`, `phone`, `email`, `dt`) VALUES
(1, 'DT1013M', 'Manager', NULL, 'Aradhito Choudhury', 'image/Screenshot 2023-11-23 211000.png', '$2y$10$GSyX/2TdTLgrp0NcTaynO.bx.C/ovpCksG2R8DoDaOkD4bIVwV0a6', '1161301521', 'Designing Team', '8796545465', 'aradhitochaudhuri@gmail.com', '2024-04-03 22:06:07'),
(2, 'MA1023M', 'Manager', NULL, 'Priyangshu Dey', 'image/Screenshot 2023-11-23 211105.png', '$2y$10$gnNMq0GlzVUfOOR4bddWve8Qym.3HezhQeYgKyTX5XwoGFjtPZJQW', '', 'Marketing', '8965785425', 'priyangshu@ws.com', '2023-11-23 21:18:12'),
(3, 'DT1032M', 'Manager', NULL, 'Shirsendhu Das', 'image/Screenshot 2023-11-23 211617.png', '$2y$10$/p3MC/9Huk.awswFPuGSCOrhFPxQLuIwk0ypE7Rvcz2DrvEOEORRu', '', 'Development Team', '857535366', 'shirsendhu@ws.com', '2023-11-23 21:19:26'),
(4, 'MN1035M', 'Manager', NULL, 'Badal Choudhury', 'image/Screenshot 2023-11-23 211520.png', '$2y$10$ohP0OYwhBuFgWuguLmoAP.kQxFgRfMQ8M5.edTutJu.lw4E8vGdNK', '', 'Management', '8976465865', 'badal@ws.com', '2023-11-23 21:20:30'),
(5, 'CS1023M', 'Manager', NULL, 'Ankur Biswas', 'image/Screenshot 2023-11-23 211537.png', '$2y$10$UmWEkcrpZQAypzr2CjRoiuiS1K1qxHnm2BIYBaHRwyY6zqbuQzpxW', '', 'Customer Service', '8796542525', 'ankur@ws.com', '2023-11-23 21:24:14'),
(6, 'DT5262', 'Employee', NULL, 'Anushka Das', 'image/Screenshot 2023-11-23 211458.png', '$2y$10$bpXkz8O8e6WdoJjuUJvfGuL6r.v7pockDhYfMnAyqO0onw1M2LRdu', '', 'Designing Team', '897632535', 'anushka@ws.com', '2024-02-15 00:23:27'),
(7, 'DT5596', 'Employee', NULL, 'Sayan Das', 'image/Screenshot 2023-11-23 212716.png', '$2y$10$EyCQcft973K5k0crgWWsK.VqW5Oi4069j9bjF1vUT0Z0K/q7Gku5m', '6324344167', 'Designing Team', '8975696655', 'arkajyotiroy445@gmail.com', '2024-02-15 00:23:34'),
(8, 'DT4535', 'Employee', NULL, 'Anamika Pal', 'image/Screenshot 2023-11-23 212827.png', '$2y$10$o/SwNrJK1mLL5M03NMrVQ.z4XTg1XrbMe.r3lb60PsQ8d0UrwD2VG', '', 'Designing Team', '8975383526', 'anamika@ws.com', '2024-02-15 00:23:41'),
(9, 'DT3515', 'Manager', NULL, 'Diptanu Saha', 'image/Screenshot 2023-11-23 212704.png', '$2y$10$RlUACWhQopjXpsssOphnMuPIxDDdwIdvOJWy.LVOQOTSNNyDkxpc.', '', 'Designing Team', '898565223', 'diptanu@ws.com', '2024-02-15 00:25:42'),
(10, 'MT2255E', 'Employee', NULL, 'Saurajit Dey', 'image/Screenshot 2023-11-23 214645.png', '$2y$10$4yBYGuNfC4KYS42yTJzZlux2AWrc28YhNuqaBCOd5O1DW/0wNfBnq', '', 'Marketing', '8958346533', 'saurajit@ws.com', '2023-11-23 21:49:32'),
(11, 'MT2564E', 'Employee', NULL, 'Suravi Chakraborty', 'image/Screenshot 2023-11-23 214713.png', '$2y$10$bY6k0sILzjF.7fz.paDoWem0NxmbiDvrhc4DgyZsaDHWZ9Nk.YFKi', '', 'Marketing', '8756935636', 'suravi@ws.com', '2023-11-23 21:50:36'),
(12, 'MT566E', 'Employee', NULL, 'Anurag Saha', 'image/Screenshot 2023-11-23 214633.png', '$2y$10$XRKDnPCpjvM2Bzmp00ZqF.lW4g/HTe6IrgoMm/yS/nnwGsnbTc0oK', '3014190473', 'Marketing', '896563566', 'deypriyangshu201@gmail.com', '2024-02-16 13:04:20'),
(13, 'MT6445E', 'Employee', NULL, 'Sonali Das', 'image/Screenshot 2023-11-23 214615.png', '$2y$10$8jPYlJ3k9cTj3EsGrgI4OOpKAja7YB9O4PnQj38LgTarL/CrXETPy', '', 'Marketing', '8962232322', 'sonali@ws.com', '2023-11-23 21:55:17'),
(14, 'DT5636E', 'Employee', NULL, 'Ria Choudhury', 'image/Screenshot 2023-11-23 223804.png', '$2y$10$jFbAtiyHbeJWK2D4aMEU7enAVg9Kf4roDYVuhqnUGOtFXDO61/P16', '', 'Development Team', '895535382', 'ria@ws.com', '2023-11-23 22:39:39'),
(15, 'DT52566', 'Employee', NULL, 'Sonalika Sarkar', 'image/Screenshot 2023-11-23 223732.png', '$2y$10$eJUQy7X0IyQ.H/fjZfbPzu5B0o02TiboTeWx8suCbidiXHs2fWCEm', '', 'Development Team', '8953553955', 'sonalika@ws.com', '2023-11-23 22:40:36'),
(16, 'DT5253', 'Employee', NULL, 'Rakesh Dhar', 'image/Screenshot 2023-11-23 223631.png', '$2y$10$6j9c7u0.JpRpfBfxhbYznet1tyHAkS/WLOzAAQPG8ien9EQfAD.oC', '', 'Development Team', '8952393535', 'rakesh@ws.com', '2023-11-23 22:41:31'),
(17, 'DT56556E', 'Employee', NULL, 'Sagnik Roy', 'image/Screenshot 2023-11-23 223655.png', '$2y$10$MeishRZjR4HSuOYvZfagOu.MP99xMfcMt3o4/KFfiNWNLz4CgVkf2', '', 'Development Team', '856652835', 'sagnik@ws.com', '2023-11-23 22:42:17'),
(18, 'MN5455E', 'Employee', NULL, 'Shreya Routh', 'image/Screenshot 2023-11-23 224442.png', '$2y$10$rt5XHgA3uBn6XqPoXV62zONprM9YZHiW4s88uYrt45XvvTNo0ZWom', '', 'Management', '896565353', 'shreya@ws.com', '2023-11-23 22:48:14'),
(19, 'MT5365E', 'Employee', NULL, 'Punith Chakraborty', 'image/Screenshot 2023-11-23 224607.png', '$2y$10$1qVXDg86CuRr74GZXLuWMu6mbo3K/eNulM9xGM9KDEWch.HotGS6.', '', 'Management', '895663254', 'punith@ws.com', '2023-11-23 22:49:39'),
(20, 'MN5625E', 'Employee', NULL, 'Ankit Badhya', 'image/Screenshot 2023-11-23 224623.png', '$2y$10$.qGjTtih5SuX5WNFxfRdLO7/dKzYteQs4vAoGx2ibbx49TSJfTKlS', '', 'Management', '789665655', 'ankit@ws.com', '2023-11-23 22:51:01'),
(21, 'MN7596E', 'Employee', NULL, 'Vedika Nag', 'image/Screenshot 2023-11-23 224519.png', '$2y$10$7EtkGGa6bwujqyk6zjIMLek0Sbrj61zI0RkAZyhtFhdbueYoCVXyW', '', 'Management', '8996562653', 'vedika@ws.com', '2023-11-23 22:52:00'),
(22, 'CS653E', 'Employee', NULL, 'Karina Agarwal', 'image/Screenshot 2023-11-23 225508.png', '$2y$10$Xy8jx91Wq.bEdUu.CijZT.OQ9.e5drX/r/FEdwIpTpYBeW8aFcYAC', '', 'Customer Service', '896568586', 'karina@ws.com', '2023-11-23 22:56:58'),
(23, 'CS896E', 'Employee', NULL, 'Shrilekha Sarkar', 'image/Screenshot 2023-11-23 225517.png', '$2y$10$ZMUnoY6yy3g8DhNrLm3LM.VhbqMLuGo3ckiQu49yzI8KlbT4arCv2', '', 'Customer Service', '896962523', 'shrilekha@ws.com', '2023-11-23 22:59:17'),
(24, 'CS865E', 'Employee', NULL, 'Rajeshree Kar', 'image/Screenshot 2023-11-23 225543.png', '$2y$10$0GEQL5iZz0hCSy3c.8ATZeQE74sO8z0OD2dvsI60.B0IXkrT92rnS', '', 'Customer Service', '896586366', 'rajeshree@ws.com', '2023-11-23 23:00:40'),
(25, 'CS965E', 'Employee', NULL, 'Snigdha Paul', 'image/Screenshot 2023-11-23 225530.png', '$2y$10$PzUDWNaibR2pPPWWk46VwOKZ4M97M4i80.W9FGRlGK0AbQIkSFQP6', '', 'Customer Service', '8966656232', 'snigdha@ws.com', '2023-11-23 23:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `p_name` varchar(99) NOT NULL,
  `starting_date` date NOT NULL,
  `leader` varchar(99) NOT NULL,
  `deptm` varchar(99) NOT NULL,
  `desc` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `ending_date` date NOT NULL,
  `upload_date` date NOT NULL,
  `member` varchar(99) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `p_name`, `starting_date`, `leader`, `deptm`, `desc`, `status`, `ending_date`, `upload_date`, `member`, `dt`) VALUES
(1, 'Contact Them', '2023-11-23', 'Ankur Biswas', 'Customer Service', 'ASAP do this', 'pending', '2023-11-27', '2023-11-23', 'Ankur Biswas, Karina Agarwal, Shrilekha Sarkar', '2023-11-23 17:53:03'),
(3, 'QFG444', '2023-11-24', 'Aradhito Choudhury', 'Designing Team', 'Assurd', 'pending', '2023-11-30', '2023-11-23', 'Sayan Das, Diptanu Saha', '2023-11-23 17:57:02'),
(6, 'HtML', '2023-12-13', 'Aradhito Choudhury', 'Designing Team', 'AS', 'pending', '2023-12-16', '2024-02-11', 'Aradhito Choudhury, Sayan Das, Anamika Pal', '2023-12-12 14:17:39'),
(7, 'HtML', '2024-02-11', 'Sayan Das', 'Designing Team', 'ui', 'Mid Update', '2024-02-11', '2024-02-11', 'Anushka Das, Diptanu Saha', '2024-02-11 11:32:26'),
(8, 'HtML', '2024-02-11', 'Sayan Das', 'Designing Team', 'kl', 'pending', '2024-02-11', '2024-02-11', 'Sayan Das, Diptanu Saha', '2024-02-11 11:45:12'),
(9, 'AEDD', '2024-02-15', 'Aradhito Choudhury', 'Designing Team', 'jj', 'pending', '2024-02-21', '2024-02-16', 'Aradhito Choudhury, Sayan Das, Anamika Pal, Diptanu Saha', '2024-02-14 18:58:18'),
(10, 'JESUS', '2024-02-15', 'Aradhito Choudhury', 'Designing Team', 'cb', 'pending', '2024-02-19', '2024-02-16', 'Anushka Das, Sayan Das', '2024-02-14 19:17:27'),
(11, 'dfg', '2024-02-15', 'Sayan Das', 'Designing Team', 'dfg', 'Re-Evaluated', '2024-02-21', '2024-02-16', 'Anushka Das, Anamika Pal', '2024-02-14 19:18:52'),
(12, 'as', '9786-08-07', 'Diptanu Saha', 'Designing Team', 'zcdfs', 'Mid Update', '9787-08-07', '1000-01-01', 'Aradhito Choudhury', '2024-02-14 19:20:10'),
(13, 'KKKKKKKK', '2024-02-17', 'Aradhito Choudhury', 'Designing Team', 'nb', 'pending', '2024-02-17', '1000-01-01', 'Anushka Das, Sayan Das', '2024-02-17 13:12:38'),
(14, 'ASDF', '2024-03-23', 'Aradhito Choudhury', 'Designing Team', 'dg', 'pending', '2024-03-29', '2024-03-22', 'Aradhito Choudhury, Anushka Das, Anamika Pal', '2024-03-22 15:44:27'),
(15, '125FF', '2024-03-22', 'Sayan Das', 'Designing Team', 'asd', 'Re-Evaluated', '2024-03-26', '2024-03-22', 'Aradhito Choudhury, Anushka Das, Anamika Pal', '2024-03-22 15:44:52'),
(16, 'CURD', '2024-04-03', 'Aradhito Choudhury', 'Designing Team', 'ASD', 'pending', '2024-04-09', '2024-04-03', 'Anushka Das, Sayan Das, Anamika Pal', '2024-04-03 16:00:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete`
--
ALTER TABLE `complete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `man_task`
--
ALTER TABLE `man_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `complete`
--
ALTER TABLE `complete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leader`
--
ALTER TABLE `leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(26) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `man_task`
--
ALTER TABLE `man_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(26) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
