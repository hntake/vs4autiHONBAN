<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Design;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Session;


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ;

    public function redirectTo() {
        $user=Auth::user();

        if ($user->type==8) {
            $this->redirectTo = '/design/my_page';
        }elseif ($user->type == 10) {
         // ログイン後に $design->id を取得する
            $this->redirectTo = '/design/my_sheet';
        } else {
            $this->redirectTo = '/my_page';
        }
    
        return $this->redirectTo;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function loggedOut(Request $request)
    {
        return redirect(route('login'));
    }
}
