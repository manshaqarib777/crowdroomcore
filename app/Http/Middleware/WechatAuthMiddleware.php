<?php
/**
 * create by kevin gates
 *
 *
 */
namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class WechatAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->tryWechatLogin();

        return $next($request);
    }

    private function tryWechatLogin() {
        if (!Auth::id()) {
            if(isset($_SERVER['HTTP_USER_AGENT']) && strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'micromessenger') !==false) {
                $user = new User();
                if (isset($_GET['code']) && $_GET['code']) {
                    $user->codeExchangeToken();
                } else {
                    $_GET['redirectUri']='https://crowdroom.y3579.com'.$_SERVER['REQUEST_URI'];
                    $user->wechatLogin($_GET);
                }
            }
        } else {
            //the user is been deleted,but the user logged.
            if(Auth::id()) {
                $user = User::find(Auth::id());
                if (empty($user)) {
                    Auth::logout();
                    $url='https://crowdroom.y3579.com'.$_SERVER['REQUEST_URI'];
                    header('Location: '.$url);
                    exit;
                }
            }
            
        }
    }
}
