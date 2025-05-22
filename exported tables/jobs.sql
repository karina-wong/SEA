-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 04:00 AM
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
-- Database: `sea_db`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
