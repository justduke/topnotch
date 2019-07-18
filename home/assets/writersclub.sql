-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 04:01 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `writersclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `f_name`, `l_name`, `u_name`, `email`, `phone`, `pass`, `status`) VALUES
(2, 'pepe', 'papa', 'pepe100', 'pepe@gmail.com', 97003587, '12345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `id` int(11) NOT NULL,
  `order_name` varchar(30) NOT NULL,
  `order_title` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_details` varchar(20) NOT NULL,
  `level` varchar(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `attachment` longblob NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `service` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `e_id` int(10) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `eu_name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`e_id`, `f_name`, `l_name`, `eu_name`, `email`, `phone`, `pass`, `status`) VALUES
(2, 'steve', 'duke', 'dome100', 'dukqq@gmail.com', 780972972, '12345678', 1),
(100, 'dominic', 'meyc', 'dominic10', 'dominic23@gmail.com', 715916319, '12345678', 0),
(101, 'Naomi', 'Muweni', 'naomi12', 'muweninaomi@gmail.com', 713264594, '12345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `Id` int(20) NOT NULL,
  `fmt` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`Id`, `fmt`) VALUES
(1, 'MLA'),
(2, 'APA'),
(3, 'Harvard'),
(4, 'Chicago');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_title` varchar(20) NOT NULL,
  `pages` int(3) NOT NULL,
  `amount` int(10) NOT NULL,
  `date_cleared` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ms_id` int(20) NOT NULL,
  `o_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `e_id` int(20) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `u_message` text NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ms_id`, `o_id`, `u_id`, `e_id`, `message`, `u_message`, `status`, `date_created`) VALUES
(22, 1002, 5, 2, 'Kindly make sure you upload a turn it in report', '', 0, '2019-07-02 00:46:19'),
(23, 1002, 5, 2, '', 'The task had 100% plag, sorry for the inconvenience caused.', 0, '2019-07-02 00:53:22'),
(24, 1002, 5, 0, 'Thank You, We will reassign the task at hand', '', 0, '2019-07-02 01:18:54'),
(25, 1002, 5, 2, 'the task will be reassigned, Thank you', '', 0, '2019-07-02 01:22:39'),
(26, 1001, 1, 0, 'divine interventions', '', 0, '2019-07-02 18:16:39'),
(27, 1001, 1, 0, '', 'Its just a musical inst', 0, '2019-07-02 18:17:42'),
(28, 1001, 1, 0, 'who cares abt what you say', '', 0, '2019-07-02 18:18:12'),
(29, 1001, 1, 2, 'task approved', '', 0, '2019-07-02 19:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(20) NOT NULL,
  `order_name` varchar(300) NOT NULL,
  `order_title` varchar(300) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_details` varchar(20000) NOT NULL,
  `level` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL,
  `format` varchar(20) NOT NULL,
  `attachment` longblob NOT NULL,
  `deadline` varchar(70) NOT NULL,
  `service` varchar(50) NOT NULL,
  `order_status` int(11) NOT NULL,
  `payment` int(15) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `order_name`, `order_title`, `date_created`, `order_details`, `level`, `pages`, `format`, `attachment`, `deadline`, `service`, `order_status`, `payment`) VALUES
(1001, 'asshi_100', 'History_assasination of JFkenn', '2019-07-03 21:39:44', 'Instructions history', 'Undergraduate', 3, 'APA', 0x4465736372696265207468652050726f637572656d656e74204d616e6167656d656e7420696e73742e646f63, '25:02:2019 11:11:11f', 'Any Other', 0, 1),
(1002, 'duhhh', 'maths and physics', '2019-07-02 04:56:56', 'Chck attached please', 'Highschool', 2, 'MLA', 0x546f205072657061726520696e7374206865616c74682e646f63, '25/2/2019 1845hrs', 'Research Based: From scratch', 0, 2),
(10100, 'Bru', 'dfrr', '2019-06-16 21:19:30', 'Instructions dd', 'Undergradua', 2, 'MLA', 0x4144424920496e737469747574652e646f63, '25:02:2019 11:11:11a', 'Research Based: From scratch', 0, 2),
(10103, 'shi(yan)-HRMN 2821', 'Module 3: Activity 1, Part B - Discussion Forum', '2019-07-03 18:01:01', 'Consider the following case study and answer the questions.\r\n\r\nCase Study: Gerry Sontag was excited about his new position as project manager at APE Technical Services. A recent landed immigrant, Gerry came with solid educational qualifications and years of experience in a similar position in his country of origin. Of course, the context was different, but he was sure that, given the right guidance, his skills would translate well into the Canadian workplace.\r\nAfter accepting the position, he was quite surprised not to hear from the principal of the company. During the interview, his new boss had been very pleasant and encouraging. He had briefly discussed the position and the work of the organization but had made it clear that they were more interested in how Gerry would fit into the organization. Gerry reckoned that clearer information on his responsibilities would be made available in due course.\r\n\r\nGerry arrived on the first day of his new job, keen and ready to contribute. He was surprised that his boss was not around to greet him. He managed to find his way to the staff room, where he met a new colleague. She greeted him warmly but said that she had heard nothing of his recruitment. Gerry wandered around for a while feeling uncomfortable, until the secretary told him where his office was, let him in, and let him be.\r\n\r\nHe waited for word on what was expected from him, but nothing was forthcoming. Gerry was anxious about getting on with the work but didnâ€™t seem to know where to begin. He felt himself getting more frustrated as the days went by. Eventually he confronted his boss, who, although apologetic, brushed it aside with â€œWeâ€™re leaving you to settle in and familiarize yourself with the company.â€\r\n\r\nAttending the first project managers meeting at which new projects were allocated only served to compound his confusion. Projects seemed to be allocated to a few key people. As a project manager, he knew he would soon be under pressure to fill in time sheets, but no one seemed to be giving him the work to do.\r\n\r\nThe haphazard nature of Gerryâ€™s introduction to the unit left him anxious, discouraged, and disillusioned. After three months of â€œbungling about,â€ not being able to give of his best, he reckoned that it would be best if he sought employment elsewhere.\r\n\r\nPost your answers to the following questions to this forum:\r\n\r\nHow could Gerryâ€™s introduction into the company have been handled better?\r\n\r\nWhat effects will his leaving have on the organization?', 'Undergraduate', 1, 'APA', '', '2019-07-04T23:59', 'Essay: From Scratch', 0, 1),
(10104, 'shi(yan)-HRMN 2821', 'Module 2: Activity 6, Part B - Discussion Forum', '2019-07-03 18:01:19', 'Reflect on the following, and post your response in Discussions.\r\n\r\nWhat do you think will be the main changes in the workforce as baby boomers retire and Generation X and Y comprise the majority of the workforce?\r\n\r\nWhat is the key to motivating Generation X and Y? One can foresee a significant issue on the horizon: there will be a shrinking workforce and at the same time a group of employees not interested in working overtime. What do you think is going to happen?', 'Undergraduate', 1, 'APA', '', '2019-07-04T23:59', 'Essay: From Scratch', 0, 1),
(10105, 'shi(wei)-MKTG 2431', 'Learning Activity 4.7: Marketing Communication—Social Media', '2019-07-03 18:01:38', 'Describe the online strategies each of these organizations are utilizing as evidenced by their websites, social media, video and mobile media, newsletters, blogs, etc.\r\nCompare and contrast at least two of their online strategies for these two organizations using marketing communication concepts, terms, and information from your course materials.\r\nWhat conclusions can you draw about each of these organizationâ€™s online strategies? Are they effective or not? Explain your answer.', '', 1, 'APA', '', '2019-07-04T23:59', 'Essay: From Scratch', 0, 1),
(10106, 'shi(wei)-MKTG 2431-KT', 'Learning Activity 4.1: Web Discussion—Integrated Marketing Communication', '2019-07-03 18:01:55', 'To help you apply your understanding of integrated marketing communication, discuss the following:\r\n\r\n1.Explain the offline and online media mix elements used in this IMC campaign.\r\n2.Describe how these offline and online media mix elements were consistent, coordinated and unified. If there were not, identify what elements were not integrated and what the organization would need to do to integrate them into a cohesive IMC campaign.\r\n3.Talk about the brand focus in the IMC campaign. Did the IMC campaign provide a promise of a unique and positive customer experience?\r\n4.Discuss whether or not the IMC campaign provided customer value. Explain how it did or did not provide customer value.', 'Undergraduate', 1, 'APA', '', '2019-07-04T23:59', 'Essay: From Scratch', 0, 1),
(10107, 'shi(wei)-MKTG 2431-KT', 'Learning Activity 3.9: Web Discussionâ€”Dynamic Product Pricing', '2019-07-03 18:03:24', 'Earlier in the module you learned about dynamic pricing. This is where prices are increased and decreased quickly, charging similar customers different prices for the same product. Consider this pricing strategy and respond to these questions in your discussion.\r\n\r\n1.Why do you think retailers are adopting dynamic pricing?\r\n2.Do you think this is a good pricing strategy for retailers? Why or why not?\r\n3.What do you think a retailerâ€™s use of dynamic pricing will have on its brand? target audience? profit?', 'Undergraduate', 1, 'APA', '', '2019-07-04T23:59', 'Essay: From Scratch', 0, 1),
(10108, 'shi(wei)-MKTG 2431-KT', 'Learning Activity 3.4: Web Discussionâ€”Product Labelling', '2019-07-04 16:23:45', 'The Canadian Federal Government changed the Consumer Packaging and Labelling Act to require manufacturers to specify the nutritional content of food products on the package label according to fourteen key nutritional elements. Have a look at some of these in your own kitchen.\r\n\r\n1.Do you think this is a good idea? Why or why not? Why might some manufacturers be concerned about this?\r\n2.Based on your own experience as a consumer, what packaging or labelling practices do you find misleading or inappropriate? What might be done to change these practices?', 'Undergraduate', 1, 'APA', '', '2019-07-04T23:59', 'Essay: From Scratch', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_prog`
--

CREATE TABLE `order_prog` (
  `id` int(10) NOT NULL,
  `o_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `e_id` int(20) DEFAULT NULL,
  `attached` longtext,
  `attach_rev` text NOT NULL,
  `attached_ed` text NOT NULL,
  `rev_status` int(100) NOT NULL,
  `status` int(2) DEFAULT '0',
  `date_closed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_prog`
--

INSERT INTO `order_prog` (`id`, `o_id`, `u_id`, `e_id`, `attached`, `attach_rev`, `attached_ed`, `rev_status`, `status`, `date_closed`) VALUES
(1, 10100, 1, 1, 'mis.sql', '15862 Econ Discussion.doc', '', 4, 5, '2019-06-16 18:36:58'),
(2, 1001, 1, 2, 'Data Collection and Preservation Formats.doc', '#1005782 84554274 Developing your project-case.doc', 'AssignmenT #3.docx', 4, 5, '2019-07-03 21:24:08'),
(3, 1002, 5, 2, '14114 STRIDE.doc', '15811 Disaster recovery plan.doc', '4 Applications recovery information.doc', 4, 5, '2019-07-02 07:53:19'),
(4, 10103, 1, 101, 'shi(yen)-HRMN 2821  16777.doc', '', '', 0, 5, '2019-07-04 17:28:01'),
(5, 10106, 1, 101, 'shi(wei)-MKTG 2431-KT 10106.doc', '', '', 0, 5, '2019-07-04 17:28:15'),
(6, 10107, 1, 2, 'shi(wei)-MKTG 2431-KT 10107.doc', '', '', 0, 3, NULL),
(7, 10108, 1, 101, 'shi(wei)-MKTG 2431-KT 10108.doc', '', '', 0, 5, '2019-07-04 17:27:49'),
(8, 10105, 1, 101, 'shi(wei)-MKTG 2431  10105.doc', '', '', 0, 5, '2019-07-04 17:28:09'),
(9, 10104, 1, 101, 'shi(yan)-HRMN 2821 10104.doc', '', '', 0, 5, '2019-07-04 17:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `qued`
--

CREATE TABLE `qued` (
  `id` int(10) NOT NULL,
  `o_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `e_id` int(20) DEFAULT NULL,
  `attached` longblob,
  `status` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qued`
--

INSERT INTO `qued` (`id`, `o_id`, `u_id`, `e_id`, `attached`, `status`) VALUES
(1, 10103, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reassign`
--

CREATE TABLE `reassign` (
  `id` int(10) NOT NULL,
  `o_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `e_id` int(20) DEFAULT NULL,
  `attached` longblob,
  `status` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Id` int(20) NOT NULL,
  `srv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Id`, `srv`) VALUES
(1, 'Essay: From Scratch '),
(2, 'Research Based: From scratch'),
(3, 'Any Other');

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `Id` int(10) NOT NULL,
  `stdy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`Id`, `stdy`) VALUES
(1, 'Undergraduate'),
(2, 'Masters'),
(3, 'Doctorate'),
(4, 'Highschool');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(5) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `f_name`, `l_name`, `u_name`, `email`, `phone`, `pass`, `status`) VALUES
(1, 'Steve', 'Duke', 'pepduke', 'dukesteve@gmail.com', 707133141, 'steveduke', 1),
(2, 'edwin', 'mwai', 'mkenyawriter', 'mkenyawriter100@gmail.com', 700818234, 'qwerty1234', 1),
(3, 'john', 'dave', 'dave100', 'dave100@gmail.com', 707727722, 'john100', 1),
(6, 'jamlic', 'Njue', 'jamli100', 'jamlick100@gmail.com', 2147483647, '123456789', 0),
(100, 'john', 'Mukono', 'johhi', 'sathkopho18@gmail.com', 707070707, '123456789', 1),
(101, 'ladia', 'gloria', 'gloriwriter', 'gloria@gmail.com', 721357522, '12345678', 0),
(102, 'joyce', 'mickky', 'micky29', 'joymick1@gmail.com', 729516165, '12345678', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_name` (`order_name`);

--
-- Indexes for table `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_prog`
--
ALTER TABLE `order_prog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qued`
--
ALTER TABLE `qued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reassign`
--
ALTER TABLE `reassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editors`
--
ALTER TABLE `editors`
  MODIFY `e_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `format`
--
ALTER TABLE `format`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ms_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10109;

--
-- AUTO_INCREMENT for table `order_prog`
--
ALTER TABLE `order_prog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qued`
--
ALTER TABLE `qued`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reassign`
--
ALTER TABLE `reassign`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `study`
--
ALTER TABLE `study`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
