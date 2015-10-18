<?php

use Illuminate\Database\Seeder;

class NoteTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('note_types')->insert([
            'id' => '1',
            'name' => 'General',
            'description' => 'A general note.',
            'icon' => 'bookmark',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'id' => '2',
            'name' => 'Like/Dislike',
            'description' => 'A note detailing a like/dislike.',
            'icon' => 'thumbs_up_down',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'id' => '3',
            'name' => 'Memory',
            'description' => 'A note describing some memory.',
            'icon' => 'memory',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'id' => '4',
            'name' => 'Reminder',
            'description' => 'A reminder for some event or fact.',
            'icon' => 'assignment_turned_in',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'id' => '5',
            'name' => 'Photo',
            'description' => 'A photo for the contact.',
            'icon' => 'photo_camera',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
