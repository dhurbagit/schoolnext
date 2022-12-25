<?php

// frontend route

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InquieryController;
use App\Http\Controllers\Frontend\FrontendController;

Route::get('/',[FrontendController::class, 'index'])->name('index');
Route::get('/album/{slug}', [FrontendController::class, 'gallery_images'])->name('images');
Route::get('newsevent-link/{slug}', [FrontendController::class, 'newsevent_single'])->name('newsevent.link');
Route::get('almuni-link/{slug}', [FrontendController::class, 'almuni_single'])->name('almuni.link');
Route::get('downloads-link/{id}', [FrontendController::class, 'download_childdata'])->name('downloads.fetchChild');
Route::post('online-save', [InquieryController::class, 'save_inquiry'])->name('inquiry.save');
Route::post('inquiry-save', [InquieryController::class, 'save_inquiry_next'])->name('inquiry_next.save');
Route::post('contactus-save', [InquieryController::class, 'save_contactus'])->name('contactus.save');


Route::get('inquiryForm-save', [InquieryController::class,'inquiry_formShow'])->name('inquiryForm.open');
//menu
Route::get('content/{title}', [FrontendController::class, 'page'])->name('page');
Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');

// Route::get('test',function(){

//     return view('test');
// });

// Route::get('ckeditor',function(){
//     $view = view('test-ajax')->render();

//     return response()->json(['view'=>$view]);
// })->name('ckeditor');


