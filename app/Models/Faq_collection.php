<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq_collection extends Model
{
    use HasFactory;
    protected $fillable = ['faq_head', 'faq_detail', 'slug', 'hide', 'faq_id'];
}
