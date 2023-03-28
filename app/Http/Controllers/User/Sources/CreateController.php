<?php

namespace App\Http\Controllers\User\Sources;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('user.sources.create');
    }
}
