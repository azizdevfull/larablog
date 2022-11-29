<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DeleteController extends Controller
{
    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}
