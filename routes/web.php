<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MvoController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\NoticeboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\BeyondAcademicController;

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



Route::get('/admin', function () {
    return view('admin.layout.master');
});

//Admin route
Route::group(['prefix' => 'admin'], function () {

    // sidebar route
    Route::get('/manage-slider', [SliderController::class, 'index'])->name('manage-slider');
    Route::get('/create-slider', [SliderController::class, 'view'])->name('create-slider');
    Route::get('/create-gallery', [AlbumController::class, 'index'])->name('create-gallery');
    Route::get('/manage-gallery', [AlbumController::class, 'view'])->name('manage-gallery');
    Route::get('/create-testimonial', [TestimonialController::class, 'index'])->name('create-testimonial');
    Route::get('/manage-testimonial', [TestimonialController::class, 'view'])->name('manage-testimonial');
    Route::get('/about-view', [AboutController::class, 'view'])->name('about.view');
    Route::get('newsEvent-create/', [NewsEventController::class, 'index'])->name('newsEvent.create');
    Route::get('create-notice', [NoticeboardController::class, 'index'])->name('create.notice');
    Route::get('manage-notice/', [NoticeboardController::class, 'view'])->name('manage.notice');
    Route::get('create-client/', [ClientController::class, 'index'])->name('create.client');
    Route::get('manage-client/', [ClientController::class, 'view'])->name('manage.client');
    Route::get('create-counter', [CounterController::class, 'index'])->name('create.counter');
    Route::get('manage-counter', [CounterController::class, 'view'])->name('manage.counter');
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::get('menu-view', [MenuController::class, 'index'])->name('menu.view');
    Route::get('create-banner_video', [VideoController::class, 'view_form'])->name('create-banner_video');
    Route::get('create-academic', [BeyondAcademicController::class, 'index'])->name('create.academic');
    Route::get('manage-academic', [BeyondAcademicController::class, 'view'])->name('manage.academic');
    Route::get('create-faq', [FaqController::class, 'index'])->name('create.faq');
    Route::get('manage-faq', [FaqController::class, 'view'])->name('manage.faq');

    // Slider
    Route::post('/createSlider', [SliderController::class, 'store'])->name('createSlider.index');
    Route::delete('/manage-slider/{id}', [SliderController::class, 'delete'])->name('delete.slider');
    Route::get('/createSlider/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('editSlider/{id}', [SliderController::class, 'update'])->name('editSlider.index');

    //video
    Route::post('video-save', [VideoController::class, 'save_video'])->name('video.save');
    Route::put('video-update/{id}', [VideoController::class, 'update_video'])->name('video.update');

    // Gallery
    Route::post('createAblum', [AlbumController::class, 'store'])->name('album.create');
    Route::delete('albumdelete/{id}', [AlbumController::class, 'delete'])->name('album.delete');
    Route::get('albumedit/{id}', [AlbumController::class, 'edit'])->name('album.edit');
    Route::put('update-album/{id}', [AlbumController::class, 'update'])->name('update.album');
    Route::get('gallery-delete/{id}', [AlbumController::class, 'gallery_delete'])->name('gallery.delete');

    // Testimonial
    Route::post('/testimonial-create', [TestimonialController::class, 'store'])->name('testimonial.create');
    Route::delete('testimonial-delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    Route::get('testimonial-edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('testimonial-update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');

    // About us
    Route::post('about-create', [AboutController::class, 'store'])->name('about.create');
    Route::put('about-update/{id}', [AboutController::class, 'update'])->name('about.update');

    //Mvo
    Route::get('Manage-mvo', [MvoController::class, 'view_list'])->name('Manage.mvo');
    Route::post('mvo-create', [MvoController::class, 'store'])->name('mvo.create');
    Route::delete('mvo-delete/{id}', [MvoController::class, 'delete'])->name('mvo.delete');
    Route::get('mvo-edit/{id}', [MvoController::class, 'edit'])->name('mvo.edit');
    Route::get('mvo-view', [MvoController::class, 'view'])->name('mvo.view');
    Route::put('mvo-update/{id}', [MvoController::class, 'update'])->name('mvo.update');

    //news and events
    Route::post('newsevent-create/', [NewsEventController::class, 'store'])->name('newsevent.create');
    Route::get('newsEvent-manage', [NewsEventController::class, 'view_list'])->name('newsEvent.manage');
    Route::delete('news_event_delete/{id}', [NewsEventController::class, 'delete'])->name('news.event.delete');
    Route::get('newsevent-edit/{id}', [NewsEventController::class, 'edit'])->name('newsevent.edit');
    Route::put('newsevent-update/{id}', [NewsEventController::class, 'update'])->name('newsevent.update');

    //notice board
    Route::post('noticeboard-create', [NoticeboardController::class, 'store'])->name('noticeboard.create');
    Route::delete('delete-noticeboard/{id}', [NoticeboardController::class, 'delete'])->name('delete.noticeboard');
    Route::get('noticeboard-edit/{id}', [NoticeboardController::class, 'edit'])->name('noticeboard.edit');
    Route::put('noticeboard-update/{id}', [NoticeboardController::class, 'update'])->name('noticeboard.update');

    //our client
    Route::post('client-save', [ClientController::class, 'store'])->name('client.save');
    Route::delete('client-delete/{id}', [ClientController::class, 'delete'])->name('client.delete');
    Route::get('client-edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('client-update/{id}', [ClientController::class, 'update'])->name('client.update');

    //counter
    Route::post('counter-create', [CounterController::class, 'store'])->name('counter.create');
    Route::delete('counter-delete/{id}', [CounterController::class, 'delete'])->name('counter.delete');
    Route::get('counter-edit/{id}', [CounterController::class, 'edit'])->name('counter.edit');
    Route::put('counter-update/{id}', [CounterController::class, 'update'])->name('counter.update');

    //setting
    Route::post('setting-save', [SettingController::class, 'store'])->name('setting.save');
    Route::put('setting-update/{id}', [SettingController::class, 'update'])->name('setting.update');

    //Menu
    Route::get('menu-create', [MenuController::class, 'view'])->name('menu.create');
    Route::post('menu-store', [MenuController::class, 'store'])->name('menu.store');
    Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])->name('updateMenuOrder');
    Route::delete('menu-parent_delte/{id}', [MenuController::class, 'delete'])->name('menu.delete');
    Route::get('menu-edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu-update/{id}', [MenuController::class, 'update'])->name('menu.update');

    //academic
    Route::post('academic-save', [BeyondAcademicController::class, 'store'])->name('academic.save');
    Route::delete('academic-delete/{id}', [BeyondAcademicController::class, 'delete'])->name('academic.delete');
    Route::get('academic-update/{id}', [BeyondAcademicController::class, 'update_list'])->name('academic.update');
    Route::put('academic-update/{id}', [BeyondAcademicController::class, 'update'])->name('academic.update');
    Route::any('beyondGallery-delete/{id}', [BeyondAcademicController::class, 'beyondGallery_delete'])->name('beyondGallery.delete');

    //faq
    Route::post('whyschool-save', [FaqController::class, 'store'])->name('whyschool.save');
    Route::post('faq-save', [FaqController::class, 'save'])->name('faq.save');
    Route::delete('faq-delete/{id}', [FaqController::class, 'faq_delete'])->name('faq.delete');
    Route::get('faq-edit/{id}', [FaqController::class, 'faq_edit'])->name('faq.edit');

});





