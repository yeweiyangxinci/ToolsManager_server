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

	/**
	 * 根据itemid查询item_name
	 * @Author   yeweiyang
	 * @DateTime 2020-02-10
	 * @version  [version]
	 * @return   [type]               [description]
	 */
	public function getTypeById($itemid){
		$select_sql = "SELECT `item_name` FROM `typeinfo` WHERE `itemid` = ?";
		$query = $this->db->query($select_sql, array($itemid));
		$item_name = $query->row();
		return $item_name;
	}

	/**
	 * 添加一个工具
	 * @Author   yeweiyang
	 * @DateTime 2020-02-10
	 * @version  [version]
	 * @return   [type]               [description]
	 */
	public function insertItem($params){
		$sql = "INSERT INTO `Toolsinfo`";
		$sql .= "(`toolsnumber,
					`toolsname`,
					`toolsCount`,
					`countUnit`,
					`price`,
					`toolstype`,
					`item_name`,
					`picspath`,
					`storageTime`,
					`storagePosition`,
					`isStorage`,
					`status`,
					`Introduce`,
					`toolManager`,
					`managerName`)";
		$sql .= "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$status = $this->db->query($sql, func_get_args());
		return $status;
	}
}