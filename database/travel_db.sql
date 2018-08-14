-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 06:25 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `addedBy` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `hotel_desc` text,
  `deletedAt` timestamp NULL DEFAULT NULL,
  `addedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `title`, `addedBy`, `location`, `image`, `hotel_desc`, `deletedAt`, `addedOn`) VALUES
(2, 'Hotel Edison', NULL, 'New York, USA', 'dist/img/hotel-1-1.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', NULL, NULL),
(3, 'Hotel Raddison', NULL, 'Dhaka, Bangladesh', 'dist/img/hotel-2-1.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', NULL, NULL),
(5, 'Hotel Agrabad', 'khalid', 'New Delhi, India', 'dist/imghotel-4.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_enquiry`
--

CREATE TABLE `hotel_enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `message` text,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `hotel_enquiry`
--

INSERT INTO `hotel_enquiry` (`enquiry_id`, `hotel_id`, `room_type_id`, `name`, `email`, `phone`, `checkin`, `checkout`, `child`, `adult`, `message`, `status`) VALUES
(2, 3, 3, 'Nashrif', 'nashrif@gmail.com', '01825698512', '2018-01-05', '2018-03-05', 1, 2, 'We want to book this..', 'Confirm'),
(4, 2, 2, 'Tareq', 'tareq@gmail.com', '01985621456', '2018-05-06', '2018-08-06', 2, 2, 'We want this room.', 'Confirm'),
(5, 2, 2, 'Fariha', 'fariha@yahoo.com', '01526985412', '2018-09-08', '2018-11-08', 2, 2, 'We want this package.', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addedBy` varchar(100) DEFAULT NULL,
  `deletedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `room_desc` text,
  `price` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `deletedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `hotel_id`, `room_name`, `room_desc`, `price`, `image`, `deletedAt`) VALUES
(1, 2, 'Single', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', 300, 'dist/img/room-1.jpg', NULL),
(2, 2, 'Double', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', 300, 'dist/img/room-2.jpg', NULL),
(3, 3, 'Single', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', 400, 'dist/img/room-3.jpg', NULL),
(4, 3, 'Quad', 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.', 750, 'dist/img/room-4.jpg', NULL),
(5, 5, 'Family', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', 1000, 'images/room-5.jpg', NULL),
(6, 5, 'Family', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', 1000, 'dist/imgroom-5.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `addedBy` varchar(50) DEFAULT NULL,
  `deletedAt` timestamp NULL DEFAULT NULL,
  `addedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `title`, `price`, `days`, `location`, `description`, `image`, `addedBy`, `deletedAt`, `addedOn`) VALUES
(1, 'Coxs Bazar Tour', 1500, 3, 'Coxs Bazar, Bangladesh', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/travel/Admin/dist/imagestour-4-1.jpg\" alt=\"\" width=\"800\" height=\"533\" /></p>\r\n<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\">Day 1</span></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Quicksand, Arial, sans-serif; font-weight: 400; line-height: 1.1; margin: 0px 0px 20px; font-size: 20px; text-transform: uppercase;\">ATHENS, GREECE</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/travel/Admin/dist/imagestour-3-1.jpg\" alt=\"\" width=\"800\" height=\"533\" /></p>\r\n<p>&nbsp;</p>\r\n<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\">Day 2</span></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Quicksand, Arial, sans-serif; font-weight: 400; line-height: 1.1; margin: 0px 0px 20px; font-size: 20px; text-transform: uppercase;\">THAILAND</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>', 'dist/img/tour-1-1.jpg', NULL, NULL, NULL),
(2, 'Japan Tour', 2500, 6, 'Tokyo, Japan', '<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/travel/Admin/dist/imagestour-2-1.jpg\" alt=\"\" width=\"800\" height=\"533\" /></span></p>\r\n<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\">Day 1</span></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Quicksand, Arial, sans-serif; font-weight: 400; line-height: 1.1; margin: 0px 0px 20px; font-size: 20px; text-transform: uppercase;\">BORACAY, PHILIPPINES</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">&nbsp;</p>', 'dist/img/tour-2-1.jpg', NULL, NULL, NULL),
(3, 'India Tour', 1500, 5, 'Manali, India', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/travel/Admin/dist/imagestour-4-1.jpg\" alt=\"\" width=\"800\" height=\"533\" /></p>\r\n<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\">Day 1</span></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Quicksand, Arial, sans-serif; font-weight: 400; line-height: 1.1; margin: 0px 0px 20px; font-size: 20px; text-transform: uppercase;\">ATHENS, GREECE</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/travel/Admin/dist/imagestour-3-1.jpg\" alt=\"\" width=\"800\" height=\"533\" /></p>\r\n<p>&nbsp;</p>\r\n<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\">Day 2</span></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Quicksand, Arial, sans-serif; font-weight: 400; line-height: 1.1; margin: 0px 0px 20px; font-size: 20px; text-transform: uppercase;\">THAILAND</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>', 'dist/imgtour-6.jpg', 'khalid', NULL, NULL),
(4, 'Thailand Tour', 3500, 6, 'Bangkok, Thailand', '<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/travel/Admin/dist/imagestour-2-1.jpg\" alt=\"\" width=\"800\" height=\"533\" /></span></p>\r\n<p><span class=\"day-tour\" style=\"box-sizing: border-box; display: block; margin-bottom: 20px; color: #b3b3b3; font-family: Quicksand, Arial, sans-serif;\">Day 1</span></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Quicksand, Arial, sans-serif; font-weight: 400; line-height: 1.1; margin: 0px 0px 20px; font-size: 20px; text-transform: uppercase;\">BORACAY, PHILIPPINES</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #595959; font-family: Quicksand, Arial, sans-serif;\">&nbsp;</p>', 'dist/imgtour-5.jpg', 'khalid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_enquiry`
--

CREATE TABLE `tour_enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `message` text,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tour_enquiry`
--

INSERT INTO `tour_enquiry` (`enquiry_id`, `tour_id`, `name`, `email`, `phone`, `days`, `child`, `adult`, `message`, `status`) VALUES
(1, 1, 'Fardin', 'fardin@gmail.com', '01786423154', 3, 2, 2, 'We want this package. ', 'Confirm'),
(2, 1, 'Chris', 'chris@yahoo.com', '01658974123', 5, 0, 3, 'We want this package.', 'Confirm'),
(3, 1, 'Jenia', 'jenia@gmail.com', '0175898451', 3, 1, 2, 'We want this package.', 'Pending'),
(4, 2, 'Mustafa', 'mustafa@gmail.com', '01896541235', 6, 0, 5, 'We want this package.', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `deletedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `email`, `phone`, `user_role`, `image`, `deletedAt`) VALUES
('Hasan', 'Hasan Ibne', '123456', 'hasan@gmail.com', '01742712141', 'Subscriber', 'dist/img/khalid.jpg', NULL),
('khalid    ', 'Khalid Hasan   ', '123456', 'khalid@gmail.com', '01820570771    ', 'Admin', 'dist/img/khalid.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `hotels_users_username_fk` (`addedBy`);

--
-- Indexes for table `hotel_enquiry`
--
ALTER TABLE `hotel_enquiry`
  ADD PRIMARY KEY (`enquiry_id`),
  ADD KEY `hotel-enquiry_hotels_hotel_id_fk` (`hotel_id`),
  ADD KEY `hotel-enquiry_room_type_room_type_id_fk` (`room_type_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_categories_cat_id_fk` (`cat_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`),
  ADD KEY `room_type_hotels_hotel_id_fk` (`hotel_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `tours_users_username_fk` (`addedBy`);

--
-- Indexes for table `tour_enquiry`
--
ALTER TABLE `tour_enquiry`
  ADD PRIMARY KEY (`enquiry_id`),
  ADD KEY `tour_enquiry_tours_tour_id_fk` (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_enquiry`
--
ALTER TABLE `hotel_enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_enquiry`
--
ALTER TABLE `tour_enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_users_username_fk` FOREIGN KEY (`addedBy`) REFERENCES `users` (`username`);

--
-- Constraints for table `hotel_enquiry`
--
ALTER TABLE `hotel_enquiry`
  ADD CONSTRAINT `hotel-enquiry_hotels_hotel_id_fk` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`),
  ADD CONSTRAINT `hotel-enquiry_room_type_room_type_id_fk` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categories_cat_id_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `room_type`
--
ALTER TABLE `room_type`
  ADD CONSTRAINT `room_type_hotels_hotel_id_fk` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_users_username_fk` FOREIGN KEY (`addedBy`) REFERENCES `users` (`username`);

--
-- Constraints for table `tour_enquiry`
--
ALTER TABLE `tour_enquiry`
  ADD CONSTRAINT `tour_enquiry_tours_tour_id_fk` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
