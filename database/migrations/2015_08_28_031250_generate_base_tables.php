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
            $table->string('url');
            $table->string('mime_type');
            $table->string('size');
            $table->timestamps();
        });

        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('image_id')->unsigned()->nullable();
            $table->boolean('is_admin')->default(false);
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
            $table->string('url_name')->unique();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->integer('age');
            $table->date('birthday');
            $table->timestamps();
        });

        // ContactTypes
        Schema::create('contact_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // Notes
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->timestamps();
        });

        Schema::create('note_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        
        // Contacts - ContactTypes Relationship
        Schema::create('contact_contact_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->integer('contact_type_id')->unsigned();
            $table->timestamps();
        });

        // Notes - Tags Relationship
        Schema::create('note_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('note_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamps();
        });


        //------- Setup the foreign key constraints on the tables. -----------------------
        // users
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('image_id')
                  ->references('id')->on('images');
        });

        // contacts
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('image_id')
                  ->references('id')->on('images');
        });

        // notes
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('contact_id')
                  ->references('id')->on('contacts')
                  ->onDelete('cascade');
            $table->foreign('type_id')
                  ->references('id')->on('note_types');
        });

        // notes_tags
        Schema::table('note_tag', function (Blueprint $table) {
            $table->foreign('note_id')
                  ->references('id')->on('notes')
                  ->onDelete('cascade');
            $table->foreign('tag_id')
                  ->references('id')->on('tags')
                  ->onDelete('cascade');
        });

        // contact_contact_types
        Schema::table('contact_contact_type', function (Blueprint $table) {
            $table->foreign('contact_id')
                  ->references('id')->on('contacts')
                  ->onDelete('cascade');
            $table->foreign('contact_type_id')
                  ->references('id')->on('contact_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('note_tag');
        Schema::drop('notes');
        Schema::drop('note_types');
        Schema::drop('contact_contact_type');
        Schema::drop('contacts');
        Schema::drop('contact_types');
        Schema::drop('users');
        Schema::drop('password_resets');
        Schema::drop('images');
        Schema::drop('tags');
    }
}
