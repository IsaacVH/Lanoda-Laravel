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
        DB::table('users')->insert([
            'firstname' => 'Isaac',
            'lastname' => 'Van Houten',
            'is_admin' => true,
            'email' => 'isaac.vanh@gmail.com',
            'password' => bcrypt('the1saacvh'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
