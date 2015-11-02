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
        $note_types = [
            'general' => [
                'id' => '1',
                'name' => 'General',
                'description' => 'A general note.',
                'icon' => 'bookmark',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'likedislike' => [
                'id' => '2',
                'name' => 'Like/Dislike',
                'description' => 'A note detailing a like/dislike.',
                'icon' => 'thumbs_up_down',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'memory' => [
                'id' => '3',
                'name' => 'Memory',
                'description' => 'A note describing some memory.',
                'icon' => 'memory',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'reminder' => [
                'id' => '4',
                'name' => 'Reminder',
                'description' => 'A reminder for some event or fact.',
                'icon' => 'assignment_turned_in',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'photo' => [
                'id' => '5',
                'name' => 'Photo',
                'description' => 'A photo for the contact.',
                'icon' => 'photo_camera',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->command->info('Creating note types...');
        foreach($note_types as $current_type) {
            $existing_notetype = DB::table('note_types')->where('id', $current_type['id']);
            if($existing_notetype->count() > 0) {
                $existing_notetype->update($current_type);
            } else {
                DB::table('note_types')->insert($current_type);
            }
        }

    }
}
