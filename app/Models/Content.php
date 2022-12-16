<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content_type', 'slug', 'description', 'description_one', 'publish_status', 'featured_image', 'external_link', 'banner_image'];

    public function c_images()
    {
        return $this->hasMany(ContentGallery::class, 'content_id');
    }

}
