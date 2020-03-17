<?php

/**
 * name: UserInfo_model
 * function: 用户信息表的数据库交互
 */
class UserInfo_model extends CI_Model{

	/**
	 * 添加一个用户
	 * @Author   yeweiyang
	 * @DateTime 2020-02-10
	 * @version  [version]
	 * @return   [type]               [description]
	 */
	public function Insert_user($openid,
							$isMonitor,
							$ui_name,
							$user_type){
		$user_sql = "INSERT INTO `userinfo`(`openid`,`isMonitor`,`ui_name`,`user_type`) VALUES (?,?,?,?)";
		$status = $this->db->query($sql, func_get_args());
	}

	/**
	 * 插入一条用户数据
	 * @Author   yeweiyang
	 * @DateTime 2018-05-09
	 * @version  [1.0]
	 * @param    [type]     $openid   [description]
	 * @param    [type]     $userName [description]
	 * @param    string     $bandName [description]
	 * @param    string     $telName  [description]
	 * @param    string     $tel      [description]
	 */
	public function Inser_studentinfo($openid,
							$username,
							$usersex,
							$IDnumber,
							$student_major,
							$student_class){

		$sql = "INSERT INTO `Student_info`(`openid`,`studentname`,`studentsex`,`studentnumber`,`majorname`,`classname`) VALUES (?,?,?,?,?,?)";
		$status = $this->db->query($sql, func_get_args());
		return $status;
	}


	/**
	 * 添加一个教师用户
	 * @Author   yeweiyang
	 * @DateTime 2020-02-10
	 * @version  [version]
	 * @return   [type]               [description]
	 */
	public function Inser_teacherinfo($openid,
							$username,
							$usersex,
							$teacher_number,
							$teacher_degree,
							$teacher_title,
							$teacher_research,
							$majorDirection){

		$sql = "INSERT INTO `Teacher_info`(`openid`,`teacherName`,`teacherSex`,`teacherNumber`,`academicDegree`,`academicTitle`,`TeachingCourse`,`majorDirection`) VALUES (?,?,?,?,?,?,?,?)";
		$status = $this->db->query($sql, func_get_args());
		return $status;
	}

	/**
	 * name: checkLoginInfo
	 * function: 验证用户信息
	 * @param $username 账号
	 * @param $password 密码
	 * @param $save 将用户信息保存到session中(默认为true)
	 * @return boolean 表示函数执行状态
	 */
	public function checkLogin($username, $password, $save=true){
		$sql = "select * from `userinfo` ";
		$sql .= "where `ui_name` = ? and `password` = ?";
		$query = $this->db->query($sql, array($username, md5($password)));
		$row = $query->row();
		
		$status = isset($row);
		
		if($save){
			// 将用户信息保存到session中
			if($status) $this->session->set_userdata("user", $row);
			else $this->session->remove("user");
		}
		return $status;
	}	

}