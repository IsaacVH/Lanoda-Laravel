<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Setup the foreign key constraints on the tables.
            
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('image_id')
                  ->references('id')->on('images')
                  ->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('image_id')
                  ->references('id')->on('images')
                  ->onDelete('cascade');
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('contact_id')
                  ->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
