<?php

/**
 * name: ItemInfo_model
 * function: 用户信息表的数据库交互
 */
class ItemInfo_model extends CI_Model{

	/**
	 * 查询信息
	 * @Author   yeweiyang
	 * @DateTime 2020-01-19
	 * @version  [version]
	 * @return   [type]               [description]
	 */
	public function Get_type(){
		$item_sql = "SELECT `itemid`,`item_name` FROM `typeinfo`";
		$query = $this->db->query($sql);
		$typeinfo = $query->result_object();
		return $typeinfo;
	}

	/**
	 * 增加类型信息
	 * @Author   yeweiyang
	 * @DateTime 2020-01-19
	 * @version  [version]
	 * @return   [type]               [description]
	 */
	public function Insert_type($typename){
		$insert_sql = "INSERT INTO `typeinfo`(item_name) VALUES (?)";
		$status = $this->db->query($insert_sql, func_get_args());
		return $status;
	}
}