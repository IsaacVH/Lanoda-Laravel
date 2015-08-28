<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GenerateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tags
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('color');
            $table->timestamps();
        });

        // Images
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('file_url');
            $table->timestamps();
        });

        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('image_id')->unsigned()->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Password_Resets
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });

        // Contacts
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('image_id')->unsigned()->nullable();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('address');
            $table->date('birthday');
            $table->timestamps();
        });

        // Notes
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->timestamps();
        });


        //---- Setup the foreign key constraints on the tables. -----------------------
        // users
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('image_id')
                  ->references('id')->on('images')
                  ->onDelete('cascade');
        });

        // contacts
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('image_id')
                  ->references('id')->on('images')
                  ->onDelete('cascade');
        });

        // notes
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
        Schema::drop('notes');
        Schema::drop('contacts');
        Schema::drop('users');
        Schema::drop('password_resets');
        Schema::drop('images');
        Schema::drop('tags');
    }
}
