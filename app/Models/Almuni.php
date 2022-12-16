<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almuni extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'date'];
    public function A_images()
    {
        return $this->hasMany(AlmuniGallery::class, 'almuni_id');
    }


}
