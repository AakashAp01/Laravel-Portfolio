<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\Web\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Guest routes grouped with 'admin' prefix and middleware
Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('loginPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});


// Admin routes grouped with 'admin' prefix and middleware
Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth']], function () {

    //logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //profile
    Route::post('change-password', [UserController::class, 'changePassword'])->name('changePassword');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('update-Profile', [UserController::class, 'updateProfile'])->name('updateProfile');

    //setttings
    Route::get('setting', [SettingController::class, 'setting'])->name('setting');
    Route::post('settings-logo', [SettingController::class, 'storeLogo'])->name('storeLogo');
    Route::post('settings-favicon', [SettingController::class, 'storeFavicon'])->name('storeFavicon');
    Route::post('settings-about-profile', [SettingController::class, 'storeAboutProfile'])->name('storeAboutProfile');
    Route::post('settings-font-style', [SettingController::class, 'fontStyle'])->name('fontStyle');
    Route::post('settings-social-link', [SettingController::class, 'storeSocialLinks'])->name('storeSocialLinks');
    Route::post('settings-about-content', [SettingController::class, 'storeAboutContent'])->name('storeAboutContent');
    Route::post('settings-resume', [SettingController::class, 'resume'])->name('resume');
    Route::post('settings-apikey', [SettingController::class, 'storeApis'])->name('storeApis');
    Route::post('settings-email-credentials', [SettingController::class, 'storeEmailCredentials'])->name('storeEmailCredentials');
    Route::get('test-mail-send', [EmailController::class, 'sendTestEmail'])->name('sendTestEmail');
    Route::post('mail-send', [EmailController::class, 'sendEmail'])->name('sendEmail');

    //contact-me
    Route::get('contacts', [ContactMeController::class, 'contacts'])->name('contacts');
    Route::get('contacts-delete/{id}', [ContactMeController::class, 'deleteContact'])->name('deleteContact');

    //projects
    Route::get('add-project', [ProjectController::class, 'addProject'])->name('add-project');
    Route::post('store-project', [ProjectController::class, 'storeProject'])->name('store-project');
    Route::get('projects', [ProjectController::class, 'projects'])->name('projects');
    Route::get('delete-project/{id}', [ProjectController::class, 'deleteProject'])->name('delete-project');
    Route::get('edit-projects/{id}', [ProjectController::class, 'editProject'])->name('edit-project');
    Route::post('update-projects/{id}', [ProjectController::class, 'updateProject'])->name('update-project');


    //email templates
    Route::get('email-templates', [EmailController::class, 'emailTemplate'])->name('email-template');
    Route::get('add-templates', [EmailController::class, 'addTemplate'])->name('add-template');
    Route::post('store-template', [EmailController::class, 'storeTemplate'])->name('store-template');
    Route::get('edit-template/{id}', [EmailController::class, 'editTemplate'])->name('edit-template');
    Route::post('update-template/{id}', [EmailController::class, 'updateTemplate'])->name('update-template');
    Route::post('status-template', [EmailController::class, 'templateStatus'])->name('status-template');
    Route::get('delete-templates/{id}', [EmailController::class, 'deleteTemplate'])->name('delete-template');

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //users
    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::get('delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');

    //chat
    Route::get('chat/{id}', [UserController::class, 'chat'])->name('chat');

    //website
    Route::get('website', [DashboardController::class, 'website'])->name('website');

    //blog
    Route::get('blog', [BlogController::class, 'blog'])->name('blog');
    Route::post('blog-status', [BlogController::class, 'blogStatus'])->name('blogStatus');
    Route::get('blog-delete/{id}', [BlogController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('add-blog', [BlogController::class, 'addBlog'])->name('addBlog');
    Route::post('store-blog', [BlogController::class, 'storeBlog'])->name('storeBlog');
    Route::get('edit-blog/{id}', [BlogController::class, 'editBlog'])->name('editBlog');
    Route::post('update-blog/{id}', [BlogController::class, 'updateBlog'])->name('updateBlog');

    //blog categories
    Route::post('blog-cat-status', [BlogController::class, 'blogCatStatus'])->name('blogCatStatus');
    Route::post('blog-cat-add', [BlogController::class, 'addBlogCategory'])->name('addBlogCategory');
    Route::get('blog-cat-delete/{id}', [BlogController::class, 'deleteBlogCat'])->name('deleteBlogCat');
});

// Web routes grouped with 'web' prefix and middleware webguest
Route::group(['as' => 'web.'], function () {

    Route::get('', [IndexController::class, 'index'])->name('index');
    Route::get('about-me', [IndexController::class, 'aboutMe'])->name('aboutMe');
    Route::get('skills', [IndexController::class, 'skills'])->name('skills');

    Route::get('projects', [IndexController::class, 'projects'])->name('projects');
    Route::get('color-clash', [IndexController::class, 'project01'])->name('project01');

    Route::post('store-contact-me', [ContactMeController::class, 'storeContactMe'])->name('storeContactMe');
    Route::get('contact-me', [ContactMeController::class, 'contactMe'])->name('contactMe');


    Route::get('blog', [IndexController::class, 'blog'])->name('blog');
    Route::get('get-blogs/{cat_id}', [IndexController::class, 'getBlogs'])->name('getBlogs');
    Route::get('like-blogs/{blog_id}', [IndexController::class, 'likeBlog'])->name('likeBlog');
    Route::get('view-blog/{blog_id}', [BlogController::class, 'viewBlog'])->name('viewBlog');



});

// Web routes grouped with 'web' prefix and middleware webguest
Route::group(['as' => 'web.','middleware' => ['webguest']], function () {
    Route::get('register', [WebAuthController::class, 'registerPage'])->name('register-page');
});


// Web routes grouped with 'web' prefix and middleware webauth
Route::group(['as' => 'web.','middleware' => ['webauth']], function () {
    Route::get('chat', [IndexController::class, 'chat'])->name('chat');
    Route::get('logout', [WebAuthController::class, 'logout'])->name('logout');
});


