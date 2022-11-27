<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
}
