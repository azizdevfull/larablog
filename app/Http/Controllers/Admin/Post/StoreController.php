<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Contracts\Cache\Store;

class StoreController extends BaseController
{
    public function index(PostRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);


        return redirect()->route('admin.post.index');
    }
}
