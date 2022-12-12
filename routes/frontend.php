<?php

// frontend route

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class, 'index'])->name('index');
Route::get('/album/{slug}', [FrontendController::class, 'gallery_images'])->name('images');
Route::get('newsevent-link/{slug}', [FrontendController::class, 'newsevent_single'])->name('newsevent.link');


//menu
Route::get('content/{title}', [FrontendController::class, 'page'])->name('page');
Route::get('test',function(){

    return view('test');
});

Route::get('ckeditor',function(){
    $view = view('test-ajax')->render();

    return response()->json(['view'=>$view]);
})->name('ckeditor');
Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');


