<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\EditRequest;

class EditController extends Controller
{
    public function index(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    public function update(EditRequest $request, Post $post)
    {
        $data = $request->validated();

        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
        $post->update($data);
        $post->tags()->sync($tagIds);
        return view('admin.post.show', compact('post'));
    }
}
