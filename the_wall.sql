-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2015 at 12:02 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `the_wall`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(6, 5, 1, 'I think this is just so great!', '2015-06-01 09:02:30', '2015-06-01 09:02:30'),
(7, 3, 1, 'Seriously? no way!', '2015-06-01 09:02:53', '2015-06-01 09:02:53'),
(8, 5, 1, 'Yay!', '2015-06-01 09:04:36', '2015-06-01 09:04:36'),
(9, 5, 1, 'really???', '2015-06-01 09:04:59', '2015-06-01 09:04:59'),
(10, 5, 2, 'hi!', '2015-06-01 10:02:08', '2015-06-01 10:02:08'),
(11, 4, 2, 'sup!', '2015-06-01 10:04:22', '2015-06-01 10:04:22'),
(13, 2, 2, 'hello', '2015-06-01 10:06:36', '2015-06-01 10:06:36'),
(15, 1, 2, 'hello again', '2015-06-01 10:07:05', '2015-06-01 10:07:05'),
(17, 2, 2, 'this one', '2015-06-01 10:07:40', '2015-06-01 10:07:40'),
(18, 2, 2, 'here here', '2015-06-01 10:09:18', '2015-06-01 10:09:18'),
(19, 2, 1, 'happy', '2015-06-01 10:10:52', '2015-06-01 10:10:52'),
(20, 2, 1, 'hello kris', '2015-06-01 10:13:30', '2015-06-01 10:13:30'),
(22, 5, 1, 'hello bob!', '2015-06-01 10:19:03', '2015-06-01 10:19:03'),
(24, 4, 8, 'can I play too??', '2015-06-01 10:36:35', '2015-06-01 10:36:35'),
(25, 1, 8, 'Hi Jens and Bob, my name is lone tree and I''m very alone in this world. I wish plants grew around me but they just hate me! I love forest creatures but they also hate me.', '2015-06-01 10:50:49', '2015-06-01 10:50:49'),
(26, 13, 1, 'nerd', '2015-06-01 11:00:59', '2015-06-01 11:00:59'),
(27, 13, 2, 'seriously', '2015-06-01 11:05:09', '2015-06-01 11:05:09'),
(29, 12, 5, ';)', '2015-06-01 11:06:42', '2015-06-01 11:06:42'),
(31, 1, 7, 'Hey lone my name is grass are we cousins ur someping?', '2015-06-01 11:07:33', '2015-06-01 11:07:33'),
(33, 13, 5, 'I''m a baby girl and I think that''s lame', '2015-06-01 11:40:12', '2015-06-01 11:40:12'),
(34, 15, 5, 'You sure are babe!', '2015-06-01 11:40:51', '2015-06-01 11:40:51'),
(35, 1, 5, 'I totes hate trees', '2015-06-01 11:56:14', '2015-06-01 11:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'asdfasdf', '2015-05-29 12:36:57', '2015-05-29 12:36:57', 1),
(2, 'asdfasdf', '2015-05-29 12:46:59', '2015-05-29 12:46:59', 1),
(3, 'asdfasdf', '2015-05-29 12:48:45', '2015-05-29 12:48:45', 1),
(4, 'hello', '2015-05-29 12:49:03', '2015-05-29 12:49:03', 1),
(5, 'I''m jens and I''m a real kooky guy. I love wrestling at home with my grandmothers and putting things I find on the ground into my mouth. I''m loved by pretty much everyone except for people who eat ceral with milk. Those people can eat some sand and I''d be happy.', '2015-05-29 13:16:56', '2015-05-29 13:16:56', 1),
(12, 'hey!', '2015-06-01 10:36:26', '2015-06-01 10:36:26', 8),
(13, 'Starve The Ego, Feed The Soul', '2015-06-01 11:00:42', '2015-06-01 11:00:42', 8),
(15, 'Hey it''s baby girl! I''m such a gem', '2015-06-01 11:40:01', '2015-06-01 11:40:01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jens', 'Townsdin', 'jenst44@gmail.com', 'password', '2015-05-29 10:19:00', '2015-05-29 10:19:00'),
(2, 'Bob', 'Dilly', 'bob@dilly.com', 'password', '2015-06-01 09:04:26', '2015-06-01 09:04:26'),
(3, 'Timmy', 'Dan', 'timmy@dan.com', 'password', '2015-06-01 10:21:00', '2015-06-01 10:21:00'),
(4, 'Hey', 'Dude', 'hey@dude.com', 'password', '2015-06-01 10:24:37', '2015-06-01 10:24:37'),
(5, 'Baby', 'Girl', 'baby@girl.com', 'password', '2015-06-01 10:29:11', '2015-06-01 10:29:11'),
(6, 'There', 'Dude', 'there@dude.com', 'password', '2015-06-01 10:31:48', '2015-06-01 10:31:48'),
(7, 'Grass', 'Tree', 'grass@tree.com', 'password', '2015-06-01 10:35:59', '2015-06-01 10:35:59'),
(8, 'Lone', 'Tree', 'lone@tree.com', 'password', '2015-06-01 10:36:21', '2015-06-01 10:36:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id_idx` (`message_id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk2_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1_message_id` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk1_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
