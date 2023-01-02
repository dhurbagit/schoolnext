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
        'mega_menu' => '4',
        'top_ribbon' => '5',
        'feature_links' => '6',
        'header_feature' => '7',
        'footer_ribbon' => '8',
        'feature_ribbon' => '9',
    ];

    const contentType  = ['home','page', 'layout page', 'beyond academic' ,'about','contact','Blogs','gallery','news events',
                            'chairman message',
                            'principal message',
                            'management team',
                            'teacher and staff',
                            'Video',
                            'Pass Out Student',
                            'Download files',
                            'FAQs (& why school)',
                            'Contact Us',
                            'School Life',

                            ];

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
        'mega_menu',

    ];

    public function childrens()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc');
    }

    public function children(){
        return $this->hasMany(Menu::class, 'parent_id')->where('publish_status', 1)->orderBy('position', 'asc');
    }
}
