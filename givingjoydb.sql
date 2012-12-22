-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2012 at 11:37 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `gj_budgets_expenditures`
--

INSERT INTO `gj_budgets_expenditures` (`id`, `project`, `expenditure`, `budget`, `actual`) VALUES
(1, 1, 'Administrative Costs', 500, 0),
(2, 2, 'School Books', 2252, 122),
(3, 1, 'Bribing the CEO', 600, 225),
(4, 3, 'Eye goggles', 1000, 0),
(5, 3, 'Cycling attire', 2000, 0),
(6, 3, 'Bicycle spare parts', 1000, 0),
(7, 3, 'Bus rental', 12000, 0),
(8, 3, 'Leaflet/printed material', 1000, 0),
(9, 3, 'Others (mineral water / first aid medications)', 500, 0),
(10, 4, 'Marketing', 4800, 0),
(11, 4, 'Provision', 7200, 0),
(12, 4, 'Stationery', 2400, 0),
(13, 4, 'Utilities', 4800, 0),
(14, 4, 'Teacher''s Salary', 24000, 0),
(15, 4, 'Cook''s Salary', 8400, 0),
(16, 4, 'Transportation', 4800, 0),
(17, 4, 'Rent', 7800, 0),
(18, 5, 'Travelling & Accomodation', 2350, 0),
(19, 5, 'Food', 750, 0),
(20, 5, 'Campaign Materials', 900, 0),
(21, 5, 'Lawyer''s Expense', 14000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gj_config`
--

DROP TABLE IF EXISTS `gj_config`;
CREATE TABLE IF NOT EXISTS `gj_config` (
  `key` varchar(200) NOT NULL,
  `value` varchar(2000) NOT NULL,
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gj_config`
--

INSERT INTO `gj_config` (`key`, `value`) VALUES
('admin_password', '3154065265a458cbedc90b2445eedbd6'),
('admin_username', 'givingjoyadmin');

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
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `gj_fields`
--

DROP TABLE IF EXISTS `gj_fields`;
CREATE TABLE IF NOT EXISTS `gj_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gj_fields`
--

INSERT INTO `gj_fields` (`id`, `title`) VALUES
(3, 'Human Rights'),
(4, 'Environmental Issues'),
(5, 'Child Welfare'),
(6, 'Education & Child Development');

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
  `message` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `transaction` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gj_giftcards`
--

INSERT INTO `gj_giftcards` (`id`, `recipientname`, `recipientemail`, `sendername`, `senderemail`, `interests`, `amount`, `message`, `time`, `token`, `status`, `transaction`) VALUES
(2, 'John Smith', 'johnsmith@gmail.com', 'Ash Menon', 'ash@ashmenon.com', '1', 50, 'This is a test message', '2012-12-21 11:52:39', 'HXZ724LSP', 'payment complete', 2),
(3, 'John Smith', 'johnsmith@gmail.com', 'Ash Menon', 'ash@ashmenon.com', '1', 20, 'Hello, I''m going to cancel!! MWAHAHAHAHAHAH', '2012-12-21 11:56:36', 'WN5E3C5Q2', 'payment cancelled', 3),
(4, 'John Smith', 'johnsmith@gmail.com', 'Ash Menon', 'ash@ashmenon.com', '4,3', 20, 'Hello, this is a test message.', '2012-12-21 21:33:15', '89K2AX3AB', 'pending payment', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gj_organizations`
--

INSERT INTO `gj_organizations` (`id`, `title`, `description`, `weburl`, `username`, `password`, `fburl`, `twitter`) VALUES
(1, 'SUARAM', 'SUARAM, or Suara Rakyat Malaysia, (Malay for "Voice of the Malaysian People") is a human rights organization in Malaysia created in 1987 after Operation Lalang, when 106 opposition, unions, activist leaders were detained without trial under the Internal Security Act. In 1989, the detainee support group, ISA detainees and other activist groups decided to form SUARAM, whose primary object was to campaign for the abolition of the ISA and detention without trial. SUARAM later evolved into other areas of human rights and environmental rights.\r\n\r\nSuaram is considered one of the leading human rights organisations in Malaysia. Other general human rights organisations in Malaysia include the Penang based Aliran Kesedaran Negara (ALIRAN), HAKAM (National Human Rights Society) and many others. Suaram has often worked with these organisations on a minimal platform of co-operation on issues such as the abolishment of the Internal Security Act (ISA) and electoral reform. The secretariat in KL also publishes an annual report on the status of civil and political rights in Malaysia since 1998.', 'http://www.suaram.com', 'suaram', '', 'http://www.facebook/suaram', 'suaram'),
(2, 'UNICEF', 'UNICEF is the driving force that helps build a world where the rights of every child are realized. We have the global authority to influence decision-makers, and the variety of partners at grassroots level to turn the most innovative ideas into reality.  That makes us unique among world organizations, and unique among those working with the young.\r\n\r\nWe believe that nurturing and caring for children are the cornerstones of human progress.  UNICEF was created with this purpose in mind – to work with others to overcome the obstacles that poverty, violence, disease and discrimination place in a child’s path.  We believe that we can, together, advance the cause of humanity.', 'http://www.unicef.org', 'unicef', '', 'http://www.facebook/unicef', 'unicef'),
(3, 'JERIT', '<p>JERIT is an umbrella network connecting the marginalised sectors. JERIT has 4 active coalitions bringing together the industrial workers, plantation sector workers, urban pioneers and low-cost flat residents, youth and students.   </p>\r\n\r\n<p>JERIT has been actively empower the grassroot groups to highlight basic right issues that affects their daily lives. Among dozens of campaign organised by JERIT are  Monthly wage for plantation workers, Minimum Wage Act campaign, Adequate housing for poor campaign, free education campaign for students. </p>\r\n\r\n<p>JERIT is proud to be the only coalition of grassroot organisation that has been organizing May Day event for past 10 years bringing people on a class base that cuts accross race and religions. </p>\r\n\r\n<p>Please visit <a href="http://www.jerit.org" target="_blank">www.jerit.org</a> for more info on JERIT’s activity. </p>\r\n', 'http://www.jerit.org', 'jerit', 'jerit123', 'https://www.facebook.com/JeritCycleCampaign20', ''),
(4, 'Persatuan Kebajikan Kanak-Kanak Kajang', '<p>PKKKK was started off with kids who came from broken families, without proper meals, without proper supervisions and poor grades in school. In August 2008, the free teaching and free feeding program began with 15 kids. Currently there are 87 kids coming daily to the centre to study and to eat. In 2010 we registered this program under ROS and in 2010 also we got tax exemption status from LHDN. </p> \r\n\r\n<p>Besides running free tuition and free meal program, during school holidays, PKKKK also started to organize other activities for the poor children and youths like seminars, games, trips for exposure. </p> \r\n\r\n<p>We also have identified some youths who are dropouts and SPM leavers who are wasting their time not knowing what to do for their future. This is due to lack of knowledge, financial support and lack of skills. PKKKK plan to do some skills training for these youths. We plan to start with short term computer course (certificate program) with a hope that with this certificate these youths will get some job opportunity in the future.</p> \r\n\r\n\r\n<p>Organization’s objectives:</p>\r\n\r\n<ul>\r\n<li>To provide a safe place during the day for the children and youths.</li>\r\n<li>To help each child to become literate.</li>\r\n<li>To motivate the children and youths to change their learning habits.</li>\r\n<li>To provide one balanced meal for youths and children each day.</li>\r\n<li>To provide skills training for youths (dropouts and SPM) and help them to find jobs. </li>\r\n</ul>\r\n\r\n<p>Ongoing Programs:</p>\r\n<ul>\r\n<li>Free tuition program for poor children and youths from 8am to 5pm (Mon – Fri)</li>\r\n<li>Free breakfast and lunch for poor children and youths (Mon – Fri) </li>\r\n<li>Organize activities / programs for children and youths during school holidays.</li>\r\n<li>Organize trips for youths and children once a year.</li> \r\n<li>Organize counseling sessions for children and youths.</li>\r\n</ul>\r\n', '', 'pkkkk', 'pkkkk123', '', ''),
(5, 'PT Foundation', '<p>PT Foundation strives to be the most effective community-based organization providing information, education and care services relating to HIV/AIDS and sexuality in Malaysia, working with the 5 communities that are most affected by HIV in Malaysia.</p>\r\n\r\n<h5>Mission</h5>\r\n\r\n<p>Our mission is to be the most efficient community-based organization providing information, education, and care services relating to HIV/AIDS and sexuality in Malaysia, working with communities that are difficult to reach due to societal discrimination.</p>\r\n\r\n<h5>Company Overview</h5>\r\n\r\n<p>PT Foundation (previously known as Pink Triangle Sdn Bhd) is a community-based, voluntary non-profit making organization providing HIV/AIDS education, prevention, care and support programmes, sexuality awareness and empowerment programmes for vulnerable communities in Malaysia. We work with 5 vulnerable communities mainly drug users, sex workers, transsexuals, men who have sex with men (MSM), and people living with HIV/AIDS (PLHIV).</p>', 'http://www.ptfmalaysia.org/', 'ptfoundation', 'ptfoundation123', 'https://www.facebook.com/pages/PT-Foundation/345959786892', 'PTfoundation');

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
  `paymenttype` varchar(50) NOT NULL,
  `paypalemail` varchar(500) NOT NULL,
  `manualpaymentinfo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gj_projects`
--

INSERT INTO `gj_projects` (`id`, `title`, `description`, `images`, `fields`, `organization`, `paymenttype`, `paypalemail`, `manualpaymentinfo`) VALUES
(3, 'Cycle For Change 2.0', '<p>Cycle for Change was a successful and effective campaign by JERIT  back in 2008 to create awareness of social issues to the common people. </p>\r\n\r\n<p>We believe the people can be empowered through awareness then to action . Thus  Cycle for Change 2.0 is an continuous effort from 2008 and our young people has taken this task to spread the message by cycling to towns and rural areas.  The cyclist are the youths recruited from the marginalised group and volunteers. In a nutshell, this campaigns aimed to empower the younger generation by being part of the campaign and the common people.</p> \r\n\r\n<p>The first phase of campaign just took place in Negeri Sembilan from 7th – 11th December 2012. Apart from cycling the team also does leafletting, discussion with affected community and memorandum to the state government. The campaign now will be moving on to next state Pahang after the 13th General Election. </p>\r\n\r\n\r\n<p>Cycle for Change carries 7 national demands namely; \r\n\r\n<ul>\r\n<li>Free and fair election;</li>\r\n<li>Protect Mother earth from environment pollution </li>\r\n<li>Adequate housing for people;</li>\r\n<li>Stop privatisation of public amenities i.e water, electricity , health and education;</li>\r\n<li>Protect workers right and wellbeing;</li>\r\n<li>Protect right to assemble and opinión for a better democratic space; and</li>\r\n<li>Abolish draconian Acts that violates human rights.</li>\r\n</ul>\r\n</p>\r\n', '/images/jeritcycle/1.jpg||/images/jeritcycle/2.jpg||/images/jeritcycle/3.jpg||/images/jeritcycle/4.jpg||/images/jeritcycle/5.jpg||/images/jeritcycle/6.jpg||/images/jeritcycle/7.jpg||/images/jeritcycle/8.jpg||/images/jeritcycle/9.jpg||/images/jeritcycle/10.jpg||/images/jeritcycle/11.jpg||/images/jeritcycle/12.jpg||/images/jeritcycle/13.jpg||/images/jeritcycle/14.jpg', '3,4', 3, 'manual', '', ''),
(4, 'Persatuan Kebajikan Kanak-Kanak Kajang', '<p>PKKKK was started off with kids who came from broken families, without proper meals, without proper supervisions and poor grades in school. In August 2008, the free teaching and free feeding program began with 15 kids. Currently there are 87 kids coming daily to the centre to study and to eat. In 2010 we registered this program under ROS and in 2010 also we got tax exemption status from LHDN. </p>\r\n\r\n<p>Besides running free tuition and free meal program, during school holidays, PKKKK also started to organize other activities for the poor children and youths like seminars, games, trips for exposure. </p>\r\n\r\n<p>We also have identified some youths who are dropouts and SPM leavers who are wasting their time not knowing what to do for their future. This is due to lack of knowledge, financial support and lack of skills. PKKKK plan to do some skills training for these youths. We plan to start with short term computer course (certificate program) with a hope that with this certificate these youths will get some job opportunity in the future. </p>\r\n', '/images/pkkkk/1.jpg||/images/pkkkk/2.jpg||/images/pkkkk/3.jpg||/images/pkkkk/4.jpg||/images/pkkkk/5.jpg||/images/pkkkk/6.jpg||/images/pkkkk/7.jpg', '5,6', 4, 'manual', '', ''),
(5, 'Project Green Cow', '<h5>Green Cow</h5>\r\n\r\n<p>Cow Green is an area in Cameron Highlands. It is located at the crossroads entrance to Sg Palas Tea Plantation. There are 10 families living at the foothills of the Green Cow.</p>\r\n\r\n<p>A multi-million project by a developer (LTT Development Sdn Bhd) threatened the Green Cow landscape and threatening the life of 10 families who lives at the foot of the hill.</p>\r\n\r\n \r\n\r\n<h5>2 developers</h5>\r\n\r\n<p>The resident’s nightmare began when an excavator belonging to two developers, Ng Ng and LTT Yeet Development Sdn Bhd started clearing the land in August 2011. During the same time, a large boulder rolled near to the road due to the work of LTT Development. These are just a few days after a landslide occurred at Kg Sg Ruil (Aboriginal village) which killed seven people (August 7, 2011).</p>\r\n\r\n<p>The permit for LTT for land clearing was temporarily suspended by the District Office Cameron consequences of this incident.</p>\r\n\r\n \r\n\r\n<h5>Residents Coalition Formation Green Cow</h5>\r\n\r\n<p>In September 2011, in order to fight for the rights of the safe house, Cow Green Residents Coalition was formed which represented seven out of 10 families on the efforts of the Socialist Party of Malaysia (PSM Cameron). Many police reports, letters and memoranda were sent. But the land clearing work never stopped.</p>\r\n\r\n \r\n\r\n<h5>2 residents & 1 PSM activists arrested</h5>\r\n\r\n<p>As there was no action from any party, the residents stopped a machine which belongs to one of the developer (Ng Yeet Ng) from work on 13/10/2011. A result of this incident, police has arrested two residents, S.Nagarajan and S.Thanabalan; and a PSM activist, Suresh Kumar. They were then charged in Cameron Magistrate Court under section 341KK and 506KK (wrongful obstruction & criminal intimidation). However, after hearing the case, all of them were released by the Magistrate on 30.7.2012 with the judgment that the residents stopped the machine because the safeties of the houses were threatened.</p>\r\n\r\n \r\n\r\n<h5>Development records were kept secret by Cameron District Council</h5>\r\n\r\n<p>Residents Coalition has also called for the project documents to be revealed to be referred to an independent civil engineer but the request was not entertained by Cameron Highlands District Council. In a meeting with the District Officer Cameron on 11/11/2011, he has requested security issues to be addressed immediately and local authorities should ensure that all soil and rock are covered. But these things were never complied by the developer.</p>\r\n\r\n<p>Why these records be kept confidential? Is it because of the approval of this project is given in non-transparent?</p>\r\n\r\n \r\n\r\n<h5>Gangster shows gun, police asked the brand of the gun</h5>\r\n\r\n<p>In March 2012, LTT Development sent gangsters for demolition the goat-shed which belongs to one of the people, but the demolition was stopped by the residents. Gangster fled when they saw residents & supporters began to gather.</p>\r\n\r\n<p>The gangsters produced a gun during the incident. However, when the people make a police report; Cameron Police asked the residents the gun brand used and the ''birth certificate'' for a lost goat. Up to today, no arrests were made against gangster (no parade) despite residents provided the vehicle registration number and the description of the gangsters.</p>\r\n\r\n \r\n\r\n<h5>Residents setup tent</h5>\r\n\r\n<p>As there was no action from any party, the people have made a tent in the project on 5/28/12 for Developer LTT project to stop until we get the answers of their live safety. As a result, developers are no longer works near resident’s home.</p>\r\n\r\n \r\n\r\n<h5>Developer offered RM 30,000</h5>\r\n\r\n<p>The developer then has agreed to provide compensation of RM30, 000 to each family to relocate. But RM30,000 is not enough to build a house. And no place is being provided by the government for them to build a house.</p>\r\n\r\n \r\n\r\n<h5>Police arrest Green Cow residents who tried to meet MB in Kuantan</h5>\r\n\r\n<p>Following no positive response from the local governments in Cameron Highland, the combination of the Cameron residents has sought intervention of the Chief Minister of Pahang, but no response were given. Minister promises great visit and solve the problems of the people Cameron in April 2012 did not fulfill the promise.</p>\r\n\r\n<p>In fact, the population of Cameron Green Cow with the people who go to request an appointment had been detained and roughed Kuantan police during their visit to Pahang MB Office on 10.07.2012. All 25 of them entered into lock-up for a day before being released.</p>\r\n\r\n \r\n\r\n<h5>Empty promises MB and Dato Palanivel</h5>\r\n\r\n<p>After the arrests in Kuantan, Pahang MB, Dato Sri Adnan Yaakob with Minister in the Prime Minister, Dato G.Palanivel gave empty promises that Green Cow population problem has been solved.</p>\r\n\r\n<p>Datuk Palanivel in a press release on 07.17.2012 has informed that the people of Green Cow has given replacement land. This was a confession that the place they are occupying now is danger.</p>\r\n\r\n<p>But to this day no such solution to the population although the people have sent two letters KPD Dato G.Palanivel.</p>\r\n\r\n \r\n\r\n<h5>Population and Development HRD sued by LTT</h5>\r\n\r\n<p>On 8/17/12, 7 head of the family and Suresh Kumar has received an injunction and lawsuit dr LTT Development. Summons and injunction application was heard in the High Mahkahmah Kuantan since 14/9/2012.</p>\r\n\r\n \r\n\r\n<h5>More charges in court</h5>\r\n\r\n<p>As revenge, the DPP has appealed the case of PSM activists & 2 population to the High Court Temerloh since 10/08/2012 and on 11/09/2012, two more people were charged under Section 341KK (barrier one for arresting trucks developers speed). All this shows that there is a conspiracy to oust Green Cow Population through dirty tactics and use a variety of channels, including the police and the courts.</p>\r\n\r\n<p>This increases the burden Green Cow Population in championing their issues.</p>\r\n\r\n \r\n\r\n<h5>Application for financial assistance</h5>\r\n\r\n<p>After a struggle so far, four families have left the Combined Population. Now there remained only three families fight for their cause. We would like to solicit donations of friends to continue the struggle. Much-needed financial assistance for expenses:</p>\r\n\r\n<p>The expenses include 3 crucial</p>\r\n<ol>\r\n	<li>Court costs and attorney</li>\r\n	<li>transportation, accommodation and food from Cameron to Kuantan and also to other places about this campaign</li>\r\n	<li>print flyers and campaign materials</li>\r\n</ol>\r\n\r\n<p>Cow Green problem is also related to environmental</p>\r\n\r\n<p>Many people have complained that Cameron Highlands is not as cold as before. Also landslide issues as sustainable development is not in the mountains. Cow Green Issue 10 families is not the issue, but it involves a larger environment.</p>\r\n\r\n \r\n\r\n<p>Apart from the solution for a 3 family in Green Cow, this case will also be used to bring to the attention of the Malaysian public about the issue of forest and environmental destruction in Cameron. Among the environmental problems due to the two projects are:</p>\r\n\r\n<ol>\r\n<li>forest destruction in Green Cow</li>\r\n<li>development does not follow the rules the hills</li>\r\n<li>projects of river pollution due to land</li>\r\n<li>Cameron traffic system will be worse</li>\r\n</ol>\r\n\r\n \r\n\r\n<p>WE NEED HELP FOR THOSE WHO THREATENED AGAINST ENVIRONMENT AND THE COURAGE TO HELP FAMILIES 10 hillside PREVENTION PROJECT</p>', '/images/greencow/1.jpg||/images/greencow/2.jpg||/images/greencow/3.jpg||/images/greencow/4.jpg||/images/greencow/5.jpg||/images/greencow/6.jpg||/images/greencow/7.jpg||/images/greencow/8.jpg||/images/greencow/9.jpg||/images/greencow/10.jpg||/images/greencow/11.jpg||/images/greencow/12.jpg||/images/greencow/13.jpg||/images/greencow/14.jpg', '3,4', 3, 'manual', '', '<p>Financial assistance can be given in the accounts:</p>\r\n\r\n<p>HRD CENTRE (Hong Leong Bank)</p>\r\n\r\n<p>No 0061-1000-32377 account.</p>\r\n\r\n \r\n\r\n<p>Please inform us after making a donation. Contact us by:</p>\r\n\r\n<p>Suresh Kumar at 019-569 6964</p>\r\n\r\n<p>E-mail: suresh@sukucomp.com</p>\r\n\r\n<p>Fax: 05-4914088</p>\r\n\r\n<p>Address: Cow Green Residents Coalition, c / o the Socialist Party of Malaysia (PSM), Cameron Highlands Branch, C1-G3, Block C1, Royal Lily, 39000 Tanah Rata, Cameron Highlands, Pahang.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `gj_transactions`
--

DROP TABLE IF EXISTS `gj_transactions`;
CREATE TABLE IF NOT EXISTS `gj_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `paypalfee` float NOT NULL DEFAULT '0',
  `nettamount` float NOT NULL DEFAULT '0',
  `payerid` varchar(500) NOT NULL,
  `token` varchar(500) NOT NULL,
  `payeremail` varchar(500) NOT NULL,
  `payername` varchar(500) NOT NULL,
  `payerstatus` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentstatus` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gj_transactions`
--

INSERT INTO `gj_transactions` (`id`, `amount`, `paypalfee`, `nettamount`, `payerid`, `token`, `payeremail`, `payername`, `payerstatus`, `timestamp`, `paymentstatus`) VALUES
(2, 50, 1.75, 48.25, 'NAK8QLZEMNBGS', 'EC-79H19263DG657943X', 'shahtr_1354930501_per@gmail.com', 'Ash Menon', 'verified', '2012-12-21 11:52:41', 'complete'),
(3, 20, 0, 0, '', 'EC-86J88227343151540', '', '', '', '2012-12-21 11:56:38', 'cancelled'),
(4, 20, 0, 0, '', 'EC-5Y604604YM8354946', '', '', '', '2012-12-21 21:33:18', 'pending');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
