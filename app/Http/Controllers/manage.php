<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Newsarticle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class manage extends Controller
{
    public function AddNewsArticle(Request $request)
    {
        if ($request->isMethod('post')) {
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
            return redirect('viewAdmin');
        }
        return view('manage.AddNewsArticle', [
            'articleCategories' => Newsarticle::select('category')->groupBy('category')->get()
        ]);
    }

    // public function display() {
    //     return view('manage.AddNewsArticle');
    // }

    public function viewAdmin()
    {

        $news1 = Newsarticle::latest()->get();
        $arr = array('news1' => $news1);
        return view('manage.viewAdmin', $arr);
    }

    public function read(Request $request, Newsarticle $news)
    {

        if ($request->isMethod('post')) {
            $com = new Comment();
            $com->name        = $request->input('name');
            $com->comment     = $request->input('comment');
            $com->newsarticle_id = $news->id;
            $com->save();
        }

        $arr2 = array('news2' => $news);
        return view('manage.read', $arr2);
    }

    public function readNews(Request $request, Newsarticle $news)
    {

        if ($request->isMethod('post')) {
            $com = new Comment();
            $com->name        = $request->input('name');
            $com->comment     = $request->input('comment');
            $com->newsarticle_id = $news->id;
            $com->save();

            return redirect('allnews');
        }
        // $Model::where('resolved', true)->get();
        $arr2 = array('news2' => $news);
        // var_dump($arr2);

        // $id = $news->id;
        // $news=Newsarticle::find($id);
        $news->number_visitors++;
        $news->save();

        return view('user.readNews', $arr2);

        //   $news4=Newsarticle::find($news->id);
        //     $arr3=array('news4'=>$news4);
        //     return view('manage.read2',$arr3);
    }


    public function postComment(Request $request, Newsarticle $news)
    {

        if ($request->isMethod('post')) {
            $com = new Comment();
            $com->name        = $request->input('name');
            $com->comment     = $request->input('comment');
            $com->newsarticle_id = $news->id;
            $com->save();
        }
    }


    public function EditNewsArticle(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $news = Newsarticle::find($id);
            $news->title        = $request->input('title');
            $news->category     = $request->input('category');
            $news->author_name  = Auth::user()->name;
            $news->content      = $request->input('content');
            $news->date_publish = Carbon::now();
            $news->user_id      = Auth::user()->id;
            $news->thumbnail    = $request->file('thumbnail')->store('public/thumbnails');
            $news->thumbnail    = str_replace('public', 'storage', $news->thumbnail);            $news->save();
            return redirect('viewAdmin');
        } else {

            $news4 = Newsarticle::find($id);
            $arr3 = array('news4' => $news4);
            return view('manage.edit', $arr3);
        }
    }

    public function contact()
    {

        return view('user.contact');
    }

    public function about()
    {

        return view('user.about');
    }

    public function allnewsAdmin()
    {

        $news1 = Newsarticle::latest()->get();
        $arr = array('news1' => $news1);
        return view('manage.allnewsAdmin', $arr);
    }

    public function allnews()
    {
        $news1 = Newsarticle::latest()->get();
        $arr = array('news1' => $news1);
        return view('user.allnews', $arr);
    }


    public function search(Request $request)
    {
        //    echo($request->input("query"));
        $news1 = Newsarticle::where('title', 'LIKE', '%' . $request->input("query") . '%')->latest()->get();
        $arr = array('news1' => $news1);
        return view('user.search', $arr);
    }



    public function editComment(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $comment = Comment::find($id);
            // $comment->name        = $request->input('name');
            $comment->comment     = $request->input('comment');
            $comment->is_approved    = $request->input('is_approved');
            $comment->is_hidden     = $request->input('is_hidden');
            $comment->update();
            return redirect('read/' . $comment->newsarticle_id);
        } else {

            $comment = comment::find($id);
            $commentToEdit = array('comment' => $comment);
            return view('manage.editComment', $commentToEdit);
        }
    }


    public function advanceSearch(Request $request)
    {
        if ($request->isMethod('Post')) {
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
            // ( (DATE) AND (CATEGORY) AND (TITLE OR CONTENT OR AUTHOR))

            $arr = array('news1' => $news1);
            return view('user.search', $arr);
        }


        $category = Newsarticle::select('category')->distinct()->get();

        return view('user.advanceSearch', ["category" => $category]);
    }
}
