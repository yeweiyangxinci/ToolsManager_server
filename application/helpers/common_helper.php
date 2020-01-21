<?php
/*
| -------------------------------------------------------------------
| 公共函数
| -------------------------------------------------------------------
*/
/**
 *	name: loadpage
 *	function: 显示指定页面,并且为页面设置标题
 *  $param $obj 负责加载页面的对象
 * 	@param $pages 要加载的页面集合与页面数据(默认文件后缀为html)
 *			example： $page["file" => "a", "data"=> array()];
 *					  $pages[] = $page;
 *	@param $scripts 页面内的脚本文件集合
 */
function loadpage($obj, $pages){
	$data['user'] = $obj->session->userdata("user");
	$obj->load->view('templates/header.html', $data);
	$obj->load->view('templates/left.html');
	foreach($pages as $page){
		$obj->load->view($page['file'], $page['data']);
	}
	$obj->load->view('templates/footer.html');
}

function loadInformation($obj, $message, $url, $type){
	$page['file'] = 'templates/information.html';
	$page['data'] = array(
		"message" => $message,
		"url" 	  => $url,
		"type"    => $type
	);
	loadpage($obj, array($page));
}
/**
 *	name: p
 *	function: 打印调试信息
 *	@param $message 调试信息
 */
function p($message){
	if(ENVIRONMENT == 'development'){
		echo "<pre>";
		var_dump($message);
		echo "<pre>";
	}
}