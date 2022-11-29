<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class StoreController extends Controller
{
    public function index(StoreRequest $request)
    {
        $data = $request->validated();
        $category = Category::firstOrCreate($data);

        return redirect()->route('admin.category.index');
    }
}
