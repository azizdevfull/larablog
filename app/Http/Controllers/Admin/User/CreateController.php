<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index()
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }
}
