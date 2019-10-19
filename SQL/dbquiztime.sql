-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2019 at 11:40 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbquiztime`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbans`
--

DROP TABLE IF EXISTS `tbans`;
CREATE TABLE IF NOT EXISTS `tbans` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aqid` int(11) NOT NULL,
  `atxt` varchar(124) NOT NULL,
  `asts` char(1) NOT NULL,
  `aadddat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`),
  KEY `aqid-qid` (`aqid`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbans`
--

INSERT INTO `tbans` (`aid`, `aqid`, `atxt`, `asts`, `aadddat`) VALUES
(1, 1, 'Hyper Text Markup Language', 'T', '2019-09-23 12:49:17'),
(2, 1, 'Hyper Tab Muted Language', 'F', '2019-09-23 12:49:17'),
(3, 1, 'High Text Multi Language', 'F', '2019-09-23 12:49:17'),
(4, 1, 'High Text Markup Language', 'F', '2019-09-23 12:49:17'),
(5, 6, 'AUX', 'F', '2019-09-23 12:53:08'),
(6, 6, 'ANCHOR', 'F', '2019-09-23 12:53:08'),
(7, 6, 'ACTIVE', 'F', '2019-09-23 12:53:08'),
(8, 6, 'AUDIO FILE', 'T', '2019-09-23 12:53:08'),
(9, 5, 'VIDEO', 'T', '2019-09-23 12:53:23'),
(10, 5, 'VARIETY VIDEO', 'F', '2019-09-23 12:53:23'),
(11, 2, 'ANCHOR', 'T', '2019-09-23 12:54:53'),
(12, 2, 'AUX', 'F', '2019-09-23 12:54:53'),
(13, 2, 'ACTIVE', 'F', '2019-09-23 12:55:10'),
(14, 2, 'AUDIO', 'F', '2019-09-23 12:55:10'),
(15, 7, 's', 'F', '2019-09-23 12:55:31'),
(16, 7, 'scr', 'F', '2019-09-23 12:55:31'),
(17, 7, 'source', 'F', '2019-09-23 12:55:48'),
(18, 7, 'script', 'T', '2019-09-23 12:55:48'),
(19, 13, 'Yes', 'T', '2019-09-25 00:00:00'),
(20, 13, 'No', 'F', '2019-09-25 00:00:00'),
(21, 13, 'Maybe', 'F', '2019-09-25 00:00:00'),
(22, 13, 'Not Defined', 'F', '2019-09-25 00:00:00'),
(23, 10, 'echo', 'T', '2019-09-25 00:00:00'),
(24, 10, 'printf', 'F', '2019-09-25 00:00:00'),
(25, 10, 'cout', 'F', '2019-09-25 00:00:00'),
(26, 10, 'Response.Write', 'F', '2019-09-25 00:00:00'),
(27, 8, '&', 'F', '2019-09-25 00:00:00'),
(28, 8, '$', 'T', '2019-09-25 00:00:00'),
(29, 8, 'datatype var', 'F', '2019-09-25 00:00:00'),
(30, 8, 'var', 'F', '2019-09-25 00:00:00'),
(31, 14, 'Denis Ritchie', 'F', '2019-09-25 00:00:00'),
(32, 14, 'Rasmus Lerdorf', 'T', '2019-09-25 00:00:00'),
(33, 14, 'James Gosling', 'F', '2019-09-25 00:00:00'),
(34, 14, 'Guido Van Gusm', 'F', '2019-09-25 00:00:00'),
(35, 12, '0-122', 'F', '2019-09-25 00:00:00'),
(36, 12, '0-99', 'F', '2019-09-25 00:00:00'),
(37, 12, '0-255', 'T', '2019-09-25 00:00:00'),
(38, 12, '-254-255', 'F', '2019-09-25 00:00:00'),
(39, 9, 'No', 'F', '2019-09-25 00:00:00'),
(40, 9, 'Maybe', 'F', '2019-09-25 00:00:00'),
(41, 9, 'Yes', 'T', '2019-09-25 00:00:00'),
(42, 9, 'Absolutely No', 'F', '2019-09-25 00:00:00'),
(43, 15, 'SELECT THE column1, column2, ... FROM table_name;', 'T', '2019-09-26 00:00:00'),
(44, 15, 'SELECT column1, column2, ... FROM table_name;', 'F', '2019-09-26 00:00:00'),
(45, 15, 'SELECT column1, column2, ... table_name;', 'F', '2019-09-26 00:00:00'),
(46, 15, 'SELECT column1, column2, ...;', 'F', '2019-09-26 00:00:00'),
(47, 16, 'INSERT  (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);', 'F', '2019-09-26 00:00:00'),
(48, 16, 'INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);', 'T', '2019-09-26 00:00:00'),
(49, 16, 'INSERT  VALUES (value1, value2, value3, ...);', 'F', '2019-09-26 00:00:00'),
(50, 16, 'INSERT INTO table_name (column1, column2, column3, ...) THESE(value1, value2, value3, ...);', 'F', '2019-09-26 00:00:00'),
(51, 17, '& , | , !', 'F', '2019-09-26 00:00:00'),
(52, 17, '&& , || , !=', 'F', '2019-09-26 00:00:00'),
(53, 17, 'AND, OR , NOT', 'T', '2019-09-26 00:00:00'),
(54, 17, '>>> , <<< , =!=', 'F', '2019-09-26 00:00:00'),
(55, 18, '++', 'F', '2019-09-26 00:00:00'),
(56, 18, '+', 'F', '2019-09-26 00:00:00'),
(57, 18, '%', 'F', '2019-09-26 00:00:00'),
(58, 18, 'AND', 'F', '2019-09-26 00:00:00'),
(59, 19, 'SELECT', 'F', '2019-09-26 00:00:00'),
(60, 19, 'PROJECT', 'F', '2019-09-26 00:00:00'),
(61, 19, 'JOIN', 'T', '2019-09-26 00:00:00'),
(62, 19, 'PRODUCT', 'F', '2019-09-26 00:00:00'),
(63, 20, 'DECIMAL', 'T', '2019-09-26 00:00:00'),
(64, 20, 'NUMERIC', 'F', '2019-09-26 00:00:00'),
(65, 20, 'FLOAT', 'F', '2019-09-26 00:00:00'),
(66, 20, 'CHARACTER', 'F', '2019-09-26 00:00:00'),
(67, 21, 'BETWEEN', 'F', '2019-09-26 00:00:00'),
(68, 21, 'ANY', 'F', '2019-09-26 00:00:00'),
(69, 21, 'IN', 'T', '2019-09-26 00:00:00'),
(70, 21, 'ALL', 'F', '2019-09-26 00:00:00'),
(71, 22, 'DML', 'F', '2019-09-26 00:00:00'),
(72, 22, 'DDL', 'F', '2019-09-26 00:00:00'),
(73, 22, 'VDL', 'F', '2019-09-26 00:00:00'),
(74, 22, 'SDL', 'F', '2019-09-26 00:00:00'),
(75, 23, 'UNION', 'F', '2019-09-26 00:00:00'),
(76, 23, 'INTERSECTION', 'F', '2019-09-26 00:00:00'),
(77, 23, 'DIFFERENCE', 'F', '2019-09-26 00:00:00'),
(78, 23, 'ALL OF THESE', 'T', '2019-09-26 00:00:00'),
(79, 24, 'Double equal sign ( == )', 'T', '2019-09-26 00:00:00'),
(80, 24, 'LIKE', 'F', '2019-09-26 00:00:00'),
(81, 24, 'BETWEEN', 'F', '2019-09-26 00:00:00'),
(82, 24, 'Single equal sign ( = )', 'F', '2019-09-26 00:00:00'),
(83, 25, 'Values', 'T', '2019-09-26 00:00:00'),
(84, 25, 'Distinct values', 'F', '2019-09-26 00:00:00'),
(85, 25, 'Group By', 'F', '2019-09-26 00:00:00'),
(86, 25, 'Columns', 'F', '2019-09-26 00:00:00'),
(87, 26, 'RAW', 'T', '2019-09-26 00:00:00'),
(88, 26, 'CHAR', 'F', '2019-09-26 00:00:00'),
(89, 26, 'NUMERIC', 'F', '2019-09-26 00:00:00'),
(90, 26, 'VARCHAR', 'F', '2019-09-26 00:00:00'),
(91, 27, 'POWER', 'F', '2019-09-26 00:00:00'),
(92, 27, 'MOD', 'T', '2019-09-26 00:00:00'),
(93, 27, 'ROUND', 'F', '2019-09-26 00:00:00'),
(94, 27, 'REMAINDER', 'F', '2019-09-26 00:00:00'),
(103, 29, 'SELECT', 'F', '2019-09-26 00:00:00'),
(104, 29, 'CREATE', 'F', '2019-09-26 00:00:00'),
(105, 29, 'UPDATE', 'F', '2019-09-26 00:00:00'),
(106, 29, 'ALTER', 'T', '2019-09-26 00:00:00'),
(107, 30, 'The PRIMARY KEY uniquely identifies each record in a SQL database table', 'F', '2019-09-26 00:00:00'),
(108, 30, 'Primary key can be made based on multiple columns', 'F', '2019-09-26 00:00:00'),
(109, 30, 'Primary key must be made of any single columns', 'T', '2019-09-26 00:00:00'),
(110, 30, 'Primary keys must contain UNIQUE values.', 'F', '2019-09-26 00:00:00'),
(111, 31, 'If WHERE clause in missing in statement the all records will be updated.', 'F', '2019-09-26 00:00:00'),
(112, 31, 'Only one record can be updated at a time using WHERE clause', 'T', '2019-09-26 00:00:00'),
(113, 31, 'Multiple records can be updated at a time using WHERE clause', 'F', '2019-09-26 00:00:00'),
(114, 31, 'None is wrong statement', 'F', '2019-09-26 00:00:00'),
(115, 32, 'Scripting Language', 'F', '2019-09-26 00:00:00'),
(116, 32, 'Markup Language', 'T', '2019-09-26 00:00:00'),
(117, 32, 'Programming Language', 'F', '2019-09-26 00:00:00'),
(118, 32, 'Network Protocol', 'F', '2019-09-26 00:00:00'),
(119, 33, 'User defined tags', 'F', '2019-09-26 00:00:00'),
(120, 33, 'Pre-specified tags', 'F', '2019-09-26 00:00:00'),
(121, 33, 'Fixed tags defined by the language', 'T', '2019-09-26 00:00:00'),
(122, 33, 'Tags only for linking', 'F', '2019-09-26 00:00:00'),
(123, 34, '1990', 'T', '2019-09-26 00:00:00'),
(124, 34, '1980', 'F', '2019-09-26 00:00:00'),
(125, 34, '2000', 'F', '2019-09-26 00:00:00'),
(126, 34, '1995', 'F', '2019-09-26 00:00:00'),
(127, 35, 'HTML Body', 'F', '2019-09-26 00:00:00'),
(128, 35, 'HTML Tag', 'T', '2019-09-26 00:00:00'),
(129, 35, 'HTML Attribute', 'F', '2019-09-26 00:00:00'),
(130, 35, 'HTML Element', 'F', '2019-09-26 00:00:00'),
(131, 36, '<fat>', 'F', '2019-09-26 00:00:00'),
(132, 36, '<strong>', 'T', '2019-09-26 00:00:00'),
(133, 36, '<black>', 'F', '2019-09-26 00:00:00'),
(134, 36, '<emp>', 'F', '2019-09-26 00:00:00'),
(135, 37, '<dl>', 'F', '2019-09-26 00:00:00'),
(136, 37, '<ol>', 'T', '2019-09-26 00:00:00'),
(137, 37, '<list>', 'F', '2019-09-26 00:00:00'),
(138, 37, '<ul>', 'F', '2019-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbcat`
--

DROP TABLE IF EXISTS `tbcat`;
CREATE TABLE IF NOT EXISTS `tbcat` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cnam` varchar(100) NOT NULL,
  `csts` char(1) NOT NULL,
  `cadddat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcat`
--

INSERT INTO `tbcat` (`cid`, `cnam`, `csts`, `cadddat`) VALUES
(1, 'PHP', 'A', '2019-09-23 10:37:33'),
(2, 'MYSQL', 'A', '2019-09-23 10:37:33'),
(4, 'PYTHON', 'A', '2019-09-23 11:30:45'),
(5, 'HTML', 'A', '2019-09-23 11:39:53'),
(6, 'C#', 'A', '2019-09-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbque`
--

DROP TABLE IF EXISTS `tbque`;
CREATE TABLE IF NOT EXISTS `tbque` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `qtit` varchar(256) NOT NULL,
  `qcatid` int(11) NOT NULL,
  `qadddat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`qid`),
  KEY `qcid_cid` (`qcatid`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbque`
--

INSERT INTO `tbque` (`qid`, `qtit`, `qcatid`, `qadddat`) VALUES
(1, 'What is the full form of HTML?', 5, '2019-09-23 12:21:40'),
(2, 'What does the a tag stands for in HTML?', 5, '2019-09-23 12:22:14'),
(5, 'What does the video tag stands for?', 5, '2019-09-23 12:22:52'),
(6, 'What does the audio tag stands for?', 5, '2019-09-23 12:22:52'),
(7, 'Which tag is used to add JS to the HTML Page?', 5, '2019-09-23 12:41:43'),
(8, 'What is used to declare a variable in PHP?', 1, '2019-09-25 00:00:00'),
(9, 'Is $_SESSIONS a Superglobal Array?', 1, '2019-09-25 00:00:00'),
(10, 'What is used to print value of a variable in PHP?', 1, '2019-09-25 00:00:00'),
(12, 'What is the range of char in PHP?', 1, '2019-09-25 00:00:00'),
(13, 'Is PHP a compiled language?', 1, '2019-09-25 00:00:00'),
(14, 'PHP is developed by?', 1, '2019-09-25 00:00:00'),
(15, 'What is the correct syntax of select command?', 2, '2019-09-26 00:00:00'),
(16, 'What is the correct syntax of Insert command?', 2, '2019-09-26 00:00:00'),
(17, 'What are the Logical operators of SQL?', 2, '2019-09-26 00:00:00'),
(18, 'Which of these operators does not belong to SQL?', 2, '2019-09-26 00:00:00'),
(19, 'Which data manipulation command is used to combines the records from one or more tables?', 2, '2019-09-26 00:00:00'),
(20, 'Which of the following is not a valid SQL type?', 2, '2019-09-26 00:00:00'),
(21, 'Which operator is used to compare a value to a specified list of values?', 2, '2019-09-26 00:00:00'),
(22, 'The SQL used by front-end application programs to request data from the DBMS is called _______', 2, '2019-09-26 00:00:00'),
(23, 'Which of the following operations requires the relations to be union compatible?', 2, '2019-09-26 00:00:00'),
(24, 'Which of the following is a comparison operator in SQL?', 2, '2019-09-26 00:00:00'),
(25, 'The COUNT function in SQL returns the number of ______________', 2, '2019-09-26 00:00:00'),
(26, 'Which data type can store unstructured data in a column?', 2, '2019-09-26 00:00:00'),
(27, 'Which function is used to divides one numeric expression by another and get the remainder ?', 2, '2019-09-26 00:00:00'),
(29, 'Which statement in SQL allows us to change the definition of a table is?', 2, '2019-09-26 00:00:00'),
(30, 'Which statement is wrong about PRIMARY KEY constraint in SQL?', 2, '2019-09-26 00:00:00'),
(31, 'Wrong statement about UPDATE keyword is', 2, '2019-09-26 00:00:00'),
(32, 'HTML is what type of language ?', 5, '2019-09-26 00:00:00'),
(33, 'HTML uses', 5, '2019-09-26 00:00:00'),
(34, 'The year in which HTML was first proposed _______.', 5, '2019-09-26 00:00:00'),
(35, 'Fundamental HTML Block is known as ___________.', 5, '2019-09-26 00:00:00'),
(36, 'Apart from b tag, what other tag makes text bold ?', 5, '2019-09-26 00:00:00'),
(37, 'How can you make a bulleted list with numbers?', 5, '2019-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbresult`
--

DROP TABLE IF EXISTS `tbresult`;
CREATE TABLE IF NOT EXISTS `tbresult` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rqizid` varchar(100) DEFAULT NULL,
  `ruid` int(11) DEFAULT NULL,
  `rnofrans` int(11) DEFAULT NULL,
  `rnofque` int(11) DEFAULT NULL,
  `rcid` int(11) NOT NULL,
  `radddat` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`),
  KEY `ruid-uid` (`ruid`),
  KEY `rcid-cid` (`rcid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbresult`
--

INSERT INTO `tbresult` (`rid`, `rqizid`, `ruid`, `rnofrans`, `rnofque`, `rcid`, `radddat`) VALUES
(1, '53a31q295eose47f46ip24tdbe5', 1, 5, 5, 5, '2019-09-24 00:19:29'),
(2, '16qu174tpti154hu94l5h4ho2kn', 2, 2, 5, 5, '2019-09-24 14:48:13'),
(3, '8ljqolsfdrctiv94k82a37kldnn', 2, 4, 5, 5, '2019-09-24 14:51:31'),
(4, 'mjil8om1a4hop9eo9qlkmj26bij', 2, 5, 5, 1, '2019-09-25 16:57:07'),
(5, 'h9mpj89i2ml41ijkobj6melooqa', 2, 2, 5, 1, '2019-09-25 16:59:07'),
(6, 'j3g5lcrv1lnpa74jthdl83uuk26', 3, 2, 5, 1, '2019-09-26 10:06:00'),
(7, 'eo30i721fgte7aulq7p2jr35u0g', 3, 3, 5, 5, '2019-09-26 10:15:36'),
(8, 'r2ile0tu1e727fg37gq3puo5aj0', 3, 1, 5, 1, '2019-09-26 10:15:43'),
(9, 'itpov67ask3km5tcvvtken3u194', 3, 3, 5, 2, '2019-10-16 14:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

DROP TABLE IF EXISTS `tbuser`;
CREATE TABLE IF NOT EXISTS `tbuser` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `unam` varchar(50) NOT NULL,
  `ueml` varchar(100) NOT NULL,
  `upwd` varchar(50) NOT NULL,
  `ubio` varchar(1000) NOT NULL,
  `ugen` char(1) NOT NULL,
  `upic` varchar(50) DEFAULT NULL,
  `uregdat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urol` char(1) NOT NULL DEFAULT 'U',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`uid`, `unam`, `ueml`, `upwd`, `ubio`, `ugen`, `upic`, `uregdat`, `urol`) VALUES
(1, 'admin', 'admin@gmail.com', 'abc', 'GOod Boie', 'M', '1.jpg', '2019-09-23 01:47:51', 'A'),
(2, 'usercool', 'sumit@gmail.com', 'abc', 'Very nice guy.', 'M', '2.jpg', '2019-09-24 14:47:40', 'U'),
(3, 'userall', 'shagun@gmail.com', 'abc', 'Its ok.', 'M', '3.jpg', '2019-09-26 09:41:56', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `tbusrans`
--

DROP TABLE IF EXISTS `tbusrans`;
CREATE TABLE IF NOT EXISTS `tbusrans` (
  `uaid` int(11) NOT NULL AUTO_INCREMENT,
  `uaqid` int(11) NOT NULL,
  `uaaid` int(11) NOT NULL,
  `uauid` int(11) NOT NULL,
  `uaqizid` varchar(100) NOT NULL,
  `uaadddat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uaid`),
  KEY `uaqid-qid` (`uaqid`),
  KEY `uaaid-uaid` (`uaaid`),
  KEY `uauid-uid` (`uauid`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbusrans`
--

INSERT INTO `tbusrans` (`uaid`, `uaqid`, `uaaid`, `uauid`, `uaqizid`, `uaadddat`) VALUES
(1, 1, 4, 2, '16qu174tpti154hu94l5h4ho2kn', '2019-09-24 14:48:04'),
(2, 7, 18, 2, '16qu174tpti154hu94l5h4ho2kn', '2019-09-24 14:48:07'),
(3, 2, 14, 2, '16qu174tpti154hu94l5h4ho2kn', '2019-09-24 14:48:09'),
(4, 5, 10, 2, '16qu174tpti154hu94l5h4ho2kn', '2019-09-24 14:48:11'),
(5, 6, 8, 2, '16qu174tpti154hu94l5h4ho2kn', '2019-09-24 14:48:13'),
(6, 1, 2, 2, '8ljqolsfdrctiv94k82a37kldnn', '2019-09-24 14:51:20'),
(7, 7, 18, 2, '8ljqolsfdrctiv94k82a37kldnn', '2019-09-24 14:51:25'),
(8, 5, 9, 2, '8ljqolsfdrctiv94k82a37kldnn', '2019-09-24 14:51:27'),
(9, 2, 11, 2, '8ljqolsfdrctiv94k82a37kldnn', '2019-09-24 14:51:28'),
(10, 6, 8, 2, '8ljqolsfdrctiv94k82a37kldnn', '2019-09-24 14:51:31'),
(11, 8, 28, 2, 'mjil8om1a4hop9eo9qlkmj26bij', '2019-09-25 16:56:53'),
(12, 9, 41, 2, 'mjil8om1a4hop9eo9qlkmj26bij', '2019-09-25 16:56:59'),
(13, 13, 19, 2, 'mjil8om1a4hop9eo9qlkmj26bij', '2019-09-25 16:57:01'),
(14, 10, 23, 2, 'mjil8om1a4hop9eo9qlkmj26bij', '2019-09-25 16:57:05'),
(15, 12, 37, 2, 'mjil8om1a4hop9eo9qlkmj26bij', '2019-09-25 16:57:06'),
(16, 13, 22, 2, 'h9mpj89i2ml41ijkobj6melooqa', '2019-09-25 16:59:00'),
(17, 10, 26, 2, 'h9mpj89i2ml41ijkobj6melooqa', '2019-09-25 16:59:02'),
(18, 14, 32, 2, 'h9mpj89i2ml41ijkobj6melooqa', '2019-09-25 16:59:03'),
(19, 12, 37, 2, 'h9mpj89i2ml41ijkobj6melooqa', '2019-09-25 16:59:05'),
(20, 8, 30, 2, 'h9mpj89i2ml41ijkobj6melooqa', '2019-09-25 16:59:07'),
(21, 9, 40, 3, 'j3g5lcrv1lnpa74jthdl83uuk26', '2019-09-26 10:04:41'),
(22, 8, 28, 3, 'j3g5lcrv1lnpa74jthdl83uuk26', '2019-09-26 10:04:58'),
(23, 13, 21, 3, 'j3g5lcrv1lnpa74jthdl83uuk26', '2019-09-26 10:05:07'),
(24, 12, 36, 3, 'j3g5lcrv1lnpa74jthdl83uuk26', '2019-09-26 10:05:25'),
(25, 10, 23, 3, 'j3g5lcrv1lnpa74jthdl83uuk26', '2019-09-26 10:06:00'),
(26, 6, 8, 3, 'ak2uphvjl31gnul4dt78c56rjl3', '2019-09-26 10:07:11'),
(27, 5, 9, 3, 'ak2uphvjl31gnul4dt78c56rjl3', '2019-09-26 10:07:17'),
(28, 1, 1, 3, 'ak2uphvjl31gnul4dt78c56rjl3', '2019-09-26 10:07:27'),
(29, 2, 13, 3, 'ak2uphvjl31gnul4dt78c56rjl3', '2019-09-26 10:08:06'),
(30, 7, 18, 3, 'ak2uphvjl31gnul4dt78c56rjl3', '2019-09-26 10:08:13'),
(31, 5, 9, 3, '3cai9le97l8pa87n8s8g7663kg0', '2019-09-26 10:09:41'),
(32, 2, 11, 3, '3cai9le97l8pa87n8s8g7663kg0', '2019-09-26 10:09:42'),
(33, 1, 4, 3, '3cai9le97l8pa87n8s8g7663kg0', '2019-09-26 10:09:43'),
(34, 6, 8, 3, '3cai9le97l8pa87n8s8g7663kg0', '2019-09-26 10:09:44'),
(35, 7, 18, 3, '3cai9le97l8pa87n8s8g7663kg0', '2019-09-26 10:09:45'),
(36, 2, 12, 3, 'g367leanp8g9076883cl7k8i9sa', '2019-09-26 10:10:29'),
(37, 1, 2, 3, 'g367leanp8g9076883cl7k8i9sa', '2019-09-26 10:10:29'),
(38, 5, 10, 3, 'g367leanp8g9076883cl7k8i9sa', '2019-09-26 10:10:30'),
(39, 6, 8, 3, 'g367leanp8g9076883cl7k8i9sa', '2019-09-26 10:10:30'),
(40, 7, 17, 3, 'g367leanp8g9076883cl7k8i9sa', '2019-09-26 10:10:31'),
(41, 5, 9, 3, 'eo30i721fgte7aulq7p2jr35u0g', '2019-09-26 10:15:33'),
(42, 7, 16, 3, 'eo30i721fgte7aulq7p2jr35u0g', '2019-09-26 10:15:34'),
(43, 1, 1, 3, 'eo30i721fgte7aulq7p2jr35u0g', '2019-09-26 10:15:34'),
(44, 6, 8, 3, 'eo30i721fgte7aulq7p2jr35u0g', '2019-09-26 10:15:35'),
(45, 2, 14, 3, 'eo30i721fgte7aulq7p2jr35u0g', '2019-09-26 10:15:36'),
(46, 10, 23, 3, 'r2ile0tu1e727fg37gq3puo5aj0', '2019-09-26 10:15:40'),
(47, 9, 40, 3, 'r2ile0tu1e727fg37gq3puo5aj0', '2019-09-26 10:15:41'),
(48, 13, 21, 3, 'r2ile0tu1e727fg37gq3puo5aj0', '2019-09-26 10:15:42'),
(49, 14, 33, 3, 'r2ile0tu1e727fg37gq3puo5aj0', '2019-09-26 10:15:43'),
(50, 12, 38, 3, 'r2ile0tu1e727fg37gq3puo5aj0', '2019-09-26 10:15:43'),
(51, 23, 75, 3, '1hnqmtchgcjgp33690ppvk34hah', '2019-10-16 11:11:28'),
(52, 26, 87, 3, 'itpov67ask3km5tcvvtken3u194', '2019-10-16 14:15:05'),
(53, 19, 61, 3, 'itpov67ask3km5tcvvtken3u194', '2019-10-16 14:15:10'),
(54, 21, 69, 3, 'itpov67ask3km5tcvvtken3u194', '2019-10-16 14:15:15'),
(55, 15, 44, 3, 'itpov67ask3km5tcvvtken3u194', '2019-10-16 14:15:22'),
(56, 30, 108, 3, 'itpov67ask3km5tcvvtken3u194', '2019-10-16 14:15:35');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbans`
--
ALTER TABLE `tbans`
  ADD CONSTRAINT `aqid-qid` FOREIGN KEY (`aqid`) REFERENCES `tbque` (`qid`);

--
-- Constraints for table `tbque`
--
ALTER TABLE `tbque`
  ADD CONSTRAINT `qcid_cid` FOREIGN KEY (`qcatid`) REFERENCES `tbcat` (`cid`);

--
-- Constraints for table `tbresult`
--
ALTER TABLE `tbresult`
  ADD CONSTRAINT `rcid-cid` FOREIGN KEY (`rcid`) REFERENCES `tbcat` (`cid`),
  ADD CONSTRAINT `ruid-uid` FOREIGN KEY (`ruid`) REFERENCES `tbuser` (`uid`);

--
-- Constraints for table `tbusrans`
--
ALTER TABLE `tbusrans`
  ADD CONSTRAINT `uaaid-uaid` FOREIGN KEY (`uaaid`) REFERENCES `tbans` (`aid`),
  ADD CONSTRAINT `uaqid-qid` FOREIGN KEY (`uaqid`) REFERENCES `tbque` (`qid`),
  ADD CONSTRAINT `uauid-uid` FOREIGN KEY (`uauid`) REFERENCES `tbuser` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
