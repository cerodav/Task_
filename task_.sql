-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 12:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task_`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks_`
--

CREATE TABLE IF NOT EXISTS `tasks_` (
`task_id` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_name` varchar(200) NOT NULL,
  `task_desc` varchar(500) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_`
--

CREATE TABLE IF NOT EXISTS `users_` (
`id` int(5) NOT NULL,
  `webmail` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(1) NOT NULL,
  `dept` varchar(5) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `github` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `fb_id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_`
--

INSERT INTO `users_` (`id`, `webmail`, `password`, `name`, `year`, `dept`, `mobile`, `github`, `facebook`, `fb_id`) VALUES
(6, '114113089', '', 'Tushar Gautam', 0, '', '8148593847', 'tushar-rishav', 'tushar.rishav', '100003058805323'),
(7, '106114073', '', 'R Sriranganathan', 0, '', '8939229804', 'sriranganathan', 'Sriranganathanravi', '100005816179268'),
(8, '106114018', '', 'Chandana Bitra', 0, '', '9701338991', 'Chandana02', 'ChandanaBitra', '100004164315340'),
(9, '110112087', '', 'Suraj', 0, '', '9884002369', 'jarusified', 'suraj.jarus95', '545713017'),
(10, '107113078', '', 'Harshavardhan', 0, '', '9789070029', 'harshasrinivas', 'harsha.srinivas.52', '100000724877803'),
(11, '111114075', '', 'Revanth M', 0, '', '8344881425', 'Revanth47', '7revanth47', '100005120641924'),
(12, '106113085', '', 'Sam Radhakrishnan', 0, '', '9952868058', 'sam09', 'samradhakrishnan', '100000602626692'),
(13, '106113097', '', 'Gokul Srinivas', 0, '', '9003037906', 'GokulSrinivas', 'GokulSrinivas23', '100000900330150'),
(14, '106114003', '', 'A Sachin', 0, '', '9629475352', 'Sachin-A', 'sachin.ashok.31', '100000357089089'),
(15, '111114089', '', 'Shravan Murali', 0, '', '9791677881', 'shravan97', 'ShravanMurali', '100000456676072'),
(16, '106114013', '', 'Arun Ramachandran', 0, '', '8754159628', 'JHurricane96', 'ArunRamachandran', '100007947195995'),
(17, '106114046', '', 'Lakshmanaram', 0, '', '9043804100', 'lakshmanaram', 'lakshmanaram.n', '100000481871010'),
(18, '106112091', '', 'Sriram Sundarraj', 0, '', '9600063014', 'ssundarraj', 'sriram.sundarraj', '1039765556'),
(19, '106114068', '', 'K R Prajwal', 0, '', '8903722755', 'prajwalkr', 'prajwalrenukanand', '100001262515614'),
(20, '112112008', '', 'Anantha Natarajan', 0, '', '9442221004', 'sananth12', 'sananth12', '100000942785972'),
(21, '106114101', '', 'V. Naveen Kumar', 0, '', '9629471490', 'naveenKumarV', 'naveenkumar.vedurupaka', '100003148004307'),
(22, '106113105', '', 'VR Sathiyanarayana', 0, '', '9962088723', 'sathiyavrs', 'sathiya.narayana.9', '100002399285030'),
(23, '111113070', '', 'Rizwan H', 0, '', '9994289772', 'rizwanhkm', '', ''),
(24, '106114050', '', 'Malavika Srikanth', 0, '', '9566702345', 'MalavikaSrikanth16', 'malavika.srikanth.7', '100000294075608'),
(25, '106114104', '', 'S.Venkkatesh', 0, '', '9751182870', 'Spockuto', 'Venkkatesh.Sekar.14', '100003762675644'),
(26, '106113087', '', 'Sherine Davis', 0, '', '8754304002', 'cerodav', 'sherinedavis', '1175959820');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks_`
--
ALTER TABLE `tasks_`
 ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users_`
--
ALTER TABLE `users_`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks_`
--
ALTER TABLE `tasks_`
MODIFY `task_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_`
--
ALTER TABLE `users_`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
