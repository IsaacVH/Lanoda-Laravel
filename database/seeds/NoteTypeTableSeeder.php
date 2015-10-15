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
            'name' => 'General',
            'description' => 'A general note.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'name' => 'Like/Dislike',
            'description' => 'A note detailing a like/dislike.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'name' => 'Memory',
            'description' => 'A note describing some memory.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'name' => 'Reminder',
            'description' => 'A reminder for some event or fact.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('note_types')->insert([
            'name' => 'Photo',
            'description' => 'A photo for the contact.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
