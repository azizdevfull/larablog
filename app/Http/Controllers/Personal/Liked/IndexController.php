<?php

namespace App\Http\Controllers\Personal\liked;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Auth()->user()->likedPosts;
        return view('personal.liked.index', compact('posts'));
    }
    public function delete(Post $post)
    {
        Auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.liked.index');
    }
}
