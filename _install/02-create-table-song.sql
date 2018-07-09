CREATE TABLE `mini`.`song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` text COLLATE utf8_unicode_ci NOT NULL,
  `track` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table detailSportTeam 
(
  idDetailSportTeam int not null PRIMARY KEY,
  idSport INT,
  idTeam INT,
  description varchar(45),
  CONSTRAINT fk_mySport FOREIGN KEY(idSport) REFERENCES sport(idSport),
  CONSTRAINT fk_myTeam FOREIGN KEY(idTeam) REFERENCES team(idTeam)
)
