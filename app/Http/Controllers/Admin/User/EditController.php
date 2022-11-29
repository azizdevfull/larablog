<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class EditController extends Controller
{
    public function index(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}
