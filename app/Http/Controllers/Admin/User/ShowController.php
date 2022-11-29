<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function index(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
}
