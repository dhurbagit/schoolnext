<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teammember extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'heading_one', 'heading_two', 'image', 'description', 'type', 'designation'];
}
