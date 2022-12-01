<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function index(StoreRequest $request)
    {
        // aaizz@gm.com
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']],$data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        return redirect()->route('admin.user.index');
    }
}
