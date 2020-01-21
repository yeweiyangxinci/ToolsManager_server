<?php
/**
 * 微信接口辅助类
 */
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

/**
 * 获取用户的openid
 * @Author   yeweiyang
 * @DateTime 2018-07-14
 * @version  [1.0]
 * @return   [type]     [description]
 */
function getOpenid($code){
	$SERVER_NAME = $_SERVER['SERVER_NAME'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    $redirect_uri = urlencode('http://' . $SERVER_NAME . $REQUEST_URI);
    $appid = "wxd189cd7196936aeb";
    $appsecret = "2b96a3b0b9944da7641fb90b7a93b009";

    if (!$code) {
        // 网页授权当scope=snsapi_userinfo时才会提示是否授权应用
        $autourl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        header("location:$autourl");
    } else {
        // 获取openid
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appid . '&secret=' . $appsecret . '&js_code=' . $code . '&grant_type=authorization_code';

        $row = posturl($url);
        return $row['openid'];
    }
}

/**
 * 发送url连接请求
 * @Author   yeweiyang
 * @DateTime 2018-07-14
 * @version  [1.0]
 * @param    [type]     $url [description]
 * @return   [type]          [description]
 */
function posturl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $jsoninfo = json_decode($output, true);
    return $jsoninfo;
}