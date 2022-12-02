<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;

class IndexController extends Controller
{
    public function index()
    {
        $comments = Auth()->user()->comments;
        return view('personal.comment.index', compact('comments'));
    }
    
    public function edit(Comment $comment)
    {
        return view('personal.comment.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('personal.comments.index');
    }
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comments.index');
    }
}
