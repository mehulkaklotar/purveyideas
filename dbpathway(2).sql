-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2011 at 05:18 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpathway`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text,
  `parent_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `category_mst`
--

CREATE TABLE IF NOT EXISTS `category_mst` (
  `category_id` bigint(50) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `parent_id` bigint(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category_mst`
--

INSERT INTO `category_mst` (`category_id`, `category_name`, `parent_id`) VALUES
(2, 'Gujarat', 4),
(3, 'Ahmedabad', 5),
(4, 'Hospitals', 4),
(5, 'Insitute', 2),
(6, 'Medical', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_mst`
--

CREATE TABLE IF NOT EXISTS `city_mst` (
  `city_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `city_mst`
--

INSERT INTO `city_mst` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'surat', 1),
(2, 'mumbai', 2),
(3, 'banglore', 5),
(4, 'udaipur', 4),
(5, 'christchurch', 3),
(6, 'alahabad', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_title` varchar(500) NOT NULL,
  `cms_short_desc` varchar(1000) NOT NULL,
  `cms_desc` longtext NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `cms_title`, `cms_short_desc`, `cms_desc`) VALUES
(2, 'About Us', 'This is About us .Our Motto is to take our company to heights that no one has ever Reached', '<p><span style="font-size: larger;">Purvey Ideas</span> has successfully emerged in the year 2011 and engaged  in providing online plateform to simplify the need of consumers.We are  amongst the top notch organization that has been invested generously in  research,enhancing information network as well as constant upgradation  of knowledge and information in its process.<br />\n<br />\nWe are a unique combination of simplicity,creativity and passion.We  believe in fulfilling consumer''s need as easy as possible by making the  process almost effortless for them.We are strongly commited to impart  things with so much ease and further compelling consumers to love us.<br />\n<br />\nOur work is based on collaborative effort, hardcore precision and an  urge to be different. Values like integrity, quality, honesty and focus  are the driving force for the Organization.<br />\n<br />\nMost people spend more time and energy on going around the problems  rather than solving it. But according to our perspective ''No problem can  spend the assault of sustained thinking''.<br />\n<br />\nWe, in short, we are a new platform made out of the amalgamation of  need, comfort and wide reach dedicated to be at your service 24X7.</p>\n<p><span style="font-size: large;">OUR MISSION</span>:</p>\n<ul>\n    <li>To create an exceptional and most appropriate online platform for global consumers and providers.</li>\n    <li>To convert local consumers into global consumers by helping them ignore limitation of time and distance.</li>\n    <li>We will save a consumer''s time without compromise by providing almost all the best options across the globe at its disposal.</li>\n    <li>To be primary and always effective for our customers.</li>\n    <li>To give a global exposure to all the consumers by providing best of the brands online.</li>\n    <li>To provide our best of best knowledge and information and to help in resolving the queries of the customers.</li>\n    <li>To maintain the quality at its best and even to upgrade it whenever needed</li>\n</ul>\n<p><span style="font-size: large;">OUR VISION:</span></p>\n<p>To make at least one percent difference in the society by merging business and social responsibilities together and make ourselves an example for all.</p>\n<p>'),
(5, 'Services', 'These are our Services .Our Motto is to take our company to heights that no one has ever Reached', '<p>-<a href="http://www.completeeducation.in">www.completeeducation.in</a> - Education never ends.It goes on through entire life.Recognizing these basics of education over the years through understanding and counseling, attempted to throw light on the realities and challenges in the field of education, we introduced this portal to help children and parents gear up to meet the problems they face.</p>\n<p>It''s an online platform with exhaustive as well as verified information, updates, educational news and events etc. for the students, parents, educationists and entire educational community.</p>\n<p>-<a href="http://www.vidyasthal.com">www.vidyasthal.com</a> - We believe every human being deserves as much as opportunities and choices as possible. Understanding the importance and need of choice, quality and authenticity in Educational institutions information which should be available to the students as well as parents compelled us to form this portal.</p>\n<p>Currently a lot of students are misguided by the information available online. We work on precision of the information and information network with latest updates.Here you can have all the school, college, training centres and other educational institution''s information at a click.</p>\n<p>-<a href="http://www.beshopaholic.com">www.beshopaholic.com</a> - Whoever said money can''t buy happiness simply didn''t know where to go shopping.Over the years we can say everyone has evolved to be become a shopaholic and all credit goes to human needs.</p>\n<p>This is a unique portal challenging the practice of physical shopping across the world.This portal is a revolution to change lifestyle of all human beings across the globe by making them habitual to online shopping of almost anything and everything by making the process as simple and easy as possible so that they love it. A local consumer becomes a global consumer through this portal with a wide range of options at its disposal.</p>\n<p>-<a href="http://www.voyageofworld.com">www.voyageofworld.com</a> - The world is a book, and those who do not travel read only a page.We believe journey is more important than destination so try to make it a pleasurable experience.</p>\n<p>This portal will be providing best of the best tour and holiday package across the world with the facility of online flights, train and bus etc. ticketing as well.Be adventurous and travel the world.Bon Voyage</p>\n<p>- <a href="http://www.propertyarea.com">www.propertyarea.com</a> - No human being but feels more of its worth in the world if he/she has a bit of ground that he/she can call their own.Let us be the solution provider to them through this portal. This portal provides in-depth information on buying, selling and renting out properties across the world. The portal provides ad ideal medium for independent owners, real estate agents and builders to advertise their listings on the Internet and for potential buyers to search for properties in a private, hassle free environment.</p>\n<p>-<a href="http://www.apnihealth.com">www.apnihealth.com</a> - The greatest wealth is health. We help you to retain that not by treating you but by bringing the treatment to your house. This portal will display details of all city and state wise doctors with their specialization. This portal will also display the details of medical stores that too city and state wise. One can have this information as well as buy any of these services online to get at their doorstep. We simplify the whole process by making things easily accessible as well as available to you. We mix love and care our service to help you heal faster.</p>\n<p>'),
(4, 'Contact Us', 'This is where you can Contact us .Our Motto is to take our company to heights that no one has ever Reached', '<p>PurveyIdeas.<br />\n439, Akshar Arcade, Above Dinner Bell Restaurant,<br />\nOpp. Memnagar Fire Station, Navrangpura,<br />\nAhmedabad - 380009.</p>\n<p>Phone Number:- 079 - 40095718</p>'),
(6, 'Profile', 'This is our Profile .Our Motto is to take our company to heights that no one has ever Reached', '<p>dfjiah djhds dfhdjsf dfdsjf dfndsjf dfdsfkjsdffsd gfdgtttttyyt</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact_mst`
--

CREATE TABLE IF NOT EXISTS `contact_mst` (
  `contact_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `anniversary` date NOT NULL,
  `p_add1` text NOT NULL,
  `p_add2` text NOT NULL,
  `p_city` bigint(255) DEFAULT NULL,
  `p_state` bigint(255) NOT NULL,
  `p_country` bigint(255) NOT NULL,
  `p_pincode` bigint(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `o_add1` text NOT NULL,
  `o_add2` text NOT NULL,
  `o_city` bigint(255) NOT NULL,
  `o_state` bigint(255) NOT NULL,
  `o_country` bigint(255) NOT NULL,
  `o_pincode` bigint(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `phone1` bigint(255) NOT NULL,
  `phone2` bigint(255) NOT NULL,
  `mobile1` bigint(255) NOT NULL,
  `mobile2` bigint(255) NOT NULL,
  `fax` bigint(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `email3` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `subscribe` tinyint(4) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `contact_mst`
--

INSERT INTO `contact_mst` (`contact_id`, `f_name`, `l_name`, `gender`, `dob`, `anniversary`, `p_add1`, `p_add2`, `p_city`, `p_state`, `p_country`, `p_pincode`, `org_name`, `o_add1`, `o_add2`, `o_city`, `o_state`, `o_country`, `o_pincode`, `source`, `phone1`, `phone2`, `mobile1`, `mobile2`, `fax`, `email1`, `email2`, `email3`, `website`, `category`, `remarks`, `subscribe`, `group_id`) VALUES
(1, 'rahul', 'Dyma', 'male', '1998-05-04', '0000-00-00', 'dfsgds', 'gfgfg', 1, 1, 1, 45645, 'rrg', 'fghfh', 'fgdhdjf', 1, 1, 1, 45645, ',0', 45764, 4574, 474, 474, 744, 'nbfgjf@dfjh.df', 'fgjfj', 'jfgjf', 'khjkhj', ',3,4,0', 'yrtyurt', 0, '0'),
(13, 'mehul', 'kaklotar', 'male', '2011-05-28', '2011-05-28', 'ved road', 'bar', 6, 4, 1, 395004, 'abc', 'sdghsdsgdyg', 'dsgshgdhsj', 4, 1, 1, 54568, ',0', 565236523, 35263565232, 35625362, 253653, 5326532, 'mahul.kaklotar@yahoo.com', 'jgshsh@hbhb.cvb', 'shbvhb.vdsgvh@vhs.cvb', 'gdhsvdhbhjds.com', ',0', 'sgasdhdhsdhgsgdhgsd', 1, '1'),
(14, 'nitesh', 'pandav', 'male', '1989-10-31', '0000-00-00', 'singanpore road', 'shsjdhsjdhhd', 1, 2, 1, 395004, 'xyz', 'bhasbhbbsjsa', 'hshsnjksjs', 6, 2, 1, 35625362, ',1,6,0', 6372637263, 637637263, 73676287632, 72637863267, 2356537, 'nitesh.pandav@yahoo.com', 'bhbdh@bjdkd.cbhd', ' dbsdbsb.bdhdbbbd@hbdsd.cbhc', 'dvhdsdbhjbd.com', ',0', 'ghsgdhgsghgjsgds', 0, '1'),
(15, 'Jigisha', 'Rathod', 'female', '2006-07-21', '0000-00-00', 'Bardoli', 'Bardoli', 5, 1, 1, 394301, 'jack Solution', 'surat', 'surat', 5, 1, 1, 46334, ',1,0', 6786, 5434, 6454, 467673, 64767, 'abc@test.com', 'aaa@test.com', 'aaa@test.com', 'www.jacksolution.biz', ',2,0', 'testing....', 1, '2'),
(16, 'shdgsdasjkshdg', 'dsjfdh', 'female', '2011-05-18', '2011-05-26', 'dfhkfhds', '', 3, 6, 8, 6564, 'dfkjdshf', 'dfshfdkjsah', 'sjdhsaj', 1, 3, 8, 2454, ',0', 654646, 0, 4765787, 0, 0, 'sdsda@xxds.sdad', '', '', '', ',0', '', 0, '0'),
(17, 'asas', 'asasas', 'female', '2011-05-11', '0000-00-00', 'saasas', 'ddsfds', 4, 4, 9, 4545, 'jdfsjdsk', 'dsodsko', '', 3, 2, 8, 4545454, ',0', 54544, 0, 454545454, 0, 0, 'jsdhsaj@sjdn.dfsajd', '', '', '', ',0', '', 0, '0'),
(18, 'sdasd', 'sadas', 'female', '2011-05-18', '0000-00-00', 'bsajh', 'kasjalkd', 3, 3, 1, 564646, 'sdksjdkjas', 'sajdkasljd', 'jskddjsa', 1, 1, 1, 56565, ',0', 564646, 46464, 5656564646, 0, 0, 'sdsad@sdsd.dsfd', '', '', '', ',0', '', 0, '0'),
(19, 'rahul', 'sharma', 'male', '2011-05-11', '0000-00-00', 'cdsfds', 'dfdgf', 2, 2, 8, 4454, '', '', '', 0, 0, 0, 0, ',0', 0, 0, 4154848485, 0, 0, 'dfgmkdfgm@gffdjg.dffds', '', '', '', ',0', '', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `country_mst`
--

CREATE TABLE IF NOT EXISTS `country_mst` (
  `country_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `country_mst`
--

INSERT INTO `country_mst` (`country_id`, `country_name`) VALUES
(1, 'india'),
(8, 'Australia'),
(9, 'USA'),
(12, 'New Zealand');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`domain_id`, `domain`) VALUES
(1, 'localhost');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_title` varchar(500) NOT NULL,
  `email_text` varchar(1000) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_id`, `email_title`, `email_text`) VALUES
(1, 'sdjksdhkjsa', '<p>sfsfdsfdsgfdsfdfdsfdsfdsfdsfds &amp;&amp;&amp; rsfdffdfds</p>'),
(2, 'asld;lasdskladmaskldm', '<p>xcklfmldfmmdsklfmdslkfmdslkfmdsklfmdskfmdslfm</p>'),
(3, 'ndksjadhj', '<p>zddjakjk &amp;kfd sdaksdfl dsfkmasknjask zxkjfjaskjb djfjsdf</p>'),
(7, 'dflkjsfk', '<p>lkd;lfskdfs;ljd&amp;s;lfjds;lfjdskfjdskn j fjnjqewn#@#$!#@!@!#$#%^&amp;%&amp;(*(</p>');

-- --------------------------------------------------------

--
-- Table structure for table `eschedule`
--

CREATE TABLE IF NOT EXISTS `eschedule` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_msg` longtext NOT NULL,
  `email_schedule` datetime NOT NULL,
  `email_group` varchar(100) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `eschedule`
--

INSERT INTO `eschedule` (`email_id`, `email_msg`, `email_schedule`, `email_group`) VALUES
(1, '<p>zddjakjk &amp;kfd sdaksdfl dsfkmasknjask zxkjfjaskjb djfjsdf</p>', '2011-05-18 14:11:35', '2,3'),
(2, '<p>dfdsfhdhsbf dhdfdhbfjhbfdhsf', '2011-05-20 12:15:32', '2'),
(8, '<p>xcklfmldfmmdsklfmdslkfmdslkfmdsklfmdskfmdslfm</p>', '2011-05-04 20:17:16', '1,2,3,4'),
(5, '<p>skjgfjkdsgfkjg</p>', '2011-05-05 08:10:04', ''),
(6, '<p>skjgfjkdsgfkjg</p>', '2011-05-05 08:10:04', ''),
(12, '<p>xcklfmldfmmdsklfmdslkfmdslkfmdsklfmdskfmdslfm</p>', '2011-05-05 17:17:17', '1,2,3,4'),
(11, '<p>xcklfmldfmmdsklfmdslkfmdslkfmdsklfmdskfmdslfm</p>', '2011-05-05 18:18:18', '1,2,3,4');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `caption`, `name`) VALUES
(20, 'GLOBAL ideas for your business', '20110507044829_baner.JPG'),
(21, 'GREAT Idea Generators', '20110507044851_image1.jpg'),
(22, 'MULTI Ideas Alternatives', '20110507044909_image2.jpg'),
(23, 'GREEN Ideas Cultivation', '20110507044927_image3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'Colleague'),
(2, 'Friend'),
(3, 'Favorite'),
(4, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(30) NOT NULL,
  PRIMARY KEY (`keyword_id`),
  UNIQUE KEY `kw` (`keyword`),
  KEY `keyword` (`keyword`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword`) VALUES
(1, '2011'),
(2, 'alternatives'),
(3, 'business'),
(4, 'company'),
(5, 'contact'),
(6, 'cultivation'),
(7, 'ever'),
(8, 'generators'),
(9, 'has'),
(10, 'heights'),
(11, 'home'),
(12, 'ideas'),
(13, 'motto'),
(14, 'newsletter'),
(15, 'one'),
(16, 'privacy'),
(17, 'profile'),
(18, 'purvey'),
(19, 'reached'),
(20, 'services'),
(21, 'take'),
(22, 'testimonial2'),
(23, 'testimonials'),
(24, 'welcome'),
(25, '112'),
(26, 'aashirwad'),
(27, 'address'),
(28, 'circle'),
(29, 'email'),
(30, 'message'),
(31, 'name'),
(32, 'sosyo'),
(33, 'square'),
(34, 'subject'),
(35, 'surat-394210'),
(36, 'already'),
(37, 'index'),
(38, 'line'),
(39, 'notice'),
(40, 'php'),
(41, 'register'),
(42, 'subscrition'),
(43, 'txtemail'),
(44, 'txtname'),
(45, 'undefined'),
(46, 'wamp'),
(47, 'www'),
(48, 'djfdsf'),
(49, 'djfjds'),
(50, 'fsddsh'),
(51, 'sdhdsj'),
(52, 'sdjfhjds'),
(53, 'testimonial1'),
(54, 'testimonial2testimonial2'),
(55, 'reachedthis');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fulltxt` mediumtext,
  `indexdate` date DEFAULT NULL,
  `size` float DEFAULT NULL,
  `md5sum` varchar(32) DEFAULT NULL,
  `visible` int(11) DEFAULT '0',
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `url` (`url`),
  KEY `md5key` (`md5sum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `site_id`, `url`, `title`, `description`, `fulltxt`, `indexdate`, `size`, `md5sum`, `visible`, `level`) VALUES
(1, 1, 'http://localhost/purvey/', 'Welcome to Purvey Ideas', '', '\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n \r\n\r\n \r\n        \r\n          \r\n         \r\n        \r\n           \r\n           \r\n\r\n            \r\n           \r\n           \r\n           \r\n           \r\n            \r\n            \r\n            \r\n         \r\n         \r\n  \r\n    \r\n\r\n  \r\n   \r\n  \r\n      \r\n        \r\n\r\n             \r\n              HOME  \r\n               ABOUT US  \r\n                SERVICES  \r\n                CONTACT US  \r\n           \r\n                   \r\n             \r\n                 \r\n                   G l o b a l  \r\n                        ideas for \r\n                             your \r\n                            business   \r\n                  \r\n                 \r\n                    G R E A T  \r\n                        Ideas \r\n                             Generators \r\n                              \r\n                  \r\n                 \r\n                     M U L T I  \r\n                        Ideas  \r\n                             Alternatives \r\n                             \r\n                  \r\n                 \r\n                     G R E E N  \r\n                        Ideas  \r\n                             Cultivation \r\n                              \r\n                   \r\n                   \r\n                \r\n              \r\n               \r\n                        	\r\n              \r\n              \r\n              \r\n              \r\n              \r\n               \r\n              \r\n             \r\n           \r\n          \r\n         \r\n          \r\n                \r\n                     \r\n                        Newsletter\r\n                      \r\n                     \r\n                     \r\n                       \r\n                        \r\n                      \r\n                     \r\n                        \r\n                         \r\n                      \r\n                  \r\n            \r\n           \r\n          \r\n              \r\n                  Welcome!\r\n               \r\n              \r\n             	                 This is our Profile .Our Motto is to take our company to heights that no one has ever Reached               \r\n              \r\n                \r\n               \r\n           \r\n          \r\n              \r\n                  About Us\r\n               \r\n              \r\n                                 This is About us .Our Motto is to take our company to heights that no one has ever Reached               \r\n              \r\n                \r\n               \r\n\r\n           \r\n           \r\n           \r\n          \r\n      \r\n          \r\n       \r\n       \r\n          \r\n          \r\n         \r\n              \r\n                   Testimonials\r\n               \r\n              \r\n                \r\n                \r\n                testimonial2 \r\n              \r\n            \r\n         \r\n          \r\n          \r\n                 \r\n                  \r\n               \r\n              \r\n                testimonial2               \r\n              \r\n                  \r\n               \r\n              \r\n                \r\n                \r\n            \r\n           \r\n\r\n         \r\n          \r\n         \r\n      \r\n     Purvey Ideas @ 2011| PRIVACY \r\n      \r\n \r\n \r\n\r\n \r\n \r\n', '2011-05-14', 10.32, '0ace8bfc258858194bbcdc09a4397e04', 0, 0),
(2, 1, 'http://localhost/purvey/contactus.php', 'Welcome to Purvey Ideas', '', '\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n \r\n\r\n \r\n        \r\n          \r\n         \r\n        \r\n           \r\n           \r\n\r\n            \r\n           \r\n           \r\n           \r\n           \r\n            \r\n            \r\n            \r\n         \r\n         \r\n  \r\n    \r\n \r\n \r\n  \r\n   \r\n  \r\n      \r\n        \r\n\r\n             \r\n               HOME  \r\n               ABOUT US  \r\n                SERVICES  \r\n               CONTACT US  \r\n           \r\n                   \r\n                       \r\n                 Contact Us                \r\n             \r\n                \r\n                   Address:  \r\n                    112 Aashirwad Square, \r\n                    Sosyo Circle,\r\n                    Surat-394210\r\n                  \r\n                 \r\n                 \r\n						\r\n                           \r\n                             \r\n                           \r\n                           \r\n                               \r\n                               \r\n                           \r\n                           \r\n                             Name: \r\n                              \r\n                           \r\n                           \r\n                             Email: \r\n                              \r\n                           \r\n                           \r\n                             Subject: \r\n                              \r\n                           \r\n                           \r\n                            Message: \r\n                               \r\n                           \r\n                            \r\n                            \r\n                           \r\n                               \r\n                                \r\n                           \r\n                         \r\n \r\n                \r\n                \r\n            \r\n            \r\n          \r\n           \r\n      \r\n          \r\n       \r\n     \r\n      \r\n     Purvey Ideas @ 2011| PRIVACY \r\n      \r\n \r\n \r\n\r\n \r\n \r\n', '2011-05-14', 4.62, '51d15e4abee24078fc4a3279732b853e', 0, 1),
(3, 1, 'http://localhost/purvey/newsletter.php', 'Welcome to Purvey Ideas', '', '\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n \r\n\r\n \r\n        \r\n          \r\n         \r\n        \r\n           \r\n           \r\n\r\n            \r\n           \r\n           \r\n           \r\n           \r\n            \r\n            \r\n            \r\n         \r\n         \r\n  \r\n     \r\n   \r\n  \r\n      \r\n        \r\n\r\n             \r\n               HOME  \r\n               ABOUT US  \r\n                SERVICES  \r\n                CONTACT US  \r\n           \r\n                   \r\n           \r\n            \r\n                 Newsletter\r\n                \r\n              \n Notice :  Undefined index: txtname in  C:\\wamp\\www\\purvey\\newsletter.php  on line  13 \n\n Notice :  Undefined index: txtemail in  C:\\wamp\\www\\purvey\\newsletter.php  on line  14 \n              \r\n             \r\n              \r\n                  \r\n               \r\n               \r\n                Your email address is already register for newsletter subscrition.                \r\n                \r\n                  \r\n            \r\n\r\n         \r\n          \r\n                \r\n            \r\n            \r\n          \r\n           \r\n      \r\n          \r\n       \r\n    \r\n      \r\n     Purvey Ideas @ 2011| PRIVACY \r\n      \r\n \r\n \r\n\r\n \r\n \r\n', '2011-05-14', 2.89, 'f39c06c1732ea61040321e7424466a43', 0, 1),
(4, 1, 'http://localhost/purvey/services.php', 'Welcome to Purvey Ideas', '', '\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n \r\n\r\n \r\n        \r\n          \r\n         \r\n        \r\n           \r\n           \r\n\r\n            \r\n           \r\n           \r\n           \r\n           \r\n            \r\n            \r\n            \r\n         \r\n         \r\n  \r\n     \r\n   \r\n  \r\n      \r\n        \r\n\r\n             \r\n               HOME  \r\n               ABOUT US  \r\n               SERVICES  \r\n                CONTACT US  \r\n           \r\n                   \r\n                       \r\n                 Services                \r\n              \r\n                 fsddsh sdhdsj sdjfhjds djfdsf djfjds                \r\n                \r\n            \r\n            \r\n          \r\n           \r\n      \r\n          \r\n       \r\n    \r\n      \r\n     Purvey Ideas @ 2011| PRIVACY \r\n      \r\n \r\n \r\n\r\n \r\n \r\n\r\n', '2011-05-14', 2.27, '2f648b0c574661369b242dff6a9066f9', 0, 1),
(5, 1, 'http://localhost/purvey/testimonials.php', 'Welcome to Purvey Ideas', '', '\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n \r\n\r\n \r\n        \r\n          \r\n         \r\n        \r\n           \r\n           \r\n\r\n            \r\n           \r\n           \r\n           \r\n           \r\n            \r\n            \r\n            \r\n         \r\n         \r\n  \r\n     \r\n   \r\n  \r\n      \r\n        \r\n\r\n             \r\n               HOME  \r\n               ABOUT US  \r\n                SERVICES  \r\n                CONTACT US  \r\n           \r\n                   \r\n            \r\n                   Testimonials:\r\n               \r\n            \r\n                \r\n         \r\n               \r\n                  testimonial2               \r\n              \r\n                \r\n               \r\n                 \r\n              \r\n            \r\n         \r\n          \r\n          \r\n                 \r\n                  \r\n                 \r\n                \r\n                    testimonial2testimonial2testimonial2testimonial2 \r\n testimonial2testimonial2 \r\n testimonial2testimonial2testimonial2testimonial2 \r\n testimonial2testimonial2testimonial2testimonial2 \r\n                      \r\n              \r\n            \r\n           \r\n                  \r\n            \r\n\r\n         \r\n          \r\n        \r\n              \r\n         \r\n               \r\n                  testimonial1               \r\n              \r\n                \r\n               \r\n                 \r\n              \r\n            \r\n         \r\n          \r\n          \r\n                 \r\n                  \r\n                 \r\n                \r\n                    testimonial1                    \r\n              \r\n            \r\n           \r\n                  \r\n            \r\n\r\n         \r\n          \r\n        \r\n               \r\n             \r\n               \r\n            \r\n          \r\n           \r\n      \r\n          \r\n       \r\n    \r\n      \r\n     Purvey Ideas @ 2011| PRIVACY \r\n      \r\n \r\n \r\n\r\n \r\n \r\n', '2011-05-14', 4.23, '4f456c7f3f295811b8998c98c93eb68e', 0, 1),
(6, 1, 'http://localhost/purvey/aboutus.php', 'Welcome to Purvey Ideas', '', '\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n\r\n \r\n\r\n \r\n        \r\n          \r\n         \r\n        \r\n           \r\n           \r\n\r\n            \r\n           \r\n           \r\n           \r\n           \r\n            \r\n            \r\n            \r\n         \r\n         \r\n  \r\n     \r\n   \r\n  \r\n      \r\n        \r\n\r\n             \r\n               HOME  \r\n              ABOUT US  \r\n                SERVICES  \r\n                CONTACT US  \r\n           \r\n                   \r\n                       \r\n                 About Us                \r\n              \r\n                 This is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever ReachedThis is About us .Our Motto is to take our company to heights that no one has ever Reached                \r\n                \r\n            \r\n            \r\n          \r\n           \r\n      \r\n          \r\n       \r\n    \r\n      \r\n     Purvey Ideas @ 2011| PRIVACY \r\n      \r\n \r\n \r\n\r\n \r\n \r\n', '2011-05-14', 2.94, '41efbd6df3b4dc2cadece715d4556557', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword0`
--

CREATE TABLE IF NOT EXISTS `link_keyword0` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword0`
--

INSERT INTO `link_keyword0` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(2, 29, 8, 1),
(3, 29, 8, 1),
(4, 52, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword1`
--

CREATE TABLE IF NOT EXISTS `link_keyword1` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword1`
--

INSERT INTO `link_keyword1` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 20, 8, 1),
(1, 13, 58, 1),
(1, 11, 8, 1),
(2, 20, 8, 1),
(2, 11, 8, 1),
(2, 26, 8, 1),
(3, 20, 8, 1),
(3, 11, 8, 1),
(3, 36, 8, 1),
(4, 20, 16, 1),
(4, 11, 8, 1),
(4, 48, 8, 1),
(5, 20, 8, 1),
(5, 11, 8, 1),
(6, 20, 8, 1),
(6, 13, 191, 1),
(6, 11, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword2`
--

CREATE TABLE IF NOT EXISTS `link_keyword2` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword2`
--

INSERT INTO `link_keyword2` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 16, 41, 1),
(1, 5, 8, 1),
(2, 33, 8, 1),
(2, 16, 8, 1),
(2, 5, 16, 1),
(3, 42, 8, 1),
(3, 16, 8, 1),
(3, 5, 16, 1),
(4, 16, 8, 1),
(4, 5, 8, 1),
(5, 16, 8, 1),
(5, 5, 8, 1),
(6, 16, 133, 1),
(6, 5, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword3`
--

CREATE TABLE IF NOT EXISTS `link_keyword3` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword3`
--

INSERT INTO `link_keyword3` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 9, 16, 1),
(4, 49, 8, 1),
(6, 9, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword4`
--

CREATE TABLE IF NOT EXISTS `link_keyword4` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword4`
--

INSERT INTO `link_keyword4` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 24, 258, 1),
(1, 8, 24, 1),
(1, 2, 33, 1),
(2, 24, 191, 1),
(3, 47, 16, 1),
(3, 24, 174, 1),
(4, 24, 183, 1),
(5, 24, 183, 1),
(6, 24, 449, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword5`
--

CREATE TABLE IF NOT EXISTS `link_keyword5` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword5`
--

INSERT INTO `link_keyword5` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(3, 45, 16, 1),
(4, 51, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword6`
--

CREATE TABLE IF NOT EXISTS `link_keyword6` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword6`
--

INSERT INTO `link_keyword6` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 21, 24, 1),
(3, 38, 16, 1),
(3, 37, 24, 1),
(6, 21, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword7`
--

CREATE TABLE IF NOT EXISTS `link_keyword7` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword7`
--

INSERT INTO `link_keyword7` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 17, 8, 1),
(2, 30, 8, 1),
(2, 25, 16, 1),
(3, 46, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword8`
--

CREATE TABLE IF NOT EXISTS `link_keyword8` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword8`
--

INSERT INTO `link_keyword8` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(2, 27, 8, 1),
(3, 27, 8, 1),
(5, 54, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyword9`
--

CREATE TABLE IF NOT EXISTS `link_keyword9` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyword9`
--

INSERT INTO `link_keyword9` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 23, 8, 1),
(1, 18, 183, 1),
(1, 14, 8, 1),
(1, 6, 8, 1),
(1, 4, 16, 1),
(2, 32, 8, 1),
(2, 18, 183, 1),
(2, 28, 8, 1),
(3, 41, 8, 1),
(3, 18, 199, 1),
(3, 14, 33, 1),
(4, 18, 183, 1),
(5, 23, 8, 1),
(5, 53, 16, 1),
(5, 18, 183, 1),
(6, 55, 58, 1),
(6, 18, 183, 1),
(6, 4, 141, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyworda`
--

CREATE TABLE IF NOT EXISTS `link_keyworda` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyworda`
--


-- --------------------------------------------------------

--
-- Table structure for table `link_keywordb`
--

CREATE TABLE IF NOT EXISTS `link_keywordb` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keywordb`
--

INSERT INTO `link_keywordb` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 12, 216, 1),
(2, 34, 8, 1),
(2, 31, 8, 1),
(2, 12, 183, 1),
(3, 12, 183, 1),
(4, 12, 183, 1),
(5, 12, 183, 1),
(6, 12, 183, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keywordc`
--

CREATE TABLE IF NOT EXISTS `link_keywordc` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keywordc`
--

INSERT INTO `link_keywordc` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 7, 33, 1),
(1, 1, 16, 1),
(2, 35, 8, 1),
(2, 1, 8, 1),
(3, 1, 16, 1),
(4, 50, 8, 1),
(4, 1, 16, 1),
(5, 1, 16, 1),
(6, 7, 66, 1),
(6, 1, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keywordd`
--

CREATE TABLE IF NOT EXISTS `link_keywordd` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keywordd`
--

INSERT INTO `link_keywordd` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 22, 16, 1),
(5, 22, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keyworde`
--

CREATE TABLE IF NOT EXISTS `link_keyworde` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keyworde`
--

INSERT INTO `link_keyworde` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 10, 16, 1),
(3, 44, 8, 1),
(3, 40, 24, 1),
(3, 39, 16, 1),
(6, 10, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_keywordf`
--

CREATE TABLE IF NOT EXISTS `link_keywordf` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_keywordf`
--

INSERT INTO `link_keywordf` (`link_id`, `keyword_id`, `weight`, `domain`) VALUES
(1, 19, 24, 1),
(1, 15, 24, 1),
(1, 3, 8, 1),
(3, 43, 8, 1),
(6, 19, 8, 1),
(6, 15, 124, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` date NOT NULL,
  `news_sub` text NOT NULL,
  `news_content` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`news_id`, `date_added`, `news_sub`, `news_content`) VALUES
(8, '2011-04-04', 'News release...', '<p>adfhoaj</p>'),
(9, '2011-05-06', 'News1', '<p>sogjuosjg</p>'),
(10, '2011-05-25', 'jskdgfj', '<p>kjghkjsgkj</p>'),
(11, '2011-05-25', 'jskdgfj', '<p>kjghkjsgkj</p>'),
(12, '2011-05-25', 'ghghgh', '<p>ghghghghghgh1111111</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE IF NOT EXISTS `pending` (
  `site_id` int(11) DEFAULT NULL,
  `temp_id` varchar(32) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--


-- --------------------------------------------------------

--
-- Table structure for table `query_log`
--

CREATE TABLE IF NOT EXISTS `query_log` (
  `query` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `elapsed` float DEFAULT NULL,
  `results` int(11) DEFAULT NULL,
  KEY `query_key` (`query`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_log`
--

INSERT INTO `query_log` (`query`, `time`, `elapsed`, `results`) VALUES
('this is', '2011-05-14 12:28:54', 0.01, 0),
('testimonial', '2011-05-14 12:29:09', 0.07, 0),
('testimonial1', '2011-05-14 12:29:11', 0.05, 1),
('testimonail', '2011-05-14 12:33:05', 0.01, 0),
('testimonial1', '2011-05-14 12:33:14', 0.01, 1),
('testimonial', '2011-05-14 12:36:16', 0, 0),
('testimonial1', '2011-05-14 12:36:20', 0.01, 1),
('hi', '2011-05-14 12:40:43', 0, 0),
('hi', '2011-05-14 12:41:37', 0, 0),
('hi', '2011-05-14 12:41:38', 0, 0),
('hi', '2011-05-14 12:45:23', 0, 0),
('testimonial', '2011-05-14 12:45:45', 0.01, 0),
('testimonial', '2011-05-14 12:45:47', 0, 0),
('testimonial1', '2011-05-14 12:45:54', 0.01, 1),
('about', '2011-05-14 12:47:00', 0, 0),
('about us', '2011-05-14 12:47:08', 0, 0),
('Sosyo Circle, ', '2011-05-14 12:47:27', 0.01, 0),
('Sosyo Circle, ', '2011-05-14 12:47:31', 0.01, 0),
('Sosyo Circle, ', '2011-05-14 12:47:37', 0.01, 0),
('Sosyo Circle, ', '2011-05-14 12:47:40', 0.01, 0),
('Sosyo Circle, ', '2011-05-14 12:47:50', 0.01, 0),
('Sosyo Circle', '2011-05-14 12:47:56', 0.01, 1),
('testimonial', '2011-05-14 12:48:14', 0, 0),
('testimonial', '2011-05-14 12:48:58', 0, 0),
('testimonial', '2011-05-14 12:50:51', 0, 0),
('testimonial', '2011-05-14 12:51:29', 0, 0),
('testimonial', '2011-05-14 12:51:34', 0, 0),
('testimonial', '2011-05-14 12:51:38', 0, 0),
('testimonial', '2011-05-14 12:51:42', 0, 0),
('testimonial', '2011-05-14 12:51:49', 0.01, 0),
('testimonial', '2011-05-14 12:52:00', 0.01, 0),
('testimonial', '2011-05-14 12:52:05', 0.01, 0),
('testimonial', '2011-05-14 12:52:12', 0, 0),
('testimonial', '2011-05-14 12:52:49', 0, 0),
('testimonial', '2011-05-14 12:55:47', 0, 0),
('testimonial1', '2011-05-14 12:56:03', 0, 1),
('testimonial1', '2011-05-14 12:57:59', 0, 1),
('testimonial', '2011-05-14 12:58:57', 0, 0),
('testimonial', '2011-05-14 13:02:05', 0, 0),
('testimonial', '2011-05-14 13:02:18', 0, 0),
('testimonial1', '2011-05-14 13:02:27', 0, 1),
('testimonial1', '2011-05-14 13:03:04', 0.01, 1),
('testimonial1', '2011-05-14 13:03:46', 0.01, 1),
('testimonial1', '2011-05-14 13:06:31', 0.01, 1),
('testimonial', '2011-05-14 13:06:42', 0, 0),
('testimonial1', '2011-05-14 13:07:53', 0.01, 1),
('testimonial1', '2011-05-14 13:09:12', 0.01, 1),
('testimonial1', '2011-05-14 13:09:13', 0.01, 1),
('testimonial1', '2011-05-14 13:09:13', 0.01, 1),
('testimonial1', '2011-05-14 13:09:14', 0, 1),
('testimonial1', '2011-05-14 13:09:14', 0.01, 1),
('testimonial1', '2011-05-14 13:10:33', 0.01, 1),
('testimonial1', '2011-05-14 13:10:33', 0.01, 1),
('testimonial1', '2011-05-14 13:10:33', 0, 1),
('testimonial1', '2011-05-14 13:10:34', 0, 1),
('testimonial1', '2011-05-14 13:10:35', 0, 1),
('testimonial1', '2011-05-14 13:10:37', 0.01, 1),
('testimonial1', '2011-05-14 13:10:39', 0.01, 1),
('testimonial1', '2011-05-14 13:10:40', 0.01, 1),
('testimonial1', '2011-05-14 13:10:42', 0.01, 1),
('testimonial1', '2011-05-14 13:10:42', 0.01, 1),
('testimonial1', '2011-05-14 13:10:42', 0.01, 1),
('testimonial1', '2011-05-14 13:10:42', 0, 1),
('testimonial1', '2011-05-14 13:10:43', 0.01, 1),
('testimonial1', '2011-05-14 13:10:44', 0.01, 1),
('testimonial1', '2011-05-14 13:10:45', 0, 1),
('testimonial1', '2011-05-14 13:10:45', 0, 1),
('testimonial1', '2011-05-14 13:12:01', 0, 1),
('testimonial1', '2011-05-14 13:12:01', 0.01, 1),
('testimonial1', '2011-05-14 13:12:01', 0.01, 1),
('testimonial1', '2011-05-14 13:12:02', 0.01, 1),
('testimonial1', '2011-05-14 13:12:02', 0, 1),
('testimonial1', '2011-05-14 13:12:34', 0, 1),
('testimonial1', '2011-05-14 13:13:13', 0.01, 1),
('testimonial1', '2011-05-14 13:13:15', 0, 1),
('testimonial1', '2011-05-14 13:13:16', 0.01, 1),
('testimonial1', '2011-05-14 13:13:24', 0, 1),
('testimonial1', '2011-05-14 13:14:50', 0, 1),
('testimonial1', '2011-05-14 13:14:52', 0, 1),
('testimonial1', '2011-05-14 13:15:02', 0, 1),
('testimonial1', '2011-05-14 13:15:13', 0, 1),
('testimonial1', '2011-05-14 13:15:25', 0.01, 1),
('This is About us', '2011-05-14 13:17:28', 0, 0),
('This is about us', '2011-05-14 13:17:44', 0, 0),
('motto about', '2011-05-14 13:17:56', 0.05, 2),
('motto', '2011-05-14 13:19:03', 0.01, 2),
('motto', '2011-05-14 13:19:25', 0.01, 2),
('motto', '2011-05-14 13:19:26', 0.01, 2),
('motto', '2011-05-14 13:19:37', 0.01, 2),
('motto', '2011-05-14 13:20:20', 0.01, 2),
('motto', '2011-05-14 13:27:25', 0.01, 2),
('testimonial', '2011-05-14 13:29:31', 0, 0),
('testimonial1', '2011-05-14 13:29:33', 0.01, 1),
('testimonial', '2011-05-14 13:29:57', 0, 0),
('testimonial', '2011-05-14 13:30:32', 0, 0),
('testimonial', '2011-05-14 13:31:22', 0, 0),
('testimonial', '2011-05-14 13:32:17', 0, 0),
('testimonial', '2011-05-14 13:32:43', 0, 0),
('testimonial', '2011-05-14 13:32:48', 0.01, 0),
('testimonial', '2011-05-14 13:33:32', 0, 0),
('testimonial', '2011-05-14 13:33:44', 0, 0),
('testimonial', '2011-05-14 13:33:52', 0, 0),
('testimonial', '2011-05-14 13:37:26', 0.01, 0),
('testimonial', '2011-05-14 13:38:02', 0, 0),
('testimonial', '2011-05-14 13:38:58', 0, 0),
('testimonial', '2011-05-14 13:39:23', 0, 0),
('testimonial', '2011-05-14 13:39:32', 0, 0),
('testimonial', '2011-05-14 13:40:42', 0, 0),
('testimonial', '2011-05-14 13:40:55', 0, 0),
('testimonial', '2011-05-14 13:41:09', 0, 0),
('testimonial', '2011-05-14 13:41:10', 0, 0),
('testimonial', '2011-05-14 13:41:11', 0, 0),
('testimonial', '2011-05-14 13:41:11', 0, 0),
('testimonial', '2011-05-14 13:41:15', 0, 0),
('testimonial', '2011-05-14 13:41:15', 0, 0),
('testimonial', '2011-05-14 13:41:15', 0, 0),
('testimonial', '2011-05-14 13:41:16', 0, 0),
('testimonial', '2011-05-14 13:41:56', 0, 0),
('testimonial', '2011-05-14 13:42:05', 0.01, 0),
('testimonial', '2011-05-14 13:42:10', 0, 0),
('testimonial', '2011-05-14 13:42:35', 0, 0),
('testimonial', '2011-05-14 13:42:54', 0, 0),
('testimonial', '2011-05-14 13:42:59', 0, 0),
('testimonial', '2011-05-14 13:43:09', 0, 0),
('testimonial', '2011-05-14 13:43:09', 0, 0),
('testimonial', '2011-05-14 13:43:10', 0.01, 0),
('testimonial', '2011-05-14 13:43:10', 0, 0),
('testimonial', '2011-05-14 13:43:10', 0, 0),
('testimonial', '2011-05-14 13:43:10', 0, 0),
('testimonial', '2011-05-14 13:44:25', 0, 0),
('testimonial', '2011-05-14 13:44:31', 0, 0),
('testimonial', '2011-05-14 13:44:43', 0, 0),
('testimonial', '2011-05-14 13:44:53', 0, 0),
('testimonial', '2011-05-14 13:45:01', 0, 0),
('testimonial', '2011-05-14 13:45:10', 0, 0),
('testimonial', '2011-05-14 13:45:12', 0, 0),
('testimonial', '2011-05-14 13:45:13', 0, 0),
('testimonial', '2011-05-14 13:45:20', 0, 0),
('testimonial', '2011-05-14 13:45:21', 0, 0),
('testimonial', '2011-05-14 13:45:21', 0, 0),
('testimonial', '2011-05-14 13:45:21', 0, 0),
('testimonial', '2011-05-14 13:45:28', 0, 0),
('testimonial', '2011-05-14 13:45:28', 0, 0),
('testimonial', '2011-05-14 13:45:28', 0, 0),
('testimonial', '2011-05-14 13:45:29', 0, 0),
('testimonial', '2011-05-14 13:45:45', 0, 0),
('testimonial', '2011-05-14 13:45:54', 0, 0),
('testimonial', '2011-05-14 13:45:54', 0, 0),
('testimonial', '2011-05-14 13:45:55', 0, 0),
('testimonial', '2011-05-14 13:45:55', 0, 0),
('testimonial', '2011-05-14 13:46:56', 0, 0),
('testimonial', '2011-05-14 13:47:02', 0, 0),
('testimonial', '2011-05-14 13:47:09', 0, 0),
('testimonial', '2011-05-14 13:47:15', 0, 0),
('testimonial', '2011-05-14 13:47:22', 0, 0),
('testimonial', '2011-05-14 13:50:58', 0, 0),
('testimonial1', '2011-05-14 13:51:09', 0.01, 1),
('testimonial1', '2011-05-14 13:51:22', 0, 1),
('mottto', '2011-05-14 13:51:46', 0, 0),
('motto', '2011-05-14 13:51:49', 0.01, 2),
('motto', '2011-05-14 13:52:00', 0.01, 2),
('aboutus', '2011-05-14 13:52:16', 0, 0),
('testimonial', '2011-05-14 23:54:23', 0.06, 0),
('testimonial1', '2011-05-14 23:54:29', 0.08, 1),
('motto', '2011-05-14 23:54:40', 0.05, 2),
('testimonial', '2011-05-22 15:03:07', 0.12, 0),
('testimonial1', '2011-05-22 15:03:11', 0.16, 1),
('testimonia', '2011-05-22 15:03:49', 0.05, 0),
('testimonial', '2011-05-22 15:03:58', 0.01, 0),
('testimonial1', '2011-05-22 15:04:03', 0, 1),
('abc', '2011-05-22 15:06:25', 0, 0),
('Search Site...', '2011-05-24 13:24:50', 0.01, 0),
('hello', '2011-05-24 13:25:00', 0.01, 0),
('abouus', '2011-05-24 13:25:07', 0.01, 0),
('motto', '2011-05-24 13:25:19', 0.06, 2),
('testimonial', '2011-05-27 19:39:09', 0.01, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `right_id` int(11) NOT NULL AUTO_INCREMENT,
  `right_name` varchar(100) NOT NULL,
  PRIMARY KEY (`right_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`right_id`, `right_name`) VALUES
(1, 'Home'),
(2, 'Masters'),
(3, 'Groups'),
(4, 'Contact'),
(5, 'Search'),
(6, 'Security'),
(7, 'Reports'),
(8, 'Settings'),
(9, 'Backup'),
(10, 'News Letter'),
(11, 'CMS'),
(12, 'SMS Schedule'),
(13, 'Gallery'),
(14, 'Template');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_msg` varchar(1000) NOT NULL,
  `sms_mask` varchar(50) NOT NULL,
  `sms_schedule` datetime NOT NULL,
  `sms_group` varchar(200) NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sms_id`, `sms_msg`, `sms_mask`, `sms_schedule`, `sms_group`) VALUES
(2, 'first first first', 'PM-pqr', '2011-04-05 05:23:11', '1'),
(3, 'dfda', 'da', '0000-00-00 00:00:00', '1'),
(4, 'fadfa', 'PG-abc', '0000-00-00 00:00:00', '1'),
(5, 'gdfgdfghds', 'PM-pqr', '2011-05-07 10:04:02', '1'),
(6, 'first first first', 'PG-abc', '2011-05-18 07:07:10', '1'),
(13, 'first first first', 'PG-abc', '2011-05-24 03:03:02', '1'),
(12, 'first first first', 'PG-abc', '2011-05-24 03:03:02', '4');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `rpp` varchar(100) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `mask` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`rpp`, `eid`, `mask`) VALUES
('5,50,100,200', 'abc@xyz.com', 'PG-abc,PM-pqr');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_desc` text,
  `indexdate` date DEFAULT NULL,
  `spider_depth` int(11) DEFAULT '2',
  `required` text,
  `disallowed` text,
  `can_leave_domain` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `url`, `title`, `short_desc`, `indexdate`, `spider_depth`, `required`, `disallowed`, `can_leave_domain`) VALUES
(1, 'http://localhost/purvey/', 'Purvey ', '', '2011-05-14', -1, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_category`
--

CREATE TABLE IF NOT EXISTS `site_category` (
  `site_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `sms_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_username` varchar(100) NOT NULL,
  `sms_password` varchar(100) NOT NULL,
  `sms_domain` varchar(100) NOT NULL,
  PRIMARY KEY (`sms_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_user_id`, `sms_username`, `sms_password`, `sms_domain`) VALUES
(1, 'abc1', 'pqr2', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `sms_template`
--

CREATE TABLE IF NOT EXISTS `sms_template` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_title` varchar(500) NOT NULL,
  `sms_text` varchar(1000) NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sms_template`
--

INSERT INTO `sms_template` (`sms_id`, `sms_title`, `sms_text`) VALUES
(1, 'first', 'first first first'),
(2, 'kdsjfhkjdsgf', 'kjdfkjdsfkjdskjg');

-- --------------------------------------------------------

--
-- Table structure for table `source_mst`
--

CREATE TABLE IF NOT EXISTS `source_mst` (
  `source_id` bigint(50) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(255) NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `source_mst`
--

INSERT INTO `source_mst` (`source_id`, `source_name`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(6, 'Computers');

-- --------------------------------------------------------

--
-- Table structure for table `state_mst`
--

CREATE TABLE IF NOT EXISTS `state_mst` (
  `state_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `state_mst`
--

INSERT INTO `state_mst` (`state_id`, `state_name`, `country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Maharastra', 1),
(3, 'Auckland', 12),
(4, 'Rajasthan', 1),
(5, 'Karnataka', 1),
(6, 'Uttar Pradesh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sysadmin`
--

CREATE TABLE IF NOT EXISTS `sysadmin` (
  `user_id` bigint(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emailid` varchar(1000) NOT NULL,
  `rights` varchar(100) NOT NULL,
  `subrights` varchar(200) NOT NULL,
  `ssrights` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sysadmin`
--

INSERT INTO `sysadmin` (`user_id`, `username`, `password`, `emailid`, `rights`, `subrights`, `ssrights`) VALUES
(1, 'admin1', 'admin1', 'fdghf@ddfhdsu.dhdsu', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', '2.1,2.2,2.3,3.1,3.2,3.3,4.1,4.2,4.3,6.1,6.2,6.3,10.1,10.2,10.3,11.1,11.2,11.3,12.1,12.2,12.3,13.1,13.2,13.3,14.1,14.2,14.3', '4.1.1,4.1.2,4.1.3,4.1.4,4.2.1,4.2.2,4.2.3,4.2.4'),
(2, 'jigi', '123456', 'jdhkasjdh@fjds.dfkjhdsf', '1,2,4,6,7,10,11', '2.1,2.2,6.1,6.2,10.1,10.2', ''),
(3, 'rahul', 'admin1', 'ashysay@xbdsh.dh', '1,2,4,5,6,7', '2.1,2.2,2.3', ''),
(4, 'sanober', 'sanober', 'fdshgfy@fdsgy.dff', '1,3,4,11', '4.1,4.2,11.1,11.2,11.3', '4.1.1,4.1.2,4.2.1,4.2.2'),
(6, 'abc', 'abc', 'abc@abc.com', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `link` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `testimonial_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `testi_name` varchar(100) NOT NULL,
  `testi_sdesc` varchar(1000) NOT NULL,
  `testi_desc` varchar(5000) NOT NULL,
  `testi_image` varchar(200) NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testi_name`, `testi_sdesc`, `testi_desc`, `testi_image`) VALUES
(6, 'testimonial2', 'testimonial2', '<p>testimonial2testimonial2testimonial2testimonial2</p>\r\n<p>testimonial2testimonial2</p>\r\n<p>testimonial2testimonial2testimonial2testimonial2</p>\r\n<p>testimonial2testimonial2testimonial2testimonial2</p>\r\n<p>&nbsp;</p>', '20110510001348_testimonialimage.jpg'),
(5, 'testimonial1', 'testimonial1', '<p>testimonial1</p>', '20110508020012_avability.jpg');
