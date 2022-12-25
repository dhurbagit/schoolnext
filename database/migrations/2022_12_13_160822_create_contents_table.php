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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content_type')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_one')->nullable();
            $table->boolean('publish_status')->default(0)->nullable();
            $table->string('featured_image')->nullable();
            $table->string('external_link')->nullable();
            $table->string('banner_image')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('contents');
    }
};
