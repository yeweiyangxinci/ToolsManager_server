<?php

/**
 * 用户日志的数据交互
 * @class Log_model
 * @author Enstein_Jun 2017-05-04
 */
class Log_model extends CI_Model{
	/**
	 * 写入管理员操作日志
	 * @method write
	 * @author Enstein_Jun 2017-03-29
	 * @param  string   $username 管理员账号
	 * @param  string   $content  日志内容
	 * @return boolean  写入成功或失败
	 */
	public function write($username, $content){
		$sql = "INSERT INTO `manager_log`(`username`, `content`) VALUES (?, ?)";
		$status = $this->db->query($sql, func_get_args());
		return $status;
	}
}