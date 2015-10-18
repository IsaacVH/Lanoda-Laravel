<?php

use Illuminate\Database\Seeder;

class ContactTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_types')->insert([
            'id' => '1',
            'name' => 'Friends',
            'description' => 'Someone who is a Friend',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('contact_types')->insert([
            'id' => '2',
            'name' => 'Family',
            'description' => 'Someone who is a part of your Family.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('contact_types')->insert([
            'id' => '3',
            'name' => 'Work',
            'description' => 'Someone you Work with.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('contact_types')->insert([
            'id' => '4'
            'name' => 'School',
            'description' => 'Someone you go to School with.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
