-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:03 PM
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
-- Database: `virtual_innovation_management_courses_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `course_id`, `title`, `description`, `due_date`) VALUES
(4, 4, 'Innovation Project Proposal', 'Submit a proposal for an innovative project.', '2024-05-15'),
(5, 4, 'Case Study Analysis', 'Analyze a case study on innovation.', '2024-06-15'),
(6, 4, 'Design Thinking Workshop', 'Create and present a design thinking workshop.', '2024-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `instructor_id`, `start_date`, `end_date`, `price`) VALUES
(4, 'Introduction to Innovation Management', 'Learn the basics of innovation management.', 1, '2024-05-01', '2024-06-01', 50.00),
(5, 'Advanced Innovation Techniques', 'Advanced techniques in innovation management.', 1, '2024-06-15', '2024-07-15', 75.00),
(6, 'Mastering Design Thinking', 'Master the principles of design thinking.', 1, '2024-07-01', '2024-08-01', 60.00),
(7, 'web', 'element of web', 2, '2024-06-02', '2024-05-13', 300.00),
(8, 'IT', 'element of IT', 2, '2024-06-02', '2024-05-13', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `discussionposts`
--

CREATE TABLE `discussionposts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussionposts`
--

INSERT INTO `discussionposts` (`post_id`, `user_id`, `course_id`, `title`, `content`, `post_date`) VALUES
(8, 1, 6, 'Case Study Analysis Discussion', 'Discuss insights from the case study analysis.', '2024-05-11 19:08:48'),
(9, 1, 6, 'Design Thinking Workshop Ideas', 'Share ideas for the design thinking workshop.', '2024-05-11 19:08:48'),
(13, 1, 4, 'Introduction Discussion', 'Introduce yourself and share your interests in innovation.', '2024-05-11 19:11:13'),
(14, 2, 4, 'Case Study Analysis Discussion', 'Discuss insights from the case study analysis.', '2024-05-11 19:11:13'),
(15, 3, 4, 'Design Thinking Workshop Ideas', 'Share ideas for the design thinking workshop.', '2024-05-11 19:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `user_id`, `course_id`, `enrollment_date`) VALUES
(13, 2, 4, '2024-05-05'),
(14, 2, 4, '2024-05-10'),
(15, 2, 4, '2024-05-15'),
(21, 2, 4, '2024-05-02'),
(23, 4, 4, '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `innovationmanagementresources`
--

CREATE TABLE `innovationmanagementresources` (
  `resource_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `innovationmanagementresources`
--

INSERT INTO `innovationmanagementresources` (`resource_id`, `title`, `description`, `link`) VALUES
(1, 'Innovation Frameworks', 'Various frameworks for managing innovation.', 'https://example.com/frameworks'),
(2, 'Case Studies', 'Real-world cases of successful innovation.', 'https://example.com/case-studies'),
(3, 'Design Thinking Tools', 'Tools and templates for design thinking.', 'https://example.com/design-tools'),
(4, 'library', 'element', 'lib @examlpe');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `expertise` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `user_id`, `bio`, `expertise`) VALUES
(1, 2, 'Experienced in innovation strategies.', 'Innovation Strategy'),
(2, 3, 'Expert in design thinking methodologies.', 'Design Thinking'),
(3, NULL, 'Experienced in innovation strategies', 'design'),
(4, NULL, 'Experienced in innovation strategies', 'design'),
(5, NULL, 'Experienced in innovation strategies', 'design and thinking');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `sequence_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `module_id`, `title`, `content`, `sequence_order`) VALUES
(2, NULL, 'innovation ', 'it', 6),
(3, NULL, 'web', 'researching ', 45),
(4, NULL, 'web', 'researching ', 45),
(5, NULL, 'web', 'researching ', 45),
(6, NULL, 'web', 'researching ', 45),
(7, NULL, 'sociologist ', 'definitions', 500),
(8, NULL, 'sociologist ', 'definitions', 500),
(9, NULL, 'business', 'pyschogic need', 50);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `course_id`, `title`, `description`, `start_date`, `end_date`) VALUES
(4, 5, 'Introduction Module', 'Introduction to the course.', '2024-05-01', '2024-05-15'),
(5, 5, 'Advanced Techniques Module', 'Advanced concepts in innovation.', '2024-06-01', '2024-06-15'),
(6, 5, 'Design Thinking Module', 'Practical exercises in design thinking.', '2024-07-01', '2024-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `user_id`, `assignment_id`, `submission_date`, `grade`) VALUES
(7, 1, 4, '2024-05-14', 'A'),
(8, 2, 4, '2024-06-10', 'B'),
(9, 3, 4, '2024-07-12', 'A'),
(11, 5, 5, '2024-05-04', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`) VALUES
(1, 'daniel', '4321', 'daniel', 'habiri', 'daniel@gmail.com', 'Student'),
(2, 'jane', '5432', 'jane', 'silvier', 'jane@gmail.com', 'Instructor'),
(3, 'dominique', '6543', 'daminique', 'dominique', 'dominiq@gmail.com', 'Admin'),
(4, 'SOLANGE', '1234', 'daniel', 'habiyaremye', 'habiyaremyedaniel2021@gmail.com', 'sinior manager'),
(5, 'edouard', '1234', 'nsenge', 'edoou', 'tuyisengesilas9@gmail.com', 'student'),
(8, 'herene', '1234', 'daniel', 'habiyaremye', 'habiyaremye2021@gmail.com', 'super user'),
(10, 'maniel', '1234', 'daniel', 'habiyaremye', 'habiyaremyemaniel2021@gmail.com', 'student'),
(12, 'aniel', '123', 'aniel', 'habiyaremye', 'chris@gmail.com', 'student'),
(14, 'faniel', '1234', 'were', 'paul', 'eric@gmail.com', 'sinior manager'),
(16, 'Germany', '1234556789', 'daniel', 'habiyaremye', 'chri@gmail.com', 'super user'),
(17, 'felix', '123', 'niyori', 'nsabi', 'felix@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `discussionposts`
--
ALTER TABLE `discussionposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `innovationmanagementresources`
--
ALTER TABLE `innovationmanagementresources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discussionposts`
--
ALTER TABLE `discussionposts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `innovationmanagementresources`
--
ALTER TABLE `innovationmanagementresources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `discussionposts`
--
ALTER TABLE `discussionposts`
  ADD CONSTRAINT `discussionposts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `discussionposts_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
