-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 09:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$/memaL8lL9pGukkHjxVDIOCZig0k7SH9rFke1EdYo.UGkZmY23Xu6', 'Super', 'Admin', 'etet.jpg', '2018-04-02'),
(2, 'admin', 'admin', 'super', 'admin', 'images/profile.jpg', '2024-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `partylist` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `partylist`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(18, 8, 'Party Party', 'Bong Bong', 'Marcos', 'berry 3.jpg', 'Windmill'),
(19, 9, 'Liberal Party', 'Leni', 'Robredo', '420555051_719367013299105_1464365147506735265_n.jpg', 'Vaccine '),
(20, 9, 'Liberal Party', 'Manny', 'Pacquiao', 'berry 1.jpg', 'Boxing Giveaway'),
(21, 8, 'Party Party', 'Isko', 'Moreno', 'lixsu.jpg', '10k Giveaway'),
(22, 11, 'SK', 'vassillisa', 'andrade', '316306687_467791722156650_3634639033672004528_n.jpg', 'SMM'),
(23, 10, 'Party Party', 'Test', 'Try', 'berry 2.jpg', 'Dog Giveaway');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(8, 'President', 2, 1),
(9, 'Vice President', 2, 2),
(10, 'Senator', 11, 3),
(11, 'HoR', 200, 4);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `fphoto` varchar(150) NOT NULL,
  `bphoto` varchar(50) NOT NULL,
  `user_otp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `email`, `password`, `firstname`, `lastname`, `fphoto`, `bphoto`, `user_otp`) VALUES
(9, '579583', 'karlo.mapili@gmail.com', '$2y$10$xuqkZlAH3p37QVf0X0jXHu3LfpkJD.i.GcAIh4Pg3bPujglWBrdFC', 'Karlo', 'Mapili', 'loli.jpg', '', ''),
(10, '103016', 'andrea.andrade@gmail.com', '$2y$10$oL/xfJowF6zPj7RsA65zG.ZqvFSNcwELM6NMuzA8BKp1vALRni5mG', 'vassillisaandrea', 'andradeade', 'Event_Page.png', '', ''),
(11, '157666', 'andra@gmail.com', '$2y$10$en9b3qlPpYtl7DMcrqnQUO9npDl9RQherbDxQsKMriRXh.CppfAoG', 'vassilli', 'andra', '', '', ''),
(32, '802533', 'andrade@gmail.com', '$2y$10$K8LZZVahZH6niT./anmzAOm1Y9j7DwZL0ufluxCqetZj/iWfiB0XK', 'andeng', 'andrade', 'Aesthetic-Dark-4k-Wallpaper-For-Desktop.jpg', '', '0'),
(34, '527975', 'krlchoosy@gmail.com', '$2y$10$E4bkRpzrva.hFdXaGAdqme3NUZjhidnHw9WqP/XG2XqKgmauADz5u', 'karlo', 'mapili', 'sample.png', '', '0'),
(36, '2012391', 'krallseal@gmail.com', '$2y$10$a8PnNXf1gnArwYPbxmBrb.prhs8U1U8N4Pp5h0wZUuHK2hKPzjmIC', 'krall', 'seal', 'sample.png', 'ancient energy.png', '0'),
(39, '2012391124', 'pluk.andrea.andrade@gmail.com', '$2y$10$xvIBcOkHVC2dMDdNajw5tem5LqobRpPyd9uYqVVxWAQIdKrztSwlC', 'vassillisaandre', 'andrade', 'sample.png', 'ancient energy.png', '57556');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`) VALUES
(90, 11, 18, 8),
(91, 11, 21, 8),
(92, 11, 20, 9),
(93, 11, 23, 10),
(94, 11, 22, 11);

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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
