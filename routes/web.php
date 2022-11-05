<?php

use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('frontend.index');
});

Route::get('/admin', function(){
   return view('admin.layout.master');
});



Route::group(['prefix'=>'admin'], function(){

// sidebar route
Route::get('/manage-slider', [SliderController::class, 'index'])->name('manage-slider');
Route::get('/create-slider', [SliderController::class, 'view'])->name('create-slider');
Route::get('/create-gallery', [AlbumController::class, 'index'])->name('create-gallery');
Route::get('/manage-gallery', [AlbumController::class, 'view'])->name('manage-gallery');

// Slider
Route::post('/createSlider', [SliderController::class, 'store'])->name('createSlider.index');
Route::delete('/manage-slider/{id}', [SliderController::class, 'delete'])->name('delete.slider');
Route::get('/createSlider/{id}',[SliderController::class, 'edit'])->name('slider.edit');
Route::post('editSlider/{id}', [SliderController::class, 'update'])->name('editSlider.index');

// Gallery
Route::post('createAblum', [AlbumController::class, 'store'])->name('album.create');
Route::delete('albumdelete/{id}', [AlbumController::class, 'delete'])->name('album.delete');
Route::get('albumedit/{id}', [AlbumController::class, 'edit'])->name('album.edit');

// Testimonial
Route::ge('/manage-testimonial',[])->name('manage-testimonial');

});


