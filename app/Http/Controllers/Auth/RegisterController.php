<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Lost;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;





class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            /* 'name' => ['required', 'string', 'max:255','unique:users'], */
             'email' => ['required', 'string', 'email:strict,dns',  'max:255'],
/*             'email' => ['required', 'string', 'email:strict,dns',  'max:255', 'unique:users'],
 */            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([

           'email' => $data['email'],
            'type' => $data['type'],
            'password' => Hash::make($data['password']),
            'uuid'=>(string) Str::uuid(),
            'email_verify_token' => base64_encode($data['email']),
        ]);

       /*  $email = new EmailVerification($user);
        \Mail::to($user->email)->send($email); *///二通になるのでコメントアウト
        return $user;

    }
    /*仮登録画面*/
        public function pre_check(Request $request){
        $this->validator($request->all())->validate();
        //flash data
        $request->flashOnly( 'email');
        $request->flashOnly( 'type');
        $bridge_request = $request->all();
        // password マスキング
        $bridge_request['password_mask'] = '******';

        return view('auth.register_check')->with($bridge_request);
    }

    public function register(Request $request)
    {
        event(new Registered($user = $this->create( $request->all() )));
        return view('auth.registered');
    }
    //本登録画面に遷移
    public function showForm()
    {
        $user=Auth::user();

        return view('auth.main.register');

    }
     //確認画面
    public function mainCheck(Request $request)
    {
      $request->validate([
        'name' => 'required|string',

      ]);
      //データ保持用
      $email_token = $request->email_token;

      //申込種類によって分ける
      $user=Auth::user();
      $user=User::where('id','=',$user->id)->first();
      if($user->type==0){
        $user->update([
            'gender'=> $request->gender,
            'image_id'=> $request->image_id,
        ]);
      }

      elseif($user->type==1){
        $lost=new Lost();
        $lost->name=$request->name;
        $lost->name_pronunciation = $request->name_pronunciation;
        $lost->email=$user->email;
        $lost->uuid=$user->uuid;
        $lost->tel1=$request->tel1;
        $lost->tel2=$request->tel2;
        $lost->address=$request->address;
        $lost->mon1=$request->mon1;
        $lost->mon2=$request->mon2;
        $lost->mon3=$request->mon3;
        $lost->mon1=$request->tue1;
        $lost->tue2=$request->tue2;
        $lost->tue3=$request->tue3;
        $lost->wed1=$request->wed1;
        $lost->wed2=$request->wed2;
        $lost->wed3=$request->wed3;
        $lost->thu1=$request->thu1;
        $lost->thu2=$request->thu2;
        $lost->thu3=$request->thu3;
        $lost->fri1=$request->fri1;
        $lost->fri2=$request->fri2;
        $lost->fri3=$request->fri3;
        $lost->sat1=$request->sat1;
        $lost->sat2=$request->sat2;
        $lost->sat3=$request->sat3;
        $lost->sun1=$request->sun1;
        $lost->sun2=$request->sun2;
        $lost->sun3=$request->sun3;

      }

      return view('auth.main.register_check', compact('user','email_token','lost'));
    }

}
