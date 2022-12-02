<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPostIndexController extends Controller
{
    public function __invoke(Category $category)
    {
          $posts= $category->posts()->paginate(6);

        return view('category.post.index', compact('posts'));
    }
}
