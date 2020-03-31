<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Comment $comment)
    {
        return abort(404);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->toggleStatus();

        return redirect()->route('comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->remove();

        return redirect()->route('comments.index');
    }
}
