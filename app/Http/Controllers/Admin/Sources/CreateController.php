<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.sources.index');
    }
}
