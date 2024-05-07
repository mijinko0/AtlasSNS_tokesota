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
        //初期ユーザーの登録（登録自体は問題ないけどPWの暗号化処理わからん）
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'mail' => 'Atlas01@mail.com',
            'password' => 1000],
            ['username' => 'Atlas二郎',
            'mail' => 'Atlas02@mail.com',
            'password' => 2000],
            ['username' => 'Atlas三郎',
            'mail' => 'Atlas03@mail.com',
            'password' => 3000],
            ['username' => 'Atlas四郎',
            'mail' => 'Atlas04@mail.com',
            'password' => 4000],
            ['username' => 'Atlas五郎',
            'mail' => 'Atlas05@mail.com',
            'password' => 5000]
        ]);
    }
}
