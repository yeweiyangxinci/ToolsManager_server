<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * name: UserInfo
 * function: 负责处理与用户订单相关的业务逻辑
 */
class OrderInfo extends CI_Controller{
	/**
	 * 构造函数
	 * @Author   yeweiyang
	 * @DateTime 2020-02-05
	 * @version  [1.0]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model("OrderInfo_model");
	}

	/**
	 * 构造函数
	 * @Author   yeweiyang
	 * @DateTime 2020-02-05
	 * @version  [1.0]
	 */
	public function query(){
		$this->load->view("order/orderInfo-list.html");
	}
}