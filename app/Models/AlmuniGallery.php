<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmuniGallery extends Model
{
    protected $fillable = ['almuni_id','image', 'name', 'batch', 'percentage', 'class', 'hide'];
    use HasFactory;


    public function alumni(){
        return $this->belongsTo(Alumni::class,'almuni_id','id');
    }
}
