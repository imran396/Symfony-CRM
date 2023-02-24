-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: db516363882.db.1and1.com
-- Generation Time: May 06, 2014 at 01:24 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3-7+squeeze19

SET FOREIGN_KEY_CHECKS=0;
-- 
-- Database: `db516363882`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `AccessLevel`
-- 

DROP TABLE IF EXISTS `AccessLevel`;
CREATE TABLE `AccessLevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `AccessLevel`
-- 

INSERT INTO `AccessLevel` VALUES (7, 'Customer', 'ROLE_CUSTOMER');
INSERT INTO `AccessLevel` VALUES (8, 'Press releases', 'ROLE_PRESSRELEASE');
INSERT INTO `AccessLevel` VALUES (9, 'All', 'ROLE_ALL');

-- --------------------------------------------------------

-- 
-- Table structure for table `Affiliation`
-- 

DROP TABLE IF EXISTS `Affiliation`;
CREATE TABLE `Affiliation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `Affiliation`
-- 

INSERT INTO `Affiliation` VALUES (12, 'Lehners');
INSERT INTO `Affiliation` VALUES (13, 'Besitos');
INSERT INTO `Affiliation` VALUES (14, 'Aposto');
INSERT INTO `Affiliation` VALUES (15, 'Enchiladas');
INSERT INTO `Affiliation` VALUES (16, 'Big Easy');
INSERT INTO `Affiliation` VALUES (17, 'Einzelkonzept');

-- --------------------------------------------------------

-- 
-- Table structure for table `BudgetPeriod`
-- 

DROP TABLE IF EXISTS `BudgetPeriod`;
CREATE TABLE `BudgetPeriod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3B0CB96A9395C3F3` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

-- 
-- Dumping data for table `BudgetPeriod`
-- 

INSERT INTO `BudgetPeriod` VALUES (4, 10, '2014-03-18', '2014-12-31', 100000);
INSERT INTO `BudgetPeriod` VALUES (5, 10, '2015-01-01', '2015-12-31', 110000);
INSERT INTO `BudgetPeriod` VALUES (6, NULL, '2014-04-10', '2014-12-31', 100000);
INSERT INTO `BudgetPeriod` VALUES (8, 17, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (9, 25, '2014-05-01', '2014-12-31', 15000);
INSERT INTO `BudgetPeriod` VALUES (10, 25, '2015-01-01', '2015-12-31', 24000);
INSERT INTO `BudgetPeriod` VALUES (11, 29, '2014-01-01', '2014-12-31', 15000);
INSERT INTO `BudgetPeriod` VALUES (12, 29, '2013-01-01', '2013-12-31', 15600);
INSERT INTO `BudgetPeriod` VALUES (13, 33, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (14, 21, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (15, 30, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (16, 16, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (17, 15, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (18, 31, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (19, 34, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (20, 19, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (21, 22, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (22, 14, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (23, 36, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (24, 24, '2014-04-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (25, 28, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (26, 23, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (27, 20, '2014-01-01', '2014-12-31', 9999);
INSERT INTO `BudgetPeriod` VALUES (28, 35, '2014-06-01', '2014-12-31', 9999);

-- --------------------------------------------------------

-- 
-- Table structure for table `Campaign`
-- 

DROP TABLE IF EXISTS `Campaign`;
CREATE TABLE `Campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approvalMailSent` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `budget` double DEFAULT NULL,
  `numberOfAds` int(11) DEFAULT NULL,
  `sizeOfAds` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberOfSeconds` int(11) DEFAULT NULL,
  `audienceSize` int(11) DEFAULT NULL,
  `adDetails` longtext COLLATE utf8_unicode_ci,
  `writingInclusive` tinyint(1) DEFAULT NULL,
  `freePrInclusive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regularPrice` double DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `approved_by_id` int(11) DEFAULT NULL,
  `approvedAt` datetime DEFAULT NULL,
  `approvalMailSentAt` datetime DEFAULT NULL,
  `approvement_sender_id` int(11) DEFAULT NULL,
  `denied` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E663708B2ADD6D8C` (`supplier_id`),
  KEY `IDX_E663708B9395C3F3` (`customer_id`),
  KEY `IDX_E663708BE7A1254A` (`contact_id`),
  KEY `IDX_E663708B2D234F6A` (`approved_by_id`),
  KEY `IDX_E663708B713F1C19` (`approvement_sender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

-- 
-- Dumping data for table `Campaign`
-- 

INSERT INTO `Campaign` VALUES (11, 10, 10, 5, 'Jahrespaket WOB', 0, 1, NULL, '2014-01-01', '2014-12-31', 5700, 52, '100', NULL, 135000, 'KW 16 - Ostern\r\nKW 17 -\r\nKW 18 -', 1, NULL, NULL, '2014-03-18 20:36:35', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (15, 12, 21, NULL, 'Uni-Werbung', 0, 1, 'gekündigt am 13.04 per Email, Eingang Kündigungs-Bestätigung', '2014-02-25', '2014-11-24', 711, NULL, NULL, NULL, 0, NULL, 0, NULL, 711, '2014-04-13 12:59:22', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (16, 68, 22, 25, 'Stripes', 0, 1, '126 Dollar pro Ausgabe', '2014-05-01', '2015-04-30', 1090.68, 12, '98,4', NULL, NULL, NULL, 0, NULL, 1090.68, '2014-04-13 13:09:12', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (17, 14, 16, NULL, 'Osterbrunch - Wochenzeitung', 0, 1, 'Anfrage versendet am 13.04.2014', '2014-04-16', '2014-04-16', 250, 1, '5520', NULL, 135000, NULL, 0, NULL, NULL, '2014-04-13 13:43:07', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (18, 15, 16, 8, 'Rockland', 0, 1, 'Restsekunden: 7.030 Sek.\r\n13.04.14 Mittagstisch eingebucht bis 300514', '2013-08-01', '2014-07-30', 4223, NULL, NULL, 8640, NULL, NULL, 0, NULL, NULL, '2014-04-13 13:52:51', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (19, 15, 17, 8, 'Rockland', 0, 1, 'Aktuelle Restsekunden: 2.696 Sek. für Besitos\r\n130414 Neue Spots eingeplant', '2013-08-01', '2014-07-30', 4223, NULL, NULL, 8640, NULL, NULL, 0, NULL, NULL, '2014-04-13 13:53:49', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (21, 17, 23, NULL, 'Plakatierung Biergarten-Eröffnung', 0, 0, 'A0\r\nLudwigsburg 20-40\r\nAsperg 10\r\nSchwieberdingen 8\r\n\r\nHandlingpauschale: 140,- *\r\nJe Plakattafel: 3,- Euro', '2014-04-15', '2014-04-30', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-13 14:32:39', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (22, 15, 24, NULL, 'Rockland Eröffnungswerbung', 0, 0, 'Sekunden kommen von Aposto und Besitos Mainz', '2014-05-01', '2014-05-10', NULL, NULL, NULL, 2000, NULL, NULL, 0, NULL, NULL, '2014-04-13 14:49:38', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (23, 19, 16, 10, 'Stadtleben', 0, 0, NULL, '2014-01-01', '2014-12-31', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'http://stadtleben.de/mainz/news/2014/04/08/osterbrunch-im-aposto/', NULL, '2014-04-13 14:55:54', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (24, 20, 22, NULL, 'Facebook Werbung allgmein', 0, 1, '10 Euro für Facebook am Tag - läuft seit 13.04.14', '2014-04-13', '2014-05-30', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-13 14:58:28', NULL, '2014-04-29 21:06:42', NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (25, 21, 10, 11, 'typisch FRAU extra', 0, 0, 'Hallo Herr Sieber,\r\n\r\nwir bereiten gerade die Veröffentlichung der Ausgabe „typisch FRAU extra“ vor und habe noch etwas Platz frei!\r\nMöchte Ihnen kurzfristig eine ganze Seite zu 750 EUR anbieten!\r\nGen. Lokalpreis zzgl. MWST.\r\n\r\nAuflage 88.000 Ex., Erscheinungstermin 27.4.2014\r\nFormat 204 mm b. x 280 mm h.\r\n\r\nWenn Ihnen das Angebot zusagt, dann bitte ich um schnelle Rückmeldung!\r\n\r\nFür weitere Auskünfte stehe ich Ihnen gerne zur Verfügung.', '2014-04-27', '2014-04-27', 750, 1, NULL, NULL, 88000, NULL, 0, NULL, NULL, '2014-04-14 15:13:37', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (26, 16, 29, 9, 'essen und genießen', 0, 0, 'Hallo Herr Sieber, \r\n\r\nanbei biete ich Ihnen folgendes Sonderangebot für unsere Sonderbeilage "Essen und Geniessen in der Metropolregion" an: \r\nAngebot gilt jeweils für Enchilada und Besitos. \r\n\r\nFormat:                jeweils 1 Ganze Seite = 228mm breit und 320mm hoch, aufgeteilt in 1/2 Seite Anzeige (228mm breit und 140mm hoch) + 1/2 PR-Bericht obendrüber \r\nAusgabe:                Mannheimer Morgen, Südhessen Morgen, Schwetzinger Zeitung und 4 Wochen online \r\nPlatzierung:                Doppelseite (Enchilada & Besitos gegenüberliegend) in der Sonderbeilage "Essen und Geniessen in der Metropolregion" \r\nErscheinungstermin:        14. März 2014 \r\nPreis:                        jeweils 637,50 Euro netto \r\n\r\nBitte sagen Sie mir schnellstmöglichst bescheid. \r\n\r\nGrüße \r\n\r\nRoland Scharschmidt', '2014-03-14', '2014-03-14', 284, 1, '15960', NULL, NULL, NULL, 0, NULL, 319, '2014-04-14 16:39:05', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (27, 22, 29, NULL, 'Parkhaus-Werbung', 0, 1, NULL, '2014-03-01', '2018-02-28', 15360, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-14 16:40:29', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (28, 23, 29, NULL, 'Iss was! 02/2014', 0, 1, NULL, '2014-03-06', '2014-03-06', 150, 1, '11375', NULL, NULL, NULL, 0, NULL, NULL, '2014-04-14 17:18:56', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (29, 24, 29, NULL, 'campus-Tüte Sommersemster', 0, 1, NULL, '2014-04-28', '2014-04-28', 1, NULL, NULL, NULL, 800, NULL, 0, NULL, 1, '2014-04-14 17:25:20', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (30, 25, 29, NULL, 'Espresso 2014', 0, 0, NULL, '2014-10-01', '2014-10-01', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-14 18:29:04', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (31, 19, 29, NULL, 'Stadtleben', 0, 0, NULL, '2014-05-01', '2014-12-31', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2014-04-14 18:34:20', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (32, 27, 33, NULL, 'NACHLESUNGSVERZEICHNIS', 0, 1, NULL, '2014-07-01', '2014-07-01', 80, 1, NULL, NULL, 10000, NULL, 1, NULL, 80, '2014-04-14 22:05:05', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (33, 28, 33, NULL, 'Biergarten-Radio-Kooperation', 0, 1, NULL, '2014-04-01', '2014-09-30', 6600, NULL, NULL, NULL, NULL, NULL, 1, NULL, 6600, '2014-04-14 22:13:11', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (34, 29, 21, NULL, 'Jahresvereinbarung - Frizz', 0, 1, 'Hallo Stefan,\r\n\r\nwir buchen wie folgt für Enchilada Marburg\r\n\r\n¼-Seite = A6-Flyer\r\nRegulärer Preis: 650 Euro zzgl. Steuer\r\n50 % Rabatt 325 Euro zzgl. Steuer \r\nInkl. Redaktion!\r\nLaufzeit: 12 Ausgaben – keine automatische Verlängerung\r\n\r\nAnzeige für April: kommt heute noch\r\nRedaktion für April liegt vor (Opening Party)\r\n\r\nDanke!\r\n\r\nGießen nur 11-Anteile', '2014-05-01', '2015-03-31', 1787, 11, NULL, NULL, NULL, NULL, 1, NULL, 3575, '2014-04-14 22:30:06', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (35, 29, 30, NULL, 'Jahresvereinbarung - Frizz', 0, 1, 'Hallo Stefan,\r\n\r\nwir buchen wie folgt für Enchilada Marburg\r\n\r\n¼-Seite = A6-Flyer\r\nRegulärer Preis: 650 Euro zzgl. Steuer\r\n50 % Rabatt 325 Euro zzgl. Steuer \r\nInkl. Redaktion!\r\nLaufzeit: 12 Ausgaben – keine automatische Verlängerung\r\n\r\nAnzeige für April: kommt heute noch\r\nRedaktion für April liegt vor (Opening Party)\r\n\r\nDanke!\r\n\r\n1 - Anteil allein\r\n11 - Anteile 50/50 mit Gießen', '2014-04-01', '2015-03-31', 2112, 12, NULL, NULL, 25000, NULL, 1, NULL, 4225, '2014-04-14 22:32:36', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (36, 24, 33, NULL, 'campus-Tüte Wintersemster 2013', 0, 1, NULL, '2013-11-12', '2013-12-05', NULL, NULL, NULL, NULL, 5300, NULL, 0, NULL, NULL, '2014-04-15 09:51:55', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (37, 24, 33, NULL, 'campus-Tüte Wintersemster 2014', 0, 0, NULL, '2014-11-01', '2014-11-01', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-15 09:53:33', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (38, 30, 33, NULL, 'Mittagstischmailing', 0, 1, NULL, '2014-02-20', '2014-02-20', 181, NULL, NULL, NULL, 453, NULL, 0, NULL, NULL, '2014-04-15 09:57:26', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (39, 31, 18, NULL, 'Schwetzinger Zeitung', 0, 0, NULL, '2014-04-30', '2014-04-30', 99, 1, '5000', NULL, 15900, NULL, 1, NULL, NULL, '2014-04-15 16:26:57', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (40, 32, 25, NULL, 'Select - Basis - Jahresangebot', 0, 0, 'Select - Basis\r\n\r\nRadio Primavera und Radio Galaxy: \r\n\r\nZeitraum:	15.04.2014 bis 14.04.2015 (12 Monate) \r\nSchaltungen:	Monatlich 50 Schaltungen á 15 - 20 Sekunden \r\n	(z.B.: an 10 Tagen je 5 Schaltungen täglich).\r\n	\r\nSendezeiten:	„best of day“, 06:00 – 18:00 Uhr (mindestens 50 %)\r\n	monatliche UP-Grades\r\nProduktion:	Sprecher, Musik, etc. inklusive \r\n	\r\nIhr Sonderpreis:	Monatlich 992,33 € zzgl. gesetzl. MwSt.\r\nMediawert: (Preis lt. Preislis-te)	4.500,00 € zzgl. gesetzl. MwSt.', '2014-05-01', '2015-04-30', 11908, NULL, NULL, 12000, NULL, NULL, 0, NULL, 54000, '2014-04-15 16:36:40', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (41, 32, 25, NULL, 'Select – Intensiv: Jahresvertrag', 0, 0, 'Select – Intensiv:\r\n\r\nRadio Primavera und Radio Galaxy: \r\n\r\nZeitraum:	15.04.2014 bis 14.04.2015 (12 Monate) \r\nSchaltungen:	Monatlich 100 Schaltungen á 15 - 20 Sekunden \r\n	(z.B.: an 20 Tagen je 5 Schaltungen täglich).\r\n	\r\nSendezeiten:	„best of day“, 06:00 – 18:00 Uhr (mindestens 50 %)\r\n	monatliche UP-Grades\r\nProduktion:	Sprecher, Musik, etc. inklusive \r\n	\r\nIhr Sonderpreis:	Monatlich 1.984,66 € zzgl. gesetzl. MwSt.\r\nMediawert: (Preis lt. Preislis-te)	9.000,00 € zzgl. gesetzl. MwSt.', '2014-05-01', '2015-04-30', 23816, NULL, NULL, 24000, NULL, NULL, 0, NULL, 108000, '2014-04-15 16:39:52', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (42, 33, 25, NULL, 'Frizz Aschaffenburg - Jahresvertrag', 0, 1, NULL, '2013-12-01', '2014-11-30', 3528, 12, NULL, NULL, 18000, 'Mai: Cocktail Casino', 1, NULL, 5880, '2014-04-15 19:07:25', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (43, 35, 25, NULL, 'Stadtleben - 3 Monate', 0, 1, 'Hallo Markus,\r\n\r\n\r\nhier die damalige Vereinbarung.\r\n\r\nDa die Fotografie bei all unseren Testläufen nur sehr schlechte Ergebnisse brachte, sind hier leider weniger Galerien entstanden bzw. wir haben Abende mit 1-2 Fotos i. d. R. nicht online gestellt, da sie eher negative Wirkung haben.\r\n\r\nAllerdings haben wir zusätzlich zu den versprochenen Leistungen noch viele Teaserschaltungen im Wert von einigen hundert EUR vorgenommen, insbesondere im Zusammenhang mit Speisekarte und Cocktail Casino. Ich denke von dieser Werbewirkung hattet Ihr einen größeren Nutzen.\r\n\r\nDas erste Quartal bzw. die erste 3-Monatsphase endet am 30.04.2014. Am besten wir setzen uns also in den nächsten 1-2 Wochen mal zusammen und besprechen ob und in wie weit wir hier eine Zusammenarbeit fortsetzen/anpassen. Ich hätte hierzu z. B. am Karfreitag oder am 24.04.2014 nachmittags und am 25.04.2014 zwischen 12:00 und 17:00 Uhr Zeit.', '2014-02-01', '2014-04-30', 570, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2014-04-15 19:29:52', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (44, 34, 25, NULL, 'Showtime', 0, 1, NULL, '2014-02-15', '2014-05-14', 750, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-15 19:31:29', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (45, 24, 21, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-30', '2014-04-30', 1, NULL, NULL, NULL, 3000, NULL, 0, NULL, NULL, '2014-04-15 19:34:39', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (46, 24, 15, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-10', '2014-04-10', 1, NULL, NULL, NULL, 800, NULL, 0, NULL, NULL, '2014-04-15 19:39:57', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (47, 24, 31, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-10', '2014-04-10', 1, NULL, NULL, NULL, 800, NULL, 0, NULL, NULL, '2014-04-15 19:42:46', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (48, 24, 34, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-28', '2014-05-07', 1, NULL, NULL, NULL, 7000, NULL, 0, NULL, NULL, '2014-04-15 19:46:39', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (49, 24, 19, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-28', '2014-05-07', 1, NULL, NULL, NULL, 7000, NULL, 0, NULL, NULL, '2014-04-15 19:48:20', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (50, 24, 22, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-06-05', '2014-06-05', 1, NULL, NULL, NULL, 1500, NULL, 0, NULL, NULL, '2014-04-15 19:49:56', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (51, 24, 25, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-08', '2014-04-08', 1, NULL, NULL, NULL, 800, NULL, 0, NULL, NULL, '2014-04-15 19:51:50', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (52, 24, 14, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-14', '2014-04-14', 1, NULL, NULL, NULL, 2000, NULL, 0, NULL, NULL, '2014-04-15 19:55:27', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (53, 24, 30, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-24', '2014-04-24', 1, NULL, NULL, NULL, 2500, NULL, 0, NULL, NULL, '2014-04-15 20:02:01', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (54, 24, 28, NULL, 'campus-Tüte Sommersemster 2014', 0, 1, NULL, '2014-04-10', '2014-04-10', 1, NULL, NULL, NULL, 3000, NULL, 0, NULL, NULL, '2014-04-15 20:10:19', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (55, 36, 28, NULL, 'Bremen4 - Cocktail Casino - Werbung', 0, 1, NULL, '2014-02-10', '2014-03-04', 5056, NULL, NULL, 800, 77000, NULL, 0, NULL, NULL, '2014-04-15 20:16:21', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (56, 37, 25, 14, 'Verkaufsoffener Sonntag', 0, 1, NULL, '2014-04-20', '2014-04-27', 149, 2, NULL, NULL, 148000, NULL, 0, NULL, NULL, '2014-04-15 20:30:40', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (57, 39, 21, NULL, 'WTFG?! Semesterheft', 0, 0, NULL, '2014-06-01', '2014-06-01', NULL, 1, NULL, NULL, 8000, NULL, 0, NULL, 500, '2014-04-16 20:26:42', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (58, 40, 23, NULL, 'Sportvereinigung 07 Ludwigsburg e.V. - Sponsoring', 0, 0, NULL, '2014-06-01', '2014-06-01', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-16 21:27:25', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (59, 38, 30, NULL, 'Anzeige Eröffnung Express Marburg', 0, 0, 'Nachverhandelt: 300 Euro\r\n\r\nHalo Herr Sieber,\r\n\r\nwie eben telefonisch besprochen kann ich Ihnen für die Eröffnungs-Party im Enchilada Marburg im Anzeigenpreis nochmals entgegenkommen:\r\n\r\n***1/4-Seite, 4c, Format: 93mm breit/ 128mm hoch\r\n***Sonderpreis: 346,- EUR +MWSt\r\n\r\nIch würde mich freuen, wenn Ihnen mein Angebot zusagt und Sie sich zwecks Reservierung bis Freitag bei mir melden.\r\n\r\nDie Anzeigendatei brauchen wir bis Montag den 14.04.14\r\nan: feedback@marbuch-verlag.de\r\n\r\nViele Grüße\r\nN.Brinkmöller\r\n\r\n\r\n-- \r\n\r\n\r\nTel: 0 64 21 / 68 44 22\r\nFax: 0 64 21 / 68 44 44\r\nfeedback@marbuch-verlag.de\r\n\r\nMarbuch Verlag GmbH - Magazin Express\r\nErnst-Giller-Str. 20a - 35039 Marburg\r\nwww.marbuch-verlag.de\r\n\r\nGeschäftsführer:\r\nPeter Mannshardt - Michael Boegner\r\nAmtsgericht Marburg HR B Nr. 1484\r\n\r\n-------------------------------------\r\nSOUND I EXPRESS\r\nSa, 12. April 2014, 21 Uhr\r\nBoptown Cats – Rock''n''Roll + Rockabilly\r\nLive im Knubbel, Marburg\r\nKarten online unter www.marbuch-verlag.de', '2014-04-24', '2014-04-24', 300, NULL, '11904', NULL, 12053, NULL, 0, NULL, NULL, '2014-04-16 21:45:46', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (60, 41, 29, NULL, 'Rhein-Neckar Löwen  Supporterclub – Team', 0, 0, 'Absage durch Robby, 160414', '2014-01-01', '2014-12-31', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-16 21:58:14', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (61, 42, 38, NULL, 'TV Werbung', 0, 0, NULL, '2014-05-01', '2014-05-10', 1000, NULL, NULL, 1200, NULL, NULL, 0, NULL, NULL, '2014-04-16 22:05:15', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (62, 16, 29, 9, 'Sonderbeilage "Essen & Geniessen in der Metropolregion" am 16. Mai 2014', 0, 0, NULL, '2014-05-16', '2014-05-16', 580, 1, NULL, NULL, 52590, NULL, 0, NULL, NULL, '2014-04-16 22:14:39', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (63, 16, 18, 9, 'Sonderbeilage "Essen & Geniessen in der Metropolregion" am 16. Mai 2014', 0, 0, NULL, '2014-05-16', '2014-05-16', 580, 1, NULL, NULL, 52590, NULL, 0, NULL, NULL, '2014-04-16 23:10:39', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (64, 30, 29, NULL, 'Mailing Veranstaltungsraum', 0, 1, NULL, '2014-05-01', '2014-05-01', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-17 12:32:49', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (65, 43, 33, NULL, 'Gudd Gess', 0, 0, 'http://www.gudd-gess.de/start/gastro/ratskeller/', '2014-01-01', '2014-12-31', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-17 12:43:08', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (66, 44, 29, NULL, 'Bio Brotbox Mannheim', 0, 0, 'Von: Achim Scheifl - Seufert & Diemer (Versicherungsmakler) [mailto:a.scheifl@seufert-diemer.de] \r\nGesendet: Donnerstag, 10. April 2014 08:47\r\nAn: Robert Nürnberger\r\nBetreff: Bio Brotbox Mannheim\r\n \r\nHallo Robby, \r\n \r\nanbei sende ich dir noch die versprochene Info zu der Bio-Brotbox, die für die diesjährigen Erstklässler in Mannheim geplant ist und um Spender wirbt. Stückzahl ca. 1400 Boxen. Werden im September verteilt.\r\nAnbei auch einen Link zu einem youtube Beitrag über die Aktion in Berlin. Das sollte doch in Mannehim auch zu schaffen sein... :)\r\n \r\nhttp://youtu.be/7z5hZLFKvEw\r\n \r\nSchaus dir bitte mal an und lass uns quatschen :o)\r\n \r\nLG\r\n \r\nAchim\r\n \r\n \r\n \r\n----- Original Message ----- \r\nFrom: Petra Leinberger \r\nTo: Scheifl, Achim \r\nSent: Wednesday, March 19, 2014 12:44 PM\r\nSubject: Bio Brotbox Mannheim\r\n \r\nHallo Herr Scheifl,\r\nhier noch einmal kurz zusammengefasst Infos zur Bio Brotbox Mannheim.\r\n \r\nWir haben im vergangenen Jahr die Bio Brotbox-Initiative nach Mannheim "getragen" und zunächst im kleinen Rahmen (um uns "warmzulaufen") mit einer Schule , der Pestalozzischule, begonnen.\r\nEs lief so gut, dass wir uns nun für 2014 zutrauen, allen interessierten Mannheimer Grundschulen die Bio-Brotbox zukommen zu lassen.\r\nKürzlich hatten wir ein Netzwerk-Treffen einiger beteiligter Städte, bei dem wir unsere Erfahrungen austauschen und uns gegenseitig hilfreiche Tipps geben konnten.\r\nDie Initiativen einiger Städte sind schon seit vielen Jahren dabei und werden bei der Bio Brotbox auch durch viele regionale Unternehmen unterstützt.\r\nWarum sollte das nicht auch in Mannheim funktionieren?\r\nWir sprechen zur Zeit alle  Mannheimer Grundschulen an, um die Bio Brotbox anzubieten - natürlich würden wir uns sehr freuen, dabei von vielen MannheimerInnen unterstützt zu werden.\r\nWas wir noch dringend benötigen, sind "Promi-Paten", einen Logistiker,bei dem wir die Produkte anliefern,lagern und packen können und der bei der Verteilung/dem Ausfahren hilft, Menschen, die beim Packen und Verteilen helfen und Firmen, die mit Geld zur Beschaffung der leeren Boxen helfen möchten (das müssen keine riesigen Beträge sein,wenn wir  ein paar Unternehmen finden, die 100 bis 200 EUR spenden, haben wir die Boxen ja schon nahezu zusammen, der Preis pro Box lag im vergangenen Jahr bei EUR 0,57 zzgl. MwSt.- eine Spendenquittung ist über die Netzwerkorganisation möglich ).\r\nKreative Leute, die uns bei der Flyererstellung oder sonstwie beim Publizieren der Aktion unterstützen möchten, sind auch willkommen.\r\n \r\nWorum geht es bei der Bio-Brotbox?\r\nBei dieser Aktion wird Erstklässern zur Einschulung eine Brotbox mit gesunden Bio-Lebensmitteln übergeben (z.B. Möhre, Apfel,Müsliriegel,vegetarischer Brotaufstrich, Müsli, Fruchtsaft o.ä.).\r\nBei der Aktion geht es darum, früh das Thema gesunde Ernährung ins Bewusstsein zu rücken und einen Impuls für die Wichtigkeit eines täglichen gesunden Frühstücks zu geben.\r\n \r\n Grundsätzlich sind folgende 3 Ziele definiert : \r\nJedes Kind sollte täglich frühstücken\r\nJedes Kind sollte täglich gesund frühstücken\r\nJedes Kind sollte Nahrung schätzen lernen und Wissen über Herkuft und Entstehung von Lebensmitteln kennenlernen.\r\nDie Aktion bietet also auch den Lehrern/Lehrerinnen die Möglichkeit, mit diesem "Aufhänger" eine altersgerechte Auseinandersetzung mit diesem Thema im Unterricht zu implementieren.\r\n \r\nWeitere Info finden Sie auch unter:\r\nwww.bio-brotbox.de oder auf unserer Mannheimer Bio-Brotbox-Website: www.biobrotbox-mannheim.de\r\n \r\nIch sende Ihnen auch einmal die Presseerklärung der Netzwerkorganisation über die Initiativen 2013.\r\nVielleicht haben Sie ja eine Idee und Interesse, uns beim weiteren Aufbau der Aktion in Mannheim zu unterstützen - ich würde mich sehr freuen!\r\n \r\nBei der Akquise von Sponsoren, die die Boxen befüllen, waren wir schon recht erfolgreich und werden Gaben von Alnatura, PEMA, Spielberger Mühle, Reformhaus Escher, WILLMANN PAX AN , Provamel\r\nund anderen erhalten.\r\n.\r\nHerzliche Grüße\r\n \r\n \r\nPetra Leinberger\r\n \r\nCheckpoint Marktforschung\r\nTraitteurstr. 28 - 34\r\n68165 Mannheim\r\nTel 0621 - 49 49 480 - 20\r\nFax 0621 - 49 49 480 - 28\r\nwww.checkpoint-mafo.com\r\n \r\nGründer der Initiative Bio-Brotbox Mannheim\r\nwww.biobrotbox-mannheim.de\r\n \r\nPLEASE: THINK BEFORE YOU PRINT!', '2014-06-01', '2014-06-01', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-17 13:06:53', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (67, 10, 38, 5, 'Titelseite WOB', 0, 0, 'Hi Markus,\r\n\r\nAuf der Titelseite für den 23. April ist im  Leitartikel  ein Platzierung in der Größe 2/150 frei\r\nPreis laut Liste 1083.-€ , frech wie ich bin  biete ich den für 390.-€ netto an.\r\nDas Format ist 87mm Breite- 150mm Höhe . Bitte gib mir bei Interesse über die Feiertage Bescheid, die Vorlage brauch ich am Dienstag spätestens um 12Uhr ( bitte, bitte nicht später)\r\n\r\n\r\nLG und frohe Ostern', '2014-04-23', '2014-04-23', 390, 1, '13050', NULL, 135000, NULL, 0, NULL, 1083, '2014-04-18 10:36:11', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (68, 45, 23, NULL, 'Anzeige Ludwigsburger Wochenblatt - Biergarteneröffnung', 0, 0, 'Guten Morgen.\r\n\r\n\r\nDie 1/3-Seite ist 324 x 160mm oder 180 x 280mm und die halbe Seite ist 324 x 240mm!  \r\n\r\nMit freundlichem Gruß \r\n\r\nVolker Hildner.\r\n \r\nLudwigsburger Wochenblatt GmbH + Co. KG. \r\nLindenstraße 15. \r\n71634 Ludwigsburg. \r\nTelefon (07141) 96 20-515. \r\nTelefax (07141) 96 20- 10 515.\r\nMobil (0172) 71 644 74. \r\nVolker.Hildner@luwo.de\r\nwww.Ludwigsburger-Wochenblatt.de\r\n\r\nSitz Ludwigsburg. HRA 202159 Stuttgart. \r\nPers.haft. Ges.: Ludwigsburger Wochenblatt Verwaltungs-GmbH 202913 Stuttgart. \r\nGeschäftsführer: Gerhard Ulmer.\r\n\r\n\r\n\r\n\r\n-----Ursprüngliche Nachricht-----\r\nVon: Markus Sieber | beon-communications [mailto:markus.sieber@beon-communications.de]\r\nGesendet: Samstag, 12. April 2014 15:58\r\nAn: Hildner, Volker\r\nBetreff: AW: Re:1/1-Anzeige oder Beilage - Ratskeller Ludwigsburg\r\n\r\n... geben Sie mir mal bitte die Abmessungen und Preise von einer 1/3-Seite und einer 1/2-Seite. Südausgabe.\r\n\r\nDanke!\r\n\r\n-----Ursprüngliche Nachricht-----\r\nVon: Hildner, Volker [mailto:Volker.Hildner@luwo.de]\r\nGesendet: Donnerstag, 10. April 2014 17:01\r\nAn: Markus Sieber | beon-communications\r\nBetreff: WG: Re:1/1-Anzeige oder Beilage - Ratskeller Ludwigsburg\r\nWichtigkeit: Hoch\r\n\r\nHallo Herr Sieber,\r\n\r\nden unteren Teil hatten wir schon zwei mal als Angebot!\r\n\r\nSollten sie bereits Anzeigenvorlagen\r\nhaben und dafür ein Angebot benötigen,dann bitte per Mail senden genauer Größenangabe der Anzeige(n).\r\n\r\nErscheinungestermine:\r\n\r\n\r\nET				Anzeigenschluß\r\n\r\n17.4.2014			15.04.2014 um 15.00 Uhr\r\n24.04.2014			22.04.2014 um 15.00 Uhr\r\n30.04. (statt 01.05.2014)		28.04.2014 um 15.00 Uhr !!!!\r\n \r\n\r\nMit freundlichem Gruß \r\n\r\nVolker Hildner.\r\n \r\nLudwigsburger Wochenblatt GmbH + Co. KG. \r\nLindenstraße 15. \r\n71634 Ludwigsburg. \r\nTelefon (07141) 96 20-515. \r\nTelefax (07141) 96 20- 10 515.\r\nMobil (0172) 71 644 74. \r\nVolker.Hildner@luwo.de\r\nwww.Ludwigsburger-Wochenblatt.de\r\n\r\nSitz Ludwigsburg. HRA 202159 Stuttgart. \r\nPers.haft. Ges.: Ludwigsburger Wochenblatt Verwaltungs-GmbH 202913 Stuttgart. \r\nGeschäftsführer: Gerhard Ulmer.\r\n\r\n\r\n\r\n> ______________________________________________ \r\n> Von: 	Hildner, Volker  \r\n> Gesendet:	Dienstag, 3. Dezember 2013 09:31\r\n> An:	''markus.sieber@beon-communications.de''\r\n> Betreff:	Re:1/1-Anzeige oder Beilage - Ratskeller Ludwigsburg\r\n> Wichtigkeit:	Hoch\r\n> \r\n> Hallo Herr Sieber,\r\n> \r\n> auf zum nächsten Versuch> ...>\r\n> \r\n> Also, ein einzelnes A4-Blatt können wir nicht beilegen, aber wie wäre \r\n> es wenn wir das Blatt als Anzeige drucken? Auf die Größe 231 x 327mm \r\n> skalieren und wir haben eine schöne Anzeigengröße zum Preis von:\r\n> \r\n> Gesamtausgabe (153 100 Exemplare):			5342,-> EUR> /Netto	abzügl. AE-Rabatt\r\n> Südausgabe (93 200 Exemplare).			2000,-> EUR> /Netto abzügl. AE-Rabatt\r\n> \r\n> \r\n> Als 1/1-Seite  324 x 485mm\r\n> \r\n> Gesamtausgabe (153 100 Exemplare):			10790,-> EUR> /Netto abzügl. AE-Rabatt\r\n> Südausgabe (93 200 Exemplare).			  3500,-> EUR> /Netto abzügl. AE-Rabatt\r\n> \r\n> Als Anlage habe ich das Gebiet Gesamt und Süd beigefügt.\r\n> \r\n> \r\n> 	> >  <<Gesamt 2012.pdf>> 		> >  <<Süd 2012.pdf>> \r\n> \r\n> \r\n> Mit freundlichem Gruß\r\n> \r\n> Volker Hildner.\r\n>  \r\n> Ludwigsburger Wochenblatt GmbH + Co. KG. \r\n> Lindenstraße 15. \r\n> 71634 Ludwigsburg. \r\n> Telefon (07141) 96 20-515. \r\n> Telefax (07141) 96 20- 10 515.\r\n> Mobil (0172) 71 644 74. \r\n> Volker.Hildner@luwo.de\r\n> www.Ludwigsburger-Wochenblatt.de\r\n> \r\n> Sitz Ludwigsburg. HRA 202159 Stuttgart. \r\n> Pers.haft. Ges.: Ludwigsburger Wochenblatt Verwaltungs-GmbH 202913 Stuttgart. \r\n> Geschäftsführer: Gerhard Ulmer.\r\n> \r\n> \r\n> \r\n> \r\n>  \r\n> 					\r\n> \r\n> \r\n> \r\n> \r\n> \r\n> Guten Tag,\r\n> wir haben Interesse in ihrem Wochenblatt eine ganzseitige Anzeige oder eine Beilage A4 für den Ratskeller Ludwigsburg zu buchen.\r\n> Bittte um ein Angebot.\r\n> Danke!\r\n> Mit freundlichen Grüßen\r\n> Markus Sieber\r\n> beon-communications\r\n> Postfach 52 44\r\n> 97002 Würzburg\r\n> markus.sieber@beon-communications.de\r\n> M 0176/96244951\r\n> Visit us - www.beon-communications.de\r\n> Like us - www.facebook.com/beoncommunications\r\n> \r\n> \r\n>', '2014-04-30', '2014-05-01', 1000, 1, NULL, NULL, 93200, NULL, 1, NULL, NULL, '2014-04-18 13:08:18', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (69, 46, 23, 19, 'Biergarten-Eröffnung Radio', 0, 1, NULL, '2014-04-28', '2014-05-01', 1760.05, NULL, NULL, 300, 78000, NULL, 1, NULL, NULL, '2014-04-18 13:22:50', NULL, '2014-04-27 14:51:40', NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (70, 10, 38, 5, 'Sonderseite/-kollektiv Gasto jeden 3 Mittwoch im Monat', 0, 0, 'Hiermit erhalten Sie die Infos zu unserer neuen Sonderseite, mit der wir zielgerichtet die Gastronomie in und um Würzburg unterstützen möchten.\r\nBei diesem Paket haben wir noch einmal sehr stark an unserer „Preisschraube“ gedreht und bieten Ihnen damit die Möglichkeit,  zu einem absolut fairen Preis Ihre  Werbekampagne in der Wob zu verwirklichen.\r\n\r\nDiese Sonderseite/-kollektiv erscheint jeweils zum 3. Mittwoch im Monat.\r\n\r\nKampagnenzeitraum: April bis einschl. September 2014\r\nStart: 16. April 2014\r\n\r\nAngebot:\r\nmm-Preis 0,99 € netto (statt regulär 2,40 € netto) z. B. Anzeigengröße 2sp/50 mm für 99,00 € netto (statt regulär 240,00 € netto) Bei Buchung von 6 Schaltungen erhalten Sie zusätzlich einen Text incl. Bild in der Größe Ihrer gebuchten Anzeige\r\n\r\nSelbstverständlich gilt der günstige mm-Preis für jede weitere Anzeigengröße.\r\n\r\nNutzen Sie diese einmalige Gelegenheit!!\r\nFür Fragen stehe ich Ihnen jederzeit sehr gerne zur Verfügung.\r\n\r\nBis dahin alles Gute und herzliche Grüße\r\n\r\nGisela Schubert\r\nIhre persönliche Mediaberaterin', '2014-04-16', '2014-04-17', 594, 6, '4350', NULL, 135000, NULL, 1, NULL, 1440, '2014-04-18 17:55:07', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (71, 47, 10, NULL, 'Hochzeitsmesse TRAUMHOCHZEIT', 0, 0, NULL, '2014-10-11', '2014-10-12', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-18 18:13:33', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (72, 36, 28, NULL, 'Muttertag-Angebot', 0, 0, NULL, '2014-05-10', '2014-05-10', NULL, NULL, NULL, NULL, 77000, NULL, 0, NULL, NULL, '2014-04-19 09:44:15', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (73, 30, 14, NULL, 'Veranstaltungen-Mailing', 0, 1, NULL, '2014-03-10', '2014-03-10', 108, NULL, NULL, NULL, 800, NULL, 0, NULL, NULL, '2014-04-19 10:05:24', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (74, 30, 14, NULL, 'Mittagstischmailing', 0, 1, NULL, '2014-01-17', '2014-01-17', 100, NULL, NULL, NULL, 250, NULL, 0, NULL, NULL, '2014-04-19 10:07:50', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (75, 30, 15, NULL, 'Mittagstischmailing', 0, 1, NULL, '2014-02-20', '2014-02-20', NULL, NULL, NULL, NULL, 299, NULL, 0, NULL, 120, '2014-04-19 10:15:21', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (76, 30, 16, NULL, 'Mittagstischmailing', 0, 1, NULL, '2014-01-17', '2014-01-17', 23, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-19 10:19:33', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (77, 48, 10, NULL, 'Werbung auf Taxiquittung', 0, 1, NULL, '2013-04-01', '2014-03-31', 3000, 1, NULL, NULL, 50000, NULL, 0, NULL, NULL, '2014-04-19 10:26:07', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (78, 24, 16, NULL, 'Promo an der Uni', 0, 0, 'Servus,\r\n\r\nhier der Preis und die Locations:\r\n\r\nHier die möglichen Standflächen:\r\nMainz, Zentralmensa, Foyer, Staudingerweg 15, 55128 Mainz\r\nMainz, Philosophicum, Foyer, Jakob-Welder-Weg 18, 55128 Mainz\r\nMainz, Uni-ReWi-Gebäude, Foyer, Jakob-Welder-Weg 9, 55128 Mainz  \r\n\r\n100 Euro pro Tag und Location.\r\n\r\nWann soll die Promo sein mit The Big Easy – Job-Flyer?\r\n\r\nMit freundlichen Grüßen\r\n\r\n\r\n\r\nAposto macht eine Promo, wenn wir mit Big Easy durch sind!\r\nBitte auf dem Schirm behalten.\r\n\r\nDanke & Grüße,\r\n\r\nMirko', '2014-09-01', '2014-09-01', 100, NULL, NULL, NULL, NULL, NULL, 0, NULL, 100, '2014-04-19 16:13:08', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (79, 50, 10, NULL, 'City Move Cross Media Paket', 0, 1, 'Hallo lieber Partner, ein Jahr ist schon wieder vergangen und Ihr Jahresbeitrag über 690,- Euro für das City Move Cross Media Paket ist wieder fällig. Im Paket ist wie immer eine viertel Seite Anzeige inklusive Bitte senden Sie mir bis zum 28.02.2014 die Anzeige in der Größe von 85 x 264 mm. Bitte teilen Sie mir möglichst zeitnah mit, wenn wir die Anzeige für Sie bauen sollen oder eventuell die Anzeige vom letzten Jahr verwenden sollen......', '2014-02-01', '2015-01-31', 690, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-19 16:20:57', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (80, 51, 10, NULL, 'Jahreskooperation Culinaria Würzburg', 0, 0, NULL, '2014-01-01', '2014-12-31', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-19 16:37:19', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (81, 52, 10, NULL, 'Anzeige tonight', 0, 0, 'Infos unklar', '2014-06-01', '2014-06-01', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-19 16:40:02', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (82, 54, 29, NULL, 'Anzeige  Mannheim Studieren - Wegweiser 2015', 0, 0, 'Hallo Herr Sieber, \r\nvielen Dank für Ihr Interesse am " Wegweiser 2015 - Studieren in Mannheim " , der Jahresbroschüre des Studentenwerks Mannheim.\r\nUnsere ganz besonderen Angebote zu einer Anzeigenschaltung finden Sie unten.\r\n\r\n"Der " Wegweiser " erscheint 1 jährlich im Juli, rechtzeitig vor Beginn des Herbst-Wintersemesters, mit einer Auflage von 8.0000 Exemplaren. Das Magazin wird kostenlos durch das Studentenwerk an Universität, Fachhochschule und Berufsakademie verteilt sowie den Anmeldungsunterlagen der vielen neuen Studierenden beigelegt.\r\n\r\n  \r\nAngebote zu einer Anzeigenschaltung im " Wegweiser 2015 - Studieren in Mannheim ", zum Beispiel:\r\n\r\n1/4 Seite, 58mm breit x 88mm hoch,\r\nAngebotspreis: € 200,- statt € 340,-\r\n1/3 Seite, 120mm breit x 57mm hoch,\r\nAngebotspreis: € 300,- statt € 550,- \r\n1/2 Seite, 120mm breit x 88mm hoch,\r\nAngebotspreis: € 400,-  statt € 750,-\r\njeweils incl. Farbe, zzgl. MwSt.\r\n\r\nAnzeigenschluss:06. Juni 2014\r\nErscheinungstermin ab Juli 2014\r\n\r\nAls Anhang die Mediadaten  und die Ausgabe vom letzten Jahr zur Ansicht.\r\n\r\nSagen Sie mir bitte Bescheid, ob Sie eines unserer Angebote wahrnehmen möchten, damit ich vorab den entsprechenden Platz reservieren kann.  \r\n\r\nIch freue mich auf Ihre Antwort und stehe für Rückfragen gerne zur Verfügung.  \r\n\r\nHerzliche Grüße und eine sonnige Zeit\r\nBernd Riedel\r\n\r\nBR Medienberatung\r\nTel.: 06172 - 2661022\r\nFax: 06172 - 2661024\r\ne-mail: riedel.bernd@t-online.de \r\n\r\n \r\nDER PLAN OHG\r\n\r\nWerbeagentur & Kartografie\r\nSiegmund-Schuckert-Straße 5\r\n68199 Mannheim\r\nTel.: 06 21 / 83 59 69-0\r\nFax: 06 21 / 83 59 69-10\r\nwww.derplan-online.de\r\ninfo@derplan-online.de\r\n \r\nSitz der Gesellschaft: Mannheim\r\nAmtsgericht Mannheim HRA 4930\r\n\r\n\r\n20042014-MS: Angebot und Mediadaten angefordert,', '2014-07-01', '2014-07-02', 1, 1, NULL, NULL, 8000, NULL, 0, NULL, NULL, '2014-04-20 12:51:11', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (83, 53, 23, NULL, 'Infostand Hochzeitsmesse', 0, 0, '200414-MS/Unterlagen digital angefordert', '2014-11-08', '2014-11-09', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-20 12:55:59', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (84, 20, 38, NULL, 'Facebook-Werbung', 0, 1, NULL, '2014-04-12', '2014-04-20', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-20 13:01:29', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (85, 55, 38, NULL, 'Titelseite Frizz Würzburg', 0, 1, NULL, '2014-05-01', '2014-05-31', 1200, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2014-04-20 13:08:50', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (86, 56, 10, NULL, 'TischKultur... Essen und Wein', 0, 0, NULL, '2014-05-15', '2014-05-15', 200, 1, NULL, NULL, 12500, NULL, 0, NULL, 380, '2014-04-20 15:07:53', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (87, 57, 34, NULL, 'Sonderheft WM-FIEBER 2014', 0, 0, NULL, '2014-05-27', '2014-05-27', NULL, NULL, NULL, NULL, 30000, NULL, 0, NULL, NULL, '2014-04-20 15:23:59', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (88, 57, 19, NULL, 'Sonderheft WM-FIEBER 2014', 0, 0, NULL, '2014-05-27', '2014-05-27', NULL, NULL, NULL, NULL, 30000, NULL, 0, NULL, NULL, '2014-04-20 15:24:50', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (89, 58, 29, NULL, 'City-Guide 2014/2015 Mannheim', 0, 0, 'Sehr geehrter Herr Sieber, \r\n\r\nanbei erhalten Sie Ihre Anzeigenvorlage, die Sie in unserem City-Guide 2013/2014 geschaltet haben. \r\n\r\nMöchten Sie diese Anzeige auch wieder für unseren City-Guide 2014/2015 schalten? \r\n\r\nDer City-Guide 2014/2015 wird ab Mai 2014 verteilt. \r\n\r\nSonderpreis wie 2013 = 500,- Euro netto \r\n\r\n\r\nMediadaten: \r\nKompakt, übersichtlich, anregend: der neue „City Guide – LEBENSFREUDE.IM QUADRAT.“ \r\nMannheims interessante Adressen parallel im Internet und in der Mannheim App. \r\nProfitieren Sie vom Crossmedia Angebot im attraktiven City Guide Mannheim. Präsentieren Sie sich als eine der interessanten Adressen unserer Stadt in einem der Bereiche: \r\n\r\n• Shopping \r\n• Food & More \r\n• Culture \r\nAuch als Website unter » www.cityguide.morgenweb.de und iPhone-/Android App als Ergänzung zu den wichtigsten Veranstaltungen Mannheims, dem aktuellen Kinoprogramm und allen kulturellen Highlights. \r\nDiesen umfangreichen crossmedialen City Guide haben wir entwickelt für die Kongressbesucher und Touristen Mannheims, für Shopping-Affine und Lifestyle-Orientierte, für neue Bürger und natürlich für den Einzelhandel und die Gastronomie-Szene der Stadt.\r\nSeien Sie dabei und nutzen Sie unser attraktives Medium und Angebot! \r\nReservieren Sie gleich Ihr Wunsch-Format, ich berate Sie gerne über weitere Details. \r\nMit freundlichen Grüßen', '2014-05-17', '2014-05-17', 500, NULL, NULL, NULL, 30000, NULL, 0, NULL, 750, '2014-04-20 15:31:56', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (90, 59, 10, NULL, 'Einkaufsführer 2014 BGAK', 0, 0, NULL, '2014-05-01', '2014-05-01', 1, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-21 19:45:59', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (91, 59, 32, NULL, 'Einkaufsführer 2014 Enchilada Würzburg', 0, 0, NULL, '2014-05-01', '2014-05-01', 1, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-21 19:47:15', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (92, 59, 38, NULL, 'Einkaufsführer 2014 Besitos Würzburg', 0, 0, NULL, '2014-05-01', '2014-05-01', 1, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-21 19:48:24', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (93, 10, 20, NULL, 'in Muenchen - Anzeigen-Angebot Muttertag', 0, 0, 'Hallo zurück Herr Sieber,\r\n \r\nLust, dafür im „in“ zu werben ?\r\nWir würden uns freuen!\r\nVoila z.B.:\r\n \r\n·         Redaktionelle Einbindung / Promotion  in der Rubrik „Lokalitäten“ \r\n \r\n·    eine Anzeige (nstrecke) in beliebigem Umfang und beliebigen Formaten\r\nmit   bis zu  50% Kundenrabatt\r\n \r\nz.B.\r\n \r\n1/ 8 Seite (80b x 80h) , 4c,\r\nListenpreis 660,- \r\n50% Rabatt\r\n<   330,00 €  + MwSt.\r\n \r\n \r\n1/ 10 Seite (80b x 69h bzw 39b x 141h ) , 4c,\r\nListenpreis 540,- \r\n50% Rabatt\r\n<   270,00 €  + MwSt.\r\n \r\n \r\n 1/ 12 Seite (39b x 112h bzw 80b x 55h) , 4c,\r\nListenpreis 450,- \r\n50% Rabatt\r\n<   225,00 €  + MwSt.\r\n \r\n \r\n \r\n \r\n·         Bei einer Flyerbeilage\r\nliegen Sie bei 72 € / 1000 Stk.\r\nEine Touren-Auswahl sende ich Ihnen bei Interesse separat zu.\r\n \r\n \r\nDie Mediadaten und Erscheinungstermine in Kalenderform\r\nsind im Anhang.\r\n \r\nHerzlich,\r\n \r\nRenate Kieninger', '2014-05-01', '2014-05-01', NULL, 1, NULL, NULL, 135000, NULL, 0, NULL, NULL, '2014-04-24 13:15:25', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (94, 61, 10, NULL, 'Szene Magazin', 0, 0, NULL, '2014-05-01', '2014-05-01', 1, NULL, NULL, NULL, 20000, NULL, 0, NULL, NULL, '2014-04-25 07:59:56', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (95, 19, 22, NULL, 'Bus-Werbung', 0, 0, 'http://www.eswe-verkehr.de/verkehrsmittelwerbung/werbeformen-preise/', '2014-06-01', '2014-06-01', 0.01, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-27 14:38:16', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (96, 19, 22, NULL, 'Internetwerbung - Stadtleben.de', 0, 0, NULL, '2014-01-01', '2014-12-31', 0.01, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-27 14:39:16', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (97, 10, 24, NULL, 'gastrocareer', 0, 0, NULL, '2014-05-01', '2014-06-30', 220, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-04-27 15:35:01', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (98, 10, 10, NULL, 'AAAA-test-campaign', 0, 0, NULL, '2014-01-01', '2014-01-02', 1, NULL, NULL, NULL, 135000, NULL, 0, NULL, NULL, '2014-04-29 00:19:32', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (99, 57, 19, NULL, 'Lift - Brunch-Bewerbung/Jahresvertrag', 0, 0, NULL, '2014-06-01', '2014-06-01', 1, NULL, NULL, NULL, 30000, NULL, 0, NULL, NULL, '2014-04-30 09:50:20', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (100, 64, 23, NULL, 'Werbung im Parkhaus', 0, 0, NULL, '2014-06-01', '2014-06-02', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-05-03 12:52:27', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (101, 19, 17, 10, 'Stadtleben', 0, 0, NULL, '2014-01-01', '2014-01-02', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2014-05-03 12:57:23', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (102, 66, 38, NULL, 'Campus Würzburg', 0, 1, NULL, '2014-06-28', '2014-06-29', 70, 1, '1560', NULL, NULL, NULL, 0, NULL, 70, '2014-05-04 10:49:48', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (103, 66, 32, NULL, 'Campus Würzburg', 0, 1, NULL, '2014-06-28', '2014-06-29', 70, 1, '1560', NULL, NULL, NULL, 0, NULL, 70, '2014-05-04 10:56:01', NULL, NULL, NULL, NULL, 0);
INSERT INTO `Campaign` VALUES (104, 66, 10, NULL, 'Campus Würzburg', 0, 1, NULL, '2014-06-28', '2014-06-29', 70, 1, '1560', NULL, NULL, NULL, 0, NULL, 70, '2014-05-04 10:57:14', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `Customer`
-- 

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE `Customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliation_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `contactName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactPhone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactMobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contractStart` date DEFAULT NULL,
  `contractEnd` date DEFAULT NULL,
  `facebookUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactBirthday` date DEFAULT NULL,
  `monday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tuesday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wednesday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thursday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saturday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sunday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `holiday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `daily` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `irregular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postingInfo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checkWebsite` date DEFAULT NULL,
  `checkCityPage` date DEFAULT NULL,
  `lastFbSitePost` date DEFAULT NULL,
  `lastFbPrivatePost` date DEFAULT NULL,
  `lastVisit` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_784FEC5FCB94D64E` (`affiliation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

-- 
-- Dumping data for table `Customer`
-- 

INSERT INTO `Customer` VALUES (10, 17, 'Brauerei-Gasthof Alter Kranen', 'Kranenkai 1, 97070 Würzburg', 'Alexis Kyventidis', '093199131545', NULL, 'info@alterkranen.de', '2014-01-01', NULL, 'https://www.facebook.com/AlterKranen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (14, 14, 'Aposto Bamberg', 'Geyerswörthstraße 5,\r\n96047 Bamberg', 'Jens Müller', '0951 91700481', NULL, 'bamberg@aposto.eu', '2014-01-01', NULL, 'https://www.facebook.com/Aposto.Bamberg?fref=ts', '2011-02-01', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (15, 14, 'Aposto Schweinfurt', 'Markt 1, 97421 Schweinfurt', 'Adrian Ujvari', '09721-18 80 85 8', NULL, 'schweinfurt@aposot.eu', '2014-01-01', NULL, 'https://www.facebook.com/Aposto.Schweinfurt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (16, 14, 'Aposto Mainz', 'Gutenbergplatz 8-12, 55116 Mainz', 'Mirko Knittel', '06131 6931620', NULL, 'mainz@aposto.eu', '2014-01-01', NULL, 'https://www.facebook.com/aposto.mainz', '2011-11-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (17, 13, 'Besitos Mainz', 'Bahnhofplatz 4,\r\n55116 Mainz', 'Markus Hoffmann', '06131 55 43 834', NULL, 'mainz@besitos.de', '2014-01-01', NULL, 'https://www.facebook.com/Besitos.Mainz', '2004-02-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (18, 13, 'Besitos Schwetzingen', 'Schlossplatz 7\r\n68723 Schwetzingen', 'Felicitas Schneider', '06202/1260404', NULL, 'schwetzingen@besitos.de', '2014-01-01', '2014-04-30', 'https://www.facebook.com/restaurant.besitos.schwetzingen', '2013-04-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (19, 13, 'Besitos Stuttgart', 'Rotebühlplatz 21\r\n70178 Stuttgart', 'Tobias Morgenthaler', '071148 98 430', NULL, 'stuttgart@besitos.de', '2014-01-01', NULL, 'https://www.facebook.com/Besitos.Stuttgart', '2002-10-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (20, 16, 'The Big Easy München', 'Frundsbergstraße 46, 80634 München', 'Daniel Kostrewa', '089 15 89 02 53', NULL, 'info4us@thebigeasy.de', '2014-01-01', NULL, 'https://www.facebook.com/bigeasymuenchen?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (21, 15, 'Enchilada Gießen', 'Ludwigstraße 30, 35390 Gießen', 'Chris Mandel', '0641 98386392', NULL, 'gießen@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/restaurant.enchilada.giessen?fref=ts', '2013-11-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (22, 15, 'Enchilada Wiesbaden', 'Schützenhofstr. 3, 65183 Wiesbaden', 'Erkan Tan', '0611 45048350', NULL, 'wiesbaden@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/enchilada.wiesbaden', '2012-10-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (23, 17, 'Ratskeller Ludwigsburg', 'Wilhelmstrasse 13, 71638 Ludwigsburg', 'Tobias Morgenthaler', '07141 2423020', NULL, NULL, '2014-01-01', NULL, 'https://www.facebook.com/ratskeller.ludwigsburg?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (24, 16, 'The Big Easy Mainz', 'Jockel-Fuchs-Platz 3, 55116 Mainz', 'Grit Matanda', '06131 6931620', NULL, NULL, '2014-05-01', NULL, 'https://www.facebook.com/bigeasymainz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (25, 15, 'Enchilada Aschaffenburg', 'Goldbacher Straße 25, 63739 Aschaffenburg', 'Markus Hahn', '06021 4562850', NULL, 'aschaffenburg@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/enchilada.aschaffenburg', '2013-10-15', NULL, 'Kinotag - Nach dem Kinobesuch gegen Abgabe der Kinokarte HH', 'Sneak-Tag - Nach dem Kinobesuch gegen Abgabe der Kinokarte HH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-05');
INSERT INTO `Customer` VALUES (28, 15, 'Enchilada Bremen', 'Langenstr. 42, 28195 Bremen', 'Andrew Laukant', '0421 16 85 400', NULL, 'bremen@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/Enchilada.Bremen.Schlachte?fref=ts', '1999-04-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (29, 15, 'Enchilada Mannheim', 'S4, 17-22\r\n68161 Mannheim', 'Robert Nürnberger', '0621 1 56 93 27', NULL, 'mannheim@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/enchilada.mannheim', '2000-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (30, 15, 'Enchilada Marburg', 'Gerhard-Jahn-Platz 21-21a, 35037 Marburg', 'Markus Niederberghaus', '06421/1657845', NULL, 'marburg@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/enchilada.marburg?ref=ts&fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (31, 15, 'Enchilada Schweinfurt', 'Rückertstraße 30, 97421 Schweinfurt', 'David Rothe', '09721 5419621', NULL, 'schweinfurt@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/enchilada.schweinfurt?fref=ts', '2012-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (32, 15, 'Enchilada Würzburg', 'Karmelitenstraße 20, 97070 Würzburg', 'Jacqueline Rupp', '0931- 40 444 02', NULL, 'wuerzburg@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/enchilada.wuerzburg?fref=ts', '2004-09-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (33, 17, 'Ratskeller Saarbrücken', 'Rathausplatz 1, 66111 Saarbrücken', 'Peter Habermann', '0681 9101708', NULL, 'info@ratskeller-saarbruecken.de', '2014-01-01', NULL, 'https://www.facebook.com/ratskeller.saarbruecken?fref=ts', '2009-10-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (34, 15, 'Enchilada Stuttgart', 'Eberhardstr. 69 - 71, 70173 Stuttgart', 'Harald Huber', '0711 236 59 74', NULL, 'stuttgart@enchilada.de', '2014-01-01', NULL, 'https://www.facebook.com/stuttgart.enchilada?fref=ts', '1998-07-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (35, 14, 'Aposto Gera', 'Parkstraße 10, 07548 Gera', NULL, '0365/83200832', NULL, 'gera@aposto.eu', '2014-01-01', NULL, 'https://www.facebook.com/aposto.gera?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (36, NULL, 'Wirkes', 'Nürnberger Str. 90, 97076 Würzburg', 'Marlies Frachet', '0931/2307884', NULL, NULL, '2014-01-01', NULL, 'https://www.facebook.com/Wirkes.Wuerzburg?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (37, NULL, 'Hahnzelt Würzburg', 'Weinmarkt 9, 91438 Bad Windsheim', 'Theresa Pröschel', '09841 40170', NULL, 'info@hahnzelt.de', '2014-01-01', NULL, 'https://www.facebook.com/hahn.festzelt?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (38, 13, 'Besitos Würzburg', 'Karmelitenstrasse 20, 97070 Würzburgh', 'Karsten Rupp', NULL, NULL, 'wuerzburg@besitos.de', '2014-01-01', NULL, 'https://www.facebook.com/besitos.wuerzburg?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (39, NULL, 'Enchilada Franchise', NULL, NULL, NULL, NULL, NULL, '2014-01-01', NULL, 'https://www.facebook.com/Enchilada.mexikanisches.Restaurant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (40, NULL, 'beon-communications', NULL, NULL, NULL, NULL, NULL, '2014-01-01', NULL, 'https://www.facebook.com/beoncommunications', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (41, NULL, 'Hahnzelt Schweinfurt', NULL, NULL, NULL, NULL, NULL, '2014-06-20', '2014-06-30', 'https://www.facebook.com/pages/Hahn-Zelt-Volksfestzelt-Schweinfurt/387402631369018?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Customer` VALUES (42, NULL, 'DB Regio', NULL, NULL, NULL, NULL, NULL, '2014-01-01', NULL, 'https://www.facebook.com/bayernticket?fref=ts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `CustomerFacebookUrl`
-- 

DROP TABLE IF EXISTS `CustomerFacebookUrl`;
CREATE TABLE `CustomerFacebookUrl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `is_own` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F0836DF81CFDAE7` (`url_id`),
  KEY `IDX_F0836DF9395C3F3` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `CustomerFacebookUrl`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `FacebookLikecount`
-- 

DROP TABLE IF EXISTS `FacebookLikecount`;
CREATE TABLE `FacebookLikecount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `likecount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_44BA8E9681CFDAE7` (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `FacebookLikecount`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `FacebookUrl`
-- 

DROP TABLE IF EXISTS `FacebookUrl`;
CREATE TABLE `FacebookUrl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B70EB431F47645AE` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `FacebookUrl`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `Facebook_log`
-- 

DROP TABLE IF EXISTS `Facebook_log`;
CREATE TABLE `Facebook_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `numFans` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29528259395C3F3` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=699 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=699 ;

-- 
-- Dumping data for table `Facebook_log`
-- 

INSERT INTO `Facebook_log` VALUES (7, 10, 1381, '2014-04-11');
INSERT INTO `Facebook_log` VALUES (8, 10, 1382, '2014-04-12');
INSERT INTO `Facebook_log` VALUES (10, 10, 1382, '2014-04-13');
INSERT INTO `Facebook_log` VALUES (12, 14, 2168, '2014-04-13');
INSERT INTO `Facebook_log` VALUES (13, 15, 2449, '2014-04-13');
INSERT INTO `Facebook_log` VALUES (14, 16, 5427, '2014-04-13');
INSERT INTO `Facebook_log` VALUES (16, 18, 672, '2014-04-13');
INSERT INTO `Facebook_log` VALUES (17, 19, 2419, '2014-04-13');
INSERT INTO `Facebook_log` VALUES (18, 10, 1382, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (19, 14, 2176, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (20, 15, 2451, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (21, 16, 5430, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (22, 17, 1457, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (23, 18, 674, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (24, 19, 2422, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (25, 20, 698, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (26, 21, 1178, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (27, 22, 2531, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (29, 24, 246, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (30, 25, 1813, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (31, 28, 3098, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (32, 29, 2666, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (33, 30, 786, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (34, 31, 1865, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (35, 32, 5177, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (38, 34, 3032, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (39, 35, 185, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (40, 36, 527, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (41, 37, 698, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (42, 38, 550, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (43, 23, 1199, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (44, 33, 2827, '2014-04-14');
INSERT INTO `Facebook_log` VALUES (45, 10, 1290, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (46, 14, 2020, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (47, 15, 2210, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (48, 16, 5164, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (49, 17, 1374, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (50, 18, 613, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (51, 19, 2020, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (52, 20, 642, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (53, 21, 1040, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (54, 22, 1892, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (55, 23, 1103, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (56, 25, 1627, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (57, 28, 2485, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (58, 29, 2557, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (59, 30, 94, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (60, 31, 1706, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (61, 32, 4938, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (62, 33, 2740, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (63, 34, 2810, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (64, 35, 104, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (65, 36, 492, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (66, 37, 269, '2014-01-01');
INSERT INTO `Facebook_log` VALUES (67, 10, 1309, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (68, 14, 2043, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (69, 15, 2305, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (70, 16, 5255, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (71, 17, 1406, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (72, 18, 626, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (73, 19, 2073, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (74, 20, 663, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (75, 21, 1079, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (76, 22, 1977, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (77, 23, 1133, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (78, 25, 1694, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (79, 28, 2983, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (80, 29, 2582, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (81, 30, 160, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (82, 31, 1768, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (83, 32, 5040, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (84, 33, 2767, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (85, 34, 2900, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (86, 35, 117, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (87, 36, 496, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (88, 37, 267, '2014-02-01');
INSERT INTO `Facebook_log` VALUES (89, 10, 1346, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (90, 14, 2117, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (91, 15, 2371, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (92, 16, 5334, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (93, 17, 1422, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (94, 18, 641, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (95, 19, 2182, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (96, 20, 671, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (97, 21, 1114, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (98, 22, 2059, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (99, 23, 1159, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (100, 25, 1760, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (101, 28, 3032, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (102, 29, 2627, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (103, 30, 297, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (104, 31, 1813, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (105, 32, 5082, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (106, 33, 2787, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (107, 34, 2962, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (108, 35, 150, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (109, 36, 507, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (110, 37, 279, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (111, 38, 278, '2014-03-01');
INSERT INTO `Facebook_log` VALUES (112, 10, 1366, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (113, 14, 2148, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (114, 15, 2430, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (115, 16, 5402, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (116, 17, 1442, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (117, 18, 657, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (118, 19, 2366, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (119, 20, 690, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (120, 21, 1153, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (121, 22, 2100, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (122, 23, 1193, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (123, 25, 1804, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (124, 28, 3082, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (125, 29, 2651, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (126, 30, 745, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (127, 31, 1852, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (128, 32, 5149, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (129, 33, 2815, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (130, 34, 3005, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (131, 35, 175, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (132, 36, 524, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (133, 37, 485, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (134, 38, 363, '2014-04-01');
INSERT INTO `Facebook_log` VALUES (135, 10, 1384, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (136, 14, 2178, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (137, 15, 2453, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (138, 16, 5430, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (139, 17, 1458, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (140, 18, 675, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (141, 19, 2426, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (142, 20, 698, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (143, 21, 1179, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (144, 22, 2571, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (145, 23, 1201, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (146, 24, 246, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (147, 25, 1814, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (148, 28, 3100, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (149, 29, 2668, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (150, 30, 788, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (151, 31, 1867, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (152, 32, 5176, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (153, 33, 2828, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (154, 34, 3034, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (155, 35, 185, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (156, 36, 527, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (157, 37, 699, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (158, 38, 593, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (159, 39, 1691, '2014-04-15');
INSERT INTO `Facebook_log` VALUES (160, 10, 1385, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (161, 14, 2180, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (162, 15, 2455, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (163, 16, 5428, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (164, 17, 1460, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (165, 18, 675, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (166, 19, 2429, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (167, 20, 698, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (168, 21, 1180, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (169, 22, 2623, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (170, 23, 1202, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (171, 24, 246, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (172, 25, 1816, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (173, 28, 3103, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (174, 29, 2671, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (175, 30, 795, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (176, 31, 1866, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (177, 32, 5177, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (178, 33, 2828, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (179, 34, 3035, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (180, 35, 186, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (181, 36, 528, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (182, 37, 698, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (183, 38, 634, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (184, 39, 1691, '2014-04-16');
INSERT INTO `Facebook_log` VALUES (185, 10, 1386, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (186, 14, 2180, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (187, 15, 2456, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (188, 16, 5435, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (189, 17, 1460, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (190, 18, 676, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (191, 19, 2429, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (192, 20, 699, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (193, 21, 1180, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (194, 22, 2668, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (195, 23, 1203, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (196, 24, 246, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (197, 25, 1816, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (198, 28, 3103, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (199, 29, 2671, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (200, 30, 801, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (201, 31, 1866, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (202, 32, 5182, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (203, 33, 2829, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (204, 34, 3036, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (205, 35, 188, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (206, 36, 528, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (207, 37, 698, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (208, 38, 693, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (209, 39, 1691, '2014-04-17');
INSERT INTO `Facebook_log` VALUES (210, 10, 1387, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (211, 14, 2184, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (212, 15, 2458, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (213, 16, 5447, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (214, 17, 1460, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (215, 18, 676, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (216, 19, 2430, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (217, 20, 701, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (218, 21, 1182, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (219, 22, 2724, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (220, 23, 1204, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (221, 24, 247, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (222, 25, 1816, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (223, 28, 3104, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (224, 29, 2674, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (225, 30, 804, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (226, 31, 1868, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (227, 32, 5181, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (228, 33, 2830, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (229, 34, 3037, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (230, 35, 188, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (231, 36, 528, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (232, 37, 698, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (233, 38, 754, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (234, 39, 1691, '2014-04-18');
INSERT INTO `Facebook_log` VALUES (235, 10, 1388, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (236, 14, 2184, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (237, 15, 2459, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (238, 16, 5451, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (239, 17, 1460, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (240, 18, 677, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (241, 19, 2437, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (242, 20, 702, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (243, 21, 1182, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (244, 22, 2768, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (245, 23, 1203, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (246, 24, 247, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (247, 25, 1816, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (248, 28, 3106, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (249, 29, 2673, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (250, 30, 810, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (251, 31, 1869, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (252, 32, 5179, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (253, 33, 2832, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (254, 34, 3035, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (255, 35, 188, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (256, 36, 528, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (257, 37, 698, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (258, 38, 796, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (259, 39, 1691, '2014-04-19');
INSERT INTO `Facebook_log` VALUES (260, 10, 1388, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (261, 14, 2184, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (262, 15, 2459, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (263, 16, 5470, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (264, 17, 1465, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (265, 18, 678, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (266, 19, 2436, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (267, 20, 702, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (268, 21, 1183, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (269, 22, 2820, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (270, 23, 1207, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (271, 24, 249, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (272, 25, 1817, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (273, 28, 3106, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (274, 29, 2676, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (275, 30, 833, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (276, 31, 1871, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (277, 32, 5180, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (278, 33, 2834, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (279, 34, 3037, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (280, 35, 189, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (281, 36, 530, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (282, 37, 698, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (283, 38, 842, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (284, 39, 1691, '2014-04-20');
INSERT INTO `Facebook_log` VALUES (285, 10, 1389, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (286, 14, 2186, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (287, 15, 2461, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (288, 16, 5477, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (289, 17, 1468, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (290, 18, 678, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (291, 19, 2445, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (292, 20, 704, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (293, 21, 1184, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (294, 22, 2867, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (295, 23, 1209, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (296, 24, 253, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (297, 25, 1817, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (298, 28, 3110, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (299, 29, 2677, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (300, 30, 836, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (301, 31, 1871, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (302, 32, 5179, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (303, 33, 2833, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (304, 34, 3037, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (305, 35, 189, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (306, 36, 530, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (307, 37, 697, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (308, 38, 844, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (309, 39, 1691, '2014-04-21');
INSERT INTO `Facebook_log` VALUES (310, 10, 1391, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (311, 14, 2199, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (312, 15, 2464, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (313, 16, 5484, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (314, 17, 1467, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (315, 18, 679, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (316, 19, 2446, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (317, 20, 706, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (318, 21, 1187, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (319, 22, 2922, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (320, 23, 1211, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (321, 24, 253, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (322, 25, 1818, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (323, 28, 3109, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (324, 29, 2678, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (325, 30, 841, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (326, 31, 1873, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (327, 32, 5181, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (328, 33, 2833, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (329, 34, 3039, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (330, 35, 190, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (331, 36, 530, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (332, 37, 697, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (333, 38, 846, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (334, 39, 1691, '2014-04-22');
INSERT INTO `Facebook_log` VALUES (335, 10, 1392, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (336, 14, 2248, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (337, 15, 2465, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (338, 16, 5485, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (339, 17, 1467, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (340, 18, 680, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (341, 19, 2447, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (342, 20, 706, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (343, 21, 1187, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (344, 22, 2942, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (345, 23, 1212, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (346, 24, 253, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (347, 25, 1818, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (348, 28, 3112, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (349, 29, 2678, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (350, 30, 843, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (351, 31, 1875, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (352, 32, 5183, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (353, 33, 2835, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (354, 34, 3039, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (355, 35, 191, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (356, 36, 530, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (357, 37, 697, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (358, 38, 850, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (359, 39, 1691, '2014-04-23');
INSERT INTO `Facebook_log` VALUES (360, 10, 1396, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (361, 14, 2275, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (362, 15, 2466, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (363, 16, 5488, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (364, 17, 1468, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (365, 18, 681, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (366, 19, 2449, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (367, 20, 707, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (368, 21, 1187, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (369, 22, 2958, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (370, 23, 1213, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (371, 24, 253, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (372, 25, 1820, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (373, 28, 3115, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (374, 29, 2678, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (375, 30, 848, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (376, 31, 1874, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (377, 32, 5183, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (378, 33, 2837, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (379, 34, 3041, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (380, 35, 192, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (381, 36, 532, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (382, 37, 697, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (383, 38, 851, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (384, 39, 1691, '2014-04-24');
INSERT INTO `Facebook_log` VALUES (385, 10, 1399, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (386, 14, 2274, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (387, 15, 2464, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (388, 16, 5485, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (389, 17, 1468, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (390, 18, 683, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (391, 19, 2452, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (392, 20, 707, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (393, 21, 1187, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (394, 22, 2973, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (395, 23, 1212, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (396, 24, 253, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (397, 25, 1819, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (398, 28, 3115, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (399, 29, 2680, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (400, 30, 855, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (401, 31, 1874, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (402, 32, 5185, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (403, 33, 2837, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (404, 34, 3049, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (405, 35, 192, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (406, 36, 533, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (407, 37, 699, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (408, 38, 851, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (409, 39, 1692, '2014-04-25');
INSERT INTO `Facebook_log` VALUES (410, 10, 1400, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (411, 14, 2277, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (412, 15, 2465, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (413, 16, 5488, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (414, 17, 1468, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (415, 18, 685, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (416, 19, 2461, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (417, 20, 707, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (418, 21, 1189, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (419, 22, 2985, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (420, 23, 1212, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (421, 24, 253, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (422, 25, 1819, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (423, 28, 3117, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (424, 29, 2683, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (425, 30, 876, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (426, 31, 1875, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (427, 32, 5187, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (428, 33, 2837, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (429, 34, 3049, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (430, 35, 193, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (431, 36, 533, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (432, 37, 699, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (433, 38, 856, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (434, 39, 1691, '2014-04-26');
INSERT INTO `Facebook_log` VALUES (435, 10, 1400, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (436, 14, 2279, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (437, 15, 2468, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (438, 16, 5497, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (439, 17, 1469, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (440, 18, 685, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (441, 19, 2467, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (442, 20, 709, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (443, 21, 1198, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (444, 22, 3008, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (445, 23, 1214, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (446, 24, 253, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (447, 25, 1820, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (448, 28, 3119, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (449, 29, 2684, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (450, 30, 886, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (451, 31, 1876, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (452, 32, 5191, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (453, 33, 2836, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (454, 34, 3048, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (455, 35, 193, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (456, 36, 533, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (457, 37, 699, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (458, 38, 857, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (459, 39, 1692, '2014-04-27');
INSERT INTO `Facebook_log` VALUES (460, 10, 1404, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (461, 14, 2279, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (462, 15, 2467, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (463, 16, 5499, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (464, 17, 1472, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (465, 18, 686, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (466, 19, 2470, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (467, 20, 710, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (468, 21, 1200, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (469, 22, 3028, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (470, 23, 1218, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (471, 24, 253, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (472, 25, 1822, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (473, 28, 3122, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (474, 29, 2686, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (475, 30, 892, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (476, 31, 1876, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (477, 32, 5195, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (478, 33, 2836, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (479, 34, 3049, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (480, 35, 193, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (481, 36, 533, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (482, 37, 699, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (483, 38, 862, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (484, 39, 1690, '2014-04-28');
INSERT INTO `Facebook_log` VALUES (485, 10, 1404, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (486, 14, 2284, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (487, 15, 2470, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (488, 16, 5503, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (489, 17, 1473, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (490, 18, 688, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (491, 19, 2473, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (492, 20, 712, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (493, 21, 1198, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (494, 22, 3043, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (495, 23, 1219, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (496, 24, 254, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (497, 25, 1823, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (498, 28, 3123, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (499, 29, 2688, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (500, 30, 898, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (501, 31, 1878, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (502, 32, 5198, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (503, 33, 2835, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (504, 34, 3050, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (505, 35, 198, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (506, 36, 533, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (507, 37, 699, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (508, 38, 865, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (509, 39, 1690, '2014-04-29');
INSERT INTO `Facebook_log` VALUES (510, 10, 1404, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (511, 14, 2285, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (512, 15, 2471, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (513, 16, 5511, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (514, 17, 1474, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (515, 18, 689, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (516, 19, 2474, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (517, 20, 715, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (518, 21, 1200, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (519, 22, 3058, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (520, 23, 1222, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (521, 24, 254, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (522, 25, 1825, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (523, 28, 3125, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (524, 29, 2689, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (525, 30, 900, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (526, 31, 1880, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (527, 32, 5200, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (528, 33, 2840, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (529, 34, 3052, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (530, 35, 199, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (531, 36, 533, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (532, 37, 699, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (533, 38, 869, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (534, 39, 1690, '2014-04-30');
INSERT INTO `Facebook_log` VALUES (535, 10, 1407, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (536, 14, 2286, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (537, 15, 2472, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (538, 16, 5517, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (539, 17, 1475, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (540, 18, 690, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (541, 19, 2475, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (542, 20, 716, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (543, 21, 1200, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (544, 22, 3073, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (545, 23, 1223, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (546, 24, 260, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (547, 25, 1826, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (548, 28, 3128, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (549, 29, 2689, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (550, 30, 901, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (551, 31, 1879, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (552, 32, 5202, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (553, 33, 2843, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (554, 34, 3052, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (555, 35, 202, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (556, 36, 533, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (557, 37, 699, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (558, 38, 871, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (559, 39, 1689, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (560, 40, 79, '2014-05-01');
INSERT INTO `Facebook_log` VALUES (561, 10, 1409, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (562, 14, 2290, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (563, 15, 2474, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (564, 16, 5520, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (565, 17, 1476, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (566, 18, 691, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (567, 19, 2479, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (568, 20, 717, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (569, 21, 1202, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (570, 22, 3086, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (571, 23, 1225, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (572, 24, 261, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (573, 25, 1827, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (574, 28, 3130, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (575, 29, 2689, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (576, 30, 909, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (577, 31, 1880, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (578, 32, 5201, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (579, 33, 2847, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (580, 34, 3055, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (581, 35, 202, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (582, 36, 533, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (583, 37, 699, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (584, 38, 875, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (585, 39, 1689, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (586, 40, 79, '2014-05-02');
INSERT INTO `Facebook_log` VALUES (587, 10, 1411, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (588, 14, 2294, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (589, 15, 2476, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (590, 16, 5526, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (591, 17, 1476, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (592, 18, 692, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (593, 19, 2479, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (594, 20, 717, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (595, 21, 1204, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (596, 22, 3101, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (597, 23, 1225, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (598, 24, 262, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (599, 25, 1827, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (600, 28, 3132, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (601, 29, 2690, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (602, 30, 917, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (603, 31, 1881, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (604, 32, 5203, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (605, 33, 2848, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (606, 34, 3053, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (607, 35, 203, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (608, 36, 533, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (609, 37, 699, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (610, 38, 875, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (611, 39, 1689, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (612, 40, 79, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (613, 41, 93, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (614, 42, 71162, '2014-05-03');
INSERT INTO `Facebook_log` VALUES (615, 10, 1411, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (616, 14, 2296, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (617, 15, 2479, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (618, 16, 5534, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (619, 17, 1476, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (620, 18, 692, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (621, 19, 2482, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (622, 20, 720, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (623, 21, 1206, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (624, 22, 3116, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (625, 23, 1228, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (626, 24, 262, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (627, 25, 1827, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (628, 28, 3133, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (629, 29, 2688, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (630, 30, 920, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (631, 31, 1882, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (632, 32, 5206, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (633, 33, 2847, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (634, 34, 3052, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (635, 35, 203, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (636, 36, 533, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (637, 37, 701, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (638, 38, 876, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (639, 39, 1688, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (640, 40, 79, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (641, 41, 93, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (642, 42, 71206, '2014-05-04');
INSERT INTO `Facebook_log` VALUES (643, 10, 1412, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (644, 14, 2297, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (645, 15, 2481, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (646, 16, 5538, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (647, 17, 1476, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (648, 18, 695, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (649, 19, 2485, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (650, 20, 722, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (651, 21, 1207, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (652, 22, 3132, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (653, 23, 1228, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (654, 24, 262, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (655, 25, 1828, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (656, 28, 3138, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (657, 29, 2693, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (658, 30, 919, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (659, 31, 1885, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (660, 32, 5207, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (661, 33, 2847, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (662, 34, 3053, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (663, 35, 203, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (664, 36, 533, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (665, 37, 701, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (666, 38, 877, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (667, 39, 1688, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (668, 40, 79, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (669, 41, 93, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (670, 42, 71244, '2014-05-05');
INSERT INTO `Facebook_log` VALUES (671, 10, 1412, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (672, 14, 2297, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (673, 15, 2544, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (674, 16, 5539, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (675, 17, 1476, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (676, 18, 694, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (677, 19, 2487, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (678, 20, 722, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (679, 21, 1208, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (680, 22, 3139, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (681, 23, 1228, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (682, 24, 262, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (683, 25, 1829, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (684, 28, 3138, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (685, 29, 2693, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (686, 30, 921, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (687, 31, 1887, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (688, 32, 5206, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (689, 33, 2845, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (690, 34, 3054, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (691, 35, 203, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (692, 36, 533, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (693, 37, 701, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (694, 38, 877, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (695, 39, 1687, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (696, 40, 79, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (697, 41, 93, '2014-05-06');
INSERT INTO `Facebook_log` VALUES (698, 42, 71272, '2014-05-06');

-- --------------------------------------------------------

-- 
-- Table structure for table `MailQueue`
-- 

DROP TABLE IF EXISTS `MailQueue`;
CREATE TABLE `MailQueue` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entity` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entityId` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `sentDate` datetime DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `MailQueue`
-- 

INSERT INTO `MailQueue` VALUES ('2116ba93-1110-47bf-b5a5-dea83e7de380', 'Beon\\IntranetBundle\\Entity\\Campaign', 14, NULL, '2014-04-11 21:10:09', NULL, 'campaign_show');
INSERT INTO `MailQueue` VALUES ('26ddfafd-6dff-4375-8e81-c7edb7d1ac58', 'Beon\\IntranetBundle\\Entity\\Pressrelease', 7, NULL, '2014-04-12 22:56:47', NULL, 'pressrelease_show');
INSERT INTO `MailQueue` VALUES ('3c2f444f-0703-48d6-a13b-239d72763291', 'Beon\\IntranetBundle\\Entity\\Pressrelease', 8, 101, '2014-04-12 23:59:49', NULL, 'pressrelease_show');
INSERT INTO `MailQueue` VALUES ('44246237-319a-4519-87fe-c2deef48b24a', 'Beon\\IntranetBundle\\Entity\\Pressrelease', 6, NULL, '2014-04-01 16:19:11', NULL, 'pressrelease_show');
INSERT INTO `MailQueue` VALUES ('5510037a-fcc4-4bb8-917e-23e84e08e57e', 'Beon\\IntranetBundle\\Entity\\Pressrelease', 4, NULL, '2014-04-12 11:55:33', NULL, 'pressrelease_show');
INSERT INTO `MailQueue` VALUES ('65b13a92-725a-47c6-8476-692d7d41644f', 'Beon\\IntranetBundle\\Entity\\Campaign', 14, 1, '2014-04-11 21:23:20', NULL, 'campaign_show');
INSERT INTO `MailQueue` VALUES ('9b910178-5a15-464e-b0d6-ab70cd846d6a', 'Beon\\IntranetBundle\\Entity\\Pressrelease', 10, NULL, '2014-04-14 08:18:07', NULL, 'pressrelease_show');

-- --------------------------------------------------------

-- 
-- Table structure for table `Note`
-- 

DROP TABLE IF EXISTS `Note`;
CREATE TABLE `Note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci,
  `createdAt` datetime DEFAULT NULL,
  `pressrelease_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6F8F552A9395C3F3` (`customer_id`),
  KEY `IDX_6F8F552AAFE6BA13` (`pressrelease_id`),
  KEY `IDX_6F8F552AF639F774` (`campaign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `Note`
-- 

INSERT INTO `Note` VALUES (8, 20, 'Cinema-Kino - Film-Werbung anfragen\r\nWeihnachtsbaum mit Wünschen von Kinder, Termin September\r\nnächster Termin: Independece Day (04.07.14)', '2014-04-13 12:42:58', NULL, NULL);
INSERT INTO `Note` VALUES (9, 17, '10 Jahre Besitos im Herbst', '2014-04-13 13:30:28', NULL, NULL);
INSERT INTO `Note` VALUES (10, 17, 'Display Gambas für September 2014', '2014-04-13 14:46:46', NULL, NULL);
INSERT INTO `Note` VALUES (11, 24, 'Erhält je 1.000 Sekunden bon Besitos Mainz und Aposto Mainz von Rockland', '2014-04-13 14:48:28', NULL, NULL);
INSERT INTO `Note` VALUES (13, 20, 'Karfreitag - kein Brunch\r\nOstermontag Brunch (durchgehend von 10 bis 16 Uhr - 18,50 Euro)\r\nim Anschluss nur noch Sonntags Brunch, kein Feiertag mehr (Homepage muss nach Ostermontag upgedatet werden)', '2014-04-13 16:06:57', NULL, NULL);
INSERT INTO `Note` VALUES (14, 20, 'WM - alle Spiele im Big Easy - keine Werbesachen werden gemacht', '2014-04-13 16:09:03', NULL, NULL);
INSERT INTO `Note` VALUES (15, 20, 'Sommerfest am Pfingstmontag, 06. Juni 2014 ab 12 Uhr\r\n- Grill\r\n- Bierbänke, -tische,\r\n- Kinderschminken, Dosenwerfen\r\n- Bier aus dem Holzfass, Preis?\r\n- Cocktails zum Special-Preis\r\n- PM erstellen\r\n- Flyer (Rückseite Aktionen)', '2014-04-13 16:10:48', NULL, NULL);
INSERT INTO `Note` VALUES (16, 20, 'Donnerstag:\r\nKein Jazz mehr, sondern Live-Musik. Sommerpause im Juni, Juli, August', '2014-04-13 16:28:31', NULL, NULL);
INSERT INTO `Note` VALUES (17, 20, 'mysterial table - Infos kommen von Daniel G', '2014-04-13 17:06:55', NULL, NULL);
INSERT INTO `Note` VALUES (18, 21, 'Raucher-Lounge. Zur Info: Die Lounge wird an Nicht-Öffnungstagen als Raucherlounge genutzt.', '2014-04-13 17:14:06', NULL, NULL);
INSERT INTO `Note` VALUES (19, 25, 'Enchilada Sommerfest\r\nPfingstsonntag, ab 15 Uhr\r\nAußenbar mit Sommer-Caipis für 3,90 Euro\r\nHüpfburg für Kinder, Kinderschminken, Pool, Luftballons\r\nKontakt zu Grill mailen wegen Abholung (Adresse, Datum, Uhrzeit)\r\nGrill: Steaks. Spareribs, Bratwurst, Beilagen\r\n\r\nFlyer: A6 - 5.000\r\nPlakate: A3 - 100\r\nPM\r\nAnzeige: Showtime Mai, Frizz im Juni\r\n\r\nFrizz-Mai-Cocktail-Casino erl\r\n\r\nMagarita of the week \r\nIdeen zu Voting machen\r\n\r\nSteckbrief Mitarbeiter\r\n- Foto von Mitarbeiter kommen von Markus\r\n\r\nEnchi-Hour Flyer - 5000 STück, DINlang\r\nnachfassen\r\n\r\nPyramamiden - nachfassen\r\n\r\n\r\nHüpfburg - Markus\r\nPool - Melli\r\nPressetext Simone\r\n\r\nParkhaus (Werbung, Parktickets, ... ) Markus\r\nWKZ für Sommerfest (Brauerei, Alk, ... ) Markus', '2014-04-14 11:28:30', NULL, NULL);
INSERT INTO `Note` VALUES (20, 29, 'Magarita of the week\r\n1000 Aufsteller - Magarita\r\nBei Jule in Auftrag gegeben, 140414\r\n\r\n5.000 Cocktail Casino 2. Chance\r\nBei Jule in Auftrag gegeben, 140414\r\n\r\nnächster Termin:\r\nWürfel statt Bon´s\r\nBio Brotbox Mannheim\r\nTequila - eventuell im Herbst', '2014-04-14 16:21:16', NULL, NULL);
INSERT INTO `Note` VALUES (21, 29, '15 Jahre Enchilada Mannheim\r\nReinfeiern von 14 auf 15.03.2015\r\nim Vorfeld 15 Tage - 15 Euro\r\n23.02. bis 12.03.14\r\nkleiner VIP-Empfang\r\nerst Live-Musik dann DJ ab 23 Uhr\r\nMaskottchen\r\nGetränkespecials\r\nGeburtstagskuchen um Mitternacht\r\n\r\nInnenstadt: Promo mit Gutscheinen für den Abend', '2014-04-14 16:29:58', NULL, NULL);
INSERT INTO `Note` VALUES (22, 29, 'Mitbewerber-Beobachtung\r\n\r\nhttps://www.facebook.com/barriosmannheim?fref=ts\r\n\r\nhttps://www.facebook.com/pages/Palms-Pacific-Lounge-Mannheim/116378095088410?fref=ts', '2014-04-14 19:16:04', NULL, NULL);
INSERT INTO `Note` VALUES (23, 33, 'Hochzeitsmesse\r\nEintritt frei\r\nStandteilnehmer: 100 Euro Miete für die Standfläche\r\nKonzept erarbeiten (wer teilnimmt etc.)\r\nOktober 2014', '2014-04-15 10:03:18', NULL, NULL);
INSERT INTO `Note` VALUES (24, 10, 'Culinario\r\nMarkt\r\nMainpost\r\nPost e. V.\r\nElferatmagazin\r\nMüller Verlag\r\nTonight\r\nWürzburg spezial\r\nFunkhaus\r\nTop Magazin\r\nFrizz\r\nTV Touring\r\nLohnenwert Magazin', '2014-04-19 16:27:33', NULL, NULL);
INSERT INTO `Note` VALUES (25, 22, 'Wie kommen wir an die Reisebüros??\r\nIn ein paar kann ich gehen.\r\nHast du ein Kontakt zu den großen oder ist es hier besser in die Reisebüros persönlich rein zu gehen??', '2014-04-20 13:15:54', NULL, NULL);
INSERT INTO `Note` VALUES (26, 22, 'laufende Kooperationen:\r\nNASPA', '2014-04-20 14:09:22', NULL, NULL);
INSERT INTO `Note` VALUES (27, 19, 'Veroeffentlichungen:\r\nVeranstaltungen sind ab sofort unter folgenden Links einsehbar: http://prinz.de/stuttgart/events/411553-muttertag/2014-05-11, http://prinz.de/stuttgart/events/411554-vatertag/2014-05-29', '2014-04-27 14:28:05', NULL, NULL);
INSERT INTO `Note` VALUES (28, 22, 'Magaritas of the Week\r\n05.05.2014	Pineapple-Cocos-Margarita\r\n12.05.2014	Strawberry-Chili-Margarita\r\n19.05.2014	Pear-Cinnamon-Margarita\r\n26.05.2014	Raspberry-Margarita\r\n02.06.2014	Blueberry-Vanilla-Margarita\r\n09.06.2014	Tropical-Margarita\r\n16.06.2014	Banana-Apple-Margarita\r\n23.06.2014	Deep-Blue-Sea-Margarita\r\n30.06.2014	Strawberry-Banana-Margarita\r\n07.07.2014	Melon-Margarita', '2014-04-28 04:57:47', NULL, NULL);
INSERT INTO `Note` VALUES (29, 20, 'Ab 28. April neuer Burger-Monday. Burger zum Aktionpreis!', '2014-04-29 14:14:40', NULL, NULL);
INSERT INTO `Note` VALUES (30, 30, 'Veröffentlichung MAZ-Verlag\r\n\r\nHallo Herr Sieber,\r\nanbei das PDF unserer Enchilada-Sonderseite. \r\n\r\nBeste Grüße\r\nMarkus Becker\r\nRedakteur\r\n\r\nMAZ Verlag GmbH	\r\nAm Urnenfeld 12	\r\n35396 Gießen	\r\nTel: 	+49 (641) 9504 3491	\r\nE-Mail: 	mbecker@maz-verlag.de\r\n\r\nInternet: 	www.maz-verlag.de', '2014-04-29 21:09:59', NULL, NULL);
INSERT INTO `Note` VALUES (31, 33, 'Kooperatonen:\r\nKundenkarte “Die Blaue”, seit April 2013\r\nB&B Hotel\r\nhttp://multiforum3000.com/\r\nLimosine', '2014-04-30 19:22:32', NULL, NULL);
INSERT INTO `Note` VALUES (32, 33, 'Mitte Oktober 2014 Relaunche\r\n- neue Karte, moderne Interpretation\r\n- neues CI\r\n- neue Personalkleidung\r\n- Presse/VIP-Empfang', '2014-04-30 19:44:10', NULL, NULL);
INSERT INTO `Note` VALUES (33, 16, 'Kinder-Infostand am Kinderfest im Stadtpark am 20.07.14\r\nkümmert sich Lisa drum\r\n\r\nhttp://www.kinderfestival-mainz.de/', '2014-05-03 10:00:50', NULL, NULL);
INSERT INTO `Note` VALUES (34, 16, '03.05.14\r\n\r\nRücklauf Mittagstischmailing - Anzahl\r\nJohannesfest - Planung via Mirko\r\nAsta-Sommerfest - Planung via Mirko', '2014-05-03 10:01:59', NULL, NULL);
INSERT INTO `Note` VALUES (35, 16, 'Red Bull-Kooperaton mit DJ´s am Platz - läuft bei Mirko, für Jahr 2015', '2014-05-03 12:42:55', NULL, NULL);
INSERT INTO `Note` VALUES (36, 24, 'Campusverteilung - 100 Euro', '2014-05-03 13:22:33', NULL, NULL);
INSERT INTO `Note` VALUES (37, 24, 'Termin: 03. Mai 2014\r\n\r\n15.05.14 Family & Friends\r\nHasen am 16. oder 19.05.2014\r\n\r\nRadio-Spots mit Anhängen produzieren, max. 300 Euro\r\n\r\nVersand PM zum Zeitpunkt ab der Eröffung\r\n\r\nCocktail-Gutschein - gültig am/bis machen lassen\r\n\r\nNach der Sommer-GF (Anfang Juni) Presseevent', '2014-05-03 16:43:43', NULL, NULL);
INSERT INTO `Note` VALUES (38, 16, 'Großer Familientag zur Meereschätze\r\nPool, Hüpfburg, Luftballons\r\n\r\nStörer auf Flyer und Plakate', '2014-05-03 17:42:28', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `PressRelease`
-- 

DROP TABLE IF EXISTS `PressRelease`;
CREATE TABLE `PressRelease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `approvalMailSent` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_by_id` int(11) DEFAULT NULL,
  `approvedAt` datetime DEFAULT NULL,
  `submitted` tinyint(1) NOT NULL,
  `approvalMailSentAt` datetime DEFAULT NULL,
  `submittedAt` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F14934F99395C3F3` (`customer_id`),
  KEY `IDX_F14934F92D234F6A` (`approved_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

-- 
-- Dumping data for table `PressRelease`
-- 

INSERT INTO `PressRelease` VALUES (9, 16, NULL, 0, 0, '2014-04-13 14:52:58', 'Osterbrunch auf Stadtleben', NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `PressRelease` VALUES (10, 10, NULL, 1, NULL, '2014-05-02 13:26:44', 'PM Fasching', NULL, NULL, 1, NULL, '2014-05-02 13:26:45', NULL);
INSERT INTO `PressRelease` VALUES (11, 10, NULL, 1, NULL, '2014-05-02 13:27:25', 'PM Letztes Kranen-Frühstück', NULL, NULL, 1, NULL, '2014-05-02 13:27:25', NULL);
INSERT INTO `PressRelease` VALUES (12, 10, NULL, 1, NULL, '2014-05-02 13:28:18', 'PM Ostern', NULL, NULL, 1, NULL, '2014-05-02 13:28:18', NULL);
INSERT INTO `PressRelease` VALUES (13, 10, NULL, 1, NULL, '2014-05-02 13:28:45', 'PM Valentinstag', NULL, NULL, 1, NULL, '2014-05-02 13:28:45', NULL);
INSERT INTO `PressRelease` VALUES (14, 14, NULL, 1, NULL, '2014-05-02 13:30:37', 'PM Ostern', NULL, NULL, 1, NULL, '2014-05-02 13:30:37', NULL);
INSERT INTO `PressRelease` VALUES (15, 14, NULL, 1, NULL, '2014-05-02 13:31:04', 'PM Pastawochen', NULL, NULL, 1, NULL, '2014-05-02 13:31:04', NULL);
INSERT INTO `PressRelease` VALUES (16, 14, NULL, 1, NULL, '2014-05-02 13:32:13', 'PM Mutter-, Vatertag', NULL, NULL, 1, NULL, '2014-05-02 13:32:13', NULL);
INSERT INTO `PressRelease` VALUES (17, 14, NULL, 0, NULL, '2014-05-02 13:33:11', 'PM Italiener in NY', NULL, NULL, 1, NULL, '2014-05-02 13:33:11', NULL);
INSERT INTO `PressRelease` VALUES (18, 16, NULL, 1, NULL, '2014-05-02 13:33:47', 'PM Italiener in NY', NULL, NULL, 1, NULL, '2014-05-02 13:33:47', NULL);
INSERT INTO `PressRelease` VALUES (19, 16, NULL, 1, NULL, '2014-05-02 13:34:16', 'PM Pastawochen', NULL, NULL, 1, NULL, '2014-05-02 13:34:16', NULL);
INSERT INTO `PressRelease` VALUES (20, 16, NULL, 1, NULL, '2014-05-02 13:35:05', 'PM Fasenacht', NULL, NULL, 1, NULL, '2014-05-02 13:35:05', NULL);
INSERT INTO `PressRelease` VALUES (21, 16, NULL, 1, NULL, '2014-05-02 13:35:37', 'PM Mamma Mia', NULL, NULL, 1, NULL, '2014-05-02 13:35:37', NULL);
INSERT INTO `PressRelease` VALUES (22, 16, NULL, 1, NULL, '2014-05-02 13:36:18', 'PM Osterbrunch', NULL, NULL, 1, NULL, '2014-05-02 13:36:19', NULL);
INSERT INTO `PressRelease` VALUES (23, 15, NULL, 1, NULL, '2014-05-02 13:38:18', 'PM Italiener in NY', NULL, NULL, 1, NULL, '2014-05-02 13:38:18', NULL);
INSERT INTO `PressRelease` VALUES (24, 15, NULL, 1, NULL, '2014-05-02 13:41:08', 'PM Pastawochen', NULL, NULL, 1, NULL, '2014-05-02 13:41:08', NULL);
INSERT INTO `PressRelease` VALUES (25, 15, NULL, 1, NULL, '2014-05-02 13:41:41', 'PM Valentinstag', NULL, NULL, 1, NULL, '2014-05-02 13:41:41', NULL);
INSERT INTO `PressRelease` VALUES (26, 17, NULL, 1, NULL, '2014-05-02 13:44:15', 'PM Grillwochen', NULL, NULL, 1, NULL, '2014-05-02 13:44:15', NULL);
INSERT INTO `PressRelease` VALUES (27, 19, NULL, 1, NULL, '2014-05-02 13:55:58', 'PM Grillwochen', NULL, NULL, 1, NULL, '2014-05-02 13:55:58', NULL);
INSERT INTO `PressRelease` VALUES (28, 19, NULL, 1, NULL, '2014-05-02 13:56:43', 'PM Karneval', NULL, NULL, 1, NULL, '2014-05-02 13:56:43', NULL);
INSERT INTO `PressRelease` VALUES (29, 19, NULL, 1, NULL, '2014-05-02 13:57:14', 'PM Brunch', NULL, NULL, 1, NULL, '2014-05-02 13:57:14', NULL);
INSERT INTO `PressRelease` VALUES (30, 19, NULL, 1, NULL, '2014-05-02 13:57:41', 'PM Mutter-, Vatertag', NULL, NULL, 1, NULL, '2014-05-02 13:57:41', NULL);
INSERT INTO `PressRelease` VALUES (31, 24, NULL, 1, NULL, '2014-05-02 17:56:16', 'PM Mitarbeitersuche', NULL, NULL, 1, NULL, '2014-05-02 17:56:16', NULL);
INSERT INTO `PressRelease` VALUES (32, 24, NULL, 1, NULL, '2014-05-02 18:02:52', 'PM Eröffnung', NULL, NULL, 1, NULL, '2014-05-02 18:02:53', NULL);
INSERT INTO `PressRelease` VALUES (33, 20, NULL, 1, NULL, '2014-05-02 18:09:00', 'PM Burger', NULL, NULL, 1, NULL, '2014-05-02 18:09:00', NULL);
INSERT INTO `PressRelease` VALUES (34, 20, NULL, 1, NULL, '2014-05-02 18:12:10', 'PM Mutter-, Vatertag', NULL, NULL, 1, NULL, '2014-05-02 18:12:10', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `Supplier`
-- 

DROP TABLE IF EXISTS `Supplier`;
CREATE TABLE `Supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `audienceSize` int(11) DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  `supplierType` int(11) NOT NULL,
  `pagesize` int(11) DEFAULT NULL,
  `typeOther` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_625C0E28FE54D947` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=70 ;

-- 
-- Dumping data for table `Supplier`
-- 

INSERT INTO `Supplier` VALUES (10, 'WOB', 135000, 2, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (12, 'PiMalErQuadrat', 0, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (13, 'European Stars and Stripes', 0, 4, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (14, 'Mainzer Wochenblatt', 135000, 2, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (15, 'Radio Rockland Pfalz GmbH & Co. KG', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (16, 'Mannheimer Morgen', 52590, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (17, 'MORITZ-Verlags-GmbH', NULL, NULL, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (19, 'Stadtleben', NULL, 0, 1, 3, NULL, 1);
INSERT INTO `Supplier` VALUES (20, 'Facebook', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (21, 'Schweinfurter Anzeiger', 88000, 2, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (22, 'Media City Werbung', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (23, 'Der Plan', NULL, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (24, 'campusdirekt', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (25, 'HMV höma Verlags GmbH & Co. KG', NULL, NULL, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (26, 'HMV höma Verlags GmbH & Co. KG', NULL, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (27, 'STIEBEL.CREATION - NACHLESUNGSVERZEICHNIS', 10000, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (28, 'bigFM Saarbrücken', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (29, 'Frizz - Marburg/Gießen', 25000, 4, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (30, 'Mailing', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (31, 'Schwetzinger Zeitung', 15900, 1, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (32, 'Funkhaus Aschaffenburg - Radio Primavera und Radio Galaxy', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (33, 'Frizz - Aschaffenburg', 18000, 4, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (34, 'Showtime Magazin GbR', NULL, 4, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (35, 'Stadtleben - Aschaffenburg', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (36, 'BremenVier', 77000, NULL, 2, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (37, 'Prima Sonntag Aschaffenburg', 148000, 2, 3, 0, NULL, 2);
INSERT INTO `Supplier` VALUES (38, 'Marbuch Verlag GmbH - Magazin Express Marburg', 12053, 2, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (39, 'Kapriole - WTFG?! Semesterheft', 8000, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (40, 'Sportvereinigung 07 Ludwigsburg e.V.', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (41, 'Rhein-Neckar Löwen  Supporterclub – Team', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (42, 'TV Touring', NULL, NULL, 4, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (43, 'Gudd Gess', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (44, 'Bio Brotbox Mannheim', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (45, 'Ludwigsburger Wochenblatt', 93200, 2, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (46, 'DIE NEUE 107.7', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (47, 'Hochzeitsmesse TRAUMHOCHZEIT Würzburg', NULL, 0, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (48, 'beon-communications', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (50, 'XITY MEDIA', NULL, NULL, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (51, 'Culinaria Würzburg', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (52, 'tonight!-Verlag', NULL, 3, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (53, 'TrauDich! Messe GmbH', NULL, 0, 5, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (54, 'Mannheim Studieren - Wegweiser 2015', 8000, 5, 3, 31080, NULL, NULL);
INSERT INTO `Supplier` VALUES (55, 'Frizz Würzburg', NULL, 4, 3, 0, NULL, 3);
INSERT INTO `Supplier` VALUES (56, 'TischKultur... Essen und Wein', 12500, 6, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (57, 'LIFT - Das Stuttgartmagazin - Sonderheft WM-FIEBER 2014', 30000, 6, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (58, 'City-Guide 2014/2015 Mannheim', 30000, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (59, 'Einkaufsführer 2014 - Stadtmarketing Würzburg', NULL, 5, 3, NULL, NULL, NULL);
INSERT INTO `Supplier` VALUES (60, 'in Muenchen', NULL, 3, 3, 67424, NULL, NULL);
INSERT INTO `Supplier` VALUES (61, 'Szene Magazin Würzburg', 20000, 4, 3, 39600, NULL, NULL);
INSERT INTO `Supplier` VALUES (62, 'BAMBOLINO', NULL, 0, 3, 1, NULL, NULL);
INSERT INTO `Supplier` VALUES (63, 'löschen !!TischKultur... Essen und Wein erleben.', 12500, 5, 3, 1, NULL, NULL);
INSERT INTO `Supplier` VALUES (64, 'Ludwigsburger Parkierungsanlagen GmbH', NULL, 0, 5, 0, NULL, NULL);
INSERT INTO `Supplier` VALUES (65, 'Antenne Mainz', NULL, 0, 2, 0, NULL, NULL);
INSERT INTO `Supplier` VALUES (66, 'Campus Würzburg - Mainpost', NULL, 6, 3, 0, NULL, NULL);
INSERT INTO `Supplier` VALUES (67, 'WM-Guide by Frizz Würzurg', NULL, 0, 3, 0, NULL, 3);
INSERT INTO `Supplier` VALUES (68, 'Stars and Stripes', NULL, 4, 3, 0, NULL, NULL);
INSERT INTO `Supplier` VALUES (69, 'Höchste Zeit, Hochzeitsmagazin', 15000, 5, 3, 44100, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `SupplierContact`
-- 

DROP TABLE IF EXISTS `SupplierContact`;
CREATE TABLE `SupplierContact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `firsName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_294BD46D2ADD6D8C` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `SupplierContact`
-- 

INSERT INTO `SupplierContact` VALUES (5, 10, 'Gisela', 'Schubert', '0931', '017', 'info@info.de', NULL);
INSERT INTO `SupplierContact` VALUES (7, 13, 'Sean P.', 'Adams', NULL, '(0)172-6668135', 'adams.sean@stripes.com', NULL);
INSERT INTO `SupplierContact` VALUES (8, 15, 'Sara', 'Laier', NULL, NULL, 'laier@rockland.de', NULL);
INSERT INTO `SupplierContact` VALUES (9, 16, 'Roland', 'Scharschmidt', NULL, 'rscharschmidt@mamo.de', NULL, NULL);
INSERT INTO `SupplierContact` VALUES (10, 19, 'Andreas', 'Schmidt', NULL, NULL, 'andreas.schmidt@stadtleben.de', NULL);
INSERT INTO `SupplierContact` VALUES (11, 21, 'Jeanette', 'Fleischmann', NULL, NULL, 'verkaufsleitung1@sw-anzeiger.de', NULL);
INSERT INTO `SupplierContact` VALUES (12, 31, 'Heike', 'Sonn', NULL, NULL, 'heike.sonn@schwetzinger-zeitung.de', NULL);
INSERT INTO `SupplierContact` VALUES (13, 36, 'Thomas', 'Werner', NULL, NULL, 'werner@ndrb.de', NULL);
INSERT INTO `SupplierContact` VALUES (14, 37, 'Rudi', 'Schwind', NULL, NULL, 'rudi.schwind@primanet.de', NULL);
INSERT INTO `SupplierContact` VALUES (15, 38, 'N.', 'Brinkmöller', NULL, NULL, 'feedback@marbuch-verlag.de', NULL);
INSERT INTO `SupplierContact` VALUES (16, 40, 'Angelina', 'Hoeppner', NULL, NULL, 'ah@think-pink.cc', NULL);
INSERT INTO `SupplierContact` VALUES (17, 41, 'Sinisa', 'Kek', NULL, NULL, 'Sinisa.Kek@rhein-neckar-loewen.supporterclub.org', NULL);
INSERT INTO `SupplierContact` VALUES (18, 45, 'Volker Hildner', 'Hildner', NULL, NULL, 'Volker.Hildner@luwo.de', NULL);
INSERT INTO `SupplierContact` VALUES (19, 46, 'Ralph', 'Schmid', NULL, NULL, 'r.schmid@dieneue1077.de', 'Verkaufsleiter Region Ludwigsburg');
INSERT INTO `SupplierContact` VALUES (20, 54, 'Hanspeter', 'Böhmer', NULL, NULL, 'info@derplan-online.de', NULL);
INSERT INTO `SupplierContact` VALUES (21, 60, 'Renate', 'Kieninger', NULL, NULL, 'renate.kieninger@in-muenchen.de', NULL);
INSERT INTO `SupplierContact` VALUES (22, 56, 'Susanna', 'Khoury', NULL, NULL, 'kvv@kunstvoll-verlag.de', NULL);
INSERT INTO `SupplierContact` VALUES (23, 65, 'CHALINE', 'LÖRLER', NULL, NULL, 'c.loerler@antenne-mainz.de', NULL);
INSERT INTO `SupplierContact` VALUES (24, 66, 'Anja', 'Dörr', NULL, NULL, 'anja.doerr-junginger@mainpost.de', NULL);
INSERT INTO `SupplierContact` VALUES (25, 68, 'Sean', 'Adams', NULL, NULL, 'adams.sean@stripes.com', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `SupplierGroup`
-- 

DROP TABLE IF EXISTS `SupplierGroup`;
CREATE TABLE `SupplierGroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `SupplierGroup`
-- 

INSERT INTO `SupplierGroup` VALUES (1, 'Stadtleben-Group');
INSERT INTO `SupplierGroup` VALUES (2, 'Funkhaus Aschaffenburg');
INSERT INTO `SupplierGroup` VALUES (3, 'Frizz Würzburg');

-- --------------------------------------------------------

-- 
-- Table structure for table `Task`
-- 

DROP TABLE IF EXISTS `Task`;
CREATE TABLE `Task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `dueDate` date NOT NULL,
  `status` smallint(6) NOT NULL,
  `affiliationType_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F24C741BA76ED395` (`user_id`),
  KEY `IDX_F24C741B9395C3F3` (`customer_id`),
  KEY `IDX_F24C741BCB599186` (`affiliationType_id`),
  KEY `IDX_F24C741BF639F774` (`campaign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

-- 
-- Dumping data for table `Task`
-- 

INSERT INTO `Task` VALUES (1, 8, 23, NULL, 'Biergarten-Eröffnung anlegen in Facebook und Internetseite', '2014-04-20', 703, 17);
INSERT INTO `Task` VALUES (4, 11, NULL, NULL, 'Test-Einzelkonzept', '2014-05-01', 701, 17);
INSERT INTO `Task` VALUES (6, 11, NULL, 98, 'test anhang campaign', '2014-05-03', 701, NULL);
INSERT INTO `Task` VALUES (7, 8, 14, NULL, 'Besprechen im Termin:\r\nKinderecke XXL', '2014-06-01', 701, NULL);
INSERT INTO `Task` VALUES (8, 11, 37, NULL, 'Fotograph finden:\r\nFotos wären an folgenden Tage gewünscht:\r\n\r\nFreitag, 20. Juni 2014 = Eröffnung\r\nSamstag, 21. Juni 2014 = Fußballparty\r\nDienstag, 24. Juni 2014 = Tim Toupet\r\nFreitag, 27. Juni 2014 = Trixi und die Partylöwen\r\nSamstag, 28. Juni 2014 = Die Partyvögel', '2015-05-15', 702, NULL);
INSERT INTO `Task` VALUES (9, 8, 37, NULL, 'Hallo ...\r\n\r\nbitte alle Pressetexte vorbereiten und freigaben lassen. Ich sende dir den Presseverteiler fuer Schweinfurt morgen zu.\r\n\r\nBitte posting einleiten, Veranstaltungen anlegen.\r\n\r\nDanke!\r\n\r\n\r\nMit freundlichen Grüßen\r\n \r\nMarkus Sieber\r\n \r\nbeon-communications\r\nPostfach 52 44\r\n97002 Würzburg\r\nmarkus.sieber@beon-communications.de\r\n \r\nM 0176/96244951\r\n \r\nVisit us - www.beon-communications.de\r\nLike us - www.facebook.com/beoncommunications\r\n________________________________________\r\nVon: Theresa Pröschel <proeschel@hahnzelt.de>\r\nGesendet: Montag, 28. April 2014 13:26\r\nAn: Markus Sieber | beon-communications\r\nBetreff: Infos Schweinfurt \r\n \r\nHallo Herr Sieber,\r\n \r\nanbei sende ich Ihnen vorab das Programm sowie unseren Flyer zu den WM Spielen.\r\n \r\nFotos wären an folgenden Tage gewünscht:\r\n \r\nFreitag, 20. Juni 2014 = Eröffnung\r\nSamstag, 21. Juni 2014 = Fußballparty\r\nDienstag, 24. Juni 2014 = Tim Toupet\r\nFreitag, 27. Juni 2014 = Trixi und die Partylöwen\r\nSamstag, 28. Juni 2014 = Die Partyvögel\r\n \r\nPressemeldungen wären für folgende Tage wichtig, bitte hier Redaktionsschluss der Medien beachten:\r\n \r\n- Fußballparty - generell hier alle 3 Tage in einer Pressemeldung zusammenfassen\r\n- Donnerstag, 26. Juni 2014 = Haxentag im Hahn-Zelt! Haxe, Bier und Fußball = Super Fantag!!! Was will man mehr? ;-) Die Haxe ist super knusprig und zart gebraten. Sehr reichliche Portion!\r\n- Mittwoch, 25. Juni = Unser Familiennachmittag mit Sonderpreisen und Zaubernesto. Er verteilt kostenlos wunderbare Ballontiere! Er zaubert schnell tolle Tiere und Gegenstände aus Luftballons.\r\n- Tanzparty mit Tanzschule Pelzer!\r\n \r\nKönnen wir dies so eintakten?\r\n \r\nmit herzlichen Grüßen\r\n \r\nTheresa Pröschel\r\nProjektorganisation\r\n \r\nHahn Zelte GmbH\r\nWeinmarkt 9\r\n91438 Bad Windsheim\r\n \r\nTelefon + 49  9841 4017 - 20 l Fax + 49  9841 4017 - 17\r\nWeb: www.hahnzelt.de\r\n \r\n  \r\n  Herz .  Gaudi .  Schmankerl .  Musik\r\n \r\nDer Inhalt dieser Nachricht stammt von der Hahn Zelte GmbH und ist streng vertraulich zu behandeln. Die Informationen sind für den oben genannten Empfänger bestimmt. \r\nSollten Sie nicht der beabsichtigte Empfänger sein und diese Nachricht irrtümlich erhalten haben, löschen Sie diese und auch die damit mitgeführten Dokumente unverzüglich. \r\nEine Benutzung, Vermehrung oder Verbreitung der Inhalte dieser Nachricht ist strengstens verboten.\r\n \r\nSitz der Gesellschaft: Bad Windsheim - Handelsregister Fürth HRB 8862 - Steuernummer: 203/140/40385 - Geschäftsführer: Michael Hahn', '2014-06-01', 701, NULL);
INSERT INTO `Task` VALUES (10, 13, 22, NULL, 'WEB-Flyer Magarita of the Week\r\n\r\n05.05.2014	Pineapple-Cocos-Margarita\r\n12.05.2014	Strawberry-Chili-Margarita\r\n19.05.2014	Pear-Cinnamon-Margarita\r\n26.05.2014	Raspberry-Margarita\r\n02.06.2014	Blueberry-Vanilla-Margarita\r\n09.06.2014	Tropical-Margarita\r\n16.06.2014	Banana-Apple-Margarita\r\n23.06.2014	Deep-Blue-Sea-Margarita\r\n30.06.2014	Strawberry-Banana-Margarita\r\n07.07.2014	Melon-Margarita', '2014-05-04', 701, NULL);
INSERT INTO `Task` VALUES (11, 11, 24, NULL, 'Radiospot The Big Easy Mainz', '2014-05-05', 701, NULL);
INSERT INTO `Task` VALUES (12, 11, 16, NULL, 'Mama Mia-Spot muss produziert werden, 4 x Montags dann auf Rockland\r\n\r\nhttps://soundcloud.com/apostobamberg/', '2014-05-01', 701, NULL);
INSERT INTO `Task` VALUES (13, 11, 33, NULL, 'Hochzeitsmesse im Haus - Konzept', '2014-04-30', 702, NULL);
INSERT INTO `Task` VALUES (14, 13, 22, NULL, 'CC-Fähnchen-Check-IN 5.000 Stück,  beauftragt 10.04.14', '2014-05-01', 701, NULL);
INSERT INTO `Task` VALUES (15, 13, 22, NULL, 'Check-IN-Plakate 10 Stück,  beauftragt 10.04.14', '2014-05-01', 701, NULL);
INSERT INTO `Task` VALUES (16, 11, 22, NULL, 'Banner oben - Abmessungen, warten auf Infos von Erkan', '2014-05-01', 701, NULL);
INSERT INTO `Task` VALUES (17, 11, 22, NULL, 'Tequila-Tischsets - warten auf Feedback von Erkan', '2014-06-01', 701, NULL);
INSERT INTO `Task` VALUES (18, 11, 22, NULL, 'Schwimmbad Opelbad\r\nGerillia-Aktion - Wasserbälle werden verteilt - Termin im Mai bei bestem Wetter\r\nPreise für 500 Stück? (Raf wegen Preise)\r\n\r\nSonnenbrillen rote 500 Stück', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (19, 13, 22, 16, 'Image-Anzeige mit free Chips Stars & Stripes', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (20, 11, 16, NULL, 'WM-Kooperation\r\nRockland\r\nAntenne Mainz', '2014-05-10', 702, NULL);
INSERT INTO `Task` VALUES (21, 8, 16, NULL, 'Weltkinderspartag banken ansprechen', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (22, 11, NULL, 44, 'Anzeige Enchilada Sommerfest', '2014-05-05', 701, NULL);
INSERT INTO `Task` VALUES (23, 11, 25, 44, 'Anzeige Enchilada Sommerfest', '2014-05-05', 701, NULL);
INSERT INTO `Task` VALUES (25, 13, NULL, 102, 'Anzeige Format 1spaltig x 30mm (52 mm breit x 30 mm hoch)', '2014-06-01', 702, NULL);
INSERT INTO `Task` VALUES (26, 13, NULL, 103, 'Anzeige Format 1spaltig x 30mm (52 mm breit x 30 mm hoch)', '2014-06-01', 702, NULL);
INSERT INTO `Task` VALUES (27, 13, NULL, 104, 'Anzeige Format 1spaltig x 30mm (52 mm breit x 30 mm hoch)', '2014-06-01', 702, NULL);
INSERT INTO `Task` VALUES (28, 8, NULL, NULL, 'Einpflege EMAT \r\n\r\nMonday	test\r\nTuesday	\r\nWednesday	\r\nThursday	\r\nFriday	\r\nSaturday	\r\nSunday	\r\nHoliday	\r\nDaily	\r\nIrregular	\r\nPosting info', '2014-05-07', 701, NULL);
INSERT INTO `Task` VALUES (29, 8, 25, NULL, 'Pressetexte erstellen\r\n\r\nEnchilada Sommerfest Aschaffenburg\r\nPfingstsonntag, ab 15 Uhr\r\nAußenbar mit Sommer-Caipis für 3,90 Euro\r\nHüpfburg für Kinder, Kinderschminken, Pool, Luftballons\r\nKontakt zu Grill mailen wegen Abholung (Adresse, Datum, Uhrzeit)\r\nGrill: Steaks. Spareribs, Bratwurst, Beilagen', '2014-05-07', 701, NULL);
INSERT INTO `Task` VALUES (30, 11, 25, NULL, 'ZDF-Bild finden', '2014-05-08', 701, NULL);
INSERT INTO `Task` VALUES (31, 11, NULL, 40, 'Radio-Werbung auf 2 Jahre strecken', '2014-05-07', 701, NULL);
INSERT INTO `Task` VALUES (32, 11, 25, NULL, 'Facebook-Werbung schalten - 100 Euro', '2014-05-05', 701, NULL);
INSERT INTO `Task` VALUES (33, 13, 25, NULL, 'Cocktail-Casino-Fähnchen, 5.000 Stück', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (34, 11, 25, NULL, 'Luftballonbaum', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (35, 13, 25, NULL, 'Magarita of the Week - Aufsteller', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (36, 8, 24, NULL, 'HAINZ FÜR MAINZ Fragebogen ausfüllen', '2014-05-10', 701, NULL);
INSERT INTO `Task` VALUES (37, 8, NULL, NULL, 'Mustertexte Posting Facebook google-drive ausfüllen', '2014-06-01', 701, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `Upload`
-- 

DROP TABLE IF EXISTS `Upload`;
CREATE TABLE `Upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` int(11) DEFAULT NULL,
  `pressrelease_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `fileName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fsFileName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mimeType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplierGroup_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1011E32926ED0855` (`note_id`),
  KEY `IDX_1011E329AFE6BA13` (`pressrelease_id`),
  KEY `IDX_1011E329F639F774` (`campaign_id`),
  KEY `IDX_1011E3292ADD6D8C` (`supplier_id`),
  KEY `IDX_1011E329F20F2E73` (`supplierGroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

-- 
-- Dumping data for table `Upload`
-- 

INSERT INTO `Upload` VALUES (8, NULL, NULL, 15, 'Rechnung.jpg', 'e49d90cdf597fa2975d9186721c6ec1f342832f1.jpg', 'image/jpeg', 460234, '2014-04-13 13:00:04', NULL, NULL);
INSERT INTO `Upload` VALUES (10, NULL, NULL, NULL, '01-0024.pdf', '6fb453a6b5bad95716b812032fd6ec455de0b2f5.pdf', 'application/pdf', 121847, '2014-04-13 18:48:16', NULL, NULL);
INSERT INTO `Upload` VALUES (11, NULL, NULL, 26, 'MM-HALB-MM-MITTE-s052-1403.pdf', 'bb2f2a11afce9ea15055e8ec9437cb296f903f84.pdf', 'application/pdf', 986103, '2014-04-14 16:39:40', NULL, NULL);
INSERT INTO `Upload` VALUES (12, NULL, NULL, 27, 'Enchilada 1 Mannheim R5 25.02.2014.jpg', '9302679c8a8a83e8194b6bc1166b47ef08f69e8f.jpg', 'image/jpeg', 57016, '2014-04-14 16:52:18', NULL, NULL);
INSERT INTO `Upload` VALUES (13, NULL, NULL, 27, 'Buchung R5 Mannheim LV links.doc', '73c3e10eaf5c0f79e7e077503924ae2d0ebd31c0.doc', 'application/msword', 84480, '2014-04-14 16:52:45', NULL, NULL);
INSERT INTO `Upload` VALUES (14, NULL, NULL, 27, 'Buchung R5 Mannheim LV rechts.doc', '76566d7cc6d1a9e8ddf74e30fcebc787df674992.doc', 'application/msword', 84480, '2014-04-14 16:52:59', NULL, NULL);
INSERT INTO `Upload` VALUES (15, NULL, NULL, 31, 'Angebot SL-20140221 Enchilada Mannheim (2).pdf', 'c0cc2a829db94c4289ddda5ae72a36b3ff463f9f.pdf', 'application/pdf', 92431, '2014-04-14 18:34:40', NULL, NULL);
INSERT INTO `Upload` VALUES (16, NULL, NULL, 32, 'Auftragsbestätgigung_NLV_RATSKELLER.pdf', '0cfa97851207be30553021c5ae077cc85db2e92d.pdf', 'application/pdf', 120109, '2014-04-14 22:05:24', NULL, NULL);
INSERT INTO `Upload` VALUES (17, NULL, NULL, 33, 'Biergarten.pdf', '10e5b5aec01000ddc1215f1140ce3fa5bec241ff.pdf', 'application/pdf', 791294, '2014-04-14 22:13:52', NULL, NULL);
INSERT INTO `Upload` VALUES (18, NULL, NULL, 15, 'Belegbild.jpg', '49443ba4bddebf55a96e0fc104f359571c3a99b9.jpg', 'image/jpeg', 254533, '2014-04-14 22:21:22', NULL, NULL);
INSERT INTO `Upload` VALUES (19, NULL, NULL, 18, 'Werbeauftrag unterschrieben.pdf', 'e16adac43bb2385bb67726043784b04a89e2572e.pdf', 'application/pdf', 266791, '2014-04-15 10:33:59', NULL, NULL);
INSERT INTO `Upload` VALUES (20, NULL, NULL, 18, '2014-04-05-Sendeplan.pdf', 'ab2b8a5d3e5f4fd5cc83bfea3b38a601ddd57008.pdf', 'application/pdf', 10873, '2014-04-15 10:59:11', NULL, NULL);
INSERT INTO `Upload` VALUES (21, NULL, NULL, 19, 'Werbeauftrag unterschrieben.pdf', 'cdf498f9ffd77b86795f1d3b0d6b9da2bff0c069.pdf', 'application/pdf', 266791, '2014-04-15 15:04:42', NULL, NULL);
INSERT INTO `Upload` VALUES (22, NULL, NULL, 19, '2014-04-05-Sendeplan-Besitos.pdf', '3911c3e315b0b7b92ebac667c26e87f8a822660e.pdf', 'application/pdf', 13322, '2014-04-15 15:40:19', NULL, NULL);
INSERT INTO `Upload` VALUES (23, NULL, NULL, 40, 'Angebot Enchilada 2014 - modifiziert.doc', '61ce8a414e3eba12618ac077c0b5ef20afee626c.doc', 'application/msword', 98304, '2014-04-15 16:37:09', NULL, NULL);
INSERT INTO `Upload` VALUES (24, NULL, NULL, 41, 'Angebot Enchilada 2014 - modifiziert.doc', '3fd42dfb9cb753b28c43c6ecae0457f5175f75d4.doc', 'application/msword', 98304, '2014-04-15 16:40:42', NULL, NULL);
INSERT INTO `Upload` VALUES (25, NULL, NULL, 55, 'NDRM-AB-Auftrag-66700-Enchilada_Bremen_GmbH.pdf', 'c587549e180e13def7afd886b8d48993d17fbaa4.pdf', 'application/pdf', 258376, '2014-04-15 20:26:02', NULL, NULL);
INSERT INTO `Upload` VALUES (26, NULL, NULL, 56, 'Verkaufsoffener-Sonntag.pdf', '12c7e3702989680af70e59f0ae87fe6cd48e6364.pdf', 'application/pdf', 377706, '2014-04-15 20:31:08', NULL, NULL);
INSERT INTO `Upload` VALUES (27, NULL, NULL, 58, 'Werbung.pdf', 'c03e46fd9a3e36ea72504dac2b99e529a85fcf2a.pdf', 'application/pdf', 44900, '2014-04-16 21:29:09', NULL, NULL);
INSERT INTO `Upload` VALUES (28, NULL, NULL, 58, 'Anzeigen.pdf', 'd6a84aa5f53568196c0ff57bae2f9f093bc35db3.pdf', 'application/pdf', 34219, '2014-04-16 21:29:20', NULL, NULL);
INSERT INTO `Upload` VALUES (29, NULL, NULL, 60, 'Informationen mit Formular.pdf', '336262cfee1bc56d75fc84c96269c8efeaea107b.pdf', 'application/pdf', 92804, '2014-04-16 21:58:27', NULL, NULL);
INSERT INTO `Upload` VALUES (30, NULL, NULL, 61, 'Powerspecial VIP  2013.doc', '7f6388276d43a6d994d43c317337b2f85897d381.doc', 'application/msword', 137216, '2014-04-16 22:05:30', NULL, NULL);
INSERT INTO `Upload` VALUES (31, NULL, NULL, 17, 'Osterbrunch_AZ_92x60.pdf', 'b0e12a0b177c9c6b888b06b7de8c5f345e9e74f6.pdf', 'application/pdf', 2241753, '2014-04-16 22:59:05', NULL, NULL);
INSERT INTO `Upload` VALUES (32, NULL, NULL, 11, '140417092528_0001.pdf', 'd27be1894e42f561544bd5dcbffe40a4d554344c.pdf', 'application/pdf', 1172853, '2014-04-17 09:39:13', NULL, NULL);
INSERT INTO `Upload` VALUES (33, NULL, NULL, 64, 'Veranstaltung_mailing_hinten_FA_2.jpg', 'd49582003a99edcd4c743545481b9f16ecfcd68c.jpg', 'image/jpeg', 4805543, '2014-04-17 12:33:47', NULL, NULL);
INSERT INTO `Upload` VALUES (34, NULL, NULL, 64, 'Veranstaltung_mailing_vorne_FA_2.jpg', '2448d639c4df83596538fd620903490e4ac20ca9.jpg', 'image/jpeg', 1631464, '2014-04-17 12:35:51', NULL, NULL);
INSERT INTO `Upload` VALUES (35, NULL, NULL, 66, 'Bio-Brotbox_Kurzpräsentation_2013.pdf', 'b8e84b089f25ec786ae9cfd822017210e670871f.pdf', 'application/pdf', 1757375, '2014-04-17 13:07:27', NULL, NULL);
INSERT INTO `Upload` VALUES (36, NULL, NULL, 66, 'Brotbox - morgenweb.pdf', 'f5f12bf7834a7706a9e61b2fb339ed45ae73b6cc.pdf', 'application/pdf', 509454, '2014-04-17 13:20:13', NULL, NULL);
INSERT INTO `Upload` VALUES (37, NULL, NULL, 66, 'Checkpoint 030.jpg', 'e8097b7e66893e7dcded84c973593ba8bb3be8fc.jpg', 'image/jpeg', 2061016, '2014-04-17 13:26:46', NULL, NULL);
INSERT INTO `Upload` VALUES (38, NULL, NULL, 66, 'Pressemitteilung_Bio-Brotbox_Netzwerk_2013.pdf', 'f965876115760ddd4942704a354494fc7d553fb0.pdf', 'application/pdf', 71481, '2014-04-17 13:27:02', NULL, NULL);
INSERT INTO `Upload` VALUES (39, NULL, NULL, 69, 'Radiospotkampagne Biergarten Eröffnung 2014.pdf', '5e83101114ea6d546255ec6332e693ad968c1b85.pdf', 'application/pdf', 677784, '2014-04-18 13:23:13', NULL, NULL);
INSERT INTO `Upload` VALUES (40, NULL, NULL, 71, 'Hochzeitsmesse Würzburg.pdf', 'c7252a637e2ec11f77bf5b1e43c687a561b8b803.pdf', 'application/pdf', 334826, '2014-04-18 18:13:54', NULL, NULL);
INSERT INTO `Upload` VALUES (41, NULL, NULL, 72, 'Angebot_Muttertag_radiobremen.pdf', '1c6e4aecd71de875d4420be3837c61de47c2713c.pdf', 'application/pdf', 95322, '2014-04-19 09:44:38', NULL, NULL);
INSERT INTO `Upload` VALUES (42, NULL, NULL, 42, 'Rechnung.JPG', '997e1a2d4aa711336c6c595c0030dd8ab88d31f4.JPG', 'image/jpeg', 487606, '2014-04-19 09:45:48', NULL, NULL);
INSERT INTO `Upload` VALUES (43, NULL, NULL, 17, '20140416-WB-WB-mzwo.02-Mainz-Hessen 811.pdf', 'f8d0e7e77720b54ef31912b0020912e4e16fd2af.pdf', 'application/pdf', 401626, '2014-04-20 11:04:42', NULL, NULL);
INSERT INTO `Upload` VALUES (44, NULL, NULL, 86, 'Tischkultur_2013-1.pdf', '71f8997f4e077243e8900d4063a2da5401af3f76.pdf', 'application/pdf', 4566062, '2014-04-20 15:08:09', NULL, NULL);
INSERT INTO `Upload` VALUES (45, NULL, NULL, 88, 'Mediadaten_WM-Fieber2014.pdf', '4685515498d39a52a1e870e5d881c236407d959f.pdf', 'application/pdf', 3342082, '2014-04-20 15:26:36', NULL, NULL);
INSERT INTO `Upload` VALUES (46, NULL, NULL, 87, 'Mediadaten_WM-Fieber2014.pdf', 'aefbda49ebc8eb75b74a76dbfb606dd7d05dfaee.pdf', 'application/pdf', 3342082, '2014-04-20 15:27:05', NULL, NULL);
INSERT INTO `Upload` VALUES (47, NULL, NULL, 89, 'Scan-19.03.14-08.12.pdf', 'de2b9b591ffcb0dd0fb6d7ec112ed9e91b870e74.pdf', 'application/pdf', 375208, '2014-04-20 15:32:51', NULL, NULL);
INSERT INTO `Upload` VALUES (48, NULL, NULL, 89, 'Scan-19.03.14-10.27.pdf', '76554db97537e445d09c9b5bc5cd75533e3cebcb.pdf', 'application/pdf', 381380, '2014-04-20 15:33:05', NULL, NULL);
INSERT INTO `Upload` VALUES (49, NULL, NULL, 89, 'Scan-19.03.14-10.28.pdf', '8a90382b6df2edfadb6d4744069ceda523be5038.pdf', 'application/pdf', 515440, '2014-04-20 15:33:17', NULL, NULL);
INSERT INTO `Upload` VALUES (50, NULL, NULL, 89, 'Scan-19.03.14-10.272.pdf', 'dc66013c89c27c5404955573e8c0e8289f3df74b.pdf', 'application/pdf', 836901, '2014-04-20 15:33:30', NULL, NULL);
INSERT INTO `Upload` VALUES (51, NULL, NULL, 93, 'in_muenchen_Mediadaten_2014.pdf', '6dbdb6505794f6c8eb985bc333d40028dd0d3f2d.pdf', 'application/pdf', 951025, '2014-04-24 13:25:42', NULL, NULL);
INSERT INTO `Upload` VALUES (52, NULL, NULL, 93, 'in-münchen_Kalender2014.pdf', 'c4a8da6d5d9cdb0fb29d53eca85b8f50c5b96263.pdf', 'application/pdf', 349970, '2014-04-24 13:26:00', NULL, NULL);
INSERT INTO `Upload` VALUES (53, NULL, NULL, 94, 'Anzeigenauftrag.pdf', '18e69f1c4e44cc21d9fca7e4c4b20ea1838f9cd8.pdf', 'application/pdf', 246032, '2014-04-25 08:00:23', NULL, NULL);
INSERT INTO `Upload` VALUES (54, NULL, NULL, 69, 'SPOT_RatskellerLB_Biergarten_neu.wav', 'f828f14eceb9154491baf667d30817e906efd744.wav', 'audio/x-wav', 3600040, '2014-04-27 14:53:19', NULL, NULL);
INSERT INTO `Upload` VALUES (55, NULL, NULL, 97, 'Scan.pdf', 'd47dddcc8c0e14f3ca20abebaac62c41cdc11b89.pdf', 'application/pdf', 713012, '2014-04-27 15:35:19', NULL, NULL);
INSERT INTO `Upload` VALUES (56, 30, NULL, NULL, 'Enchilada_eroeffnung.pdf', '751fb6440f2d9a091d604730508bda43ba84b1b6.pdf', 'application/pdf', 365470, '2014-04-29 21:10:34', NULL, NULL);
INSERT INTO `Upload` VALUES (57, NULL, NULL, 69, 'Ratskeller LB_AUFTRAGSBESTÄTIGUNG_Apr-Mai.pdf', 'b3baab1a3c2210d375735c01c853885ed12db74f.pdf', 'application/pdf', 193726, '2014-04-30 11:55:09', NULL, NULL);
INSERT INTO `Upload` VALUES (58, NULL, NULL, 92, 'Besitos_78x63.pdf', '4600ad706dfd8ec2f39017d3386e0f7f2a4b5791.pdf', 'application/pdf', 2350968, '2014-04-30 13:56:44', NULL, NULL);
INSERT INTO `Upload` VALUES (59, NULL, NULL, 91, 'Enchilada_78x63.pdf', 'd432bfdbf51d559d4a84bbeba5cf8c784f1ab5f0.pdf', 'application/pdf', 2205619, '2014-04-30 13:58:25', NULL, NULL);
INSERT INTO `Upload` VALUES (60, NULL, NULL, 90, 'AlterKranen_78x63.pdf', '1cc51804c618460e83d1baed8b934fec4cfc9a7c.pdf', 'application/pdf', 2235743, '2014-04-30 14:00:52', NULL, NULL);
INSERT INTO `Upload` VALUES (61, NULL, NULL, NULL, 'Mediadaten-Wegweiser-2015.pdf', '9b6c0edf959fcb27da3beefae388f1d8a2c17beb.pdf', 'application/pdf', 446030, '2014-04-30 19:17:20', NULL, NULL);
INSERT INTO `Upload` VALUES (62, NULL, NULL, NULL, 'Wegweiser 2014.pdf', '23b69847cac62e3d255d12b3035d50f3195d5607.pdf', 'application/pdf', 4317477, '2014-04-30 19:17:56', NULL, NULL);
INSERT INTO `Upload` VALUES (63, NULL, NULL, 82, 'Wegweiser 2014.pdf', '28d214dd7e77bb5354a58af99616ab346f3b7217.pdf', 'application/pdf', 4317477, '2014-04-30 19:31:07', NULL, NULL);
INSERT INTO `Upload` VALUES (64, NULL, 10, NULL, '2014_PM_BGAK_Fasching.doc', '324c533ed95e857faa08d8d6bd84c6ee54f063aa.doc', 'application/msword', 82432, '2014-05-02 13:26:59', NULL, NULL);
INSERT INTO `Upload` VALUES (65, NULL, 11, NULL, '2014_PM_BGAK_Letztes_Kranenfrühstück.doc', 'f5913b35e5941ba244cc9a74c66f23dc0bd0d127.doc', 'application/msword', 80896, '2014-05-02 13:27:34', NULL, NULL);
INSERT INTO `Upload` VALUES (66, NULL, 12, NULL, '2014_PM_BGAK_Ostern.doc', 'f8f2a9a0760ad1ed166c4e41f6730f2d0c1d27b6.doc', 'application/msword', 85504, '2014-05-02 13:28:27', NULL, NULL);
INSERT INTO `Upload` VALUES (67, NULL, 13, NULL, '2014_PM_BGAK_Valentinstag.doc', '7734b848b1f8a7633b5dd6e9ec0c05de1c0fd530.doc', 'application/msword', 81408, '2014-05-02 13:28:54', NULL, NULL);
INSERT INTO `Upload` VALUES (68, NULL, 14, NULL, '2014_PM_Aposto_Bamberg_Ostern.doc', 'aaae9a63ee2a5dcfb3624f31e0d455de5c3b051c.doc', 'application/msword', 102912, '2014-05-02 13:30:50', NULL, NULL);
INSERT INTO `Upload` VALUES (69, NULL, 15, NULL, '2014_PM_Aposto_Bamberg_Pasta.doc', '5348ce771359440e5efcbb68606427a26aa5feba.doc', 'application/msword', 103936, '2014-05-02 13:31:15', NULL, NULL);
INSERT INTO `Upload` VALUES (70, NULL, 16, NULL, 'PM_Aposto_Bamberg_Mutter-Vatertag.doc', '0d598dbec7625a5a58189676736ded29dc75929f.doc', 'application/msword', 102400, '2014-05-02 13:32:28', NULL, NULL);
INSERT INTO `Upload` VALUES (71, NULL, 17, NULL, '2014_PM_Aposto_Bamberg_Italiener_in_NY.doc', '6655cb388527d109d01d2fd7d8abc083dbc6a625.doc', 'application/msword', 103424, '2014-05-02 13:33:19', NULL, NULL);
INSERT INTO `Upload` VALUES (72, NULL, 18, NULL, '2014_PM_Aposto_Mainz_Italiener_in_NY.doc', '9cced2fc50065099ec00a5039e6240f47646a8e5.doc', 'application/msword', 103936, '2014-05-02 13:34:00', NULL, NULL);
INSERT INTO `Upload` VALUES (73, NULL, 19, NULL, '2014_PM_Aposto_Mainz_Pasta.doc', '4d8f83ac33793f5d3a752e720c5dfba5558127ff.doc', 'application/msword', 103936, '2014-05-02 13:34:25', NULL, NULL);
INSERT INTO `Upload` VALUES (74, NULL, 20, NULL, '2014_PM_Aposto_Mainz_Fasenacht.doc', 'b0a768afcf14cbaab9776bfc1d02d5ad20b7a253.doc', 'application/msword', 104960, '2014-05-02 13:35:15', NULL, NULL);
INSERT INTO `Upload` VALUES (75, NULL, 21, NULL, '2014_PM_Aposto_Mainz_Mamma Mia.doc', '8a1702f57df0665de6fca2095051550a3ae1d3be.doc', 'application/msword', 105984, '2014-05-02 13:36:01', NULL, NULL);
INSERT INTO `Upload` VALUES (76, NULL, 22, NULL, '2014_PM_Aposto_Mainz_Osterbrunch.doc', 'fdd080bf8dbc6a5cee3151edeb55609a3f84cd09.doc', 'application/msword', 102400, '2014-05-02 13:37:21', NULL, NULL);
INSERT INTO `Upload` VALUES (77, NULL, 23, NULL, '2014_PM_Aposto_Schweinfurt_Italiener_in_NY.doc', '29b42df10b0eec4b00bbc260ac84987a69fb899b.doc', 'application/msword', 103424, '2014-05-02 13:40:49', NULL, NULL);
INSERT INTO `Upload` VALUES (78, NULL, 24, NULL, '2014_PM_Aposto_Schweinfurt_Pasta.doc', '9f637b0daa4c0ea9a290a7e739526036b9496fce.doc', 'application/msword', 104960, '2014-05-02 13:41:18', NULL, NULL);
INSERT INTO `Upload` VALUES (79, NULL, 25, NULL, '2014_PM_Aposto_Schweinfurt_Valentinstag.doc', 'fbb72e9ce01abe19bdddf6d9dcaafaa470b6cf66.doc', 'application/msword', 104960, '2014-05-02 13:41:51', NULL, NULL);
INSERT INTO `Upload` VALUES (80, NULL, 26, NULL, '2014_PM_Besitos_Grillwochen.doc', '47caec20819396f51c84f6a905cbd622b0c932a7.doc', 'application/msword', 245248, '2014-05-02 13:44:53', NULL, NULL);
INSERT INTO `Upload` VALUES (81, NULL, 27, NULL, '2014_Besitos Stuttgart Grillwochen.doc', '9eccca7f674a0c547262031d3caaefa0fc65f03f.doc', 'application/msword', 235520, '2014-05-02 13:56:23', NULL, NULL);
INSERT INTO `Upload` VALUES (82, NULL, 28, NULL, '2014_Besitos Stuttgart Karneval.doc', 'ccc8a42f4e38b95ab427d60b6b4664b3fcf908d7.doc', 'application/msword', 234496, '2014-05-02 13:56:57', NULL, NULL);
INSERT INTO `Upload` VALUES (83, NULL, 29, NULL, '2014_Besitos Stuttgart Brunch.doc', 'f74a88b7eff1c013b08a853c218a540ce2e19aa7.doc', 'application/msword', 236032, '2014-05-02 13:57:25', NULL, NULL);
INSERT INTO `Upload` VALUES (84, NULL, 30, NULL, '2014_Besitos Stuttgart Mutter-Vatertag.doc', '3050f4677e37612d45b9373d02bfe09127fb7bc6.doc', 'application/msword', 236032, '2014-05-02 13:58:05', NULL, NULL);
INSERT INTO `Upload` VALUES (85, NULL, 31, NULL, '2014_PM_Big_Easy_Mainz_Mitarbeitersuche.doc', '9143e597eba41c71efc1760699dce785d1fdd352.doc', 'application/msword', 1150976, '2014-05-02 17:56:53', NULL, NULL);
INSERT INTO `Upload` VALUES (86, NULL, 32, NULL, 'NEU_2014_PM_Big Easy_Mainz_Eröffnung.doc', 'fd29662d6be7f9af36ae0c76f07193b3ec631c69.doc', 'application/msword', 1144832, '2014-05-02 18:03:24', NULL, NULL);
INSERT INTO `Upload` VALUES (87, NULL, 33, NULL, '2014_PM_Big Easy_Burger.doc', 'a5aa7fc697299c5467fce69c1a5e6640fdda1795.doc', 'application/msword', 1154560, '2014-05-02 18:09:41', NULL, NULL);
INSERT INTO `Upload` VALUES (88, NULL, 34, NULL, '2014_PM_Big_Easy_Vater-Muttertag.doc', 'a4a4516b803c585eef9d2b60e9fa13b9488927ce.doc', 'application/msword', 1155072, '2014-05-02 18:12:40', NULL, NULL);
INSERT INTO `Upload` VALUES (89, NULL, NULL, 69, 'Mitschnitt_Neu DaletHD Stuttgart Neu_30.04.2014_18_35.45_36.53.mp3', 'cc39bed1c6e821b4fcaf8bb227d8a7ebddda1288.mp3', 'audio/mpeg', 1088783, '2014-05-05 20:36:13', NULL, NULL);
INSERT INTO `Upload` VALUES (90, NULL, NULL, NULL, 'Whats_Up_Flyer_Rates_2014_Email.pdf', '569b5572fbfe85c1688170edc3fd02d24ecb6278.pdf', 'application/pdf', 1720417, '2014-05-05 20:42:35', 68, NULL);
INSERT INTO `Upload` VALUES (91, NULL, NULL, NULL, 'Angebotsabgabe für Printanzeigen.docx', '9184af61d33090261b16660a44cc8940a7afad0e.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 56645, '2014-05-05 20:56:30', 69, NULL);
INSERT INTO `Upload` VALUES (92, NULL, NULL, NULL, 'Mediadaten2014.pdf', 'cd945132e03a0b2c6e00d95031f2f91932bc0d9a.pdf', 'application/pdf', 2311925, '2014-05-05 20:56:46', 69, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `User`
-- 

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessLevel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `IDX_2DA179779395C3F3` (`customer_id`),
  KEY `IDX_2DA179771AAA1299` (`accessLevel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `User`
-- 

INSERT INTO `User` VALUES (8, NULL, 'simone', 'Simone', 'simone.ullmer@beon-communications.de', 'pass', 9);
INSERT INTO `User` VALUES (9, NULL, 'all', 'Fabian Salomon', 'beon@salo.mailrange.com', 'pass', 9);
INSERT INTO `User` VALUES (11, NULL, 'markus', 'Markus Sieber', 'info@beon-communications.de', 'pass', 9);
INSERT INTO `User` VALUES (12, 39, 'test', NULL, 'markus.sieber@beon-communications.de', 'pass', 7);
INSERT INTO `User` VALUES (13, NULL, 'Grafik-Abteilung', NULL, 'grafik@test.de', 'pass', 9);

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `BudgetPeriod`
-- 
ALTER TABLE `BudgetPeriod`
  ADD CONSTRAINT `FK_3B0CB96A9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `Campaign`
-- 
ALTER TABLE `Campaign`
  ADD CONSTRAINT `FK_E663708B2ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `Supplier` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E663708B2D234F6A` FOREIGN KEY (`approved_by_id`) REFERENCES `User` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_E663708B713F1C19` FOREIGN KEY (`approvement_sender_id`) REFERENCES `User` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_E663708B9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E663708BE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `SupplierContact` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `Customer`
-- 
ALTER TABLE `Customer`
  ADD CONSTRAINT `FK_784FEC5FCB94D64E` FOREIGN KEY (`affiliation_id`) REFERENCES `Affiliation` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `CustomerFacebookUrl`
-- 
ALTER TABLE `CustomerFacebookUrl`
  ADD CONSTRAINT `FK_F0836DF81CFDAE7` FOREIGN KEY (`url_id`) REFERENCES `FacebookUrl` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_F0836DF9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `FacebookLikecount`
-- 
ALTER TABLE `FacebookLikecount`
  ADD CONSTRAINT `FK_44BA8E9681CFDAE7` FOREIGN KEY (`url_id`) REFERENCES `FacebookUrl` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `Facebook_log`
-- 
ALTER TABLE `Facebook_log`
  ADD CONSTRAINT `FK_29528259395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `Note`
-- 
ALTER TABLE `Note`
  ADD CONSTRAINT `FK_6F8F552A9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6F8F552AAFE6BA13` FOREIGN KEY (`pressrelease_id`) REFERENCES `PressRelease` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_6F8F552AF639F774` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `PressRelease`
-- 
ALTER TABLE `PressRelease`
  ADD CONSTRAINT `FK_F14934F92D234F6A` FOREIGN KEY (`approved_by_id`) REFERENCES `User` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_F14934F99395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE CASCADE;

-- 
-- Constraints for table `Supplier`
-- 
ALTER TABLE `Supplier`
  ADD CONSTRAINT `FK_625C0E28FE54D947` FOREIGN KEY (`group_id`) REFERENCES `SupplierGroup` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `SupplierContact`
-- 
ALTER TABLE `SupplierContact`
  ADD CONSTRAINT `FK_294BD46D2ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `Supplier` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `Task`
-- 
ALTER TABLE `Task`
  ADD CONSTRAINT `FK_F24C741B9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_F24C741BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F24C741BCB599186` FOREIGN KEY (`affiliationType_id`) REFERENCES `Affiliation` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_F24C741BF639F774` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `Upload`
-- 
ALTER TABLE `Upload`
  ADD CONSTRAINT `FK_1011E32926ED0855` FOREIGN KEY (`note_id`) REFERENCES `Note` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_1011E3292ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `Supplier` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_1011E329AFE6BA13` FOREIGN KEY (`pressrelease_id`) REFERENCES `PressRelease` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_1011E329F20F2E73` FOREIGN KEY (`supplierGroup_id`) REFERENCES `SupplierGroup` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_1011E329F639F774` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign` (`id`) ON DELETE SET NULL;

-- 
-- Constraints for table `User`
-- 
ALTER TABLE `User`
  ADD CONSTRAINT `FK_2DA179771AAA1299` FOREIGN KEY (`accessLevel_id`) REFERENCES `AccessLevel` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_2DA179779395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE SET NULL;

SET FOREIGN_KEY_CHECKS=1;
