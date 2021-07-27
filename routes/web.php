<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manage;
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

Route::get('/', function () {
    $news1= Newsarticle::latest()->take(10)->get();
    $arr=array('news1'=>$news1);
    return view('welcome',$arr);
});

Route::get('/dashboard', function () {
    $totalNews=Newsarticle::latest()->count();
    $categories=DB::table('newsarticles')->select(DB::raw('category, count(*) as count'))->groupBy('category')->get();
    // return $categories;
    $totalHidden=Comment::all()->count();
    $Hiddens=DB::table('comments')->select(DB::raw('is_hidden, count(*) as count'))->where('is_approved','=',1)->groupBy('is_hidden')->get();
    return view('dashboard', ["totalNews" => $totalNews, "categories" => $categories ,"totalHidden"=>$totalHidden, "Hiddens"=>$Hiddens ]);
})->middleware(['auth'])->name('dashboard');

Route::get('/add',[manage::class,'AddNewsArticle']);
Route::post('/add',[manage::class,'AddNewsArticle']);

Route::get('/viewAdmin',[manage::class,'viewAdmin'])->name('viewAdmin');

Route::get('/read/{news}',[manage::class,'read']);
Route::post('/read/{news}',[manage::class,'read']);

Route::get('/readNews/{news}',[manage::class,'readNews']);
Route::post('/readNews/{news}',[manage::class,'readNews']);

Route::get('/add/{id}', function($id){
 $delnews=Newsarticle::find($id);
 $delnews->comments()->delete();
 $delnews->delete();
 return redirect('/viewAdmin');
});

Route::get('/edit/{id}',[manage::class,'EditNewsArticle']);
Route::post('/edit/{id}',[manage::class,'EditNewsArticle']);


Route::get('/contact',[manage::class,'contact'])->name('contact');
Route::get('/about',[manage::class,'about'])->name('about');
Route::get('/contact',[manage::class,'contact']);
Route::get('/about',[manage::class,'about']);
Route::get('/allnewsAdmin',[manage::class,'allnewsAdmin'])->name('allnewsAdmin');


Route::get('/allnews',[manage::class,'allnews']);


Route::get('/search',[manage::class,'search']);

Route::post('/editComment/{id}',[manage::class,'editComment']);
Route::get('/editComment/{id}',[manage::class,'editComment']);



Route::get('/deleteComment/{id}', function($id){
    $deleteComment=Comment::find($id);
    $deleteComment->delete();
    // return redirect('/read/{id}');
    return back();
   });


   Route::get('/ApproveComment/{id}', function($id){
    $ApproveComment=Comment::find($id);
    $ApproveComment->is_approved=true;
    $ApproveComment->save();
    // return redirect('/read/{id}');
    return back();
   });

   Route::get('/ShowComment/{id}', function($id){
    $ApproveComment=Comment::find($id);
    $ApproveComment->is_hidden=false;
    $ApproveComment->save();
    // return redirect('/read/{id}');
    return back();
   });

   Route::get('/HideComment/{id}', function($id){
    $ApproveComment=Comment::find($id);
    $ApproveComment->is_hidden=true;
    $ApproveComment->save();
    // return redirect('/read/{id}');
    return back();
   });

   Route::get('/advanceSearch',[manage::class,'advanceSearch']);
   Route::post('/advanceSearch',[manage::class,'advanceSearch']);


require __DIR__.'/auth.php';
