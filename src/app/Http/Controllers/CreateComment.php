<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CreateComment extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'post_id' => 'required|exists:posts,id'
        ]);

        $comment = new Comment;
        $comment->text = $request->message;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $request->post_id;
        $comment->status = 0;
        $comment->save();

        return back()->with('success_message', 'Ваш комментарий сохранен и скоро будет опубликован');
    }
}
