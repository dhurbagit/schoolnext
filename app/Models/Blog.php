<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['page_title', 'page_description', 'title', 'image', 'date', 'inner_description', 'designation','type'];
}
