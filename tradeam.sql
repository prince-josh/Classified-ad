-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 03:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tradeam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Firstname`, `Lastname`, `email`, `password`, `date_created`) VALUES
(1, 'Chiedoziem', 'Nwaorisa', 'joshnwaorisa@gmail.com', '12345678', '2022-03-17 22:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(100) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_img` text NOT NULL,
  `ad_category` varchar(100) NOT NULL,
  `ad_price` varchar(100) NOT NULL,
  `ad_description` text NOT NULL,
  `ad_views` int(100) NOT NULL,
  `ad_status` varchar(100) NOT NULL,
  `ad_condition` varchar(11) NOT NULL,
  `poster_id` int(100) NOT NULL,
  `poster_name` varchar(100) NOT NULL,
  `poster_phone` varchar(100) NOT NULL,
  `poster_email` varchar(100) NOT NULL,
  `poster_img` text NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_name`, `ad_img`, `ad_category`, `ad_price`, `ad_description`, `ad_views`, `ad_status`, `ad_condition`, `poster_id`, `poster_name`, `poster_phone`, `poster_email`, `poster_img`, `date_posted`) VALUES
(1, 'Wdwd', '', '', '122', 'wdwdw', 0, 'pending', '', 9, 'Johnny Doe', '07053665721', 'johndoe@gmail.com', '1627928926_img-1.jpg', '2021-08-06'),
(2, 'Wdwd', '', '', '122', 'wdwdw', 0, 'pending', '', 9, 'Johnny Doe', '07053665721', 'johndoe@gmail.com', '1627928926_img-1.jpg', '2021-08-07'),
(3, 'Wdwd', '', '', '122', 'wdwdw', 0, 'pending', '', 9, 'Johnny Doe', '07053665721', 'johndoe@gmail.com', '1627928926_img-1.jpg', '2021-08-07'),
(4, 'Wdwd', '', '', '122', 'wdwdw', 0, 'pending', '', 9, 'Johnny Doe', '07053665721', 'johndoe@gmail.com', '1627928926_img-1.jpg', '2021-08-07'),
(5, 'Wdwd', '', '', '122', 'wdwdw', 0, 'pending', '', 9, 'Johnny Doe', '07053665721', 'johndoe@gmail.com', '1627928926_img-1.jpg', '2021-08-07'),
(6, 'Wdwd', '', '', '122', 'wdwdw', 0, 'pending', '', 9, 'Johnny Doe', '07053665721', 'johndoe@gmail.com', '1627928926_img-1.jpg', '2021-08-07'),
(7, 'Fe', '1643206674', '', '2233', 'Wdwdw', 0, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-07'),
(8, 'Fe', '', '', '2233', 'wdwdw', 0, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-07'),
(9, 'Fe', '1643207142', '', '2233', 'Wdwdw', 0, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-07'),
(10, 'Book', 'Snapchat-855789428.jpg1647439489', 'School Items', '1,000', 'This is a new note book for easy writing and convenience', 11, 'active', 'New', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-07'),
(11, 'BMW', '1627598327_img-3.png1644173924', 'Automobiles', '10,000,000', 'Fairly used car without any scratch', 6, 'active', 'New', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-07'),
(12, 'Wooden chair', 'about.jpg1644174055', 'Funitures', '122,000', 'This is the best world class furniture that You can find, still in good shape', 1, 'active', 'New', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-17'),
(13, 'Whi4fif', '', 'Bed & Beddings', '12,200', 'Io4fofohoff', 0, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-20'),
(14, 'Engineering Mathematics', '', 'School Items', '6,000', 'This is the 3rd edition of Engineering Mathematics textbook.\r\nStill new, with no turn pages\r\n', 1, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2021-08-20'),
(15, 'Fefefggg', 'Jellyfish.jpg1643207096', 'Automobiles', '122333', 'More testing and testing', 0, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2022-01-26'),
(16, 'Fefef', 'Penguins.jpg1643206303', 'Electronics', '122333', 'Just testing', 1, 'pending', '', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2022-01-26'),
(17, 'Wardrope', 'IMG-20220115-WA0019.jpg', 'Funitures', '12,000', 'This is still new and has barely been used, everything is in perfect condition', 5, 'active', 'Used', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2022-01-28'),
(18, 'King siezed Bed', 'IMG-20220115-WA0022.jpg1643329126', 'Bed & Beddings', '20,000', 'This is a king sized bed with moka foam for maximum comfort and relaxation', 4, 'active', 'Used', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-01-28'),
(19, 'Air conditional', 'IMG-20220115-WA0001.jpg', 'Electronics', '15,000', 'Brand new air conditional, with warranty', 1, 'pending', '', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-01-28'),
(20, 'Kettle', 'IMG-20220115-WA0032.jpg1643428942', 'Kitchen Utensils & Gadgets', '3,000', 'This kettle is still new', 7, 'pending', '', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-01-28'),
(21, 'Standing fan', 'IMG-20220115-WA0021.jpg1644186674', 'Electronics', '20,000', 'This is a very good fan.\r\nIt is still new', 12, 'active', 'New', 8, 'Joshua Nwaorisa ', '07053665721', 'joshnwaorisa007@gmail.com', '16474424711627928724_img-5.jpg', '2022-02-06'),
(22, 'Window blind', 'IMG-20220115-WA0016.jpg', 'Funitures', '3,000', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias maiores necessitatibus voluptate reiciendis minima cupiditate voluptatibus odio, neque esse? Facilis reiciendis culpa pariatur molestiae animi hic facere quaerat, totam praesentium.\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias maiores necessitatibus voluptate reiciendis minima cupiditate voluptatibus odio, neque esse? Facilis reiciendis culpa pariatur molestiae animi hic facere quaerat, totam praesentium.\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias maiores necessitatibus voluptate reiciendis minima cupiditate voluptatibus odio, neque esse? Facilis reiciendis culpa pariatur molestiae animi hic facere quaerat, totam praesentium.\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias maiores necessitatibus voluptate reiciendis minima cupiditate voluptatibus odio, neque esse? Facilis reiciendis culpa pariatur molestiae animi hic facere quaerat, totam praesentium.\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias maiores necessitatibus voluptate reiciendis minima cupiditate voluptatibus odio, neque esse? Facilis reiciendis culpa pariatur molestiae animi hic facere quaerat, totam praesentium.', 15, 'active', 'New', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-02-06'),
(23, 'Oven', 'IMG-20220115-WA0014.jpg', 'Kitchen Utensils & Gadgets', '30,000', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias maiores necessitatibus voluptate reiciendis minima cupiditate voluptatibus odio, neque esse? Facilis reiciendis culpa pariatur molestiae animi hic facere quaerat, totam praesentium.', 8, 'active', 'Used', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-02-07'),
(24, 'Generator', 'IMG-20220115-WA0024.jpg1646405296', 'Electronics', '100,000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum necessitatibus nisi vitae aut architecto earum accusantium placeat ipsum tenetur, vero provident, ratione mollitia ea quam commodi magni minus ducimus ex.', 1, 'pending', 'Used', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-02-25'),
(25, 'Generator', 'IMG-20220115-WA0030.jpg', 'Electronics', '100,000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum necessitatibus nisi vitae aut architecto earum accusantium placeat ipsum tenetur, vero provident, ratione mollitia ea quam commodi magni minus ducimus ex.', 20, 'active', 'Used', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-02-25'),
(26, 'Wdw', 'FB_IMG_16210764049580354.jpg', 'Electronics', 'wdw', 'wdw', 1, 'pending', 'New', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-02-25'),
(27, 'Wdw', 'FB_IMG_16210764049580354.jpg', 'Electronics', 'wdw', 'wdw', 7, 'pending', 'New', 10, 'James Jack ', '0705678910', 'jamesjack@yahoo.com', '1643327581_thumb1.jpg', '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `ads_images`
--

CREATE TABLE `ads_images` (
  `image_id` bigint(100) NOT NULL,
  `ad_id` bigint(100) NOT NULL,
  `images` text NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads_images`
--

INSERT INTO `ads_images` (`image_id`, `ad_id`, `images`, `date_posted`) VALUES
(14, 10, '2c65peh.jpg', '2021-08-07 00:22:09'),
(17, 12, 'about.jpg', '2021-08-17 22:29:58'),
(20, 13, 'counter-bg.jpg', '2021-08-20 19:43:17'),
(21, 14, 'banner.png', '2021-08-20 19:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_phone` varchar(100) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `receiver_id` int(100) NOT NULL,
  `viewed` varchar(100) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_name`, `sender_phone`, `sender_email`, `message`, `receiver_id`, `viewed`, `date_sent`) VALUES
(3, 'Jooj', '', '', 'Hi am interested in buying the Book                  ', 8, 'no', '2021-09-08 00:27:19'),
(4, 'Prince', '090854356669', '', 'Hi am interested in buying the Wooden chair                  ', 8, 'no', '2021-09-10 23:41:27'),
(5, 'Prince', '090854356669', '', 'Hi am interested in buying the Wooden chair                  ', 8, 'no', '2021-09-10 23:43:19'),
(6, 'Qsqqqs', '1234', '', 'Hi am interested in buying the Wooden chair                  ', 8, 'no', '2021-09-10 23:43:46'),
(7, '1234', '23', 'joshnwaorisa0070@gmail.com', 'Hi am interested in buying the Wooden chair                  ', 8, 'no', '2021-09-10 23:44:34'),
(8, 'Meq', '34', 'JOSHNWAORISA@gmail.com', 'Hi am interested in buying the Engineering Mathematics                  ', 8, 'no', '2021-09-26 23:17:26'),
(9, 'Chiedoziem Nwaorisa', '08034434', '', 'Hi am interested in buying the Whi4fif                  ', 8, 'no', '2021-10-13 22:17:25'),
(10, 'We', '3233233', '', 'Hi am interested in buying the Whi4fif                  ', 8, 'no', '2021-10-14 16:26:45'),
(11, 'Df', '2223', '', 'Hi am interested in buying the King siezed Bed                  ', 10, 'yes', '2022-01-28 01:12:01'),
(12, 'Jkjhj', '123456', 'joshnwaorisa0070@gmail.com', 'Hi am interested in buying the Air conditional                  ', 10, 'yes', '2022-01-29 04:47:05'),
(13, 'Dcd', '1233', '', 'Hi am interested in buying the Generator                  ', 10, 'yes', '2022-03-04 17:04:49'),
(14, 'Cffg', '08054345880', 'info@prohouseconcepts.com', 'Hi am interested in buying the Generator                  ', 10, 'yes', '2022-03-14 14:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(100) NOT NULL,
  `university` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` text NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_num`, `university`, `password`, `picture`, `date_registered`) VALUES
(1, 'Dwd', 'Wdwd', 'joshnwaorisa007@gmail.comD', 'wwdd', '', 'thiei', 'img-4.png', '2021-07-27 22:22:16'),
(8, 'Joshua', 'Nwaorisa', 'joshnwaorisa007@gmail.com', '07053665721', '', '$2y$10$J1Gi4A6o/wZ.JQdr4fW5J.0kN2J18z.n.u0sGTcvA4VNSAuuvYKp6', '16474424711627928724_img-5.jpg', '2021-08-02 19:25:24'),
(9, 'Johnny', 'Doe', 'johndoe@gmail.com', '07053665721', '', '$2y$10$LolK9tlfNsq4QKwUpOoqm.V/g2WAAe7/fBQOQnb.joCYJCFoQ7Pkm', '1627928926_img-1.jpg', '2021-08-02 19:28:46'),
(10, 'James', 'Jack', 'jamesjack@yahoo.com', '0705678910', 'University of Benin', '$2y$10$OsSrYixg60d.WdmFdn.HFe43oPJwEsQ4MguRRMFPTa3cIiNsCVQ9O', '1643327581_thumb1.jpg', '2022-01-28 00:53:01'),
(12, 'Joe', 'Morris', 'joemorris@ymail.com', '+1 90234455', '', '$2y$10$1/8HP.vUYYsPHEbRcaeUTOCgfpy0Q3rMxDdxQM.0aPaqBwARz067m', '1646231750_geek.jpg', '2022-03-02 15:35:50'),
(13, 'Chim ', 'Chibi', 'Chimchibi@gmail.com', '08054345880', '', '$2y$10$E1IBFTtIF37XrgUsD8jBmeb7wPhzGDSauyHHzl99Z7ew/ODBXT.rW', '1647246205_1627456941_img2.jpg', '2022-03-14 09:23:25'),
(14, 'New', 'User', 'newuser@gmail.com', '1223445', 'University of Benin', '$2y$10$LTpAH2fsv/Nff.nul5gxVuioiPE.rP6CqVBaGhM2CSIGJ1jeP3fu.', '1647611610_IMG-20210811-WA0034.jpg', '2022-03-18 14:53:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `ads_images`
--
ALTER TABLE `ads_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ads_images`
--
ALTER TABLE `ads_images`
  MODIFY `image_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
