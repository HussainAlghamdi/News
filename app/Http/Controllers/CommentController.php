<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Newsarticle;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'update', 'destroy', 'approve', 'appear', 'hide']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Newsarticle  $newsarticle
     * @return \Illuminate\Http\Response
     */
    public function index(Newsarticle $newsarticle)
    {
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Newsarticle  $newsarticle
     * @return \Illuminate\Http\Response
     */
    public function create(Newsarticle $newsarticle)
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsarticle  $newsarticle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Newsarticle $newsarticle)
    {
        $com = new Comment();
        $com->name        = $request->input('name');
        $com->comment     = $request->input('comment');
        $com->newsarticle_id = $newsarticle->id;
        $com->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsarticle  $newsarticle
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Newsarticle $newsarticle, Comment $comment)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsarticle  $newsarticle
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsarticle $newsarticle, Comment $comment)
    {
        $commentToEdit = array('comment' => $comment);
        return view('manage.editComment', $commentToEdit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsarticle  $newsarticle
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsarticle $newsarticle, Comment $comment)
    {
        $comment->comment     = $request->input('comment');
        $comment->is_approved    = $request->input('is_approved');
        $comment->is_hidden     = $request->input('is_hidden');
        $comment->update();
        return redirect('newsarticles/' . $newsarticle->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsarticle  $newsarticle
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsarticle $newsarticle, Comment $comment)
    {
        $comment->delete();
        return back();
    }


    public function approve(Newsarticle $newsarticle, Comment $comment)
    {
        $comment->is_approved = true;
        $comment->save();
        return back();
    }

    public function appear(Newsarticle $newsarticle, Comment $comment)
    {
        $comment->is_hidden = false;
        $comment->save();
        return back();
    }


    public function hide(Newsarticle $newsarticle, Comment $comment)
    {
        $comment->is_hidden = true;
        $comment->save();
        return back();
    }
}
