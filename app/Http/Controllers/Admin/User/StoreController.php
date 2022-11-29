<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function index(StoreRequest $request)
    {
        // aaizz@gm.com
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate(['email' => $data['email']],$data);

        return redirect()->route('admin.user.index');
    }
}
