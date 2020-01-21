<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * name: Iteminfo
 * function： 负责处理与页面零件信息相关的业务逻辑
 */
class ItemInfo extends CI_Controller{

	/**
	 * 构造函数
	 * @Author   yeweiyang
	 * @DateTime 2020-01-19
	 * @version  [1.0]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model("ItemInfo_model");
	}

	/**
	 * 获取工具类型函数
	 * @Author   yeweiyang
	 * @DateTime 2020-01-19
	 */
	public function Get_type(){
		$backinfo = $this->ItemInfo_model->Get_type();
	}

	/**
	 * 增加工具类型函数
	 * @Author   yeweiyang
	 * @DateTime 2020-01-19
	 */
	public function Insert_type(){
		$typename = $this->input->post('typename');
		$backinfo = $this->ItemInfo_model->Insert_type($typename);
	}

	/**
	 *	name: query
	 *	function: 显示工具信息查询界面
	 */
	public function query(){
		$this->load->view("student/studentInfo-list.html");
	}

	/**
	 * 	name: add
	 *	function: 显示增加工具界面
	 */
	public function add(){
		$this->load->view("student/studentInfo-add.html");
	}
}