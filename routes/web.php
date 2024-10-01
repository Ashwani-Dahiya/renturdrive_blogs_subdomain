<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandFaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControler;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;

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

Route::get('/blog', [BlogController::class, 'blog_page'])->name('blog.page');
Route::get('/blog/{url}', [BlogController::class, 'blog_details'])->name('blog.details.page');

Route::get('/faq/{brand}', [BrandFaqController::class, 'brand_faq_page'])->name('brand.faq.page');
Route::get('/admin', [AdminControler::class, 'login_page'])->name('adm.login.page');
Route::post('/admin/login', [AdminControler::class, 'login'])->name('adm.login');


Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [AdminControler::class, 'index'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminControler::class, 'logout'])->name('adm.logout');
    Route::get('admin/all-blogs', [BlogController::class, 'all_blog_page'])->name('adm.all.blog.page');
    Route::get('admin/add-blog', [BlogController::class, 'add_blog_page'])->name('adm.add.blog.page');
    Route::post('admin/add-blog-submit', [BlogController::class, 'add_blog_submit'])->name('adm.add.blog.post');
    Route::get('admin/update-blog-page/{id}', [BlogController::class, 'update_blog_page'])->name('adm.update.blog.page');
    Route::put('admin/update-blog/{id}', [BlogController::class, 'update_blog'])->name('adm.update.blog');
    Route::post('admin/delete-blog/{id}', [BlogController::class, 'delete_blog'])->name('adm.del.blog');
    Route::get('admin/add-blog-author', [BlogController::class, 'add_blog_author'])->name('adm.add.blog.author');
    Route::put('admin/add-blog-author', [BlogController::class, 'add_blog_author_submit'])->name('adm.add.blog.author.submit');
    Route::delete('admin/delete-blog-author/{id}', [BlogController::class, 'delete_blog_author'])->name('adm.del.blog.author');
    Route::get('admin/add-blog-category', [BlogController::class, 'add_blog_category'])->name('adm.add.blog.category');
    Route::put('admin/add-blog-category', [BlogController::class, 'add_blog_category_submit'])->name('adm.add.blog.category.submit');
    Route::delete('admin/delete-blog-category/{id}', [BlogController::class, 'delete_blog_category'])->name('adm.del.blog.category');

});
