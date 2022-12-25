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
        Schema::create('almuni_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('almuni_id')->constrained('almunis')->onDelete('CASCADE');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('batch')->nullable();
            $table->string('percentage')->nullable();
            $table->string('class')->nullable();
            $table->string('hide')->nullable();
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
        Schema::dropIfExists('almuni_galleries');
    }
};
