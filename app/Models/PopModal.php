<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopModal extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'modal_title', 'link', 'file', 'hide'];
}
