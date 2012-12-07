-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2012 at 11:53 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `givingjoydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gj_budgets_expenditures`
--

DROP TABLE IF EXISTS `gj_budgets_expenditures`;
CREATE TABLE IF NOT EXISTS `gj_budgets_expenditures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `expenditure` varchar(500) NOT NULL,
  `budget` float NOT NULL,
  `actual` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gj_budgets_expenditures`
--

INSERT INTO `gj_budgets_expenditures` (`id`, `project`, `expenditure`, `budget`, `actual`) VALUES
(1, 1, 'Administrative Costs', 500, 0),
(2, 2, 'School Books', 2252, 122),
(3, 1, 'Bribing the CEO', 600, 225);

-- --------------------------------------------------------

--
-- Table structure for table `gj_donations`
--

DROP TABLE IF EXISTS `gj_donations`;
CREATE TABLE IF NOT EXISTS `gj_donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giftcard` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `amount` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gj_fields`
--

DROP TABLE IF EXISTS `gj_fields`;
CREATE TABLE IF NOT EXISTS `gj_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gj_fields`
--

INSERT INTO `gj_fields` (`id`, `title`) VALUES
(1, 'Animals'),
(2, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `gj_giftcards`
--

DROP TABLE IF EXISTS `gj_giftcards`;
CREATE TABLE IF NOT EXISTS `gj_giftcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipientname` varchar(500) NOT NULL,
  `recipientemail` varchar(500) NOT NULL,
  `sendername` varchar(500) NOT NULL,
  `senderemail` varchar(500) NOT NULL,
  `interests` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `transaction` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gj_organizations`
--

DROP TABLE IF EXISTS `gj_organizations`;
CREATE TABLE IF NOT EXISTS `gj_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `weburl` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fburl` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gj_organizations`
--

INSERT INTO `gj_organizations` (`id`, `title`, `description`, `weburl`, `username`, `password`, `fburl`, `twitter`) VALUES
(1, 'SUARAM', 'SUARAM, or Suara Rakyat Malaysia, (Malay for "Voice of the Malaysian People") is a human rights organization in Malaysia created in 1987 after Operation Lalang, when 106 opposition, unions, activist leaders were detained without trial under the Internal Security Act. In 1989, the detainee support group, ISA detainees and other activist groups decided to form SUARAM, whose primary object was to campaign for the abolition of the ISA and detention without trial. SUARAM later evolved into other areas of human rights and environmental rights.\r\n\r\nSuaram is considered one of the leading human rights organisations in Malaysia. Other general human rights organisations in Malaysia include the Penang based Aliran Kesedaran Negara (ALIRAN), HAKAM (National Human Rights Society) and many others. Suaram has often worked with these organisations on a minimal platform of co-operation on issues such as the abolishment of the Internal Security Act (ISA) and electoral reform. The secretariat in KL also publishes an annual report on the status of civil and political rights in Malaysia since 1998.', 'http://www.suaram.com', 'suaram', '', 'http://www.facebook/suaram', 'suaram'),
(2, 'UNICEF', 'UNICEF is the driving force that helps build a world where the rights of every child are realized. We have the global authority to influence decision-makers, and the variety of partners at grassroots level to turn the most innovative ideas into reality.  That makes us unique among world organizations, and unique among those working with the young.\r\n\r\nWe believe that nurturing and caring for children are the cornerstones of human progress.  UNICEF was created with this purpose in mind – to work with others to overcome the obstacles that poverty, violence, disease and discrimination place in a child’s path.  We believe that we can, together, advance the cause of humanity.', 'http://www.unicef.org', 'unicef', '', 'http://www.facebook/unicef', 'unicef');

-- --------------------------------------------------------

--
-- Table structure for table `gj_projects`
--

DROP TABLE IF EXISTS `gj_projects`;
CREATE TABLE IF NOT EXISTS `gj_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `images` varchar(500) NOT NULL,
  `fields` varchar(500) NOT NULL,
  `organization` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gj_projects`
--

INSERT INTO `gj_projects` (`id`, `title`, `description`, `images`, `fields`, `organization`) VALUES
(1, 'Take Action Against Injustice', 'This is a test project. But we really do stand against injustice. ', '/images/suaram-stand/human-rights-poster.jpg||/images/suaram-stand/hr-1.jpg||/images/suaram-stand/war-1.jpg', '1,2', 1),
(2, 'Help children in Peru read', 'Literacy in Peru is at an all time low.\r\n\r\nHelp Lady Gaga fix that.', '/images/unicef-peru/hands.jpg||/images/unicef-peru/children.jpg||/images/unicef-peru/group.jpg||/images/unicef-peru/peru.jpg||/images/unicef-peru/rice-field.jpg', '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gj_transactions`
--

DROP TABLE IF EXISTS `gj_transactions`;
CREATE TABLE IF NOT EXISTS `gj_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `gifterpaypal` varchar(500) NOT NULL,
  `transactionid` varchar(500) NOT NULL,
  `paypalid` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
