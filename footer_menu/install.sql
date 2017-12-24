
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `oc_footerlink`
--

CREATE TABLE IF NOT EXISTS `oc_footerlink` (
  `footerlink_id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `selectheading` varchar(255) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`footerlink_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `oc_footerlink`
--

INSERT INTO `oc_footerlink` (`footerlink_id`, `link`, `selectheading`, `status`, `sort_order`) VALUES
(22, 'index.php?route=information/information&amp;information_id=4', '9', 1, 0),
(29, 'index.php?route=information/information&amp;information_id=6', '9', 1, 0),
(30, 'index.php?route=information/information&amp;information_id=3', '9', 1, 0),
(31, 'index.php?route=information/information&amp;information_id=5', '9', 1, 0),
(32, 'index.php?route=information/contact', '10', 1, 0),
(33, 'index.php?route=account/return/add', '10', 1, 0),
(34, 'index.php?route=information/sitemap', '10', 1, 0),
(35, 'index.php?route=product/manufacturer', '11', 1, 0),
(36, 'index.php?route=account/voucher', '11', 1, 0),
(37, 'index.php?route=affiliate/account', '11', 1, 0),
(38, 'index.php?route=product/special', '11', 1, 0),
(39, 'index.php?route=account/account', '12', 1, 0),
(40, 'index.php?route=account/order', '12', 1, 0),
(41, 'index.php?route=account/wishlist', '12', 1, 0),
(42, 'index.php?route=account/newsletter', '12', 1, 0),
(43, '#', '12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oc_footerlink_description`
--

CREATE TABLE IF NOT EXISTS `oc_footerlink_description` (
  `footerlink_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oc_footerlink_description`
--

INSERT INTO `oc_footerlink_description` (`footerlink_id`, `language_id`, `title`) VALUES
(22, 1, 'About Us'),
(29, 1, 'Delivery Information'),
(30, 1, 'Privacy Policy'),
(31, 1, 'Terms & Conditions'),
(32, 1, '聯絡我們'),
(33, 1, '退換服務'),
(34, 1, '網站地圖'),
(35, 1, '品牌專區'),
(36, 1, '禮物禮卷'),
(37, 1, '推薦會員'),
(38, 1, '特別優惠'),
(39, 1, '會員中心'),
(40, 1, '歷史訂單'),
(41, 1, '收藏清單'),
(42, 1, '訂閱電子報'),
(43, 1, '追蹤我們');

-- --------------------------------------------------------

--
-- Table structure for table `oc_footertitle`
--

CREATE TABLE IF NOT EXISTS `oc_footertitle` (
  `footertitle_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`footertitle_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `oc_footertitle`
--

INSERT INTO `oc_footertitle` (`footertitle_id`, `status`, `sort_order`) VALUES
(10, 1, 1),
(11, 1, 2),
(9,  1, 0),
(12, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `oc_footertitle_description`
--

CREATE TABLE IF NOT EXISTS `oc_footertitle_description` (
  `footertitle_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`footertitle_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oc_footertitle_description`
--

INSERT INTO `oc_footertitle_description` (`footertitle_id`, `language_id`, `title`) VALUES
--(12, 1, 'Custmomer Service'),
--(11, 1, 'Health Food'),
--(9, 1, 'Our Company'),
--(10, 1, 'Customize');
(12, 1, '會員中心'),
(11, 1, '其他服務'),
(9,  1, '商店資訊'),
(10, 1, '客戶服務');
