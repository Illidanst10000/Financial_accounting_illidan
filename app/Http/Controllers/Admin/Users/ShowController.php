<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}
