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
		$this->load->model("Log_model");
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

	/**
	 * 	name: insertItem
	 *	function: 增加一个工具
	 */
	public function insertItem(){
		$toolsnumber = $this->input->post('toolsnumber');
		$toolsname = $this->input->post('toolsname');
		$storageTime = $this->input->post('storageTime');
		$toolstype = $this->input->post('toolstype');
		$isStorage = $this->input->post('isStorage');
		$toolsCount = $this->input->post('toolsCount');
		$countUnit = $this->input->post('countUnit');
		$price = $this->input->post('price');
		$storagePosition = $this->input->post('storagePosition');
		$status = $this->input->post('status');
		$toolManager = $this->input->post('toolManager');
		$managerName = $this->input->post('managerName');
		$Introduce = $this->input->post('Introduce');
		$picspath = $this->input->post('picspath');
		#$type_name = $this->ItemInfo_model->getTypeById($toolstype);
		$type_name = "武平";
		var_dump("进入了");
		$params = array(
			$toolsnumber,
			$toolsname,
			$toolsCount,
			$countUnit,
			$price,
			$toolstype,
			$type_name,
			$picspath,
			$storageTime,
			$storagePosition,
			$isStorage,
			$status,
			$Introduce,
			$toolManager,
			$managerName
		);

		$bc_status = $this->ItemInfo_model->insertItem($params);
		
		if($bc_status == true){
			$content = "成功增加";
		}else{
			$content = "添加失败";
		}

		echo $status ? "ok":"error";
	}
}