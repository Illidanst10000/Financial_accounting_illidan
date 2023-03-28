<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('user.categories.create');
    }
}
