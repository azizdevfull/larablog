<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Tag;
use Illuminate\Console\View\Components\Task;

class StoreController extends Controller
{
    public function index(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::firstOrCreate($data);

        return redirect()->route('admin.tag.index');
    }
}
