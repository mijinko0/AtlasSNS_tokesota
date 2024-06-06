<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-------------------ユーザーの登録条件-------------------
        //UserName          ：2文字以上,12文字以内
        //MailAdress"       ：5文字以上,40文字以内・登録済みメールアドレス使用不可・メールアドレスの形式
        //Password          ：8文字以上,20文字以内・英数字のみ
        //PasswordConfirm   ：8文字以上,20文字以内・英数字のみ・Password入力欄と一致しているか
        //------------------------------------------------------
        //・暗号化処理→bcryptで解決
        //
        //
        //-------------------初期ユーザーの登録-------------------
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'mail' => 'Atlas01@mail.com',
            'password' => bcrypt(1000)],
            ['username' => 'Atlas二郎',
            'mail' => 'Atlas02@mail.com',
            'password' => bcrypt(2000)],
            ['username' => 'Atlas三郎',
            'mail' => 'Atlas03@mail.com',
            'password' => bcrypt(3000)],
            ['username' => 'Atlas四郎',
            'mail' => 'Atlas04@mail.com',
            'password' => bcrypt(4000)],
            ['username' => 'Atlas五郎',
            'mail' => 'Atlas05@mail.com',
            'password' => bcrypt(5000)]
        ]);
    }
}
