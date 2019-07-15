-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2018 at 12:37 PM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7285732_online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('admin2468', '369admin');

-- --------------------------------------------------------

--
-- Table structure for table `Correct_answer`
--

CREATE TABLE `Correct_answer` (
  `qid` int(11) NOT NULL,
  `correct_option` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Correct_answer`
--

INSERT INTO `Correct_answer` (`qid`, `correct_option`) VALUES
(1037, 'Arrays'),
(1038, 'Rear & Front ends respectively'),
(1039, 'Relational model'),
(1040, 'TCP'),
(1041, '3'),
(1042, 'int i; double* dp = &i;'),
(1043, 'Direct addressing'),
(1051, 'Something between 15 and 100'),
(1052, 'Pointer to node'),
(1053, 'Stack'),
(1054, 'Positive'),
(1055, 'Views'),
(1056, 'None of the above'),
(1057, 'int*arr=(int *)malloc(r*c* sizeof(int));'),
(1058, 'O(n)'),
(1059, '1'),
(1060, '1'),
(1061, '1'),
(1062, '2'),
(1063, '1'),
(1064, '1'),
(1065, '4'),
(1066, '4'),
(1067, '4'),
(1068, '4'),
(1069, 'op'),
(1070, 'oracle'),
(1071, 'boy'),
(1072, 'white'),
(1073, 'maruthi'),
(1074, 'tiger'),
(1075, 'language'),
(1076, 'Query'),
(1077, 'both 1 and 3'),
(1078, 'd'),
(1079, 'Select name'),
(1080, '5'),
(1081, 'cvc'),
(1082, '6'),
(1083, 's'),
(1084, '6'),
(1085, 's'),
(1086, '2'),
(1087, '0'),
(1088, 'y'),
(1089, '4'),
(1090, 'a1'),
(1091, 's2'),
(1092, '2'),
(1093, 'a1'),
(1094, '4'),
(1095, 'A1'),
(1096, '2'),
(1097, 'A2'),
(1098, '2'),
(1099, 'A2'),
(1100, '4'),
(1101, 'A4'),
(1102, '2'),
(1103, 'A2'),
(1104, '2'),
(1105, 'a2'),
(1106, '3'),
(1107, 'a3'),
(1108, '3'),
(1109, 'a3'),
(1110, '3'),
(1111, 'a3');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `dept_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`dept_name`) VALUES
('Computer Science'),
('Electrical Engineering'),
('Electronics & Communication'),
('Info. Science '),
('Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `handles`
--

CREATE TABLE `handles` (
  `tid` int(11) NOT NULL,
  `sub_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `handles`
--

INSERT INTO `handles` (`tid`, `sub_code`, `email`) VALUES
(3001, 'CS310', 'manimala@gmail.com'),
(3001, 'CS510', 'manimala@gmail.com'),
(3002, 'CS620', 'anil@gmail.com'),
(3003, 'CS220', 'ashritha@gmail.com'),
(3003, 'CS320', 'ashritha@gmail.com'),
(3003, 'CS520', 'ashritha@gmail.com'),
(3004, 'CS130', 'sheela@gmail.com'),
(3005, 'CS430', 'vani@gmail.com'),
(3009, 'CS310', 'vijethvk11@gmail.com'),
(3009, 'CS320', 'vijethvk11@gmail.com'),
(3010, 'CS530', 'vijethvk11@gmail.com'),
(3011, 'CS510', 'vijethvk11@gmail.com'),
(3012, 'CS320', 'jithendra.jeetu123@gmail.com'),
(3012, 'CS430', 'jithendra.jeetu123@gmail.com'),
(3013, 'CS310', 'vijethvk11@gmail.com'),
(3013, 'CS530', 'vijethvk11@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `option_table`
--

CREATE TABLE `option_table` (
  `qid` int(11) NOT NULL,
  `option_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `option_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option_table`
--

INSERT INTO `option_table` (`qid`, `option_value`, `option_number`) VALUES
(1037, 'Arrays', 4),
(1037, 'Linked lists', 3),
(1037, 'Queues', 2),
(1037, 'Stacks', 1),
(1038, 'Front & Rear ends respectively', 1),
(1038, 'Only Front ends', 3),
(1038, 'Only Rear ends', 4),
(1038, 'Rear & Front ends respectively', 2),
(1039, 'Entity - relationship model', 3),
(1039, 'None of the above', 4),
(1039, 'Object-oriented model', 1),
(1039, 'Relational model', 2),
(1040, 'IP', 2),
(1040, 'SMTP', 1),
(1040, 'TCP', 3),
(1040, 'UDP', 4),
(1041, '0', 1),
(1041, '1', 2),
(1041, '2', 3),
(1041, '3', 4),
(1042, 'int *ip;', 1),
(1042, 'int *pi = 0;', 4),
(1042, 'int i; double* dp = &i;', 3),
(1042, 'string s, *sp = 0;', 2),
(1043, 'Direct addressing', 3),
(1043, 'Immediate addressing', 1),
(1043, 'Register addressing', 2),
(1043, 'Register relative addressing', 4),
(1051, 'Something between -5 and -15', 1),
(1051, 'Something between 15 and 100', 4),
(1051, 'Something between 5 and -5', 2),
(1051, 'Something between 5 and 15', 3),
(1052, 'Node', 4),
(1052, 'Pointer to character', 1),
(1052, 'Pointer to integer', 2),
(1052, 'Pointer to node', 3),
(1053, 'Linked list', 3),
(1053, 'Queue', 2),
(1053, 'Stack', 1),
(1053, 'Tree', 4),
(1054, 'Check \'Predicate\'', 4),
(1054, 'Not null', 1),
(1054, 'Positive', 2),
(1054, 'Unique', 3),
(1055, 'All of the mentioned', 4),
(1055, 'Delete', 1),
(1055, 'Update', 2),
(1055, 'Views', 3),
(1056, 'Insertion &deletion of node takes longer', 3),
(1056, 'None of the above', 4),
(1056, 'Requires more space than singly ll', 2),
(1056, 'We can navigate in both the directions', 1),
(1057, 'int *arr = malloc(r * c * sizeof(int));', 1),
(1057, 'int*arr= (int*)malloc(r*c* sizeof(arr));', 4),
(1057, 'int*arr=(int *)malloc(r*c* sizeof(int));', 2),
(1057, 'int*arr=(int *)malloc(r+c* sizeof(int));', 3),
(1058, 'None of the above', 4),
(1058, 'O(1)', 3),
(1058, 'O(n)', 1),
(1058, 'O(nlogn)', 2),
(1059, 'f', 1),
(1059, 'g', 2),
(1059, 'h', 3),
(1059, 'j', 4),
(1060, 'i', 4),
(1060, 'k4', 2),
(1060, 'k5', 3),
(1060, 'l4', 1),
(1061, 'a', 1),
(1061, 'd', 3),
(1061, 'f', 4),
(1061, 's', 2),
(1062, 'a\'', 3),
(1062, 'a*b', 4),
(1062, 'a+b', 1),
(1062, 'ab', 2),
(1063, 'd', 2),
(1063, 'f', 3),
(1063, 'g', 4),
(1063, 's', 1),
(1064, 'As', 4),
(1064, 'Bb', 1),
(1064, 'Kk', 2),
(1064, 'Ss', 3),
(1065, 'all of the above', 4),
(1065, 'orange', 3),
(1065, 'place', 1),
(1065, 'student', 2),
(1066, 'DB2', 3),
(1066, 'mongodb', 2),
(1066, 'oracle', 1),
(1066, 'oracle and DB2', 4),
(1067, 'a', 1),
(1067, 'b', 2),
(1067, 'c', 3),
(1067, 'd', 4),
(1068, 'pummy', 4),
(1068, 'shivu', 2),
(1068, 'tharun', 1),
(1068, 'vijeth', 3),
(1069, 'kl', 2),
(1069, 'nj', 3),
(1069, 'op', 1),
(1069, 'you', 4),
(1070, 'db2', 3),
(1070, 'mysql', 1),
(1070, 'oracle', 2),
(1070, 'sql server', 4),
(1071, 'boy', 1),
(1071, 'cat', 3),
(1071, 'dog', 2),
(1071, 'girl', 4),
(1072, 'blue', 3),
(1072, 'green', 1),
(1072, 'red', 2),
(1072, 'white', 4),
(1073, 'maruthi', 4),
(1073, 'rama', 1),
(1073, 'ravana', 3),
(1073, 'sitha', 2),
(1074, 'bird', 4),
(1074, 'king', 2),
(1074, 'lion', 3),
(1074, 'tiger', 1),
(1075, 'attribute', 4),
(1075, 'language', 1),
(1075, 'object', 2),
(1075, 'table', 3),
(1076, 'Compiler', 4),
(1076, 'Query', 1),
(1076, 'Relational', 2),
(1076, 'Structural', 3),
(1077, 'both 1 and 3', 4),
(1077, 'db2', 3),
(1077, 'mongodb', 2),
(1077, 'oracle', 1),
(1078, 'a', 1),
(1078, 'b', 2),
(1078, 'c', 3),
(1078, 'd', 4),
(1079, 'Select employee', 4),
(1079, 'Select employee from name', 1),
(1079, 'Select name', 2),
(1079, 'Select name from employee', 3),
(1080, '5', 1),
(1080, '6', 2),
(1080, '8', 3),
(1080, '9', 4),
(1081, 'cvc', 2),
(1081, 'kjkjj', 1),
(1081, 'xdx', 3),
(1081, 'zdz', 4),
(1082, '6', 1),
(1082, '78', 3),
(1082, '8', 2),
(1082, '87', 4),
(1083, 'a', 1),
(1083, 'd', 3),
(1083, 'h', 4),
(1083, 's', 2),
(1084, '6', 1),
(1084, '78', 3),
(1084, '8', 2),
(1084, '87', 4),
(1085, 'a', 1),
(1085, 'd', 3),
(1085, 'h', 4),
(1085, 's', 2),
(1086, '2', 1),
(1086, '4', 2),
(1086, '5', 3),
(1086, '7', 4),
(1087, '0', 2),
(1087, 'u', 3),
(1087, 'y', 1),
(1087, 'z', 4),
(1088, 't', 2),
(1088, 't3', 3),
(1088, 'y', 1),
(1088, 'y4', 4),
(1089, '4', 1),
(1089, '5', 2),
(1089, '6', 3),
(1089, '7', 4),
(1090, 'a1', 1),
(1090, 'a2', 2),
(1090, 'a3', 3),
(1090, 'a4', 4),
(1091, 's1', 1),
(1091, 's2', 2),
(1091, 's3', 3),
(1091, 's4', 4),
(1092, '1', 1),
(1092, '2', 2),
(1092, '3', 3),
(1092, '4', 4),
(1093, 'a1', 1),
(1093, 'a2', 2),
(1093, 'a3', 3),
(1093, 'a4', 4),
(1094, '1', 1),
(1094, '2', 2),
(1094, '3', 3),
(1094, '4', 4),
(1095, 'A1', 1),
(1095, 'A2', 2),
(1095, 'A3', 3),
(1095, 'A4', 4),
(1096, '1', 1),
(1096, '2', 2),
(1096, '3', 3),
(1096, '4', 4),
(1097, 'A1', 1),
(1097, 'A2', 2),
(1097, 'A3', 3),
(1097, 'A4', 4),
(1098, '1', 1),
(1098, '2', 2),
(1098, '3', 3),
(1098, '4', 4),
(1099, 'A1', 1),
(1099, 'A2', 2),
(1099, 'A3', 3),
(1099, 'A4', 4),
(1100, '1', 1),
(1100, '2', 2),
(1100, '3', 3),
(1100, '4', 4),
(1101, 'A1', 1),
(1101, 'A2', 2),
(1101, 'A3', 3),
(1101, 'A4', 4),
(1102, '1', 1),
(1102, '2', 2),
(1102, '3', 3),
(1102, '4', 4),
(1103, 'A1', 1),
(1103, 'A2', 2),
(1103, 'A3', 3),
(1103, 'A4', 4),
(1104, '1', 1),
(1104, '2', 2),
(1104, '3', 3),
(1104, '4', 4),
(1105, 'a1', 1),
(1105, 'a2', 2),
(1105, 'a3', 3),
(1105, 'a4', 4),
(1106, '1', 1),
(1106, '2', 2),
(1106, '3', 3),
(1106, '4', 4),
(1107, 'a1', 1),
(1107, 'a2', 2),
(1107, 'a3', 3),
(1107, 'a4', 4),
(1108, '1', 1),
(1108, '2', 2),
(1108, '3', 3),
(1108, '4', 4),
(1109, 'a1', 1),
(1109, 'a2', 2),
(1109, 'a3', 3),
(1109, 'a4', 4),
(1110, '1', 1),
(1110, '2', 2),
(1110, '3', 3),
(1110, '4', 4),
(1111, 'a1', 1),
(1111, 'a2', 2),
(1111, 'a3', 3),
(1111, 'a4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `qid` int(11) NOT NULL,
  `question` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`qid`, `question`, `teacher_id`, `test_id`) VALUES
(1037, 'Which of the following is not a derived data structure?', 3001, 1),
(1038, 'From where does the insertion and deletion of elements get accomplished in Queues?', 3001, 1),
(1039, 'Which one of the following is a valid record-based data model?', 3001, 2),
(1040, 'Which of the following transport layer protocols is used to support electronic mail?', 3002, 3),
(1041, 'Rank of the matrix A =\r\n\r\n 	\r\n0	0	0	0\r\n4	2	3	0\r\n1	0	0	0\r\n4	0	3	0\r\n \r\n', 3003, 4),
(1042, 'Which of the following is illegal?', 3004, 5),
(1043, 'The instruction, MOV AX, 0005H belongs to the address mode', 3005, 6),
(1051, 'What is the value of the postfix expression 6 3 2 4 + – * :', 3001, 7),
(1052, 'In linked list each node contain minimum of two fields. One field is data field to store the data second field is?', 3001, 1),
(1053, 'Which data structure can be used suitably to solve the Tower of Hanoi problem?', 3001, 1),
(1054, 'Which of the following is not a integrity constraint ?', 3001, 2),
(1055, 'Trigger are not supported in', 3001, 2),
(1056, ' Which of the following is false about a doubly linked list?', 3001, 7),
(1057, 'How do you allocate a matrix using a single pointer in C?', 3001, 7),
(1058, 'What is the time complexity of searching for an element in a circular linked list?', 3001, 7),
(1059, 'vbvbv', 3001, 1052),
(1060, 'ghgh', 3001, 1052),
(1061, 'ghg', 3001, 1052),
(1062, 'Give the Representaion Of Logical AND', 3005, 1053),
(1063, 'fgg', 3005, 1054),
(1064, 'Afaf', 3012, 1056),
(1065, 'which are the example of object ?', 3004, 1057),
(1066, 'which is an example of relational Database', 3001, 1058),
(1067, 'what is it?', 3001, 1059),
(1068, 'bnbn', 3001, 1060),
(1069, 'lklk', 3001, 1060),
(1070, 'which of these are ORDBMS ?', 3001, 1061),
(1071, 'who is pummy?', 3001, 1063),
(1072, 'what is color leaf?', 3001, 1063),
(1073, 'what is your name ?', 3001, 1064),
(1074, 'who are you ?', 3001, 1065),
(1075, 'what is sql?', 3001, 1066),
(1076, ' Using which language can a user request information from a database ?', 3001, 1067),
(1077, 'which are the relational databases.', 3001, 1068),
(1078, 'fhkfdkjdfkj', 3001, 1069),
(1079, 'Which of these query will display the the table given above ?', 3001, 1070),
(1080, 'jljlljhjh', 3001, 1072),
(1081, 'ghghg', 3001, 1072),
(1082, 'what pop', 3001, 1073),
(1083, 'jkjkj', 3001, 1073),
(1084, 'what pop', 3001, 1073),
(1085, 'jkjkj', 3001, 1073),
(1086, 'lklkl', 3001, 1073),
(1087, 'vgvg', 3001, 1073),
(1088, 'uyuyu', 3001, 1073),
(1089, 'sdfdgfg', 3001, 1073),
(1090, 'lpopop', 3001, 1073),
(1091, 'gffdf', 3001, 1073),
(1092, 'oioio', 3001, 1073),
(1093, 'yiiyiyi', 3001, 1073),
(1094, 'wewew', 3001, 1073),
(1095, 'IOIP', 3001, 1073),
(1096, 'DSGDSG', 3001, 1073),
(1097, 'JGJGJ', 3001, 1073),
(1098, 'FSDHFSK', 3001, 1073),
(1099, 'HGHG', 3001, 1073),
(1100, 'SDGJSD', 3001, 1073),
(1101, 'IUO', 3001, 1073),
(1102, 'LKLK', 3001, 1073),
(1103, 'GHH', 3001, 1073),
(1104, 'JKKL', 3001, 1073),
(1105, 'hgh', 3001, 1073),
(1106, 'hkjhk', 3001, 1073),
(1107, 'klk', 3001, 1073),
(1108, 'popp', 3001, 1073),
(1109, 'hghcd', 3001, 1073),
(1110, 'popp', 3001, 1073),
(1111, 'hghcd', 3001, 1073);

-- --------------------------------------------------------

--
-- Table structure for table `Semester`
--

CREATE TABLE `Semester` (
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Semester`
--

INSERT INTO `Semester` (`sem`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Student_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sem` int(11) NOT NULL,
  `Password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `activate` int(11) NOT NULL DEFAULT 0,
  `dept_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `verify` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Student_id`, `Name`, `sem`, `Password`, `email`, `status`, `activate`, `dept_name`, `verify`) VALUES
('01JCCS117', 'Tyrion lanister', 3, 'jeffeery', 'tyrion@live.com', 1, 0, 'Computer Science', ''),
('01JCCS54', 'samson', 5, 'qwerty', 'sam@yahoo.com', 1, 1, 'Computer Science', ''),
('01JCME00', 'Jammie', 7, 'zxcvb', 'jammie@gmail.com', 1, 0, 'Mechanical Engineering', ''),
('01JS65', 'Rob', 2, 'ASDF', 'Rob@yahoo.in', 1, 0, 'Electrical Engineering', ''),
('01JSt16CS075', 'pummy', 4, 'qwerty', 'pramodn1998@gmail.com', 1, 1, 'Computer Science', '63e48a054f6538e187641d4bebc10b'),
('01JST16CS114', 'tharunms', 5, 'tharun123', 'tharunms98@gmail.com', 1, 0, 'Computer Science', '70a8231a9ad2d8b91aa869dba6e375'),
('01JST17CS09', 'Jasey Pinkman', 3, 'pinkman123', 'jasey11@gmail.com', 1, 0, 'Computer Science', ''),
('01NIE12', 'kl', 2, 'qwerty', 'jkjk@gmail.com', 1, 0, 'Electronics & Communication', ''),
('jjkj', 'jk', 2, 'asdf', 'klkl@gmamil.coom', 1, 0, 'Electronics & Communication', ''),
('JST1004', 'Danaerys', 3, 'dan123', 'mod@gmail.com', 1, 1, 'Computer Science', ''),
('JST1005', 'Jennifer Aniston', 5, 'jenny123', 'jenny@gmail.com', 1, 1, 'Computer Science', ''),
('JST1006', 'Tony Stark', 5, 'tony123', 'tony@gmail.com', 1, 1, 'Computer Science', ''),
('JST1010', 'shanthims', 5, 'shanthims', 'vijayshanthims@gmail.com', 1, 1, 'Computer Science', '46d8dde676edda4a12cda52ee22a82'),
('JST1011', 'dushyantha', 5, 'dush123', 'koto@idx4.com', 1, 1, 'Computer Science', 'c1182ea9416df39730030de7b818d9');

-- --------------------------------------------------------

--
-- Table structure for table `Student_answer`
--

CREATE TABLE `Student_answer` (
  `Test_id` int(11) NOT NULL,
  `Qid` int(11) NOT NULL,
  `Student_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `choice` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Student_answer`
--

INSERT INTO `Student_answer` (`Test_id`, `Qid`, `Student_id`, `choice`) VALUES
(1, 1037, '01JCCS117', 'Arrays'),
(1, 1037, '01JST17CS09', 'Queues'),
(1, 1037, 'JST1004', 'Linked Lists'),
(1, 1038, '01JCCS117', 'Rear & Front ends respectively'),
(1, 1038, 'JST1004', 'Rear & Front ends respectively'),
(1, 1052, '01JCCS117', 'Node'),
(1, 1052, '01JST17CS09', 'Node'),
(1, 1052, 'JST1004', 'Pointer to node'),
(1, 1053, '01JCCS117', 'Stack'),
(1, 1053, '01JST17CS09', 'Stack'),
(1, 1053, 'JST1004', 'Stack'),
(2, 1039, '01JCCS54', 'Relational model'),
(2, 1039, 'JST1006', 'Relational model'),
(2, 1039, 'JST1010', 'Object-oriented model'),
(2, 1039, 'JST1011', 'Relational model'),
(2, 1054, '01JCCS54', 'Positive'),
(2, 1054, 'JST1005', 'Positive'),
(2, 1054, 'JST1006', 'Unique'),
(2, 1054, 'JST1010', 'Positive'),
(2, 1054, 'JST1011', 'Positive'),
(2, 1055, '01JCCS54', 'Views'),
(2, 1055, 'JST1005', 'All of the mentioned'),
(2, 1055, 'JST1006', 'All of the mentioned'),
(2, 1055, 'JST1010', 'Delete'),
(2, 1055, 'JST1011', 'Views'),
(6, 1043, '01JSt16CS075', 'Direct addressing'),
(7, 1051, '01JCCS117', 'Something between 5 and 15'),
(7, 1051, '01JST17CS09', 'Something between 5 and 15'),
(7, 1051, 'JST1004', 'Something between 5 and 15'),
(7, 1056, '01JCCS117', 'Insertion &deletion of node takes longer'),
(7, 1056, '01JST17CS09', 'None of the above'),
(7, 1056, 'JST1004', 'None of the above'),
(7, 1057, '01JCCS117', 'int*arr= (int*)malloc(r*c* sizeof(arr));'),
(7, 1057, '01JST17CS09', 'int*arr=(int *)malloc(r+c* sizeof(int));'),
(7, 1057, 'JST1004', 'int*arr=(int *)malloc(r+c* sizeof(int));'),
(7, 1058, '01JCCS117', 'O(n)'),
(7, 1058, '01JST17CS09', 'O(n)'),
(7, 1058, 'JST1004', 'O(n)'),
(1067, 1076, 'JST1005', 'Compiler'),
(1068, 1077, '01JCCS54', 'both 1 and 3');

-- --------------------------------------------------------

--
-- Table structure for table `Student_result`
--

CREATE TABLE `Student_result` (
  `sid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL,
  `time_taken` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_q_ansd` int(11) NOT NULL,
  `total_qs` int(11) NOT NULL,
  `marks_obt` int(11) NOT NULL,
  `max_marks` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Student_result`
--

INSERT INTO `Student_result` (`sid`, `test_id`, `time_taken`, `total_q_ansd`, `total_qs`, `marks_obt`, `max_marks`, `start_time`, `end_time`) VALUES
('01JCCS117', 1, '2018-11-11 00:02:00', 4, 4, 15, 20, '2018-11-11 00:00:00', '2018-11-11 00:02:00'),
('01JST17CS09', 1, '2018-11-11 00:04:00', 3, 4, 5, 20, '2018-11-11 00:00:00', '2018-11-11 00:04:00'),
('JST1004', 1, '2018-11-11 00:03:00', 4, 4, 15, 20, '2018-11-11 00:00:00', '2018-11-11 00:03:00'),
('01JCCS117', 7, '2018-11-11 00:01:00', 4, 4, 1, 4, '2018-11-11 00:00:00', '2018-11-11 00:01:00'),
('01JST17CS09', 7, '2018-11-11 00:04:00', 4, 4, 2, 4, '2018-11-11 00:00:00', '2018-11-11 00:04:00'),
('JST1004', 7, '2018-11-11 00:03:00', 4, 4, 2, 4, '2018-11-11 00:00:00', '2018-11-11 00:03:00'),
('01JSt16CS075', 6, '2018-11-12 10:08:27', 1, 1, 1, 1, '2018-11-12 15:38:15', '2018-11-12 15:38:27'),
('JST1005', 1067, '2018-11-14 08:53:37', 1, 1, 0, 1, '2018-11-14 14:23:29', '2018-11-14 14:23:37'),
('01JCCS54', 1068, '2018-11-14 09:38:02', 1, 1, 1, 1, '2018-11-14 15:07:50', '2018-11-14 15:08:02'),
('JST1010', 2, '2018-11-15 02:20:08', 3, 3, 1, 3, '2018-11-15 07:49:29', '2018-11-15 07:50:08'),
('JST1011', 2, '2018-11-15 12:10:34', 3, 3, 3, 3, '2018-11-15 17:39:23', '2018-11-15 17:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_take`
--

CREATE TABLE `student_take` (
  `sid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_take`
--

INSERT INTO `student_take` (`sid`, `test_id`) VALUES
('JST1005', 1066),
('JST1005', 1067),
('01JCCS54', 1068),
('01JCCS54', 1069),
('JST1005', 1070),
('01JCCS54', 1070),
('JST1010', 2),
('JST1011', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `Sub_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sem` int(11) NOT NULL,
  `dept_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`Sub_code`, `Sub_name`, `sem`, `dept_name`) VALUES
('CS110', 'Discrete Maths', 1, 'Computer Science'),
('CS120', 'ANSI C', 1, 'Computer Science'),
('CS130', 'Prog. in C++', 1, 'Computer Science'),
('CS210', 'Operating systems', 2, 'Computer Science'),
('CS220', 'Maths 2', 2, 'Computer Science'),
('CS230', 'Intro to python', 2, 'Computer Science'),
('CS310', 'Data Structures', 3, 'Computer Science'),
('CS320', 'Maths 3', 3, 'Computer Science'),
('CS330', 'Computer Org', 3, 'Computer Science'),
('CS410', 'Algorithms', 4, 'Computer Science'),
('CS420', 'Maths 4', 4, 'Computer Science'),
('CS430', 'Microprocessors', 4, 'Computer Science'),
('CS510', 'DBMS', 5, 'Computer Science'),
('CS520', 'Linear algebra', 5, 'Computer Science'),
('CS530', 'Unix sys. prog.', 5, 'Computer Science'),
('CS610', 'Data mining', 6, 'Computer Science'),
('CS620', 'Computer networks', 6, 'Computer Science'),
('CS630', 'Neural nets', 6, 'Computer Science'),
('CS710', 'Computer Arch.', 7, 'Computer Science'),
('CS720', 'Hadoop', 7, 'Computer Science'),
('CS730', 'Probability', 7, 'Computer Science'),
('CS810', 'Cloud computing', 8, 'Computer Science'),
('CS820', 'IOT', 8, 'Computer Science'),
('CS830', 'NLP', 8, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `teacher_id` int(11) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`teacher_id`, `password`, `name`, `email`, `status`) VALUES
(3001, 'manimala123', 'Manimala', 'manimala@gmail.com', 1),
(3002, 'anil123', 'Anil Kumar', 'anil@gmail.com', 1),
(3004, 'sheela123', 'Sheela', 'sheela@gmail.com', 1),
(3005, 'vani123', 'Vani Ashok', 'vani@gmail.com', 1);

--
-- Triggers `Teacher`
--
DELIMITER $$
CREATE TRIGGER `teacher_delete` AFTER DELETE ON `Teacher` FOR EACH ROW BEGIN
   
   INSERT INTO teacher_backup(teacher_id,password,name,email,status)
   VALUES(OLD.teacher_id,OLD.password,OLD.name,OLD.email,OLD.status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backup`
--

CREATE TABLE `teacher_backup` (
  `teacher_id` int(11) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_backup`
--

INSERT INTO `teacher_backup` (`teacher_id`, `password`, `name`, `email`, `status`) VALUES
(3008, 'asdf', 'vijeth', 'vijethvk11@gmail.com', 1),
(3009, 'qwerty', 'vijeth', 'vijethvk11@gmail.com', 1),
(3010, 'asdf', 'Ramchandra', 'vijethvk11@gmail.com', 1),
(3011, 'asdf', 'Ramchandra', 'vijethvk11@gmail.com', 1),
(3012, 'kohli', 'Rohit', 'jithendra.jeetu123@gmail.com', 1),
(3013, 'qwerty', 'Divakar', 'vijethvk11@gmail.com', 1),
(3003, 'ashrihta123', 'Ashritha R Murthy', 'ashritha@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Test_details`
--

CREATE TABLE `Test_details` (
  `test_id` int(11) NOT NULL,
  `Sub_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `test_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `tag` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `total_marks` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a',
  `tid` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 1,
  `total_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Test_details`
--

INSERT INTO `Test_details` (`test_id`, `Sub_code`, `test_name`, `time`, `tag`, `total_marks`, `description`, `tid`, `status_id`, `state`, `total_questions`) VALUES
(1, 'CS310', 'Data Sturctures-1', 5, 'ds1', 5, 'Know about fundamentals of data structures', 3001, 0, 1, 2),
(2, 'CS510', 'DBMS-1', 5, 'db1', 5, 'introduction to databases', 3001, 0, 1, 1),
(3, 'CS620', 'CN-1', 5, 'cn1', 1, 'All about transport layer', 3002, 0, 1, 1),
(4, 'CS520', 'Linear algebra-1', 5, 'la1', 2, 'Finding rank of the matrix', 3003, 0, 1, 1),
(5, 'CS130', 'C plus plus-1', 5, 'cpp1', 1, 'Understanding pointers', 3004, 1, 1, 1),
(6, 'CS430', 'Microprocessor-1', 5, 'mp1', 1, 'Introduction to addressing modes', 3005, 1, 1, 1),
(7, 'CS310', 'Data Structures-2', 5, 'ds2', 1, 'dealing with expressions', 3001, 0, 1, 1),
(1053, 'CS510', 'Digital Design', 1, 'LD', 5, 'digital', 3005, 0, 1, 1),
(1055, 'CS320', 'Statistics', 1, 'Stats', 5, 'Ggh', 3012, 0, 1, 1),
(1056, 'CS320', 'Statistics', 1, 'Stats', 5, 'Ggh', 3012, 0, 1, 1),
(1057, 'CS130', 'C ++ - 2', 5, 'c++', 5, 'klkl', 3004, 0, 1, 1),
(1067, 'CS510', 'DBMS-10', 5, 'DB', 5, 'asdf', 3001, 1, 1, 1),
(1068, 'cs510', 'dbmslab2', 2, 'gsah', 5, 'take the quiz.', 3001, 1, 1, 1),
(1073, 'CS510', 'pkpopop', 5, 'hjj', 15, 'jkjkpo', 3001, 0, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Correct_answer`
--
ALTER TABLE `Correct_answer`
  ADD PRIMARY KEY (`qid`,`correct_option`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`dept_name`);

--
-- Indexes for table `handles`
--
ALTER TABLE `handles`
  ADD PRIMARY KEY (`tid`,`sub_code`);

--
-- Indexes for table `option_table`
--
ALTER TABLE `option_table`
  ADD PRIMARY KEY (`qid`,`option_value`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`qid`),
  ADD UNIQUE KEY `qid` (`qid`),
  ADD KEY `tckey` (`teacher_id`);

--
-- Indexes for table `Semester`
--
ALTER TABLE `Semester`
  ADD PRIMARY KEY (`sem`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `ddkey` (`dept_name`),
  ADD KEY `skey` (`sem`);

--
-- Indexes for table `Student_answer`
--
ALTER TABLE `Student_answer`
  ADD UNIQUE KEY `Test_id` (`Test_id`,`Qid`,`Student_id`) USING BTREE,
  ADD KEY `q1key` (`Qid`),
  ADD KEY `sssskey` (`Student_id`);

--
-- Indexes for table `Student_result`
--
ALTER TABLE `Student_result`
  ADD KEY `ssskey` (`sid`),
  ADD KEY `tttkey` (`test_id`);

--
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`Sub_code`),
  ADD UNIQUE KEY `Sub_code` (`Sub_code`),
  ADD KEY `dkey` (`dept_name`),
  ADD KEY `sskey` (`sem`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `Test_details`
--
ALTER TABLE `Test_details`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `Sub_code` (`Sub_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3014;

--
-- AUTO_INCREMENT for table `Test_details`
--
ALTER TABLE `Test_details`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1074;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Correct_answer`
--
ALTER TABLE `Correct_answer`
  ADD CONSTRAINT `q2key` FOREIGN KEY (`qid`) REFERENCES `Questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `option_table`
--
ALTER TABLE `option_table`
  ADD CONSTRAINT `okey` FOREIGN KEY (`qid`) REFERENCES `Questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `ddkey` FOREIGN KEY (`dept_name`) REFERENCES `Department` (`dept_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skey` FOREIGN KEY (`sem`) REFERENCES `Semester` (`sem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student_answer`
--
ALTER TABLE `Student_answer`
  ADD CONSTRAINT `q1key` FOREIGN KEY (`Qid`) REFERENCES `Questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sssskey` FOREIGN KEY (`Student_id`) REFERENCES `Student` (`Student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tkey` FOREIGN KEY (`Test_id`) REFERENCES `Test_details` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student_result`
--
ALTER TABLE `Student_result`
  ADD CONSTRAINT `ssskey` FOREIGN KEY (`sid`) REFERENCES `Student` (`Student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tttkey` FOREIGN KEY (`test_id`) REFERENCES `Test_details` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD CONSTRAINT `dkey` FOREIGN KEY (`dept_name`) REFERENCES `Department` (`dept_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sskey` FOREIGN KEY (`sem`) REFERENCES `Semester` (`sem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Test_details`
--
ALTER TABLE `Test_details`
  ADD CONSTRAINT `Test_details_ibfk_1` FOREIGN KEY (`Sub_code`) REFERENCES `Subjects` (`Sub_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
