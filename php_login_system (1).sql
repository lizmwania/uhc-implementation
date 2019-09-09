-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 05:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_login_system`
--
CREATE DATABASE IF NOT EXISTS `php_login_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_login_system`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_detail` varchar(2000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer_detail`, `name`, `datetime`, `likes`, `status`) VALUES
(1, 11, 'come and join every mondays as from 8.00am', 'elizabeth', '2019-08-01 16:10:32', 1, 1),
(9, 0, 'you will know', 'oscar mureti', '2019-08-02 17:24:37', 0, 1),
(10, 9, 'yeas', 'Elizabeth Mwania', '2019-08-02 17:42:12', 0, 1),
(11, 0, 'rtyui', 'Elizabeth Mwania', '2019-08-02 17:43:19', 0, 1),
(12, 9, '<p>You will get it online via this link<u>&nbsp;<a href=\"http://www.hmis.com\">www.hmis.com</a><a href=\"http://www.hmis.com\"></a>&nbsp;</u></p>', 'karis', '2019-08-02 19:23:55', 0, 1),
(13, 13, '<p>January,May and September there is always&nbsp; <b>intakes</b></p>', 'karis', '2019-08-02 19:26:51', 0, 1),
(14, 14, '<p>Yeah follow these links we shal consider your appliations&nbsp;<a href=\"http://www.hmisjobs.com%20%20www.kisumuhealth.com/\" style=\"box-sizing: border-box; outline: none !important; background-color: rgb(255, 255, 255); color: rgb(51, 122, 183); text-decoration: none; font-family: &quot;Varela Round&quot;, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">www.hmisjobs.com&nbsp;</a>&nbsp; &nbsp; &nbsp;or</p><p><a href=\"http://www.hmisjobs.com%20%20www.kisumuhealth.com/\" style=\"box-sizing: border-box; outline: none !important; background-color: rgb(255, 255, 255); color: rgb(51, 122, 183); text-decoration: none; font-family: &quot;Varela Round&quot;, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">www.kisumuhealth.com</a></p>', 'karis', '2019-08-02 19:30:38', 0, 1),
(15, 15, '<p>Thanks for asking, they just arived last week and we are making arrangments on how distribute them</p>', 'Elizabeth Mwania', '2019-08-02 22:12:50', 0, 1),
(16, 18, '<p>The government has promised them to be get the payments by the end of the month, furthermore there some nurses already in hospitals checking the patients, so not all are on strike, the county has catered for them so that they can attend such special patients.</p>', 'This is the way forward', '2019-08-24 17:29:34', 0, 1),
(17, 19, '<p>Next month&nbsp;</p>', 'Karim Kanji', '2019-08-24 16:19:01', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `click_count`
--

CREATE TABLE `click_count` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `click_count`
--

INSERT INTO `click_count` (`id`, `pid`, `page_url`, `page_count`) VALUES
(8, 19, 'news-details.php?nid=19', 3),
(11, 0, 'news-details.php?nid=0', 1),
(12, 0, 'news-details.php?nid=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_subject`, `comment_text`, `email`, `comment_status`) VALUES
(1, 'hms', 'start', '', 0),
(2, 'hmis', 'end', '', 0),
(3, 'tuu', '2', '', 0),
(4, 'dhis', 'ere with u', '', 0),
(5, '@uhcimplementation', 'Beaware of universal health coverage.', '', 1),
(11, 'HMIS', 'News are available', 'elizabethmwania257@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(5) NOT NULL,
  `pid` int(10) NOT NULL,
  `like` int(10) NOT NULL,
  `unlike` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `QuestionDetail` longtext NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `CategoryId`, `QuestionDetail`, `datetime`, `name`, `email`, `status`) VALUES
(9, 15, 'how do we get this ', '2019-08-01 13:39:24', 'oscar mureti', 'oscarmureti@gmail.com', 1),
(10, 6, 'are they available in the market', '2019-08-01 13:49:10', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 0),
(11, 15, 'i want to learn this \r\n', '2019-08-01 15:00:10', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 0),
(12, 3, 'how can i wanna join', '2019-08-01 15:21:32', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 0),
(13, 15, 'which month', '2019-08-01 16:35:53', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 1),
(14, 2, 'are you offering jobs', '2019-08-01 18:42:43', 'Fatuma Hussein', 'framulmuriithi@gmail.com', 1),
(15, 11, 'Our subcounty is runniing short of of registries where do we get the from', '2019-08-02 22:09:06', 'musenya', 'musenya@gmail.com', 1),
(16, 11, 'when are they comig ', '2019-08-02 22:20:35', 'oscar mureti', 'oscarmureti@gmail.com', 0),
(17, 10, 'What is health? ', '2019-08-07 22:15:23', 'Karim Kanji', 'karimkanji101@gmail.com', 0),
(18, 16, 'When will the the strike be off people are dying!', '2019-08-24 15:04:25', 'Elizabeth Mwania', 'elizabehmawnia@gmail.com', 1),
(19, 16, 'Ok when will they  start officially', '2019-08-24 15:46:38', 'oscar mureti', 'fartunhussein@gmail.com', 1),
(20, 16, 'Which date ?', '2019-08-24 16:20:21', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 0),
(21, 16, 'How will know', '2019-09-03 17:03:11', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
(34, 7, 'like'),
(34, 10, 'like'),
(34, 12, 'like'),
(34, 13, 'like'),
(34, 15, 'like'),
(34, 17, 'like'),
(34, 19, 'like'),
(54, 13, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `comment_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'waoh', '2019-07-11 17:40:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '$2y$12$i4LMfeFPQpGSNPTaccIkKuwxAkJ4PhBr3JND7FpXwWFjRvchQn17C', 'phpgurukulofficial@gmail.com', 1, '2018-05-27 17:51:00', '2018-10-24 18:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(2, 'Health Registry', 'HMIS News', '2018-06-06 10:28:09', '2019-08-21 16:27:41', 1),
(3, 'Health Finance', 'Finance related news', '2018-06-06 10:35:09', '2019-08-21 16:28:54', 1),
(5, 'Human Resource', 'Related  News', '2018-06-14 05:32:58', '2019-08-21 16:29:39', 1),
(6, 'Health Nutrition Department', 'Nutrition News', '2018-06-22 15:46:09', '2019-08-21 16:30:53', 1),
(7, 'Business', 'Business', '2018-06-22 15:46:22', '2019-09-09 15:04:00', 0),
(12, 'Health procurement', 'Procurement News', '2019-07-23 17:22:32', '2019-08-21 16:32:12', 1),
(15, 'Health Accounts', 'Accounts Related news', '2019-07-28 02:21:10', '2019-08-21 16:33:08', 1),
(16, 'Nurse Department', 'Nurse News', '2019-08-21 16:34:06', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 0),
(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 0),
(4, '10', 'fatuma', 'fatuma@gmail.com', 'i see things going on well', '2019-07-29 01:51:42', 1),
(5, '13', 'Elizabeth Mwania', 'elizabethmwania257@gmail.com', 'xcvbnm,', '2019-07-31 21:43:05', 1),
(7, '10', 'oscar mureti', 'oscarmureti@gmail.com', 'this is a good idea\r\nHow do I echo the value in the associative array? | Treehouse ...\r\n\r\nhttps://teamtreehouse.com/.../how-do-i-echo-the-value-in-the-associative-ar...\r\nJan 5, 2017 - The task says to print Mike\'s favorite color from the associative array $favorite_colors. I\'ve tried a few different codes: $favorite_colors both .', '2019-08-01 20:00:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About HMIS', 'contacts', '2018-06-30 18:01:03', '2019-07-24 02:41:51'),
(2, 'contactus', 'Contact Details', '<span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">Amref Health Africa in Kenya</span><span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">&nbsp;P O Box 30125, 00100</span><br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">Nairobi, Kenya</span><br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">Tel: +254 20 699 4000</span><br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">Fax: +254 20 600 6340</span><br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">Email: info.kenya@amref.org</span><br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: Foco, Arial, sans-serif; font-size: 16px; background-color: rgb(218, 225, 236);\">Website:amref.org/kenya</span>', '2018-06-30 18:01:36', '2019-08-21 13:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `view` varchar(10) NOT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `view`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(7, 'Jasprit Bumrah ruled out of England T20I series due to injury', 3, 4, '<p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">The Indian Cricket Team has received a huge blow right ahead of the commencement of the much-awaited series against England. Star speedster Jasprit Bumrah has been ruled out of the forthcoming 3-match T20I series as he suffered an injury in his left thumb.</span></p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">The 24-year-old pacer picked up a niggle during India’s first T20I match against Ireland played on June 27 at the Malahide cricket ground in Dublin. As per the reports, he is likely to be available for the ODI series against England scheduled to start from July 12.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">In the first, Bumrah exhibited a phenomenal performance with the ball. In his quota of four overs, he conceded 19 runs and picked 2 wickets at an economy rate of 4.75.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">Post his injury, he arrived at team’s optional training session on Thursday but didn’t train. Later, he was rested in the second face-off along with MS Dhoni, Shikhar Dhawan and Bhuvneshwar Kumar.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">As of now, no replacement has been announced. However, Umesh Yadav may be be given chance in the team in Bumrah’s absence.</p><p style=\"padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">The first T20I match between India and England will be played at Old Trafford, Manchester on July 3.</p>', '2018-06-30 18:49:23', '2019-07-24 02:29:08', '', 0, 'Jasprit-Bumrah-ruled-out-of-England-T20I-series-due-to-injury', '04460672c13849f4143d42a28354d140.jpg'),
(10, 'todays topic is data elements', 15, 12, '<ul><li style=\"box-sizing: inherit; margin-top: 0px; padding: 0px; font-family: Roboto, sans-serif; font-size: 38px; line-height: normal; letter-spacing: -0.5px; color: rgb(51, 51, 51);\">here</li></ul>', '2018-06-30 19:08:56', '2019-08-21 17:34:29', '', 0, 'todays-topic-is-data-elements', '78ca1ffc54334a62f9fa2f102e49b145.jpg'),
(11, 'UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping', 6, 8, '<p>UNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeeping<br></p>', '2018-06-30 19:10:36', '2019-07-28 03:09:46', '', 0, 'UNs-Jean-Pierre-Lacroix-thanks-India-for-contribution-to-peacekeeping', '27095ab35ac9b89abb8f32ad3adef56a.jpg'),
(12, 'Shah holds meeting with NE states leaders in Manipur.', 6, 7, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\">New Delhi: BJP president Amit Shah today held meetings with his party leaders who are in-charge of 11 Lok Sabha seats spread across seven northeast states as part of a drive to ensure that it wins the maximum number of these constituencies in the general election next year.</span><br style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\"><br style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\"><webviewcontentdata style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\">Shah held separate meetings with Lok Sabha toli (group) of Arunachal Pradesh, Tripura, Meghalaya, Mizoram, Nagaland, Sikkim and Manipur in Manipur, the partys media head Anil Baluni said.<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">Baluni said that Shah was in West Bengal for two days before he arrived in Manipur. The BJP chief would reach Odisha tomorrow.</webviewcontentdata><br></p>', '2018-06-30 19:11:44', '2019-08-21 17:34:21', '', 0, 'Shah-holds-meeting-with-NE-states-leaders-in-Manipur.', '7fdc1a630c238af0815181f9faa190f5.jpg'),
(13, 'awarding of certificates', 10, 10, 'every staff was awarded a cert', '2019-07-28 04:09:00', '2019-08-21 17:34:10', '', 0, 'awarding-of-certificates', '969bc92519b00d37d2213db3f195b922.jpg'),
(14, 'Training of workers by the guests continued', 5, 10, '<p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><b><u>The Kenya Medical Practitioners, Pharmacists and Dentists Union Secretary General Sultani Matendechero however, said staff at the Kenyatta National Hospital, were not participating in the mass action.</u></b></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œThe national hospitals will continue running because there is nothing we are complaining about there. However, the problem that we are starting to see is that our people in the national hospitals have started complaining. As we speak there is a meeting at the Moi Teaching and Referral Hospital. The people there are saying that they want to down their tools because the workload is becoming too much,â€ he stated.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Institutions affected included the Coast Provincial General Hospital, Embu Provincial General Hospital as well as other hospitals upcountry where nurses, doctors and clinical officers kept away from work.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">The officers who effectively downed their tools at midnight Monday want their wages to be channelled through the national government and not the counties.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">They are also unhappy with the manner in which the Transition Authority and the Governorsâ€™ Council are handling devolution of health services.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">They maintained that the process of devolving health was inconsistent with the Constitution because no legislation has been established yet to oversee the process.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œ<a href=\"http://Devolution of health services should be anchored on the enactment of a health policy, as provided in the constitution\">Devolution of health services should be anchored on the enactment of a health policy, as provided in the constitution</a>,â€ Panyako stated.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">He appealed to the members of the public, â€œto challenge their leaders to ensure that health services to the public, resume as soon as possible.â€</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">The Central Organization of Trade Unions has also backed the health workers demands to remain under the National Government.</p>', '2019-08-21 17:33:25', '2019-08-21 17:59:00', '', 1, 'Training-of-workers-by-the-guests-continued', 'bcc6ee61a5029dc7a0c42203ccd3233d.jpg'),
(15, 'County workers threaten â€œsalary paradeâ€ over unpaid July salaries', 5, 3, '<p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Workers are not party to the Division of Revenue dispute; hence any delay is illegal and unacceptable,â€ he told a news conference in Nairobi Tuesday.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Duba said any further delay of salaries will make workers undergo untold suffering as they will be unable to meet their basic needs.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œTimely disbursement of salaries ensures that workers are able to meet their financial obligations as and when they become due,â€ he said.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Kenya Medical Practitioners and Dentists Union (KMPDU) Secretary-General Ouma Oluga urged county governments to take the notice seriously to avoid a crisis in county health facilities.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Oluga argued that the division of revenue dispute shouldnâ€™t be an excuse to delay salaries, because counties have a window of asking Treasury for money to pay salaries.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œWe are stating very clearly that within seven days we will take an action and that will be a&nbsp;<em>salary parade</em>&nbsp;â€“ people will be going to parade for their salaries. This means no work will be going on, we donâ€™t want to reach there so we are advising our county governments please pay workers,â€ said Oluga.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Secretary General Kenya National Union of Nurses (KNUN) Seth Panyako also said that any delays in salaries and wages will not be taken lightly.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œStarting Tuesday all workers including cleaners, nurses, doctors even Governorâ€™s drivers will take part in the salary parade,â€ said Panyako.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Council of Governors (CoG) Chairperson Wycliffe Oparanya had earlier on told county staff to prepare for salary delays, and asked them to be patient as they seek avenues to address the matter.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">The notice came even as the Senate held public hearings on the National Assemblyâ€™s version of the controversial Division of Revenue Bill that seeks to have counties allocated Sh316 billion.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">CoG is insisting on Sh335 billion, which President Uhuru Kenyatta said, â€œis too muchâ€.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œGovernors must be realistic in their demands, let them take what is available,â€ he said last week.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Following the dispute, CoG filed a case at the Supreme Court the apex court giving the Speakers of both Houses OF Parliament 14 days to file a joint report on the status of the legislative process.&nbsp;<span class=\"end-bullet\" style=\"color: rgb(10, 145, 195);\"><span class=\"fa fa-square\"></span></span></p><div class=\"post-views post-508471 entry-meta\" style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif;\"><span class=\"post-views-icon dashicons dashicons-chart-bar\" style=\"font-family: dashicons; display: inline-block; line-height: 1; speak: none; text-decoration: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; width: 20px; height: 20px; font-size: 16px; vertical-align: middle; text-align: center; transition: color 0.1s ease-in 0s; margin-right: 0px !important;\"></span>&nbsp;</div>', '2019-08-21 17:38:31', NULL, '', 1, 'County-workers-threaten-â€œsalary-paradeâ€-over-unpaid-July-salaries', '670bbd55fcfca8b7dac35f2f4a6459f7.jpg'),
(16, ' Nurses strike paralyse operations in hospitals within 23 counties', 16, 14, '<p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span class=\"author-byline\" style=\"color: rgb(10, 145, 195); font-weight: 700;\">By&nbsp;<a href=\"https://www.capitalfm.co.ke/news/author/capital-reporter12536/\" style=\"transition: all 0.5s ease 0s; color: rgb(10, 145, 195);\">CAPITAL REPORTER</a></span>,&nbsp;<span style=\"font-weight: 700;\">NAIROBI, Kenya, Feb 4 â€“ Health Services have been paralysed in hospitals within 23 counties as nurses protested delayed allowances and the non-implementation of a Collective Bargaining Agreement (CBA) negotiated in November 2017.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">In Nairobi, Branch Secretary Nairobi Ediah Muruli stated that they will only return to their work place after the return to work formula is fully implemented.</p><div class=\"ad news-ad i1 inner-side inner-ad\" style=\"padding: 10px; min-width: 300px; margin-right: 10px; float: left; color: rgb(51, 51, 51); font-family: Roboto, sans-serif;\"><div class=\"advertisement-wrapper\"><div style=\"margin: 12px; float: left; background: rgb(241, 241, 241); padding: 0px 12px 12px; text-align: center; font-size: 10px;\">ADVERTISEMENT<div id=\"div-gpt-ad-1523450034654-3\" data-google-query-id=\"CISB2-7jk-QCFdPe7QoduygIkA\"><div id=\"google_ads_iframe_/7965891/004/0044_0__container__\" style=\"border: 0pt none; display: inline-block; width: 300px; height: 250px;\"><iframe frameborder=\"0\" src=\"https://tpc.googlesyndication.com/safeframe/1-0-35/html/container.html\" id=\"google_ads_iframe_/7965891/004/0044_0\" title=\"3rd party ad content\" name=\"\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" width=\"300\" height=\"250\" data-is-safeframe=\"true\" sandbox=\"allow-forms allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation\" data-google-container-id=\"6\" data-load-complete=\"true\" style=\"border-width: 0px; border-style: initial; vertical-align: bottom;\"></iframe></div></div></div></div></div><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Some of the issues include uniform allowance to be enhanced by Sh5,000 shillings per year, nursing service allowance to be enhanced by a monthly Sh3,000 and promotions.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œIn Nairobi County, there was a return to work agreement that was signed before the 5-month strike was called off in 2017. This agreement was to be implemented in 2018 from July and up to date, there is nothing that has been done,â€ she stated.</p><figure id=\"attachment_461041\" aria-describedby=\"caption-attachment-461041\" class=\"wp-caption alignleft\" style=\"margin-right: 24px; margin-bottom: 7px; float: left; max-width: 100%; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; width: 630px;\"><a href=\"https://www.capitalfm.co.ke/news/files/2019/02/NURSES-UNION-STRIKE-NAIROBI.jpg\" style=\"transition: all 0.5s ease 0s; color: rgb(10, 145, 195);\"><img src=\"https://www.capitalfm.co.ke/news/files/2019/02/NURSES-UNION-STRIKE-NAIROBI.jpg\" alt=\"\" width=\"630\" height=\"350\" class=\"size-full wp-image-461041\" srcset=\"https://www.capitalfm.co.ke/news/files/2019/02/NURSES-UNION-STRIKE-NAIROBI.jpg 630w, https://www.capitalfm.co.ke/news/files/2019/02/NURSES-UNION-STRIKE-NAIROBI-300x167.jpg 300w\" sizes=\"(max-width: 630px) 100vw, 630px\" style=\"max-width: 100%; width: 630px; display: block; margin: 0px; height: auto !important;\"></a><figcaption id=\"caption-attachment-461041\" class=\"wp-caption-text\" style=\"border-bottom: 1px solid rgb(223, 221, 221); color: rgb(70, 70, 70); font-style: italic; font-size: 12px; padding: 18px 0px 19px;\">In Nairobi, Branch Secretary Nairobi Ediah Muruli stated that they will only return to their work place after the return to work formula is fully implemented/JEMIMAH MUENI</figcaption></figure><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Nurses in Kitui county joined their colleagues and health chief officer Richard Muthoka confirmed that health services in all government hospitals in the county have been paralyzed.</p>', '2019-08-21 17:41:44', NULL, '', 1, '-Nurses-strike-paralyse-operations-in-hospitals-within-23-counties', '670bbd55fcfca8b7dac35f2f4a6459f7.jpg'),
(17, 'Health workers shun Kisumu County hospitals as July pay stalemate persists', 15, 12, '<p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Achar last Thursday announced the County Government of Kisumu would pay its workers the delayed July salaries after mobilizing Sh300 million from its reserves.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">Maurice Opetu, the Branch Chairperson for the Kenya National Union of Nurses (KNUN) on Monday said workers are still waiting for their salaries.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Opetu said health workers are now frustrated by the turn of events as no single coin has credited to their accounts.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">â€œIt is unfortunate that the county government of Kisumu is not caring about the people who voted for them, the citizensâ€™ of Kisumu who need services of the workers,â€ he said.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">Achar had announced on Thursday last week that the county government had mobilized Sh300 million to pay workers and pleaded with them to return to work.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Hospitals services were halted last week when workers started â€œsalary paradesâ€ to demand their delayed funds as a result of a stalemate on the Division of Revenue Bill 2019.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">Hospital beds were seen empty while doors to other services such as laboratories, pharmacies remained under lock and key.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">READ:&nbsp;<a href=\"https://www.capitalfm.co.ke/news/2019/08/kisumu-county-mobilizes-sh300mn-to-clear-july-salaries-for-striking-staff/\" style=\"transition: all 0.5s ease 0s; color: rgb(10, 145, 195);\">Kisumu County mobilizes Sh300mn to clear July salaries for striking staff</a></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">Opetu said the salary parade will continue as county workers demand for the disbursement of funds to pay July salaries and offset arrears for June.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">He said statutory deductions have not been paid for the last three months putting the workers at logger heads with financial institutions.</span></p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\"><span style=\"font-style: inherit; font-weight: inherit;\">â€œRemember our loans are not being serviced and right now we are getting notices that we have not serviced our loans for the last three months,â€ he said.</span></p>', '2019-08-21 17:46:38', NULL, '', 1, 'Health-workers-shun-Kisumu-County-hospitals-as-July-pay-stalemate-persists', '2b49d84bc655036abb8d3e1e34ce8c88.jpg'),
(18, 'NEL donates Sh1.2m beds to Coast General Hospital', 12, 12, '<p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œWe make such donations to hospitals from time to time to ensure patients are catered for in both private and public hospitals,â€ NELâ€™s General Manager Amos Mongâ€™ony said when he handed over the beds to the hospitalâ€™s Chief Administrator Dr Iqbal Khandwalla.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Also present was Mombasa Countyâ€™s Health Minister Mohammed Abdi and the companyâ€™s Mombasa representative Noor Mohammed.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Most public hospitals face an acute shortage of beds and other vital equipment which the national and county governments have pledged to purchase.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">But most counties have lately blamed the national government of delaying funds disbursements to enable them adequately equip hospitals therefore hampering operations.&nbsp;<span class=\"end-bullet\" style=\"color: rgb(10, 145, 195);\"><span class=\"fa fa-square\"></span></span></p>', '2019-08-21 17:56:11', NULL, '', 1, 'NEL-donates-Sh1.2m-beds-to-Coast-General-Hospital', 'd958d66e79fce77fc603f8a7df172d45.jpg'),
(19, 'NEL donates Sh1.2m beds to Coast General Hospital', 12, 12, '<p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">â€œWe make such donations to hospitals from time to time to ensure patients are catered for in both private and public hospitals,â€ NELâ€™s General Manager Amos Mongâ€™ony said when he handed over the beds to the hospitalâ€™s Chief Administrator Dr Iqbal Khandwalla.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Also present was Mombasa Countyâ€™s Health Minister Mohammed Abdi and the companyâ€™s Mombasa representative Noor Mohammed.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">Most public hospitals face an acute shortage of beds and other vital equipment which the national and county governments have pledged to purchase.</p><p style=\"margin-bottom: 10px; color: rgb(112, 112, 112); font-family: Roboto, sans-serif;\">But most counties have lately blamed the national government of delaying funds disbursements to enable them adequately equip hospitals therefore hampering operations.&nbsp;<span class=\"end-bullet\" style=\"color: rgb(10, 145, 195);\"><span class=\"fa fa-square\"></span></span></p>', '2019-08-21 17:57:00', NULL, '', 1, 'NEL-donates-Sh1.2m-beds-to-Coast-General-Hospital', 'd958d66e79fce77fc603f8a7df172d45.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Health Resources', 'Resource Management', '2018-06-22 15:45:38', '2019-09-06 18:32:01', 0),
(5, 3, 'Football', 'Football', '2018-06-30 09:00:58', '2019-07-23 21:54:26', 0),
(6, 2, 'Administration', 'Admission of interns', '2018-06-30 18:59:22', '2019-09-06 18:31:54', 0),
(7, 6, 'Nutrition news', 'Nutrition advise', '2018-06-30 19:04:29', '2019-09-06 18:31:45', 0),
(8, 6, 'International', 'International', '2018-06-30 19:04:43', '2019-07-28 02:27:34', 0),
(9, 7, 'India', 'India', '2018-06-30 19:08:42', '2019-09-06 18:30:34', 0),
(10, 12, 'Guests visit', 'What learnt from the guests', '2019-07-24 00:35:27', '2019-08-21 16:59:09', 1),
(11, 12, 'guests visit', 'was good', '2019-07-24 00:36:28', '2019-08-21 17:02:35', 0),
(12, 15, 'Accounts Records', 'Documents distributed to each department', '2019-07-28 02:23:35', '2019-08-21 17:00:15', 1),
(13, 3, 'Distribution Of Funds.', 'Every department got a share.', '2019-08-21 17:05:11', '2019-08-21 17:10:46', 1),
(14, 16, 'Nurse Say no working.', 'Eventually strike', '2019-08-21 17:06:53', '2019-08-21 17:16:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `gender` enum('m','f') CHARACTER SET latin1 NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(512) NOT NULL,
  `access_level` varchar(16) NOT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `access_level`, `Is_Active`, `token`, `status`, `created`, `modified`) VALUES
(23, 'oscar', 'mureti', 'm', 'oscar@mureti', 'oscar', 'Customer', 0, '', 1, '2019-07-03 05:44:29', '2019-07-29 00:25:53'),
(24, 'karim', 'kanji', 'm', 'karim@kanji', 'karim', 'Customer', 0, '', 1, '2019-07-04 00:15:57', '2019-07-29 00:31:39'),
(34, 'elizabeth', 'mwania', 'f', 'elizabethmwania257@gmail.com', '$2y$10$aITjUH4anA9XahheIfv0A.RM0DBl9Gemi1AWdJOyFe506J.hGp.X.', 'Customer', 1, 'f6028a86b8c689f7ab0c39f0df1ddcf8cf205adeda205e1376ed0bf45ccfe3dcd3aa367c0fd396ddce1e9594f845d34ffff4', 1, '2019-07-09 00:16:39', '2019-08-27 20:32:15'),
(42, 'karis', 'karanja', 'm', 'karim@gmail.com', '$2y$10$dmjg5txzoGw/AqcLlOPHu.TynEXYME/fTmLPiOmaQFJ5D4mSbFcUW', 'Admin', 1, '', 1, '2019-07-25 21:33:03', '2019-07-29 00:25:53'),
(48, 'Fatuma', 'Hussein', 'f', 'fatumahussein@gmail.com', '$2y$10$UcJNGIsZ67Bm/yoIS9EohuXxJ5hk2N93tqZOhjTbdHBB28l8aBr9G', 'Customer', 1, '', 0, '2019-07-28 17:04:46', '2019-07-29 01:04:46'),
(54, 'Karim', 'Kanji', 'm', 'karimkanji101@gmail.com', '$2y$10$5iVM/aO/EmdnFf8Ltp68LeyqHZKDcW43LAFv5jGDAU53CoZPJMPqu', 'Customer', 1, '', 1, '2019-08-07 14:00:56', '2019-08-08 02:04:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `click_count`
--
ALTER TABLE `click_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`post_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `click_count`
--
ALTER TABLE `click_count`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
