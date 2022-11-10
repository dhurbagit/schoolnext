<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'publish_status', 'slug'];

    public function images()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }

    
}
