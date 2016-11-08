-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 02:29 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogger_info`
--

CREATE TABLE IF NOT EXISTS `blogger_info` (
  `blogger_id` int(3) NOT NULL,
  `blogger_username` varchar(50) NOT NULL,
  `blogger_password` varchar(100) NOT NULL,
  `blogger_creation_date` date NOT NULL,
  `blogger_is_active` varchar(3) NOT NULL,
  `blogger_updated_date` date DEFAULT NULL,
  `blogger_end_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogger_info`
--

INSERT INTO `blogger_info` (`blogger_id`, `blogger_username`, `blogger_password`, `blogger_creation_date`, `blogger_is_active`, `blogger_updated_date`, `blogger_end_date`) VALUES
(1, 'user123', '6ad14ba9986e3615423dfca256d04e3f', '2016-07-13', 'yes', NULL, NULL),
(2, 'abc123', 'e99a18c428cb38d5f260853678922e03', '2016-07-28', 'no', '2016-09-09', NULL),
(3, 'agnish13', 'c22ef509878e7146a3277645a0acd6c1', '2016-09-01', 'yes', NULL, NULL),
(4, 'blogmaster', '0ecbb9f2154d1861a02370d6606e044d', '2016-08-09', 'yes', NULL, NULL),
(6, 'paul', '6c63212ab48e8401eaf6b59b95d816a9', '2016-09-09', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_detail`
--

CREATE TABLE IF NOT EXISTS `blog_detail` (
  `blog_detail_id` int(3) NOT NULL,
  `blog_id` int(3) NOT NULL,
  `blog_detail_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_master`
--

CREATE TABLE IF NOT EXISTS `blog_master` (
  `blog_id` int(3) NOT NULL,
  `blogger_id` int(3) NOT NULL,
  `blog_title` varchar(50) NOT NULL,
  `blog_desc` varchar(5000) NOT NULL,
  `blog_category` varchar(50) NOT NULL,
  `blog_is_active` varchar(3) NOT NULL,
  `creation_date` date NOT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`blog_id`, `blogger_id`, `blog_title`, `blog_desc`, `blog_category`, `blog_is_active`, `creation_date`, `updated_date`) VALUES
(1, 1, 'The Quick FOX', 'The quick brown fox jumps over the lazy dogs.\r\nThe quick brown fox jumps over the lazy dogs.\r\nThe quick brown fox jumps over the lazy dogs.\r\nThe quick brown fox jumps over the lazy dogs.The quick brown fox jumps over the lazy dogs.The quick brown fox jumps over the lazy dogs.', 'Phrases', 'yes', '2016-09-09', '2016-09-09'),
(2, 1, 'The Brown Fox', 'The quick brown fox jumps over the lazy dogs.\r\nThe quick brown fox jumps over the lazy dogs.\r\nThe quick brown fox jumps over the lazy dogs.\r\nThe quick brown fox jumps over the lazy dogs.The quick brown fox jumps over the lazy dogs.The quick brown fox jumps over the lazy dogs.', 'Phrases', 'yes', '2016-09-09', NULL),
(3, 2, 'Stopping by Woods on a Snowy Evening', 'Whose woods these are I think I know.   \r\nHis house is in the village though;   \r\nHe will not see me stopping here   \r\nTo watch his woods fill up with snow.   \r\n\r\nMy little horse must think it queer   \r\nTo stop without a farmhouse near   \r\nBetween the woods and frozen lake   \r\nThe darkest evening of the year.   \r\n\r\nHe gives his harness bells a shake   \r\nTo ask if there is some mistake.   \r\nThe only other sound’s the sweep   \r\nOf easy wind and downy flake.   \r\n\r\nThe woods are lovely, dark and deep,   \r\nBut I have promises to keep,   \r\nAnd miles to go before I sleep,   \r\nAnd miles to go before I sleep.', 'Poem', 'yes', '2016-08-03', NULL),
(4, 2, 'Phenomenal Woman', 'Pretty women wonder where my secret lies.\r\nI''m not cute or built to suit a fashion model''s size\r\nBut when I start to tell them,\r\nThey think I''m telling lies.\r\nI say,\r\nIt''s in the reach of my arms\r\nThe span of my hips,\r\nThe stride of my step,\r\nThe curl of my lips.\r\nI''m a woman\r\nPhenomenally.\r\nPhenomenal woman,\r\nThat''s me.\r\n\r\nI walk into a room\r\nJust as cool as you please,\r\nAnd to a man,\r\nThe fellows stand or\r\nFall down on their knees.\r\nThen they swarm around me,\r\nA hive of honey bees.\r\nI say,\r\nIt''s the fire in my eyes,\r\nAnd the flash of my teeth,\r\nThe swing in my waist,\r\nAnd the joy in my feet.\r\nI''m a woman\r\nPhenomenally.\r\nPhenomenal woman,\r\nThat''s me.\r\n\r\nMen themselves have wondered\r\nWhat they see in me.\r\nThey try so much\r\nBut they can''t touch\r\nMy inner mystery.\r\nWhen I try to show them\r\nThey say they still can''t see.\r\nI say,\r\nIt''s in the arch of my back,\r\nThe sun of my smile,\r\nThe ride of my breasts,\r\nThe grace of my style.\r\nI''m a woman\r\n\r\nPhenomenally.\r\nPhenomenal woman,\r\nThat''s me.\r\n\r\nNow you understand\r\nJust why my head''s not bowed.\r\nI don''t shout or jump about\r\nOr have to talk real loud.\r\nWhen you see me passing\r\nIt ought to make you proud.\r\nI say,\r\nIt''s in the click of my heels,\r\nThe bend of my hair,\r\nthe palm of my hand,\r\nThe need of my care,\r\n''Cause I''m a woman\r\nPhenomenally.\r\nPhenomenal woman,\r\nThat''s me.', 'poem', 'yes', '2016-08-27', NULL),
(5, 2, 'The Road Not Taken by Robert Frost', 'Two roads diverged in a yellow wood,\r\nAnd sorry I could not travel both\r\nAnd be one traveler, long I stood\r\nAnd looked down one as far as I could\r\nTo where it bent in the undergrowth;\r\nThen took the other, as just as fair,\r\nAnd having perhaps the better claim,\r\nBecause it was grassy and wanted wear;\r\nThough as for that the passing there\r\nHad worn them really about the same,\r\nAnd both that morning equally lay\r\nIn leaves no step had trodden black.\r\nOh, I kept the first for another day!\r\nYet knowing how way leads on to way,\r\nI doubted if I should ever come back.\r\nI shall be telling this with a sigh\r\nSomewhere ages and ages hence:\r\nTwo roads diverged in a wood, and I-\r\nI took the one less traveled by,\r\nAnd that has made all the difference.', 'poem', 'yes', '2016-09-08', NULL),
(6, 3, 'Touched by An Angel', 'We, unaccustomed to courage\r\nexiles from delight\r\nlive coiled in shells of loneliness\r\nuntil love leaves its high holy temple\r\nand comes into our sight\r\nto liberate us into life.\r\n\r\nLove arrives\r\nand in its train come ecstasies\r\nold memories of pleasure\r\nancient histories of pain.\r\nYet if we are bold,\r\nlove strikes away the chains of fear\r\nfrom our souls.\r\n\r\nWe are weaned from our timidity\r\nIn the flush of love''s light\r\nwe dare be brave\r\nAnd suddenly we see\r\nthat love costs all we are\r\nand will ever be.\r\nYet it is only love\r\nwhich sets us free.', 'poem', 'yes', '2016-09-09', NULL),
(7, 3, 'Still I Rise', 'You may write me down in history\r\nWith your bitter, twisted lies,\r\nYou may trod me in the very dirt\r\nBut still, like dust, I''ll rise.\r\n\r\nDoes my sassiness upset you?\r\nWhy are you beset with gloom?\r\n''Cause I walk like I''ve got oil wells\r\nPumping in my living room.\r\n\r\nJust like moons and like suns,\r\nWith the certainty of tides,\r\nJust like hopes springing high,\r\nStill I''ll rise.\r\n\r\nDid you want to see me broken?\r\nBowed head and lowered eyes?\r\nShoulders falling down like teardrops.\r\nWeakened by my soulful cries.\r\n\r\nDoes my haughtiness offend you?\r\nDon''t you take it awful hard\r\n''Cause I laugh like I''ve got gold mines\r\nDiggin'' in my own back yard.', 'Story', 'yes', '2016-09-09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogger_info`
--
ALTER TABLE `blogger_info`
  ADD PRIMARY KEY (`blogger_id`),
  ADD UNIQUE KEY `blogger_username` (`blogger_username`);

--
-- Indexes for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD PRIMARY KEY (`blog_detail_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blogger_id` (`blogger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogger_info`
--
ALTER TABLE `blogger_info`
  MODIFY `blogger_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog_detail`
--
ALTER TABLE `blog_detail`
  MODIFY `blog_detail_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `blog_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD CONSTRAINT `blog_detail_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog_master` (`blog_id`);

--
-- Constraints for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD CONSTRAINT `blog_master_ibfk_1` FOREIGN KEY (`blogger_id`) REFERENCES `blogger_info` (`blogger_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
