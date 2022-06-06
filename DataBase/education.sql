-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 مايو 2022 الساعة 22:07
-- إصدار الخادم: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `admin_eml` varchar(50) NOT NULL,
  `admin_psrd` varchar(38) NOT NULL,
  `admin_img` text NOT NULL DEFAULT '../../assets/userimages/user.png',
  `admin_id` int(11) NOT NULL,
  `username` varchar(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`admin_eml`, `admin_psrd`, `admin_img`, `admin_id`, `username`) VALUES
('mmoh33650@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '../../assets/usersimages/user.png', 1, 'Mohamed Reda');

-- --------------------------------------------------------

--
-- بنية الجدول `classes`
--

CREATE TABLE `classes` (
  `class_code` varchar(6) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `classes`
--

INSERT INTO `classes` (`class_code`, `class_name`) VALUES
('as#@as', 'First team'),
('S#e@c', 'Second team'),
('0124hk', 'Third team');

-- --------------------------------------------------------

--
-- بنية الجدول `exam`
--

CREATE TABLE `exam` (
  `exam_id` varchar(16) NOT NULL,
  `exam_name` varchar(16) NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `exam_create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exam_time_limit` int(11) NOT NULL,
  `exam_mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `exam_student_grade`
--

CREATE TABLE `exam_student_grade` (
  `exam_id` varchar(16) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `grade` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `questions`
--

CREATE TABLE `questions` (
  `que_id` varchar(16) NOT NULL,
  `exam_id` varchar(16) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `choice1` varchar(1000) NOT NULL DEFAULT '""',
  `choice2` varchar(1000) NOT NULL DEFAULT '""',
  `choice3` varchar(1000) NOT NULL DEFAULT '""',
  `choice4` varchar(1000) NOT NULL DEFAULT '""',
  `answer` varchar(1000) NOT NULL,
  `exam_status` int(2) NOT NULL DEFAULT 0,
  `que_mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_eml` varchar(50) NOT NULL,
  `stu_psrd` varchar(38) NOT NULL,
  `stu_nm` varchar(50) NOT NULL,
  `stu_adrs` varchar(50) NOT NULL,
  `stu_phone` varchar(15) NOT NULL,
  `stu_img` text NOT NULL DEFAULT '../../assets/usersimages/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`stu_id`, `stu_eml`, `stu_psrd`, `stu_nm`, `stu_adrs`, `stu_phone`, `stu_img`) VALUES
(8, 'mmoh3312650@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', '', '01212745939', '../../assets/usersimages/user.png'),
(3, 'mmoh3360150@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', '', '01212745939', '../../assets/usersimages/user.png'),
(7, 'mmoh3365012@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Mohamed Reda', '', '01212745939', '../../assets/usersimages/3.jpg'),
(13, 'mmoh33650@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'yousef ahmed', '', '01212745939', '../../assets/usersimages/user.png'),
(12, 'mmoh3365100@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Mohamed Reda', '', '01212745939', '../../assets/usersimages/user.png'),
(11, 'mmoh3365110@gmail.com', 'ce26b2d514efe35b3189f20c51570f98', 'Mohamed Yousef', '', '01212745939', '../../assets/usersimages/e828720929498bf852a0ffa01dfcef80.jpg'),
(6, 'mmoh3365450@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ahmed Reda', '', '01212745939', '../../assets/usersimages/user.png'),
(10, 'mohmoh33650@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Mohamed Reda', '', '01212745939', '../../assets/usersimages/user.png');

-- --------------------------------------------------------

--
-- بنية الجدول `student_request`
--

CREATE TABLE `student_request` (
  `stu_id` int(11) NOT NULL,
  `stu_eml` varchar(50) NOT NULL,
  `stu_psrd` varchar(38) NOT NULL,
  `stu_nm` varchar(50) NOT NULL,
  `stu_adrs` varchar(50) NOT NULL,
  `stu_phone` varchar(15) NOT NULL,
  `stu_img` text NOT NULL DEFAULT '../../assets/usersimages/user.png',
  `tech_eml` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `student_request`
--

INSERT INTO `student_request` (`stu_id`, `stu_eml`, `stu_psrd`, `stu_nm`, `stu_adrs`, `stu_phone`, `stu_img`, `tech_eml`) VALUES
(7, 'mmoh3365012@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Mohamed Reda', '', '01212745939', '../../assets/usersimages/3.jpg', 'mmoh336150@gmail.com'),
(11, 'mmoh3365110@gmail.com', 'ce26b2d514efe35b3189f20c51570f98', 'Mohamed Yousef', '', '01212745939', '../../assets/usersimages/e828720929498bf852a0ffa01dfcef80.jpg', 'mmoh33650@gmail.com'),
(6, 'mmoh3365450@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ahmed Reda', '', '01212745939', '../../assets/usersimages/user.png', 'mmoh33650@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `stu_class`
--

CREATE TABLE `stu_class` (
  `stu_eml` varchar(30) NOT NULL,
  `class_id` varchar(6) NOT NULL,
  `student_grade_in_this_class` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `stu_class`
--

INSERT INTO `stu_class` (`stu_eml`, `class_id`, `student_grade_in_this_class`) VALUES
('mmoh3312650@gmail.com', '0124hk', 0),
('mmoh3365100@gmail.com', '0124hk', 0),
('mmoh3365110@gmail.com', '0124hk', 0),
('mmoh3365110@gmail.com', 'S#e@c', 0),
('mmoh3365450@gmail.com', 'S#e@c', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `stu_subject`
--

CREATE TABLE `stu_subject` (
  `subject_code` varchar(6) NOT NULL,
  `stu_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `stu_subject`
--

INSERT INTO `stu_subject` (`subject_code`, `stu_email`) VALUES
('MA110', 'mmoh3365110@gmail.com'),
('OP110', 'mmoh3365450@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `subject`
--

CREATE TABLE `subject` (
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `subject`
--

INSERT INTO `subject` (`subject_name`, `subject_code`) VALUES
('Adv.Data Structure', 'DA111'),
('Adv.Operating System', 'OP111'),
('computer science', 'CS110'),
('math1', 'CS50'),
('Math2', 'MA110'),
('math3', 'MA111'),
('Operating System', 'OP110');

-- --------------------------------------------------------

--
-- بنية الجدول `subjects_grades`
--

CREATE TABLE `subjects_grades` (
  `subject_grade` double NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `student_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `subjects_grades`
--

INSERT INTO `subjects_grades` (`subject_grade`, `subject_code`, `student_email`) VALUES
(79.4, 'CS50', 'mmoh33650@gmail.com'),
(57.1, 'MA111', 'mmoh33650@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `subject_class`
--

CREATE TABLE `subject_class` (
  `class_code` varchar(6) NOT NULL,
  `subject_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `subject_class`
--

INSERT INTO `subject_class` (`class_code`, `subject_code`) VALUES
('0124hk', 'DA111'),
('as#@as', 'MA111'),
('S#e@c', 'MA110'),
('S#e@c', 'OP111'),
('sadfgs', 'f@g#s');

-- --------------------------------------------------------

--
-- بنية الجدول `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(38) NOT NULL,
  `teacher_eml` varchar(50) NOT NULL,
  `teacher_img` text NOT NULL DEFAULT '../../assets/userimages/user.png',
  `teacher_nphone` varchar(38) NOT NULL,
  `teacher_psrd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_eml`, `teacher_img`, `teacher_nphone`, `teacher_psrd`) VALUES
(16, 'Data Structure', 'mmoh336150@gmail.com', '../../assets/usersimages/user.png', '01212745939', '21232f297a57a5a743894a0e4a801fc3'),
(17, 'Mohamed Reda', 'mmoh33650@gmail.com', '../../assets/usersimages/e828720929498bf852a0ffa01dfcef80.jpg', '01212745939', '21232f297a57a5a743894a0e4a801fc3'),
(24, 'mohamed reda', 'mmoh336510@gmail.com', '../../assets/usersimages/user.png', '01212745939', '21232f297a57a5a743894a0e4a801fc3'),
(23, 'Mohamed Reda', 'mmoh336jhj50@gmail.com', '../../assets/usersimages/user.png', '01212745939', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_report`
--

CREATE TABLE `teacher_report` (
  `report_id` int(11) NOT NULL,
  `report_content` varchar(1000) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `response` varchar(1000) DEFAULT NULL,
  `teacher_read` int(11) NOT NULL DEFAULT 0,
  `admin_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_report`
--

INSERT INTO `teacher_report` (`report_id`, `report_content`, `teacher_email`, `response`, `teacher_read`, `admin_read`) VALUES
(1, 'Follow the format in this article independently of your report’s visual composition. The content should be set up the same way for any format you choose.', 'mmoh336150@gmail.com', '', 0, 1),
(4, 'First of all, a report is unlike an essay, blog post or journalistic article. The main idea of a report is to present facts about a specific topic, situation, or event. \r\n\r\nIt’s not about supporting ideas or hypotheses. The information must be presented in a clear and concise way — that’s why the proper report writing format is essential.', 'mmoh336jhj50@gmail.com', '', 0, 1),
(6, 'dsfcxvbkljdjfhgbnvc,mbnjuhgufdyurytfhgjfgfbnbgd', 'mmoh33650@gmail.com', '', 0, 1),
(11, 'kjnbkjnbkjnlk\r\n', 'mmoh33650@gmail.com', '', 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `tech_class`
--

CREATE TABLE `tech_class` (
  `class_id` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tech_class`
--

INSERT INTO `tech_class` (`class_id`, `email`) VALUES
('0124hk', 'mmoh133650@gmail.com'),
('as#@as', 'mmoh336150@gmail.com'),
('0124hk', 'mmoh33650@gmail.com'),
('S#e@c', 'mmoh336510@gmail.com'),
('S#e@c', 'mmoh3365hgjg0@gmail.com'),
('0124hk', 'mmoh3365jk023@gmail.com'),
('S#e@c', 'mmoh336jhj50@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `tech_subject`
--

CREATE TABLE `tech_subject` (
  `subject_code` varchar(6) NOT NULL,
  `tech_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tech_subject`
--

INSERT INTO `tech_subject` (`subject_code`, `tech_email`) VALUES
('DA111', 'mmoh33650@gmail.com'),
('MA110', 'mmoh336jhj50@gmail.com'),
('MA111', 'mmoh336150@gmail.com'),
('OP111', 'mmoh336510@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_eml`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_code`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `teacher_exam_pk` (`teacher_email`),
  ADD KEY `subject_exam_pk` (`subject_code`);

--
-- Indexes for table `exam_student_grade`
--
ALTER TABLE `exam_student_grade`
  ADD KEY `student_grade_pk` (`student_email`),
  ADD KEY `exam_grade_pk` (`exam_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `exam_exam_px` (`exam_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_eml`),
  ADD UNIQUE KEY `stu_id` (`stu_id`);

--
-- Indexes for table `student_request`
--
ALTER TABLE `student_request`
  ADD PRIMARY KEY (`stu_eml`),
  ADD UNIQUE KEY `stu_id` (`stu_id`),
  ADD KEY `tech_eml_request_pk` (`tech_eml`);

--
-- Indexes for table `stu_class`
--
ALTER TABLE `stu_class`
  ADD PRIMARY KEY (`class_id`,`stu_eml`),
  ADD KEY `stu_class_email` (`stu_eml`);

--
-- Indexes for table `stu_subject`
--
ALTER TABLE `stu_subject`
  ADD PRIMARY KEY (`subject_code`,`stu_email`),
  ADD KEY `student_eeml_pk` (`stu_email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_code`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `subjects_grades`
--
ALTER TABLE `subjects_grades`
  ADD PRIMARY KEY (`subject_code`,`student_email`);

--
-- Indexes for table `subject_class`
--
ALTER TABLE `subject_class`
  ADD PRIMARY KEY (`class_code`,`subject_code`),
  ADD KEY `sub_class_relation` (`subject_code`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_eml`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_report`
--
ALTER TABLE `teacher_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `teacher_report_pk` (`teacher_email`);

--
-- Indexes for table `tech_class`
--
ALTER TABLE `tech_class`
  ADD PRIMARY KEY (`email`,`class_id`),
  ADD KEY `class_class_code` (`class_id`);

--
-- Indexes for table `tech_subject`
--
ALTER TABLE `tech_subject`
  ADD PRIMARY KEY (`subject_code`,`tech_email`),
  ADD KEY `tech_eeml_pk` (`tech_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_request`
--
ALTER TABLE `student_request`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `teacher_report`
--
ALTER TABLE `teacher_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `subject_exam_pk` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_exam_pk` FOREIGN KEY (`teacher_email`) REFERENCES `teachers` (`teacher_eml`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `exam_student_grade`
--
ALTER TABLE `exam_student_grade`
  ADD CONSTRAINT `exam_grade_pk` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_grade_pk` FOREIGN KEY (`student_email`) REFERENCES `students` (`stu_eml`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `exam_exam_px` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `student_request`
--
ALTER TABLE `student_request`
  ADD CONSTRAINT `tech_eml_request_pk` FOREIGN KEY (`tech_eml`) REFERENCES `teachers` (`teacher_eml`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `stu_class`
--
ALTER TABLE `stu_class`
  ADD CONSTRAINT `class_classStu_code` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_class_email` FOREIGN KEY (`stu_eml`) REFERENCES `students` (`stu_eml`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `stu_subject`
--
ALTER TABLE `stu_subject`
  ADD CONSTRAINT `student_eeml_pk` FOREIGN KEY (`stu_email`) REFERENCES `stu_class` (`stu_eml`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_stu_pk` FOREIGN KEY (`stu_email`) REFERENCES `students` (`stu_eml`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_sub_pk` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subj_subj_pk` FOREIGN KEY (`subject_code`) REFERENCES `subject_class` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `subject_class`
--
ALTER TABLE `subject_class`
  ADD CONSTRAINT `subj_class` FOREIGN KEY (`class_code`) REFERENCES `classes` (`class_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subj_subj` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `teacher_report`
--
ALTER TABLE `teacher_report`
  ADD CONSTRAINT `teacher_report_pk` FOREIGN KEY (`teacher_email`) REFERENCES `teachers` (`teacher_eml`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `tech_class`
--
ALTER TABLE `tech_class`
  ADD CONSTRAINT `eeml_teacher_pk_cls` FOREIGN KEY (`email`) REFERENCES `teachers` (`teacher_eml`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_cls_cls_pk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `tech_subject`
--
ALTER TABLE `tech_subject`
  ADD CONSTRAINT `eeml_tech_pk` FOREIGN KEY (`tech_email`) REFERENCES `tech_class` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subj_subj_classe_pk` FOREIGN KEY (`subject_code`) REFERENCES `subject_class` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
