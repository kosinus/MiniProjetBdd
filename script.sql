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

insert into VILLE values
(null,'Besancon'),
(null,'Belfort'),
(null,'Paris'),
(null,'Londres'),
(null,'Tokyo'),
(null,'Berlin'),
(null,'NewYork');
insert into CLUB values
(null,'Besak Athlé',1),
(null,'Belf Club',2),
(null,'Paris Racing',3),
(null,'Athlétisme parisien',3),
(null,'London Sport Club',4),
(null,'Japanese Club',5),
(null,'Racing Berlin',6),
(null,'New Yankees',7),
(null,'Club of NewYork',7);
insert into ATHLETE values
(null,'Patoulatchi',1),
(null,'Martinez',2),
(null,'Momo',3),
(null,'Gonzague',4),
(null,'Miller',5),
(null,'Andrew',5),
(null,'Sangoku',6),
(null,'Sangohan',6),
(null,'Wolfgang',7),
(null,'Douglas',8),
(null,'Peterson',8),
(null,'Bryan',9);
insert into COMPETITION values
(null,'Coupe de France','2012-07-12',3),
(null,'Coupe du Monde','2014-08-01',5);
insert into DISCIPLINE values
(null,'Lancer de nains'),
(null,'Hot Dog Fever'),
(null,'Record Divers'),
(null,'Course a pied'),
(null,'Tir instinctif');
insert into ESTSPECIALISTE values
(1,2),
(1,5),
(2,1),
(2,2),
(3,4),
(4,3),
(4,4),
(4,5),
(5,1),
(6,1),
(7,2),
(7,3),
(8,3),
(9,1),
(10,2),
(10,5),
(11,2),
(11,5),
(12,2),
(12,5);
insert into CLASSEMENT values
(1,2,2,4),
(1,2,5,1),
(2,2,1,2),
(2,2,2,3),
(3,2,4,2),
(4,2,3,2),
(4,2,4,1),
(4,2,5,3),
(5,2,1,1),
(6,2,1,3),
(7,2,2,6),
(7,2,3,3),
(8,2,3,1),
(9,2,1,4),
(10,2,2,5),
(10,2,5,2),
(11,2,2,2),
(11,2,5,4),
(12,2,2,1),
(12,2,5,5),
(1,1,2,2),
(1,1,5,1),
(1,1,4,1),
(2,1,1,2),
(2,1,5,2),
(2,1,2,1),
(3,1,4,2),
(3,1,1,1),
(3,1,2,3);


