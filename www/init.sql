create database apps;
use apps;

create table t_member(
member_idx int(10) not null auto_increment comment '회원번호',
fullname varchar(100) not null comment '이름',
nickname varchar(100) not null comment '별명',
enc_password varchar(100) not null comment '비밀번호',
enc_hp_no varchar(100) not null comment '전화번호',
enc_email varchar(100) not null comment '이메일',
sex varchar(1) default null comment '성별',
update_date datetime not null comment '수정일',
reg_date datetime not null comment '등록일',
primary key (member_idx)
);

create table t_order(
order_idx int(10) unsigned not null auto_increment comment '주문번호',
product_name varchar(255) not null comment '제품명',
order_date datetime not null comment '주문일',
update_date datetime not null comment '수정일',
reg_date datetime not null comment '등록일',
primary key (order_idx)
);