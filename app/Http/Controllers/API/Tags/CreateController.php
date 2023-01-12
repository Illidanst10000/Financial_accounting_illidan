<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('user.tags.create');
    }
}
