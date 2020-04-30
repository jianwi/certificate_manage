<?php

namespace App\Http\Controllers\weixin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Message extends Controller
{
    //
    public function index(Request $request)
    {
        Log::info('进入控制器');

        $nonce = $request->get('nonce');
        $token = 'jialidunvip';
        $timestamp = $request->get('timestamp');
        $echostr = $request->get('echostr');
        $signature = $request->get('signature');

        $array = array($nonce, $timestamp, $token);
        sort($array);
        $str = sha1(implode($array));
        if ($str == $signature && $echostr) {
            Log::info('第一次验证服务器');
            return $echostr;
        } else {

            $postArr = $request->getContent();
            $postObj = simplexml_load_string($postArr);

            if (strtolower($postObj->MsgType) == 'text') {
                $toUser = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $user_text = $postObj->Content;

                $content = $this->dealContext($user_text);

                return $this->responseText($toUser,$fromUser,$content);
            }
            }
        }

        private function dealContext($user_text)
        {
            Log::info('处理回复消息');
            $content = '';

            if (preg_match("/证书查询/",$user_text)){
                if (preg_match("/证书查询#([^\s]{2,22})/",$user_text,$res)){
                    $name = $res[1];
                    $content .= "您的证书信息查询结果如下：\n";
                    $content .= $this->getCertificate($name);
                }else{
                    $content .= "证书查询格式如下： \n证书查询#您的姓名";
                }
            }else{
                $content .= "xxx";
            }
            return $content;
        }

   private function getCertificate($name)
    {
        Log::info('查询证书');
        $url = "https://zs.jialidun.vip/api/v1/certificates?page=1&per_page=50&filter[name]=";
        $cer_info = "";
        $res_json = file_get_contents($url . urlencode($name));
        $res_array = json_decode($res_json, true);
        foreach ($res_array["data"] as $index => $res) {
            $cer_info .= "\n" . ++$index . "、"
                . $res["activity"] . "\n" . $res["award"] . "##" . $res["name"] . "\n"
                . "http://zs.jialidun.vip/#/info/" . $res["code"] . "\n";
        }
        if (count($res_array['data']) == 0){
            $cer_info .= "\n- - - - - -\n Sorry,系统还没找到您的证书唉 :(\n";
        }
        return $cer_info;
    }

    private function responseText($toUser, $fromUser, $content)
{
    Log::info('最终处理结果:xml');
    $time = time();
    $template = <<<xml
<xml>
    <ToUserName><![CDATA[{$toUser}]]></ToUserName>
    <FromUserName><![CDATA[$fromUser]]></FromUserName>
    <CreateTime>{$time}</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[{$content}]]></Content>
</xml>
xml;
    return $template;
}

}
