-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 10:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'PHPP'),
(4, 'JAVA'),
(7, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 2, 'Ramoni Nayar', 'ramoni@gmail.com', 'great app', 'Approved', '2023-01-24'),
(8, 4, 'Kaviraj', 'kavi@gmail.com', 'nkjsdhdsojosd', 'Approved', '2023-01-24'),
(9, 4, 'Mansi', 'mansi@gmail.com', 'mind blowing', 'Approved', '2023-01-24'),
(11, 18, 'Kaviraj', 'mansi@gmail.com', 'hggcchgvhjjkhgggggggggggjhfufguvghvhvhgvhvjhvgvgcvhg', 'Approved', '2023-01-24'),
(13, 18, 'Kaviraj', 'mansi@gmail.com', 'hggcchgvhjjkhgggggggggggjhfufguvghvhvhgvhvjhvgvgcvhg', 'Approved', '2023-01-24'),
(14, 2, 'Kaviraj', 'mansi@gmail.com', 'ujhhsdjhojzoxzkjnxvkbkjbzxcb', 'Approved', '2023-01-24'),
(15, 2, 'Kaviraj', 'mansi@gmail.com', 'ujhhsdjhojzoxzkjnxvkbkjbzxcb', 'Approved', '2023-01-24'),
(16, 2, 'Kaviraj', 'mansi@gmail.com', 'ujhhsdjhojzoxzkjnxvkbkjbzxcb', 'Approved', '2023-01-24'),
(17, 21, 'Vilasi', 'vilasi@gmail.com', 'great Rushi!', 'Approved', '2023-01-24'),
(18, 21, 'Vilasi', 'vilasi@gmail.com', 'great Rushi!', 'Approved', '2023-01-24'),
(22, 126, 'Kaviraj', 'kavi@gmail.com', 'Great Ramu', 'Approved', '2023-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` longtext DEFAULT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comments_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `view_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comments_count`, `post_status`, `view_count`) VALUES
(2, 3, 'Javascript Course', 'Balinda Ronda', '2023-01-23', 'image_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus architecto deleniti reiciendis sint, id quo, labore iure ratione alias esse, consequuntur possimus omnis cupiditate porro voluptas eveniet perferendis doloribus. Neque?         ', 'java,javascript,php', 4, 'published', 239),
(4, 1, 'Ionic', 'Kalconi Matha', '2023-02-01', 'pixel6-logo1 2.png', '         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum accusamus nemo quod ea doloribus! Aut, necessitatibus ut! Eligendi aspernatur saepe quasi quisquam quia recusandae harum eius sunt eum adnknknksnkjnxz                ', 'Maconi Nitan', 2, 'published', 1),
(18, 1, 'Ram Rahim', 'Kavi Varma', '2023-02-03', '2560px-Axis_Bank_logo.svg.png', '         sduguisdfuiuisdfugu guiihiiuug giuhuibhihgi rushikesh naLA YASKSHDFSKK  gfvjixzvhojxcvozjojioxzvoijdzxv\r\nnnzxlvcknlkvbbbbbbbbbbbbbbbbbbbb    cxcvx      sdfrfassadfsfs                                                                                                                                          ', 'Kapotoni namotina', 2, 'published', 1),
(21, 2, 'Springboot', 'Rushi Durvasa', '2023-01-24', '20210918_145843.jpg', 'isdjbjbvjbjxbcjbjcxbjcbbxchbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Kapotoni namotina', 2, 'published', 1),
(22, 1, 'JQuiry', 'John Resig', '2023-01-30', '1024px-JQuery_logo.svg.png', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.[4] As of Aug 2022, jQuery is used by 77% of the 10 million most popular websites.[5] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having at least 3 to 4 times more usage than any other JavaScript library.[5][6]\r\n', 'Maconi Nitan', 0, 'published', 0),
(26, 1, 'JS', 'Kalconi Matha', '2023-01-30', 'pexels-iván-rivero-1001965.jpg', 'The rise of JScript\r\nIn November 1996, Netscape submitted JavaScript to Ecma International, as the starting point for a standard specification that all browser vendors could conform to. This led to the official release of the first ECMAScript language specification in June 1997.       ', 'Maconi Nitan', 0, 'published', 1),
(29, 1, 'MS', 'ravi', '2023-02-01', '2560px-Axis_Bank_logo.svg.png', '         Medicinae Doctor) is a medical degree, the meaning of which varies between different jurisdictions. In the United States, and some other countries, the M.D. denotes a professional degree. This generally arose because many in 18th-century medical professions trained in Scotland, which used the M.D. degree nomenclature. In England, however, Bachelor of Medicine, Bachelor of Surgery was used and eventually in the 19th century became the standard in Scotland too. Thus, in the United Kingdom, Ireland and other countries, the M.D. is a research doctorate, honorary doctorate or applied clinical degree restricted to those who already hold a professional degree (Bachelor\'s/Master\'s/Doctoral) in medicine. In those countries, the equivalent professional degree to the North American, and some others use of M.D., is still typically titled Bachelor of Medicine, Bachelor of Surgery (M.B.B.S.).[2] A provider who holds a Doctor of Chiropractic (D.C.) degree has a \"doctoral\" degree and sometimes can be referred to as a \"doctor,\" but is not the same as a healthcare provider who holds a Doctor of Medicine (M.D.) degree since the M.D. degree confers much more authoritative clinical capacities, greater autonomy, and responsibility.[3]', 'Madar', 0, 'published', 0),
(49, 3, 'Javascript Course', 'Balinda Ronda', '2023-02-01', 'image_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus architecto deleniti reiciendis sint, id quo, labore iure ratione alias esse, consequuntur possimus omnis cupiditate porro voluptas eveniet perferendis doloribus. Neque?         ', 'java,javascript,php', 0, 'published', 0),
(50, 1, 'Ionic', 'Kalconi Matha', '2023-02-01', 'pixel6-logo1 2.png', '         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum accusamus nemo quod ea doloribus! Aut, necessitatibus ut! Eligendi aspernatur saepe quasi quisquam quia recusandae harum eius sunt eum adnknknksnkjnxz       ', 'Maconi Nitan', 0, 'published', 0),
(51, 1, 'Ram Rahim', 'Kavi Varma', '2023-02-01', '2560px-Axis_Bank_logo.svg.png', '         sduguisdfuiuisdfugu guiihiiuug giuhuibhihgi rushikesh naLA YASKSHDFSKK  gfvjixzvhojxcvozjojioxzvoijdzxv\r\nnnzxlvcknlkvbbbbbbbbbbbbbbbbbbbb    cxcvx      sdfrfassadfsfs                                                                                                                                 ', 'Kapotoni namotina', 0, 'published', 0),
(52, 2, 'Springboot', 'Rushi Durvasa', '2023-02-01', '20210918_145843.jpg', 'isdjbjbvjbjxbcjbjcxbjcbbxchbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Kapotoni namotina', 0, 'published', 0),
(53, 1, 'JQuiry', 'John Resig', '2023-02-02', 'download.png', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.[4] As of Aug 2022, jQuery is used by 77% of the 10 million most popular websites.[5] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having at least 3 to 4 times more usage than any other JavaScript library.\r\n                           ', 'Maconi Nitan', 0, 'published', 1),
(54, 1, 'JS', 'Kalconi Matha', '2023-02-01', 'pexels-iván-rivero-1001965.jpg', 'The rise of JScript\r\nIn November 1996, Netscape submitted JavaScript to Ecma International, as the starting point for a standard specification that all browser vendors could conform to. This led to the official release of the first ECMAScript language specification in June 1997.       ', 'Maconi Nitan', 0, 'published', 0),
(55, 1, 'MS', 'ravi', '2023-02-01', '2560px-Axis_Bank_logo.svg.png', '         Medicinae Doctor) is a medical degree, the meaning of which varies between different jurisdictions. In the United States, and some other countries, the M.D. denotes a professional degree. This generally arose because many in 18th-century medical professions trained in Scotland, which used the M.D. degree nomenclature. In England, however, Bachelor of Medicine, Bachelor of Surgery was used and eventually in the 19th century became the standard in Scotland too. Thus, in the United Kingdom, Ireland and other countries, the M.D. is a research doctorate, honorary doctorate or applied clinical degree restricted to those who already hold a professional degree (Bachelor\'s/Master\'s/Doctoral) in medicine. In those countries, the equivalent professional degree to the North American, and some others use of M.D., is still typically titled Bachelor of Medicine, Bachelor of Surgery (M.B.B.S.).[2] A provider who holds a Doctor of Chiropractic (D.C.) degree has a \"doctoral\" degree and sometimes can be referred to as a \"doctor,\" but is not the same as a healthcare provider who holds a Doctor of Medicine (M.D.) degree since the M.D. degree confers much more authoritative clinical capacities, greater autonomy, and responsibility.[3]', 'Madar', 0, 'published', 0),
(56, 3, 'Javascript Course', 'Balinda Ronda', '2023-02-01', 'image_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus architecto deleniti reiciendis sint, id quo, labore iure ratione alias esse, consequuntur possimus omnis cupiditate porro voluptas eveniet perferendis doloribus. Neque?         ', 'java,javascript,php', 0, 'published', 0),
(57, 1, 'Ionic', 'Kalconi Matha', '2023-02-01', 'pixel6-logo1 2.png', '         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum accusamus nemo quod ea doloribus! Aut, necessitatibus ut! Eligendi aspernatur saepe quasi quisquam quia recusandae harum eius sunt eum adnknknksnkjnxz       ', 'Maconi Nitan', 0, 'published', 0),
(58, 1, 'Ram Rahim', 'Kavi Varma', '2023-02-01', '2560px-Axis_Bank_logo.svg.png', '         sduguisdfuiuisdfugu guiihiiuug giuhuibhihgi rushikesh naLA YASKSHDFSKK  gfvjixzvhojxcvozjojioxzvoijdzxv\r\nnnzxlvcknlkvbbbbbbbbbbbbbbbbbbbb    cxcvx      sdfrfassadfsfs                                                                                                                                 ', 'Kapotoni namotina', 0, 'published', 0),
(59, 2, 'Springboot', 'Rushi Durvasa', '2023-02-01', '20210918_145843.jpg', 'isdjbjbvjbjxbcjbjcxbjcbbxchbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Kapotoni namotina', 0, 'published', 0),
(60, 1, 'JQuiry', 'John Resig', '2023-02-01', '1024px-JQuery_logo.svg.png', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.[4] As of Aug 2022, jQuery is used by 77% of the 10 million most popular websites.[5] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having at least 3 to 4 times more usage than any other JavaScript library.[5][6]\r\n', 'Maconi Nitan', 0, 'published', 0),
(61, 1, 'JS', 'Kalconi Matha', '2023-02-01', 'pexels-iván-rivero-1001965.jpg', 'The rise of JScript\r\nIn November 1996, Netscape submitted JavaScript to Ecma International, as the starting point for a standard specification that all browser vendors could conform to. This led to the official release of the first ECMAScript language specification in June 1997.       ', 'Maconi Nitan', 0, 'published', 0),
(126, 1, 'Vue.js', 'Ramu', '2023-02-03', 'Vue.js_Logo_2.svg.png', '         Vue.js features an incrementally adaptable architecture that focuses on declarative rendering and component composition. The core library is focused on the view layer only.[5] Advanced features required for complex applications such as routing, state management and build tooling are offered via officially maintained supporting libraries and packages.[13]\r\n\r\nVue.js allows for extending HTML with HTML attributes called directives.[14] The directives offer functionality to HTML applications, and come as either built-in or user defined directives.\r\n\r\nHistory\r\nVue was created by Evan You after working for Google using AngularJS in several projects. He later summed up his thought process: \"I figured, what if I could just extract the part that I really liked about Angular and build something really lightweight.\"[15] The first source code commit to the project was dated July 2013, and Vue was first publicly announced the following February, in 2014.[16][17]\r\n\r\nVersion names are often derived from manga and anime, most of which are within the science fiction genre.         ', 'Javascript Framwork', 1, 'published', 6),
(127, 3, 'Javascript Course', 'Balinda Ronda', '2023-02-03', 'image_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus architecto deleniti reiciendis sint, id quo, labore iure ratione alias esse, consequuntur possimus omnis cupiditate porro voluptas eveniet perferendis doloribus. Neque?         ', 'java,javascript,php', 0, 'published', 0),
(128, 1, 'Ionic', 'Kalconi Matha', '2023-02-03', 'pixel6-logo1 2.png', '         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum accusamus nemo quod ea doloribus! Aut, necessitatibus ut! Eligendi aspernatur saepe quasi quisquam quia recusandae harum eius sunt eum adnknknksnkjnxz                ', 'Maconi Nitan', 0, 'published', 0),
(129, 1, 'Ram Rahim', 'Kavi Varma', '2023-02-03', '2560px-Axis_Bank_logo.svg.png', '         sduguisdfuiuisdfugu guiihiiuug giuhuibhihgi rushikesh naLA YASKSHDFSKK  gfvjixzvhojxcvozjojioxzvoijdzxv\r\nnnzxlvcknlkvbbbbbbbbbbbbbbbbbbbb    cxcvx      sdfrfassadfsfs                                                                                                                                          ', 'Kapotoni namotina', 0, 'published', 0),
(130, 2, 'Springboot', 'Rushi Durvasa', '2023-02-03', '20210918_145843.jpg', 'isdjbjbvjbjxbcjbjcxbjcbbxchbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Kapotoni namotina', 0, 'published', 0),
(131, 1, 'JQuiry', 'John Resig', '2023-02-03', '1024px-JQuery_logo.svg.png', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.[4] As of Aug 2022, jQuery is used by 77% of the 10 million most popular websites.[5] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having at least 3 to 4 times more usage than any other JavaScript library.[5][6]\r\n', 'Maconi Nitan', 0, 'published', 0),
(132, 1, 'JS', 'Kalconi Matha', '2023-02-03', 'pexels-iván-rivero-1001965.jpg', 'The rise of JScript\r\nIn November 1996, Netscape submitted JavaScript to Ecma International, as the starting point for a standard specification that all browser vendors could conform to. This led to the official release of the first ECMAScript language specification in June 1997.       ', 'Maconi Nitan', 0, 'published', 0),
(133, 1, 'MS', 'ravi', '2023-02-03', '2560px-Axis_Bank_logo.svg.png', '         Medicinae Doctor) is a medical degree, the meaning of which varies between different jurisdictions. In the United States, and some other countries, the M.D. denotes a professional degree. This generally arose because many in 18th-century medical professions trained in Scotland, which used the M.D. degree nomenclature. In England, however, Bachelor of Medicine, Bachelor of Surgery was used and eventually in the 19th century became the standard in Scotland too. Thus, in the United Kingdom, Ireland and other countries, the M.D. is a research doctorate, honorary doctorate or applied clinical degree restricted to those who already hold a professional degree (Bachelor\'s/Master\'s/Doctoral) in medicine. In those countries, the equivalent professional degree to the North American, and some others use of M.D., is still typically titled Bachelor of Medicine, Bachelor of Surgery (M.B.B.S.).[2] A provider who holds a Doctor of Chiropractic (D.C.) degree has a \"doctoral\" degree and sometimes can be referred to as a \"doctor,\" but is not the same as a healthcare provider who holds a Doctor of Medicine (M.D.) degree since the M.D. degree confers much more authoritative clinical capacities, greater autonomy, and responsibility.[3]', 'Madar', 0, 'published', 0),
(134, 3, 'Javascript Course', 'Balinda Ronda', '2023-02-03', 'image_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus architecto deleniti reiciendis sint, id quo, labore iure ratione alias esse, consequuntur possimus omnis cupiditate porro voluptas eveniet perferendis doloribus. Neque?         ', 'java,javascript,php', 0, 'published', 0),
(135, 1, 'Ionic', 'Kalconi Matha', '2023-02-03', 'pixel6-logo1 2.png', '         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum accusamus nemo quod ea doloribus! Aut, necessitatibus ut! Eligendi aspernatur saepe quasi quisquam quia recusandae harum eius sunt eum adnknknksnkjnxz       ', 'Maconi Nitan', 0, 'published', 0),
(136, 1, 'Ram Rahim', 'Kavi Varma', '2023-02-03', '2560px-Axis_Bank_logo.svg.png', '         sduguisdfuiuisdfugu guiihiiuug giuhuibhihgi rushikesh naLA YASKSHDFSKK  gfvjixzvhojxcvozjojioxzvoijdzxv\r\nnnzxlvcknlkvbbbbbbbbbbbbbbbbbbbb    cxcvx      sdfrfassadfsfs                                                                                                                                 ', 'Kapotoni namotina', 0, 'published', 0),
(137, 2, 'Springboot', 'Rushi Durvasa', '2023-02-03', '20210918_145843.jpg', 'isdjbjbvjbjxbcjbjcxbjcbbxchbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Kapotoni namotina', 0, 'published', 0),
(138, 1, 'JQuiry', 'John Resig', '2023-02-03', 'download.png', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.[4] As of Aug 2022, jQuery is used by 77% of the 10 million most popular websites.[5] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having at least 3 to 4 times more usage than any other JavaScript library.\r\n                           ', 'Maconi Nitan', 0, 'published', 0),
(139, 1, 'JS', 'Kalconi Matha', '2023-02-03', 'pexels-iván-rivero-1001965.jpg', 'The rise of JScript\r\nIn November 1996, Netscape submitted JavaScript to Ecma International, as the starting point for a standard specification that all browser vendors could conform to. This led to the official release of the first ECMAScript language specification in June 1997.       ', 'Maconi Nitan', 0, 'published', 0),
(140, 1, 'MS', 'ravi', '2023-02-03', '2560px-Axis_Bank_logo.svg.png', '         Medicinae Doctor) is a medical degree, the meaning of which varies between different jurisdictions. In the United States, and some other countries, the M.D. denotes a professional degree. This generally arose because many in 18th-century medical professions trained in Scotland, which used the M.D. degree nomenclature. In England, however, Bachelor of Medicine, Bachelor of Surgery was used and eventually in the 19th century became the standard in Scotland too. Thus, in the United Kingdom, Ireland and other countries, the M.D. is a research doctorate, honorary doctorate or applied clinical degree restricted to those who already hold a professional degree (Bachelor\'s/Master\'s/Doctoral) in medicine. In those countries, the equivalent professional degree to the North American, and some others use of M.D., is still typically titled Bachelor of Medicine, Bachelor of Surgery (M.B.B.S.).[2] A provider who holds a Doctor of Chiropractic (D.C.) degree has a \"doctoral\" degree and sometimes can be referred to as a \"doctor,\" but is not the same as a healthcare provider who holds a Doctor of Medicine (M.D.) degree since the M.D. degree confers much more authoritative clinical capacities, greater autonomy, and responsibility.[3]', 'Madar', 0, 'published', 0),
(141, 3, 'Javascript Course', 'Balinda Ronda', '2023-02-03', 'image_5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus architecto deleniti reiciendis sint, id quo, labore iure ratione alias esse, consequuntur possimus omnis cupiditate porro voluptas eveniet perferendis doloribus. Neque?         ', 'java,javascript,php', 0, 'published', 0),
(142, 1, 'Ionic', 'Kalconi Matha', '2023-02-03', 'pixel6-logo1 2.png', '         Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum accusamus nemo quod ea doloribus! Aut, necessitatibus ut! Eligendi aspernatur saepe quasi quisquam quia recusandae harum eius sunt eum adnknknksnkjnxz       ', 'Maconi Nitan', 0, 'published', 0),
(143, 1, 'Ram Rahim', 'Kavi Varma', '2023-02-03', '2560px-Axis_Bank_logo.svg.png', '         sduguisdfuiuisdfugu guiihiiuug giuhuibhihgi rushikesh naLA YASKSHDFSKK  gfvjixzvhojxcvozjojioxzvoijdzxv\r\nnnzxlvcknlkvbbbbbbbbbbbbbbbbbbbb    cxcvx      sdfrfassadfsfs                                                                                                                                 ', 'Kapotoni namotina', 0, 'published', 0),
(144, 2, 'Springboot', 'Rushi Durvasa', '2023-02-03', '20210918_145843.jpg', 'isdjbjbvjbjxbcjbjcxbjcbbxchbcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\ncccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'Kapotoni namotina', 0, 'published', 0),
(145, 1, 'JQuiry', 'John Resig', '2023-02-03', '1024px-JQuery_logo.svg.png', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.[4] As of Aug 2022, jQuery is used by 77% of the 10 million most popular websites.[5] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having at least 3 to 4 times more usage than any other JavaScript library.[5][6]\r\n', 'Maconi Nitan', 0, 'published', 0),
(146, 1, 'JS', 'Kalconi Matha', '2023-02-03', 'pexels-iván-rivero-1001965.jpg', 'The rise of JScript\r\nIn November 1996, Netscape submitted JavaScript to Ecma International, as the starting point for a standard specification that all browser vendors could conform to. This led to the official release of the first ECMAScript language specification in June 1997.       ', 'Maconi Nitan', 0, 'published', 0),
(147, 1, 'Vue.js', 'Ramu', '2023-02-03', 'Vue.js_Logo_2.svg.png', '         Vue.js features an incrementally adaptable architecture that focuses on declarative rendering and component composition. The core library is focused on the view layer only.[5] Advanced features required for complex applications such as routing, state management and build tooling are offered via officially maintained supporting libraries and packages.[13]\r\n\r\nVue.js allows for extending HTML with HTML attributes called directives.[14] The directives offer functionality to HTML applications, and come as either built-in or user defined directives.\r\n\r\nHistory\r\nVue was created by Evan You after working for Google using AngularJS in several projects. He later summed up his thought process: \"I figured, what if I could just extract the part that I really liked about Angular and build something really lightweight.\"[15] The first source code commit to the project was dated July 2013, and Vue was first publicly announced the following February, in 2014.[16][17]\r\n\r\nVersion names are often derived from manga and anime, most of which are within the science fiction genre.         ', 'Javascript Framwork', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$esomecrezycharacters22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Ramu', '123', 'Ramu', 'Kaka', 'ramu@gmail.com', 'download.png', 'admin', ''),
(2, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 'download.png', 'admin', ''),
(5, 'shital', '123', 'Shital', 'Rathi', 'shital@gmail.com', 'download.png', 'subscriber', ''),
(6, 'payal', '123', 'Payal', 'Kamal', 'janu@gmail.com', 'download.png', 'admin', ''),
(7, 'shital', '123', 'Shital', 'Rathi', 'shital@gmail.com', 'download.png', 'admin', ''),
(8, 'mahi', '123', 'Mahi', 'Argade', 'mahi@gmail.com', 'download.png', 'subscriber', ''),
(9, 'pari', '123', 'Pari', 'Pathak', 'pari@gmail.com', 'download.png', 'admin', '$2y$10$esomecrezycharacters22'),
(28, 'mansu', '123', 'Mansuk', 'Lal', 'mansu@gmail.com', 'download.png', 'admin', '$2y$10$esomecrezycharacters22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(3) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
