<?php
namespace App\Http\Controllers;

use App\Helpers\Curl;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WechatAuthController extends Controller {
    public function login() {
        $user = new User();
        $user->wechatLogin($_GET);
    }

    public function createUser($openId) {
        $user = User::firstOrNew(array('open_id' => $openId));
        $accessToken = $_GET['accessToken'];
        $nickname = $_GET['nickname'];
        $headimgurl = $_GET['headimgurl'];

        $user->access_token = $accessToken;
        //$user->expires_in = $accessTokenObj->expires_in;

        //wechat info
        //if(empty($user->name) || strlen($user->name) === 0) {
            //$wechatUserInfo = User::wechatUserInfo($accessToken, $openId);

//            $user->email = $wechatUserInfo->nickname;
//            $user->first_name = $wechatUserInfo->nickname;
//            $user->last_name = $wechatUserInfo->nickname;
//            $user->active_status=0;
//            $user->dark_mode=0;
//            $user->messenger_color='#2180f3';
//            $user->avatar= $wechatUserInfo->headimgurl;
//            $user->password='test';

            $user->email = $nickname.'@qq.com';
            $user->first_name = $nickname;
            $user->last_name = $nickname;
            $user->active_status=1;
            $user->dark_mode=0;
            $user->messenger_color='#2180f3';
            $user->avatar= $headimgurl;
            $user->password='test';
            $user->is_verified=1;

            //$user->status=1;

            $user->city='Shanghai';
            $user->state='Shanghai';
            $user->country='CN';
            
        //}
        $user->save();
    }
}
