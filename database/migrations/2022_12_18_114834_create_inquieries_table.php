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
        Schema::create('inquieries', function (Blueprint $table) {
            $table->id();
            $table->string('reject_action')->nullable();
            $table->string('type')->nullable();
            $table->string('student_name')->nullable();
            $table->string('s_applied_grade')->nullable();
            $table->string('s_current_grade')->nullable();
            $table->string('gender')->nullable();
            $table->string('s_nationality')->nullable();
            $table->string('s_email')->nullable();
            $table->string('s_date_of_birth_bs')->nullable();
            $table->string('s_date_of_birth_ad')->nullable();
            $table->string('s_age')->nullable();
            $table->string('s_address')->nullable();
            $table->string('s_phone')->nullable();
            $table->string('f_name')->nullable();
            $table->string('f_mobile_no')->nullable();
            $table->string('f_email')->nullable();
            $table->string('f_occupation')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_mobile_no')->nullable();
            $table->string('m_email')->nullable();
            $table->string('m_occupation')->nullable();
            $table->string('l_local_guardian')->nullable();
            $table->string('l_mobile_no')->nullable();
            $table->string('l_email')->nullable();
            $table->string('l_occupation')->nullable();
            $table->string('p_school_name')->nullable();
            $table->string('p_address')->nullable();
            $table->string('p_grade')->nullable();
            $table->longText('p_description')->nullable();
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
        Schema::dropIfExists('inquieries');
    }
};
