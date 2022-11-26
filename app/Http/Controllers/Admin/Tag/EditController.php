<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Tag;

class EditController extends Controller
{
    public function index(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(StoreRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }
}
