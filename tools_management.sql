drop database `Tools_management`;
create database if not exists `Tools_management` default character set utf8;
use `Tools_management`;

-- 用户信息表
create table if not exists `userinfo`(
	`userid` int(11) not null auto_increment comment '用户的id',
	`openid` varchar(50) not null,
	`isMonitor` bit(1) not null comment '是否为管理员',
	`ui_name` varchar(50) not null,
	`password` varchar(32) default 'e10adc3949ba59abbe56e057f20f883e' comment '密码(默认密码123456)',
	`user_type` enum('student', 'teacher'),
	`islock` int(11) default 1,
	primary key(`userid`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

insert into `userinfo`(`openid`, `isMonitor`, `ui_name`, `password`, `user_type`)
	values ('00000', 0, 'root', md5('123456'), 'teacher');

-- 工具类型表
create table if not exists `typeinfo`(
	`itemid` int(11) not null auto_increment comment '工具类型的id',
	`item_name` varchar(100) not null comment '类型的名称',
	`createtime` timestamp not null default current_timestamp,
	primary key(itemid)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;

-- 工具信息表
create table if not exists `Toolsinfo`(
	`toolsid` int(11) not null auto_increment comment '工具id',
	`toolsnumber` varchar(30) not null comment '工具序号',
	`toolsname` varchar(100) not null comment '工具名称',
	`toolsCount` Decimal not null comment '工具数量',
	`countUnit` varchar(30) not null comment '计量单位',
	`price` Decimal comment '单价',
	`toolstype` int(11) not null comment '工具类型',
	`item_name` varchar(100) not null comment '类型的名称',
	`picspath` varchar(100) not null comment '工具图片路径',
	`storageTime` varchar(30) not null comment '入库时间',
	`storagePosition` varchar(100) comment '入库存放位置',
	`isStorage` bit(1) not null comment '是否在库',
	`status` varchar(40) not null comment '状态',
	`Introduce` text comment '工具描述',
	`toolManager` int(11) not null comment '工具管理员id',
	`managerName` varchar(100) not null comment '管理员姓名',
	`createtime` timestamp not null default current_timestamp,
	primary key(`toolsid`),
	foreign key(`toolstype`) references `typeinfo`(`itemid`),
	foreign key(`toolManager`) references `userinfo`(`userid`)
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

-- 订单信息表
create table if not exists `Order_info`(
	`orderid` int(11) not null auto_increment comment '订单的id',
	`toolsid` int(11) not null comment '借用工具的id',
	`toolName` varchar(100) not null comment '借用工具的名称',
	`startTime` varchar(32) not null comment '借用的时间',
	`borrowCount` Decimal not null comment '借用的数量',
	`borrowUserid` int(11) not null comment '借用的用户id',
	`borrowUserName` varchar(32) not null comment '借用的用户名称',
	`handlePersonid` int(11) not null comment '经手的用户id',
	`handlePersonName` varchar(32) not null comment '经手的用户名称',
	`returnTime` varchar(10) not null comment '归还的时间',
	`returnCount` Decimal not null comment '归还的数量',
	`returnStatus` varchar(30) not null comment '归还状态',
	`returnHandlePersonid` int(11) not null comment '归还经手人',
	`returnHandlePersonName` varchar(30) not null comment '归还经手人名称',
	`createtime` timestamp not null default current_timestamp,
	primary key(`orderid`),
	foreign key(`toolsid`) references `Toolsinfo`(`toolsid`),
	foreign key(`borrowUserid`) references `userinfo`(`userid`),
	foreign key(`handlePersonid`) references `userinfo`(`userid`),
	foreign key(`returnHandlePersonid`) references `userinfo`(`userid`)  
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

-- 日志信息表
create table if not exists `loginfo`(
	`logid` int(11) not null auto_increment comment '流水号',
	`userid` int(11) not null comment '操作的用户id',
	`username` varchar(100) not null comment '操作的用户姓名',
	`content` text not null comment '操作内容',
	`operator_time` timestamp not null default current_timestamp comment '操作时间',
	primary key(`logid`),
	foreign key(`userid`) references `userinfo`(`userid`)
)ENGINE=InnoDB default charset=utf8 auto_increment=1;
