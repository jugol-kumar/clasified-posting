<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('about')->nullable();
            $table->date('dob')->nullable();
            $table->enum('role', ['recruiters', 'seekers', 'admin'])->default('seekers');
            $table->string('gender', 191)->nullable();
            $table->string('married_status', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('fb_url', 191)->nullable();
            $table->string('twitter_url', 191)->nullable();
            $table->string('youtube_url', 191)->nullable();
            $table->string('linkedin_url', 191)->nullable();
            $table->string('zoom_email', 200)->nullable();
            $table->text('jwt_token')->nullable();
            $table->integer('sms_otp')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(1);
            $table->integer('max_post')->default(5);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
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
};
