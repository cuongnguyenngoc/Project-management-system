-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 03:10 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Job` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`, `level`, `birthday`, `address`, `Job`) VALUES
(1, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '1986-04-14', 'Quận Thanh xuân, Hà Nội', 'Giáo Vụ');

-- --------------------------------------------------------

--
-- Table structure for table `assign_project`
--

CREATE TABLE IF NOT EXISTS `assign_project` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `fk_PhanCong_GiangVien1_idx` (`teacher_id`),
  KEY `fk_PhanCong_SinhVien1_idx` (`student_id`),
  KEY `Assign_id` (`assign_id`),
  KEY `Student_id_2` (`student_id`),
  KEY `Assign_id_2` (`assign_id`),
  KEY `Teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `assign_project`
--

INSERT INTO `assign_project` (`assign_id`, `student_id`, `teacher_id`, `time`, `isConfirmed`) VALUES
(19, 1, 11, '2015-05-26 19:49:50', 0),
(20, 15, 19, '2015-05-26 19:55:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `institue_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`),
  KEY `fk_Lop_KhoaVien1_idx` (`institue_id`),
  KEY `Class_ID` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `institue_id`) VALUES
(1, 'CNTT 2.02', 1),
(2, 'CNTT2.01', 1),
(3, 'CNTT2.03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `course_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `year`, `course_name`) VALUES
(1, 2012, 'Khóa 57'),
(2, 2011, 'Khóa 56'),
(3, 2010, 'Khóa 55'),
(4, 2013, 'Khóa 58'),
(5, 2014, 'Khóa 59');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
  `degree_id` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `student_limited` int(11) NOT NULL,
  PRIMARY KEY (`degree_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `job`, `student_limited`) VALUES
(1, 'Tiến Sĩ', 6),
(2, 'Giảng Viên', 4),
(3, 'Giáo Sư', 8),
(4, 'Phó Giáo Sư', 7),
(5, 'Thạc Sĩ', 5),
(6, 'Kỹ Sư', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `institue_id` int(11) NOT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `fk_BoMon_KhoaVien_idx` (`institue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `institue_id`) VALUES
(1, 'Công Nghệ Phần Mềm', 1),
(2, 'Hệ Thống Thông Tin', 1),
(3, 'Khoa Học Máy Tính', 1),
(4, 'Kỹ Thuật Máy Tính', 1),
(5, 'Truyền Thông và Mạng Máy Tính', 1),
(6, 'Trung Tâm Máy Tính ', 1),
(7, 'Dự Án Hedspi', 1),
(8, 'Cơ Học Ứng Dụng', 3),
(9, 'Công Nghệ Chế Tạo Máy', 3),
(10, 'Cơ Học Vật Liệu và Kết Cấu', 3),
(11, 'Hệ Thống Viễn Thông', 2),
(12, 'Kĩ Thuật Thông Tin ', 2),
(13, 'ĐT Hàng Không-Vũ Trụ', 2),
(14, 'Mạch & Xử Lý Tín Hiệu', 2),
(15, 'Công Nghệ Môi Trường', 4),
(16, 'Quản Lý Môi Trường', 4),
(17, 'Công Nghệ Hữu Cơ Hóa Dầu', 5),
(18, 'Công Nghệ Xenluloza - Giấy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `expectation`
--

CREATE TABLE IF NOT EXISTS `expectation` (
  `expect_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `isConfirmed` bit(1) DEFAULT NULL,
  PRIMARY KEY (`expect_id`,`student_id`),
  KEY `fk_Expectation_student1_idx` (`student_id`),
  KEY `fk_Expectation_Teacher1_idx` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupnews`
--

CREATE TABLE IF NOT EXISTS `groupnews` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `fk_GroupNews_Administrator1_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `new_id` int(11) NOT NULL,
  PRIMARY KEY (`img_id`),
  KEY `fk_HinhAnh_TinTuc1_idx` (`new_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `institue`
--

CREATE TABLE IF NOT EXISTS `institue` (
  `institue_id` int(11) NOT NULL AUTO_INCREMENT,
  `institue_Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`institue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `institue`
--

INSERT INTO `institue` (`institue_id`, `institue_Name`, `description`) VALUES
(1, 'Công Nghệ Thông Tin và Truyền Thông', 'Khoa Công nghệ Thông tin - Trường ĐHBK HN, một trong 7 khoa CNTT trọng điểm của cả nước được thành lập vào tháng 3/1995. Đến nay, qua gần 15 năm phấn '),
(2, 'Điện Tử Viễn Thông', 'Viện Điện tử - Viễn thông có trên 118 cán bộ, giảng viên. Trong đó, số cán bộ giảng dạy là 80 đều có trình độ trên đại học, với 13 PGS và 45 Tiến sỹ. '),
(3, 'Cơ Khí', 'Viện Cơ khí, Đại học Bách Khoa Hà Nội hiện đào tạo 03 nhóm ngành: Kỹ thuật cơ khí, Kỹ thuật cơ điện tử và Cơ học kỹ thuật. Trong đó, nhóm ngành Kỹ thu'),
(4, 'Khoa Học và Công Nghệ Môi Trường', 'Viện Khoa học và Công nghệ Môi trường (INEST) được xây dựng và phát triển từ một nhóm chuyên đề về Kỹ thuật Bảo vệ Môi trường, thuộc Khoa Công nghệ Hó'),
(5, 'Kỹ Thuật Hóa Học', 'Viện Kỹ thuật Hóa học được thành lập theo quyết định số 2517/QĐ-ĐHBK-TCCB ngày 29 tháng 12 năm 2010 trên cơ sở Khoa Công nghệ Hoá học  (được thành lập');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `new_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `new_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_on` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`new_id`),
  KEY `fk_TinTuc_NhomTinTuc1_idx` (`group_id`),
  KEY `fk_news_Administrator1_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `project_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `dept_id` (`dept_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `fk_SinhVien_Lop1_idx` (`class_id`),
  KEY `fk_SinhVien_KhoaHoc1_idx` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `class_id`, `course_id`, `student_name`, `email`, `password`, `level`, `birthday`, `address`) VALUES
(1, 1, 1, 'Nguyễn Ngọc Cường', 'ngoccuongbka94@gmail.com', 'b7e9e518dcaed7a7621ead5d7959937475b4a22e', 3, '1994-08-20', 'số nhà 18 ngõ 50 phố Kim Hoa quận Đống Đa Hà Nội'),
(2, 1, 1, 'Lê Xuân Duy', 'duy94@gmail.com', 'c1bc357d0852c16146495a5ceb8c1057178b6b56', 3, '1994-02-05', 'Hải Dương'),
(3, 1, 1, 'Trịnh Hải Nam', 'namtrinhhai93@gmail.com', 'c12692d79b288fe54ad3e4fc79ea517c04364b64', 3, '1994-01-02', 'Nghệ An'),
(10, 1, 1, 'Ngô Văn Linh', 'ngovan@gmail.com', '699355f4818230417592fe6961402e2c9b94ceb3', 3, '0000-00-00', 'Hà Nội'),
(12, 1, 1, 'Ngô Văn Linh', 'ngovanlinh13@gmail.com', '78d4cf42e239f4787f5f621d4acd2c1f9011ff61', 3, '0000-00-00', 'Hà Nội'),
(13, 2, 1, 'Trần Văn Hùng', 'hung123@gmail.com', '62c10405f6c30dc35e226db26715092d12479eaa', 3, '0000-00-00', 'Hà Nội'),
(14, 1, 1, 'Nguyễn Văn Nam', 'trinhhainam95@gmail.com', '2536c75af33b2565842e02dcae35b60fc46b4016', 3, '1994-02-05', 'Hà Nội'),
(15, 1, 1, 'Nguyễn Văn Cường', 'nguyenvancuong94@gmail.com', '2908e3054e8882973e8861d800182c6d544fb52e', 3, '1994-01-12', 'Hà Nội'),
(25, 1, 1, 'Cuong', 'cuong94@gmail.com', '039c501ac8dfcac91c6f05601cee876e1cc07e17', 3, '1994-08-20', 'dsfsdfsd'),
(26, 1, 1, 'Cuong', 'ngoccuongcntt94@gmail.com', 'b7e9e518dcaed7a7621ead5d7959937475b4a22e', 3, '1994-02-01', 'sdgfsjkdg'),
(27, 1, 1, 'Cuong Nguyen ngoc', 'ngoccuong94@gmail.com', '2908e3054e8882973e8861d800182c6d544fb52e', 3, '1994-02-03', 'Hà Nội'),
(28, 2, 1, 'Cuong Ngoc Nguyen ', 'ngoccuong93@gmail.com', 'c579802391564450cd19250f5ce88ccacf7a08c2', 3, '1994-02-08', 'Nghệ An'),
(29, 1, 1, 'Nguyễn Bá Ngọc', 'nguyenbangoc94@gmail.com', '608bd3bc09a1a729dff9b58a70851fdb64203403', 3, '2004-02-03', 'Hà Tĩnh');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `teacher_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `trend_research` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `Email_UNIQUE` (`email`),
  KEY `fk_GiangVien_BoMon1_idx` (`dept_id`),
  KEY `id` (`degree_id`),
  KEY `degree_id` (`degree_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `dept_id`, `degree_id`, `teacher_name`, `password`, `level`, `trend_research`, `address`, `email`, `phonenumber`) VALUES
(11, 1, 5, 'Nguyễn Thị Thu Huyền', 'dsfsdfsdf', 2, 'hjdfhjskdhfjksdhfkjsdhjfhdsjfhkjsdhkfjw.sdf sjkdhfjdsfhks. hsfjsdhfjsdhfkjhdskjfhkjsdhfkjsdhfjkdshf. fhdsjfhdsjhfjdshfjsdhkfjhdskjfhsdkjhfkjdshfjsdhfjhdsjfhksdjhfjsdhfkj.jkhfkjds sjdfhksdjhfjksdhfj', 'Phòng 601 nhà B1', 'trangntt@soict.hust.edu.vn', ' + 3 8 68 2595'),
(12, 1, 5, 'Nguyễn Phi Lê', '5eaddcd848392e4a426b84a2bc000f47bb191e46', 2, '', 'Phòng 601 nhà B1', 'lenp@soict.hust.edu.vn', '+ 3 8 68 2595'),
(14, 1, 5, 'Nguyễn Tiến Thành', 'b7f7f91956a7aae54fc6160baa067e38dbdb9812', 2, '', 'Phòng 601 nhà B1', 'nguyenthanh@soict.hust.edu.vn', '+ 3 8 68 2595'),
(15, 1, 5, 'Nguyễn Ngọc Dũng ', 'c0b23ab96d27916a824c23d16ffb2a54055f3d3c', 2, '', 'Phòng 601 nhà B1', 'dungnn@soict.hust.edu.vn', '+ 3 8 68 2595'),
(17, 1, 6, 'Nguyễn Mạnh Tuấn ', 'tuan171', 2, '', 'Phòng 601 nhà B1', 'tuannm@soict.hust.edu.vn', '+ 3 8 68 2595'),
(18, 1, 5, 'Lê Thị Hoa', 'hoa181', 2, '', 'Phòng 601 nhà B1', 'hoalt@soict.hust.edu.vn', '+ 3 8 68 2595'),
(19, 1, 1, 'Cao Tuấn Dũng', '0d758f8a038bf53b146610e8831bed9685c9a784', 2, 'sjdfhksdjhfjksdhfj', 'Phòng 602 Nhà B1', 'dungct@soict.hust.edu.vn', '+387739753 ');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL,
  `start` varchar(20) NOT NULL,
  `end` varchar(20) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `start`, `end`) VALUES
(1, '4 February 2015', '13 September 2015');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_project`
--
ALTER TABLE `assign_project`
  ADD CONSTRAINT `fk_Assign_Student` FOREIGN KEY (`Student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Assign_Teacher` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher` (`Teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_Class_Institue` FOREIGN KEY (`Institue_ID`) REFERENCES `institue` (`Institue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_Dept_Institue` FOREIGN KEY (`Institue_id`) REFERENCES `institue` (`Institue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expectation`
--
ALTER TABLE `expectation`
  ADD CONSTRAINT `fk_Expectation_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Expectation_Teacher1` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher` (`Teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groupnews`
--
ALTER TABLE `groupnews`
  ADD CONSTRAINT `fk_GroupNews_Administrator1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image_new` FOREIGN KEY (`New_id`) REFERENCES `news` (`New_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_Administrator1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_New_GroupNew` FOREIGN KEY (`Group_id`) REFERENCES `groupnews` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_class` FOREIGN KEY (`Class_id`) REFERENCES `class` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_course` FOREIGN KEY (`Course_id`) REFERENCES `course` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_Teacher_Degree` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_Dept` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
