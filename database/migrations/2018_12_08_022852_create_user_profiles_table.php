<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');        
            $table->string('occupation');            
            $table->string('short_message');
            $table->string('profile_pic');
            $table->string('background_image');
            $table->mediumText('short_bio');
            $table->mediumText('skills');
            $table->mediumText('career_stats');
            $table->mediumText('tools');
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
        Schema::dropIfExists('user_profiles');
    }
}
