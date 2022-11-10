create database ToDo_db character set utf8 collate utf8_general_ci;
create user 'wdtkr'@'localhost' identified by 'password';
grant all privileges ON ToDo_db.*TO 'wdtkr'@'localhost';