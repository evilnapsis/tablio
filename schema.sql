/*
* Modelo de base de datos del sistema Tablio
* Desarrollado 21 de Marzo del 2015
* Actualizado 30 de Enero del 2017
* @author @evilnapsis
* http://evilnapsis.com/
*/
create database tablio;
use tablio;
create table  user (
  id int not null auto_increment primary key,
  name varchar(50) not null,
  lastname varchar(50) not null,
  email varchar(255) not null,
  password varchar(60) not null,
  is_active tinyint(1) not null default 1,
  is_admin tinyint(1) not null default 0,
  created_at datetime not null
);

create table  sys (
  id int not null auto_increment primary key,
  name varchar(200) not null,
  created_at datetime not null,
  user_id int not null
);


create table  tbl (
  id int not null auto_increment primary key,
  name varchar(200) not null,
  created_at datetime not null,
  sys_id int not null,
  foreign key (sys_id) references sys(id)
);




create table  col (
  id int not null auto_increment primary key,
  name varchar(200) not null,
  width int not null,
  label varchar(200) not null,
  placeholder varchar(200) not null,
  suggest varchar(500) not null,
  ref_table_field varchar(200),
  type varchar(200) not null,
  position int,
  is_required tinyint(1) not null default '1',
  created_at datetime not null,
  tbl_id int not null,
  foreign key (tbl_id) references tbl(id)
); 

create table  entry (
  id int not null auto_increment primary key,
  created_at datetime not null,
  tbl_id int not null,
  foreign key (tbl_id) references tbl(id)
); 


create table  row (
  id int not null auto_increment primary key,
  val varchar(200) not null,
  created_at datetime not null,
  col_id int not null not null,
  entry_id int not null not null,
  foreign key (col_id) references col(id),
  foreign key (entry_id) references entry(id)
); 


