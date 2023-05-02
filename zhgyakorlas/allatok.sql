drop schema if exits allatok;
create schema allatok;

use allatok;


create table allat(
ID int primary key,
nev varchar(50),
faj varchar(50)
);

create table gondozo(
ID int primary key,
nev varchar(50),
kor int 
);

create table ag(
AllatID int ,
GondozoID int,
foreign key (AllatID) references allat(ID),
foreign key (GondozoID) references gondozo(ID),
primary key(AllatID,GondozoID)
);


insert into allat(ID,nev,faj) values (2,'Glória','víziló');
insert into allat(ID,nev,faj) values (1,'Meng','panda');
insert into allat(ID,nev,faj) values (3,'Bálint','víziló');
insert into allat(ID,nev,faj) values (4,'Theo','zsiráf');

insert into gondozo(ID,nev,kor) values (1,'Kiss Anna',28);
insert into gondozo(ID,nev,kor) values (2,'Közepes Béla',48);
insert into gondozo(ID,nev,kor) values (3,'Nagy Cecil',28);


insert into ag(AllatID,GondozoID) values(1,1);
insert into ag(AllatID,GondozoID) values(2,1);
insert into ag(AllatID,GondozoID) values(3,1);
insert into ag(AllatID,GondozoID) values(3,2);
insert into ag(AllatID,GondozoID) values(4,3);



