create database ajaxForm;

use ajaxForm;

grant all on ajaxForm.* to testuser@localhost identified by '9999';

create table formdata (
id int primary key auto_increment,
name varchar(32),
comment varchar(32),
created_at datetime
);