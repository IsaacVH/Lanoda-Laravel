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

        $contact_types = [
            'general' => [
                'id' => '1',
                'name' => 'Friends',
                'description' => 'Someone who is a Friend',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'likedislike' => [
                'id' => '2',
                'name' => 'Family',
                'description' => 'Someone who is a part of your Family.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'memory' => [
                'id' => '3',
                'name' => 'Work',
                'description' => 'Someone you Work with.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'reminder' => [
                'id' => '4',
                'name' => 'School',
                'description' => 'Someone you go to School with.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->command->info('Creating Contact types...');
        foreach($contact_types as $current_type) {
            $existing_contacttype = DB::table('contact_types')->where('id', $current_type['id']);
            if($existing_contacttype->count() > 0) {
                $existing_contacttype->update($current_type);
            } else {
                DB::table('contact_types')->insert($current_type);
            }
        }
    }
}
