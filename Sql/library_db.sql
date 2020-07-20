-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2020 at 10:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `description`, `added_by`, `c_date`) VALUES
(1, 'Computer Science', 'Programming and Networking', 'Marcos Musafiri', '2020-07-11 11:56:01'),
(2, 'Computer Science', 'Programming', 'Marcos Musafiri', '2020-07-11 11:58:38'),
(3, 'Science', 'Calculus, Math', 'Marcos Musafiri', '2020-07-11 19:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `library_books`
--

CREATE TABLE `library_books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `copies` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_books`
--

INSERT INTO `library_books` (`id`, `isbn`, `title`, `edition`, `category`, `author`, `price`, `pages`, `copies`, `status`, `added_by`, `c_date`) VALUES
(1, 'ISBN 456 - 2018', 'The New york Triology', 'Edition 1', 'Science', 'Paul Auster', 102, 356, 1, 1, 'Marcos Musafiri', '2020-07-19 12:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `library_deposit`
--

CREATE TABLE `library_deposit` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_names` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_students`
--

CREATE TABLE `library_students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_students`
--

INSERT INTO `library_students` (`id`, `firstname`, `lastname`, `email`, `address`, `telephone`, `institution`, `status`, `added_by`, `c_date`) VALUES
(1, 'Julienne', 'Heri', 'herijulienne@gmail.com', 'Goma', '0975868035', 'ULK', 1, 'Marcos', '2020-07-11 10:38:44'),
(2, 'Jessica', 'Jessy', 'jessy@gmail.com', 'Goma/DRC', '0987654321', 'ULK', 1, 'Marcos Musafiri', '2020-07-11 10:42:05'),
(3, 'Ines', 'Ukey', 'ines@gmail.com', 'Goma', '0987654321', 'UCS', 1, 'Placide Huruma', '2020-07-11 10:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `library_users`
--

CREATE TABLE `library_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `profile` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `group` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_users`
--

INSERT INTO `library_users` (`id`, `firstname`, `lastname`, `profile`, `email`, `password`, `salt`, `telephone`, `address`, `group`, `added_by`, `c_date`) VALUES
(1, 'Marcos', 'Musafiri', 'images/marc.jpg', 'marcos@gmail.com', '8c664f4c3235b2a963eee08c6bb00c8f7a347a38', '0}eZ-5c8vMX7g-?G', '+243 993114176', 'Goma/Majengo', '2', 'null', '2020-07-11 09:14:06'),
(6, 'Elodie', 'Neza', 'images/user.png', 'neza@gmail.com', 'deee283a323be951ee54e6692f1f5687a4822255', 'Cu%wkE[?D]UHOW2S', '09876543123', 'Gisenyi', '1', 'Marcos Musafiri', '2020-07-11 11:09:59'),
(8, 'Gloire', 'Banh', 'images/user.png', 'gloire@gmail.com', '0d6a808074dba6ed9c310eba3c592ad6ddeb5dbc', '2nzXeSr0$4pi*Dv7', '0995678934', 'Goam', '2', 'Marcos Musafiri', '2020-07-11 11:23:05'),
(9, 'Aristide Habarugira', 'Byamungu', 'images/marc.jpg', 'aris@gmail.com', 'a18f8767a297aec1369f2fd9b4857edacc2beed5', '2i[9ShmRMe{}3qpB', '09987653634', 'Goma/RDC', '1', 'Marcos Musafiri', '2020-07-20 09:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `library_withdraw`
--

CREATE TABLE `library_withdraw` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_names` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `institution` varchar(100) NOT NULL,
  `issue_date` datetime NOT NULL,
  `return_date` date NOT NULL,
  `issued_by` varchar(100) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `permissions` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `permissions`) VALUES
(1, 'librarian', ''),
(2, 'Administrator', '{\"admin\":1}');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_note`
--

CREATE TABLE `withdraw_note` (
  `id` int(11) NOT NULL,
  `stutent_name` varchar(100) NOT NULL,
  `nber_books` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_books`
--
ALTER TABLE `library_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_deposit`
--
ALTER TABLE `library_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_students`
--
ALTER TABLE `library_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_users`
--
ALTER TABLE `library_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_withdraw`
--
ALTER TABLE `library_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_note`
--
ALTER TABLE `withdraw_note`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `library_books`
--
ALTER TABLE `library_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `library_deposit`
--
ALTER TABLE `library_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_students`
--
ALTER TABLE `library_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `library_users`
--
ALTER TABLE `library_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `library_withdraw`
--
ALTER TABLE `library_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw_note`
--
ALTER TABLE `withdraw_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
