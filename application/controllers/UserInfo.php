<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * name: UserInfo
 * function: 负责处理与用户信息相关的业务逻辑
 */
class UserInfo extends CI_Controller{

	/**
	 * 构造函数
	 * @Author   yeweiyang
	 * @DateTime 2018-05-09
	 * @version  [1.0]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model("UserInfo_model");
		$this->load->helper("wxutilsapi");
	}
	
    /**
	 *	name: login
	 *	function: 显示的登陆界面
	 */
	public function login(){
		$this->load->view("user/login.html");
	}

	/**
	 * 获取用户在此小程序中的openid
	 * @Author   yeweiyang
	 * @DateTime 2018-07-14
	 * @version  [version]
	 */
	public function GetOpenid(){
		$code = $this->input->post('code');
		$openid = getOpenid($code);
		exit($openid);
	}

	/**
	 * 插入一条用户数据
	 * @Author   yeweiyang
	 * @DateTime 2018-05-17
	 * @version  [1.0]
	 */
	public function Insert(){
		$openid = $this->input->post('openid');
		$username = $this->input->post('username');
		$usersex = $this->input->post('usersex');
		$userstatus = $this->input->post('userstatus');
		$otherdata = $this->input->post('otherdata');
		$status_one = $this->UserInfo_model->Insert_user($openid,
												$isMonitor,
												$ui_name,
												$userstatus);
		if($status_one){
			if($userstatus == "student"){
				$IDnumber = $otherdata[0];
				$student_major = $otherdata[1];
				$student_class = $otherdata[2];
				$backinfo = $this->UserInfo_model->Inser_studentinfo($openid,
							$username,
							$usersex,
							$IDnumber,
							$student_major,
							$student_class);
			}else{
				$teacher_number = $otherdata[0];
				$teacher_degree = $otherdata[1];
				$teacher_title = $otherdata[2];
				$majorDirection = $otherdata[3];
				$TeachingCourse = $otherdata[4];
				$backinfo = $this->UserInfo_model->Inser_teacherinfo($openid,
							$username,
							$usersex,
							$teacher_number,
							$teacher_degree,
							$teacher_title,
							$majorDirection,
							$TeachingCourse);
			}
			exit($backinfo);
		}else{
			exit($backinfo);
		}
	}

	/**
	 *	name: Handler
	 *	function: 登录处理函数
	 */
	public function loginHandler(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$status = $this->UserInfo_model->checkLogin($username, $password);
		
		if(!$status){
			echo "ERROR";
			exit(0);
		}
		
		var_dump("nihao");

		$user = $this->session->userdata("user");
		
		if($user->islock == 0){
			echo "LOCK";
			exit(0);
		}else{
			redirect("/");
			exit(0);
		}
	}

	/**
	 * name: logoutHandler
	 * function: 登陆退出函数
	 */
	public function logoutHandler(){
		$this->session->sess_destroy();
		redirect("/userInfo/login");
	}
}