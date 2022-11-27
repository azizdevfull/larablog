<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function index(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
