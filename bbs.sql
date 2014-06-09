-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 03 月 26 日 14:48
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs`
--
CREATE DATABASE IF NOT EXISTS `bbs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bbs`;

-- --------------------------------------------------------

--
-- 表的结构 `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `aid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `aname` varchar(10) NOT NULL,
  `atype` varchar(10) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `action`
--

INSERT INTO `action` (`aid`, `aname`, `atype`) VALUES
(1, '添加', 'insert'),
(2, '修改', 'update'),
(3, '删除', 'delete'),
(4, '查找', 'find'),
(5, '审核', 'check');

-- --------------------------------------------------------

--
-- 表的结构 `actiongroup`
--

CREATE TABLE IF NOT EXISTS `actiongroup` (
  `agid` int(11) NOT NULL AUTO_INCREMENT,
  `rtype` varchar(10) NOT NULL,
  `atype` varchar(10) NOT NULL,
  PRIMARY KEY (`agid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `actiongroup`
--

INSERT INTO `actiongroup` (`agid`, `rtype`, `atype`) VALUES
(1, 'a', 'insert'),
(2, 'a', 'update'),
(3, 'a', 'delete'),
(4, 'a', 'find'),
(5, 'a', 'check'),
(22, 'a', 'delete');

-- --------------------------------------------------------

--
-- 表的结构 `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `ugid` int(11) NOT NULL AUTO_INCREMENT,
  `rtype` varchar(10) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`ugid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `group`
--

INSERT INTO `group` (`ugid`, `rtype`, `uid`) VALUES
(1, 'a', 1),
(7, 'b', 2),
(14, 'd', 13),
(13, 'c', 4);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mbid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `mbtitle` varchar(20) NOT NULL,
  `mbdate` datetime NOT NULL,
  `mbcontent` text,
  `mbip` varchar(20) NOT NULL,
  `mcount` int(11) DEFAULT NULL,
  `mbtype` int(10) DEFAULT NULL,
  `mdelete` int(11) DEFAULT '1',
  PRIMARY KEY (`mbid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mbid`, `uid`, `mbtitle`, `mbdate`, `mbcontent`, `mbip`, `mcount`, `mbtype`, `mdelete`) VALUES
(24, 1, 'dgdgdg', '2014-03-23 22:04:17', 'dgdgdgdgdgdg', '127.0.0.1', 7, 1, 1),
(25, 1, '224242', '2014-03-23 22:29:18', '<span style="color:#E53333;">422424242242342</span><span style="color:#E56600;"></span>', '127.0.0.1', 1, 1, 1),
(29, 1, 'dfgdgdg', '2014-03-24 21:20:07', '<em><strong><span style="color:#337FE5;">dgdgdgdgd</span></strong></em>', '127.0.0.1', 5, NULL, 1),
(30, 1, 'gdg', '2014-03-24 21:45:16', 'dggdgdgd', '127.0.0.1', 5, NULL, 1),
(33, 2, 'dffsfs', '2014-03-26 22:35:40', '<span style="color:#EE33EE;">sfsfsfsfsdfffffffffffffffffff</span>', '127.0.0.1', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `mbid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sname` varchar(10) NOT NULL,
  `hcontent` text NOT NULL,
  `htime` datetime NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- 转存表中的数据 `messages`
--

INSERT INTO `messages` (`hid`, `mbid`, `uid`, `sname`, `hcontent`, `htime`) VALUES
(71, 24, 2, '爱就一个字', 'ssfsfs', '2014-03-24 20:35:23'),
(72, 29, 2, '爱就一个字', 'asdasdadads', '2014-03-24 22:06:12'),
(73, 29, 2, '爱就一个字', '35353', '2014-03-24 22:06:18'),
(74, 24, 2, '爱就一个字', 'fdgdg', '2014-03-24 22:13:50'),
(75, 24, 2, '爱就一个字', 'fsdfs', '2014-03-24 22:13:53'),
(76, 24, 2, '爱就一个字', 'ffdgdfgd', '2014-03-24 22:14:00'),
(77, 24, 2, '爱就一个字', 'dfgdgd', '2014-03-24 22:14:04'),
(78, 24, 2, '爱就一个字', 'dfsfs', '2014-03-24 22:14:55'),
(79, 24, 2, '爱就一个字', 'sfsfs453453535', '2014-03-24 22:15:01'),
(81, 30, 2, '爱就一个字', 'rttuty', '2014-03-25 09:00:47'),
(111, 25, 2, '爱就一个字', 'fsdfsfsfs', '2014-03-26 22:24:09'),
(110, 30, 2, '爱就一个字', '啥时候', '2014-03-26 22:05:58'),
(109, 30, 2, '爱就一个字', '啥时候', '2014-03-26 22:05:18'),
(108, 29, 2, '爱就一个字', '三十多', '2014-03-26 20:54:05'),
(107, 30, 2, '爱就一个字', 'dfsfs', '2014-03-26 20:49:44'),
(106, 30, 2, '爱就一个字', 'ddsdsa', '2014-03-26 20:48:14'),
(104, 29, 13, '呼呼', 'ggdfgdgdfgd', '2014-03-26 20:06:51'),
(105, 29, 2, '爱就一个字', 'fdgdg', '2014-03-26 20:47:57');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(10) NOT NULL DEFAULT '管理员',
  `rtype` varchar(10) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`rid`, `rname`, `rtype`) VALUES
(1, '管理员', 'a'),
(2, '版主', 'b'),
(3, '会员用户', 'c');

-- --------------------------------------------------------

--
-- 表的结构 `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(10) NOT NULL,
  `turl` varchar(40) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `title`
--

INSERT INTO `title` (`tid`, `tname`, `turl`) VALUES
(1, '星辰首页', 'index.php'),
(2, '用户中心', 'individuality.php'),
(3, '我要留言', 'messageBoard.php'),
(4, '关于我们', 'about.php'),
(5, '管理中心', 'manage.php');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` char(10) NOT NULL,
  `upwd` varchar(25) NOT NULL,
  `sname` varchar(10) NOT NULL,
  `upic` varchar(40) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `uphone` bigint(20) NOT NULL,
  `uqq` bigint(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `uname`, `upwd`, `sname`, `upic`, `uemail`, `uphone`, `uqq`) VALUES
(1, 'songyu1988', '19880312', '天若', 'userPic1395761804.jpg', 'songyu19980312@vip.qq.com', 18782280223, 417793203),
(2, 'ssssss', 'ssssss', '爱就一个字', 'userPic1395762580.jpg', 'ss@qq.com', 13222233344, 43434343),
(4, 'wwwwww', 'wwwwww', '昨夜星辰', 'NULL', 'zuoye@qq.com', 13889898989, 32544334433),
(12, 'ewwrwd', '222222', '东东', 'userPic1395756409.jpg', 'ee@qq.com', 13222222222, 122222),
(13, 'eeeeee', 'eeeeee', '呼呼', 'userPic1395757503.jpg', 'huhu@qq.com', 13234435665, 43322242),
(14, 'tttttt', 'tttttt', '呵呵呵', 'NULL', 'huhu@qq.com', 13234435665, 43322242);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
