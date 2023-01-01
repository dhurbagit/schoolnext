<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MvoController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AlmuniController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\InquieryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\TeammemberController;
use App\Http\Controllers\Admin\NoticeboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ThemeOptionController;
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



Route::get('/admin', [UsersController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('admin-login', [UsersController::class, 'LoginUser'])->name('admin-login');
Route::get('admin-logout', [UsersController::class, 'LogoutUser'])->name('admin.logout');




//Admin route
Route::group(['prefix' => 'admin', 'middleware' => ['isLoggedIn']], function () {


    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.view');
    //inquiry and online form
    Route::get('inquiry-lists', [DashboardController::class, 'view'])->name('inquiry.lists');
    Route::get('inquiry_next-lists', [DashboardController::class, 'view_inquiry_next'])->name('inquiry_next.lists');
    Route::delete('inquiry_next-delete/{id}', [InquieryController::class, 'delete_inquiry_next'])->name('inquiry_next.delete');
    Route::get('contactus_next-lists', [InquieryController::class, 'contactUs_view'])->name('contactus_next.lists');
    Route::delete('contactUs-delete/{id}', [InquieryController::class, 'delete_contactUs'])->name('contactUs.delete');
    Route::post('contactUs-reply/{id}', [InquieryController::class, 'email_reply'])->name('contactUs.reply');
    Route::post('inquiry-reply/{id}', [InquieryController::class, 'inquiry_email_reply'])->name('inquiry.reply');
    Route::get('student-Info/{id}', [InquieryController::class, 'studentDetail'])->name('studentInfo');
    Route::delete('onlineform/{id}',[InquieryController::class, 'delete_record'] )->name('onlineform.delete');


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
    Route::get('chairman-message',[MessageController::class, 'index_chairman'])->name('chairman.message');
    Route::get('principal-message',[MessageController::class, 'index_principal'])->name('principal.message');
    Route::get('theme-option', [ThemeOptionController::class, 'index'])->name('theme.option');


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
    Route::post('whyschool-update/{id}', [FaqController::class, 'update'])->name('whyschool.update');
    Route::post('faq-save', [FaqController::class, 'save'])->name('faq.save');
    Route::delete('faq-delete/{id}', [FaqController::class, 'faq_delete'])->name('faq.delete');
    Route::put('faq-update/{id}', [FaqController::class, 'faq_update'])->name('faq.update');

    //chairman
    Route::post('chairman-save', [MessageController::class, 'store'])->name('chairman.save');
    Route::put('chairman-update', [MessageController::class, 'update'])->name('chairman.update');
    Route::post('principal-save', [MessageController::class, 'save'])->name('principal.save');
    Route::put('principal-update', [MessageController::class, 'principal_update'])->name('principal.update');

    // general staff
    Route::get('general-staff', [TeammemberController::class, 'view'])->name('general.staff');
    Route::get('create-staff', [TeammemberController::class, 'show'])->name('general.staff.create');
    Route::post('save-staff', [TeammemberController::class, 'store'])->name('general.staff.save');
    Route::delete('delete-staff/{id}', [TeammemberController::class, 'delete'])->name('generalstaff.delete');
    Route::get('general-edit/{id}', [TeammemberController::class, 'edit_general'])->name('general.edit');
    Route::put('general-update/{id}', [TeammemberController::class, 'update_general'])->name('general.staff.update');

    // MANAGEMENT STAFF
    Route::get('management-staff', [TeammemberController::class, 'view_management'])->name('management.staff');
    Route::get('managementcreate-staff', [TeammemberController::class, 'management_show'])->name('management.staff.create');
    Route::post('save-management', [TeammemberController::class, 'management_store'])->name('management.staff.save');
    Route::get('management-edit/{id}', [TeammemberController::class, 'edit_management'])->name('management.edit');
    Route::put('management-update/{id}', [TeammemberController::class, 'update_management'])->name('management.staff.update');

    //youtube video
    Route::get('youtube_video', [VideoController::class, 'view'])->name('youtube.video');
    Route::get('create-youtube', [VideoController::class, 'youtube_form'])->name('youtube.create');
    Route::post('save-youtube', [VideoController::class, 'save_youtube'])->name('youtube.save');
    Route::delete('youtube-delete/{id}', [VideoController::class, 'delete_youtube'])->name('youtube.delete');
    Route::get('youtube-edit/{id}', [VideoController::class,'edit_youtubeForm'])->name('youtube.edit');
    Route::put('youtube-update/{id}', [VideoController::class, 'update_youtube'])->name('youtube.update');

    //school life
    Route::get('school-life', [ContentController::class,'index'])->name('school.life');

    Route::get('schoollife-view', [ContentController::class, 'view'])->name('schoollife.create');
    Route::post('schoollife-save', [ContentController::class, 'store'])->name('schoollife.save');
    Route::delete('schoollife-delete/{id}', [ContentController::class, 'delete'])->name('schoollife.delete');
    Route::get('schoollife-edit/{id}', [ContentController::class, 'edit'])->name('schoollife.edit');
    Route::put('schoollife-update/{id}', [ContentController::class, 'update'])->name('schoollife.update');
    Route::get('contentImage-delete/{id}', [ContentController::class, 'delete_contentImage'])->name('delete.contentImage');

    //blogs
    Route::get('blog-view', [BlogController::class, 'view'])->name('blog.view');
    Route::get('blog-create', [BlogController::class, 'view_form'])->name('blog.create');
    Route::post('blog-save', [BlogController::class, 'store'])->name('blog.save');
    Route::delete('blog-delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    Route::get('blog-edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog-update/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::post('blog-title-save', [BlogController::class, 'save'])->name('blog.title.save');
    Route::post('blog-title-update/{id}', [BlogController::class, 'blog_title_update'])->name('blog.title.update');

   //almuni

    Route::get('Almuni-view', [AlmuniController::class, 'view'])->name('Almuni.view');
    Route::get('Almuni-create', [AlmuniController::class, 'view_form'])->name('almuni.create');
    Route::post('Almuni-save', [AlmuniController::class, 'save'])->name('almuni.save');
    Route::delete('Almuni-delete/{id}', [AlmuniController::class, 'delete'])->name('almuni.delete');
    Route::get('Almuni-edit/{id}', [AlmuniController::class, 'edit'])->name('almuni.edit');
    Route::put('Almuni-update/{id}', [AlmuniController::class, 'update'])->name('almuni.update');
    //
    Route::post('Almuni-gallery-save', [AlmuniController::class, 'gallery_save'])->name('almuni.gallery.save');
    Route::delete('Almuni-gallery-delete/{id}', [AlmuniController::class, 'almuni_gallery_delete'])->name('almuniGallery.remove');
    Route::get('Almuni-gallery-edit/{id}', [AlmuniController::class, 'almuni_gallery_edit'])->name('almuniGallery.edit');
    Route::put('Almuni-gallery-update/{id}', [AlmuniController::class, 'gallery_update'])->name('almuni.gallery.update');

    //downloads
    Route::get('download-view', [DownloadController::class, 'index'])->name('download.view');
    Route::post('download-save', [DownloadController::class, 'store'])->name('download.save');
    Route::delete('download-delete/{id}', [DownloadController::class, 'destroy'])->name('download.delete');
    Route::get('download-edit/{id}', [DownloadController::class, 'edit'])->name('download.edit');
    Route::put('download-update/{id}', [DownloadController::class, 'update'])->name('download.update');

    Route::post('downloadGallery-save', [DownloadController::class, 'g_downloads_store'])->name('g_downloads.save');
    Route::delete('downloadGallery-delete/{id}', [DownloadController::class, 'g_downloads_delete'])->name('g_downloads.delete');

    Route::get('g_downloads/{id}', [DownloadController::class, 'g_downloads_edit'])->name('g_downloads.edit');
    Route::put('g_downloads_edit/{id}', [DownloadController::class, 'g_downloads_update'])->name('g_downloads.update');

    Route::post('themeOption-save', [ThemeOptionController::class, 'store'])->name('themeOption.save');
    Route::put('themeOption-update/{id}', [ThemeOptionController::class, 'update'])->name('themeOption.update');


});





