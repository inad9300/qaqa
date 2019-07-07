drop database if exists qaqadb;
drop user if exists 'qaqaroot'@'localhost';

create database qaqadb;
create user 'qaqaroot'@'localhost' identified by 'qaqapass';
grant select, insert on qaqadb.* to 'qaqaroot'@'localhost';

use qaqadb;

create table questions (
    id int unsigned auto_increment primary key,
    content varchar(500) not null,
    time timestamp
);

create table answers (
    id int unsigned auto_increment primary key,
    question_id int unsigned,
    content varchar(500) not null,
    time timestamp,

    foreign key (question_id) references questions(id)
);
