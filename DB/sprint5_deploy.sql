alter table users add column password varchar(255) not null after address;
alter table users add column role int(1) not null after password;
alter table users add column new_user tinyint(1) after role;
alter table users add column created datetime;
alter table users add column modified datetime;
