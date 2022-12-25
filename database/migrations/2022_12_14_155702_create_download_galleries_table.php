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
        Schema::create('download_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('download_id')->constrained('downloads')->onDelete('CASCADE');
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('file')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('download_galleries');
    }
};
