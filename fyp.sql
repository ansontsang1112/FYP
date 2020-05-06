-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- 主機： 10.68.10.2:3307
-- 產生時間： 2020 年 05 月 06 日 13:20
-- 伺服器版本： 10.3.7-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fyp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `attendent_info`
--

CREATE TABLE `attendent_info` (
  `sysid` varchar(50) NOT NULL,
  `studentid` int(50) NOT NULL,
  `cID` varchar(50) NOT NULL,
  `classID` varchar(50) NOT NULL,
  `regTime` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `attendent_info`
--

INSERT INTO `attendent_info` (`sysid`, `studentid`, `cID`, `classID`, `regTime`, `status`) VALUES
('5eaf26e19747b', 20201001, 'CCIT4058', 'CL01', '13:00', 'On Time'),
('5eaf274030b71', 20201000, 'CCIT4058', 'CL01', '13:02', 'On Time'),
('5eaf274facc96', 20201002, 'CCIT4058', 'CL01', '13:03', 'On Time'),
('5eaf27697441a', 20201003, 'CCIT4058', 'CL01', '13:09', 'On Time'),
('5eaf2774681f7', 20201005, 'CCIT4058', 'CL01', '13:09', 'On Time'),
('5eaf92aa79fe7', 20201002, 'CCCH1001', 'CL01', 'N/A', 'On Time'),
('5eaf92aa9140c', 20201007, 'CCCH1001', 'CL01', 'N/A', 'Absent'),
('5eaf92aaa5210', 20201008, 'CCCH1001', 'CL01', 'N/A', 'Absent'),
('5eaf92aac5973', 20201019, 'CCCH1001', 'CL01', 'N/A', 'Absent'),
('5eaf92aae2b17', 20201010, 'CCCH1001', 'CL01', 'N/A', 'Absent'),
('5eaf92aaf32d3', 20201000, 'CCEN4013', 'CL01', 'N/A', 'Absent'),
('5eaf92ab11bf7', 20201004, 'CCEN4013', 'CL01', 'N/A', 'Absent'),
('5eaf92ab22166', 20201006, 'CCEN4013', 'CL01', 'N/A', 'Absent'),
('5eaf92ab33230', 20201007, 'CCEN4013', 'CL01', 'N/A', 'Absent'),
('5eaf92ab4e396', 20201015, 'CCEN4013', 'CL01', 'N/A', 'Absent'),
('5eaf92ab5e840', 20201017, 'CCEN4013', 'CL01', 'N/A', 'Absent'),
('5eaf92ab772e3', 20201005, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eaf92ab873a8', 20201006, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eaf92ab94c28', 20201007, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eaf92aba500d', 20201010, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eaf92abb54e5', 20201011, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eaf92abc59e5', 20201012, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eaf92abd31fd', 20201016, 'CCMA9009', 'CL01', 'N/A', 'Absent'),
('5eafa30e8787c', 20201000, 'CCIT4058', 'CL01', '13:07', 'On Time'),
('5eafa4585b908', 20201004, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4587be2a', 20201006, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4588ddef', 20201007, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4589e225', 20201008, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa458b2781', 20201009, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa458d1be1', 20201010, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa458eccab', 20201011, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4590baf0', 20201012, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa45922295', 20201013, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa459352b5', 20201014, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa45944a13', 20201015, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4595e122', 20201016, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4596a94a', 20201017, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4597e69d', 20201018, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4598b1a8', 20201020, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eafa4599c2bd', 20201019, 'CCIT4058', 'CL01', 'N/A', 'Absent'),
('5eb23d8bed477', 20201000, 'CCFK6023', 'CL01', 'N/A', 'On Time'),
('5eb23d8c143fc', 20201001, 'CCFK6023', 'CL01', 'N/A', 'On Time'),
('5eb23d8c273d4', 20201002, 'CCFK6023', 'CL01', 'N/A', 'On Time'),
('5eb23d8c36672', 20201003, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8c4fe7c', 20201004, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8c62eb1', 20201005, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8c732cb', 20201006, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8c8ba64', 20201007, 'CCFK6023', 'CL01', 'N/A', 'Late'),
('5eb23d8ca6b55', 20201010, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8cb36c4', 20201009, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8cc4a19', 20201011, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8cd6743', 20201008, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8ce6c1f', 20201014, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d01425', 20201012, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d0b074', 20201013, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d1c594', 20201015, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d31f27', 20201016, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d3e914', 20201017, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d4a80e', 20201018, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d581d1', 20201019, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d68551', 20201020, 'CCFK6023', 'CL01', 'N/A', 'Absent'),
('5eb23d8d78dae', 20201000, 'CCMA9009', 'CL02', 'N/A', 'Absent'),
('5eb23d8d8639b', 20201002, 'CCMA9009', 'CL02', 'N/A', 'Late'),
('5eb23d8d9e8ef', 20201008, 'CCMA9009', 'CL02', 'N/A', 'Absent'),
('5eb23d8db073a', 20201009, 'CCMA9009', 'CL02', 'N/A', 'Absent'),
('5eb23d8dbf127', 20201013, 'CCMA9009', 'CL02', 'N/A', 'Absent'),
('5eb23d8dd1238', 20201001, 'CCLS9723', 'CL01', 'N/A', 'Absent'),
('5eb23d8dde996', 20201002, 'CCLS9723', 'CL01', 'N/A', 'On Time'),
('5eb23d8deff15', 20201003, 'CCLS9723', 'CL01', 'N/A', 'On Time'),
('5eb23d8e0595b', 20201005, 'CCLS9723', 'CL01', 'N/A', 'On Time'),
('5eb23d8e11870', 20201009, 'CCLS9723', 'CL01', 'N/A', 'On Time'),
('5eb23d8e1f274', 20201011, 'CCLS9723', 'CL01', 'N/A', 'Late'),
('5eb23d8e47d2a', 20201014, 'CCLS9723', 'CL01', 'N/A', 'Late'),
('5eb23d8e658ed', 20201016, 'CCLS9723', 'CL01', 'N/A', 'Late'),
('5eb252f4bdb5a', 20201001, 'CCEN4013', 'CL02', 'N/A', 'Absent'),
('5eb252f4d65bc', 20201003, 'CCEN4013', 'CL02', 'N/A', 'Absent'),
('5eb252f4eaa7f', 20201009, 'CCEN4013', 'CL02', 'N/A', 'Absent'),
('5eb252f508483', 20201011, 'CCEN4013', 'CL02', 'N/A', 'Absent'),
('5eb252f519c69', 20201010, 'CCEN4013', 'CL02', 'N/A', 'Absent'),
('5eb2b42615b51', 20201001, 'CCEN4013', 'CL02', '20:57', 'Late');

-- --------------------------------------------------------

--
-- 資料表結構 `ClassMgr`
--

CREATE TABLE `ClassMgr` (
  `sysid` varchar(50) NOT NULL,
  `cID` varchar(50) NOT NULL,
  `classID` varchar(50) NOT NULL,
  `tTime` varchar(50) NOT NULL,
  `eTime` varchar(50) DEFAULT NULL,
  `tWeek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ClassMgr`
--

INSERT INTO `ClassMgr` (`sysid`, `cID`, `classID`, `tTime`, `eTime`, `tWeek`) VALUES
('5eaefff81ae58', 'CCCH1001', 'CL01', '09:45', '11:00', 'Monday'),
('5eaf0067466a4', 'CCEN4013', 'CL01', '08:30', '09:45', 'Monday'),
('5eaf0078cabfc', 'CCMA9009', 'CL01', '11:00', '11:30', 'Monday'),
('5eaf0084b2834', 'CCVA2320', 'CL01', '11:30', '13:00', 'Monday'),
('5eaf00940e736', 'CCIT4058', 'CL01', '13:00', '14:00', 'Monday'),
('5eaf00c8de7b3', 'CCPE5023', 'CL01', '08:30', '09:45', 'Tuesday'),
('5eaf00dcdd019', 'CCEN4013', 'CL03', '09:45', '11:00', 'Tuesday'),
('5eaf00e9b6a81', 'CCVA2320', 'CL02', '11:00', '12:00', 'Tuesday'),
('5eaf010cd63d3', 'CCRG7062', 'CL01', '13:00', '14:00', 'Tuesday'),
('5eaf011d0f814', 'CCFK6023', 'CL01', '08:30', '09:45', 'Wednesday'),
('5eaf012f6f110', 'CCMA9009', 'CL02', '09:45', '11:00', 'Wednesday'),
('5eaf013e9c436', 'CCLS9723', 'CL01', '11:00', '12:00', 'Wednesday'),
('5eaf014eb5c4a', 'CCCH1001', 'CL02', '08:30', '09:45', 'Thursday'),
('5eaf017fed0c3', 'CCLS9723', 'CL02', '09:45', '11:00', 'Thursday'),
('5eaf0192e1889', 'CCMA9009', 'CL03', '11:00', '12:00', 'Thursday'),
('5eaf01a3b8b02', 'CCEN4013', 'CL02', '13:00', '14:00', 'Wednesday'),
('5eaf01d7aabe9', 'CCEN4013', 'CL03', '13:00', '14:00', 'Thursday'),
('5eaf01f7d46e0', 'CCRG7062', 'CL02', '08:30', '09:00', 'Friday'),
('5eaf021d7b4e0', 'CCLS9723', 'CL03', '09:00', '09:45', 'Friday'),
('5eaf022e0e856', 'CCCH1001', 'CL03', '09:45', '11:00', 'Friday'),
('5eaf02595fc1c', 'CCEN4013', 'CL04', '11:00', '12:00', 'Friday'),
('5eaf0273c2e5c', 'CCMA9009', 'CL04', '13:00', '14:00', 'Friday');

-- --------------------------------------------------------

--
-- 資料表結構 `CoursesMgr`
--

CREATE TABLE `CoursesMgr` (
  `cID` varchar(100) NOT NULL,
  `cName` varchar(50) DEFAULT NULL,
  `Place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `CoursesMgr`
--

INSERT INTO `CoursesMgr` (`cID`, `cName`, `Place`) VALUES
('CCCH1001', 'Chinese', 'ERC202'),
('CCEN4013', 'English for Human', 'ERC405'),
('CCFK6023', 'How to be a Person', 'ERC608'),
('CCIT4058', 'Information Technology', 'ERC307'),
('CCLS9723', 'Liberal Studies', 'ERC1001'),
('CCMA9009', 'Maths for Daily', 'ERC706'),
('CCPE5023', 'PE for MMA', 'ERC803'),
('CCRG7062', 'Religion for Buddhism', 'ERC1111'),
('CCVA2320', 'Visual Arts', 'ERC310');

-- --------------------------------------------------------

--
-- 資料表結構 `staff_records`
--

CREATE TABLE `staff_records` (
  `sysid` varchar(50) NOT NULL,
  `staffid` varchar(50) NOT NULL,
  `staffName` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `cID` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `staff_records`
--

INSERT INTO `staff_records` (`sysid`, `staffid`, `staffName`, `password`, `dept`, `role`, `cID`, `status`) VALUES
('5ead4a7e6a0ea', '1000', 'Eric Drump', '0000', 'Executive', 'Principal', 'N/A', 'On Job'),
('5eaf0315b5972', '1001', 'Kenny Chak', '0000', 'Teaching Department', 'FT Teacher', 'CCFK6023', 'On Job'),
('5eaf0333ed12f', '1003', 'Gordon Ng', '0000', 'Teaching Department', 'FT Teacher', 'CCMA9009', 'On Job'),
('5eaf0344ea4e8', '1004', 'KC Hung', '0000', 'Teaching Department', 'FT Teacher', 'CCPE5023', 'On Job'),
('5eaf035d17d67', '1005', 'Anson Tsang', '0000', 'Teaching Department', 'FT Teacher', 'CCIT4058', 'On Job'),
('5eaf038cbb605', '1006', 'Daniel Cheung', '0000', 'Teaching Department', 'PT Teacher', 'CCLS9723', 'On Job'),
('5eaf039fb7a97', '1007', 'Jimmy Yeung', '0000', 'Teaching Department', 'FT Teacher', 'CCVA2320', 'On Job'),
('5eaf03b101e1f', '1008', 'Rory Pun', '0000', 'Teaching Department', 'PT Teacher', 'CCCH1001', 'On Job'),
('5eaf03d3395eb', '1009', 'Peter Lam', '0000', 'Teaching Department', 'PT Teacher', 'CCCH1001', 'On Job'),
('5eaf04000f6d4', '1010', 'Ivan Cheung', '0000', 'IT Department', 'IT Staff', 'N/A', 'On Job'),
('5eaf042cda0f2', '1011', 'Lam Wei Bo', '1234', 'Teaching Department', 'PT Teacher', 'CCIT4058', 'Dismissed'),
('5eaf9cef47efe', '1012', 'Aric Lam', '0000', 'IT Department', 'IT Staff', 'N/A', 'Dismissed');

-- --------------------------------------------------------

--
-- 資料表結構 `student_courses_info`
--

CREATE TABLE `student_courses_info` (
  `sysid` varchar(100) NOT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `cID` varchar(50) DEFAULT NULL,
  `classID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student_courses_info`
--

INSERT INTO `student_courses_info` (`sysid`, `studentid`, `cID`, `classID`) VALUES
('5eaf0780dc418', '20201000', 'CCCH1001', 'CL03'),
('5eaf07b34c722', '20201001', 'CCCH1001', 'CL03'),
('5eaf07b68d9df', '20201002', 'CCCH1001', 'CL01'),
('5eaf07b92ff28', '20201003', 'CCCH1001', 'CL03'),
('5eaf07bc2828d', '20201004', 'CCCH1001', 'CL02'),
('5eaf07bfe3b3b', '20201005', 'CCCH1001', 'CL03'),
('5eaf07c75e280', '20201005', 'CCCH1001', 'CL02'),
('5eaf07c9862a0', '20201006', 'CCCH1001', 'CL03'),
('5eaf07cb70909', '20201007', 'CCCH1001', 'CL01'),
('5eaf07cddecd2', '20201008', 'CCCH1001', 'CL01'),
('5eaf07d123ce7', '20201011', 'CCCH1001', 'CL02'),
('5eaf07d41f41f', '20201012', 'CCCH1001', 'CL02'),
('5eaf07d722de8', '20201013', 'CCCH1001', 'CL03'),
('5eaf07d9a5570', '20201014', 'CCCH1001', 'CL02'),
('5eaf07dc45021', '20201015', 'CCCH1001', 'CL02'),
('5eaf07deddce6', '20201016', 'CCCH1001', 'CL03'),
('5eaf07e1d5ab8', '20201017', 'CCCH1001', 'CL02'),
('5eaf07e4adf9b', '20201018', 'CCCH1001', 'CL02'),
('5eaf07e752a53', '20201019', 'CCCH1001', 'CL01'),
('5eaf07e99e597', '20201020', 'CCCH1001', 'CL02'),
('5eaf07f930338', '20201009', 'CCCH1001', 'CL02'),
('5eaf07fd91ce1', '20201010', 'CCCH1001', 'CL01'),
('5eaf081035c04', '20201000', 'CCEN4013', 'CL01'),
('5eaf081459bfa', '20201001', 'CCEN4013', 'CL02'),
('5eaf081a4b232', '20201002', 'CCEN4013', 'CL03'),
('5eaf081ee1ee6', '20201003', 'CCEN4013', 'CL02'),
('5eaf082f1d0f0', '20201004', 'CCEN4013', 'CL01'),
('5eaf0835740f3', '20201006', 'CCEN4013', 'CL01'),
('5eaf083a60042', '20201007', 'CCEN4013', 'CL01'),
('5eaf08462ee4e', '20201008', 'CCEN4013', 'CL03'),
('5eaf084b263cd', '20201009', 'CCEN4013', 'CL02'),
('5eaf088049416', '20201011', 'CCEN4013', 'CL02'),
('5eaf088527a5a', '20201012', 'CCEN4013', 'CL04'),
('5eaf088e24bec', '20201010', 'CCEN4013', 'CL02'),
('5eaf0899b17fe', '20201013', 'CCEN4013', 'CL03'),
('5eaf08aa940c5', '20201015', 'CCEN4013', 'CL01'),
('5eaf08afa0130', '20201016', 'CCEN4013', 'CL03'),
('5eaf08b4df13e', '20201017', 'CCEN4013', 'CL01'),
('5eaf08b95f887', '20201018', 'CCEN4013', 'CL03'),
('5eaf08c7f408b', '20201014', 'CCEN4013', 'CL03'),
('5eaf08d0e0ea2', '20201019', 'CCEN4013', 'CL04'),
('5eaf08d51d33c', '20201020', 'CCEN4013', 'CL03'),
('5eaf08d985e47', '20201000', 'CCFK6023', 'CL01'),
('5eaf08ddca6a7', '20201001', 'CCFK6023', 'CL01'),
('5eaf08e209862', '20201002', 'CCFK6023', 'CL01'),
('5eaf08e580ba0', '20201003', 'CCFK6023', 'CL01'),
('5eaf08e97d7cf', '20201004', 'CCFK6023', 'CL01'),
('5eaf08efb9c10', '20201005', 'CCFK6023', 'CL01'),
('5eaf09011235e', '20201006', 'CCFK6023', 'CL01'),
('5eaf0905c6f58', '20201007', 'CCFK6023', 'CL01'),
('5eaf090b1fe5c', '20201007', 'CCEN4013', 'CL03'),
('5eaf093262165', '20201010', 'CCFK6023', 'CL01'),
('5eaf096e63245', '20201010', 'CCFK6023', 'CL01'),
('5eaf09760c43b', '20201009', 'CCFK6023', 'CL01'),
('5eaf09806243c', '20201011', 'CCFK6023', 'CL01'),
('5eaf099876574', '20201008', 'CCFK6023', 'CL01'),
('5eaf09a4ea6f5', '20201014', 'CCFK6023', 'CL01'),
('5eaf09b28a544', '20201012', 'CCFK6023', 'CL01'),
('5eaf09be8aa72', '20201013', 'CCFK6023', 'CL01'),
('5eaf09c5b04b6', '20201015', 'CCFK6023', 'CL01'),
('5eaf09d173105', '20201016', 'CCFK6023', 'CL01'),
('5eaf09dea4a7e', '20201017', 'CCFK6023', 'CL01'),
('5eaf09e62b414', '20201018', 'CCFK6023', 'CL01'),
('5eaf09ea6941b', '20201019', 'CCFK6023', 'CL01'),
('5eaf09ee43e87', '20201020', 'CCFK6023', 'CL01'),
('5eaf09f8e6762', '20201000', 'CCIT4058', 'CL01'),
('5eaf09fee0ea2', '20201001', 'CCIT4058', 'CL01'),
('5eaf0a02c68da', '20201002', 'CCIT4058', 'CL01'),
('5eaf0a0728ccc', '20201003', 'CCIT4058', 'CL01'),
('5eaf0a0a9a92f', '20201004', 'CCIT4058', 'CL01'),
('5eaf0a10ba2b5', '20201005', 'CCIT4058', 'CL01'),
('5eaf0a163ba78', '20201006', 'CCIT4058', 'CL01'),
('5eaf0a19d7a55', '20201007', 'CCIT4058', 'CL01'),
('5eaf0a204b760', '20201008', 'CCIT4058', 'CL01'),
('5eaf0a24bc027', '20201009', 'CCIT4058', 'CL01'),
('5eaf0a28ca007', '20201010', 'CCIT4058', 'CL01'),
('5eaf0a2c39c8e', '20201011', 'CCIT4058', 'CL01'),
('5eaf0a3004a0b', '20201012', 'CCIT4058', 'CL01'),
('5eaf0a347a972', '20201013', 'CCIT4058', 'CL01'),
('5eaf0a377f0cc', '20201014', 'CCIT4058', 'CL01'),
('5eaf0a3ab48d4', '20201015', 'CCIT4058', 'CL01'),
('5eaf0a3f9f95a', '20201015', 'CCIT4058', 'CL01'),
('5eaf0a432dc08', '20201016', 'CCIT4058', 'CL01'),
('5eaf0a46d0118', '20201017', 'CCIT4058', 'CL01'),
('5eaf0a4ad19eb', '20201018', 'CCIT4058', 'CL01'),
('5eaf0a4fa8648', '20201020', 'CCIT4058', 'CL01'),
('5eaf0a5972a6e', '20201019', 'CCIT4058', 'CL01'),
('5eaf0a64c3541', '20201000', 'CCLS9723', 'CL03'),
('5eaf0a6953b70', '20201001', 'CCLS9723', 'CL01'),
('5eaf0a6dcc65e', '20201002', 'CCLS9723', 'CL01'),
('5eaf0a72d4233', '20201003', 'CCLS9723', 'CL01'),
('5eaf0a770b5e8', '20201004', 'CCLS9723', 'CL03'),
('5eaf0a7abefac', '20201005', 'CCLS9723', 'CL01'),
('5eaf0a7e354ee', '20201006', 'CCLS9723', 'CL03'),
('5eaf0a8229ef6', '20201007', 'CCLS9723', 'CL02'),
('5eaf0a858bff7', '20201008', 'CCLS9723', 'CL02'),
('5eaf0a8937364', '20201009', 'CCLS9723', 'CL01'),
('5eaf0a8c9b914', '20201010', 'CCLS9723', 'CL02'),
('5eaf0a90568de', '20201011', 'CCLS9723', 'CL01'),
('5eaf0a941e09b', '20201012', 'CCLS9723', 'CL02'),
('5eaf0a97c6733', '20201013', 'CCLS9723', 'CL02'),
('5eaf0a9ba23bc', '20201014', 'CCLS9723', 'CL01'),
('5eaf0a9f5d350', '20201015', 'CCLS9723', 'CL02'),
('5eaf0aa37e569', '20201016', 'CCLS9723', 'CL01'),
('5eaf0aa7abc21', '20201017', 'CCLS9723', 'CL02'),
('5eaf0aac8473a', '20201018', 'CCLS9723', 'CL02'),
('5eaf0ab037e3a', '20201019', 'CCLS9723', 'CL02'),
('5eaf0ac395724', '20201020', 'CCLS9723', 'CL03'),
('5eaf0acd27a4d', '20201000', 'CCMA9009', 'CL02'),
('5eaf0ad1bcc69', '20201001', 'CCMA9009', 'CL04'),
('5eaf0ad8acb6c', '20201002', 'CCMA9009', 'CL02'),
('5eaf0adca7999', '20201003', 'CCMA9009', 'CL03'),
('5eaf0ae1cbc7d', '20201004', 'CCMA9009', 'CL03'),
('5eaf0ae61139f', '20201005', 'CCMA9009', 'CL01'),
('5eaf0aeb0b5bb', '20201006', 'CCMA9009', 'CL01'),
('5eaf0aee97c39', '20201007', 'CCMA9009', 'CL01'),
('5eaf0af438c9f', '20201008', 'CCMA9009', 'CL02'),
('5eaf0af85d8c5', '20201009', 'CCMA9009', 'CL02'),
('5eaf0afc699dc', '20201010', 'CCMA9009', 'CL01'),
('5eaf0b0161bbd', '20201011', 'CCMA9009', 'CL01'),
('5eaf0b0549560', '20201012', 'CCMA9009', 'CL01'),
('5eaf0b0959b0a', '20201013', 'CCMA9009', 'CL02'),
('5eaf0b0ee9a7b', '20201015', 'CCMA9009', 'CL04'),
('5eaf0b136f915', '20201016', 'CCMA9009', 'CL01'),
('5eaf0b190b82b', '20201017', 'CCMA9009', 'CL03'),
('5eaf0b1ee4444', '20201018', 'CCMA9009', 'CL04'),
('5eaf0b2371409', '20201019', 'CCMA9009', 'CL03'),
('5eaf0b26c7044', '20201020', 'CCMA9009', 'CL04'),
('5eaf0b3278144', '20201000', 'CCPE5023', 'CL01'),
('5eaf0b3727f80', '20201001', 'CCPE5023', 'CL01'),
('5eaf0b3b94b61', '20201002', 'CCPE5023', 'CL01'),
('5eaf0b3feb363', '20201003', 'CCPE5023', 'CL01'),
('5eaf0b4636738', '20201004', 'CCPE5023', 'CL01'),
('5eaf0b4acb7d0', '20201005', 'CCPE5023', 'CL01'),
('5eaf0b5154054', '20201006', 'CCPE5023', 'CL01'),
('5eaf0b5a603f3', '20201008', 'CCPE5023', 'CL01'),
('5eaf0b604faf1', '20201011', 'CCPE5023', 'CL01'),
('5eaf0b6415c25', '20201012', 'CCPE5023', 'CL01'),
('5eaf0b681420a', '20201013', 'CCPE5023', 'CL01'),
('5eaf0b6c0bc0b', '20201014', 'CCPE5023', 'CL01'),
('5eaf0b743cde1', '20201016', 'CCPE5023', 'CL01'),
('5eaf0b7885df1', '20201017', 'CCPE5023', 'CL01'),
('5eaf0b7d11f3e', '20201018', 'CCPE5023', 'CL01'),
('5eaf0b805c2a3', '20201019', 'CCPE5023', 'CL01'),
('5eaf0b8441cb7', '20201020', 'CCPE5023', 'CL01'),
('5eaf0bb0485b8', '20201009', 'CCRG7062', 'CL01'),
('5eaf0c18c29fb', '20201014', 'CCVA2320', 'CL02');

-- --------------------------------------------------------

--
-- 資料表結構 `student_late_attendent_report`
--

CREATE TABLE `student_late_attendent_report` (
  `sysid` varchar(50) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `late_courses` varchar(50) NOT NULL,
  `reason` varchar(5000) NOT NULL,
  `handled` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student_late_attendent_report`
--

INSERT INTO `student_late_attendent_report` (`sysid`, `studentid`, `late_courses`, `reason`, `handled`) VALUES
('5eaf95ade8cda', '20201007', 'CCCH1001-CL01', 'Sorry, My Computer is broken, so forgot to take attendants. ', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `student_records`
--

CREATE TABLE `student_records` (
  `sysid` varchar(50) NOT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `studentid` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ccID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student_records`
--

INSERT INTO `student_records` (`sysid`, `studentName`, `studentid`, `password`, `ccID`) VALUES
('5eaf046a40994', 'James Trevino', '20201000', '1112', 'CCCH1001-CL03,CCEN4013-CL01,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL03,CCMA9009-CL02,CCPE5023-CL01'),
('5eaf04c21f38f', 'Joseph Woods', '20201001', '1111', ',CCCH1001-CL03,CCEN4013-CL02,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL04,CCPE5023-CL01'),
('5eaf04d0466ff', 'Henry Baker', '20201002', '1111', ',CCCH1001-CL01,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL02,CCPE5023-CL01'),
('5eaf04dc946c1', 'Charles Orr', '20201003', '1111', ',CCCH1001-CL03,CCEN4013-CL02,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL03,CCPE5023-CL01'),
('5eaf04e88d0e0', 'George Lowe', '20201004', '1111', ',CCCH1001-CL02,CCEN4013-CL01,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL03,CCMA9009-CL03,CCPE5023-CL01'),
('5eaf04f655825', 'Robert Harrell', '20201005', '1111', ',CCCH1001-CL03,CCCH1001-CL02,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL01,CCPE5023-CL01'),
('5eaf0517c4ad3', 'Edward Shaw', '20201006', '1111', ',CCCH1001-CL03,CCEN4013-CL01,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL03,CCMA9009-CL01,CCPE5023-CL01'),
('5eaf0523330c6', 'John Molina', '20201007', '1111', ',CCCH1001-CL01,CCEN4013-CL01,CCFK6023-CL01,CCEN4013-CL03,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL01'),
('5eaf054562f6f', 'Frank Leonard', '20201008', '1111', ',CCCH1001-CL01,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL02,CCPE5023-CL01'),
('5eaf0569de059', 'William Huff', '20201009', '1111', ',CCCH1001-CL02,CCEN4013-CL02,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL02,CCRG7062-CL01'),
('5eaf057649f2d', 'Fred Huffman', '20201010', '1111', ',CCCH1001-CL01,CCEN4013-CL02,CCFK6023-CL01,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL01'),
('5eaf0581819eb', 'Clarence Stevens', '20201011', '1111', ',CCCH1001-CL02,CCEN4013-CL02,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL01,CCPE5023-CL01'),
('5eaf0595e0fe3', 'Thomas Townsend', '20201012', '1111', ',CCCH1001-CL02,CCEN4013-CL04,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL01,CCPE5023-CL01'),
('5eaf05b7654d5', 'Roy Cherry', '20201013', '1111', ',CCCH1001-CL03,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL02,CCPE5023-CL01'),
('5eaf05ac505ea', 'Walter Turner', '20201014', '1111', ',CCCH1001-CL02,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCPE5023-CL01,CCVA2320-CL02'),
('5eaf05c6b78d9', 'Arthur Adkins', '20201015', '1111', ',CCCH1001-CL02,CCEN4013-CL01,CCFK6023-CL01,CCIT4058-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL04'),
('5eaf05d2bfba6', 'Harry Moss', '20201016', '1111', ',CCCH1001-CL03,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL01,CCMA9009-CL01,CCPE5023-CL01'),
('5eaf05dd5327d', 'Leo Mcdowell', '20201017', '1111', ',CCCH1001-CL02,CCEN4013-CL01,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL03,CCPE5023-CL01'),
('5eaf05e9b4d09', 'Oscar Golden', '20201018', '1111', ',CCCH1001-CL02,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL04,CCPE5023-CL01'),
('5eaf05f44486e', 'Elam Aho', '20201019', '1111', ',CCCH1001-CL01,CCEN4013-CL04,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL02,CCMA9009-CL03,CCPE5023-CL01'),
('5eaf060780e1b', 'Erci Ori', '20201020', '1111', ',CCCH1001-CL02,CCEN4013-CL03,CCFK6023-CL01,CCIT4058-CL01,CCLS9723-CL03,CCMA9009-CL04,CCPE5023-CL01');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `attendent_info`
--
ALTER TABLE `attendent_info`
  ADD PRIMARY KEY (`sysid`);

--
-- 資料表索引 `ClassMgr`
--
ALTER TABLE `ClassMgr`
  ADD PRIMARY KEY (`sysid`);

--
-- 資料表索引 `CoursesMgr`
--
ALTER TABLE `CoursesMgr`
  ADD PRIMARY KEY (`cID`);

--
-- 資料表索引 `staff_records`
--
ALTER TABLE `staff_records`
  ADD PRIMARY KEY (`staffid`);

--
-- 資料表索引 `student_courses_info`
--
ALTER TABLE `student_courses_info`
  ADD PRIMARY KEY (`sysid`);

--
-- 資料表索引 `student_late_attendent_report`
--
ALTER TABLE `student_late_attendent_report`
  ADD PRIMARY KEY (`sysid`);

--
-- 資料表索引 `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`studentid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

