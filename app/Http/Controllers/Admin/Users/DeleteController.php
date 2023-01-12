<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
