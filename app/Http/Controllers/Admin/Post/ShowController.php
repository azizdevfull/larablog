<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends BaseController
{
    public function index(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
