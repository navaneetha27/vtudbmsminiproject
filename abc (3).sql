-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2021 at 07:05 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `uplpay`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uplpay` (IN `intrest` INT, IN `amt` FLOAT, IN `duedate` DATE, IN `usid` INT, IN `apno` INT, IN `b` INT)  NO SQL
BEGIN
DECLARE ampaid FLOAT DEFAULT 0;
SET ampaid=amt+(amt*b*0.01*intrest);
UPDATE lpayment SET duedate=duedate,ampaid=ampaid WHERE  appno=apno AND uid=usid;
END$$

DROP PROCEDURE IF EXISTS `userlog`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userlog` (IN `uid` INT, IN `uname` VARCHAR(40))  NO SQL
INSERT into logintime(uid,uname) VALUES(uid,uname)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ad10`
--

DROP TABLE IF EXISTS `ad10`;
CREATE TABLE IF NOT EXISTS `ad10` (
  `aid` int NOT NULL,
  `passwd` text,
  `adname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ad10`
--

INSERT INTO `ad10` (`aid`, `passwd`, `adname`) VALUES
(1, 'admin123', 'admin123');

--
-- Triggers `ad10`
--
DROP TRIGGER IF EXISTS `dele`;
DELIMITER $$
CREATE TRIGGER `dele` BEFORE DELETE ON `ad10` FOR EACH ROW call del(old.aid)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `appl`
--

DROP TABLE IF EXISTS `appl`;
CREATE TABLE IF NOT EXISTS `appl` (
  `uid` int NOT NULL,
  `appno` int NOT NULL AUTO_INCREMENT,
  `amt` float DEFAULT NULL,
  `lid` int DEFAULT NULL,
  `month` int DEFAULT NULL,
  `apstat` varchar(20) DEFAULT NULL,
  `accno` int DEFAULT NULL,
  `panno` varchar(15) NOT NULL,
  PRIMARY KEY (`uid`,`appno`),
  KEY `lid` (`lid`),
  KEY `month` (`month`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appl`
--

INSERT INTO `appl` (`uid`, `appno`, `amt`, `lid`, `month`, `apstat`, `accno`, `panno`) VALUES
(1, 114, 444, 1, 6, 'approved', 42452, 'zl45821545');

--
-- Triggers `appl`
--
DROP TRIGGER IF EXISTS `inslp`;
DELIMITER $$
CREATE TRIGGER `inslp` AFTER UPDATE ON `appl` FOR EACH ROW if(new.apstat="approved")
THEN
insert INTO lpayment(uid,appno,stat) VALUES(new.uid,new.appno,"not paid");
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loanp`
--

DROP TABLE IF EXISTS `loanp`;
CREATE TABLE IF NOT EXISTS `loanp` (
  `lid` int NOT NULL,
  `month` int NOT NULL,
  `intrest` int DEFAULT NULL,
  PRIMARY KEY (`lid`,`month`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loanp`
--

INSERT INTO `loanp` (`lid`, `month`, `intrest`) VALUES
(1, 3, 10),
(1, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `loant`
--

DROP TABLE IF EXISTS `loant`;
CREATE TABLE IF NOT EXISTS `loant` (
  `lid` int NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loant`
--

INSERT INTO `loant` (`lid`, `lname`) VALUES
(1, 'studentpersonal');

-- --------------------------------------------------------

--
-- Table structure for table `logintime`
--

DROP TABLE IF EXISTS `logintime`;
CREATE TABLE IF NOT EXISTS `logintime` (
  `uid` int NOT NULL,
  `uname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logintime`
--

INSERT INTO `logintime` (`uid`, `uname`, `time`) VALUES
(1, 'adm', '2021-01-18 12:06:53'),
(1, 'adm', '2021-01-18 12:07:15'),
(1, 'adm', '2021-01-18 12:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `lpayment`
--

DROP TABLE IF EXISTS `lpayment`;
CREATE TABLE IF NOT EXISTS `lpayment` (
  `uid` int NOT NULL,
  `appno` int NOT NULL,
  `duedate` date DEFAULT NULL,
  `ampaid` float DEFAULT NULL,
  `stat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`,`appno`),
  KEY `appno` (`appno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lpayment`
--

INSERT INTO `lpayment` (`uid`, `appno`, `duedate`, `ampaid`, `stat`) VALUES
(1, 114, '2021-07-17', 657.12, 'not paid');

--
-- Triggers `lpayment`
--
DROP TRIGGER IF EXISTS `LPAYLOG`;
DELIMITER $$
CREATE TRIGGER `LPAYLOG` BEFORE DELETE ON `lpayment` FOR EACH ROW INSERT INTO lpay_log VALUES(old.uid,old.appno,old.duedate,old.ampaid,old.stat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lpay_log`
--

DROP TABLE IF EXISTS `lpay_log`;
CREATE TABLE IF NOT EXISTS `lpay_log` (
  `uid` int NOT NULL,
  `appno` int NOT NULL,
  `duedate` date DEFAULT NULL,
  `ampaid` float DEFAULT NULL,
  `stat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`,`appno`),
  KEY `appno` (`appno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lpay_log`
--

INSERT INTO `lpay_log` (`uid`, `appno`, `duedate`, `ampaid`, `stat`) VALUES
(22, 122, '2021-01-21', 5000, 'not paid'),
(1, 112, '2021-04-17', 9100, 'not paid'),
(1, 111, '2021-04-17', 9100, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

DROP TABLE IF EXISTS `usr`;
CREATE TABLE IF NOT EXISTS `usr` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passwd` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`uid`, `name`, `email`, `passwd`) VALUES
(1, 'adm', 'nkhero27@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
