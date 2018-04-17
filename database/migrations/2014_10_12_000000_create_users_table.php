<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('role_name');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
         array(
             'username' => "SuperAdmin",
             'email' => 'admin@hotmail.com',
             'name' => "Super Admin",
             'password' => bcrypt('password'),
             'role_name' => 'Super Admin',
         )
       );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
