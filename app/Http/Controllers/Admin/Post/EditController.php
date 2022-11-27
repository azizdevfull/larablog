<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class EditController extends Controller
{
    public function index(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('admin.categories.show', compact('category'));
    }
}
