<?php

namespace App\Http\Controllers;

use App\Models\Newsarticle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsarticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index', 'allnews', 'search', 'advanceSearchQuery', 'advanceSearchPage']);
    }


    public function index()
    {
        $news1 = Newsarticle::latest()->take(10)->get();
        $arr = array('news1' => $news1);
        return view('welcome', $arr);
    }


    public function create()
    {
        return view('manage.AddNewsArticle', [
            'articleCategories' => Newsarticle::select('category')->groupBy('category')->get()
        ]);
    }

    public function store(Request $request)
    {
        $news = new Newsarticle();
        $news->title        = $request->input('title');
        $news->category     = $request->input('category');
        $news->author_name  = Auth::user()->name;
        $news->content      = $request->input('content');
        $news->date_publish = Carbon::now();
        $news->user_id      = Auth::user()->id;
        $news->thumbnail    = $request->file('thumbnail')->store('public/thumbnails');
        $news->thumbnail    = str_replace('public', 'storage', $news->thumbnail);
        $news->save();
        return redirect('/newsarticles/allnews');
    }

    public function show(Newsarticle $newsarticle)
    {
        $arr2 = array('news2' => $newsarticle);
        if (Auth::check())
            return view('manage.read', $arr2);
        $newsarticle->number_visitors++;
        $newsarticle->save();
        return view('user.readNews', $arr2);
    }

    public function edit(Newsarticle $newsarticle)
    {
        $arr3 = array('news4' => $newsarticle);
        return view('manage.edit', $arr3);
    }

    public function update(Request $request, Newsarticle $newsarticle)
    {
        $newsarticle->title        = $request->input('title');
        $newsarticle->category     = $request->input('category');
        $newsarticle->author_name  = Auth::user()->name;
        $newsarticle->content      = $request->input('content');
        $newsarticle->date_publish = Carbon::now();
        $newsarticle->user_id      = Auth::user()->id;
        $newsarticle->thumbnail    = $request->file('thumbnail')->store('public/thumbnails');
        $newsarticle->thumbnail    = str_replace('public', 'storage', $newsarticle->thumbnail);
        $newsarticle->save();
        return redirect('/newsarticles/allnews');
    }

    public function destroy(Newsarticle  $newsarticle)
    {
        $newsarticle->delete();
        return redirect('/newsarticles/allnews');
    }

    public function allnews()
    {
        $news1 = Newsarticle::latest()->get();
        $arr = array('news1' => $news1);
        if (Auth::check())
            return view('manage.viewAdmin', $arr);
        return view('user.allnews', $arr);
    }

    public function advanceSearchPage()
    {
        $category = Newsarticle::select('category')->distinct()->get();
        return view('user.advanceSearch', ["category" => $category]);
    }

    public function advanceSearchQuery(Request $request)
    {
        $search = $request->input('search');
        $categories = $request->categories;
        $from = $request->input('from');
        $to = $request->input('to');
        $news1 = Newsarticle::latest();
        if ($search != null)
            $news1 = $news1->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')->orWhere('author_name', 'LIKE', '%' . $search . '%')->orWhere('content', 'LIKE', '%' . $search . '%');
            });
        if ($categories != null)
            $news1 = $news1->whereIn('category', $categories);
        if ($from != null && $to != null)
            $news1 = $news1->whereBetween('date_publish', [$from, $to]);
        $news1 = $news1->get();
        $arr = array('news1' => $news1);
        return view('user.search', $arr);
    }

    public function search(Request $request)
    {
        $news1 = Newsarticle::where('title', 'LIKE', '%' . $request->input("query") . '%')->latest()->get();
        $arr = array('news1' => $news1);
        return view('user.search', $arr);
    }
}
