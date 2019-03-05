<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\LoginUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as _login;
        logout as _logout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        // 既存の認証処理を実行する(ログインユーザー管理テーブル追加後に処理を返すため、一旦変数に格納)
        $response = $this->_login($request);

        // ログインが成功したらログインユーザー管理テーブルにデータを追加
        LoginUser::create([
            'user_id' => \Auth::id()
        ]);

        // 既存の認証処理結果を返す
        return $response;
    }

    public function logout(Request $request)
    {
        // ログアウト前にログインユーザー管理テーブルからデータを削除
        LoginUser::find(\Auth::id())->delete();


        // 既存のログアウト認証処理を実行する
        return $this->_logout($request);
    }
}
