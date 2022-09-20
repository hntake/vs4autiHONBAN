<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
      /**ログイン画面への遷移 */
      public function login()
      {
          return view('auth.login');
      }
      public function log(Request $request)
      {
        $user = User::where('email', $request->email)->first();
        Auth::login($user);
        $schedules = Schedule::where('id', $request->id)->orderBy('created_at','desc')->get();
        if (isset($user['stripe_id'])){
            return view('list',compact('schedules'));
        }
        else{

            return view('stripe',[
                'intent' => $user->createSetupIntent()
            ]);
        }

      }
    protected function loggedOut(Request $request)
    {
        return redirect(route('login'));
    }
}
