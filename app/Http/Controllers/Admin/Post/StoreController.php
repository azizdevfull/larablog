<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Contracts\Cache\Store;

class StoreController extends Controller
{
    public function index(PostRequest $request)
    {
        try {
            $data = $request->validated();
            $tagId = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagId);
        } catch (\Exception $exception) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }
}
