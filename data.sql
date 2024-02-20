-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 09:07 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try_out_2_peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`) VALUES
(3, 'asdas', 'Edit buku\r\n'),
(6, 'Buku Politik', 'Buku politik\r\n'),
(7, 'Buku Sejarah Belanda ', 'Dimana buku ini belanda'),
(8, 'Buku filsafat', 'Buku filsafat\r\n'),
(9, 'Tuhan ada di hatimu', 'Tuhan ada di hatimu\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_records`
--

CREATE TABLE `borrowing_records` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `borrow_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` datetime DEFAULT NULL,
  `status` enum('done','hold') NOT NULL DEFAULT 'hold',
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowing_records`
--

INSERT INTO `borrowing_records` (`id`, `book_id`, `student_id`, `borrow_date`, `return_date`, `status`, `created_by`) VALUES
(1, 3, 1, '2024-02-15 11:18:36', '2024-02-15 14:58:20', 'done', 1),
(6, 6, 1, '2024-02-15 13:44:17', '2024-02-15 14:58:20', 'done', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `nisn`, `class`, `phone`) VALUES
(1, 'Ilham Maulana', '2873907897987', 'XII AKL', '0892383928'),
(3, 'TETS', '24', 'XII akl', '02982399');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'admin1', 'admin1', 'admin1'),
(2, 'asdasd', 'asddas', 'asdadsds'),
(5, 'malana', 'Ilham Maulan', '$2y$10$G7PYc4Sq4BBqeTkyZ.F6heWBZn1UIR3yKXEo3Zy3UkyYIxZPzQGIy'),
(6, 'admin2', 'admin2', '$2y$10$a/GaDmTdn5H7HgG.utcY2eQDK6hHEsE9Nr2G6K.doE06Y8r6l1A8u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowing_records`
--
ALTER TABLE `borrowing_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `borrowing_records`
--
ALTER TABLE `borrowing_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowing_records`
--
ALTER TABLE `borrowing_records`
  ADD CONSTRAINT `borrowing_records_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowing_records_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowing_records_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
