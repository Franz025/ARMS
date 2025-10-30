-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 09:44 AM
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
-- Database: `arms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accomplishments`
--

CREATE TABLE `tbl_accomplishments` (
  `id` int(24) NOT NULL,
  `tracknumber` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `offices` varchar(255) NOT NULL,
  `accoms_desc` varchar(255) NOT NULL,
  `tech_remarks` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `progs_status` varchar(255) NOT NULL,
  `date_started` timestamp NULL DEFAULT current_timestamp(),
  `date_finished` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accomplishments`
--

INSERT INTO `tbl_accomplishments` (`id`, `tracknumber`, `services`, `offices`, `accoms_desc`, `user_id`, `progs_status`, `date_started`, `date_finished`) VALUES
(1, 'ARMS-2024-001', '10', 'TDRO', 'Paging NFD 1125 Toyota Vios Grey', 'JO00160', 'ONGOING', '2024-10-02 04:01:29', '2024-10-03 02:34:21'),
(2, 'ARMS-2024-002', '4', 'ACCOUNTING', 'asdasdadasdasdaqreeqreqwrwer', 'JO00139', 'FINISHED', '2024-10-02 04:22:50', '2024-10-03 02:39:44'),
(3, 'ARMS-2024-003', '4', 'ASSESSOR', 'dasdasdasdasdasdasddffsdfs', 'JO00160', 'FINISHED', '2024-10-02 04:24:33', '2024-10-03 02:34:26'),
(4, 'ARMS-2024-004', '6', 'CCYA', 'dasdas4234234asdasd', 'Joseph R. Sibucao', 'FINISHED', '2024-10-02 04:28:57', '2024-10-02 04:59:38'),
(5, 'ARMS-2024-005', '7', 'CDRRMO', 'dasdasdasdas', 'JO00160', 'FINISHED', '2024-10-02 04:48:59', '2024-10-03 02:34:31'),
(6, 'ARMS-2024-006', '3', 'ADMIN', 'wrsaefasdfsdffasffsgsdgdgdgdg', 'Joseph R. Sibucao', 'ONGOING', '2024-10-02 05:14:57', '2024-10-02 05:16:18'),
(7, 'ARMS-2024-007', '12', 'ASSESSOR', 'dasdasdas', 'Joseph R. Sibucao', 'ONGOING', '2024-10-02 05:20:07', '2024-10-02 05:21:03'),
(8, 'ARMS-2024-008', '5', 'ADMIN', 'dasdasdasd', 'Joseph R. Sibucao', 'ONGOING', '2024-10-02 05:21:04', '2024-10-02 05:21:14'),
(9, 'ARMS-2024-009', '4', 'CENRO', 'asdasdasdasd', 'JO01224', 'FINISHED', '2024-10-02 05:24:40', '2024-10-03 02:39:59'),
(10, 'ARMS-2024-010', '8', 'BUDGET', 'dasdasdadadasd', 'Joseph R. Sibucao', 'FINISHED', '2024-10-02 05:33:45', '2024-10-02 05:34:08'),
(11, 'ARMS-2024-011', '7', 'BPLO', 'dasdasdas', 'Joseph R. Sibucao', 'ONGOING', '2024-10-02 08:35:54', '2024-10-02 08:36:02'),
(12, 'ARMS-2024-012', '6', 'BPLO', 'dasfadsfsd', 'Joseph R. Sibucao', 'FINISHED', '2024-10-02 08:36:04', '2024-10-03 03:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(150) NOT NULL,
  `employeeName` varchar(150) NOT NULL,
  `designation` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offices`
--

CREATE TABLE `tbl_offices` (
  `id` int(24) NOT NULL,
  `officeCode` varchar(255) NOT NULL,
  `officeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_offices`
--

INSERT INTO `tbl_offices` (`id`, `officeCode`, `officeName`) VALUES
(1, 'ABC', 'ASSOCIATION OF BARANGAY CAPTAINS'),
(2, 'BRGY', 'BARANGAY'),
(3, 'BFP', 'BUREAU OF FIRE PROTECTION'),
(4, 'BPLO', 'BUSINESS PERMITS &amp; LICENSING OFFICE'),
(5, 'ACCOUNTING', 'CITY ACCOUNTANT`S OFFICE'),
(6, 'ADMIN', 'CITY ADMINISTRATOR`S OFFICE'),
(7, 'ASSESSOR', 'CITY ASSESSOR`S OFFICE'),
(8, 'BUDGET', 'CITY BUDGET OFFICE'),
(9, 'CCRO', 'CITY CIVIL REGISTRAR`S OFFICE'),
(10, 'CCYA', 'CITY COUNCIL FOR YOUTH AFFAIRS'),
(11, 'CCAO', 'CITY CULTURAL AFFAIRS OFFICE'),
(12, 'CDRRMO', 'CITY DISASTER RISK REDUCTION &amp; MANAGEMENT OFFICE'),
(13, 'CEO', 'CITY ENGINEER`S OFFICE'),
(14, 'CENRO', 'CITY ENVIRONMENT NATURAL RESOURCE OFFICE'),
(15, 'CHO', 'CITY HEALTH OFFICE'),
(16, 'CHA', 'CITY HOUSING AFFAIRS'),
(17, 'MUSEUM', 'CITY INVESTMENT &amp; TOURISM OFFICE'),
(18, 'LEGAL', 'CITY LEGAL OFFICE'),
(19, 'MARKET', 'CITY MARKET OFFICE'),
(20, 'CPDO', 'CITY PLANNING AND DEVELOPMENT OFFICE'),
(21, 'PROSECUTOR', 'CITY PROSECUTOR`S OFFICE'),
(22, 'CSWD', 'CITY SOCIAL WELFARE &amp; DEVELOPMENT OFFICE'),
(23, 'CTO', 'CITY TREASURER`S OFFICE'),
(24, 'CLB', 'COLEGIO NG LUNGSOD NG BATANGAS'),
(25, 'COA', 'COMMISSION ON AUDIT'),
(26, 'DSS', 'DEFENSE &amp; SECURITY SERVICES'),
(27, 'DepED', 'DEPARTMENT OF EDUCATION'),
(28, 'DILG', 'DEPARTMENT OF INTERIOR AND LOCAL GOVERNMENT'),
(29, 'DTI', 'DEPARTMENT OF TRADE AND INDUSTRY'),
(30, 'GAD', 'GENDER AND DEVELOPMENT'),
(31, 'GSD', 'GENERAL SERVICES DEPARTMENT'),
(32, 'HR', 'HUMAN RESOURCE MANAGEMENT &amp; DEVELOPMENT OFFICE'),
(33, 'ITSD', 'INFORMATION TECHNOLOGY SERVICES DIVISION'),
(34, 'LEIPO', 'LOCAL ECONOMIC &amp; INVESTMENT PROMOTION OFFICE'),
(35, 'MAC', 'MAYOR`S ACTION CENTER'),
(36, 'OCVAS', 'OFFICE OF THE CITY VETERINARIAN &amp; AGRICULTURAL SERVICES'),
(37, 'AUDIT', 'OFFICE OF THE INTERNAL AUDIT SERVICE'),
(38, 'OSCA', 'OFFICE OF THE SENIOR CITIZEN AFFAIRS'),
(39, 'PDAO', 'PERSONS WITH DISABILITY AFFAIRS OFFICE'),
(40, 'PNP', 'PHILIPPINE NATIONAL POLICE'),
(41, 'PAAD', 'PUBLIC AFFAIRS AND ASSISTANCE DIVISION'),
(42, 'LIBRARY', 'PUBLIC CITY LIBRARY OFFICE'),
(43, 'PESO', 'PUBLIC EMPLOYMENT SERVICES OFFICE'),
(44, 'PIO', 'PUBLIC INFORMATION OFFICE'),
(45, 'PSMU', 'PUBLIC SERVICE AND MAINTENANCE UNIT'),
(46, 'SP', 'SANGGUNIANG PANLUNGSOD'),
(47, 'SECRETARY', 'SECRETARY TO THE MAYOR'),
(48, 'SC', 'SPORTS COUNCIL'),
(49, 'TCC', 'TEACHER`S CONFERENCE CENTER'),
(50, 'TDRO', 'TRANSPORTATION DEVELOPMENT REGULATORY OFFICE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(24) NOT NULL,
  `servicesName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `servicesName`) VALUES
(1, 'CCTV'),
(2, 'Database'),
(3, 'DTR'),
(4, 'Hardware'),
(5, 'ID'),
(6, 'ITSD Document'),
(7, 'Multimedia'),
(8, 'Network'),
(9, 'OJT'),
(10, 'PA System'),
(11, 'Printer'),
(12, 'Software/Apps'),
(13, 'SPES'),
(14, 'System');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `codename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactnum` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `fullname`, `codename`, `email`, `contactnum`, `password`, `user_type`, `image`, `created_at`, `updated_at`) VALUES
(2, 'sephchrone', 'Joseph R. Sibucao', 'JO00160', 'sephchrone.ph@gmail.com', '09668859558', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1', 'sephchrone.ph.jpg', '2024-09-27 02:58:37', '2024-10-01 00:20:52'),
(4, 'onyx', 'Nico A. Pinsan', 'JO01224', 'onyx@hotsexymail.com', '09265698573', '379589148573fcb70b13693185d63832', '3', 'received_3988351418054806.jpeg', '2024-09-27 04:27:17', '2024-10-01 00:21:17'),
(5, 'eddiewow', 'Jamber Patricio Endaya Felipe', 'jpefelipe', 'felipejamber@gmail.com', '09171221032', 'ba2a40a00d59b0ee00047c1512c36d3e', '3', 'FB_IMG_1727366148205.jpg', '2024-09-27 04:52:43', NULL),
(6, 'ryan', 'Ryan Paolo V. Contreras', 'JO00139', 'contrerasryan1599@gmail.com', '09166824668', '5f4dcc3b5aa765d61d8327deb882cf99', '3', 'JO00139_1.jpg', '2024-09-27 04:57:05', '2024-10-01 00:21:49'),
(7, 'techartisan', 'Franz Gee Em D. Moog', 'OJT', 'Emm.moog@gmail.com', '09278389485', 'bd646ce103e8e31cc5ee9ddcc1a65c8a', '3', 'images (2).png', '2025-04-23 09:17:06', NULL),
(8, 'codecrafter', 'code crafter something', 'JO', 'codecrafter@gmail.com', '09278389485', 'ef627aa5e3ecf3bb3b090c6dfcbe1147', '2', 'download.jpg', '2025-04-23 10:40:00', NULL);
-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `id` int(11) NOT NULL,
  `usertypeLEVEL` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`id`, `usertypeLEVEL`) VALUES
(1, 'SUPER ADMIN'),
(2, 'J.O'),
(3, 'O.J.T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_info`
--

CREATE TABLE `tbl_web_info` (
  `id` int(24) NOT NULL,
  `web_name` varchar(255) NOT NULL,
  `web_title` varchar(255) NOT NULL,
  `web_acronym` varchar(255) NOT NULL,
  `web_footer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_web_info`
--

INSERT INTO `tbl_web_info` (`id`, `web_name`, `web_title`, `web_acronym`, `web_footer`, `image`, `updated_at`) VALUES
(1, 'Accomplishments MS |', 'Accomplishment Report Management System', '(ARMS)', 'Accomplishment Report MS | © v1.0.0 2024', 'IT_SD-Logo.gif', '2024-10-02 16:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accomplishments`
--
ALTER TABLE `tbl_accomplishments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offices`
--
ALTER TABLE `tbl_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_web_info`
--
ALTER TABLE `tbl_web_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accomplishments`
--
ALTER TABLE `tbl_accomplishments`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offices`
--
ALTER TABLE `tbl_offices`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_web_info`
--
ALTER TABLE `tbl_web_info`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
