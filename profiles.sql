CREATE DATABASE `glastonburyprofiles` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `glastonburyprofiles`;

CREATE TABLE IF NOT EXISTS `profiles` (
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nicknames` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) VALUES('Fred Clark','Clarkster, Gay ginge','Seasoned pro - competing with Jesse Peacock for the title, he knows the ropes and will be keen to get Joni onto his air mattress again.','img/fred.jpg');
INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) VALUES('Naomi Gaynor','Scouse, Noomi, Gaysha','Has been known to laugh for a full 24hrs in the past, Naomi will be leading the pack of novices to the Rabbit Hole as early as Tuesday night.','img/naomi.jpg');
INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) VALUES('Jesse Peacock','Jay-Pea, Drew','The grandaddy of the circuit, Jesse knows the ins and outs of Glastonbury, just look into those eyes. Makes a mean cocktail too, many a story has been told of his 10 a.m. bloody marys.','img/jesse.jpg');
INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) VALUES('Lauren Marshall','Loz','Often mistaken with Blondie, Lauren will be donning her fancy dress box to make sure there is even less of a distinction. Another spectacular laugh.','img/lauren.jpg');
INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) VALUES('Joni Bayfield','JayBay, The Bombathon, Bayf','He knows how to entertain a whole crowd, so Glastonury eagerly awaits his debut. There may even be a reincarnation of the Joni-Bayfield Tour.','img/joni.jpg');
INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) VALUES('Frank Sloan','Slug, Just Frank','Frank is known to get particularly overexcited at events of this calibre, which can often work in his and the group\'s favour, especially if the moons are aligned.','img/frank.jpg');