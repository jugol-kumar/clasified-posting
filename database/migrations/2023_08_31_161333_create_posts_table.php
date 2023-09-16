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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id');
            $table->foreignId('category_id')->nullable(); //->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_category_id')->nullable();
            $table->foreignId('child_category_id')->nullable();
            $table->foreignId('division_id');
            $table->foreignId('district_id');
            $table->foreignId('upazila_id');
            $table->double('price');
            $table->string('address')->nullable();
            $table->string('condition')->nullable();
            $table->text('map')->nullable();
            $table->text('short_details')->nullable();
            $table->longText('full_details')->nullable();
            $table->json('images');
            $table->enum('status', ['Approved', 'Pending', 'Reject', 'Delete'])->default('Pending');
            $table->enum('position', ['Featured', 'Top'])->nullable();
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
        Schema::dropIfExists('posts');
    }
};
