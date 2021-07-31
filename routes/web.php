<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manage;
use App\Http\Controllers\NewsarticleController;
use App\Models\Comment;
use App\Models\Newsarticle;
use Illuminate\Support\Facades\DB;


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

Route::get('/', fn () => redirect('/newsarticles'));

Route::get('/dashboard', function () {
    $totalNews = Newsarticle::latest()->count();
    $categories = DB::table('newsarticles')->select(DB::raw('category, count(*) as count'))->groupBy('category')->get();
    $totalHidden = Comment::all()->count();
    $Hiddens = DB::table('comments')->select(DB::raw('is_hidden, count(*) as count'))->where('is_approved', '=', 1)->groupBy('is_hidden')->get();
    return view('dashboard', ["totalNews" => $totalNews, "categories" => $categories, "totalHidden" => $totalHidden, "Hiddens" => $Hiddens]);
})->middleware(['auth'])->name('dashboard');

Route::view('/contact', 'user.contact');
Route::view('/about', 'user.about');

/////////////////////////
//   Comments Routes   //
/////////////////////////

Route::get('newsarticles/{newsarticle}/comments/{comment}/approve', [CommentController::class, 'approve']);
Route::get('newsarticles/{newsarticle}/comments/{comment}/appear', [CommentController::class, 'appear']);
Route::get('newsarticles/{newsarticle}/comments/{comment}/hide', [CommentController::class, 'hide']);
Route::resource('newsarticles/{newsarticle}/comments', CommentController::class);

/////////////////////////
// Newsarticles Routes //
/////////////////////////

Route::get('newsarticles/advanceSearch', [NewsarticleController::class, 'advanceSearchPage']);
Route::post('newsarticles/advanceSearch', [NewsarticleController::class, 'advanceSearchQuery']);
Route::get('newsarticles/search', [NewsarticleController::class, 'search']);
Route::get('newsarticles/allnews', [NewsarticleController::class, 'allnews'])->name('allnews');
Route::resource('newsarticles', NewsarticleController::class);

require __DIR__ . '/auth.php';
