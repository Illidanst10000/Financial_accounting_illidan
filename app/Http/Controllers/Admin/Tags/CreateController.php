<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.tags.create');
    }
}
