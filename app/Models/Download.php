<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date'];

    protected function d_gallery()
    {
        return $this->hasMany(Download_gallery::class, 'download_id');
    }
}
