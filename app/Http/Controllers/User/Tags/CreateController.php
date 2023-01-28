<?php

namespace App\Http\Controllers\User\Tags;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('user.tags.create');
    }
}
