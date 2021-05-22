<?php
namespace App\Http\Controllers;

use App\User;
use Modules\Page\Models\Page;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // if (Auth::guest()) {
        //     if(isset($_SERVER['HTTP_USER_AGENT']) && strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'micromessenger') !==false) {
        //         $user = new User();
        //         if (isset($_GET['code']) && $_GET['code']) {
        //             $user->codeExchangeToken();
        //         } else {
        //             $_GET['redirectUri']='https://crowdroom.y3579.com'.$_SERVER['REQUEST_URI'];
        //             $user->wechatLogin($_GET);
        //         }
        //     }
        // }
    }
}
