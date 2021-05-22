<?php
namespace App\Http\Controllers;

use App\User;
use Modules\Page\Models\Page;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\WechatMessage;

define("TOKEN", "crowdroom");

class WechatCallbackController extends Controller
{
    public function index()
    {
        $this->valid();
        $this->responseMsg();
    }

    public function valid()
    {
        $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"] : '';

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            if($echoStr) {
                exit;
            }
            //Logger::write('vaild:'.$echoStr);
        } else {
            echo("invaild:". $echoStr);
            //Logger::write('invaild:'.$echoStr);
            exit;
        }
    }

    public function responseMsg()
    {
        $input = file_get_contents("php://input");
                libxml_disable_entity_loader(true);
        WechatMessage::textMessage($input, "welcome");
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = isset($_GET["signature"]) ? $_GET["signature"] : '';
        $timestamp = isset($_GET["timestamp"]) ? $_GET["timestamp"] : '';
        $nonce = isset($_GET["nonce"]) ? $_GET["nonce"] : '';

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

