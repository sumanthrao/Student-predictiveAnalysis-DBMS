drop database project;
create database project;
\c project

create table student
(
	usn varchar ,
	name varchar,
	dept_name varchar(3),
	year int,
	age int,
	semester int,
	primary key(usn)
);

create table department
(
	dept_id int,
	dept_name varchar,
	primary key(dept_name)
);

create table attendance
(
	usn varchar,
	sub1 int,
	sub2 int,
	sub3 int,
	sub4 int,
	sub5 int,
	total_classes int,
	test varchar(3),
	semester int,
	primary key(usn,test,semester),
	foreign key(usn) references student
		on delete cascade
);

create table marks
(
	usn varchar,
	sub1 float,
	sub2 float,
	sub3 float,
	sub4 float,
	sub5 float,
	test varchar(3),
	semester int,
	primary key(usn,test,semester),
	foreign key(usn) references student
		on delete cascade
);

create table subject
(
	semester int,
	sub1 varchar,
	sub2 varchar,
	sub3 varchar,
	sub4 varchar,
	sub5 varchar,
	dept_name varchar,
	tot_credits int,
	primary key(semester)

);

create table admission
(
	reciept_no int primary key,
	usn varchar,
	name varchar,
	total_fees int,
	foreign key(usn) references student
		on delete cascade

);
/*
create table advisor
(
	usn varchar primary key,
	advisor_name varchar,
	foreign key(usn) references student
		on delete cascade
);
*/
create table personal_details
(
	usn varchar,
	email varchar,
	cgpa double precision,
	semester int ,
	year int,
	phone varchar,
	Address varchar,
	board_marks varchar,
	foreign key(usn ) references student
		on delete cascade
);

create table parents_details
(
	usn varchar primary key,
	fathers_name varchar,
	address varchar,
	fathers_email varchar,
	foreign key(usn ) references student
	on delete cascade
);
