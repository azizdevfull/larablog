<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
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
    public function user()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
