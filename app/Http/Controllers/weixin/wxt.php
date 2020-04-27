<?php
//获得参数 signature nonce token timestamp echostr
$nonce     = $_GET['nonce'];
$token     = 'jialidunvip';
$timestamp = $_GET['timestamp'];
$echostr   = $_GET['echostr'];
$signature = $_GET['signature'];
//形成数组，然后按字典序排序
$array = array();
$array = array($nonce, $timestamp, $token);
sort($array);

//拼接成字符串,sha1加密 ，然后与signature进行校验
$str = sha1( implode( $array ) );
if( $str == $signature && $echostr ){
    //第一次接入weixin api接口的时候
    echo  $echostr;
    exit;
}else{

    //1.获取到微信推送过来post数据（xml格式）
    $postArr = file_get_contents("php://input");


    $postObj = simplexml_load_string( $postArr );

    //判断该数据包是否是订阅的回复消息
    if( strtolower( $postObj->MsgType) == 'text'){
        //如果是关注 subscribe 事件
        file_put_contents("发息.txt",$postArr);

        if( strtolower($postObj->MsgType == 'text') ){
            //回复用户消息(纯文本格式)
            $toUser   = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $time     = time();
            $msgType  =  'text';
            $content  = '回复证书查看';

            $template = "<xml>
                                <ToUserName><![CDATA[{$toUser}]]></ToUserName>
                                <FromUserName><![CDATA[$fromUser]]></FromUserName>
                                <CreateTime>12345678</CreateTime>
                                <MsgType><![CDATA[text]]></MsgType>
                                <Content><![CDATA[{$content}]]></Content>
                                </xml>";
            $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
            echo $info;


        }
    }
}


function getCertificate($name)
{
    $res = file_get_contents("");
}
