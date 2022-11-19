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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('after_banner_title')->nullable();
            $table->string('news_and_event_title')->nullable();
            $table->string('notice_board_title')->nullable();
            $table->string('Testimonial_title')->nullable();
            $table->string('testimonial_first_image')->nullable();
            $table->string('testimonial_second_image')->nullable();
            $table->string('gallery_title')->nullable();
            $table->string('logo')->nullable();
            $table->string('footer_image')->nullable();
            $table->string('address')->nullable();
            $table->string('Phone_one')->nullable();
            $table->string('Phone_two')->nullable();
            $table->string('Phone_three')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkin')->nullable();
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
