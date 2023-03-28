<?php

namespace App\Http\Controllers\User\Types;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('user.types.create');
    }
}
