<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.types.create');
    }
}
