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
        Schema::create('pop_modals', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('modal_title')->nullable();
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->string('hide')->nullable();
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
        Schema::dropIfExists('pop_modals');
    }
};
