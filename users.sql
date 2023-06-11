-- Database: `db_authorize`
--
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('kart', 'p@ssword'),
('manish', 'p@ssword'),
('Ramesh', 'p@ssword'),
('ram', 'p@ssword');

ALTER TABLE users ADD user_id INT PRIMARY KEY AUTO_INCREMENT;
