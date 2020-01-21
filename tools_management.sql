drop database `Tools_management`;
create database if not exists `Tools_management` default character set utf8;
use `Tools_management`;


-- 用户信息表
create table if not exists `userinfo`(
	`openid` varchar(50) not null,
	`isMonitor` bit(1) not null comment '是否为管理员',
	`ui_name` varchar(50) not null,
	`password` varchar(32) default 'e10adc3949ba59abbe56e057f20f883e' comment '密码(默认密码123456)',
	`user_type` enum('student', 'teacher'),
	`islock` int(11) default 1,
	primary key(`openid`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

insert into userinfo(`openid`, `isMonitor`, `ui_name`, `password`, `user_type`)
	values ('00000', 0, 'root', md5('123456'), 'teacher');

-- 工具类型表
create table if not exists `typeinfo`(
	`itemid` int(11) not null auto_increment comment '工具类型的id',
	`item_name` varchar(100) not null comment '工具的名称',
	`createtime` timestamp not null default current_timestamp,
	primary key(itemid)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

-- 学生信息表
create table if not exists `Student_info`(
	`openid` varchar(50) not null,
	`studentname` varchar(50) not null,
	`studentsex` varchar(32) not null,
	`studentnumber` varchar(50),
	`IDnumber` varchar(50),
	`majorname` varchar(50),
	`grade` varchar(10),
	`classname` varchar(10), 
	`directionClass` varchar(50), -- 定向班名称
	`researchName` varchar(50), -- 专业方向
	`createtime` timestamp not null default current_timestamp,
	unique key(`IDnumber`),
	primary key(`openid`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

-- 教师信息表
create table if not exists `Teacher_info`(
	`openid` varchar(50) not null,
	`teacherName` varchar(50) not null,
	`teacherSex` varchar(32) not null,
	`teacherNumber` varchar(50),
	`academicDegree` varchar(50),
	`academicTitle` varchar(50),
	`certificate` varchar(10),
	`telNumber` varchar(10), 
	`majorDirection` varchar(50), -- 定向班名称
	`TeachingCourse` varchar(50), -- 专业方向
	`createtime` timestamp not null default current_timestamp,
	unique key(`teacherNumber`),
	primary key(`openid`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

-- 文件类型
create table if not exists `filetype`(
	`id` int(11) not null auto_increment,
	`name` varchar(50) not null,
	`userid` int(11) not null,
	primary key(`id`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

-- 文件内容
create table if not exists `fileinfo`(
	`id` int(11) not null auto_increment,
	`name` varchar(50) not null,
	`info` longtext not null,
	`compressinfo` longtext not null,
	`typeid` int(11) not null,
	`userid` int(11) not null,
	`createtime` timestamp not null default current_timestamp,
	primary key(`id`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;
