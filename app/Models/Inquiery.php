<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiery extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'reject_action',
        'student_name',
        's_applied_grade',
        's_current_grade',
        'gender',
        's_nationality',
        's_email',
        's_date_of_birth_bs',
        's_date_of_birth_ad',
        's_age',
        's_address',
        's_phone',
        'f_name',
        'f_mobile_no',
        'f_email',
        'f_occupation',
        'm_name',
        'm_mobile_no',
        'm_email',
        'm_occupation',
        'l_local_guardian',
        'l_mobile_no',
        'l_email',
        'l_occupation',
        'p_school_name',
        'p_address',
        'p_grade',
        'p_description',
        's_image'];

        public function EmailLink(){
            return $this->hasMany(EmailMessage::class, 'inquieries_id');
        }
}
