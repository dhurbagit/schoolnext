<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeyondAcademic extends Model
{
    use HasFactory;

    protected $fillable = ['hide', 'title', 'title_category_slug', 'description' ,'feature_image'];

    public function text_title()
    {
        return $this->hasMany(Academic_gallery::class, 'academic_id');
    }
}
