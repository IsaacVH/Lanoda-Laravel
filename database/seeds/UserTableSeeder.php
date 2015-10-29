<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin_emails = ["isaac" => "isaac.vanh@gmail.com", "aaron" => "retteramj@gmail.com"];

        $deleted_row = DB::table('users')->where('id', 1)->delete();
        $deleted_row = DB::table('users')->where('email', $admin_emails['isaac'])->delete();
        DB::table('users')->insert([
            'id' => 1,
            'firstname' => 'Isaac',
            'lastname' => 'Van Houten',
            'is_admin' => true,
            'email' => $admin_emails['isaac'],
            'password' => bcrypt('the1saacvh'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $deleted_row = DB::table('users')->where('id', 2)->delete();
        $deleted_row = DB::table('users')->where('email', $admin_emails['aaron'])->delete();
        DB::table('users')->insert([
            'id' => 2,
            'firstname' => 'Aaron',
            'lastname' => 'Retter',
            'is_admin' => true,
            'email' => $admin_emails['aaron'],
            'password' => bcrypt('retter'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
