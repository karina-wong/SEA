-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2025 at 03:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sea_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `JobReferenceNumber` varchar(5) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `StreetAddress` varchar(40) NOT NULL,
  `Suburb` varchar(40) NOT NULL,
  `State` varchar(3) NOT NULL,
  `Postcode` char(4) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Skill1` varchar(30) DEFAULT NULL,
  `Skill2` varchar(30) DEFAULT NULL,
  `Skill3` varchar(30) DEFAULT NULL,
  `Skill4` varchar(30) DEFAULT NULL,
  `Skill5` varchar(30) DEFAULT NULL,
  `OtherSkills` text DEFAULT NULL,
  `Status` enum('New','Current','Final') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `JobReferenceNumber`, `FirstName`, `LastName`, `DOB`, `Gender`, `StreetAddress`, `Suburb`, `State`, `Postcode`, `Email`, `Phone`, `Skill1`, `Skill2`, `Skill3`, `Skill4`, `Skill5`, `OtherSkills`, `Status`) VALUES
(11, 'DA102', 'John', 'Deer', '2024-10-16', 'male', '20 Long Street', 'Wellington', 'VIC', '3270', 'johndeer@email.com', '0488776655', 'HTML', 'Java / Python', 'React / Vue.js', NULL, NULL, '', 'New'),
(12, 'SD309', 'Jane', 'Lane', '2025-02-12', 'female', '99 Beltimore Road', 'Mars', 'QLD', '4000', 'janedeer@email.com', '04223344', 'Ruby', 'Statistics', 'Java / Python', NULL, NULL, '', 'New'),
(13, 'SD309', 'Liam', 'Nickleson', '2025-05-08', 'male', '47 Sunshine Rd', 'New York', 'QLD', '4100', 'liamnick@email.com', '04267437', 'HTML', 'Statistics', NULL, NULL, NULL, '', 'New'),
(14, 'SD309', 'Alex', 'Jefferson', '2025-05-13', 'non-binary', '35 Louis Lane', 'Everst', 'VIC', '3150', 'alexjefferson@email.com', '04998833', 'Ruby', 'Java / Python', 'React / Vue.js', NULL, NULL, 'Teamwork, Collaboration', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `name` varchar(40) NOT NULL,
  `refnum` varchar(40) NOT NULL,
  `salary` varchar(40) NOT NULL,
  `report_to` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `essential` text NOT NULL,
  `preferable` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`name`, `refnum`, `salary`, `report_to`, `description`, `responsibilities`, `essential`, `preferable`) VALUES
('Data Analyst', 'DA102', '$75,000 - $95,000 per annum', 'Lead Data Analyst', 'The Data Analyst will support SEA\'s data-driven decision-making by collecting, analyzing, and interpreting complex datasets. The successful candidate will generate actionable insights to guide our strategic initiatives, improve user experience, and support product and marketing teams.', 'Collect, clean, and validate large datasets from internal systems and external sources//\r\nDesign and implement dashboards and reports using BI tools (e.g., Tableau, Power BI)//\r\nIdentify patterns, trends, and opportunities in SEA\'s product usage and member engagement//\r\nCollaborate with software and marketing teams to optimize data collection and analysis//\r\nPresent findings to stakeholders and assist in strategic planning//\r\nAutomate repetitive data processes and build scalable data pipelines', 'Bachelor\'s degree in Data Science, Statistics, Computer Science, or a related field//\r\nMinimum 2 years\' experience in a data analyst or similar role//\r\nProficiency in SQL and Python or R\r\nStrong knowledge of statistical techniques and data modeling//\r\nExperience with data visualization tools (e.g., Tableau, Power BI)//\r\nExcellent analytical and problem-solving skills//\r\nStrong communication and presentation abilities', 'Experience with cloud platforms (AWS, Azure, or Google Cloud)//\r\nFamiliarity with machine learning algorithms//\r\nUnderstanding of web analytics tools (Google Analytics, Mixpanel)'),
('Software Developer', 'SD309', '$85,000 - $110,000 per annum', 'Senior Software Engineer', 'The Software Developer will play a crucial role in building and maintaining SEA\'s digital platforms. This role requires hands-on experience in full-stack development and a passion for creating clean, scalable, and secure software.', 'Design, develop, test, and deploy web applications and backend services\r\nCollaborate with designers, data analysts, and other developers to deliver innovative solutions//\r\nWrite clean, efficient, and well-documented code//\r\nConduct code reviews and contribute to continuous integration pipelines\r\nDebug and resolve software defects and performance issues//\r\nParticipate in Agile development cycles and team stand-ups', 'Bachelor\'s degree in Software Engineering, Computer Science, or related field//\r\nMinimum 3 years\' experience in software development//\r\nProficiency in one or more backend languages (e.g., Node.js, Python, Java)\r\nStrong knowledge of front-end frameworks (e.g., React, Vue.js)//\r\nFamiliarity with REST APIs and version control (Git)//\r\nSolid understanding of software design patterns and architecture//\r\nExcellent problem-solving and communication skills', 'Experience with DevOps practices and tools (Docker, Jenkins, CI/CD pipelines)//\r\nKnowledge of database systems (PostgreSQL, MongoDB)//\r\nExposure to cybersecurity principles and secure coding practices//\r\nExperience working with Agile/Scrum methodologies');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`name`, `email`, `password_hash`) VALUES
('admin', 'admin@gmail.com', '$2y$10$ZcmkBjpOkS9YvBbphp1h5e3MXbYg0XfjvD9350TmmBQHDoCtSj8ZW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
