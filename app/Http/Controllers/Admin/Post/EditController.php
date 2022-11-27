<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Post;

class EditController extends Controller
{
    public function index(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return view('admin.post.show', compact('post'));
    }
}
