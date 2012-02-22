drop table if exists CLASSEMENT;
drop table if exists ESTSPECIALISTE;
drop table if exists COMPETITION;
drop table if exists ATHLETE;
drop table if exists CLUB;
drop table if exists VILLE;
drop table if exists DISCIPLINE;

create table DISCIPLINE (
	noDiscipline int not null auto_increment,
	libelleDiscipline varchar(30),
	primary key(noDiscipline)
)type=InnoDB;
create table VILLE (
	noVille int not null auto_increment,
	nomVille varchar(30),
	primary key(noVille)
)type=InnoDB;
create table CLUB (
	noClub int not null auto_increment,
	nomClub varchar(30),
	noVille int,
	primary key(noClub),
	constraint fkClub foreign key(noVille) references VILLE(noVille) on delete cascade
)type=InnoDB;
create table ATHLETE (
	noAthlete int not null auto_increment,
	nomAthlete varchar(20),
	noClub int,
	primary key(noAthlete),
	constraint fkAthlete foreign key(noClub) references CLUB(noClub) on delete cascade
)type=InnoDB;
create table COMPETITION(
	noCompet int not null auto_increment,
	nomCompet varchar(30),
	dateCompet date,
	noClub int,
	primary key(noCompet),
	constraint fkCompet foreign key(noClub) references CLUB(noClub) on delete cascade
)type=InnoDB;
create table ESTSPECIALISTE(
	noAthlete int,
	noDiscipline int,
	primary key(noAthlete, noDiscipline),
	constraint fkEstSpecialiste0 foreign key(noAthlete) references ATHLETE(noAthlete) on delete cascade,
	constraint fkEstSpecialiste1 foreign key(noDiscipline) references DISCIPLINE(noDiscipline) on delete cascade
)type=InnoDB;
create table CLASSEMENT(
	noAthlete int,
	noCompet int,
	noDiscipline int,
	classement int,
	primary key(noAthlete, noCompet, noDiscipline),
	constraint fkClass0 foreign key(noAthlete) references ATHLETE(noAthlete) on delete cascade,
	constraint fkClass1 foreign key(noCompet) references COMPETITION(noCompet) on delete cascade,
	constraint fkClass2 foreign key(noDiscipline) references DISCIPLINE(noDiscipline) on delete cascade
)type=InnoDB;
