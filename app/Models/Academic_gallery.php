<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic_gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'images', 'academic_id'];
}
