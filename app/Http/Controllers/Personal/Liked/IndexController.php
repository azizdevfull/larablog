<?php

namespace App\Http\Controllers\Personal\liked;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Auth()->user()->likedPost;
        dd($posts);
        return view('personal.liked.index', compact('posts'));
    }
}
