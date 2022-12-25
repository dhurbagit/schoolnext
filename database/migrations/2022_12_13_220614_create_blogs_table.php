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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->longText('page_description')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('date')->nullable();
            $table->longText('inner_description')->nullable();
            $table->string('designation')->nullable();
            $table->boolean('type')->default(0);
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
        Schema::dropIfExists('blogs');
    }
};
