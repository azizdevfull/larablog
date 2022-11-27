<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function index(PostRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $post = Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
