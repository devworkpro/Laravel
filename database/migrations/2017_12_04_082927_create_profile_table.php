<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('User_id');
            $table->string('First Name');
            $table->string('Last Name');
            $table->smallInteger('Phone Number')->unique();
            $table->smallInteger('Mobile Number')->unique();
            $table->string('Address',100);
            $table->string('State');
            $table->string('City');
            $table->string('Zip');
            $table->string('Profile Pic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
