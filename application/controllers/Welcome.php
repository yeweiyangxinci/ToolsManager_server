<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**
	 * name: __construct
	 * function: 初始化类配置
	 */
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("user");
		if($user == false){
			redirect("/UserInfo/login");
			exit(0);
		}
	}
	
	/**
	 *	name: index
	 *	function: 显示学籍管理主界面
	 */
	public function index(){
		// loadInformation($this, "操作成功", "/student/query", "success");
		// redirect("/student/query");
		loadpage($this, array());
	}
}