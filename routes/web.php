<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ArchiveController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LanguageController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\TermsController;
use App\Models\SubCategory;
use App\Models\Subscriber;


// Front
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/language/switch', [LanguageController::class , 'switch_language'])->name('front_language');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/post/{id}', [PostController::class, 'detail'])->name('post');
    Route::get('/category/{id}', [SubCategoryController::class, 'index'])->name('category');
    Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');
    Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_form_submit');
    Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
    Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber_verify');
    Route::post('/archive', [ArchiveController::class, 'show'])->name('archive_show');
    Route::get('/archive/{year}/{month}', [ArchiveController::class, 'detail'])->name('archive_detail');
    Route::get('/tag/{tag_name}', [TagController::class, 'show'])->name('tag_posts_show');
    
});

/* Admin */
Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin')->middleware('admin:admin');
// Login System
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
// Admin Profile
Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
// Category
Route::get('/admin/category', [AdminCategoryController::class, 'show'])->name('admin_category_show')->middleware('admin:admin');
Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create')->middleware('admin:admin');
Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin_category_store');
Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit')->middleware('admin:admin');
Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');
Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete')->middleware('admin:admin');
// Sub Category
Route::get('/admin/sub-category', [AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create')->middleware('admin:admin');
Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');
Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::post('/admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');
// Post
Route::get('/admin/posts', [AdminPostController::class, 'show'])->name('admin_post_show')->middleware('admin:admin');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create')->middleware('admin:admin');
Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');
Route::get('/admin/post/tag/delete/{id}', [AdminPostController::class, 'delete_tag'])->name('admin_post_delete_tag')->middleware('admin:admin');
// Photo
Route::get('/admin/photos', [AdminPhotoController::class, 'show'])->name('admin_photo_show')->middleware('admin:admin');
Route::get('/admin/photo/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create')->middleware('admin:admin');
Route::post('/admin/photo/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
Route::get('/admin/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/photo/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
Route::get('/admin/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete')->middleware('admin:admin');
// Page
// --About
Route::get('/admin/page/about', [AdminPageController::class, 'about'])->name('admin_page_about')->middleware('admin:admin');
Route::post('/admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_about_update');
// --FAQ
Route::get('/admin/page/faq', [AdminPageController::class, 'faq'])->name('admin_faq_show')->middleware('admin:admin');
Route::post('/admin/page/fq/update', [AdminPageController::class, 'faq_update'])->name('admin_faq_update');
// --Terms
Route::get('/admin/page/terms', [AdminPageController::class, 'terms'])->name('admin_terms_show')->middleware('admin:admin');
Route::post('/admin/page/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_terms_update');
// --Privacy
Route::get('/admin/page/privacy', [AdminPageController::class, 'privacy'])->name('admin_privacy_show')->middleware('admin:admin');
Route::post('/admin/page/privacy/update', [AdminPageController::class, 'privacy_update'])->name('admin_privacy_update');
// --Contact
Route::get('/admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_contact_show')->middleware('admin:admin');
Route::post('/admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_contact_update');
// Subscriber
Route::get('/admin/subscribers', [AdminSubscriberController::class, 'show_all'])->name('admin_subscribers')->middleware('admin:admin');
Route::get('/admin/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');
Route::post('/admin/subscriber/send-email/submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit');
Route::get('/admin/subscriber/delete/{id}', [AdminSubscriberController::class, 'subscriber_delete'])->name('admin_subscriber_delete');
// Setting
Route::get('/admin/setting', [AdminSettingController::class, 'index'])->name('admin_setting')->middleware('admin:admin');
Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');