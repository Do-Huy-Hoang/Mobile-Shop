CREATE DATABASE Shop_ITP
use Shop_ITP
--khách hàng
CREATE TABLE customer(
	id	char(4) not null,
	Name	varchar(40),
	Address	varchar(50),
	phone_number	varchar(20),
	NGSINH	smalldatetime,
	NGDK	smalldatetime,
	DOANHSO	money,
	Email   varchar(500),
	constraint pk_kh primary key(MAKH)
)
	-------- Product-------------
CREATE TABLE product(
	id	int(11) primary key auto_increment,
	title	varchar(40),
	price float,
	Image varchar(100),
    content text,
    id_category int(11),
	id_manufacturer int(11),
	id_statuss int(11),
    created_at datetime,
    updated_at datetime,
    href_param varchar(250)
)
	-------- Img - Product-------------
CREATE TABLE img_products(
	id	int(11) primary key auto_increment,
	id_products int(11),
	Image varchar(255)
)
	-------- category-------------
CREATE TABLE category(
	id int(11) primary key auto_increment,
    name varchar(100) not null,
    id_parent int(11) not null,
    created_at datetime,
    updated_at datetime)

	-------- manufacturer-------------
CREATE TABLE statuss(
	id int(11) primary key auto_increment,
    name varchar(100) not null,
    created_at datetime,
    updated_at datetime)
	-------- User-------------
CREATE TABLE users(
	id int(11) primary key auto_increment,
    full_name varchar(255),
    email varchar(255),
    passwords varchar(255),
	remember_token varchar(255),
    created_at datetime,
    updated_at datetime
)
-----HOÁ ĐƠN
CREATE TABLE HOADON(
	SOHD	int not null,
	NGHD 	smalldatetime,
	MAKH 	char(4),
	MANV 	char(4),
	TRIGIA	money,
	PAYMENT varchar(50),
	NOTE	varchar(100),
	constraint pk_hd primary key(SOHD)
)
-----CHI TIẾT HOÁ ĐƠN
CREATE TABLE CTHD(
	SOHD	int,
	MASP	char(4),
	SL	int,
	constraint pk_cthd primary key(SOHD,MASP)
)
------- Forenign key ---------
 ALTER TABLE product ADD CONSTRAINT P01_HD FOREIGN KEY(id_category) REFERENCES category(id)
 ALTER TABLE product ADD CONSTRAINT P02_HD FOREIGN KEY(id_manufacturer) REFERENCES manufacturer(id)
 ALTER TABLE product ADD CONSTRAINT P03_HD FOREIGN KEY(id_statuss) REFERENCES statuss(id)
 ALTER TABLE img_products ADD CONSTRAINT P04_HD FOREIGN KEY(id_products) REFERENCES product(id)

