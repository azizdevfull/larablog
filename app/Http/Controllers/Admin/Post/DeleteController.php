<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
