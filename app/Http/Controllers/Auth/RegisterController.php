<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
    //-------------------ユーザーの登録条件-------------------
        //UserName          ：2文字以上,12文字以内
        //MailAdress"       ：5文字以上,40文字以内・登録済みメールアドレス使用不可・メールアドレスの形式
        //Password          ：8文字以上,20文字以内・英数字のみ
        //PasswordConfirm   ：8文字以上,20文字以内・英数字のみ・Password入力欄と一致しているか
        //------------------------------------------------------

//2024/06/06　バリデーション判定処理完了！！！！
    public function register(Request $request)
    {
        //バリデーション条件設定
        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40|unique:users,mail',
            'password' => 'required|string|min:8|max:20|confirmed',
        ]);
        //判定
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = bcrypt($request->input('password'));
        //格納
        User::create([
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
        ]);
        //登録完了ページへ（ユーザーネームを表示させるために「$username」を添えて）
        return redirect('/added')->with('username',$username);
    }


    public function added(){
        $value = session('username'); // sessionデータから$usernameを取得
        // dd($value);//ユーザー名受け渡しデバッグ用
        return view('auth.added',compact('value'));
    }
}
