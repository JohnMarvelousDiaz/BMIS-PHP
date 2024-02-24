-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 06:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `id` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`id`, `User`, `Pass`) VALUES
(1, 'admin', 'admin'),
(3, 'superadmin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncements`
--

CREATE TABLE `tblannouncements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblannouncements`
--

INSERT INTO `tblannouncements` (`id`, `title`, `date`, `content`) VALUES
(22, 'Boxing', '2022-11-01', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(23, 'haha', '2022-11-21', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(24, 'sdadsad', '2022-11-14', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(25, 'asdadsa', '2022-11-23', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(26, 'sadasd', '2022-11-07', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(27, 'Foundation Day', '2022-12-10', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(28, 'asdasd', '2022-12-08', 'asdasdsada');

-- --------------------------------------------------------

--
-- Table structure for table `tblblotters`
--

CREATE TABLE `tblblotters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complainant` varchar(100) NOT NULL,
  `ptc` varchar(100) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `loi` varchar(100) NOT NULL,
  `date` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblblotters`
--

INSERT INTO `tblblotters` (`id`, `user_id`, `complainant`, `ptc`, `complaint`, `loi`, `date`, `status`) VALUES
(153, 14, 'Arbyn Bernabe', 'Meeko Santos', 'sadad', 'asdsadads', '2022-11-30', 'Approved'),
(154, 14, 'Arbyn Bernabe', 'Lance Gabriel Osano', 'adasdas', 'dadasd', '2022-12-05', 'Approved'),
(155, 14, 'Arbyn Bernabe', 'Joy Apostol', 'dadad', 'adasdsad', '2022-12-22', 'Approved'),
(156, 14, 'Arbyn Bernabe', 'Juan Antonio Martin', 'asdasd', 'asdsasdas', '2022-12-14', 'Approved'),
(157, 12, 'Billy John Hernandez', 'Juan Antonio Martin', 'asdasd', 'asdasdasd', '2023-01-01', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tblclearances`
--

CREATE TABLE `tblclearances` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `civil` varchar(100) NOT NULL,
  `ornumber` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclearances`
--

INSERT INTO `tblclearances` (`id`, `user_id`, `rname`, `age`, `purpose`, `civil`, `ornumber`, `status`, `date`) VALUES
(12, 12, 'Billy John Hernandez', '21', 'asdasdsa', 'Single', '52423', 'Approved', '2022-12-02 12:28:18'),
(13, 12, 'Billy John Hernandez', '21', 'sadadad', 'Married', '', 'Denied', '2022-12-02 12:28:21'),
(14, 21, 'Jhela Mae Camanan', '21', 'sadadada', 'Divorced', '6435', 'Approved', '2022-12-01 12:28:26'),
(15, 21, 'Jhela Mae Camanan', '21', 'dasdada', 'Separated', '', 'Denied', '2022-12-02 12:28:30'),
(16, 14, 'Arbyn Bernabe', '21', 'dadadada', 'Widowed', '21313', 'Approved', '2022-12-02 14:46:18'),
(17, 14, 'Arbyn Bernabe', '21', 'asdadasdsa', 'Separated', '2131321', 'Approved', '2022-12-04 19:22:44'),
(18, 15, 'Meeko Santos', '21', 'asdasdasda', 'Widowed', '', 'Denied', '2022-11-30 12:29:11'),
(19, 15, 'Meeko Santos', '21', 'asdasdasdsa', 'Single', '756754', 'Approved', '2022-11-30 12:29:17'),
(20, 22, 'John Kenneth Arellano', '21', 'asdadadasd', 'Married', '3424', 'Approved', '2022-11-30 12:28:35'),
(21, 22, 'John Kenneth Arellano', '21', 'asdasdasdsa', 'Married', '64355', 'Denied', '2022-12-02 12:28:46'),
(22, 13, 'John Marvelous Diaz', '21', 'asdadads', 'Widowed', '34534', 'Approved', '2022-11-29 12:28:52'),
(23, 13, 'John Marvelous Diaz', '21', 'asdasdasd', 'Separated', '', 'Denied', '2022-12-02 12:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblhouseholds`
--

CREATE TABLE `tblhouseholds` (
  `id` int(11) NOT NULL,
  `household` int(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `totalm` int(100) NOT NULL,
  `head` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblhouseholds`
--

INSERT INTO `tblhouseholds` (`id`, `household`, `contact`, `zone`, `totalm`, `head`) VALUES
(4, 1001, '09346851231', 'Purok 2', 10, 'Arbyn Chriz Bernabe'),
(7, 1002, '09945827184', 'Purok 1', 7, 'Junly Milan'),
(8, 1003, '09129426124', 'Purok 3', 25, 'Juan Antonio Martin'),
(9, 1004, '09351254133', 'Purok 4', 10, 'Lance Gabriel Osano'),
(10, 1005, '09774928140', 'Purok 5', 15, 'Meeko Santos'),
(11, 1006, '09339582712', 'Purok 6', 5, 'John Kenneth Arellano'),
(12, 1007, '09124823013', 'Purok 7', 3, 'John Patrick Dela Cruz'),
(13, 1008, '09959338032', 'Purok 3', 3, 'Billy John Hernandez'),
(14, 1009, '09658247123', 'Purok 5', 5, 'John Marvelous Diaz'),
(15, 1010, '09969281465', 'Purok 1', 8, 'Mark Jhustine Manalad'),
(16, 1011, '0945829103', 'Purok 7', 11, 'Jeneses Galang'),
(17, 1012, '09669213405', 'Purok 5', 4, 'Lance Estrella'),
(18, 1013, '09959230193', 'Purok 7', 6, 'Kenneth Quintos'),
(19, 1014, '09349104832', 'Purok 1', 5, 'Ronel Jasper Barrientes'),
(20, 1015, '09229337032', 'Purok 2', 5, 'Dancel Bernaldez'),
(21, 1016, '09449779214', 'Purok 3', 30, 'Russel Dela Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `tblindigency`
--

CREATE TABLE `tblindigency` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `civil` varchar(100) NOT NULL,
  `ornumber` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblindigency`
--

INSERT INTO `tblindigency` (`id`, `user_id`, `rname`, `age`, `address`, `civil`, `ornumber`, `status`, `date`) VALUES
(8, 12, 'Billy John Hernandez', '21', 'sdasdadad', 'Single', '213123', 'Approved', '2022-12-01 14:40:35'),
(9, 12, 'Billy John Hernandez', '21', 'sdadasdasd', 'Married', '', 'Denied', '2022-12-02 14:58:29'),
(10, 21, 'Jhela Mae Camanan', '21', 'asdadasdsa', 'Married', '53223', 'Approved', '2022-12-02 14:57:52'),
(11, 21, 'Jhela Mae Camanan', '21', 'asdasdasdasd', 'Widowed', '', 'Denied', '2022-12-02 14:58:33'),
(12, 13, 'John Marvelous Diaz', '21', 'adasdasd', 'Widowed', '6765', 'Approved', '2022-11-30 14:57:59'),
(13, 13, 'John Marvelous Diaz', '21', 'adadasdasd', 'Single', '', 'Denied', '2022-12-02 14:58:43'),
(14, 15, 'Meeko Santos', '21', 'asdadasdsad', 'Divorced', '5453', 'Approved', '2022-11-28 14:58:07'),
(15, 15, 'Meeko Santos', '21', 'asdasdaddasd', 'Separated', '', 'Denied', '2022-12-02 14:58:24'),
(16, 14, 'Arbyn Bernabe', '21', 'sdadasdasd', 'Divorced', '2524', 'Approved', '2022-12-01 14:57:45'),
(17, 14, 'Arbyn Bernabe', '21', 'sdasdasdasd', 'Separated', '', 'Denied', '2022-12-02 14:58:26'),
(18, 14, 'Arbyn Bernabe', '21', 'dasdasdad', 'Separated', '54353', 'Approved', '2022-12-01 14:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficials`
--

CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblofficials`
--

INSERT INTO `tblofficials` (`id`, `name`, `contact`, `address`, `position`, `start`, `end`) VALUES
(5, 'Jan Joseph Manalo', '09667761740', 'Purok 1 ', 'Barangay Chairman', '2022-11-20', '2025-11-20'),
(6, 'Mark Jhustine Manalad', '09453680869', 'Purok 2', 'SK Chairman', '2022-11-20', '2025-11-20'),
(7, 'Joy Apostol', '09122962268', 'Purok 4', 'Barangay Secretary', '2022-11-20', '2025-11-20'),
(8, 'Billy John Hernandez', '09959338032', 'Purok 3', 'Barangay Tanod', '2022-11-20', '2025-11-20'),
(9, 'John Marvelous Diaz', '09124078843', 'Purok 5', 'Barangay Tanod', '2022-11-20', '2025-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermits`
--

CREATE TABLE `tblpermits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bowner` varchar(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `baddress` varchar(100) NOT NULL,
  `bbusiness` varchar(100) NOT NULL,
  `ornumber` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpermits`
--

INSERT INTO `tblpermits` (`id`, `user_id`, `bowner`, `bname`, `baddress`, `bbusiness`, `ornumber`, `status`, `date`) VALUES
(18, 14, 'Arbyn Bernabe', 'asdada', 'adasd', 'asdsadasd', '123', 'Approved', '2022-12-04 19:02:35'),
(19, 14, 'Arbyn Bernabe', 'asdasdasdas', 'adasdadasd', 'adasdadadasd', '', 'Denied', '2022-12-01 20:06:37'),
(20, 13, 'John Marvelous Diaz', 'asdasdas', 'dasdas', 'dasdadas', '53453', 'Approved', '2022-11-30 20:07:16'),
(21, 13, 'John Marvelous Diaz', 'asdadas', 'dasdasd', 'asdasdasd', '', 'Denied', '2022-12-01 20:07:21'),
(22, 21, 'Jhela Mae Camanan', 'dadasd', 'adada', 'dadasdasd', '5332', 'Approved', '2022-11-30 20:07:05'),
(23, 21, 'Jhela Mae Camanan', 'adad', 'dasdasd', 'adada', '', 'Denied', '2022-12-01 20:07:08'),
(24, 12, 'Billy John Hernandez', 'asdasdasd', 'asdsa', 'dadada', '123123', 'Approved', '2022-11-28 20:06:54'),
(25, 12, 'Billy John Hernandez', 'dadada', 'dada', 'dadasdasd', '', 'Denied', '2022-12-01 20:06:57'),
(26, 15, 'Meeko Santos', 'sadasdad', 'asda', 'dasdadas', '23426', 'Approved', '2022-11-29 20:08:12'),
(27, 15, 'Meeko Santos', 'adadasdas', 'dada', 'dasdadas', '', 'Denied', '2022-12-01 20:08:22'),
(28, 16, 'Juan Antonio Martin', 'dasdasdsa', 'dadas', 'dasdasdad', '8654', 'Approved', '2022-11-29 20:08:01'),
(29, 16, 'Juan Antonio Martin', 'dasdad', 'dada', 'dadasd', '', 'Denied', '2022-12-01 20:08:06'),
(30, 12, 'Billy John Hernandez', '123123', 'asdasd', 'adasd', '', 'Waiting', ''),
(31, 32, 'Gimwell Rupido', 'adadsa', 'dasdsad', 'asdsadadsa', '532213', 'Approved', '2022-12-04 19:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblresidents`
--

CREATE TABLE `tblresidents` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresidents`
--

INSERT INTO `tblresidents` (`id`, `name`, `contact`, `age`, `gender`, `address`, `User`, `Pass`, `img_url`) VALUES
(12, 'Billy John Hernandez', '09959338032', '21', 'Male', '1008 Purok 3', 'billyjohn', 'billy123', '63836132dab83.jpg'),
(13, 'John Marvelous Diaz', '09210476231', '20', 'Male', '1009 Purok 5', 'jmarvelous', 'jm123', '6383626d5cd75.jpg'),
(14, 'Arbyn Bernabe', '09456827212', '20', 'Male', '1001 Purok 2', 'arbyn', 'arbyn123', '6382f63e356de.png'),
(15, 'Meeko Santos', '09351254133', '21', 'Male', '1013 Purok 6', 'meeko', 'meeko123', '6382f5b20aab1.jpg'),
(16, 'Juan Antonio Martin', '09458724145', '22', 'Male', '1003 Purok 3', 'juan', 'juan456', '6382209db7acf.jpg'),
(17, 'Lance Gabriel Osano', '09482941284', '22', 'Male', '1004 Purok 4', 'lance', 'lance123', '6383624e4f1a7.jpg'),
(21, 'Jhela Mae Camanan', '09942859012', '21', 'Female', '1024 Purok 5', 'jhela', 'jhela123', '6387750700946.jpg'),
(22, 'John Kenneth Arellano', '09568267123', '21', 'Male', '1018 Purok 5', 'kenneth', 'kenneth123', '63836424ce1fd.jpg'),
(28, 'Joy Apostol', '09122962268', '20', 'Female', '1034 Purok 6', 'joy', 'joy123', '63842cd78518b.jpg'),
(29, 'Mark Jhustine Manalad', '09453680869', '23', 'Male', '1032 Purok 1', 'mark', 'mark123', '63842dc3b5ef7.jpg'),
(32, 'Gimwell Rupido', '09312312345', '21', 'Male', '1032 Purok 5', 'gim', 'gim123', '638c842dbeec2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblotters`
--
ALTER TABLE `tblblotters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Blotters` (`user_id`);

--
-- Indexes for table `tblclearances`
--
ALTER TABLE `tblclearances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Clearance` (`user_id`);

--
-- Indexes for table `tblhouseholds`
--
ALTER TABLE `tblhouseholds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblindigency`
--
ALTER TABLE `tblindigency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Indigency` (`user_id`);

--
-- Indexes for table `tblofficials`
--
ALTER TABLE `tblofficials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpermits`
--
ALTER TABLE `tblpermits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Permits` (`user_id`);

--
-- Indexes for table `tblresidents`
--
ALTER TABLE `tblresidents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblblotters`
--
ALTER TABLE `tblblotters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tblclearances`
--
ALTER TABLE `tblclearances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblhouseholds`
--
ALTER TABLE `tblhouseholds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblindigency`
--
ALTER TABLE `tblindigency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblofficials`
--
ALTER TABLE `tblofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblpermits`
--
ALTER TABLE `tblpermits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblresidents`
--
ALTER TABLE `tblresidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblblotters`
--
ALTER TABLE `tblblotters`
  ADD CONSTRAINT `Blotters` FOREIGN KEY (`user_id`) REFERENCES `tblresidents` (`id`);

--
-- Constraints for table `tblclearances`
--
ALTER TABLE `tblclearances`
  ADD CONSTRAINT `Clearance` FOREIGN KEY (`user_id`) REFERENCES `tblresidents` (`id`);

--
-- Constraints for table `tblindigency`
--
ALTER TABLE `tblindigency`
  ADD CONSTRAINT `Indigency` FOREIGN KEY (`user_id`) REFERENCES `tblresidents` (`id`);

--
-- Constraints for table `tblpermits`
--
ALTER TABLE `tblpermits`
  ADD CONSTRAINT `Permits` FOREIGN KEY (`user_id`) REFERENCES `tblresidents` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
