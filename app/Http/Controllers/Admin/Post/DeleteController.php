<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
