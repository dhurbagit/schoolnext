<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageFrom extends Model
{
    use HasFactory;

    protected $fillable = ['message_title', 'image', 'name', 'description', 'type', 'slug'];
}
