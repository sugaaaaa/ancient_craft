<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{AuthController,ProfileController};
use App\Http\Controllers\CatecgoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CmsController;

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

Route::get('/', function () {
    return view('welcome');
});
//home
// Route::get('/home', function () {return view('home');});
Route::get('/about', function () {return view('about');});
Route::get('/contact', function () {return view('contact');});
//end

// post route 
Route::get('/home', [PostsController::class, 'homeall']);
Route::get('/home/{id}', [PostsController::class, 'homepost']);
Route::get('/admin/dashboard/Post/post', [PostsController::class, 'index']);
Route::get('/admin/Post/newpost', [PostsController::class, 'create']);
Route::post('/admin/Post/newpost', [PostsController::class, 'store']);
Route::post('/admin/Post/{id}', [PostsController::class, 'destroy']);
Route::get('/admin/Post/edit/{id}', [PostsController::class, 'edit']);
Route::post('/admin/Post/edit/{id}', [PostsController::class, 'update']);
Route::get('/admin/Post/show/{id}', [PostsController::class, 'show']);
Route::get('/search', [PostsController::class, 'search']);
// end 

//catecgory
Route::get('/admin/dashboard/Catecgory/catecgory', [CatecgoryController::class, 'index']);
Route::get('/admin/Catecgory/create', [CatecgoryController::class, 'create']);
Route::post('/admin/Catecgory/create', [CatecgoryController::class, 'store']);
Route::post('/admin/Catecgory/{id}', [CatecgoryController::class, 'destroy']);
//end

//display cms page
Route::get('/admin/dashboard/pages/cms_pages', [CmsController::class,'index']);
Route::post('/admin/dashboard/pages/update-cms-page-status',[CmsController::class, 'update' ]);
Route::match(['get','post'],'/admin/pages/add_edit_cmspage/{id?}',[CmsController::class, 'edit']);
Route::get('/admin/pages/delete_cms_pages/{id?}', [CmsController::class,'destroy']);

//tag
Route::get('/admin/dashboard/tag/index', [TagController::class, 'index']);
Route::get('/admin/tag/create', [TagController::class, 'create']);
Route::post('/admin/tag/create', [TagController::class, 'store']);
Route::get('/admin/tag/edit/{id}', [TagController::class, 'edit']);
Route::post('/admin/tag/edit/{id}', [TagController::class, 'update']);
Route::post('/admin/tag/{id}', [TagController::class, 'destroy']);
//end

//auth
Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');
});
Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');
Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');

Route::get('/search',[PostsController::class,'search'])->name('search');
Route::get('/admin/dashboard/Post/search', [PostsController::class,'search_admin'])->name('post.search');
//end