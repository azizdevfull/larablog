<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function index(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }
}
