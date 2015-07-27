-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 25 Juillet 2014 à 18:59
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `members_id` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `members_id`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_publication` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `category_id`, `member_id`, `date_publication`) VALUES
(1, 'Hitch 2005 / French', '<div align="center"><font face="Trebuchet MS"><b><img src="http://imagizer.imageshack.us/a/img571/7259/74443967.png" alt="" border="0"><br>\r\n<br>\r\n<img src="http://img97.imageshack.us/img97/6384/moviecname.png" alt="" border="0"><br>\r\n<br>\r\n<br>\r\n</b></font>       <div align="center"><font face="Trebuchet MS"><b><font color="DarkOrchid">â˜¢</font><font color="Purple">â–„</font><font color="Magenta"><font color="#000000"><font color="Red"><font color="Indigo">â–€</font><font color="Purple">â–„</font><font color="Indigo">â–€</font><font color="Purple">â–„</font><font color="Indigo">â–€</font></font></font></font><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="Blue"><font size="6"> <font color="DarkRed">Hitch </font></font></font></font></font></font></font></font><font color="Magenta"><font color="#000000"> <font color="Red"><font color="Indigo">â–€</font><font color="Purple">â–„</font><font color="Indigo">â–€</font><font color="Purple">â–„</font><font color="Indigo">â–€</font><font color="Purple">â–„</font></font><font color="DarkOrchid">â˜¢</font></font></font><br>\r\n</b></font> </div><font face="Trebuchet MS"><b><br>\r\n<br>\r\n<img src="http://img263.imageshack.us/img263/1410/infossurlefilmjj.png" alt="" border="0"><br>\r\n<br>\r\n</b></font><img src="http://i.imgur.com/W1Gqx2g.png" alt="" border="0"><br>\r\n<br>\r\n<font face="Trebuchet MS"><b> <img src="http://img855.imageshack.us/img855/4715/multimedia.png" alt="" border="0"><br><br></b></font><font face="Trebuchet MS"><b><img class="ncode_imageresizer_original" id="ncode_imageresizer_container_1" src="http://i.imgur.com/rVB2Efm.jpg" alt="" border="0" height="611" width="1024"> <br>\r\n<br>\r\n<img src="http://img231.imageshack.us/img231/4503/statistiques.png" alt="" border="0"><br>\r\n<br>\r\n<font color="Blue"><font color="Orange">QualitÃ©: </font><font color="red">DVDrip</font></font><br>\r\n <font color="Blue"> <font color="Orange">Format: </font></font><font color="Blue">Xvid(.avi)</font></b></font><font size="1"><font color="White">i</font></font><font face="Trebuchet MS"><b><br>\r\n <font color="Blue"> <font color="Orange">L</font></font><font color="Blue"><font color="Orange">angue: </font></font></b></font><font face="Trebuchet MS"><b><font color="Blue"><font face="Trebuchet MS"><b><font color="Blue">FranÃ§ais</font></b></font></font><br>\r\n <font color="Blue"> <font color="Orange">Sous-titre: </font></font></b></font><font face="Trebuchet MS"><b><font color="Blue">Aucun</font></b></font><font size="1"><font color="White">i</font></font><font face="Trebuchet MS"><b><br>\r\n <br>\r\n     <font color="Blue"><font color="Orange">DÃ©couper avec:</font></font><font color="Blue"><font color="Orange"> <font color="Blue">Winrar</font></font></font><br>\r\n  <font color="Blue"> <font color="Orange">Nombre de fichiers:</font></font></b></font><font face="Trebuchet MS"><b><font color="Blue"><font face="Trebuchet MS"><b><font color="Blue"><font color="Orange"><font color="Blue">01 </font></font></font><font color="Blue">Fichier</font></b></font></font><br>\r\n <font color="Blue"> <font color="Orange">Taille des fichiers:<font color="Blue"> 703</font></font> Mo</font><br>\r\n <font color="Blue"> <font color="Orange">Taille totale:</font></font></b></font><font face="Trebuchet MS"><b><font color="Blue"><font color="Orange"><font color="Blue"><font face="Trebuchet MS"><b><font color="Blue"><font color="Orange"><font color="Blue">703</font></font> Mo</font></b></font></font></font></font><font color="Blue"><br>\r\n</font><br>\r\n<img src="http://img815.imageshack.us/img815/2169/downloadnt.png" alt="" border="0"><br>\r\n<br>\r\n</b></font><font face="Trebuchet MS"><b><a href="http://www.gulfup.com/?Toc8Bh" target="_blank">http://www.gulfup.com/?Toc8Bh</a><br>\r\n<a href="http://180upload.com/eozu5sjz8s8o" target="_blank">http://180upload.com/eozu5sjz8s8o</a><br>\r\n<a href="http://snfa2aci83.1fichier.com/" target="_blank">http://snfa2aci83.1fichier.com/</a><br>\r\n<a href="http://4upfiles.com/5o1hnb183j4j" target="_blank">http://4upfiles.com/5o1hnb183j4j</a><br>\r\n<a href="http://bayfiles.net/file/1i6pi/iucRzG/hit.By.jihed_1991.Tn-SaT.Mysterion.rar" target="_blank">http://bayfiles.net/file/1i6pi/iucRz....Mysterion.rar</a><br>\r\n<a href="http://billionuploads.com/4kpylxkmh794" target="_blank">http://billionuploads.com/4kpylxkmh794</a><br>\r\n<a href="http://dl.free.fr/q2O9tafzA" target="_blank">http://dl.free.fr/q2O9tafzA</a><br>\r\n<a href="http://hugefiles.net/q0hjnszk03ul" target="_blank">http://hugefiles.net/q0hjnszk03ul</a><br>\r\n<a href="http://jheberg.net/download/hitbyjihed-1991tn-satmysterion/" target="_blank">http://jheberg.net/download/hitbyjih...-satmysterion/</a><br>\r\n<a href="http://www.multiup.org/download/950e0ab4a7baf89794c7328e607caada/hit.By.jihed_1991.Tn-SaT.Mysterion.rar" target="_blank">http://www.multiup.org/download/950e....Mysterion.rar</a><br>\r\n<a href="http://uplea.com/dl/CCADC6675F3C9CF" target="_blank">http://uplea.com/dl/CCADC6675F3C9CF</a><br>\r\n<a href="http://uploadhero.co/dl/5a95bc08" target="_blank">http://uploadhero.co/dl/5a95bc08</a><br>\r\n<a href="http://uptobox.com/f35ciaxncms8" target="_blank">http://uptobox.com/f35ciaxncms8</a><br>\r\n<br>\r\n</b><b>  <img src="http://img546.imageshack.us/img546/8386/enjoyg.png" alt="" border="0"><br>\r\n</b></font>                                                                                       \r\n\r\n		\r\n\r\n\r\n\r\n	<br><br></div>', 2, 1, 1406314718);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Sports'),
(2, 'Films'),
(3, 'Jeux'),
(4, 'Logiciels');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_publication` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(60) NOT NULL,
  `maxsize` int(20) NOT NULL,
  `phonenumber` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `aboutme` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `sitename`, `maxsize`, `phonenumber`, `email`, `aboutme`) VALUES
(1, 'TSBLOG', 4194304, '0021688888888', 'webmaster@domain.com', 'Make your presentation!<br>');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `country` varchar(60) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(60) NOT NULL,
  `picture` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `fullname`, `email`, `password`, `country`, `birthday`, `gender`, `picture`) VALUES
(1, 'admin', 'admin@admin.com', '25f9e794323b453885f5181f1b624d0b', 'TN', '1992-01-01', 'male', '/blog/uploads/pictures/default_male.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
