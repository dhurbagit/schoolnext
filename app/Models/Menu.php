<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public const SHOWON  = [
        'header' => '1',
        'footer' => '2',
        'header_footer' => '3',
    ];

    const contentType  = ['home','page','about','contact','blog','gallery'];

    protected $fillable = [
        'name',
        'category_slug',
        'position',
        'main_child',
        'parent_id',
        'header_footer',
        'banner_image',
        'image',
        'page_title',
        'title_slug',
        'content',
        'external_link',
        'publish_status',

    ];

    public function childrens()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc');
    }

    public function children(){
        return $this->hasMany(Menu::class, 'parent_id')->where('publish_status', 1)->orderBy('position', 'asc');
    }
}
