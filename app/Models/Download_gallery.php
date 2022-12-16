<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download_gallery extends Model
{
    use HasFactory;

    protected $fillable = ['download_id', 'image', 'title', 'file', 'date'];
}
