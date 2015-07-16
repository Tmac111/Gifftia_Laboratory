-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 08 日 14:48
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `php_chat`
--

-- --------------------------------------------------------

--
-- 表的结构 `chatboard`
--

CREATE TABLE IF NOT EXISTS `chatboard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(40) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `chatboard`
--

INSERT INTO `chatboard` (`id`, `time`, `username`, `message`) VALUES
(23, '2015-05-07 20:18:49', 'é‡‘å·¦æ‰‹', 'æˆ‘æ˜¯é‡‘å·¦æ‰‹'),
(24, '2015-05-07 22:20:27', 'åº·é¾™', 'æˆ‘æ˜¯'),
(25, '2015-05-08 10:05:15', 'åº·', 'æˆ‘'),
(26, '2015-06-02 18:45:30', 'kangxinlong', 'fdf'),
(27, '2015-06-02 19:01:49', 'yyyy', 'zxczxczxc'),
(28, '2015-06-02 19:32:39', '13121118', 'æˆ‘æ˜¯é‡‘å³æ‰‹'),
(29, '2015-06-02 19:33:11', '13121200', 'é‡‘æ‰‹'),
(30, '2015-06-04 00:16:36', 'kangxinlong', 'dd'),
(31, '2015-06-04 13:29:30', 'kangxinlong', 'fefe '),
(32, '2015-06-04 13:29:35', 'kangxinlong', 'wdwdww'),
(33, '2015-06-16 20:49:52', 'qwe', 'ç½‘ç»œä¼šæ‰€ï¼Ÿ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
