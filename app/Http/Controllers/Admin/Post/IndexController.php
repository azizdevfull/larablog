<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function category()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
}
