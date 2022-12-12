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
        Schema::create('beyond_academics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_category_slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('hide')->nullable();
            $table->string('feature_image')->nullable();
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
        Schema::dropIfExists('beyond_academics');
    }
};
